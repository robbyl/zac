<?php
require '../../includes/session_validator.php';

ob_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | APPLICATIONS</title>
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
                    "sScrollY": "auto",
                    "bAutoWidth": true,
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
        <script type="text/javascript">
            function consumptions(){

                var curr = document.readings.elements["curr_reading[]"];
                var prev = document.readings.elements["prev_reading[]"];
                var cons = document.readings.elements["cons[]"];

                for(i=0;i<curr.length;i++){

                    var diff = curr[i].value - prev[i].value;
                    if(diff >= 0){
                        cons[i].value = diff;
                    } else {
                        cos[i].value = "";
                    }
                }
            }
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
                    <li> <a href="../paypoint/paypoint.php" class="financial">Paypoint</a> </li>
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
                        <lable > Enter Readings by
                            <select class="select" style="font-size: 90%" required >
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
                            <?php
                            require '../../config/config.php';

                            $query_meter_reading = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number,
                               premise_status, appnt_post_addr, reading, met.met_id,
                               billing_date, initial_reading
                          FROM customer cust
                     LEFT JOIN meter_reading metr
                            ON cust.cust_id = metr.cust_id
                    INNER JOIN applicant appnt
                            ON cust.appnt_id = appnt.appnt_id
                    INNER JOIN application appln
                            ON appln.appnt_id = appnt.appnt_id
                    INNER JOIN appnt_type apty
                            ON appnt.appnt_type_id = apty.appnt_type_id
                    INNER JOIN account acc
                            ON cust.cust_id = acc.cust_id
                    INNER JOIN meter met
                            ON cust.met_id = met.met_id";

                            $result_meter_reading = mysql_query($query_meter_reading) or die(mysql_error());
                            ?>
                            <form action="process_meter_reading.php" method="post" name="readings" id="readings" oninput="consumptions()" >
                                <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th width="23" title="Serial No." class="tooltip">
                                                SN
                                            </th>
                                            <th title="Account number" class="tooltip">Account No.</th>
                                            <th title="Meter number" class="tooltip">Meter No.</th>
                                            <th>Customer name</th>
                                            <th>Post address</th>
                                            <th title="Previous reading" class="tooltip">Prev reading</th>
                                            <th title="Current reading" class="tooltip">Curr reading</th>
                                            <th>Consumption</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SN = 1;
                                        while ($row = mysql_fetch_array($result_meter_reading)) {
                                            ?>
                                            <tr>
                                        <input type="hidden" name="cust_id[]" value="<?php echo $row['cust_id'] ?>" >
                                        <input type="hidden" name="met_id[]" value="<?php echo $row['met_id'] ?>" >
                                        <td><?php echo $SN ?></td>
                                        <td><?php echo $row['acc_no'] ?></td>
                                        <td><?php echo $row['met_number'] ?></td>
                                        <td><?php echo $row['appnt_fullname'] ?></td>
                                        <td><?php echo $row['appnt_post_addr'] ?></td>
                                        <td>
                                            <input type="text" name="prev_reading[]" value="<?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?>" disabled class="prev" >
                                        </td>
                                        <td>
                                            <input type="number" name="curr_reading[]" min="<?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?>" required class="number" style="width: 100px;">
                                        </td>
                                        <td><output name="cons[]" ></output></td>
                                        <td>
                                            <input type="text" name="remarks[]" class="text" style="width: 200px;">
                                        </td>
                                        </tr>
                                        <?php
                                        $SN++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table width="531">
                                    <tr>
                                        <td width="307"><button type="submit">Save</button>
                                            <button type="reset">Reset</button></td>
                                    </tr>
                                </table>
                            </form>
                            <!-- end .content --></div>
                            <?php include '../../includes/footer.php'; ?>
                            <!-- end .container --></div>
                            </body>
                            </html>
                            <?php ob_flush(); ?>