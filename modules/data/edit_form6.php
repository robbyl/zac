<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_GET['lang']);

if (!empty($lang) && isset($lang)) {
    switch ($lang) {

        case "en":
            include 'lang/en.php';

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'SPD'";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            while ($row = mysql_fetch_array($result_hiv_intv)) {

                $figurebreakdowntypes[$row['BreakdownTypeID']] = $row['breakdown'];
            }
            break;

        case "sw":
            include 'lang/sw.php';

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'SPD'";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            while ($row = mysql_fetch_array($result_hiv_intv)) {
                $figurebreakdowntypes[$row['BreakdownTypeID']] = $row['breakdown'];
            }
            break;
        default :
            break;
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | FORM-6</title>
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
                var orgId = $('#sch_name').val();
                schoolDetails('outocomplete/organisation.php', orgId);
            });
        </script>
        <style type="text/css">
            .text , .text:focus {
                border: none;
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
                <h1>Add New ZHAPMoS Form 6</h1>
                <div class="hr-line"></div>
                <?php
                $form_id = clean($_GET['form_id']);
                $lang = clean($_GET['lang']);

                if (isset($form_id) && !empty($form_id) && isset($lang) && !empty($lang)) {

                    $form_serial_no = $form_id;
                    require 'sections/lang_section.php';
                    $heading = $text["FORM_1_HEAD"];

                    $query_ans = "SELECT `FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`,
                                         `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`,
                                         `ZhaFigureValue`
                                    FROM tblzhafigures
                                   WHERE `FormSerialNumber` = '$form_id'";

                    $result_ans = mysql_query($query_ans) or die(mysql_error());

                    while ($ans = mysql_fetch_array($result_ans)) {

                        $fig_ans[$ans['ZhaFigureCode']][$ans['BreakdownTypeID1']][$ans['BreakdownTypeID2']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']] = $ans['ZhaFigureValue'];
                    }

                    $query_submitted = "SELECT `FormSerialNumber`, `OrganisationCode`, `DistrictCode`, DATE(`PeriodFrom`) AS PeriodFrom,
                                               DATE(`PeriodTo`) AS PeriodTo, `CompletedByPersonID`, DATE(`DateCompleted`) AS DateCompleted,
                                               `ApprovedByPersonID`, DATE(`DateApproved`) AS DateApproved, DATE(`DateReceived`) AS DateReceived, 
                                               DATE(`DateCaptured`) AS DateCaptured, `CapturedByUserID`,
                                               DATE(`DateVerified`) AS DateVerified, `VerifiedByUserID`, `NotesWrittenOnForm`, 
                                               DATE(`DataEntryNotes`) AS DataEntryNotes
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
                    <form action="process_form6.php" method="post" novalidate>
                        <input type="hidden" name="lang" value="<?php echo $lang ?>">
                        <div class="data-form-wapper">
                            <div class="form-header">
                                <div class="zanz-logo"></div>
                                <div class="zac-logo"></div>
                                <p class="form-heading">ZANZIBAR AIDS COMMISSION (ZAC)</p>
                                <p class="form-sub-header"><?php echo $text["FORM_6_HEAD"]; ?></p>

                                <div>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: none; margin-bottom: 0">
                                        <tr>
                                            <td width="6%">&nbsp;</td>
                                            <td width="12%">&nbsp;</td>
                                            <td width="51%">&nbsp;</td>
                                            <td width="14%"></td>
                                            <td width="17%"></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td align="right">Reporting period:</td>
                                            <td align="right">
                                                <select name="reporting_period" class="select" style="width: 150px;">
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

                                </div>
                                <!-- end .form-header --></div>
                            <div class="section">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                    <tr>
                                        <td width="33%"><?php echo $text["SECT_LABEL_NOG"]; ?></td>
                                        <td colspan="3">
                                            <select class="select" name="org_name" id="org_name" disabled="" required style="width: 100%;">
                                                <option value=""></option>
                                                <?php
                                                $query_org = "SELECT `OrganisationCode`, `OrganisationName`, `ZhaFormNumber`
                                                            FROM tblgenorganisations org
                                                       LEFT JOIN tblzhasetuplinkorgcatformtypes cat
                                                              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                                           WHERE `ZhaFormNumber` = '6'
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
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_PHY"]; ?></td>
                                        <td colspan="3"><input type="text" name="phy_addr" id="phy_addr" class="text" style="width: 98%"></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_POS"]; ?></td>
                                        <td colspan="3"><input type="text" name="post_addr" id="post_addr" class="text" style="width: 98%"></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_FOP"]; ?></td>
                                        <td colspan="3"><input type="text" name="focal_per" id="focal_per" class="text" style="width: 98%"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"><?php echo $text["SECT_LABEL_CFP"]; ?></td>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_TEL"]; ?> <input type="tel" name="focal_tel" id="focal_tel" class="text" style="width: 78%"></td>
                                        <td><?php echo $text["SECT_LABEL_FAX"]; ?> <input type="tel" name="focal_fax" id="focal_fax" class="text" style="width: 77%"></td>
                                    </tr>
                                    <tr>

                                        <td colspan="3"><?php echo $text["SECT_LABEL_EML"]; ?> <input type="email" name="focal_email" id="focal_email" class="text" style="width: 80%"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="5"><?php echo $text["SECT_LABEL_SOF"] ?></td>

                                        <td colspan=2><?php echo $text["SECT_LABEL_GOV"]; ?></td>
                                        <td><input type="checkbox" name="gov" value="Goverment"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_DVA"]; ?></td>
                                        <td><input type="checkbox" name="dev_agency" value="Dev Agency"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_NGO"] ?></td>
                                        <td><input type="checkbox" name="ngo" value="NGO"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_FAI"] ?></td>
                                        <td><input type="checkbox" name="faith" value="Faith based"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_OTH"] ?></td>
                                        <td><input type="checkbox" name="other" value="Other"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="5"><?php echo $text["SECT_LABEL_PHV"] ?></td>

                                        <td colspan=2><?php echo $figurebreakdowntypes['PVN']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="plan_hiv_prevention" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['TCS']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="plan_hiv_treatment" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['IMM']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="plan_hiv_mitigation" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['MGT']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="plan_hiv_management" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['MNE']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="plan_hiv_mne" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="5"><?php echo $text["SECT_LABEL_SHV"]; ?></td>

                                        <td colspan=2><?php echo $figurebreakdowntypes['PVN']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="actual_hiv_prevention" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['TCS']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="actual_hiv_treatment" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['IMM']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="actual_hiv_mitigation" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['MGT']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="actual_hiv_management" class="number" style="width: 80% !important"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo $figurebreakdowntypes['MNE']; ?></td>
                                        <td>TSH<input type="number" min="0" step="0.01" name="actual_hiv_mne" class="number" style="width: 80% !important"></td>
                                    </tr>

                                </table>
                                <!-- end .section  --></div>
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
