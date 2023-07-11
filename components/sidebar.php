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
            "iconText" => "ward"
        ],
        [
            "name" => "Bursary",
            "iconText" => "payments"
        ],
        [
            "name" => "Other Staff",
            "iconText" => "diversity_3"
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
