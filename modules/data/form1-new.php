<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_GET['lang']);

if (!empty($lang) && isset($lang)) {
    switch ($lang) {
        case "en": // In case selected language is English, load English version form.

            include 'lang/en.php';

            $query_section = "SELECT `ZhaFigureCode`, `ZhaFigureDescriptionEnglish`,
                          typ1.`BreakdownTypeDescription` AS BreakdownTypeDescription1,
                          typ2.`BreakdownTypeDescription` AS BreakdownTypeDescription2,
                          typ3.`BreakdownTypeDescription` AS BreakdownTypeDescription3,
                          typ4.`BreakdownTypeDescription` AS BreakdownTypeDescription4
                     FROM tblzhasetupfigures fig
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ1
                       ON fig.`BreakdownCategoryID1` = typ1.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ2
                       ON fig.`BreakdownCategoryID2` = typ2.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ3
                       ON fig.`BreakdownCategoryID3` = typ3.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ4
                       ON fig.`BreakdownCategoryID4` = typ4.`BreakdownCategoryID`";

            $result_section = mysql_query($query_section) or die(mysql_error());

            while ($section = mysql_fetch_array($result_section)) {
                $ZhaFigureDescription[$section['ZhaFigureCode']][] = $section['ZhaFigureDescriptionEnglish'];
                $BreakdownTypeDescription1[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription1'];
                $BreakdownTypeDescription2[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription2'];
                $BreakdownTypeDescription3[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription3'];
                $BreakdownTypeDescription4[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription4'];
            }

            $query_setup_qns = "SELECT `ZhaQuestionCode`, `ZhaQuestionDescriptionEnglish`
                                  FROM tblzhasetupquestions";

            $result_setup_qns = mysql_query($query_setup_qns) or die(mysql_error());

            while ($sectionqn = mysql_fetch_array($result_setup_qns)) {
                $ZhaFigureDescriptionqn[$sectionqn['ZhaQuestionCode']][] = $sectionqn['ZhaQuestionDescriptionEnglish'];
            }

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'HVI'
                             ORDER BY `BreakdownTypeDescription` ASC";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            $query_risk = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdownrisk
                             FROM `tblzhasetupfigurebreakdowntypes`
                            WHERE `BreakdownCategoryID` = 'MRV'
                         ORDER BY `BreakdownTypeDescription` ASC";

            $result_risk = mysql_query($query_risk) or die(mysql_error());

            $query_training = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdowntraining
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'TRG'
                             ORDER BY `BreakdownTypeDescription` ASC";

            $result_training = mysql_query($query_training) or die(mysql_error());

            break;

        case "sw": // In case selected language is Kiswahili, load Kiswahili version form.

            include 'lang/sw.php';

            $query_section = "SELECT `ZhaFigureCode`, `ZhaFigureDescriptionSwahili`,
                          typ1.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription1,
                          typ2.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription2,
                          typ3.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription3,
                          typ4.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription4
                     FROM tblzhasetupfigures fig
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ1
                       ON fig.`BreakdownCategoryID1` = typ1.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ2
                       ON fig.`BreakdownCategoryID2` = typ2.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ3
                       ON fig.`BreakdownCategoryID3` = typ3.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ4
                       ON fig.`BreakdownCategoryID4` = typ4.`BreakdownCategoryID`";

            $result_section = mysql_query($query_section) or die(mysql_error());

            while ($section = mysql_fetch_array($result_section)) {
                $ZhaFigureDescription[$section['ZhaFigureCode']][] = $section['ZhaFigureDescriptionSwahili'];
                $BreakdownTypeDescription1[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription1'];
                $BreakdownTypeDescription2[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription2'];
                $BreakdownTypeDescription3[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription3'];
                $BreakdownTypeDescription4[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription4'];
            }

            $query_setup_qns = "SELECT `ZhaQuestionCode`, `ZhaQuestionDescriptionSwahili`
                                  FROM tblzhasetupquestions";

            $result_setup_qns = mysql_query($query_setup_qns) or die(mysql_error());

            while ($sectionqn = mysql_fetch_array($result_setup_qns)) {
                $ZhaFigureDescriptionqn[$sectionqn['ZhaQuestionCode']][] = $sectionqn['ZhaQuestionDescriptionSwahili'];
            }

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'HVI'
                             ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            $query_risk = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdownrisk
                             FROM `tblzhasetupfigurebreakdowntypes`
                            WHERE `BreakdownCategoryID` = 'MRV'
                         ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_risk = mysql_query($query_risk) or die(mysql_error());

            $query_training = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdowntraining
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'TRG'
                             ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_training = mysql_query($query_training) or die(mysql_error());

            break;

        default:
            exit(0);
            break;
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | FORM-1</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>

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
            });
        </script>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="users.php" class="users">Manage Users</a>
                        <ul>
                            <li><a href="#">Add new user</a></li>
                        </ul>
                    </li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Add New ZHAPMoS Form 1</h1>
                <div class="hr-line"></div>
                <form action="process_form1.php" method="post" novalidate>
                    <div class="data-form-wapper">
                        <div class="form-header">
                            <div class="zanz-logo"></div>
                            <div class="zac-logo"></div>
                            <p class="form-heading"><?php echo $text["FORM_1_HEAD"]; ?></p>
                            <div>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: none; margin-bottom: 0">
                                    <tr>
                                        <td width="6%">&nbsp;</td>
                                        <td width="6%">&nbsp;</td>
                                        <td width="63%">&nbsp;</td>
                                        <td width="10%"></td>
                                        <td width="15%"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">Form No:</td>
                                        <td align="right">
                                            <input type="text" value="F1-605004" name="form_no" required style="font-size: 1.5em; width: 120px; border: none">
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <!-- end .form-header --></div>
                        <div class="section">
                            <h3><strong>A. <?php echo $text["SECT_HEAD_A"]; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td colspan="2"><?php echo $text["SECT_LABEL_NOG"]; ?></td>
                                    <td colspan="3">
                                        <select class="select" name="org_name" required style="width: 100%;">
                                            <option value=""></option>
                                            <?php
                                            $query_org = "SELECT `OrganisationCode`, `OrganisationName` FROM tblgenorganisations ORDER BY `OrganisationName` ASC";
                                            $result_org = mysql_query($query_org) or die(mysql_error());
                                            while ($org = mysql_fetch_array($result_org)) {
                                                ?>
                                                <option value="<?php echo $org['OrganisationCode'] ?>"><?php echo $org['OrganisationName'] ?></option>
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
                                    <td colspan="3"><input type="text" name="reg_no" id="reg_no" class="text" style="width: 98%"></td>
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
                                    <td><input type="number" name="full_male" id="full_male" min="0" class="number"></td>
                                    <td><input type="number" name="full_female" id="full_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><?php echo $text["SECT_LABEL_PTM"]; ?></td>
                                    <td><input type="number" name="part_male" id="part_male" min="0" class="number"></td>
                                    <td><input type="number" name="part_female" id="part_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
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
                                    <td class="data-group">CD10</td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        <div class="section">
                            <h3><strong>B. <?php echo $text["SECT_HEAD_B"]; ?></strong></h3>
                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP1"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_HIV"] ?></th>
                                    <th rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_VGT"] ?></th>
                                    <th colspan="5"><?php echo $text["SECT_SUB_HEAD_HP_NPR"] ?></th>
                                    <td rowspan="9"  width="47" class="data-group">HP1</td>
                                </tr>
                                <tr>
                                    <th colspan="2"><?php echo $text["SECT_LABEL_Y25"] ?></th>
                                    <th colspan="2"><?php echo $text["SECT_LABEL_25O"] ?></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th width="110"><?php echo $text["SECT_LABEL_TOT"] ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="hp1_male_younger[]" min="0" class="number">
                                    </td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td align="center" class="total"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select></td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="hiv_type[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="most_risk[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                                                <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                                            <?php } mysql_data_seek($result_risk, 0) ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <p style="font-weight: bold;"><?php echo $text["SECT_SUB_HEAD_HP2"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th colspan="2" rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_HIV"] ?></th>
                                    <th colspan="5"><?php echo $text["SECT_SUB_HEAD_HP_NPR"] ?></th>
                                    <td rowspan="9"  width="60" class="data-group">HP2</td>
                                </tr>
                                <tr>
                                    <th colspan="2"><?php echo $text["SECT_LABEL_Y25"] ?></th>
                                    <th colspan="2"><?php echo $text["SECT_LABEL_25O"] ?></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th width="110"><?php echo $text["SECT_LABEL_TOT"] ?></th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="hiv_inter[]" class="select" style="width: 480px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="" class="select" style="width: 480px;">
                                            <option value="hiv_inter[]"></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="" class="select" style="width: 480px;">
                                            <option value="hiv_inter[]"></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="hiv_inter[]" class="select" style="width: 480px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="hiv_inter[]" class="select" style="width: 480px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select name="hiv_inter[]" class="select" style="width: 480px;">
                                            <option value=""></option>
                                            <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                                                <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP3"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th><?php echo $BreakdownTypeDescription1["HP3"][0] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP3"][1] ?></th>
                                    <td rowspan="2" width="60" class="data-group">HP3</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP3"][0]; ?></td>
                                    <td><input type="number" name="hp3_radio_hrs" min="0" class="number"></td>
                                    <td><input type="number" name="hp3_tv_hrs" min="0" class="number"></td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP4"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2"></td>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][9] ?></th>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][8] ?></th>
                                    <td rowspan="3"  width="60" class="data-group">HP4</td>
                                </tr>
                                <tr>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][10] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][9] ?></th>
                                    <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][11] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][7] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][6] ?></th>
                                    <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][8] ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP4"][6]; ?></td>
                                    <td><input type="number" name="hp4_male_peer" min="0" class="number"></td>
                                    <td><input type="number" name="hp4_female_peer" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp4_male_community" min="0" class="number"></td>
                                    <td><input type="number" name="hp4_female_community" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP5"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2">&nbsp;</td>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][3] ?></th>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][0] ?></th>
                                    <td rowspan="3"  width="60" class="data-group">HP5</td>
                                </tr>
                                <tr>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][4] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][3] ?></th>
                                    <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][5] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][0] ?></th>
                                    <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][2] ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP4"][0]; ?></td>
                                    <td><input type="number" name="hp5_male_peer" min="0" class="number"></td>
                                    <td><input type="number" name="hp5_female_peer" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp5_male_community" min="0" class="number"></td>
                                    <td><input type="number" name="hp5_female_community" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP6"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th><?php echo $BreakdownTypeDescription1["HP6"][0] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP6"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP6"][2] ?></th>
                                    <td rowspan="2"  width="60" class="data-group">HP6</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP6"][0] ?></td>
                                    <td><input type="number" name="hp6_booklets" min="0" class="number"></td>
                                    <td><input type="number" name="hp6_posters" min="0" class="number"></td>
                                    <td><input type="text" name="hp6_others"  class="text"></td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP7"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th><?php echo $BreakdownTypeDescription1["HP7"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP7"][0] ?></th>
                                    <td rowspan="2"  width="48" class="data-group">HP7</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP7"][0] ?></td>
                                    <td><input type="number" name="hp7_male_condoms" min="0" class="number"></td>
                                    <td><input type="number" name="hp7_female_condoms" min="0" class="number"></td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP8"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][1] ?></th>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][0] ?></th>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][2] ?></th>
                                    <td rowspan="2"  width="51" class="data-group">HP8</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP8"][0] ?></td>
                                    <td><input type="number" name="hp8_pep_male" min="0" class="number"></td>
                                    <td><input type="number" name="hp8_pep_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP9"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][1] ?></th>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][0] ?></th>
                                    <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][2] ?></th>
                                    <td rowspan="2"  width="51" class="data-group">HP9</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP9"][0] ?></td>
                                    <td><input type="number" name="hp9_wkpl_male" min="0" class="number"></td>
                                    <td><input type="number" name="hp9_wkpl_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3><strong>C. <?php echo $text["SECT_HEAD_C"]; ?></strong></h3>
                            <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_M1"] ?></p>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["M01"][3] ?></th>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["M01"][0] ?></th>
                                    <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][13] ?></th>
                                    <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][10] ?></th>
                                    <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][6] ?></th>
                                    <td rowspan="7"  width="60" class="data-group">M1</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th><?php echo $BreakdownTypeDescription3["M01"][19] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["M01"][18] ?></th>
                                    <th width="70"><?php echo $BreakdownTypeDescription3["M01"][20] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["M01"][1]; ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["M01"][0] ?></th>
                                    <th width="70"><?php echo $BreakdownTypeDescription3["M01"][2] ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $BreakdownTypeDescription1['M01'][30] ?></td>
                                    <td><input type="number" name="m1_health_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_health_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_health_elderly_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_health_elderly_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_health_widows" min="0" class="number"></td>
                                    <td><input type="number" name="m1_health_vulnerable" min="0" class="number"></td>
                                    <td><input type="number" name="m1_health_other" min="0" class="number"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $BreakdownTypeDescription1['M01'][0] ?></td>
                                    <td><input type="number" name="m1_emotional_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_emotional_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_emotional_elderly_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_emotional_elderly_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_emotional_widows" min="0" class="number"></td>
                                    <td><input type="number" name="m1_emotional_vulnerable" min="0" class="number"></td>
                                    <td><input type="number" name="m1_emotional_other" min="0" class="number"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $BreakdownTypeDescription1['M01'][45] ?></td>
                                    <td><input type="number" name="m1_nutrition_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_nutrition_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_nutrition_elderly_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_nutrition_elderly_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_nutrition_widows" min="0" class="number"></td>
                                    <td><input type="number" name="m1_nutrition_vulnerable" min="0" class="number"></td>
                                    <td><input type="number" name="m1_nutrition_other" min="0" class="number"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $BreakdownTypeDescription1['M01'][15] ?></td>
                                    <td><input type="number" name="m1_financial_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_financial_elderly_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_elderly_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_financial_widows" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_vulnerable" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_other" min="0" class="number"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $BreakdownTypeDescription1['M01'][60] ?></td>
                                    <td><input type="number" name="m1_school_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_school_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                    <td class="not-editable">&nbsp;</td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3><strong>D. <?php echo $text["SECT_HEAD_D"]; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td></td>
                                    <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][1] ?></th>
                                    <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][0] ?></th>
                                    <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][2] ?></th>
                                    <td rowspan="2"  width="60" class="data-group">CS1</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["CS1"][0]; ?></td>
                                    <td><input type="number" name="cs1_males" min="0" class="number"></td>
                                    <td><input type="number" name="cs1_females" min="0" class="number"></td>
                                    <td></td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>&nbsp;</td>
                                    <th width="200"><?php echo $text["SECT_SUB_HEAD_CS_PVI"] ?></th>
                                    <td rowspan="2" width="47" class="data-group">CS2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["CS2"][0] ?></td>
                                    <td><input type="number" name="cs2_person_visit" min="0" class="number"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3><strong> E. <?php echo $text["SECT_HEAD_E"]; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th rowspan="2"><?php echo $text["SECT_SUB_HEAD_TC_TTR"] ?></th>
                                    <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_VLN"] ?></th>
                                    <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_PSN"] ?></th>
                                    <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_EMN"] ?></th>
                                    <td rowspan="10" width="60" class="data-group">TC1</td>
                                </tr>
                                <tr>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
                                    <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
                                    <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="tc1_topic[]" class="select" style="width: 240px;">
                                            <option value=""></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="" class="select" style="width: 240px;">
                                            <option value="tc1_topic[]"></option>
                                            <?php while ($training = mysql_fetch_array($result_training)) { ?>
                                                <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                                            <?php } mysql_data_seek($result_training, 0); ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
                                    <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>&nbsp;</td>
                                    <th width="200"><?php echo $text["SECT_SUB_HEAD_TC_COL"] ?></th>
                                    <td rowspan="2" width="47" class="data-group">TC2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["TC2"][0] ?></td>
                                    <td><input type="number" name="tc2_community" min="0" class="number"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3><strong>F:  <?php echo $text["SECT_HEAD_F"]; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC1"][0] ?></td>
                                    <td width="200"><label for="mc1_yes" style="margin-right: 50px"><input type="radio" name="mc1_mngmnt" id="mc1_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc1_no"><input type="radio" name="mc1_mngmnt" id="mc1_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label>
                                    </td>
                                    <td width="47" class="data-group">MC1</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>TSH<input type="number" step="0.01" name="mc2_tshs" min="0" class="number" style="width: 80% !important"></td>
                                    <td width="47" class="data-group">MC2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC3"][0] ?></td>
                                    <td><label for="mc3_yes" style="margin-right: 50px"><input type="radio" name="mc3_money" id="mc3_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc3_no"><input type="radio" name="mc3_money" id="mc3_no" value="No" required> <?php echo $text["SECT_LABEL_NO"] ?></label>
                                    </td>
                                    <td width="47" class="data-group">MC3</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>TSH<input type="number" step="0.01" name="mc4_tshs" min="0" class="number" style="width: 80% !important"></td>
                                    <td width="47" class="data-group">MC4</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC5"][0] ?></td>
                                    <td><label for="mc5_yes" style="margin-right: 50px"><input type="radio" name="mc5_activity" id="mc5_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc5_no"><input type="radio" name="mc5_activity" id="mc5_no" value="No" required> <?php echo $text["SECT_LABEL_NO"] ?></label>
                                    </td>
                                    <td width="47" class="data-group">MC5</td>
                                </tr>
                            </table>


                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td width="300" rowspan="8"><?php echo $text["SECT_SUB_HEAD_MC_HIV"] ?></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6a"][0] ?></td>
                                    <td  width="200"><label for="mc6a_yes" style="margin-right: 50px"><input type="radio" name="mc6a" id="mc6a_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6a_no"><input type="radio" name="mc6a" id="mc6a_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                    <td rowspan="8" width="47" class="data-group">MC6</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6b"][0] ?></td>
                                    <td><label for="mc6b_yes"  style="margin-right: 50px"><input type="radio" name="mc6b" id="mc6b_yes" value="Yes" required > <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6b_no"><input type="radio" name="mc6b" id="mc6b_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6c"][0] ?></td>
                                    <td><label for="mc6c_yes" style="margin-right: 50px"><input type="radio" name="mc6c" id="mc6c_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6c_no"><input type="radio" name="mc6c" id="mc6c_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6d"][0] ?></td>
                                    <td><label for="mc6d_yes" style="margin-right: 50px"><input type="radio" name="mc6d" id="mc6d_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6d_no"><input type="radio" name="mc6d" id="mc6d_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6e"][0] ?></td>
                                    <td><label for="mc6e_yes" style="margin-right: 50px"><input type="radio" name="mc6e" id="mc6e_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6e_no"><input type="radio" name="mc6e" id="mc6e_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6f"][0] ?></td>
                                    <td><label for="mc6f_yes" style="margin-right: 50px"><input type="radio" name="mc6f" id="mc6f_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6f_no"><input type="radio" name="mc6f" id="mc6f_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6g"][0] ?></td>
                                    <td><label for="mc6g_yes" style="margin-right: 50px"><input type="radio" name="mc6g" id="mc6g_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6g_no"><input type="radio" name="mc6g" id="mc6g_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6h"][0] ?></td>
                                    <td><label for="mc6h_yes" style="margin-right: 50px"><input type="radio" name="mc6h" id="mc6h_yes" value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?></label>
                                        <label for="mc6h_no" style="margin-right: 50px"><input type="radio" name="mc6h" id="mc6h_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2"><?php echo $ZhaFigureDescriptionqn["ME1a"][0] ?></td>
                                    <td width="100"><label for="me1_yes"><input type="radio" name="me1_yes" id="me1_yes"> <?php echo $text["SECT_LABEL_YES"] ?></label></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["ME1b"][0] ?>  <br><input type="date" name="me1_workshop_date" class="text"></td>
                                    <td rowspan="2" width="60" class="data-group">ME1</td>
                                </tr>
                                <tr>
                                    <td><label for="me1_no"><input type="radio" name="me1_yes" id="me1_no"> <?php echo $text["SECT_LABEL_NO"] ?></label></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["ME1c"][0] ?><br> <input type="text" name="mc1_reason" class="text" style="width: 90%"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-footer">
                            <table border="0" cellspacing="0" style="border: none !important" width="100%">
                                <tr>
                                    <td width="18%"><?php echo $text["FORM_FOOTER_COMP_BY"] ?></td>
                                    <td width="28%">
                                        <select class="select" name="completed_by" required style="width: 90%;">
                                            <option value=""></option>
                                            <span class="org_person"></span>
                                        </select>
                                    </td>
                                    <td width="18%"><?php echo $text["FORM_FOOTER_DATE_COMP"] ?></td>
                                    <td width="36%"><input type="date" name="completed_date" class="text" style="width: 67%"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $text["FORM_FOOTER_POS"] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><?php echo $text["FORM_FOOTER_APR_BY"] ?></td>
                                    <td><select class="select" name="approved_by" required style="width: 90%;">
                                            <option value=""></option>
                                            <span class="org_person"></span>
                                        </select></td>
                                    <td><?php echo $text["FORM_FOOTER_DATE_APR"] ?></td>
                                    <td><input type="date" name="approved_date" class="text" style="width: 67%"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $text["FORM_FOOTER_POS"] ?></td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="0" style="border: none !important" width="100%">
                                <tr>
                                    <td width="18%">Date Received:</td>
                                    <td width="28%">
                                        <input type="date" name="received_date" class="text" style="width: 86%;">
                                    </td>
                                    <td width="18%">Date Verified:</td>
                                    <td width="36%"><input type="date" name="verified_date" class="text" style="width: 67%"></td>
                                </tr>
                                <tr>
                                    <td>Date Captured:</td>
                                    <td><input type="date" name="captured_date" class="text" style="width: 86%;"></td>
                                    <td>Verified by:</td>
                                    <td>
                                        <select class="select" name="verified_by" required style="width: 70%;">
                                            <option value=""></option>
                                            <?php
                                            $query_user = "SELECT `UserID`, `FullName` FROM tblgenusers ORDER BY `FullName` ASC";
                                            $result_user = mysql_query($query_user) or die(mysql_error());
                                            while ($user = mysql_fetch_array($result_user)) {
                                                ?>
                                                <option value="<?php echo $user['UserID'] ?>"><?php echo $user['FullName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Captured By:</td>
                                    <td><select class="select" name="captured_by" required style="width: 90%;">
                                            <option value=""></option>
                                            <?php
                                            $query_user = "SELECT `UserID`, `FullName` FROM tblgenusers ORDER BY `FullName` ASC";
                                            $result_user = mysql_query($query_user) or die(mysql_error());
                                            while ($user = mysql_fetch_array($result_user)) {
                                                ?>
                                                <option value="<?php echo $user['UserID'] ?>"><?php echo $user['FullName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></td>
                                    <td>Date Filed:</td>
                                    <td><input type="date" name="filed_date" value="<?php echo date('Y-m-d') ?>" class="text" style="width: 67%"></td>
                                </tr>
                                <tr>
                                <td>Additional comments</td><td><textarea name="comments" cols="31"></textarea></td>
                                <td>Aditional comments by zac</td><td><textarea name="comments_zac" cols="31"></textarea></td>
                                </tr>
                            </table>
                            <?php mysql_close($conn); ?>
                        </div>
                        <dv class="data-form-buttons">
                            <button type="submit">Save</button><button type="reset">Reset</button>
                            <!-- .end data-form-buttons --></dv>
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>