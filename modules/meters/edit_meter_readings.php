<?php
require '../../includes/session_validator.php';

ob_start();

require '../../config/config.php';
require '../../functions/general_functions.php';

//$filter = clean($_GET['filter']);
$filter = 'All';

$filter === 'All' ? $filter = "" : $filter = 'AND billing_areas = ' . "'$filter' ";

$query_meter_reading = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number,
                               premise_status, appnt_post_addr, reading, met.met_id,
                               billing_date, initial_reading, reading_date, billing_areas
                          FROM customer cust
                     LEFT JOIN meter_reading metr
                            ON cust.cust_id = metr.cust_id
                    INNER JOIN billing_area ba
                            ON cust.ba_id = ba.ba_id
                    INNER JOIN applicant appnt
                            ON cust.appnt_id = appnt.appnt_id
                    INNER JOIN application appln
                            ON appln.appnt_id = appnt.appnt_id
                    INNER JOIN appnt_type apty
                            ON appnt.appnt_type_id = apty.appnt_type_id
                    INNER JOIN account acc
                            ON cust.cust_id = acc.cust_id
                    INNER JOIN meter met
                            ON metr.met_id = met.met_id
                               {$filter}
                         WHERE premise_status = 'Metered'
                           AND billing_date = (
                        SELECT MAX(billing_date)
                          FROM meter_reading)";

$result_meter_reading = mysql_query($query_meter_reading) or die(mysql_error());
$row_date = mysql_fetch_array($result_meter_reading);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT METER READINGS</title>
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

                $('#billing_area').change(function(){

                    getContent('edit_readings_listing.php', {filter: $(this).val()});
                });
            } );
        </script>

        <style type="text/css">

            #dataTable_wrapper tr.odd:hover {
                background-color: #fff;
                cursor: default;
            }

            #dataTable_wrapper tr.even:hover {
                color: #000;
                background-color: #f5f5f5;
                cursor: default;
            }

            .prev {
                border: none;
                background-color: transparent !important;
                color: inherit !important;
                width: 80px;
            }
        </style>
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
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a>
                        <ul>
                            <li><a href="add_meter.php">Add meter</a></li>
                            <li><a href="meter_readings.php">Meter readings</a></li>
                            <li><a href="#">Enter meter readings</a></li>
                            <li><a href="meter_sheet.php">Meter reading sheet</a></li>
                        </ul>
                    </li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Enter Meter Readings</h1>
                <div class="hr-line"></div>
                <div style="margin-bottom: 15px;">
                    <form>
                        <label> Billing Area/Zone
                            <select name="billing_area" class="select" value="<?php echo $row_date['billing_area'] ?>" required id="billing_area" >
                                <option value="">--Select billing area/zone--</option>
                                <?php
                                require '../../config/config.php';
                                $query = "SELECT billing_areas FROM billing_area ORDER BY billing_areas ASC";
                                $result = mysql_query($query) or die(mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['billing_areas'] ?>"><?php echo $row['billing_areas'] ?></option>
                                    <?php
                                }
                                mysql_close($conn);
                                ?>
                                <option value="All">All</option>
                            </select> &nbsp; &nbsp;
                            <?php
                            $prev_month = strtotime('-1 month', strtotime(date('Y-m-d')));
                            $prev_month = date('Y-m-d', $prev_month);
                            ?>
                            Reading Date <input type="date" name="reading_date[]" value ="<?php echo $row_date['reading_date']; ?>" max="<?php echo $prev_month ?>" form="readings" required class="text" style="width: 150px;" >
                            &nbsp; &nbsp;
                            Billing Month <input type="date" name="billing_date[]" value ="<?php echo $row_date['billing_date'] ?>" max="<?php echo $prev_month ?>" form="readings" required class="text" style="width: 150px;" >
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
