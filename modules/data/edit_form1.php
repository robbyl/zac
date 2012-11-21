<?php require '../../includes/session_validator.php'; ?>
<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | EDIT FORM-1</title>
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

                $('tr').click(function() {
                    var total = 0;
                    $(this).children().find('.number').each(function() {
                        total += $(this).val() * 1;
                    });
                    $(this).children('.total').html(total);
                });

                $('#completed-designation, #verified-designation').html('');
                var orgId = $('#org_name').val();
                var formNo = $('#form_no').val();

                organisationDetails('outocomplete/organisation.php', orgId, formNo);
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
                <h1>Edit ZHAPMoS Form 1</h1>
                <div class="hr-line"></div>
                <?php
                require '../../config/config.php';
                require '../../functions/general_functions.php';
                // Displaying message and errors
                include '../../includes/info.php';

                $form_id = clean($_GET['form_id']);
                $lang = clean($_GET['lang']);


                if (isset($form_id) && !empty($form_id) && isset($lang) && !empty($lang)) {

                    $form_serial_no = $form_id;
                    require 'sections/lang_section.php';
                    $heading = $text["FORM_1_HEAD"];

                    $query_ans = "SELECT `FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`,
                                         `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`,
                                         `ZhaFigureValue`, CONCAT(BreakdownTypeID1, '-', BreakdownTypeID2,  '-',
                                         BreakdownTypeID3, '-', BreakdownTypeID4, '-', ZhaFigureValue) AS HPanswer
                                    FROM tblzhafigures
                                   WHERE `FormSerialNumber` = '$form_id'";

                    $result_ans = mysql_query($query_ans) or die(mysql_error());

                    while ($ans = mysql_fetch_array($result_ans)) {

                        $fig_ans[$ans['ZhaFigureCode']][$ans['BreakdownTypeID1']][$ans['BreakdownTypeID2']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']] = $ans['ZhaFigureValue'];
                        $fig_anshs[$ans['ZhaFigureCode']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']][] = $ans['HPanswer'];
                    }

                    $figval_1 = $fig_anshs['HP1']['Y25']['MAL'][0];
                    $expfig_1 = explode("-", $figval_1);
                    $BreakdownTypeID1_1 = $expfig_1[0];
                    $BreakdownTypeID2_1 = $expfig_1[1];
                    $ZhaFigureValue_1 = $expfig_1[4];

                    $figval_2 = $fig_anshs['HP1']['Y25']['MAL'][1];
                    $expfig_2 = explode("-", $figval_2);
                    $BreakdownTypeID1_2 = $expfig_2[0];
                    $BreakdownTypeID2_2 = $expfig_2[1];
                    $ZhaFigureValue_2 = $expfig_2[4];

                    $figval_3 = $fig_anshs['HP1']['Y25']['MAL'][2];
                    $expfig_3 = explode("-", $figval_3);
                    $BreakdownTypeID1_3 = $expfig_3[0];
                    $BreakdownTypeID2_3 = $expfig_3[1];
                    $ZhaFigureValue_3 = $expfig_3[4];

                    $figval_4 = $fig_anshs['HP1']['Y25']['MAL'][3];
                    $expfig_4 = explode("-", $figval_4);
                    $BreakdownTypeID1_4 = $expfig_4[0];
                    $BreakdownTypeID2_4 = $expfig_4[1];
                    $ZhaFigureValue_4 = $expfig_4[4];

                    $figval_5 = $fig_anshs['HP1']['Y25']['MAL'][4];
                    $expfig_5 = explode("-", $figval_5);
                    $BreakdownTypeID1_5 = $expfig_5[0];
                    $BreakdownTypeID2_5 = $expfig_5[1];
                    $ZhaFigureValue_5 = $expfig_5[4];

                    $figval_6 = $fig_anshs['HP1']['Y25']['MAL'][5];
                    $expfig_6 = explode("-", $figval_6);
                    $BreakdownTypeID1_6 = $expfig_6[0];
                    $BreakdownTypeID2_6 = $expfig_6[1];
                    $ZhaFigureValue_6 = $expfig_6[4];

                    $figval_1f = $fig_anshs['HP1']['Y25']['FEM'][0];
                    $expfig_1f = explode("-", $figval_1f);
                    $BreakdownTypeID1_1f = $expfig_1f[0];
                    $BreakdownTypeID2_1f = $expfig_1f[1];
                    $ZhaFigureValue_1f = $expfig_1f[4];

                    $figval_2f = $fig_anshs['HP1']['Y25']['FEM'][1];
                    $expfig_2f = explode("-", $figval_2f);
                    $BreakdownTypeID1_2f = $expfig_2f[0];
                    $BreakdownTypeID2_2f = $expfig_2f[1];
                    $ZhaFigureValue_2f = $expfig_2f[4];

                    $figval_3f = $fig_anshs['HP1']['Y25']['FEM'][2];
                    $expfig_3f = explode("-", $figval_3f);
                    $BreakdownTypeID1_3f = $expfig_3f[0];
                    $BreakdownTypeID2_3f = $expfig_3f[1];
                    $ZhaFigureValue_3f = $expfig_3f[4];

                    $figval_4f = $fig_anshs['HP1']['Y25']['FEM'][3];
                    $expfig_4f = explode("-", $figval_4f);
                    $BreakdownTypeID1_4f = $expfig_4f[0];
                    $BreakdownTypeID2_4f = $expfig_4f[1];
                    $ZhaFigureValue_4f = $expfig_4f[4];

                    $figval_5f = $fig_anshs['HP1']['Y25']['FEM'][4];
                    $expfig_5f = explode("-", $figval_5f);
                    $BreakdownTypeID1_5f = $expfig_5f[0];
                    $BreakdownTypeID2_5f = $expfig_5f[1];
                    $ZhaFigureValue_5f = $expfig_5f[4];

                    $figval_6f = $fig_anshs['HP1']['Y25']['FEM'][5];
                    $expfig_6f = explode("-", $figval_6f);
                    $BreakdownTypeID1_6f = $expfig_6f[0];
                    $BreakdownTypeID2_6f = $expfig_6f[1];
                    $ZhaFigureValue_6f = $expfig_6f[4];


                    $figval_1o = $fig_anshs['HP1']['25O']['MAL'][0];
                    $expfig_1o = explode("-", $figval_1o);
                    $BreakdownTypeID1_1o = $expfig_1o[0];
                    $BreakdownTypeID2_1o = $expfig_1o[1];
                    $ZhaFigureValue_1o = $expfig_1o[4];

                    $figval_2o = $fig_anshs['HP1']['25O']['MAL'][1];
                    $expfig_2o = explode("-", $figval_2o);
                    $BreakdownTypeID1_2o = $expfig_2o[0];
                    $BreakdownTypeID2_2o = $expfig_2o[1];
                    $ZhaFigureValue_2o = $expfig_2o[4];

                    $figval_3o = $fig_anshs['HP1']['25O']['MAL'][2];
                    $expfig_3o = explode("-", $figval_3o);
                    $BreakdownTypeID1_3o = $expfig_3o[0];
                    $BreakdownTypeID2_3o = $expfig_3o[1];
                    $ZhaFigureValue_3o = $expfig_3o[4];

                    $figval_4o = $fig_anshs['HP1']['25O']['MAL'][3];
                    $expfig_4o = explode("-", $figval_4o);
                    $BreakdownTypeID1_4o = $expfig_4o[0];
                    $BreakdownTypeID2_4o = $expfig_4o[1];
                    $ZhaFigureValue_4o = $expfig_4o[4];

                    $figval_5o = $fig_anshs['HP1']['25O']['MAL'][4];
                    $expfig_5o = explode("-", $figval_5o);
                    $BreakdownTypeID1_5o = $expfig_5o[0];
                    $BreakdownTypeID2_5o = $expfig_5o[1];
                    $ZhaFigureValue_5o = $expfig_5o[4];

                    $figval_6o = $fig_anshs['HP1']['25O']['MAL'][5];
                    $expfig_6o = explode("-", $figval_6o);
                    $BreakdownTypeID1_6o = $expfig_6o[0];
                    $BreakdownTypeID2_6o = $expfig_6o[1];
                    $ZhaFigureValue_6o = $expfig_6o[4];

                    $figval_1fo = $fig_anshs['HP1']['25O']['FEM'][0];
                    $expfig_1fo = explode("-", $figval_1fo);
                    $BreakdownTypeID1_1fo = $expfig_1fo[0];
                    $BreakdownTypeID2_1fo = $expfig_1fo[1];
                    $ZhaFigureValue_1fo = $expfig_1fo[4];

                    $figval_2fo = $fig_anshs['HP1']['25O']['FEM'][1];
                    $expfig_2fo = explode("-", $figval_2fo);
                    $BreakdownTypeID1_2fo = $expfig_2fo[0];
                    $BreakdownTypeID2_2fo = $expfig_2fo[1];
                    $ZhaFigureValue_2fo = $expfig_2fo[4];

                    $figval_3fo = $fig_anshs['HP1']['25O']['FEM'][2];
                    $expfig_3fo = explode("-", $figval_3fo);
                    $BreakdownTypeID1_3fo = $expfig_3fo[0];
                    $BreakdownTypeID2_3fo = $expfig_3fo[1];
                    $ZhaFigureValue_3fo = $expfig_3fo[4];

                    $figval_4fo = $fig_anshs['HP1']['25O']['FEM'][3];
                    $expfig_4fo = explode("-", $figval_4fo);
                    $BreakdownTypeID1_4fo = $expfig_4fo[0];
                    $BreakdownTypeID2_4fo = $expfig_4fo[1];
                    $ZhaFigureValue_4fo = $expfig_4fo[4];

                    $figval_5fo = $fig_anshs['HP1']['25O']['FEM'][4];
                    $expfig_5fo = explode("-", $figval_5fo);
                    $BreakdownTypeID1_5fo = $expfig_5fo[0];
                    $BreakdownTypeID2_5fo = $expfig_5fo[1];
                    $ZhaFigureValue_5fo = $expfig_5fo[4];

                    $figval_6fo = $fig_anshs['HP1']['25O']['FEM'][5];
                    $expfig_6fo = explode("-", $figval_6fo);
                    $BreakdownTypeID1_6fo = $expfig_6fo[0];
                    $BreakdownTypeID2_6fo = $expfig_6fo[1];
                    $ZhaFigureValue_6fo = $expfig_6fo[4];


//                    echo $BreakdownTypeID1_1;
//                    exit;

                    $query_mc = "SELECT FormSerialNumber, `ZhaQuestionCode`, `ZhaAnswer`, `ZhaAnswerText`,
                                        DATE(`ZhaAnswerDate`) AS ZhaAnswerDate
                                   FROM tblzhaanswers
                                  WHERE `FormSerialNumber` = '$form_id'";
                    $result_mc = mysql_query($query_mc) or die(mysql_error());

                    while ($mc = mysql_fetch_array($result_mc)) {
                        $mcans[$mc['ZhaQuestionCode']] = $mc['ZhaAnswer'];
                        $mcdate[$mc['ZhaQuestionCode']] = $mc['ZhaAnswerDate'];
                        $mctext[$mc['ZhaQuestionCode']] = $mc['ZhaAnswerText'];
                    }

                    $query_submitted = "SELECT `FormSerialNumber`, `OrganisationCode`, `DistrictCode`, DATE(`PeriodFrom`) AS PeriodFrom,
                                               DATE(`PeriodTo`) AS PeriodTo, `CompletedByPersonID`, DATE(`DateCompleted`) AS DateCompleted,
                                               `ApprovedByPersonID`, DATE(`DateApproved`) AS DateApproved, DATE(`DateReceived`) AS DateReceived,
                                               DATE(`DateCaptured`) AS DateCaptured, `CapturedByUserID`, DATE(`DateFiled`) AS DateFiled,
                                               DATE(`DateVerified`) AS DateVerified, `VerifiedByUserID`, `NotesWrittenOnForm`, DataEntryNotes
                                          FROM tblzhaformssubmitted
                                         WHERE FormSerialNumber = '$form_id'";

                    $result_submitted = mysql_query($query_submitted) or die(mysql_error());
                    $submitted = mysql_fetch_array($result_submitted);

                    $period_from = $submitted['PeriodFrom'];
                    $period_to = $submitted['PeriodTo'];

                    $experiod_from = explode("-", $period_from);
                    $experiod_to = explode("-", $period_to);
                    $year = $experiod_from[0];
                    $month_range = $experiod_from[1] . '-' . $experiod_from[2] . '/' . $experiod_to[1] . '-' . $experiod_to[2];
                    ?>
                    <form action="process_edit_form1.php" method="post">
                        <input type="hidden" name="lang" value="<?php echo $lang ?>">
                        <input type="hidden" name="reg_no" id="reg_no" class="text" style="width: 98%">
                        <div class="data-form-wapper">
                            <?php require 'sections/edit_head_section.php'; ?>
                            <div class="section">
                                <h3><strong>A. <?php echo $text["SECT_HEAD_A"]; ?></strong></h3>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5"  class="form-data-table">
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_NOG"]; ?></td>
                                        <td colspan="3">
                                            <select class="select" name="org_name" id="org_name" disabled="" required style="width: 100%;">
                                                <option value=""></option>
                                                <?php
                                                $query_org = "SELECT `OrganisationCode`, `OrganisationName`, `ZhaFormNumber`
                                                            FROM tblgenorganisations org
                                                       LEFT JOIN tblzhasetuplinkorgcatformtypes cat
                                                              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                                           WHERE `ZhaFormNumber` = '1'
                                                        ORDER BY `OrganisationName` ASC";
                                                $result_org = mysql_query($query_org) or die(mysql_error());
                                                while ($org = mysql_fetch_array($result_org)) {
                                                    ?>
                                                    <option value="<?php echo $org['OrganisationCode'] ?>" <?php if ($submitted['OrganisationCode'] === $org['OrganisationCode']) echo 'selected'; ?>><?php echo $org['OrganisationName'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td width="39" class="data-group">CD1</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_PHY"]; ?></td>
                                        <td colspan="3"><input type="text" name="phy_addr" id="phy_addr" class="text" style="width: 98%"></td>
                                        <td class="data-group">CD2</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_POS"]; ?></td>
                                        <td colspan="3"><input type="text" name="post_addr" id="post_addr" class="text" style="width: 98%"></td>
                                        <td class="data-group">CD3</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_FOP"]; ?></td>
                                        <td colspan="3"><input type="text" name="focal_per" id="focal_per" class="text" style="width: 98%"></td>
                                        <td class="data-group">CD4</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" rowspan="2"><?php echo $text["SECT_LABEL_CFP"]; ?></td>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_TEL"]; ?> <input type="tel" name="focal_tel" id="focal_tel" class="text" style="width: 78%"></td>
                                        <td width="175"><?php echo $text["SECT_LABEL_FAX"]; ?> <input type="tel" name="focal_fax" id="focal_fax" class="text" style="width: 77%"></td>
                                        <td rowspan="2" class="data-group">CD5</td>
                                    </tr>
                                    <tr>

                                        <td colspan="3"><?php echo $text["SECT_LABEL_EML"]; ?> <input type="email" name="focal_email" id="focal_email" class="text" style="width: 80%"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_REG"]; ?></td>
                                        <td colspan="3"><input type="text" name="reg_no" id="reg_no" class="text" style="width: 98%" readonly></td>
                                        <td class="data-group">CD6</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_UMB"]; ?></td>
                                        <td width="188">
                                            <label><input type="radio" name="is_umbrella" value="Yes" id="yes_umbrella"> <?php echo $text["SECT_LABEL_YES"] ?></label> &nbsp;
                                            <label><input type="radio" name="is_umbrella" value="No" id="no_umbrella"> <?php echo $text["SECT_LABEL_NO"] ?></label>
                                        </td>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_NUM"] ?>
                                            <input type="text" name="umbrella" id="umbrella" class="text" style="width: 96%">
                                        </td>
                                        <td class="data-group">CD7</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_DAT"]; ?></td>
                                        <td colspan="3"><input type="date" name="org_date" id="org_date" class="text"></td>
                                        <td class="data-group">CD8</td>
                                    </tr>
                                    <tr>
                                        <td width="150" rowspan="3"><?php echo $text["SECT_LABEL_PTS"]; ?></td>
                                        <td width="112">&nbsp;</td>
                                        <td><?php echo $text["SECT_LABEL_MAL"]; ?></td>
                                        <td width="156"><?php echo $text["SECT_LABEL_FEM"]; ?></td>
                                        <td><?php echo $text["SECT_LABEL_TOT"]; ?></td>
                                        <td rowspan="3" class="data-group">CD9</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_FTM"]; ?></td>
                                        <td><input type="number" name="full_male" id="full_male" value="<?php if (!empty($fig_ans['CD9']['FLT']['MAL'][''][''])) echo $fig_ans['CD9']['FLT']['MAL']['']['']; ?>" min="0" class="number"></td>
                                        <td><input type="number" name="full_female" id="full_female" value="<?php if (!empty($fig_ans['CD9']['FLT']['FEM'][''][''])) echo $fig_ans['CD9']['FLT']['FEM']['']['']; ?>" min="0" class="number"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_PTM"]; ?></td>
                                        <td><input type="number" name="part_male" id="part_male" value="<?php if (!empty($fig_ans['CD9']['PRT']['MAL'][''][''])) echo $fig_ans['CD9']['PRT']['MAL']['']['']; ?>" min="0" class="number"></td>
                                        <td><input type="number" name="part_female" id="part_female"  value="<?php if (!empty($fig_ans['CD9']['PRT']['FEM'][''][''])) echo $fig_ans['CD9']['PRT']['FEM']['']['']; ?>" min="0" class="number"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_NOD"]; ?></td>
                                        <td colspan="3">
                                            <select class="select" name="district" id="district" readonly="" style="width: 100%;">
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
                                        <td class="data-group">CD10</td>
                                    </tr>
                                </table>
                                <!-- end .section  --></div>
                            <?php require 'sections/edit_common_section.php'; ?>
                            <?php require 'sections/edit_footer_section.php'; ?>
                            <!-- end .data-form-wrapper  -->  </div>
                    </form>
                    <?php
                } else {
                    info('error', 'Please provide form serial no or editing language!');

                    // Displaying message and errors
                    include '../../includes/info.php';
                }
                ?>
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