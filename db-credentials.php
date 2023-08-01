<?php 
    // Establish database credentials
    $hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'medicare';
    
    // Connect to the database
    $mysqli = new mysqli($hostname, $db_username, $db_password, $database);

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
            "permission" => "opd",
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
            "permission" => "nursing",
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
        ],
        [
            "name" => "Laboratory",
            "iconText" => "biotech",
            "url" => "laboratory",
            "permission" => "lab",
        ],
        [
            "name" => "Ward",
            "iconText" => "ward",
            "url" => "ward",
            "permission" => "nursing, opd",
        ],
        [
            "name" => "Bursary",
            "iconText" => "payments",
            "url" => "bursary",
            "permission" => "bursary"
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