<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../js/zanhid-core.js" type="text/javascript"></script>
<script src="../../js/tooltip.js" type="text/javascript"></script>

<style type="text/css">
    .pop-up-form {
        width: 750px;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('.message, .error').hide().slideDown('normal').click(function() {
            $(this).slideUp('normal');
        });

        $('.tip_left').tipTip({
            delay: 300,
            defaultPosition: "left"
        });

        $('.close').click(function() {
            $('.pop-up-wrapper').fadeOut('fast', function() {
                $(this).remove();
                $('body').css('overflow', 'visible');
            });
        });

        $('#by_category').change(function() {

            if (this.checked) {

                $('#org_cat').attr("required", "required");
                $('#org-category').show();

            }
        });

        $('#not-by-cat1, #not-by-cat2, #clear').click(function() {
            $('#org_cat').val("").removeAttr('required');
            $('#org-category').css('display', 'none');
        });

        $('#form-org-creteria').submit(function(event) {

            event.preventDefault();

            var creteria = $('input[name=org_creteria1]:checked').val();
            var details = $('input[name=org_creteria2]:checked').val();

            if (creteria === 'particular') {
                orgCategory = $('#org_cat').val();
                nav('print_organisations.php?creteria=' + creteria + '&category=' + orgCategory + '&details=' + details);
            } else {
                nav('print_organisations.php?creteria=' + creteria + '&category=none&details=' + details);
            }
        });

    });
</script>
<div class="pop-up-wrapper">
    <div class="pop-up-form">
        <div class="form-header">
            <div class="close tip_left" title="Close" ></div>
            <h1>ZHAPMoS Forms Submitted Criteria</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>

        <form action="#" method="post" id="form-org-creteria" >
            <div class="form-body">
                <fieldset>
                    <legend>Date</legend>
                    <table width="" border="0" cellpadding="5">
                        <tr>
                            <td width="200" style="padding-left: 10px;">From</td><td><input type="date" required="" name="received_form" class="text"></td>
                        </tr>
                        <tr>
                            <td width="200" style="padding-left: 10px;">To</td> <td><input type="date" required="" name="received_to" class="text"></td>
                        </tr>
                    </table>
                </fieldset>
                <!-- end .form-body --></div>
            <table width="100%" class="form-footer">
                <tr align="right">
                    <td width=""><button type="submit">Generate</button>
                        <button type="reset" id="clear" style="margin-right: 0">Reset</button></td>
                </tr>
            </table>
        </form>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
