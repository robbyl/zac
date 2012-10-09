<?php
require '../../includes/session_validator.php';
require '../../config/config.php';

ob_start();
session_start();

// Obtaining chashier first name and last name from session.
$cashier_fname = strtoupper($_SESSION['usr_fname']);
$cashier_lname = strtoupper($_SESSION['usr_lname']);

session_commit();

$cashier_full_name = $cashier_fname . " " . $cashier_lname;

// Obtaining the last receipt number
$query_receipt_no = "SELECT MAX(rec_no) AS cur_rec_no
                       FROM receipt
                      WHERE rec_type = 'Online'";
$result_receipt_no = mysql_query($query_receipt_no) or die(mysql_error());

$row_rec = mysql_fetch_array($result_receipt_no);
$cur_rec_no = $row_rec['cur_rec_no'];
$rec_rows = mysql_num_rows($result_receipt_no);

$rec_no = ($rec_rows > 0 ? $rec_no = $cur_rec_no : $rec_no = '0');

$rec_no++;
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | ONLINE PAYMENTS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                
                $('.tooltip').tipTip({
                    delay: "300"
                });
                
                // Display and hide system messages and errors.
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                // Close receipt preview
                $('.close').click(function(){
                    $('.pop-up-wrapper').fadeOut('fast');
                });

                // Populating some of the receipt details
                $('#preview').click(function(){
                    $('#payment-form').submit(function(event){
                        
                        event.preventDefault();
                        
                        var payer = $('#cust-appnt').val();
                        var payerNo = $('#number').val();
                        var custName = $('#custName').html();
                        var postAddr = $('#postAddr').html();
                        var plotNo = $('#plotNo').html();
                        var blockNo = $('#blockNo').html();
                        var paidAmount = $('#paid_amount').val();
                        var amountInWords = $('#amountInWords').val();
                        var payType = $('#pay-type').val();
                        var transType = $('#trans-type').val();
                        var chequeNo = $('#cheque-no').val();
                        var bank = $('#bank').val();
                        
                        if(payer === "Account No"){
                            $('#payer-no-type').html('Account No:');
                            $('#payer-name').html('Customer Name:');
                            $('#payer-addr').html('Customer Address:');
                            
                        }
                        if(payer === "Appln No"){
                            $('#payer-no-type').html('Application No:');
                            $('#payer-name').html('Applicant Name:');
                            $('#payer-addr').html('Applicant Address:');
                        }
                        
                        $('#payer-no').html(payerNo);
                        $('#recCustName').html(custName);
                        $('#recPostAddr').html(postAddr);
                        $('#recPlotNo').html(plotNo);
                        $('#recBlockNo').html(blockNo);
                        $('#recAmount').html(paidAmount);
                        $('#recAmountInWords').html(amountInWords);
                        $('#recPayType').html(payType);
                        $('#recTransType').html(transType);
        
                        if(chequeNo != "" && bank != ""){
                            $('#recChequeNo').html('Cheque No ' + chequeNo + ' Bank ' + bank); 
                        } 
        
                        $('#receipt').fadeIn('fast');
                        
                    });       
                });

                // Submitting payments to the databse and print receipt.
                $('#save-print').click(function(){
 
                    $('#payment-form').unbind('submit').submit();
                    printPage('receipt-print', '../../css/pop-up.css');
                });
                
                //Hide and show cheque details depending on transaction type.
                $('.cheque-details').css('display', 'none');
                $('#trans-type').change(function(){
                    
                    var payType = $(this).val();
                    
                    if(payType == 'Cheque'){
                        $('#cheque-no, #bank').attr("required", "required");
                        $('.cheque-details').show();
                    }
                    if(payType == 'Cash'){
                        $('#cheque-no, #bank').val("").removeAttr('required');
                        $('.cheque-details').css("display", "none");
                    }
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
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a>
                        <ul>
                            <li><a href="#">Online payments</a></li>
                            <li><a href="offline_payments.php">Offline payments</a></li>
                            <li><a href="transactions.php">Transactions</a></li>
                        </ul>
                    </li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Accept Online Payments</h1>
                <div class="hr-line"></div>
                <form action="process_online_payment.php" id="payment-form" method="post">
                    <fieldset style="float: left">
                        <legend>Customer/Applicant Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">
                                    <select name="cust_appnt" id="cust-appnt" required class="select">
                                        <option value="">--select no--</option>
                                        <option value="Account No">Account No</option>
                                        <option value="Appln No">Application No</option>
                                    </select></td>
                                <td>
                                    <input type="text" name="number" id="number" required autocomplete="off" pattern=".{8,}" title="Minimum 8 characters"  oninput="moreDetails()" class="text tooltip" >
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Payment Type</td>
                                <td>
                                    <select name="payment_type" id="pay-type" class="select" required>
                                        <option value="">--select payment type--</option>
                                        <option value="Water Payment">Water Payment</option>
                                        <option value="Other Payment">Other Payment</option>
                                        <option value="Sewer Payment">Sewer Payment</option>
                                        <option value="Other Sewer">Other Sewer</option>
                                        <option value="Application fee">Application fee</option>
                                        <option value="Brocken Meter">Brocken Meter</option>
                                        <option value="Meter Rental">Meter Rental</option>
                                        <option value="Surge Disposal">Surge Disposal</option>
                                        <option value="Kiosk Sales">Kiosk Sales</option>
                                        <option value="Reconnection Fee">Reconnection Fee</option>
                                        <option value="Illegal Reconnection">Illegal Reconnection</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div id="cust-appnt-details"></div>
                    </fieldset>
                    <fieldset style="float: left">
                        <legend>Transaction Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Transaction Type</td>
                                <td>
                                    <select name="transaction_type" class="select" id="trans-type" required>
                                        <option value="">--select payment type--</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="cheque-details">
                                <td width="170">Cheque Number</td>
                                <td>
                                    <input type="text" name="cheque_no" autocomplete="off" id="cheque-no" class="text" required>
                                </td>
                            </tr>
                            <tr class="cheque-details" style="display: none">
                                <td width="170">Bank</td>
                                <td>
                                    <select name="bank" class="select" id="bank" required>
                                        <option value="">--select bank--</option>
                                        <option value="CRDB">CRDB</option>
                                        <option value="NBC">NBC</option>
                                        <option value="NMB">NMB</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Total</td>
                                <td><strong id="total"></strong></td>
                            </tr>
                            <tr>
                                <td width="170">Payed Amount</td>
                                <td>
                                    <input type="number" name="paid_amount" id="paid_amount" class="number" min="0" step="0.01" required style="width: 150px;"> Payed in fully
                                </td>
                            </tr>
                            <tr>
                                <td width="170" style="vertical-align: top">Amount in Words</td>
                                <td>
                                    <textarea name="amount_in_words" id="amountInWords" rows="6" cols="33" placeholder="PAYED AMOUNT IN WORDS:" required></textarea>
                                </td>
                            </tr>

                        </table>
                    </fieldset>
                    <table width="531" style="clear: both">
                        <tr>
                            <td width="212">&nbsp;</td>
                            <td width="307"><button type="submit" id="preview">Preview Receipt</button>
                                <button type="reset">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>

            <!--    ONLINE RECEIPT    -->

            <div id="receipt" style="display: none">
                <div class="pop-up-wrapper">
                    <div class="pop-up-receipt">
                        <div class="form-header">
                            <div class="close"></div>
                            <!--  end . form-header --> </div>

                        <form action="" id="receipt-form" method="post" style="padding-top: 30px; margin-bottom: 0" >
                            <div id="receipt-print">
                                <div class="receipt-header"></div>
                                <div class="receipt-body">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="receipt-table">
                                        <tr>
                                            <td width="18%" id="payer-name"></td>
                                            <td width="50%" id="recCustName"></td>
                                            <td width="8%">&nbsp;</td>
                                            <td width="23%" align="right"><span style="float: left">Receipt No:</span> <?php echo sprintf('%08d', $rec_no); ?></td>
                                        </tr>
                                        <tr>
                                            <td id="payer-no-type"></td>
                                            <td id="payer-no"></td>
                                            <td>&nbsp;</td>
                                            <td align="right"><span style="float: left">Date:</span><?php echo date('d M, Y') ?></td>
                                        </tr>
                                        <tr>
                                            <td id="payer-addr"></td>
                                            <td id="recPostAddr"></td>
                                            <td>&nbsp;</td>
                                            <td align="right"><span style="float: left">Time:</span><?php echo date('H:i:s') ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>PLOT NO: <span id="recPlotNo"></span></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>BLOCK NO: <span id="recBlockNo"></span></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount in Words:</strong></td>
                                            <td rowspan="2"><strong id="recAmountInWords"></strong></td>

                                            <td colspan="2"><strong style="float: right">TZS <span id="recAmount"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td width="1%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Receipt Type:</td>
                                            <td id="recPayType"></td>
                                            <td>Cashier:</td>
                                            <td><?php echo $cashier_full_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Type:</td>
                                            <td id="recTransType"></td>
                                            <td>Station:</td>
                                            <td>Kimara Area Station</td>
                                        </tr>
                                        <tr>
                                            <td>Cheque Details:</td>
                                            <td id="recChequeNo">&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    <!-- end .form-body --> </div>
                                <!-- end .receipt-print --> </div>
                            <table width="100%" class="form-footer">
                                <tr align="right">
                                    <td width="">
                                        <button type="submit" form="payment-form" id="save-print">Save & Print</button>
                                        <button type="reset">Cancel</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <!-- end .pop-up-form --></div>
                    <!-- end .pop-up-wrapper --></div>
                <!-- end .receipt --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>