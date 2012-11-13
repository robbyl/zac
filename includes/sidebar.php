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
    // Data entry access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "ZAC HQ M&E STAFF" ||
            $_SESSION['role'] === "ZAC PEMBA M&E STAFF" ||
            $_SESSION['role'] === "DISTRICT DHAP AND STAFF"
    ) {
        ?>

        <h3 class="menuheader expandable data-entry">Data Entry</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/data/data_entry.php" >Add various data</a></li>
        </ul>

        <?php
    }
    ?>

    <h3 class="menuheader expandable printouts">Printouts</h3>
    <ul class="categoryitems">
        <li><a href="../../modules/printouts/printouts.php" >Print records</a></li>
    </ul>
</div>
<?php session_commit(); ?>
