//// THIS FILE IS AUTOMATICALLY GENERATED!
//// DO NOT EDIT BY HAND!

const GlobalReport = {
    "root": [
        "WeeklySummaryGroup",
        "RegionalStatsGroup",
        "CenterStatsReports",
        "ApplicationsGroup",
        "TravelReport",
        "CoursesGroup",
        "TeamMemberStatusGroup",
        "TdoSummary",
        "PotentialsGroup",
        "WithdrawReport"
    ],
    "children": {
        "RatingSummary": {
            "id": "RatingSummary",
            "n": 0,
            "type": "report",
            "name": "Ratings"
        },
        "RegionSummary": {
            "id": "RegionSummary",
            "n": 1,
            "type": "report",
            "name": "At A Glance"
        },
        "WeeklySummaryGroup": {
            "id": "WeeklySummaryGroup",
            "n": 2,
            "type": "grouping",
            "name": "Weekly Summary",
            "children": [
                "RatingSummary",
                "RegionSummary"
            ]
        },
        "RegionalStats": {
            "id": "RegionalStats",
            "n": 3,
            "type": "report",
            "name": "Scoreboard"
        },
        "GamesByCenter": {
            "id": "GamesByCenter",
            "n": 4,
            "type": "report",
            "name": "By Center"
        },
        "RepromisesByCenter": {
            "id": "RepromisesByCenter",
            "n": 5,
            "type": "report",
            "name": "Repromises"
        },
        "RegPerParticipant": {
            "id": "RegPerParticipant",
            "n": 6,
            "type": "report",
            "name": "Reg. Per Participant"
        },
        "Gaps": {
            "id": "Gaps",
            "n": 7,
            "type": "report",
            "name": "Gaps"
        },
        "RegionalStatsGroup": {
            "id": "RegionalStatsGroup",
            "n": 8,
            "type": "grouping",
            "name": "Regional Games",
            "children": [
                "RegionalStats",
                "GamesByCenter",
                "RepromisesByCenter",
                "RegPerParticipant",
                "Gaps"
            ]
        },
        "CenterStatsReports": {
            "id": "CenterStatsReports",
            "n": 9,
            "type": "report",
            "name": "Center Reports"
        },
        "TmlpRegistrationsOverview": {
            "id": "TmlpRegistrationsOverview",
            "n": 10,
            "type": "report",
            "name": "Overview"
        },
        "TmlpRegistrationsByStatus": {
            "id": "TmlpRegistrationsByStatus",
            "n": 11,
            "type": "report",
            "name": "By Status"
        },
        "TmlpRegistrationsByCenter": {
            "id": "TmlpRegistrationsByCenter",
            "n": 12,
            "type": "report",
            "name": "By Center"
        },
        "Team2RegisteredAtWeekend": {
            "id": "Team2RegisteredAtWeekend",
            "n": 13,
            "type": "report",
            "name": "T2 Reg. At Weekend"
        },
        "TmlpRegistrationsOverdue": {
            "id": "TmlpRegistrationsOverdue",
            "n": 14,
            "type": "report",
            "name": "Overdue"
        },
        "ApplicationsGroup": {
            "id": "ApplicationsGroup",
            "n": 15,
            "type": "grouping",
            "name": "Applications",
            "children": [
                "TmlpRegistrationsOverview",
                "TmlpRegistrationsByStatus",
                "TmlpRegistrationsByCenter",
                "Team2RegisteredAtWeekend",
                "TmlpRegistrationsOverdue"
            ]
        },
        "TravelReport": {
            "id": "TravelReport",
            "n": 16,
            "type": "report",
            "name": "Travel Summary"
        },
        "CoursesThisWeek": {
            "id": "CoursesThisWeek",
            "n": 17,
            "type": "report",
            "name": "Completed This Week"
        },
        "CoursesNextMonth": {
            "id": "CoursesNextMonth",
            "n": 18,
            "type": "report",
            "name": "Next 5 Weeks"
        },
        "CoursesUpcoming": {
            "id": "CoursesUpcoming",
            "n": 19,
            "type": "report",
            "name": "Upcoming"
        },
        "CoursesCompleted": {
            "id": "CoursesCompleted",
            "n": 20,
            "type": "report",
            "name": "Completed"
        },
        "CoursesGuestGames": {
            "id": "CoursesGuestGames",
            "n": 21,
            "type": "report",
            "name": "Guest Games"
        },
        "CoursesGroup": {
            "id": "CoursesGroup",
            "n": 22,
            "type": "grouping",
            "name": "Courses",
            "children": [
                "CoursesThisWeek",
                "CoursesNextMonth",
                "CoursesUpcoming",
                "CoursesCompleted",
                "CoursesGuestGames"
            ]
        },
        "TeamMemberStatusCtw": {
            "id": "TeamMemberStatusCtw",
            "n": 23,
            "type": "report",
            "name": "CTW"
        },
        "TeamMemberStatusTransfer": {
            "id": "TeamMemberStatusTransfer",
            "n": 24,
            "type": "report",
            "name": "Transfers"
        },
        "TeamMemberStatusWithdrawn": {
            "id": "TeamMemberStatusWithdrawn",
            "n": 25,
            "type": "report",
            "name": "Withdrawn"
        },
        "TeamMemberStatusGroup": {
            "id": "TeamMemberStatusGroup",
            "n": 26,
            "type": "grouping",
            "name": "Team Members",
            "children": [
                "TeamMemberStatusCtw",
                "TeamMemberStatusTransfer",
                "TeamMemberStatusWithdrawn"
            ]
        },
        "TdoSummary": {
            "id": "TdoSummary",
            "n": 27,
            "type": "report",
            "name": "Training & Development"
        },
        "TeamMemberStatusPotentialsOverview": {
            "id": "TeamMemberStatusPotentialsOverview",
            "n": 28,
            "type": "report",
            "name": "Overview"
        },
        "TeamMemberStatusPotentials": {
            "id": "TeamMemberStatusPotentials",
            "n": 29,
            "type": "report",
            "name": "Details"
        },
        "PotentialsGroup": {
            "id": "PotentialsGroup",
            "n": 30,
            "type": "grouping",
            "name": "Potentials",
            "children": [
                "TeamMemberStatusPotentialsOverview",
                "TeamMemberStatusPotentials"
            ]
        },
        "WithdrawReport": {
            "id": "WithdrawReport",
            "n": 31,
            "type": "report",
            "name": "Withdraws"
        }
    }
}

const Reports = {
    Global: GlobalReport
}

export default Reports
