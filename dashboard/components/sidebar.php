<?php
    // Creating an array with the menu list and sub lists
    global $page_structure;

    $menuItems = array_filter($page_structure, function ($category){
        if (isset($category['permission']) && $_SESSION['user']['unit'] !== 'management') {
            return stripos($category['permission'], $_SESSION['user']['unit']) !== false;
        }
        return true;
    });

    function isCurrentPage($url) {
        return '/medicare/dashboard/' . $url . '.php' === $_SERVER['REQUEST_URI'];
    }

    function isCurrentSubPage($folder, $url) {
        return '/medicare/dashboard/' . $folder . '/' . $url . '.php' === $_SERVER['REQUEST_URI'];
    }

    function isCurrentSet($folder) {
        return $folder === explode('/', $_SERVER['REQUEST_URI'])[3];
    }

?>
<aside class="sidebar">
    <div class="list-container">
        <nav>
            <ul class="navigation">
                <!-- Looping through every item in the menu -->
                <!-- $path comes from index.php -->
                <?php array_map(function($item) use ($path) { ?>

                    <li>
                        <a href="<?= isset($item["sub-menu"]) ? '#' : $path.'/'.$item["url"].'.php' ?>">
                            <div 
                                class="option-display 
                                <?php echo 
                                    (isCurrentPage($item["url"]) || isCurrentSet($item["url"])) ? 
                                    'active-link': 
                                    '' 
                                ?>"
                            >
                                
                                <!-- Display the icon text -->
                                <span class="material-symbols-outlined"><?= $item["iconText"] ?></span>
                                
                                <!-- Display the name of the option -->
                                <?= $item["name"] ?>

                                <!-- Checking if there is any sub menu -->
                                <?php if (isset($item["sub-menu"])) { ?>
                                    <span 
                                        class="material-symbols-outlined down-arrow"><?= isCurrentSet($item["url"]) ? 'arrow_drop_up' : 'arrow_drop_down' ?>
                                    </span>
                                <?php } ?>

                            </div>
                        </a>

                        <?php if (isset($item["sub-menu"])) { ?>
                            <ul class="sub-menu-items <?= isCurrentSet($item["url"]) ? 'sub-menu-open' : '' ?>">
                                <!-- Looping through available submenu -->
                                <?php array_map(function($subMenu) use ($item, $path) { ?>

                                    <li <?= isCurrentSubPage($item["url"], $subMenu["url"]) ? 'class="active-sub-link"' : '' ?>>

                                        <a href="<?= $path.'/'.$item["url"].'/'.$subMenu["url"].'.php' ?>">

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
    
    <form class="footer" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <button type="submit" name="logout" value="Logout">
            <span class="material-symbols-outlined">logout</span>
            Logout
        </button>
    </form>
</aside>
