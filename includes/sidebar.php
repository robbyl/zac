<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php session_start(); ?>
<div class="arrowlistmenu">
    <a href="../../home.php"><h3 class="menuheader home">Home</h3></a>
    <?php
    if (
    // Manage users and settings access
            $_SESSION['role'] === "ROOT"
    ) {
        ?>
        <h3 class="menuheader expandable users">Manage Users</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/users/new_user.php">Add new user</a></li>
            <li><a href="../../modules/users/users.php">View users</a></li>
        </ul>

        <h3 class="menuheader expandable settings">Settings</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/settings/settings.php" >General settings</a></li>
        </ul>

        <h3 class="menuheader expandable backups">Backups</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/backups/backups.php" >View backups</a></li>
        </ul>
        <?php
    }

    if (
    // Customer access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "ACCOUNTANT" ||
            $_SESSION['role'] === "BILLING OFFICER" ||
            $_SESSION['role'] === "CREDIT CONTROLLER"
    ) {
        ?>

        <h3 class="menuheader expandable data-entry">Data Entry</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/data/data_entry.php" >Add various data</a></li>
        </ul>

        <?php
    }
    if (
    // Water meter access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "BILLING OFFICER"
    ) {
        ?>

        <h3 class="menuheader expandable printouts">Printouts</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/printouts/printouts.php" >Print records</a></li>
        </ul>

    <?php } ?>
</div>
<?php session_commit(); ?>
