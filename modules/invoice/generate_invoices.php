<?php require '../../includes/session_validator.php'; ?>

<?php
// Getting the last billing month
require '../../config/config.php';
require '../../functions/general_functions.php';

$query_billing_moth = "SELECT MAX(invoicing_date) AS last_billing
                         FROM invoice";

$result_billing_month = mysql_query($query_billing_moth) or die(mysql_error());

$row_last_billing = mysql_fetch_array($result_billing_month);

$last_billing = $row_last_billing['last_billing'];

if (!empty($last_billing)) {

    $min_billing_date = strtotime(date("Y-m-d", strtotime($last_billing)) . "+1 month");
    $fmin_billing_date = date('Y-m-d', $min_billing_date);
} else {

    $fmin_billing_date = "";
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | GENERATE INVOICES</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <style type="text/css">
            textarea {
                font: inherit !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');  
                });     
                
                $('#invoicing').submit(function(){
                    var billDate = $('#billing_date').val();
                    var confirmed = confirm('You are About to Generate Bills for the month ' + billDate + ' Are you Sure?');
                    return confirmed;
                });
            });
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
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a>
                        <ul>
                            <li><a href="#">Generate Invoices</a></li>
                        </ul>
                    </li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Generate Monthly Invoices</h1>
                <div class="hr-line"></div>
                <form action="process_invoicing.php" method="post" id="invoicing">
                    <fieldset>
                        <legend>Invoicing details</legend>
                        <table width="" border="0" cellpadding="5">
<!--                            <tr>
        <td width="170">Charge Date</td>
        <td><input type="date" name="charge_date" class="text" required></td>
    </tr>
    <tr>
        <td width="170">Last Receipting Date</td>
        <td><input type="date" name="last_receipting_date" class="text" required></td>
    </tr>-->
                            <tr>
                                <td width="170">Billing Month</td>
                                <td><input type="date" min="<?php echo $fmin_billing_date; ?>" id="billing_date" name="billing_month" class="text" required></td>
                            </tr>
                        </table>
                    </fieldset>
                    <table width="531">
                        <tr>
                            <td width="212">&nbsp;</td>
                            <td width="307"><button type="submit" >Generate</button>
                                <button type="reset">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
