<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';

// Getting last form serial number
$query_form_id = "SELECT MAX(`FormSerialNumber`) AS last_serial
                    FROM tblzhaformssubmitted
                   WHERE `FormSerialNumber`
                    LIKE 'F4-%'";

$result_form_id = mysql_query($query_form_id) or die(mysql_error());

$last_serial = mysql_fetch_array($result_form_id);

$form_serial_no = $last_serial['last_serial'];

$no = explode("-", $form_serial_no);
$expl_no = $no[1];
$expl_no++;
$form_serial_no = 'F4-' . $expl_no;

require 'sections/lang_section.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | FORM-4</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

// Calculate total number of vales in row
                $('.fst').on('input', function() {

                    var total = 0;
                    $(this).closest('tr').find('.fst').each(function() {

                        total += $(this).val() * 1;
                    });

                    $(this).closest('tr').find('.fst').html(total);
                });

                $('.snd').on('input', function() {

                    var total = 0;
                    $(this).closest('tr').find('.snd').each(function() {

                        total += $(this).val() * 1;
                    });

                    $(this).closest('tr').find('.snd').html(total);
                });

                $('.trd').on('input', function() {

                    var total = 0;
                    $(this).closest('tr').find('.trd').each(function() {

                        total += $(this).val() * 1;
                    });

                    $(this).closest('tr').find('.trd').html(total);
                });

                $('#shehia_name').change(function() {

                    var orgId = $(this).val();
                    $('#completed-designation, #verified-designation').html('');
                    shehiaDetails('outocomplete/organisation.php', orgId);
                });
            });
        </script>
        <style type="text/css">
            .text , .text:focus {
                border: none;
            }
            .message, .error {
                display: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Add New ZHAPMoS Form 4</h1>
                <div class="hr-line"></div>
                <form action="process_form4.php" method="post" novalidate>
                    <input type="hidden" name="lang" value="<?php echo $lang ?>">
                    <input type="hidden" name="reg_no" id="reg_no" class="text" style="width: 98%">
                    <div class="data-form-wapper">
                        <?php $heading = $text["FORM_4_HEAD"]; ?>
                        <?php require 'sections/head_section.php'; ?>
                        <div class="section">
                            <h3><strong>A. <?php echo $text["SECT_HEAD_A4"]; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_NSH"]; ?></td>
                                    <td colspan="3">
                                        <select class="select" name="shehia_name" id="shehia_name" required style="width: 100%;">
                                            <option value=""></option>
                                            <?php
                                            $query_org = "SELECT `OrganisationCode`, `OrganisationName`, `ZhaFormNumber`
                                                            FROM tblgenorganisations org
                                                       LEFT JOIN tblzhasetuplinkorgcatformtypes cat
                                                              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                                           WHERE `ZhaFormNumber` = '4'
                                                        ORDER BY `OrganisationName` ASC";
                                            $result_org = mysql_query($query_org) or die(mysql_error());
                                            while ($org = mysql_fetch_array($result_org)) {
                                                ?>
                                                <option value="<?php echo $org['OrganisationCode'] ?>"><?php echo $org['OrganisationName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td width="39" class="data-group">A1</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_POH"]; ?></td>
                                    <td colspan="3"><input type="text" name="post_addr" id="post_addr" class="text" style="width: 98%"></td>
                                    <td class="data-group">A2</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_FOP"]; ?></td>
                                    <td colspan="3"><input type="text" name="focal_per" id="focal_per" class="text" style="width: 98%"></td>
                                    <td class="data-group">A3</td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="2"><?php echo $text["SECT_LABEL_CFP"]; ?></td>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_TEL"]; ?> <input type="tel" name="focal_tel" id="focal_tel" class="text" style="width: 70%"></td>
                                    <td><?php echo $text["SECT_LABEL_FAX"]; ?> <input type="tel" name="focal_fax" id="focal_fax" class="text" style="width: 77%"></td>
                                    <td class="data-group">A4</td>
                                </tr>
                                <tr>

                                    <td colspan="3"><?php echo $text["SECT_LABEL_EML"]; ?> <input type="email" name="focal_email" id="focal_email" class="text" style="width: 80%"></td>
                                    <td class="data-group">A5</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_NOD"]; ?></td>
                                    <td colspan="3">
                                        <select class="select" name="district" id="district" style="width: 100%;">
                                            <option value=""></option>
                                            <?php
                                            $query_district = "SELECT `DistrictCode`, `District` FROM tblgensetupdistricts ORDER BY `District` ASC";
                                            $result_destrict = mysql_query($query_district) or die(mysql_error());
                                            while ($district = mysql_fetch_array($result_destrict)) {
                                                ?>
                                                <option value="<?php echo $district['DistrictCode'] ?>"><?php echo $district['District'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td class="data-group">A6</td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        <?php require 'sections/common_section.php'; ?>
                        <?php require 'sections/footer_section.php'; ?>
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">

        $('.data-entry').attr("id", "current");
        var i = $('h3#current').index('.menuheader') - 1;

        ddaccordion.init({
            headerclass: "expandable", //Shared CSS class name of headers group that are expandable
            contentclass: "categoryitems", //Shared CSS class name of contents group
            revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
            mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
            collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
            defaultexpanded: [i], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
            onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
            animatedefault: true, //Should contents open by default be animated into view?
            persiststate: false, //persist state of opened contents within browser session?
            toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
            togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
            animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
            oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
                //do nothing
            },
            onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
                //do nothing
            }
        });
    </script>
</html>
