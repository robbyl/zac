<?php
require '../../includes/session_validator.php';

ob_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | ONLINE PAYMENTS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/data_table.css" rel="stylesheet" type="text/css">
        <link href="../../css/jquery.ui.theme.css" rel="stylesheet" type="text/css">
        <link href="../../css/ui_darkness.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {

                $('#enter_by').click(function(){
                    getContent('readings_form_print.php');
                });

                $('.close').click(function(){
                    $('.pop-up-wrapper').fadeOut('fast', function(){
                        $(this).hide();
                    });
                });

                //                $('#preview').click(function(){
                //                   $('#payment-form').submit(function(event){
                //                       event.preventDefault();
                //                       $('#receipt').fadeIn('fast');
                //                   });       
                //                });

                $('#save-print').click(function(){
                    printPage('receipt-print', '../../css/pop-up.css');
                });
                
                //Hide and show cheque details depending on transaction type.
                $('.cheque-details').hide();
                $('#payment-type').change(function(){
                    
                    var payType = $(this).val();
                    
                    if(payType == 'Cheque'){
                        $('#cheque, #bank').attr("required", "required");
                        $('.cheque-details').show();
                    }
                    if(payType == 'Cash'){
                        $('#cheque, #bank').removeAttr('required');
                        $('.cheque-details').hide();
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
                <h1>Accept Payments</h1>
                <div class="hr-line"></div>
                <form action="process_online_payment.php" method="post">
                    <fieldset style="float: left">
                        <legend>Customer/Applicant details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">
                                    <select name="cust_appnt" id="cust-appnt" required class="select">
                                        <option value="">--select no--</option>
                                        <option value="customer">Account No</option>
                                        <option value="applicant">Application No</option>
                                    </select></td>
                                <td><input type="text" name="number" id="number" required autocomplete="off"  oninput="moreDetails()" class="text" ></td>
                            </tr>
                            <tr>
                                <td width="170">Payment type</td>
                                <td>
                                    <select name="payment_type" class="select" required>
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
                        <div id="cust-appnt-details">

                        </div>
                    </fieldset>
                    <fieldset style="float: left">
                        <legend>Transaction details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Transaction type</td>
                                <td>
                                    <select name="transaction_type" class="select" id="payment-type" required>
                                        <option value="">--select payment type--</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="cheque-details">
                                <td width="170">Cheque Number</td>
                                <td>
                                    <input type="text" name="cheque_no" class="text" required id="cheque">
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
                                    <input type="number" name="payed_amount" class="number" min="0" required style="width: 150px;"> Payed in fully
                                </td>
                            </tr>
                            <tr>
                                <td width="170" style="vertical-align: top">Amount in Words</td>
                                <td>
                                    <textarea name="amount_in_words" rows="6" cols="33" placeholder="PAYED AMOUNT IN WORDS:" required></textarea>
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
            <div id="receipt" style="display: none">
                <div class="pop-up-wrapper">
                    <div class="pop-up-receipt">
                        <div class="form-header">
                            <div class="close"></div>
                            <!--  end . form-header --> </div>

                        <form action="" id="payment-form" method="post" style="padding-top: 30px; margin-bottom: 0" >
                            <div id="receipt-print">
                                <div class="receipt-header"></div>
                                <div class="receipt-body">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="receipt-table">
                                        <tr>
                                            <td width="18%">Customer Name:</td>
                                            <td width="50%">SEBASTIAN NICAS BUHATWA</td>
                                            <td width="8%">&nbsp;</td>
                                            <td width="23%" align="right"><span style="float: left">Receipt No:</span> 01819894</td>
                                        </tr>
                                        <tr>
                                            <td>Account No:</td>
                                            <td>90015030</td>
                                            <td>&nbsp;</td>
                                            <td align="right"><span style="float: left">Date:</span><?php echo date('d M, Y') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Customer Address:</td>
                                            <td>70383 Dar</td>
                                            <td>&nbsp;</td>
                                            <td align="right"><span style="float: left">Time:</span><?php echo date('H:i:s') ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>PLOT NO: KND/UBG/UMS 38/24</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>BLOCK NO: UBUNGO MSEWE</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount in Words:</strong></td>
                                            <td rowspan="2"><strong>Fifty thousand shillings only qwertyuiosdfghjkl ertyuiotyui retyuio</strong></td>

                                            <td colspan="2"><strong style="float: right">TZS 456789.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td width="1%">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Receipt Type:</td>
                                            <td>Receipting Consumption</td>
                                            <td>Cashier:</td>
                                            <td>ROBERT ANDREA LONDO</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Type:</td>
                                            <td>Cash</td>
                                            <td>Station:</td>
                                            <td>Kimara Area Station</td>
                                        </tr>
                                        <tr>
                                            <td>Cheque Details:</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    <!-- end .form-body --> </div>
                                <!-- end .receipt-print --> </div>
                            <table width="100%" class="form-footer">
                                <tr align="right">
                                    <td width="">
                                        <button type="submit" id="save-print">Save & Print</button>
                                        <button type="reset" id="save-print">Cancel</button>
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