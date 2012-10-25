<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.message, .error').hide().slideDown('normal').click(function(){
            $(this).slideUp('normal');
        });

        $('#meter_number').css('display', 'none');
        
        $('#un_metered').click(function(){
            $('#met_id').val("").removeAttr('required');
            $('#meter_number').css('display', 'none');
        });
        $('#metered').click(function(){
            $('#meter_number').show();
            $('#met_id').attr('required', 'required');
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

            <form action="../customers/process_add_customer.php" method="post" >
                <div class="form-body">
                    <fieldset>
                        <legend>Customer Details </legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">checkbox All Organisations</td>
                                <td>
                                    <select name="form_type" required="" class="select">
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">ZHAPMos reporting organisations</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="170">Particular catercory of organisations</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="170">Organisation details only</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="170">organisation and people details</td>
                                <td></td>
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
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
