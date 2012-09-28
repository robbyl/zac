<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | INVOICE</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/invoice.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <style type="text/css">
            textarea {
                font: inherit !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });

                $('#pdf').click(function(){
                    savePDF('invoice', '../css/invoice.css');
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
                    <li> <a href="../applications/applications.php" class="applications">Applications</a></li>
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
                <!-- end .sidebar --></div>
            <div class="content">
                <div id="pdf-info">
                </div>
                <?php
                // Displaying message and errors
                include '../../includes/info.php';

                if (!empty($_GET['inv_id']) && isset($_GET['inv_id'])) {

                    require '../../functions/general_functions.php';
                    require '../../config/config.php';

                    $inv_id = clean($_GET['inv_id']);

                    $query_invoice = "SELECT inv_no, invoicing_date, acc_no, appnt_fullname,
                                             appnt_post_addr, block_no, plot_no, living_town,
                                             billing_areas, living_area, consumption, reading_date,
                                             reading, met_number, appnt_types, inv.cost
                                        FROM invoice inv
                                  INNER JOIN customer cust
                                          ON inv.cust_id = cust.cust_id
                                  INNER JOIN applicant appnt
                                          ON cust.appnt_id = appnt.appnt_id
                                  INNER JOIN appnt_type apty
                                          ON appnt.appnt_type_id = apty.appnt_type_id
                                  INNER JOIN meter_reading mred
                                          ON cust.cust_id = mred.cust_id
                                  INNER JOIN meter met
                                          ON mred.met_id = met.met_id
                                  INNER JOIN billing_area ba
                                          ON appnt.ba_id = ba.ba_id
                                  INNER JOIN account acc
                                          ON acc.acc_id = inv.acc_id
                                       WHERE inv_id = '$inv_id'";

                    $result_invoice = mysql_query($query_invoice) or die(mysql_error());

                    $row_invoice = mysql_fetch_array($result_invoice);

                    $from = $row_invoice['reading'] - $row_invoice['consumption'];
                    ?>
                    <h1>Invoice for <?php echo $row_invoice['appnt_fullname'] ?></h1>
                    <div class="hr-line"></div>
                    <div class="actions" style="position: relative; top: 0; margin: 0 0 5px 0;" >
                        <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('invoice', '../../css/invoice.css')">Print</button>
                        <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                    </div>
                    <form action="../../includes/pdf.php" method="post" id="html-form">
                        <input type="hidden" name="html" id="html">
                    </form>


                    <div class="invoice-wrapper">
                        <div id="invoice">
                        <div class="invoice">
                            <div class="company-header">

                            </div>
                            <div class="customer-header">
                                <ul class="inv-list" style="width: 400px">
                                    <li><strong><?php echo $row_invoice['appnt_fullname']; ?></strong></li>
                                    <li>P.o.Box 2323</li>
                                    <li>Dar es Salaam</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                </ul>
                                <ul class="inv-list" style="width: 230px">
                                    <li>Plot No: <span style="float: right"><?php echo $row_invoice['plot_no']; ?></span></li>
                                    <li>Block No: <span style="float: right"><?php echo $row_invoice['block_no']; ?></span></li>
                                    <li>Street: <span style="float: right"><?php echo $row_invoice['living_area']; ?></span></li>
                                </ul>
                                <ul class="inv-list" style="width: 230px; float:  right; padding-right:  0 !important;">
                                    <li><strong>Account No:<span style="float: right"><?php echo $row_invoice['acc_no']; ?></span></strong></li>
                                    <li>Billing Period: <span style="float: right"><?php echo $row_invoice['invoicing_date']; ?></span></li>
                                    <li>Invoice Number: <span style="float: right"><?php echo $row_invoice['inv_no']; ?></span></li>
                                    <li>&nbsp;</li>
                                    <li>Print Date: <span style="float: right"><?php echo date('d M, Y'); ?></span></li>     
                                </ul>
                            </div>
                            <div class="invoice-body">
                                <table border="0" cellspacing="0" cellpadding="2" class="invoice-table">
                                    <tr>
                                        <td colspan="4" style="font-weight: bolder">Copy</td>
                                        <td  colspan="5" align="right"><span style="float: right; background: #e0e0e0; margin-top: 5px; padding: 2px ">Amount (TZS)</span></td>
                                    </tr>
                                    <tr class="tr-line">
                                        <td bgcolor="#f1f1f1">Balance</td>
                                        <td colspan="7"><span style="font-weight: normal">This is the available amount</span></td>
                                        <td align="right">23,893.67</td>
                                    </tr>
                                    <tr height="20"></tr>
                                    <tr class="tr-line">
                                        <td bgcolor="#f1f1f1">Adjustments</td>
                                        <td>Date</td>
                                        <td colspan="6">Description</td>
                                        <td align="right">72,092.38</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>21 Aug, 2012</td>
                                        <td colspan="6">Debit Notes: EWURA charge</td>
                                        <td align="right">72,092.38</td>
                                    </tr>
                                    <tr height="20"></tr>
                                    <tr class="tr-line">
                                        <td bgcolor="#f1f1f1">Charges</td>
                                        <td>Meter</td>
                                        <td>Category</td>
                                        <td>Type</td>
                                        <td>Date</td>
                                        <td>From</td>
                                        <td>To</td>
                                        <td>Consm</td>
                                        <td align="right">24,782.00</td>
                                    </tr>
                                    <tr>
                                        <td>Water</td>
                                        <td><?php echo $row_invoice['met_number'] ?></td>
                                        <td><?php echo $row_invoice['appnt_types'] ?></td>
                                        <td>Actual</td>
                                        <td>21 Aug, 2012</td>
                                        <td><?php echo $from; ?></td>
                                        <td><?php echo $row_invoice['reading'] ?></td>
                                        <td><?php echo $row_invoice['consumption'] ?></td>
                                        <td align="right"><?php echo $row_invoice['cost'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="invoice-footer">
                                <table border="0" cellspacing="3" cellpadding="5" width="1000">
                                    <tr>
                                        <td width="53%" rowspan="2" style="vertical-align: top">
                                            <strong>NOTE:</strong> Sasa unaweza kulipia bili yako kupitia Zap, M-Pesa, Selcome, Backlays Bank au CRDB
                                        </td>
                                        <td rowspan="2">&nbsp;</td>
                                        <td width="47%" style="background: #e0e0e0" ><strong>Total Amount Payable: <span style="float: right">TZS 999,450,302.12</span></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Pay by: 7 Aug, 2012</td>
                                    </tr>
                                </table>
                            </div>
                                  <!-- end .invoice --></div>
                            <!-- end #invoice --></div> 
                    <!-- end .invoice-wrapper --></div>
                    <?php
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
