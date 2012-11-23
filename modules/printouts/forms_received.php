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
 *  @copyright  2012 zanhid
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

        <title>ZANHID FORMS RECEIVED PRINTOUT</title>

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
                <h1>ZHAPMoS ZHAPMoS Forms Received Printout</h1>
                <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('report', '../../css/print.css')">Print</button>
                    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                </div>
                <div class="hr-line"></div>

                <?php
                require '../../functions/general_functions.php';
                require '../../config/config.php';

                $creteria = clean($_GET['creteria']);
                $org_id = clean($_GET['org_id']);
                $from = clean($_GET['from']);
                $to = clean($_GET['to']);

                if (isset($creteria) && !empty($creteria)
                        && isset($org_id) && !empty($org_id)
                        && isset($from) && !empty($from)
                        && isset($to) && !empty($to)) {

                    switch ($creteria) {

                        case 'all':
                            $filter = "WHERE IFNULL(DATE(`DateReceived`), IFNULL(DATE(`DateCaptured`), IFNULL (DATE(`DateCompleted`), DATE(`DateApproved`))))  BETWEEN '$from' AND '$to'";
                            break;

                        case 'particular':
                            $filter = "WHERE IFNULL(DATE(`DateReceived`), IFNULL(DATE(`DateCaptured`), IFNULL (DATE(`DateCompleted`), DATE(`DateApproved`)))) BETWEEN '$from' AND '$to'";
                            $filter .= " AND org.OrganisationCode = '$org_id'";
                            break;

                        default:
                            $filter = '';
                            break;
                    }


                    $query_received = "SELECT `FormSerialNumber`, sub.`OrganisationCode`, `OrganisationName`,
                                           dis.`District`, `OrganisationCategoryDescription`, org.`OrganisationCode`,
                                           DATE_FORMAT(DATE(`DateCompleted`), '%d %b, %Y') AS DateCompleted,
                                           DATE_FORMAT(DATE(`DateApproved`), '%d %b, %Y') AS DateApproved,
                                           DATE_FORMAT(DATE(`DateReceived`), '%d %b, %Y') AS DateReceived,
                                           DATE_FORMAT(DATE(`DateCaptured`), '%d %b, %Y') AS DateCaptured,
                                           DATE(`PeriodFrom`) AS PeriodFrom, DATE(`PeriodTo`) AS PeriodTo,
                                           IFNULL(DATE(`DateReceived`), IFNULL(DATE(`DateCaptured`), IFNULL (DATE(`DateCompleted`), DATE(`DateApproved`)))) AS Received
                                      FROM tblzhaformssubmitted sub
                                INNER JOIN tblgenorganisations org
                                        ON sub.`OrganisationCode` = org.`OrganisationCode`
                                 LEFT JOIN tblgensetupdistricts dis
                                        ON sub.`DistrictCode` = dis.`DistrictCode`
                                 LEFT JOIN tblgensetuporganisationcategories cat
                                        ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                           {$filter}
                                  GROUP BY FormSerialNumber
                                  ORDER BY FormSerialNumber ASC, `OrganisationName` ASC";
                                          

                    $result = mysql_query($query_received) or die(mysql_error());

                    $num_forms = mysql_num_rows($result);

                    if ($num_forms > 0) {




                        while ($row = mysql_fetch_assoc($result)) {

                            $forms[$row['OrganisationCategoryDescription']][$row['PeriodFrom']][] = $row;
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

                                            foreach ($forms as $OrganisationCategoryDescription => $PeriodFrom) {
                                                echo '<tr><th colspan="8">' . $OrganisationCategoryDescription . '</th></tr>';

                                                ksort($PeriodFrom);

                                                foreach ($PeriodFrom as $rows => $some) {
                                                    echo '<tr><th colspan="8">' . $rows . '</th><tr>';
                                                    echo '<tr>';
                                                    echo '<th>Form Serial No</th>';
                                                    echo '<th>Org Code</th>';
                                                    echo '<th>Organisation Name</th>';
                                                    echo '<th>District</th>';
                                                    echo '<th>Date Completed</th>';
                                                    echo '<th>Date Approved</th>';
                                                    echo '<th>Date Received</th>';
                                                    echo '<th>Date Captured</th>';
                                                    echo '</tr>';
                                                    
                                                    foreach ($some as $value) {
                                                        echo '<tr>';
                                                        echo '<td>' . $value['FormSerialNumber'] . '</td>';
                                                        echo '<td>' . $value['OrganisationCode'] . '</td>';
                                                        echo '<td>' . $value['OrganisationName'] . '</td>';
                                                        echo '<td>' . $value['District'] . '</td>';
                                                        echo '<td>' . $value['DateCompleted'] . '</td>';
                                                        echo '<td>' . $value['DateApproved'] . '</td>';
                                                        echo '<td>' . $value['DateReceived'] . '</td>';
                                                        echo '<td>' . $value['DateCaptured'] . '</td>';
                                                        echo '</tr>';
                                                        $total++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </table>

                                        <p style="float: right"><?php echo "Total number of forms received " . $total; ?></p>
                                        <div style="clear: both"></div>

                                    </div>
                                    <!-- end sheet-wrapper  --></div>
                                <!-- end #report --></div>
                            <!-- end .report-wrapper --></div>
                        <?php
                    } else {
                        echo '<div class="message">Data not found!</div>';
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
