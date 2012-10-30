<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../js/zanhid-core.js" type="text/javascript"></script>
<script src="../../js/tooltip.js" type="text/javascript"></script>

<style type="text/css">
    .pop-up-form {
        width: 600px;
        height: 336px;
    }

    .form-body {
        height: 200px;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {

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

        $('#financial-year').submit(function(event) {

            event.preventDefault();

            var year = $('#finacial-year').val();

            nav('print_submission_records.php?year=' + year);
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

        <form action="#" method="post" id="financial-year" >
            <div class="form-body">
                <fieldset>
                    <legend>Date</legend>
                    <table width="" border="0" cellpadding="5">
                        <tr>
                            <td width="200" style="padding-left: 10px;">Financial Year</td>
                            <td>
                                <select name="finacial_year" class="select" id="finacial-year" required="" style="width: 300px">
                                    <option value=""></option>
                                    <?php
                                    for ($i = 2007; $i <= date('Y'); $i++) {
                                        echo '<option value="' . $i . '/' . ($i + 1) . '">' . $i . '/' . ($i + 1) . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
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
