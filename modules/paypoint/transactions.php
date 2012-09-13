<?php
require '../../includes/session_validator.php';

ob_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | INVOICES</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/data_table.css" rel="stylesheet" type="text/css">
        <link href="../../css/jquery.ui.theme.css" rel="stylesheet" type="text/css">
        <link href="../../css/ui_darkness.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {

                $('#enter_by').click(function(){
                    getContent('invoices.php');
                });
            } );
        </script>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a></li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a>
                        <ul>
                            <li><a href="online_payments.php">Online payments</a></li>
                            <li><a href="offline_payments.php">Offline payments</a></li>
                            <li><a href="#">Transactions</a></li>
                        </ul>
                    </li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Transactions</h1>
                <div class="hr-line"></div>
                <div style="margin-bottom: 15px;">
                    <form>
                        <label>Readings by
                            <select class="select" style="font-size: 90%" required id="enter_by" >
                                <option value="">--Select one--</option>
                            </select> &nbsp; &nbsp;
                            <?php
                            $prev_month = strtotime('-1 month', strtotime(date('Y-m-d')));
                            $prev_month = date('Y-m-d', $prev_month);
                            ?>
                            Reading Date <input type="date" name="reading_date" max="<?php echo date('Y-m-d') ?>" form="readings" required class="text" style="width: 150px;" >
                            &nbsp; &nbsp;
                            Billing Month <input type="date" name="billing_date" max="<?php echo $prev_month ?>" form="readings" required class="text" style="width: 150px;" >
                        </label>
                    </form>
                </div>
                <div id="listing">

                    <!-- end #listing --></div>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>