<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TMLP Stats Validation Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during statistic report validation
    |
    */

    // TODO: if we are going to require a specific comment format for the date/time, indicate that here
    'CLASSLIST_TRAVEL_COMMENT_MISSING' => 'Either travel must be complete and marked with a Y in the Travel column, or a comment providing a specific promise must be provided',
    'CLASSLIST_ROOM_COMMENT_MISSING' => 'Either rooming must be complete and marked with a Y in the Room column, or a comment providing a specific promise must be provided',
    'TEAMAPP_TRAVEL_COMMENT_MISSING' => 'Travel is required. If travel is complete, please mark it. Otherwise, provided a comment with a specific promise (date and time).',
    'TEAMAPP_ROOM_COMMENT_MISSING' => 'Rooming is required. If rooming is complete, please mark it. Otherwise, provided a comment with a specific promise (date and time).',

    // TODO: Are these still accurate?
    'CLASSLIST_XFER_CHECK_WITH_OTHER_CENTER' => 'Team member is transferring. Confirm with other center that team member is reported appropriately on their report.',
    'CLASSLIST_TRAVEL_COMMENT_REVIEW' => 'Travel is not booked. Make sure the comment provides a specific promise for when travel will be complete.',
    'CLASSLIST_ROOM_COMMENT_REVIEW' => 'Rooming is not booked. Make sure the comment provides a specific promise for when rooming will be complete.',
    'TEAMAPP_TRAVEL_COMMENT_REVIEW' => 'Travel is not booked. Make sure the comment provides a specific promise for when travel will be complete.',
    'TEAMAPP_ROOM_COMMENT_REVIEW' => 'Rooming is not booked. Make sure the comment provides a specific promise for when rooming will be complete.',

    // Complete
    'CLASSLIST_CTW_COMMENT_MISSING' => 'Add a comment with the issue/concern.',
    'CLASSLIST_GITW_MISSING' => 'GITW was not provided.',
    'CLASSLIST_TDO_MISSING' => 'TDO was not provided.',
    'CLASSLIST_WD_COMMENT_MISSING' => 'Add a comment with the date of withdraw.',
    'CLASSLIST_WD_CTW_ONLY_ONE' => 'Both WD/WBO and CTW are set. CTW should not be set after the team member has withdrawn.',
    'CLASSLIST_WKND_MISSING' => 'Was team member at the weekend, or did they transfer in? Please select one.',
    'CLASSLIST_WKND_XIN_REREG_ONLY_ONE' => 'Was team member at the weekend, or did they transfer in? Please select only one.',
    'CLASSLIST_XFER_COMMENT_MISSING' => 'Add a comment specifying the date of transfer and the center they transferred to/from.',
    'CLASSLIST_XFER_ONLY_ONE' => 'Person cannot transfer in and out at the same time.',
    'CLASSLIST_ACCOUNTABLE_PHONE_MISSING' => 'Team member is the :accountability accountable. Please provide their phone number in case we need to contact them regarding stats.',
    'CLASSLIST_ACCOUNTABLE_EMAIL_MISSING' => 'Team member is the :accountability accountable. Please provide their email address in case we need to contact them regarding stats.',
    'CLASSLIST_ACCOUNTABLE_AND_WITHDRAWN' => 'Team member has left the team. Please remove accountabilities.',
    'CLASSLIST_MULTIPLE_ACCOUNTABLES' => 'Multiple team members have accountability :accountability. Please provide no more than 1 person.',
    'CLASSLIST_UNKNOWN_ACCOUNTABILITY' => 'Unrecognized accountability (:accountabilityId) provided.',
    'CLASSLIST_MISSING_ACCOUNTABLE' => 'No one was is listed as :accountability accountable. If this is correct, let your regional statistician know.',
    'COURSE_COMPLETED_REGISTRATIONS_GREATER_THAN_POTENTIALS' => 'Registrations (:registrations) cannot be greater than the number of potentials for the course (:potentials). Please confirm what the correct values are with the course supervisor and/or your program manager.',
    'COURSE_COMPLETED_SS_GREATER_THAN_CURRENT_SS' => 'More people completed the course than started. Make sure Current Standard Starts matches the number of people that started the course, and Completed Standard Starts matches the number of people that completed the course.',
    'COURSE_COMPLETED_SS_LESS_THAN_CURRENT_SS' => 'Completed Standard Starts is :delta less than the course starting standard starts. Confirm with your regional statistician that :delta people did withdraw during the course.',
    'COURSE_COMPLETED_SS_MISSING' => 'Course is missing completion statistic: Standard Starts Completed.',
    'COURSE_COMPLETION_STATS_PROVIDED_BEFORE_COURSE' => 'Course has not completed, but has completion stats.',
    'COURSE_COURSE_DATE_BEFORE_QUARTER' => 'Course occurred before this quarter started.',
    'COURSE_CURRENT_SS_GREATER_THAN_CURRENT_TER' => 'Current Standard Starts (:starts) cannot be more than the total number of people ever registered in the course (:ter).',
    'COURSE_CURRENT_TER_LESS_THAN_QSTART_TER' => 'Current Total Ever Registered (:currentTer) is less than Quarter Starting Total Ever Registered (:quarterStartTer). Please verify this is accurate.',
    'COURSE_CURRENT_XFER_GREATER_THAN_CURRENT_TER' => 'Current Transfer in from Earlier (:xfer) cannot be more than the total number of people ever registered in the course (:ter).',
    'COURSE_CURRENT_XFER_LESS_THAN_QSTART_XFER' => 'Current Transfer in from Earlier (:currentXfer) is less than the Quarter Starting Transfer in from Earlier (:quarterStartXfer). This should only be possible if someone who previously transferred was withdrawn as a registration error. Please verify this is accurate.',
    'COURSE_GUESTS_ATTENDED_MISSING' => 'Course has completed but the guest game\'s number of people who attended is missing.',
    'COURSE_GUESTS_ATTENDED_PROVIDED_BEFORE_COURSE' => 'Course has not completed yet, but the guest game shows that people have already attended.',
    'COURSE_GUESTS_CONFIRMED_MISSING' => 'Course has completed but the guest game\'s number of people confirmed is missing.',
    'COURSE_GUESTS_INVITED_MISSING' => 'Course has completed but the guest game\'s number of people invited is missing.',
    'COURSE_POTENTIALS_MISSING' => 'Course is missing completion statistic: Potentials.',
    'COURSE_QSTART_SS_GREATER_THAN_QSTART_TER' => 'Quarter Starting Standard Starts (:starts) cannot be more than the quarter starting total number of people ever registered in the course (:ter).',
    'COURSE_QSTART_XFER_GREATER_THAN_QSTART_TER' => 'Quarter Starting Transfer in from Earlier (:xfer) cannot be more than the quarter starting total number of people ever registered in the course (:ter).',
    'COURSE_REGISTRATIONS_MISSING' => 'Course is missing completion statistic: Registrations.',
    'COURSE_START_DATE_NOT_SATURDAY' => 'Course does not start on a Saturday. Please check that this is correct.',
    'GENERAL_INVALID_VALUE' => 'Incorrect value provided for :name (:value).',
    'GENERAL_MISSING_VALUE' => ':name is required, but no value was provided.',
    'CENTERGAME_CAP_ACTUAL_INCORRECT' => 'You reported :reported for the CAP actual, but the net number of CAP registrations this quarter is :calculated.',
    'CENTERGAME_CPC_ACTUAL_INCORRECT' => 'You reported :reported for the CPC actual, but the net number of CPC registrations this quarter is :calculated.',
    'CENTERGAME_GITW_ACTUAL_INCORRECT' => 'You reported :reported for the GITW actual, but the percentage of team members reported as effective is :calculated.',
    'CENTERGAME_T1X_ACTUAL_INCORRECT' => 'You reported :reported for the T1 actual, but the net number of T1 incoming approved this quarter is :calculated.',
    'CENTERGAME_T2X_ACTUAL_INCORRECT' => 'You reported :reported for the T2 actual, but the net number of T2 incoming approved this quarter is :calculated.',
    'TEAMAPP_APPIN_DATE_MISSING' => 'Missing App In date.',
    'TEAMAPP_APPOUT_DATE_MISSING' => 'Missing App Out date.',
    'TEAMAPP_REVIEWER_TEAM1' => 'Only Team 2 can review. Please check that the team year and reviewer status are correct.',
    'TEAMAPP_WD_CODE_MISSING' => 'Missing reason for withdraw.',
    'TEAMAPP_WD_DATE_MISSING' => 'Missing withdraw date.',
    'TEAMAPP_APPIN_DATE_BEFORE_APPOUT_DATE' => 'App in date is before app out date',
    'TEAMAPP_APPIN_DATE_BEFORE_REG_DATE' => 'App in date is before registration date',
    'TEAMAPP_APPIN_DATE_IN_FUTURE' => 'Application In date is in the future.',
    'TEAMAPP_APPIN_LATE' => 'Application has not been returned within :daysSince days of sending application out. Application is not in integrity with design of application process.',
    'TEAMAPP_APPOUT_DATE_BEFORE_REG_DATE' => 'App out date is before registration date',
    'TEAMAPP_APPOUT_DATE_IN_FUTURE' => 'Application Out date is in the future.',
    'TEAMAPP_APPOUT_LATE' => 'Application was not sent to applicant within :daysSince days of registration.',
    'TEAMAPP_APPR_DATE_BEFORE_APPIN_DATE' => 'Approval date is before app in date',
    'TEAMAPP_APPR_DATE_BEFORE_APPOUT_DATE' => 'Approval date is before app out date',
    'TEAMAPP_APPR_DATE_BEFORE_REG_DATE' => 'Approval date is before registration date',
    'TEAMAPP_APPR_DATE_IN_FUTURE' => 'Approve date is in the future.',
    'TEAMAPP_APPR_LATE' => 'Application not approved within :daysSince days since sending application out.',
    'TEAMAPP_NO_COMMITTED_TEAM_MEMBER' => 'No committed team member provided',
    'TEAMAPP_REG_DATE_IN_FUTURE' => 'Registration date is in the future.',
    'TEAMAPP_WD_DATE_BEFORE_APPIN_DATE' => 'Withdraw date is before app in date',
    'TEAMAPP_WD_DATE_BEFORE_APPOUT_DATE' => 'Withdraw date is before app out date',
    'TEAMAPP_WD_DATE_BEFORE_APPR_DATE' => 'Withdraw date is before approval date',
    'TEAMAPP_WD_DATE_BEFORE_APPR_DATE' => 'Withdraw date is before approval date',
    'TEAMAPP_WD_DATE_BEFORE_REG_DATE' => 'Withdraw date is before registration date',
    'TEAMAPP_WD_DATE_IN_FUTURE' => 'Withdraw date is in the future.',
    'VALDATA_NOT_UPDATED' => ':type has not been updated since last week. Please confirm that no changes are needed.',
    'ZZZ_TEST_MESSAGE_0_PARAM' => 'This message has 0 params.',
    'ZZZ_TEST_MESSAGE_1_PARAM' => 'This message has 1 param: :one.',
    'ZZZ_TEST_MESSAGE_2_PARAM' => 'This message has 2 params: :one and :two.',
];
