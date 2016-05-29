<div>
<?php
$sections = [
    'Out of Compliance' => $reportData,
    "Only one more withdraw and they're out of compliance" => $almostOutOfCompliance,
];
?>
<p>In compliance means:</p>
<ul>
<li>Less than 5% of Team 1 or Team 2 have withdrawn if team has 20 or more participants</li>
<li>No more than 1 Team 1 or Team 2 have withdrawn if team has less than 20 participants</li>
</ul>

@foreach ($sections as $title => $sectionData)
<h3>{{ $title }}</h3>

@foreach (['team1', 'team2'] as $team)

<table class="table want-datatable">
<thead>
<tr>
    <th>{{ ucfirst($team) }}</th>
    <th>Total Team</th>
    <th>Withdraws</th>
    <th>%</th>
    <th>Classroom Leader</th>
</tr>
</thead>

<tbody>
@foreach ($sectionData as $centerName => $data)
@if (isset($data[$team]) && ['withdrawCount'] > 0)
<tr>
    <td>{{ $centerName }}</td>
    <td>{{ $data[$team]['totalCount'] }}</td>
    <td>{{ $data[$team]['withdrawCount'] }}</td>
    <td>{{ round($data[$team]['percent'], 1) }}%</td>
    <td>{{ $data['classroomLeader']->firstName }} {{ $data['classroomLeader']->lastName[0] }}</td>
</tr>
@endif
@endforeach
</tbody>
</table>
<br>
@endforeach
@endforeach

</div>