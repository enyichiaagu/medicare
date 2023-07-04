<?php

    // Creating an array with the menu list and sub lists
    $menuItems = [
        [
            "name" => "Overview",
            "iconText" => "dashboard"
        ],
        [
            "name" => "Appointments",
            "iconText" => "calendar_month",
            "sub-menu" => [
                "Create New Appointment",
                "Find Appointment"
            ]
        ],
        [
            "name" => "Patients",
            "iconText" => "person",
            "sub-menu" => [
                "Add New Patient",
                "Find Patient",
                "Take Vital Signs"
            ]
        ],
        [
            "name" => "Doctors",
            "iconText" => "stethoscope",
            "sub-menu" => [
                "List Appointments",
                "List Available Doctors"
            ]
        ],
        [
            "name" => "Pharmacy",
            "iconText" => "medication"
        ],
        [
            "name" => "Laboratory",
            "iconText" => "biotech"
        ],
        [
            "name" => "Bursary",
            "iconText" => "payments"
        ],
        [
            "name" => "Ward",
            "iconText" => "ward"
        ],
        [
            "name" => "Other Staff",
            "iconText" => "diversity_3"
        ]


    ];

?>
<aside>
    <div class="menu-options">

        <!-- Looping through every item in the menu -->
        <?php array_map(function($item) { ?>

            <li>
                <!-- Display the icon text -->
                <span class="material-symbols-outlined"><?= $item["iconText"] ?></span>
                
                <!-- Display the name of the option -->
                <span><?= $item["name"] ?></span>

                <!-- Checking if there is any sub menu -->
                <?php if (isset($item["sub-menu"])) { ?>
                    
                    <!-- Looping through available sub menu -->
                    <?php array_map(function($subMenu){ ?>
                        <li><?= $subMenu ?></li>
                    <?php }, $item["sub-menu"]) ?>
                 
                <!-- Closing if Statement -->
                <?php } ?>
            </li>
        
        <!-- Closing menu options loop -->
        <?php }, $menuItems); ?>

    </div>
</aside>
