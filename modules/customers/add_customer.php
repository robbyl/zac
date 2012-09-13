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
    <div class="pop-up-form">
        <?php
        // Displaying message and errors
        include '../../includes/info.php';
        ?>
        <div class="form-header">
            <div class="close"></div><h1>Add Customer</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>
        <?php
        if (isset($_GET['appln_id']) && !empty($_GET['appln_id']) &&
                isset($_GET['appnt_id']) && !empty($_GET['appnt_id'])) {

            require '../../config/config.php';
            require '../../functions/general_functions.php';

            $query_meter = "SELECT met_id, met_number
                                      FROM meter
                                     WHERE availability = 'AVAILABLE'";

            $result_meter = mysql_query($query_meter) or die(mysql_error());

            $query_pay_center = "SELECT pac_id, pay_center
                                           FROM pay_center";

            $result_pay_center = mysql_query($query_pay_center) or die(mysql_error());

            $appln_id = clean($_GET['appln_id']);
            $appnt_id = clean($_GET['appnt_id']);

            $query_applnt = "SELECT appnt_fullname, appln_type, ba.ba_id
                                       FROM applicant appnt
                                 INNER JOIN application appln
                                         ON appnt.appnt_id = appln.appnt_id
                                 INNER JOIN billing_area ba
                                         ON appnt.ba_id = ba.ba_id
                                      WHERE appnt.appnt_id = '$appnt_id'";

            $result_applnt = mysql_query($query_applnt) or die(mysql_error());
            $row_appnt = mysql_fetch_array($result_applnt);
            ?>

            <form action="process_add_customer.php" method="post" >
                <div class="form-body">
                    <fieldset>
                        <legend>Customer Details </legend>
                        <table width="" border="0" cellpadding="5">
                            <input type="hidden" name="appln_id" value="<?php echo $appln_id; ?>">
                            <input type="hidden" name="appnt_id" value="<?php echo $appnt_id; ?>">
                            <input type="hidden" name="ba_id" value="<?php echo $row_appnt['ba_id']; ?>">
                            <tr>
                                <td width="170">Customer Name:</td>
                                <td><strong><?php echo $row_appnt['appnt_fullname'] ?></strong></td>
                            </tr>
                            <tr>
                                <td width="170">Service type:</td>
                                <td><strong><?php echo $row_appnt['appln_type'] ?></strong></td>
                            </tr>
                            <tr>
                                <td width="170">Premise status</td>
                                <td>
                                    <label><input type="radio" name="premise_status" value="Metered" required class="radio" id="metered">Metered</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="premise_status" value="Un metered" required class="radio" id="un_metered">Un metered</label>
                                </td>
                            </tr>
                            <tr id="meter_number">
                                <td width="170">Assigned Meter No</td>
                                <td>
                                    <select name="meter_number" id="met_id" required class="select" >
                                        <option value="">--Select meter no--</option>
                                        <?php while ($row_meter = mysql_fetch_array($result_meter)) { ?>
                                            <option value="<?php echo $row_meter['met_id'] ?>"><?php echo $row_meter['met_number']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Pay Center</td>
                                <td>
                                    <select name="pay_center" required class="select" >
                                        <option value="">--Select pay center--</option>
                                        <?php while ($row_pay_center = mysql_fetch_array($result_pay_center)) { ?>
                                            <option value="<?php echo $row_pay_center['pac_id'] ?>"><?php echo $row_pay_center['pay_center']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <!-- end .form-body --></div>
                <table width="100%" class="form-footer">
                    <tr align="right">
                        <td width=""><button type="submit">Save</button>
                            <button type="reset" style="margin-right: 0">Reset</button></td>
                    </tr>
                </table>
            </form>

            <?php
        }
        ?>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
