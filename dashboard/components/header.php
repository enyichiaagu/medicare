<header>
    <div class="header-align-center close-button">
        <span class="material-symbols-outlined">
            menu
        </span>
    </div>
    <div>
        <h1 class="logo-text"><span id="med">Med</span><span id="icare">icare</span></h1>
    </div>
    <div class="header-align-center">
        <span class="material-symbols-outlined">
            account_circle
        </span>
        <div class="profile">
            <span class="staff-name secondary-text"><?= $_SESSION['user']['full_name'] ?></span>
            <span class="position-name"><?= $_SESSION['user']['position'] ?></span>
        </div>
    </div>
</header>