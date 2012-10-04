<?php
require '../../includes/session_validator.php';
ob_start();
// Getting user data

require '../../config/config.php';

$query_meter = "SELECT *
                  FROM meter";

$result_meter = mysql_query($query_meter) or die(mysql_error());
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | USERS</title>
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
        <script type="text/javascript">

            $(document).ready(function() {
                oTable = $('#dataTable').dataTable({
                    "bJQueryUI": true,
                    "bScrollCollapse": true,
                    "sScrollY": "600px",
                    "bAutoWidth": false,
                    "bPaginate": true,
                    "sPaginationType": "full_numbers", //full_numbers,two_button
                    "bStateSave": true,
                    "bInfo": true,
                    "bFilter": true,
                    "iDisplayLength": 25,
                    "bLengthChange": true,
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
                });

                $('#select-all').click(function(){
                    // Iterate each check box

                    if(this.checked){
                        $(':checkbox').each(function(){
                            this.checked = true;
                        });
                    } else {
                        $(':checkbox').each(function(){
                            this.checked = false;
                        });
                    }
                });

                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
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
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="#" class="meters">Water Meters</a>
                        <ul>
                            <li><a href="add_meter.php">Add meter</a></li>
                            <li><a href="meter_readings.php">Meter readings</a></li>
                            <li><a href="enter_meter_readings.php">Enter meter readings</a></li>
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
                <h1>Water meters</h1>
                <div class="hr-line"></div>
                <form action="action.php" method="post" onSubmit="">
                    <div class="actions">
                        <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT">Edit</button>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="23">
                                    <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                                </th>
                                <th>Meter number</th>
                                <th>Meter type</th>
                                <th>size</th>
                                <th>Number of digits</th>
                                <th>Initial reading (m<sup>3</sup>)</th>
                                <th>Added date</th>
                                <th>Meter status</th>
                                <th>Availability</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysql_fetch_array($result_meter)) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $row['met_id'] ?>" id="<?php echo $row['met_id'] ?>">
                                    </td>
                                    <td><?php echo $row['met_number'] ?></td>
                                    <td><?php echo $row['met_type'] ?></td>
                                    <td><?php echo $row['met_size'] ?></td>
                                    <td><?php echo $row['no_digits'] ?></td>
                                    <td><?php echo $row['initial_reading'] ?></td>
                                    <td><?php echo $row['added_date'] ?></td>
                                    <td><?php echo $row['met_status_id'] ?></td>
                                    <td><?php echo $row['availability'] ?></td>
                                    <td><?php echo $row['remarks'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>
