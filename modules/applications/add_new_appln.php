<?php require '../../includes/session_validator.php';
 ob_start();
 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | ADD APPLICATION</title>
        
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
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('#appnt_type').change(function(){
                    $.post('../../includes/service_nature.php',{appnt_type: $(this).val()},function(data){
                        $('#service_nature').html(data);
                    });     
                });
 
            });
            
             ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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
                // Displaying message and errors
                include '../../includes/info.php';
                require '../../config/config.php';

                date_default_timezone_set('Africa/Dar_es_Salaam');
                ?>
                <h1>Add New Application</h1>
                <div class="hr-line"></div>

                <form action="process_new_appln.php" method="post" >
                    <fieldset style="float: left">
                        <legend>Applicant Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Applicant Type</td>
                                <td>
                                    <select name="appnt_type" id="appnt_type" required class="select">
                                        <option value="">--select applicant type--</option>
                                        <?php
                                        $result = mysql_query("SELECT * FROM appnt_type ORDER BY appnt_types ASC") or die(mysql_error());
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['appnt_type_id'] ?>"><?php echo $row['appnt_types'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Full Name</td>
                                <td><input type="text" name="appnt_fullname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Occupants/No of people</td>
                                <td><input type="number" name="occupants" required min="0" class="number" style="width: 70px;"></td>
                            </tr>
                            <tr>
                                <td width="170">Phone Number</td>
                                <td><input type="tel" name="appnt_tel" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Postal Address</td>
                                <td><input type="text" name="appnt_post_addr" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Physical Address</td>
                                <td><input type="text" name="appnt_phy_address" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Block Number</td>
                                <td><input type="text" name="block_no" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Plot Number</td>
                                <td><input type="text" name="plot_no" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Living Area</td>
                                <td><input type="text" name="living_area" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Living Town</td>
                                <td><input type="text" name="living_town" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Billing Area/Zone</td>
                                <td><select name="billing_area" class="select" required>
                                        <option value="">--select technical area/zone--</option>
                                        <?php
                                        $result = mysql_query("SELECT * FROM billing_area ORDER BY billing_areas ASC") or die(mysql_error());
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['ba_id'] ?>"><?php echo $row['billing_areas'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset style="float: left">
                        <legend>Application Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Application Date</td>
                                <td><input type="date" name="appln_date" max="<?php echo date('Y-m-d'); ?>"
                                           value="<?php echo date('Y-m-d'); ?>" required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Application Type</td>
                                <td>
                                    <label><input type="checkbox" name="water" value="Clean water" required class="checkbox">Clean water</label>&nbsp;&nbsp;
                                    <label><input type="checkbox" name="sewer" value="Sewer" required class="checkbox">Sewer</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Inspected By</td>
                                <td><input type="text" name="inspected_by" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Surveyed Date</td>
                                <td><input type="date" name="surveyed_date" max="<?php echo date('Y-m-d'); ?>"
                                           required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Engineer Approval</td>
                                <td>
                                    <label><input type="radio" name="engeneer_appr" value="Yes" required class="radio">Yes</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="engeneer_appr" value="No" required class="radio">No</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Approved Date</td>
                                <td><input type="date" name="approved_date" max="<?php echo date('Y-m-d'); ?>"
                                           required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Premises Nature</td>
                                <td>
                                    <label><input type="radio" name="premise_nature" value="Residential" required class="radio">Residential</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="premise_nature" value="Institution" required class="radio">Institution</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="premise_nature" value="Business" required class="radio">Business</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Service Nature</td>
                                <td><span id="service_nature">
                                        <select name="service_nature" class="select" required >
                                            <option value="">--select service nature--</option>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <table width="531" style="clear: both">
                        <tr>
                            <td width="212">&nbsp;</td>
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
