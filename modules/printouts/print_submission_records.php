<?php
/*
 * 2012 zanhid
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

        <title>ZANHID SUBMISSION RECORDS PRINTOUT</title>

        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/print.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/invoice.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
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

        </script>
    </head>
    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <h1>ZHAPMoS Submission Records Printout</h1>
                <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('report', '../../css/print.css')">Print</button>
                    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                </div>
                <div class="hr-line"></div>
                <?php
                require '../../functions/general_functions.php';
                require '../../config/config.php';

                $year = clean($_GET['year']);

                if (isset($year) && !empty($year)) {

                    $groups = array();
                    $received = array();

                    $exyear = explode("/", $year);

                    $from = $exyear[0] . "-07-01 00:00:00";
                    $to = $exyear[1] . "-07-01 00:00:00";

                    $query_org = "SELECT `OrganisationName`, org.`OrganisationCode`, `District`,
                                          `OrganisationGroup`, `OrganisationCategoryDescription`
                                     FROM tblgenorganisations org
                               INNER JOIN tblgensetuporganisationcategories cat
                                       ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                LEFT JOIN tblgensetupdistricts dis
                                       ON SUBSTR(org.`OrganisationCode`, 1, 3) = dis.DistrictAbb
                                 ORDER BY OrganisationCategoryDescription ASC, OrganisationName ASC";

                    $result_org = mysql_query($query_org) or die(mysql_error());

                    $no_submitted = mysql_num_rows($result_org);

                    if ($no_submitted > 0) {

                        while ($data = mysql_fetch_assoc($result_org)) {
                            $groups[$data['OrganisationCategoryDescription']][] = $data;
                        }

                        $query_submitted = "SELECT org.`OrganisationCode`, DATE(`PeriodFrom`) AS PeriodFrom,
                                                   DATE(`PeriodTo`) AS PeriodTo, DATE_FORMAT(IFNULL(DATE(`DateReceived`), `DateCaptured`), '%d %b, %Y') AS DateReceived
                                              FROM tblgenorganisations org
                                         LEFT JOIN tblzhaformssubmitted sub
                                                ON org.`OrganisationCode` = sub.`OrganisationCode`
                                             WHERE `PeriodFrom` BETWEEN '$from' AND '$to'";

                        $result_submitted = mysql_query($query_submitted) or die(mysql_error());

                        while ($submitted = mysql_fetch_array($result_submitted)) {
                            $received[$submitted['OrganisationCode']][$submitted['PeriodFrom']] = $submitted['DateReceived'];
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
                                                ZHAPMoS SUBMISSION  RECORDS <br>Financial Year <?php echo 'Jul ' . $exyear[0] . ' - Jun ' . $exyear[1]; ?></p>
                                        </div>
                                        <!-- end .sheet-header --></div>
                                    <div class="print-details" style="float: right">
                                        <p><strong>Print Date: </strong><span style="font-weight: normal;"><?php echo date('d M, Y') ?></span></p>
                                    </div>
                                    <div class="black-separator"></div>
                                    <div class="sheet-table">
                                        <table cellpadding="3" cellspacing="0" border="1" width="100%">
                                            <?php
                                            $total = 0;

                                            foreach ($groups as $OrganisationCategoryDescription => $OrganisationCode) {

                                                echo '<tr><th colspan="8">' . $OrganisationCategoryDescription . '</th></tr>';
                                                echo '<tr><th colspan="3"></th><th colspan="4" style="text-align: center">Forms 1-4</th><th>Form 6</th></tr>';
                                                echo '<tr>';
                                                echo '<th>Code</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>District</th>';
                                                echo '<th>Jul-Sep</th>';
                                                echo '<th>Oct-Dec</th>';
                                                echo '<th>Jan-Mar</th>';
                                                echo '<th>Apr-Jun</th>';
                                                echo '<th>Jan-Jul</th>';
                                                echo '</tr>';

                                                $num_org = 0;

                                                foreach ($OrganisationCode as $data) {

                                                    echo '<tr>';
                                                    echo '<td>' . $data['OrganisationCode'] . '</td>';
                                                    echo '<td>' . $data['OrganisationName'] . '</td>';
                                                    echo '<td>' . $data['District'] . '</td>';
                                                    echo '<td>' . $received[$data['OrganisationCode']][$exyear[0] . '-07-01'] . '</td>';
                                                    echo '<td>' . $received[$data['OrganisationCode']][$exyear[0] . '-10-01'] . '</td>';
                                                    echo '<td>' . $received[$data['OrganisationCode']][$exyear[1] . '-01-01'] . '</td>';
                                                    echo '<td>' . $received[$data['OrganisationCode']][$exyear[1] . '-04-01'] . '</td>';
                                                    echo '<td></td>';
                                                    echo '</tr>';

                                                    $total++;
                                                    $num_org++;
                                                }

                                            }
                                            ?>
                                        </table>
                                        
                                        <p style="float: right"><?php echo "Total Organisations " . $total; ?></p>
                                        <div style="clear: both"></div>

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
    <script type="text/javascript">

            $('.printouts').attr("id", "current");
            var i = $('h3#current').index('.menuheader') - 1;

            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
                defaultexpanded: [i], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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
            });
    </script>
</html>
