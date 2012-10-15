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
?>
<?php
require '../../includes/session_validator.php';
//if (isset($_GET['filter']) && !empty($_GET['filter'])) {

require '../../config/config.php';
require '../../functions/general_functions.php';

$query_authority = "SELECT aut_name, logo
                          FROM settings";

$result_authority = mysql_query($query_authority) or die(mysql_error());

$row_authority = mysql_fetch_array($result_authority);

//    $filter = clean($_GET['filter']);

$filter = "All";

$filter === 'All' ? $filter = "" : $filter = 'AND billing_areas = ' . "'$filter' ";

$query_meter_reading = "SELECT trans_date, description, rec_no, acc_no, payed_amount,
                               appnt_fullname, appln_type, billing_areas, acc_no,
                               plot_no, block_no, living_area,
                               met_number, appnt_types, inv_type,
                               water_cost, sewer_cost, service_charge, aging_date,
                               COALESCE(aging_debit, 0) AS aging_debit,
                               (water_cost + sewer_cost + service_charge  + COALESCE(aging_debit, 0)) AS amount_payable,
                               ((water_cost + sewer_cost + service_charge  + COALESCE(aging_debit, 0))  + COALESCE(aging_debit, 0) - COALESCE(payed_amount, 0)) AS closing_balance
                          FROM transaction trans
                     LEFT JOIN invoice inv
                            ON inv.trans_id = trans.trans_id
                     LEFT JOIN cust_payment cupa
                            ON cupa.trans_id = trans.trans_id
                     LEFT JOIN receipt rec
                            ON rec.tran_id = trans.trans_id
                     LEFT JOIN customer cust
                            ON inv.cust_id = cust.cust_id
                     LEFT JOIN meter_customer mecu
                            ON mecu.cust_id = cust.cust_id
                     LEFT JOIN meter met
                            ON mecu.met_id = met.met_id
                     LEFT JOIN aging_analysis age
                            ON inv.inv_id-(SELECT COUNT(*) FROM customer) = age.inv_id
                     LEFT JOIN account acc
                            ON cust.cust_id = acc.cust_id
                    INNER JOIN applicant appnt
                            ON cust.appnt_id = appnt.appnt_id
                    INNER JOIN appnt_type appty
                            ON appnt.appnt_type_id = appty.appnt_type_id
                    INNER JOIN application appln
                            ON appln.appnt_id = appnt.appnt_id
                    INNER JOIN billing_area ba
                            ON appnt.ba_id = ba.ba_id         
                      ORDER BY trans_date ASC";

$result_meter_reading = mysql_query($query_meter_reading) or die(mysql_error());
$row_header = mysql_fetch_array($result_meter_reading)
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>SOFTBILL CUSTOMER COMPREHENSIVE BILLING TREND</title>

        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/sheet.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/invoice.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                
                $('.tooltip').tipTip({
                    delay: "300"
                });  
                
                $('#pdf').click(function(){
                    
                    savePDF('report', '../../css/sheet.css');
                });
            });
      
        </script>
    </head>
    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a>
                        <ul>
                            <li><a href="generate_invoices.php">Generate Invoices</a></li>
                        </ul>
                    </li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar -->
            </div>
            <div class="content">
                <h1>View and Print Customer Comprehensive Billing Trend</h1>
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
                                    <p style="font-size: 18px; font-weight: bold">CUSTOMER COMPREHENSIVE BILLING TREND</p>
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
                                <p><strong>Account No:</strong> <span style="font-weight: normal; font-weight: bold; font-size: 1.5em;"><?php echo sprintf('%08d', $row_header['acc_no']) ?></span></p>
                                <p><strong>Customer name:</strong><span style="font-weight: normal;"> <?php echo $row_header['appnt_fullname'] ?></span></p>
                                <p><strong>Meter No:</strong><span style="font-weight: normal;"> <?php echo $row_header['met_number'] ?></span></p>                   
                            </div>
                            <div class="black-separator"></div>
                            <div class="sheet-table">
                                <table cellpadding="3" cellspacing="0" border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Transaction date</th>
                                            <th>Transaction  description</th>
                                            <th>Receipt No</th>
                                            <th>Opening balance</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Closing balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SN = 1;
                                        while ($row = mysql_fetch_array($result_meter_reading)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['trans_date'] ?></td>
                                                <td><?php echo $row['description'] ?></td>
                                                <td><?php if (!empty($row['rec_no'])) echo sprintf('%08d', $row['rec_no']) ?></td>
                                                <td align="right"><?php echo number_format($row['aging_debit'], '2', '.', ',') ?></td>
                                                <td align="right"><?php echo number_format($row['amount_payable'], '2', '.', ',') ?></td>
                                                <td align="right"><?php echo number_format($row['payed_amount'], '2', '.', ',') ?></td>    
                                                <td align="right"><?php echo number_format($row['closing_balance'], '2', '.', ',') ?></td>    
                                            </tr>
                                            <?php
                                            $SN++;
                                        }
                                        ?>
                                        <tr><td colspan="5"></td><td>Total Due</td><td align="right"><strong>34523235</strong></td></tr>
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
    <?php // } ?>
</html>
