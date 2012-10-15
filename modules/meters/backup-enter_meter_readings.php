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
        <script src="../../js/accordion.js" type="text/javascript"></script>
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
            
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [4], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: true, //Should contents open by default be animated into view?
                persiststate: false, //persist state of opened contents within browser session?
                toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            })
            
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

                    <h3 class="menuheader expandable reports">Report Manager</h3>
                    <ul class="categoryitems">
                        <li><a href="../../modules/report/reports.php" >Generate reports</a></li>
                    </ul>
                </div>
                <?php session_commit(); ?>
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
                                            <input type="text" name="prev_reading[]" value="<?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['in itial_reading']; ?>" disabled class="prev" >
                                        </td>
                                        <td>
                                            <
                                            input type="number" name="curr_reading[]" min="<?php
                                        if (!empty($row['reading']))
                                            echo $row['reading'];
                                        else
                                            echo $row['initial_readin g'];
                                            ?>" required class="number" style="width: 100px;">
                                        </td>
                                        <td><output name="cons[]" ></output></td>
                                        <td>
                                            <input type="
                                                   text" name="remarks[]" class="text" style="width: 200px;">
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