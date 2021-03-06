<?php
namespace TmlpStats\Import\Xlsx\DataImporter;

use TmlpStats\Import\Xlsx\ImportDocument\ImportDocument;
use TmlpStats\Person;
use TmlpStats\Quarter;
use TmlpStats\TmlpRegistration;
use TmlpStats\TmlpRegistrationData;
use TmlpStats\TeamMember;
use TmlpStats\Util;
use TmlpStats\WithdrawCode;

class TmlpRegistrationImporter extends DataImporterAbstract
{
    protected $sheetId = ImportDocument::TAB_WEEKLY_STATS;

    protected function populateSheetRanges()
    {
        $t1Reg                         = $this->findRange(32, 'Team 1 Registrations', 'Team 2 Registrations');
        $this->blocks['t1Reg']['cols'] = $this->excelRange('A', 'AG');
        $this->blocks['t1Reg']['rows'] = $this->excelRange($t1Reg['start'] + 1, $t1Reg['end']);

        $t2Reg                         = $this->findRange($t1Reg['end'], 'Team 2 Registrations', 'Future Weekend Reg');
        $this->blocks['t2Reg']['cols'] = $this->excelRange('A', 'AG');
        $this->blocks['t2Reg']['rows'] = $this->excelRange($t2Reg['start'] + 1, $t2Reg['end']);

        $futureReg                         = $this->findRange($t2Reg['end'], 'Future Weekend Reg', 'REMEMBER TO ENTER THE COURSE INFORMATION ON THE "CAP & CPC Course Info" Tab');
        $this->blocks['futureReg']['cols'] = $this->excelRange('A', 'AE');
        $this->blocks['futureReg']['rows'] = $this->excelRange($futureReg['start'] + 1, $futureReg['end']);
    }

    public function load()
    {
        $this->reader = $this->getReader($this->sheet);
        $this->reader->setReportingDate($this->statsReport->reportingDate);

        $this->loadBlock($this->blocks['t1Reg'], 1);
        $this->loadBlock($this->blocks['t2Reg'], 2);
        $this->loadBlock($this->blocks['futureReg'], 'future');
    }

    protected function loadEntry($row, $type)
    {
        if ($this->reader->isEmptyCell($row, 'A') && $this->reader->isEmptyCell($row, 'B')) {
            return;
        }

        $data = [
            'offset'                  => $row,
            'firstName'               => $this->reader->getFirstName($row),
            'lastName'                => $this->reader->getLastInitial($row),
            'regDate'                 => $this->reader->getRegDate($row),
            'bef'                     => $this->reader->getBef($row),
            'dur'                     => $this->reader->getDur($row),
            'aft'                     => $this->reader->getAft($row),
            'weekendReg'              => $this->reader->getWeekendReg($row),
            'appOut'                  => $this->reader->getAppOut($row),
            'appOutDate'              => $this->reader->getAppOutDate($row),
            'appIn'                   => $this->reader->getAppIn($row),
            'appInDate'               => $this->reader->getAppInDate($row),
            'appr'                    => $this->reader->getAppr($row),
            'apprDate'                => $this->reader->getApprDate($row),
            'wd'                      => $this->reader->getWd($row),
            'wdDate'                  => $this->reader->getWdDate($row),
            'committedTeamMemberName' => $this->reader->getCommittedTeamMemberName($row),
            'comment'                 => $this->reader->getComment($row),
            'incomingWeekend'         => is_numeric($type) ? 'current' : $type,
            'incomingTeamYear'        => is_numeric($type) ? $type : $this->reader->getIncomingTeamYear($row),
            'travel'                  => $this->reader->getTravel($row),
            'room'                    => $this->reader->getRoom($row),
        ];

        if (strtoupper($data['incomingTeamYear']) === 'R') {
            $data['incomingTeamYear'] = 2;
        }

        $this->data[] = $data;
    }

    public function postProcess()
    {
        foreach ($this->data as $incomingInput) {

            if (isset($this->data['errors'])) {
                continue;
            }

            $incomingInput['teamYear'] = ($incomingInput['incomingTeamYear'] == 'R')
                ? 2
                : $incomingInput['incomingTeamYear'];

            $incoming = TmlpRegistration::firstOrNew([
                'first_name' => $incomingInput['firstName'],
                'last_name'  => trim(str_replace('.', '', $incomingInput['lastName'])),
                'center_id'  => $this->statsReport->center->id,
                'reg_date'   => $incomingInput['regDate'],
                'team_year'  => $incomingInput['teamYear'],
            ]);

            if ($incoming->teamYear === 2 && $incomingInput['incomingTeamYear'] === 'R') {
                $incoming->isReviewer = true;
            }
            $incoming->save();

            $incomingData = TmlpRegistrationData::firstOrNew([
                'tmlp_registration_id' => $incoming->id,
                'stats_report_id'      => $this->statsReport->id,
            ]);

            $withdrawCodeId = null;
            if ($incomingInput['wd']) {
                $code                         = substr($incomingInput['wd'], 2);
                $withdrawCode                 = WithdrawCode::code($code)->first();
                $incomingData->withdrawCodeId = $withdrawCode ? $withdrawCode->id : null;
            } else {
                // Reset withdraw code if they were moved from current to future quarters
                $incomingData->withdrawCodeId = null;
            }

            $thisQuarter   = $this->statsReport->quarter;
            $quarterNumber = ($thisQuarter->quarterNumber % 4) + 1;
            if ($incomingInput['incomingWeekend'] !== 'current') {
                $quarterNumber = ($quarterNumber % 4) + 1;
            }

            $year = ($quarterNumber < $thisQuarter->quarterNumber)
                ? $thisQuarter->year + 1
                : $thisQuarter->year;

            $nextQuarter = Quarter::year($year)->quarterNumber($quarterNumber)->first();

            if ($nextQuarter) {
                $incomingData->incomingQuarterId = $nextQuarter->id;
            }

            $incomingInput['travel'] = $incomingInput['travel'] ? true : false;
            $incomingInput['room']   = $incomingInput['room'] ? true : false;

            $teamMember = $this->getTeamMember($incomingInput['committedTeamMemberName']);
            if ($teamMember) {
                $incomingData->committedTeamMemberId = $teamMember->id;
            }

            unset($incomingInput['firstName']);
            unset($incomingInput['lastName']);
            unset($incomingInput['teamYear']);
            unset($incomingInput['incomingTeamYear']);
            unset($incomingInput['offset']);
            unset($incomingInput['bef']);
            unset($incomingInput['dur']);
            unset($incomingInput['aft']);
            unset($incomingInput['weekendReg']);
            unset($incomingInput['appOut']);
            unset($incomingInput['appIn']);
            unset($incomingInput['appr']);
            unset($incomingInput['wd']);
            unset($incomingInput['committedTeamMemberName']);
            unset($incomingInput['incomingWeekend']);

            $incomingData = $this->setValues($incomingData, $incomingInput);

            $incomingData->save();
        }
    }

    protected function getTeamMember($name)
    {
        if (!$name) {
            return null;
        }
        $nameParts = Util::getNameParts($name);

        $person = Person::firstName($nameParts['firstName'])
                        ->lastName($nameParts['lastName'])
                        ->byCenter($this->statsReport->center)
                        ->first();

        return $person
            ? TeamMember::byPerson($person)->first()
            : null;
    }
}
