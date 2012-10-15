<?php require '../../includes/session_validator.php'; 
 ob_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | VIEW APPLICATION</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

        <script src="../../js/accordion.js" type="text/javascript"></script>

        <style>

            #fieldset tr:nth-child(even){
                background: #f2f2f2;
            }

            #fieldset tr:nth-child(odd){
                background: #fff;
            }

        </style>

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });
                
                $('#view-application').click(function(){
                    var id = $('#appln_id').val();
                    var printWin = window.open('print_application.php?id='+id,'','left=0,top=0,width=1000,height=600,toolbar=no,scrollbars=no,status=no');
                    printWin.focus();    
                });
                
                $('#pdf').click(function(){
                    savePDF('save-pdf', '../../css/sheet.css');
                });
                
                $('.tooltip').tipTip({
                    delay: "300"
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
                require '../../functions/general_functions.php';

                if (isset($_GET['id']) && !empty($_GET['id'])) {

                    // Getting applicantion data form the database
                    require '../../config/config.php';


                    $id = clean($_GET['id']);

                    $query_appln = "SELECT appln_id, appln_type, appln_date, engeneer_appr,
                                           appnt_fullname, appnt_types, billing_areas,
                                           surveyed_date, approved_date, inspected_by,
                                           premise_nature, service, occupants, appnt_tel, appnt_post_addr,
                                           appnt_phy_addr, block_no, plot_no,living_area, living_town
                                      FROM application appln
                                 LEFt JOIN applicant appnt
                                        ON appln.appnt_id = appnt.appnt_id
                                 LEFT JOIN appnt_type apnty
                                        ON appnt.appnt_type_id = apnty.appnt_type_id
                                 LEFT JOIN service_nature sev
                                        ON appln.service_nature_id = sev.service_nature_id
                                 LEFT JOIN billing_area ba
                                        ON appnt.ba_id = ba.ba_id
                                     WHERE appln_id = '$id'";

                    $result_appln = mysql_query($query_appln) or die(mysql_error());
                    $row = mysql_fetch_array($result_appln);
                    $num_row = mysql_num_rows($result_appln);
                    if ($num_row > 0) {
                        ?>


                        <form action="../../includes/pdf.php" method="post" id="html-form">
                            <input type="hidden" name="html" id="html">
                        </form>
                        <h1><?php echo $row['appnt_fullname'] ?> Application Details</h1>
                        <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0">
                            <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" id="view-application">Print</button>
                            <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf">PDF</button>
                        </div>
                        <div class="hr-line"></div>
                        <div id="save-pdf">
                            <div id="fieldset">
                                <fieldset>
                                    <legend>Applicant Details</legend>
                                    <input type="hidden" value="<?php echo $id; ?>" id="appln_id">
                                    <table width="" border="0" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td width="300">Applicant Type:</td>
                                            <td width="500"><strong><?php echo $row['appnt_types'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170" style="vertical-align: top">Full Name:</td>
                                            <td width="300"><strong><?php echo $row['appnt_fullname'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Occupants/No of people:</td>
                                            <td><strong><?php echo $row['occupants'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Phone Number:</td>
                                            <td><strong><?php echo $row['appnt_tel'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Postal Address:</td>
                                            <td><strong><?php echo $row['appnt_post_addr'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Physical Address:</td>
                                            <td><strong><?php echo $row['appnt_phy_addr'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Block Number:</td>
                                            <td><strong><?php echo $row['block_no'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Plot Number:</td>
                                            <td><strong><?php echo $row['plot_no'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Living Area:</td>
                                            <td><strong><?php echo $row['living_area'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Living Town:</td>
                                            <td><strong><?php echo $row['living_town'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Billing Area/Zone:</td>
                                            <td><strong><?php echo $row['billing_areas'] ?></strong></td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset>
                                    <legend>Application Details</legend>
                                    <table width="" border="0" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td width="300">Application Date:</td>
                                            <td width="500"><strong><?php echo date('Y-m-d'); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Application Type:</td>
                                            <td><strong><?php echo $row['appln_type'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Inspected By:</td>
                                            <td><strong><?php echo $row['inspected_by'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Surveyed Date:</td>
                                            <td><strong><?php echo $row['surveyed_date'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Engineer Approval:</td>
                                            <td><strong><?php echo $row['engeneer_appr']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Approved Date:</td>
                                            <td><strong><?php echo $row['approved_date'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Premises Nature:</td>
                                            <td><strong><?php echo $row['premise_nature'] ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="170">Service Nature:</td>
                                            <td><strong><?php echo $row['service'] ?></strong></td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                        <?php
                    } else {
                        info('error', 'No records for this appln');
                        header('Location: applications.php');
                    }
                } else {
                    info('error', 'Application id not provided. Please try again');
                    header('Location: applications.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container -->
        </div>
    </body>
</html>
