<?php require '../../includes/session_validator.php';
ob_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT APPLICATION</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
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

            function service(){

                $.post('../../includes/service_nature.php',{appnt_type: $('#appnt_type').val(), appln_id: $('#appln_id').val()},function(data){
                    $('#service_nature').html(data);
                });
            }
            
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

    <body onLoad="service()">
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
                ?>
                <h1>Edit Application Details</h1>
                <div class="hr-line"></div>
                <form action="process_edit_appln.php" method="post">
                    <?php
                    require '../../functions/general_functions.php';

                    // Getting user details from the database.
                    if (!empty($_POST['checkbox'])) {

                        require '../../config/config.php';

                        $i = 0;

                        while (list($key, $val) = each($_POST['checkbox'])) {

                            // Getting applicantion data form the database

                            $query_appln = "SELECT appln_id, appln_type, appln_date, engeneer_appr, appnt.appnt_id,
                                                   appnt_fullname, appnt.appnt_type_id, approved_date, inspected_by,
                                                   premise_nature, surveyed_date, service_nature_id, occupants,
                                                   appnt_tel, appnt_post_addr, appnt_phy_addr, block_no, plot_no,
                                                   living_area, living_town,  billing_areas, ba.ba_id
                                              FROM application appln
                                         LEFT JOIN applicant appnt
                                              ON appln.appnt_id = appnt.appnt_id
                                          LEFT JOIN billing_area ba
                                              ON ba.ba_id = appnt.ba_id
                                         LEFT JOIN appnt_type apnty
                                                ON appnt.appnt_type_id = apnty.appnt_type_id
                                             WHERE appln_id = '$val'";

                            $result_appln = mysql_query($query_appln) or die(mysql_error());
                            $row = mysql_fetch_array($result_appln);
                            ?>
                            <h3><?php echo $row['appnt_fullname'] ?> Application Details</h3>
                            <input type="hidden" name="appln_id[]" value="<?php echo $val ?>" id="appln_id">
                            <input type="hidden" name="ba_id[]" value="<?php echo $row['ba_id'] ?>" id="ba_id">

                            <fieldset style="float: left">
                                <legend>Applicant Details</legend>
                                <input type="hidden" name="appnt_id[]" value="<?php echo $val ?>" id="appnt_id">
                                <table width="" border="0" cellpadding="5">
                                    <tr>
                                        <td width="170">Applicant Type</td>
                                        <td><select name="appnt_type[]" id="appnt_type" required class="select">
                                                <option value="">--select Applicant type--</option>
                                                <?php
                                                $result_type = mysql_query("SELECT * FROM appnt_type ORDER BY appnt_types ASC") or die(mysql_error());
                                                while ($row_type = mysql_fetch_array($result_type)) {
                                                    ?>
                                                    <option value="<?php echo $row_type['appnt_type_id'] ?>" <?php if ($row_type['appnt_type_id'] === $row['appnt_type_id']) echo 'selected'; ?> >
                                                        <?php echo $row_type['appnt_types'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Full Name</td>
                                        <td><input type="text" name="appnt_fullname[]" value="<?php echo $row['appnt_fullname'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Occupants/No of people</td>
                                        <td><input type="number" name="occupants[]" required value="<?php echo $row['occupants'] ?>" min="0" class="number" style="width: 70px;"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Phone Number</td>
                                        <td><input type="tel" name="appnt_tel[]" value="<?php echo $row['appnt_tel'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Postal Address</td>
                                        <td><input type="text" name="appnt_post_addr[]" value="<?php echo $row['appnt_post_addr'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Physical Address</td>
                                        <td><input type="text" name="appnt_phy_addr[]" value="<?php echo $row['appnt_phy_addr'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Block Number</td>
                                        <td><input type="text" name="block_no[]" value="<?php echo $row['block_no'] ?>"  required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Plot Number</td>
                                        <td><input type="text" name="plot_no[]" value="<?php echo $row['plot_no'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Living Area</td>
                                        <td><input type="text" name="living_area[]" value="<?php echo $row['living_area'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Living Town</td>
                                        <td><input type="text" name="living_town[]" value="<?php echo $row['living_town'] ?>" required size="255" class="text"></td>
                                    </tr>

                                    <tr>
                                        <td width="170">Billing Area/Zone</td>
                                        <td><select name="billing_area[]" class="select" required>
                                                <option value="">--select technical area/zone--</option>
                                                <?php
                                                $result = mysql_query("SELECT * FROM billing_area ORDER BY billing_areas ASC") or die(mysql_error());
                                                while ($row_ba = mysql_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row_ba['ba_id'] ?>"
                                                            <?php if ($row['ba_id'] === $row_ba['ba_id']) echo 'selected'; ?>>
                                                                <?php echo $row_ba['billing_areas'] ?>
                                                    </option>
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
                                        <td>
                                            <input type="date" name="appln_date[]" max="<?php echo date('Y-m-d'); ?>"
                                                   required autocomplete="off" class="text" value="<?php echo $row['appln_date'] ?>" style="text-align: left">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="170">Application Type</td>
                                        <td>
                                            <label><input type="checkbox" name="water[]" <?php if ($row['appln_type'] === "Clean water") echo 'checked'; ?> value="Clean water">Clean water</label>&nbsp;&nbsp;
                                            <label><input type="checkbox" name="water[]" <?php if ($row['appln_type'] === "Sewer") echo 'checked'; ?> value="Sewer">Sewer</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="170">Inspected By</td>
                                        <td><input type="text" name="inspected_by[]" value="<?php echo $row['inspected_by'] ?>" required size="255" class="text"></td>
                                    </tr>

                                    <tr>
                                        <td width="170">Surveyed Date</td>
                                        <td><input type="date" name="surveyed_date[]" value="<?php echo $row['surveyed_date'] ?>" max="<?php echo date('Y-m-d'); ?>"
                                                   required autocomplete="off" class="text" style="text-align: left"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Engineer Approval</td>
                                        <td>
                                            <label><input type="radio" <?php if ($row['engeneer_appr'] === "Yes") echo 'checked' ?> name="<?php echo 'engeneer_appr[' . $i . ']' ?>" value="Yes">Yes</label>&nbsp;&nbsp;
                                            <label><input type="radio" <?php if ($row['engeneer_appr'] === "No") echo 'checked' ?> name="<?php echo 'engeneer_appr[' . $i . ']' ?>" value="No">No</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="170">Approved Date</td>
                                        <td><input type="date" name="approved_date[]" value="<?php echo $row['approved_date'] ?>" max="<?php echo date('Y-m-d'); ?>"
                                                   required autocomplete="off" class="text" style="text-align: left"></td>
                                    </tr>

                                    <tr>
                                        <td width="170">Premises Nature</td>
                                        <td>
                                            <label><input type="radio" name="<?php echo 'premise_nature[' . $i . ']' ?>" <?php if ($row['premise_nature'] === "Residential") echo 'checked'; ?> value="Residential" required class="radio">Residential</label>&nbsp;&nbsp;
                                            <label><input type="radio" name="<?php echo 'premise_nature[' . $i . ']' ?>" <?php if ($row['premise_nature'] === "Institution") echo 'checked'; ?> value="Institution" required class="radio">Institution</label>&nbsp;&nbsp;
                                            <label><input type="radio" name="<?php echo 'premise_nature[' . $i . ']' ?>" <?php if ($row['premise_nature'] === "Business") echo 'checked'; ?> value="Business" required class="radio">Business</label>
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

                            <div class="hr-line" style="width: 97%; background: #e0e0e0; margin: 15px 5px; clear: both"></div>

                            <?php
                            $i++;
                        }
                        ?>
                        <table width="531" style="clear: both">
                            <tr>
                                <td width="212">&nbsp;</td>
                                <td width="307"><button type="submit">Save</button>
                                    <button type="reset">Reset</button></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                } else {
                    info('error', 'Please select appln first');
                    header('Location: applications.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
