<?php

    // Creating an array with the menu list and sub lists
    $menuItems = [
        [
            "name" => "Overview",
            "iconText" => "dashboard",
            "url" => "overview"
        ],
        [
            "name" => "Appointments",
            "iconText" => "calendar_month",
            "url" => "appointments",
            "sub-menu" => [
                [
                    "title" => "Create New Appointment",
                    "url" => "create-appointment"
                ],
                [
                    "title" => "Find Appointment",
                    "url" => "list-appointments"
                ]
            ]
        ],
        [
            "name" => "Patients",
            "iconText" => "person",
            "url" => "patients",
            "sub-menu" => [
                [
                    "title" => "Add New Patient",
                    "url" => "add-patient"
                ],
                [
                    "title" => "Find Patient",
                    "url" => "list-patients"
                ],
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
            "sub-menu" => [
                [
                    "title" => "List Appointments",
                    "url" => "list-appointments"
                ],
                [
                    "title" => "List Available Doctors",
                    "url" => "list-doctors"
                ]
            ]
        ],
        [
            "name" => "Pharmacy",
            "iconText" => "medication",
            "url" => "pharmacy"
        ],
        [
            "name" => "Laboratory",
            "iconText" => "biotech",
            "url" => "laboratory"
        ],
        [
            "name" => "Ward",
            "iconText" => "ward",
            "url" => "ward"
        ],
        [
            "name" => "Bursary",
            "iconText" => "payments",
            "url" => "bursary"
        ],
        [
            "name" => "Other Staff",
            "iconText" => "diversity_3",
            "url" => "staff"
        ]
    ];

    function isCurrentPage($url) {
        return '/medicare/' . $url . '.php' === $_SERVER['REQUEST_URI'];
    }

?>
<aside class="sidebar">
    <div class="menu-options">
        <div class="list-container">
            <nav>
                <ul class="navigation">
                    <!-- Looping through every item in the menu -->
                    <?php array_map(function($item) { ?>

                        <li>
                            <a href="<?= isset($item["sub-menu"]) ? '#' : $item["url"].'.php' ?>">
                                <div class="option-display <?= isset($item["url"]) && isCurrentPage($item["url"]) ? 'active-link': '' ?>">
                                    
                                    <!-- Display the icon text -->
                                    <span class="material-symbols-outlined"><?= $item["iconText"] ?></span>
                                    
                                    <!-- Display the name of the option -->
                                    <?= $item["name"] ?>

                                    <!-- Checking if there is any sub menu -->
                                    <?php if (isset($item["sub-menu"])) { ?>
                                        <span class="material-symbols-outlined down-arrow">arrow_drop_down</span>
                                    <?php } ?>

                                </div>
                            </a>

                            <?php if (isset($item["sub-menu"])) { ?>
                                <ul class="sub-menu-items">
                                    <!-- Looping through available submenu -->
                                    <?php array_map(function($subMenu) use ($item) { ?>
                                        <li>
                                            <a href="<?= $item["url"].'/'.$subMenu["url"].'.php' ?>">
                                                <?= $subMenu["title"] ?>
                                            </a>
                                        </li>
                                    <?php }, $item["sub-menu"]) ?>

                                </ul>
                                <!-- Closing if Statement -->
                            <?php } ?>
                        </li>
                    
                    <!-- Closing menu options loop -->
                    <?php }, $menuItems); ?>
                </ul>
            </nav>
        </div>
        
        <form class="footer" method="POST" action="./overview.php">
            <button type="submit" name="logout" value="Logout">
                <span class="material-symbols-outlined">logout</span>
                Logout
            </button>
        </form>

    </div>
</aside>
