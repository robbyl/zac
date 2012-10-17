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
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | OFFLINE PAYMENTS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                
                $('.tooltip').tipTip({
                    delay: "300"
                });
                
                $('.tooltip-right').tipTip({
                    delay: "300",
                    defaultPosition: "right"
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
                        
                        var recNo = $('#rec-no').val();
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
                        
                        $('#recRecNo').html(recNo);
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

                // Submitting payments to the databse.
                $('#save-print').click(function(){
 
                    $('#payment-form').unbind('submit').submit();
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
            
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [6], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
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
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Accept Offline Payments</h1>
                <div class="hr-line"></div>
                <form action="process_offline_payment.php" id="payment-form" method="post">
                    <fieldset style="float: left">
                        <legend>Customer/Applicant Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Receipt No</td>
                                <td><input type="text" name="receipt_no" id="rec-no" class="text" required /></td>
                            </tr>
                            <tr>
                                <td width="170">
                                    <select name="cust_appnt" id="cust-appnt" required class="select">
                                        <option value="">--select no--</option>
                                        <option value="Account No">Account No</option>
                                        <option value="Appln No">Application No</option>
                                    </select></td>
                                <td>
                                    <input type="text" name="number" id="number" required autocomplete="off" pattern=".{8,}" title="Minimum 8 characters"  oninput="moreDetails()" class="text tooltip-right" >
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
                                            <td width="23%" align="right"><span style="float: left">Receipt No:</span><span id="recRecNo"></span></td>
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
                                        <button type="submit" form="payment-form" id="save-print">Save</button>
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
