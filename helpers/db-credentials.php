<?php 
    // Establish database credentials
    $hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'medicare';

    $hospital_units = [
        [
            "title" => "Accounting Unit",
            "value" => "bursary"
        ],
        [
            "title" => "Laboratory Unit",
            "value" => "lab"
        ],
        [
            "title" => "Out Patients Department",
            "value" => "opd"
        ],
        [
            "title" => "Nursing Unit",
            "value" => "nursing"
        ],
        [
            "title" => "Pharmacy Unit",
            "value" => "pharmacy"
        ],
        [
            "title" => "Management",
            "value" => "management"
        ],
        [
            "title" => "Physician Unit",
            "value" => "physician"
        ]
    ];

    $page_structure = [
        [
            "name" => "Overview",
            "iconText" => "dashboard",
            "url" => "overview"
        ],
        [
            "name" => "Appointments",
            "iconText" => "calendar_month",
            "url" => "appointments",
            "permission" => "opd, nursing",
            "sub-menu" => [
                [
                    "title" => "Create New Appointment",
                    "url" => "create-appointment"
                ],
                [
                    "title" => "View All Appointments",
                    "url" => "list-appointments"
                ]
            ]
        ],
        [
            "name" => "Patients",
            "iconText" => "person",
            "url" => "patients",
            "permission" => "opd",
            "sub-menu" => [
                [
                    "title" => "Add New Patient",
                    "url" => "add-patient"
                ],
                [
                    "title" => "Search Patients",
                    "url" => "list-patients"
                ]
            ]
        ],
        [
            "name" => "Nurses",
            "iconText" => "lda",
            "url" => "nurses",
            "permission" => "nursing, physician",
            "sub-menu" => [
                [
                    "title" => "Take Vital Signs",
                    "url" => "vital-signs"
                ]
            ]
        ],
        [
            "name" => "Doctors",
            "iconText" => "stethoscope",
            "url" => "doctors",
            "permission" => "physician",
            "sub-menu" => [
                [
                    "title" => "List Appointments",
                    "url" => "my-appointments"
                ]
            ]
        ],
        [
            "name" => "Pharmacy",
            "iconText" => "medication",
            "url" => "pharmacy",
            "permission" => "pharmacy",
            "sub-menu" => [
                [
                    "title" => "List Requests",
                    "url" => "requests"
                ]
            ]
        ],
        [
            "name" => "Laboratory",
            "iconText" => "biotech",
            "url" => "laboratory",
            "permission" => "lab",
            "sub-menu" => [
                [
                    "title" => "List Records",
                    "url" => "record-list"
                ]
            ]
        ],
        [
            "name" => "Ward",
            "iconText" => "ward",
            "url" => "ward",
            "permission" => "nursing,opd,physician",
            "sub-menu" => [
                [
                    "title" => "List Ward Patients",
                    "url" => "ward-list"
                ]
            ]
        ],
        [
            "name" => "Bursary",
            "iconText" => "payments",
            "url" => "bursary",
            "permission" => "bursary",
            "sub-menu" => [
                [
                    "title" => "List All Payments",
                    "url" => "list-payments"
                ]
            ]
        ],
        [
            "name" => "Admin",
            "iconText" => "shield_person",
            "url" => "admin",
            "permission" => "management",
            "sub-menu" => [
                [
                    "title" => "Add New Staff",
                    "url" => "other-staff"
                ],
                [
                    "title" => "List Available Doctors",
                    "url" => "list-doctors"
                ],
                [
                    "title" => "List All Staff",
                    "url" => "list-staff"
                ]
            ],
        ]
    ];

?>