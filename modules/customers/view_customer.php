<?php require '../../includes/session_validator.php'; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | CUSTOMERS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });
            });
            
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [3], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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
                require '../../functions/general_functions.php';

                if (isset($_GET['id']) && !empty($_GET['id'])) {

                    // Getting user data form the database
                    require '../../config/config.php';


                    $id = clean($_GET['id']);

                    $query_customer = "SELECT cust.cust_id,  appnt_types, appnt_fullname, plot_no,
                                            service, billing_areas,  acc_no,met_number, premise_status, billing_areas, 
                                            occupants,appnt_tel,appnt_post_addr,appnt_phy_addr, living_area, living_town
                                           
                                      FROM customer cust
                                 LEFT JOIN applicant appnt
                                        ON cust.appnt_id = appnt.appnt_id
                                 LEFT JOIN appnt_type apnty
                                        ON appnt.appnt_type_id = apnty.appnt_type_id
                                 LEFT JOIN application appln
                                        ON appnt.appnt_id = appln.appnt_id
                                 LEFT JOIN service_nature sev
                                        ON appln.service_nature_id = sev.service_nature_id
                                 LEFT JOIN billing_area ba
                                        ON cust.ba_id = ba.ba_id	
                                 LEFT JOIN account acc
				        ON cust.cust_id = acc.cust_id 
                                 LEFT JOIN meter met
                                        ON cust.met_id = met.met_id
                                     WHERE cust.cust_id = 2";

                    $result_customer = mysql_query($query_customer) or die(mysql_error());
                    $row = mysql_fetch_array($result_customer);
                    $num_row = mysql_num_rows($result_customer);

                    if ($num_row > 0) {
                        ?>
                        <h1><?php echo $row['appnt_fullname'] ?> Customer</h1>


                        <div class="hr-line"></div>
                        <fieldset style="float: left">
                            <legend>Customer</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="170">Acc No:</td>
                                    <td><strong><?php echo $row['acc_no'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Customer Name:</td>
                                    <td><strong><?php echo $row['appnt_fullname'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Occupants/No of people:</td>
                                    <td><strong><?php echo $row['occupants'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Phone Number:</td>
                                    <td><strong><?php echo $row['appnt_tel'] ?></strong></td>
                                <tr>
                                    <td width="170">Post Adress:</td>
                                    <td><strong><?php echo $row['appnt_post_addr'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Physical Adress:</td>
                                    <td><strong><?php echo $row['appnt_phy_addr'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Living Area:</td>
                                    <td><strong><?php echo $row['living_area'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Plot No:</td>
                                    <td><strong><?php echo $row['plot_no'] ?></strong></td>
                                </tr>

                                <tr>
                                    <td width="170">Living Town:</td>
                                    <td><strong><?php echo $row['living_town'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Service Type:</td>
                                    <td><strong><?php echo $row['appnt_types'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Service nature:</td>
                                    <td><strong><?php echo $row['service'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Premise Status:</td>
                                    <td><strong><?php echo $row['premise_status'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Meter No:</td>
                                    <td><strong><?php echo $row['met_number'] ?></strong></td>
                                </tr>


                                <tr>
                                    <td width="170">Billing Area:</td>
                                    <td><strong><?php echo $row['billing_areas'] ?></strong></td>
                                </tr>
                            </table>
                            </tr>
                            </table>
                        </fieldset>
                        <?php
                    } else {
                        info('error', 'No records for this customer');
                        header('Location: customers.php');
                    }
                } else {
                    info('error', 'Customer id not provided. Please try again');
                    header('Location: customers.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
