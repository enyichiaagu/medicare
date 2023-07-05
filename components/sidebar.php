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

        <ul class="navigation">
            <!-- Looping through every item in the menu -->
            <?php array_map(function($item) { ?>

                <li>
                    <div class="option-display">

                        <!-- Display the icon text -->
                        <span class="material-symbols-outlined"><?= $item["iconText"] ?></span>
                        
                        <!-- Display the name of the option -->
                        <?= $item["name"] ?>

                        <!-- Checking if there is any sub menu -->
                        <?php if (isset($item["sub-menu"])) { ?>
                            <span class="material-symbols-outlined down-arrow">arrow_drop_down</span>
                        <?php } ?>

                    </div>

                    <?php if (isset($item["sub-menu"])) { ?>
                        <ul class="sub-menu-items">
                            <!-- Looping through available sub menu -->
                            <?php array_map(function($subMenu){ ?>
                                <li><?= $subMenu ?></li>
                            <?php }, $item["sub-menu"]) ?>

                        </ul>
                        <!-- Closing if Statement -->
                    <?php } ?>
                </li>
            
            <!-- Closing menu options loop -->
            <?php }, $menuItems); ?>
        </ul>
        
        <div class="footer">
            <span class="material-symbols-outlined">logout</span>
            Logout
        </div>

    </div>
</aside>
