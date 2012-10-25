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

        $('.close').click(function() {
            $('.pop-up-wrapper').fadeOut('fast', function() {
                $(this).hide();
                $('body').css('overflow', 'visible');
            });
        });

        $('#by_category').change(function() {

            if (this.checked) {
                $('#org_cat').attr('required', 'required');
                $('#org-category').show();
            }
        });

        $('#not-by-cat1, #not-by-cat2, #clear').click(function() {
            $('#org_cat').val("").removeAttr('required');
            $('#org-category').css('display', 'none');
        });

        $('#form-org-creteria').submit(function(event) {
  
             event.preventDefault();
             nav('print_organisations.php');
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
            <div class="close tip_left" title="Close" ></div>
            <h1>Organisation Criteria</h1>
            <div class="hr-line"></div>
            <!-- end . form-header --></div>

        <form action="#" method="post" id="form-org-creteria" >
            <div class="form-body">
                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td><label><input type="radio" name="org_creteria1" value="" id="not-by-cat1"  required> All Organisations</label></td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="org_creteria1" value="" required="" id="not-by-cat2"> ZHAPMos Reporting organisations</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="org_creteria1" value="" required="" id="by_category"> Particular Category of Organisations</label></td>
                    </tr>
                    <tr id="org-category" style="display: none">
                        <td>
                            <select name="org_cat" id="org_cat" class="select" required="" style="width: 390px; margin-left: 25px">
                                <option value=""></option> 
                                <?php
                                require '../../config/config.php';
                                $query_cat = "SELECT `OrganisationCategoryID`, `OrganisationCategoryDescription`
                                                            FROM tblgensetuporganisationcategories
                                                        ORDER BY `OrganisationCategoryDescription` ASC";
                                $result_cat = mysql_query($query_cat) or die(mysql_error());
                                while ($cat = mysql_fetch_array($result_cat)) {
                                    ?>
                                    <option value="<?php echo $cat['OrganisationCategoryID'] ?>"><?php echo $cat['OrganisationCategoryDescription'] ?></option>
                                    <?php
                                }
                                mysql_close($conn);
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <table width="" border="0" cellpadding="5" style="margin-top: 50px;">
                    <tr>
                        <td><label><input type="radio" name="org_creteria2" value="" required=""> Organisation Details Only</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="radio" name="org_creteria2" value="" required=""> Organisation and People Details</label></td>
                    </tr>
                </table>
                <!-- end .form-body --></div>
            <table width="100%" class="form-footer">
                <tr align="right">
                    <td width=""><button type="submit">Save</button>
                        <button type="reset" id="clear" style="margin-right: 0">Reset</button></td>
                </tr>
            </table>
        </form>
        <!-- end .pop-up-form --></div>
    <!-- end .pop-up-wrapper --></div>
