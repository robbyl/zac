
<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../js/zanhid-core.js" type="text/javascript"></script>
<script src="../../js/tooltip.js" type="text/javascript"></script>

<style type="text/css">
    .form-body {
        height: 200px;
    }
    .pop-up-form {
        height: auto;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

        $('.tooltip').tipTip({
            delay: "300"
        });

        $('.tip_left').tipTip({
            delay: 300,
            defaultPosition: "left"
        });

        $('.close').click(function() {
            $('.pop-up-wrapper').fadeOut('fast', function() {
                $(this).hide();
                $('body').css('overflow', 'visible');
            });
        });


        $('#form-summary').submit(function(event) {
            event.preventDefault();

            var quarter = $('#month_range').val();
            var year = $('#year').val();
            var geoarea = $('#geoarea').val();

            nav('form_summary.php?quarter=' + quarter + '&year=' + year + '&geoarea=' + geoarea);

        });
    });
</script>
<div class="pop-up-wrapper">
    <div class="pop-up-form">
        <div class="form-header">
            <div class="close tip_left "title="Close"></div><h1>ZHAPMoS Form Summary Criteria</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>

        <form action="#" method="post" id="form-summary" >
            <div class="form-body">
                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td width="170">Report Quarter</td>
                        <td>
                            <p style="margin: 0; padding: 0">
                                <select name="month_range" id="month_range" class="select" required="">
                                    <option value=""></option>
                                    <option value="01-01/03-31">January - March</option>
                                    <option value="04-01/06-30">April - June</option>
                                    <option value="07-01/09-30">July - September</option>
                                    <option value="10-01/12-31">October - December</option>
                                </select>
                                <select name="year" id="year" class="select" required="">
                                    <option value="" ></option>
                                    <?php
                                    for ($i = 2007; $i <= date('Y'); $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="170">Geographical Area</td>
                        <td>
                            <select name="geoarea" id="geoarea" required="" class="select"  style="width: 99%">
                                <option value=""></option>
                                <option value="National">National</option>
                                <option value="Unguja zone">Unguja zone</option>
                                <option value="North Unguja region">North Unguja region</option>
                                <option value="South Unguja region">South Unguja region</option>
                                <option value="Urban west region">Urban west region</option>
                                <option value="Pemba zone">Pemba zone</option>
                                <option value="North Pemba region">North Pemba region</option>
                                <option value="South Pemba region">South Pemba region</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <!-- end .form-body --></div>
            <table width="100%" class="form-footer">
                <tr align="right">
                    <td width=""><button type="submit" id="submit-form">Generate</button>
                        <button type="reset" style="margin-right: 0">Reset</button></td>
                </tr>
            </table>
        </form>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
