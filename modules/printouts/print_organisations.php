<?php
/*
 * 2012 softbill
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Londo <robbyl@ovi.com>
 *  @copyright  2012 sofbill
 *  @version  Release: 1.0.0
 */
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

require '../../includes/session_validator.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>ZANHID ORGANISATION AND PEOPLE PRINTOUT</title>

        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/print.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/invoice.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });

                $('#pdf').click(function() {

                    savePDF('report', '../css/print.css');
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
                oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
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
                <h1>Organisation and People Printout</h1>
                <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('report', '../../css/print.css')">Print</button>
                    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                </div>
                <div class="hr-line"></div>
                <?php
                require '../../functions/general_functions.php';
                require '../../config/config.php';

                $creteria = clean($_GET['creteria']);
                $category = clean($_GET['category']);
                $details = clean($_GET['details']);

                if (isset($creteria) && !empty($creteria) && isset($category) &&
                        !empty($category) && isset($details) && !empty($details)) {

                    switch ($creteria) {
                        case "all":
                            $filter = "";
                            break;
                        case "reporting":
                            $filter = "";
                            break;
                        case "particular":
                            $filter = "WHERE org.OrganisationCategoryID = '$category'";
                            break;

                        default:
                            $filter = "";
                            break;
                    }

                    if ($details === "all") {

                        $person = array();

                        $query_people = "SELECT `OrganisationCode`, `FullName`, `Designation`,
                                                `Phone`, `Email`
                                           FROM tblgenorganisationpeople
                                       ORDER BY FullName ASC";
                        $result_people = mysql_query($query_people) or die(mysql_error());

                        while ($people = mysql_fetch_array($result_people)) {
                            $person[$people['OrganisationCode']][] = $people;
                        }
                    }

                    $query_org = "SELECT `OrganisationName`, org.`OrganisationCode`, `PostalAddress`, org.`Phone`, org.`Fax`, org.`Email`, `PhysicalAddress`,
                                          DATE(`StartedOperating`) AS StartDAte, `OrganisationGroup`, `OrganisationCategoryDescription`,
                                          foc.`FullName` AS ZHAPMosFocal, hiv.`FullName` AS HIVPerson
                                     FROM tblgenorganisations org
                               INNER JOIN tblgensetuporganisationcategories cat
                                       ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                LEFT JOIN tblgenorganisationpeople foc
                                       ON org.`ZHAPMoSFocalPersonID` = foc.`OrganisationPersonID`
                                LEFT JOIN tblgenorganisationpeople hiv
                                       ON org.`HIVFocalPersonID` = hiv.`OrganisationPersonID`
                                          {$filter}
                                 ORDER BY OrganisationCategoryDescription ASC, OrganisationName ASC";

                    $result_org = mysql_query($query_org) or die(mysql_error());
                    $num_oganisation = mysql_num_rows($result_org);

                    if ($num_oganisation > 0) {
                        $groups = array();
                        while ($data = mysql_fetch_assoc($result_org)) {
                            $groups[$data['OrganisationCategoryDescription']][] = $data;
                        }
                        ?>
                        <form action="../../includes/pdf.php" method="post" id="html-form" style="display: none">
                            <input type="hidden" name="html" id="html">
                        </form>
                        <div class="report-wrapper">
                            <div id="report">
                                <div class="sheet-wraper">
                                    <div class="sheet-header">
                                        <div class="header-title">
                                            <div class="zanz-logo"></div>
                                            <div class="zac-logo"></div>
                                            <p class="form-heading" style="width: 60%;
                                               margin: 0 auto !important;
                                               text-align: center;
                                               font-weight: bold;" >
                                                ZANZIBAR AIDS COMMISSION (ZAC)</p>
                                            <p class="form-sub-header" style="width: 60%;
                                               font-size: 1.5em;
                                               margin: 0 auto !important;
                                               text-align: center;
                                               font-weight: bold;">
                                                LIST OF ORGANISATIONS</p>
                                            <div class="page-logo">
        <!--                                                <img src="../settings/logo/<?php // echo $row_authority['logo']              ?>" height="80">-->
                                            </div>
                                        </div>
                                        <!-- end .sheet-header --></div>
                                    <div class="print-details" style="float: right">
                                        <p><strong>Print Date: </strong><span style="font-weight: normal;"><?php echo date('d M, Y') ?></span></p>
                                    </div>
                                    <div class="black-separator"></div>
                                    <div>
                                        <table cellpadding="3" cellspacing="0" border="1" width="100%" class="two-groups">
                                            <?php
                                            $total = 0;

                                            foreach ($groups as $OrganisationCategoryDescription => $OrganisationCode) {

                                                echo '<tr><th colspan="7">' . $OrganisationCategoryDescription . '</th></tr>';
                                                echo '<tr>';
                                                echo '<th>Code</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Address</th>';
                                                echo '<th>Contacts</th>';
                                                echo '<th>Started Operating</th>';
                                                echo '<th>Focal Person(s)</th>';
                                                echo '<th>Umbrella Organisations</th>';
                                                echo '</tr>';



                                                $num_org = 0;

                                                // Desplaying organisation details
                                                foreach ($OrganisationCode as $data) {
                                                    echo '<tr style="border-bottom-color: #e0e0e0;" class="';
                                                    if ($total % 2 !== 0)
                                                        echo 'odd'; echo '">';
                                                    echo '<td>' . $data['OrganisationCode'] . '</td>';
                                                    echo '<td>' . $data['OrganisationName'] . '</td>';
                                                    echo '<td>' . $data['PostalAddress'] . '<br>' . $data['PhysicalAddress'] . '</td>';
                                                    echo '<td> Tel: ' . $data['Phone'] . '<br> Fax: ' . $data['Fax'] . '</td>';
                                                    echo '<td>' . $data['StartDAte'] . '</td>';
                                                    echo '<td>Zhapmo: ' . $data['ZHAPMosFocal'] . '<br>HIV: ' . $data['HIVPerson'] . '</td>';
                                                    echo '<td></td>';
                                                    echo '</tr>';

                                                    // Deplaying people details
                                                    if ($details === "all") {

                                                        echo '<tr class="';
                                                        if ($total % 2 !== 0)
                                                            echo 'odd no-border'; echo ' no-border">';
                                                        echo '<td></td>';
                                                        echo '<td>People:</td>';
                                                        echo '<td>Desingnation</td>';
                                                        echo '<td colspan="4">Contacts</td>';
                                                        echo '</tr>';

                                                        foreach ($person[$data['OrganisationCode']] as $people) {
                                                            echo '<tr class="';
                                                            if ($total % 2 !== 0)
                                                                echo 'odd'; echo ' no-border">';
                                                            echo '<td></td>';
                                                            echo '<td>' . $people['FullName'] . '</td>';
                                                            echo '<td>' . $people['Designation'] . '</td>';
                                                            echo '<td colspan="4">Tel: ' . $people['Phone'];
                                                            echo '<br>Email: ' . $people['Email'];
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                    $total++;
                                                    $num_org++;
                                                }

                                                echo'<tr><td colspan="7" align="right">organisation total ' . $num_org . '</td><tr>';
                                            }
                                            ?>
                                        </table>
                        <?php echo 'Total Organisations ' . $total; ?>

                                    </div>
                                    <!-- end sheet-wrapper  --></div>
                                <!-- end #report --></div>
                            <!-- end .report-wrapper --></div>
                    <?php
                } else {
                    echo '<div class="message">no data found!</div>';
                }
            }
            ?>
                <!-- end .content --></div>
<?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
