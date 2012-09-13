<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.message, .error').hide().slideDown('normal').click(function(){
            $(this).slideUp('normal');
        });

        $('#meter_number').hide();
        $('#un_metered').click(function(){
            $('#met_id').val("");
            $('#meter_number').hide();
        });
        $('#metered').click(function(){
            $('#meter_number').show();
        });

        $('.close').click(function(){
            $('.pop-up-wrapper').fadeOut('fast', function(){
                $(this).remove();
                $('body').css('overflow', 'visible');
            });
        });
    });
</script>
<div class="pop-up-wrapper">
    <div class="pop-up-receipt">
        <?php
        // Displaying message and errors
        include '../../includes/info.php';
        ?>
        <div class="form-header">
            <div class="close"></div>
            <!-- end . form-header --></div>
        <?php
//        if (isset($_GET['appln_id']) && !empty($_GET['appln_id']) &&
//                isset($_GET['appnt_id']) && !empty($_GET['appnt_id'])) {
//
//            require '../../config/config.php';
//            require '../../functions/general_functions.php';
//
//            $query_meter = "SELECT met_id, met_number
//                                      FROM meter
//                                     WHERE availability = 'AVAILABLE'";
//
//            $result_meter = mysql_query($query_meter) or die(mysql_error());
//
//            $query_pay_center = "SELECT pac_id, pay_center
//                                           FROM pay_center";
//
//            $result_pay_center = mysql_query($query_pay_center) or die(mysql_error());
//
//            $appln_id = clean($_GET['appln_id']);
//            $appnt_id = clean($_GET['appnt_id']);
//
//            $query_applnt = "SELECT appnt_fullname, appln_type, ba.ba_id
//                                       FROM applicant appnt
//                                 INNER JOIN application appln
//                                         ON appnt.appnt_id = appln.appnt_id
//                                 INNER JOIN billing_area ba
//                                         ON appnt.ba_id = ba.ba_id
//                                      WHERE appnt.appnt_id = '$appnt_id'";
//
//            $result_applnt = mysql_query($query_applnt) or die(mysql_error());
//            $row_appnt = mysql_fetch_array($result_applnt);
        ?>

        <form action="" method="post" style="padding-top: 30px; margin-bottom: 0" >
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
                <!-- end .form-body --></div>
            <table width="100%" class="form-footer">
                <tr align="right">
                    <td width=""><button type="submit">Save</button>
                        <button type="reset" style="margin-right: 0">Reset</button></td>
                </tr>
            </table>
        </form>

        <?php
//        }
        ?>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
