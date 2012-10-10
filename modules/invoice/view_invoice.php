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
                <!-- end .sidebar --></div>
            <div class="content">

                <?php
                include '../../includes/info.php';
                require '../../functions/general_functions.php';
                require '../../config/config.php';
                ?>

                <h1>View Invoice(s)</h1>
                <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('invoice', '../../css/invoice.css')">Print</button>
                    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                </div>
                <div class="hr-line"></div>
                <form action="../../includes/pdf.php" method="post" id="html-form" style="display: none">
                    <input type="hidden" name="html" id="html">
                </form>
                <div class="invoice-wrapper">
                    <div id="invoice">

                        <?php
                        if (!empty($_POST['checkbox'])) {
                            $checkbox = $_POST['checkbox'];
                        }

                        if (!empty($_GET['inv_id'])) {
                            $checkbox = $_GET['inv_id'];
                        }

                        while (list($key, $val) = each($checkbox)) {

                            $query_invoice = "SELECT inv_no, invoicing_date, DATE(created_date) AS charged_date, appnt_fullname,
                                             appln_type, billing_areas, acc_no, inv.inv_id, 
                                             reading, consumption, plot_no, block_no, living_area,
                                             met_number, appnt_types, inv_type,
                                             water_cost, sewer_cost, service_charge, aging_date,
                                             COALESCE(aging_debit, 0) AS aging_debit,
                                             (water_cost + sewer_cost + service_charge  + COALESCE(aging_debit, 0))
                                          AS amount_payable
                                        FROM invoice inv
                                  INNER JOIN customer cust
                                          ON inv.cust_id = cust.cust_id
                                   LEFT JOIN invoice_reading inre
                                          ON inv.inv_id = inre.inv_id
                                   LEFT JOIN meter_reading mred
                                          ON inre.mred_id = mred.mred_id
                                   LEFT JOIN meter met
                                          ON mred.met_id = met.met_id
                                   LEFT JOIN aging_analysis age
                                          ON inv.inv_id-(SELECT COUNT(*) FROM customer) = age.inv_id
                                  INNER JOIN account acc
                                          ON cust.cust_id = acc.cust_id
                                  INNER JOIN applicant appnt
                                          ON cust.appnt_id = appnt.appnt_id
                                  INNER JOIN appnt_type appty
                                          ON appnt.appnt_type_id = appty.appnt_type_id
                                  INNER JOIN application appln
                                          ON appln.appnt_id = appnt.appnt_id
                                  INNER JOIN billing_area ba
                                          ON appnt.ba_id = ba.ba_id
                                       WHERE inv.inv_id = '$val'";

                            $result_invoice = mysql_query($query_invoice) or die(mysql_error());

                            $row_invoice = mysql_fetch_array($result_invoice);

                            //getting  invoice header data from the database
                            $query_settings = "SELECT aut_name, address, phone,fax, email, logo,terms_conds
                                             FROM settings ";

                            $result_settings = mysql_query($query_settings) or die(mysql_error());

                            $row_settings = mysql_fetch_array($result_settings);

                            $reading = $row_invoice['reading'];
                            $consumption = $row_invoice['consumption'];
                            $from = $reading - $consumption;
                            ?>


                            <div class="invoice">
                                <div class="company-header">
                                    <ul class="inv-list" style="width: 500px; position: absolute; top: 0; left: 0;">
                                        <li><strong><?php echo $row_settings['aut_name'] ?></strong></li>
                                        <li>P.o.Box 2323</li>
                                        <li>Dar es Salaam</li>
                                    </ul>
                                    <div class="authority-logo">
                                        <img src="../settings/logo/UDSM.jpg" align="middle"  height="80">
                                    </div>
                                    <ul class="inv-list" style="width: 230px; padding-right: 0 !important; position: absolute; top: 0; right: 0">
                                        <li>Phone: <span style="float: right"><?php echo $row_settings['phone']; ?></span></li>
                                        <li>Fax: <span style="float: right"><?php echo $row_settings['fax']; ?></span></li>
                                        <li>E-mail: <span style="float: right"><?php echo $row_settings['email']; ?></span></li>
                                    </ul>
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
                                        <li>Invoice Number: <span style="float: right"><?php echo sprintf('%08d', $row_invoice['inv_no']); ?></span></li>
                                        <li>&nbsp;</li>
                                        <li>Print Date: <span style="float: right"><?php echo date('d M, Y'); ?></span></li>     
                                    </ul>
                                </div>
                                <div class="invoice-body">
                                    <table border="0" cellspacing="0" cellpadding="2" class="invoice-table">
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td  colspan="5" align="right"><span style="float: right; background: #e0e0e0; margin-top: 5px; padding: 2px ">Amount (TZS)</span></td>
                                        </tr>
                                        <tr class="tr-line">
                                            <td bgcolor="#f1f1f1">Open Balance</td>
                                            <td colspan="7"><span style="font-weight: normal">Amount before charging </span></td>
                                            <td align="right" style="font-weight: normal" ><?php echo number_format($row_invoice['aging_debit'], 2, '.', ',') ?></td>
                                        </tr>
                                        <tr height="10"></tr>
                                        <tr class="tr-line">
                                            <td bgcolor="#f1f1f1">Charges</td>
                                            <td>Meter Number</td>
                                            <td>Category</td>
                                            <td>Billing Type</td>
                                            <td>Charged Date</td>
                                            <td>From<span style="font-weight: normal; font-size: 80%">(m<sup>3</sup>)</span></td>
                                            <td>To<span style="font-weight: normal; font-size: 80%">(m<sup>3</sup>)</span></td>
                                            <td>Consm<span style="font-weight: normal; font-size: 80%">(m<sup>3</sup>)</span></td>
                                            <td align="right"></td>
                                        </tr>
                                        <tr>
                                            <td>Water</td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['met_number'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['appnt_types'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['inv_type']; ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['charged_date'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $from; ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['reading'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Clean water' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['consumption'] ?>
                                            </td>
                                            <td align="right">
                                                <?php echo number_format($row_invoice['water_cost'], 2, '.', ',') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">Service Charge</td>
                                            <td align="right"><?php echo number_format($row_invoice['service_charge'], 2, '.', ','); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Sewer</td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Sewer' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['appnt_types'] ?>
                                            </td>
                                            <td>
                                                <?php if ($row_invoice['appln_type'] === 'Sewer' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['inv_type']; ?>
                                            </td>
                                            <td  colspan="4">
                                                <?php if ($row_invoice['appln_type'] === 'Sewer' || $row_invoice['appln_type'] === 'Clean water and Sewer') echo $row_invoice['charged_date'] ?>
                                            </td>
                                            <td align="right"><?php echo $row_invoice['sewer_cost'] ?></td>
                                        </tr>
                                    </table>
                                    <!-- end .invoice-body --></div>
                                <div class="invoice-footer">
                                    <table border="0" cellspacing="3" cellpadding="5" width="1000">
                                        <tr>
                                            <td width="53%" rowspan="2" style="vertical-align: top">
                                                <strong>NOTE:</strong> <?php echo $row_settings['terms_conds']; ?>
                                            </td>
                                            <td rowspan="2">&nbsp;</td>
                                            <td width="47%" rowspan="1" style="background: #e0e0e0" ><strong>Total Amount Payable: <span style="float: right">TZS <?php echo number_format($row_invoice['amount_payable'], 2, '.', ',') ?></span></strong></td>
                                        </tr>
                                        <tr><td></td></tr>
                                    </table>
                                </div>
                                <!-- end .invoice --></div>   
                            <?php
                        }
                        ?>
                        <!-- end #invoice --></div> 
                    <!-- end .invoice-wrapper --></div>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
