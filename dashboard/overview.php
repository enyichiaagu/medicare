<?php require_once('../index.php') ?>

<?= generatePageHead('Overview') ?>

<h1>
    <?= count(explode('/', $_SERVER['PHP_SELF'])) ?>
</h1>

<?= generatePageFoot() ?>