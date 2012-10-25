<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../js/zanhid-core.js" type="text/javascript"></script>
<script src="../../js/tooltip.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.message, .error').hide().slideDown('normal').click(function() {
            $(this).slideUp('normal');
        });

        $('.tip_left').tipTip({
            delay: 300,
            defaultPosition: "left"
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
            <div class="close tip_left" title="Close" ></div><h1>Add Customer</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>

        <form action="../customers/process_add_customer.php" method="post" >
            <div class="form-body">
                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td><label><input type="radio" name="" value="" required> All Organisations</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="" value="" required=""> ZHAPMos Reporting organisations</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="" value="" required=""> Particular Category of Organisations</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="" value="" required=""> Organisation Details Only</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="" value="" required=""> Organisation and People Details</label></td>
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
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
