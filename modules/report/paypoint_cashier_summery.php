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

$query_cashier = "SELECT trans_date, rec_no, rec_type, payed_amount, amount_in_words,
                         usr_fname, usr_lname, cheq_no, bank
                    FROM receipt rec
               LEFT JOIN cheque chq
                      ON chq.rec_id = rec.rec_id
              INNER JOIN `transaction` trans
                      ON rec.tran_id = trans.trans_id
              INNER JOIN users usr
                      ON usr.user_id = rec.user_id";

$result_cashier = mysql_query($query_cashier) or die(mysql_error());

$row_cashier = mysql_fetch_array($result_cashier);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>SOFTBILL CASHIER SUMMERY</title>

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
                <!-- end .sidebar --></div>
            <div class="content">
                <h1>View and Print Cashier Summery</h1>
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
                                    <p style="font-size: 18px; font-weight: bold">CASHIER SUMMERY</p>
                                    <div class="page-logo">
                                        <img src="../settings/logo/<?php echo $row_authority['logo'] ?>" height="80">
                                    </div>
                                </div>
                                <!-- end .sheet-header --></div>
                            <div class="print-details" style="float: right">
                                <p><strong>Print Date: </strong><span style="font-weight: normal;"><?php echo date('d M, Y') ?></span></p>
                            </div>
                            <div class="print-details">                        
                                <p><strong>Cashier:</strong><span style="font-weight: normal;"> <?php echo $row_cashier['usr_fname'] ?></span></p>                  
                                <p><strong>Pay Station:</strong><span style="font-weight: normal;"> <?php echo $row_cashier['usr_fname'] ?></span></p>                  
                            </div>
                            <div class="black-separator"></div>
                            <div class="sheet-table">
                                <table cellpadding="3" cellspacing="0" border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Receipt date</th>
                                            <th>Receipt No</th>
                                            <th>Receipt type</th>
                                            <th>Cheque No</th>
                                            <th>Bank</th>
                                            <th>Payed amount</th>
                                            <th>Amount in words</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysql_fetch_array($result_cashier)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['trans_date'] ?></td>
                                                <td align="right"><?php echo sprintf("%08d", $row['rec_no']) ?></td>
                                                <td><?php echo $row['rec_type'] ?></td>
                                                <td align="right"><?php echo $row['cheq_no'] ?></td>
                                                <td align="right"><?php echo $row['bank'] ?></td>
                                                <td align="right"><?php echo number_format($row['payed_amount'], '2', '.', ',') ?></td>
                                                <td><?php echo $row['amount_in_words'] ?></td>   
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                            <tr><td colspan="4"></td><td>Total Due</td><td align="right">34523235</td><td></td></tr>
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
