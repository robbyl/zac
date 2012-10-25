<link href="../../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/pop-up.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="../../js/zanhid-core.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.close').click(function() {
            $('.pop-up-wrapper').fadeOut('fast', function() {
                $(this).hide();
                $('body').css('overflow', 'visible');
            });
        });
        
        
        $('#form-type').submit(function(event) {
            event.preventDefault();

            var form = $('#select-form').val();
            var lang = $('input[name=language]:checked').val();
            
            switch (form) {
                case "1" :
                    nav("form1.php?lang=" + lang);
                    break;
                case "2" :
                    nav("form2.php?lang=" + lang);
                    break;
                case "3" :
                    nav("form3.php?lang=" + lang);
                    break;
                case "4" :
                    nav("form4.php?lang=" + lang);
                    break;
                case "5" :
                    alert('Form Type 5 is not Supported yet. Please Select Another');
                    break;
                case "6" :
                    nav("form6.php?lang=" + lang);
                    break;
                default :
                    alert('Please Select Form Type From the List');
            }
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
            <div class="close"></div><h1>ZHAPMoS Form Type</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>

        <form action="#" method="post" id="form-type" >
            <div class="form-body">
                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td width="170">ZHAPMoS Form Type:</td>
                        <td>
                            <select name="form_type" required="" id="select-form" class="select" style="width: 420px;" >
                                <option value=""></option>
                                <?php
                                require '../../config/config.php';
                                $query_form = "SELECT `ZhaFormNumber`, `ZhaFormName`
                                                         FROM  tblzhasetupformtypes
                                                     ORDER BY `ZhaFormNumber` ASC";
                                $result_form = mysql_query($query_form) or die(mysql_error());
                                while ($form = mysql_fetch_array($result_form)) {
                                    ?>
                                    <option value="<?php echo $form['ZhaFormNumber'] ?>"><?php echo $form['ZhaFormName'] ?></option>
                                    <?php
                                }
                                mysql_close($conn);
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="170">Language</td>
                        <td>
                            <div class="lang en"><input type="radio" name="language" value="en" required=""></div>
                            <div class="lang sw"><input type="radio" name="language" value="sw" required=""></div></td>
                    </tr>
                </table>
                <!-- end .form-body --></div>
            <table width="100%" class="form-footer">
                <tr align="right">
                    <td width=""><button type="submit" id="submit-form">Add Form</button>
                        <button type="reset" style="margin-right: 0">Reset</button></td>
                </tr>
            </table>
        </form>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
