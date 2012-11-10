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
            <li><a href="../../modules/settings/tariffs.php">Tariffs</a></li>
        </ul>
        <?php
    }

    if (
    // Application access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "CONNECTION OFFICER"
    ) {
        ?>

        <h3 class="menuheader expandable applications">Applications</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/applications/add_new_appln.php" >Add application</a></li>
            <li><a href="../../modules/applications/view_application.php">View applications</a></li>
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

        <h3 class="menuheader expandable customers">Customers</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/customers/customers.php" >View customers</a></li>
            <li><a href="../../modules/customers/customer_status.php" >Customer status</a></li>
        </ul>

        <?php
    }
    if (
    // Water meter access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "BILLING OFFICER"
    ) {
        ?>

        <h3 class="menuheader expandable meters">Water Meters</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/meters/add_meter.php" >Add meter</a></li>
            <li><a href="../../modules/meters/meter_readings.php">View meter readings</a></li>
            <li><a href="../../modules/meters/enter_meter_readings.php">Enter meter readings</a></li>
            <li><a href="../../modules/meters/meter_sheet.php">Print reading sheets</a></li>
        </ul>

        <?php
    }
    if (
    // Sales access
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "BILLING OFFICER" ||
            $_SESSION['role'] === "ACCOUNTANT"
    ) {
        ?>

        <h3 class="menuheader expandable invoices">Sales</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/invoice/generate_invoices.php" >Generate invoices</a></li>
            <li><a href="../../modules/invoice/invoices.php">View invoices</a></li>
        </ul>
        <?php
    }
    if (
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] == "CASHIER"
    ) {
        ?>

        <h3 class="menuheader expandable financial">Pay Point</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/paypoint/online_payments.php" >Online payments</a></li>
            <li><a href="../../modules/paypoint/offline_payments.php">Offline payments</a></li>
            <li><a href="../../modules/paypoint/transactions.php">Transactions</a></li>
        </ul>

        <?php
    }
    if (
    // Adjustments access.
            $_SESSION['role'] === "ROOT" ||
            $_SESSION['role'] === "CREDIT CONTROLLER" ||
            $_SESSION['role'] === "ACCOUNTANT" ||
            $_SESSION['role'] === "BILLING OFFICER"
    ) {
        ?>

        <h3 class="menuheader expandable adjustment">Adjustments</h3>
        <ul class="categoryitems">
            <li><a href="../../modules/adjustments/perform_adjustments.php">Perform adjustments</a></li>
            <li><a href="../../modules/adjustments/view_adjustments.php" >View adjustments</a></li>
        </ul>
    <?php } ?>

    <h3 class="menuheader expandable reports" >Report Manager</h3>
    <ul class="categoryitems">
        <li><a href="../../modules/report/reports.php" >Generate reports</a></li>
    </ul>
</div>
<?php session_commit(); ?>
