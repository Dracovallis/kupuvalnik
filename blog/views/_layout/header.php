<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/users-styles.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>

    <div class="navigation-links">
    <a href="<?=APP_ROOT?>/">Home</a>
    <?php if ($this->isLoggedIn) : ?>
        <a href="<?=APP_ROOT?>/items">Items</a>
        <a href="<?=APP_ROOT?>/items/create">Create Item</a>
        <a href="<?=APP_ROOT?>/users">Users</a>
    <?php else: ?>
        <a href="<?=APP_ROOT?>/users/login">Login</a>
        <a href="<?=APP_ROOT?>/users/register">Register</a>
    <?php endif; ?>
    </div>
    <a class="site-logo" href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/kradenobg-logo.png"></a>
    <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <a href="<?= APP_ROOT ?>/users/info">
            <div class="current-user-icon-container"><img class="current-user-icon" src="<?=APP_ROOT?>/content/images/user.png" alt="user"></div> <div class="current-user-text-container"><span class="current-user-text" ><b><?=htmlspecialchars($_SESSION['username'])?></b></span></div></a>
            <form method="post" action="<?=APP_ROOT?>/users/logout">
                <input type="submit" value="Logout"/>
            </form>
        </div>
    <?php endif; ?>
</header>

<?php require_once('show-notify-messages.php'); ?>
