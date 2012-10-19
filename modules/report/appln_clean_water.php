<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
require '../../includes/session_validator.php';
require '../../config/config.php';
require '../../functions/general_functions.php';


$query_authority = "SELECT aut_name,logo 
                      FROM settings";
$result_authority = mysql_query($query_authority) or die(mysql_error());
$row_authority = mysql_fetch_array($result_authority);

//  $filter = clean($_GET['filter']);


$status = "paid";

$filter = "All";

$filter === 'All' ? $filter = ";" : $filter = 'WHERE billing_areas = ' . "'$filter' ";

$query_appln = "SELECT appln.appln_id, appln_no, appln_type, appnt.appnt_id, appln_date,
                           engeneer_appr,appnt_fullname, appnt_types, billing_areas,
                           description, cust.appnt_id AS is_customer, status ,service ,
                           surveyed_date, approved_date, inspected_by, premise_nature
                      FROM application appln
                 LEFT JOIN applicant appnt
                        ON appln.appnt_id = appnt.appnt_id
                 LEFT JOIN customer cust
                        ON appnt.appnt_id = cust.appnt_id
                 LEFT JOIN appnt_payment appntp
                        ON appnt.appnt_id = appntp.appnt_id
                 LEFT JOIN transaction trans
                        ON appntp.trans_id = trans.trans_id
                 LEFT JOIN appnt_type apnty
                        ON appnt.appnt_type_id = apnty.appnt_type_id
                 LEFT JOIN billing_area ba
                        ON appnt.ba_id = ba.ba_id
                 LEFT JOIN service_nature sn
                        ON appln.service_nature_id = sn.service_nature_id
                           WHERE appln_type = 'Clean water'";

$result_appln = mysql_query($query_appln) or die(mysql_error());
$row_header = mysql_fetch_array($result_appln);
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>APPLICATION REPORT WITH PAID STATUS</title>

        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/sheet.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/invoice.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                
                $('.tooltip').tipTip({
                    delay: "300"
                });  
                
                $('#pdf').click(function(){
                    
                    savePDF('report', '../../css/sheet.css');
                });
            });
      
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [7], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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
        </div>
        <div class="content">
            <h1>View and Print Application For Clean Water</h1>
            <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('report', '../../css/sheet.css')">Print</button>
                <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
            </div>
            <div class="hr-line"></div>
            <form action="../../includes/pdf.php" method="post" id="html-form" style="display: none">
                <input type="hidden" name="html" id="html">
            </form>
            <div class="report-wrapper">
                <div id="report">
                    <div class="sheet-wraper">
                        <div class="sheet-header">
                            <div class="header-title">
                                <p style="font-weight: bold"><?php echo $row_authority['aut_name'] ?></p> 
                                <p style="font-size: 18px; font-weight: bold"> CLEAN WATER APPLICATIONS</p>
                                <div class="page-logo">
                                    <img src="../settings/logo/<?php echo $row_authority['logo'] ?>" height="80">
                                </div>
                            </div>

                            <!-- end .sheet-header --></div>
                        <div class="print-details" style="float: right">
                            <p><strong>Print Date: </strong><span style="font-weight: normal; float: right"><?php echo date('Y-m-d') ?></span></p>
                            <p><strong>Billing Area/Zone: </strong><span style="font-weight: normal;">Migongo</span></p>
                            <p><strong>Street: </strong> <span style="font-weight: normal; float: right">Migongo</span><div style="clear: both"></div></p>
                        </div>
                        <div class="print-details">
                            

                        </div>
                        <div class="black-separator"></div>
                        <div class="sheet-table">
                            <table cellpadding="3" cellspacing="0" border="1" width="100%">
                                <thead>
                                    <tr>
                                        <th>Application No</th>
                                        <th>Applicant Fullname</th>
                                        <th>Application Type</th>
                                        <th>Application Date</th>
                                        <th>Billing Area</th>
                                        <th>Surveyed Date</th>
                                        <th>Engeneer Approval</th>
                                        <th>Approval Date</th>
                                        <th>Inspected By</th>
                                        <th>Premise Nature</th>
                                        <th>Service Nature</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $SN = 1;
                                    while ($row = mysql_fetch_array($result_appln)) {
                                        ?>
                                        <tr>
                                            <td><?php echo sprintf('%08d', $row_header['appln_no']) ?></td>
                                            <td><?php echo $row['appnt_fullname'] ?></td>
                                            <td><?php echo $row['appln_type'] ?></td>
                                            <td><?php echo $row['appln_date'] ?></td>
                                            <td><?php echo $row['billing_areas'] ?></td>
                                            <td><?php echo $row['surveyed_date'] ?></td>
                                            <td><?php echo $row['engeneer_appr'] ?></td>
                                            <td><?php echo $row['approved_date'] ?></td>
                                            <td><?php echo $row['inspected_by'] ?></td>
                                            <td><?php echo $row['premise_nature'] ?></td>
                                            <td><?php echo $row['service'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        </tr>
                                        <?php
                                        $SN++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- end sheet-wrapper  --></div>
                    <!-- end #report --></div>
                <!-- end .report-wrapper --></div>
            <!-- end .content --></div>
        <?php include '../../includes/footer.php'; ?>
        <!-- end .container --></div>
</body>
</html>