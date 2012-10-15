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
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">

            $(document).ready(function() {

                $('#billing_area').change(function(){

                    getContent('application_listing.php', {filter: $(this).val()});
                });

                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

            } );
            
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [2], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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

            function nav(url){
                document.location.href = url;
            }

        </script>
    </head>

    <body onload="getContent('application_listing.php', {filter: $('#billing_area').val()})">
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
                <h1>View Applications</h1>
                <div class="hr-line"></div>
                <div style="margin-bottom: 15px;">
                    <label> Billing Area/Zone &nbsp;
                        <select name="billing_area" class="select" required id="billing_area" >
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
                        </select>
                    </label>
                </div>
                <div id="listing"></div>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
        <div id="pop-up"></div>
    </body>
</html>
<?php ob_flush(); ?>
