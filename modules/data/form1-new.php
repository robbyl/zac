<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_GET['lang']);

if (!empty($lang) && isset($lang)) {
    switch ($lang) {
        case "en": // In case selected language is English, load English version form.

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

            break;

        case "sw": // In case selected language is Kiswahili, load Kiswahili version form.

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

            break;

        default:
            exit(0);
            break;
    }
}

mysql_close($conn);
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
                <form action="process_form1.php" method="post">
                    <div class="data-form-wapper">
                        <div class="form-header">
                            <div class="zanz-logo"></div>
                            <div class="zac-logo"></div>
                            <p class="form-heading">ZHAPMoS FORM FOR CIVIL SOCIETY AND PRIVATE SECTOR</p>
                            <div>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: none; margin-bottom: 0">
                                    <tr>
                                        <td width="6%">&nbsp;</td>
                                        <td width="6%">&nbsp;</td>
                                        <td width="65%">&nbsp;</td>
                                        <td width="9%"></td>
                                        <td width="14%"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">Form No:</td>
                                        <td align="right"><span style="font-size: 1.5em; font-weight: bold">F1-605004</span></td>
                                    </tr>
                                </table>

                            </div>
                            <!-- end .form-header --></div>
                        <div class="section">
                            <h3>A. INFORMATION ABOUT YOUR ORGANISATION</h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">
                                        <select class="select">
                                            <option></option>
                                        </select>
                                    </td>
                                    <td width="60" class="data-group">CD1</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="data-group">CD2</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="data-group">CD3</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="data-group">CD4</td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="2">&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td rowspan="2" class="data-group">CD5</td>
                                </tr>
                                <tr>

                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="data-group">CD6</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="data-group">CD7</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="data-group">CD8</td>
                                </tr>
                                <tr>
                                    <td rowspan="3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>males</td>
                                    <td>females</td>
                                    <td>total</td>
                                    <td rowspan="3" class="data-group">CD9</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="data-group">CD10</td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        <div class="section">
                            <h3>B. HIV PREVENTION SERVICES</h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th colspan="5">Number of persons reached</th>
                                    <td rowspan="9"  width="47" class="data-group">HP1</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th colspan="2">&nbsp;</th>
                                    <th colspan="2">&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="number" name="hp1_male_younger[]" min="0" class="number">
                                    </td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <h4>HIV PREVENTION AMONGST GENERAL POPULATION</h4>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td colspan="2" rowspan="3">Type of intervation</td>
                                    <th colspan="5">Number of persons reached</th>
                                    <td rowspan="9"  width="60" class="data-group">HP2</td>
                                </tr>
                                <tr>
                                    <th colspan="2">&nbsp;</th>
                                    <th colspan="2">&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                                    <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>


                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
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

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2">EDUCATORS</td>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][9] ?></th>
                                    <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][8] ?></th>
                                    <td rowspan="3"  width="60" class="data-group">HP4</td>
                                </tr>
                                <tr>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][10] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][9] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][11] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][7] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][6] ?></th>
                                    <th><?php echo $BreakdownTypeDescription3["HP4"][8] ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP4"][0]; ?></td>
                                    <td><input type="number" name="hp4_male_peer" min="0" class="number"></td>
                                    <td><input type="number" name="hp4_female_peer" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp4_male_community" min="0" class="number"></td>
                                    <td><input type="number" name="hp4_female_community" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2">EDUCATORS</td>
                                    <th colspan="3">&nbsp;</th>
                                    <th colspan="3">&nbsp;</th>
                                    <td rowspan="3"  width="60" class="data-group">HP5</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp5_male_peer" min="0" class="number"></td>
                                    <td><input type="number" name="hp5_female_peer" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="hp5_male_community" min="0" class="number"></td>
                                    <td><input type="number" name="hp5_female_community" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
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

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
                                    <th><?php echo $BreakdownTypeDescription1["HP7"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP7"][0] ?></th>
                                    <td rowspan="2"  width="60" class="data-group">HP7</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP7"][0] ?></td>
                                    <td><input type="number" name="hp7_male_condoms" min="0" class="number"></td>
                                    <td><input type="number" name="hp7_female_condoms" min="0" class="number"></td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
                                    <th><?php echo $BreakdownTypeDescription1["HP8"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP8"][0] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP8"][2] ?></th>
                                    <td rowspan="2"  width="60" class="data-group">HP8</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["HP8"][0] ?></td>
                                    <td><input type="number" name="hp8_pep_male" min="0" class="number"></td>
                                    <td><input type="number" name="hp8_pep_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>


                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
                                    <th><?php echo $BreakdownTypeDescription1["HP9"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP9"][0] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["HP9"][2] ?></th>
                                    <td rowspan="2"  width="60" class="data-group">HP9</td>
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
                            <h3>C. HIV IMPACT MITIGATION SERVICES</h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th colspan="3">&nbsp;</th>
                                    <th colspan="3">&nbsp;</th>
                                    <th rowspan="2">&nbsp;</th>
                                    <th rowspan="2">&nbsp;</th>
                                    <th rowspan="2">&nbsp;</th>
                                    <td rowspan="7"  width="60" class="data-group">M1</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
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
                                    <td>&nbsp;</td>
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
                                    <td>&nbsp;</td>
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
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_financial_chldn_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_chldn_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_financial_elderyl_male" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_elderyl_female" min="0" class="number"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="number" name="m1_financial_widows" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_vulnerable" min="0" class="number"></td>
                                    <td><input type="number" name="m1_financial_other" min="0" class="number"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
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
                            <h3>D. HIV & AIDS CARE AND SUPPORT SERVICES</h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td>RADIO AND TV</td>
                                    <th><?php echo $BreakdownTypeDescription1["CS1"][1] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["CS1"][0] ?></th>
                                    <th><?php echo $BreakdownTypeDescription1["CS1"][2] ?></th>
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
                                    <th>&nbsp;</th>
                                    <td rowspan="2" width="60" class="data-group">CS2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["CS2"][0] ?></td>
                                    <td><input type="number" name="cs2_person_visit" min="0" class="number"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3>E. TRAINING AND CAPACITY BUILDING FOR HIV</h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2">&nbsp;</td>
                                    <th colspan="3">&nbsp;</th>
                                    <th colspan="3">&nbsp;</th>
                                    <th colspan="3">&nbsp;</th>
                                    <td rowspan="12" width="60" class="data-group">TC1</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <td>1. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>2. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>3. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>4. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>5. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>6. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>7. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>8. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>9. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>10. <input type="text" name="tc1_topic[]" class="text"></td>
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
                                    <td>&nbsp;</td>
                                    <td rowspan="2" width="60" class="data-group">TC2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescription["TC2"][0] ?></td>
                                    <td><input type="number" name="tc2_community" min="0" class="number"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h3>F: MANAGEMENT AND COORDINATION OF HIV INTERVENTIONS</h3>
                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC1"][0] ?></td>
                                    <td><label for="mc1_yes"><input type="radio" name="mc1_mngmnt" id="mc1_yes" value="Yes" required> Yes</label></td>
                                    <td><label for="mc1_no"><input type="radio" name="mc1_mngmnt" id="mc1_no" value="No"> No</label></td>
                                    <td width="60" class="data-group">MC1</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">TSH<input type="number" step="0.01" name="mc2_tshs" min="0" class="number"></td>
                                    <td width="60" class="data-group">MC2</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC3"][0] ?></td>
                                    <td><label for="mc3_yes"><input type="radio" name="mc3_money" id="mc3_yes" value="Yes" required> Yes</label></td>
                                    <td><label for="mc3_no"><input type="radio" name="mc3_money" id="mc3_no" value="No" required> No</label></td>
                                    <td width="60" class="data-group">MC3</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">TSH<input type="number" step="0.01" name="mc4_tshs" min="0" class="number"></td>
                                    <td width="60" class="data-group">MC4</td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC5"][0] ?></td>
                                    <td><label for="mc5_yes"><input type="radio" name="mc5_activity" id="mc5_yes" value="Yes" required>Yes</label></td>
                                    <td><label for="mc5_no"><input type="radio" name="mc5_activity" id="mc5_no" value="No" required>No</label></td>
                                    <td width="60" class="data-group">MC5</td>
                                </tr>
                            </table>


                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <th></th>
                                    <td rowspan="9" width="60" class="data-group">MC6</td>
                                </tr>
                                <tr>
                                    <td rowspan="8"></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6a"][0] ?></td>
                                    <td><input type="checkbox" name="mc6_revention"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6b"][0] ?></td>
                                    <td><input type="checkbox" name="mc6_treatment"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6c"][0] ?></td>
                                    <td><input type="checkbox" name="mc6_mitigation"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6d"][0] ?></td>
                                    <td rowspan="5"><input type="checkbox" name="mc6_more"></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6e"][0] ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6f"][0] ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6g"][0] ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $ZhaFigureDescriptionqn["MC6h"][0] ?></td>
                                </tr>
                            </table>

                            <table width="100%" border="1" cellspacing="0">
                                <tr>
                                    <td rowspan="2"><?php echo $ZhaFigureDescriptionqn["ME1a"][0] ?></td>
                                    <td><label for="me1_yes"><input type="radio" name="me1_yes" id="me1_yes">Yes</label></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["ME1b"][0] ?>  <br><input type="date" name="me1_workshop_date" class="text"></td>
                                    <td rowspan="2" width="60" class="data-group">ME1</td>
                                </tr>
                                <tr>
                                    <td><label for="me1_no"><input type="radio" name="me1_yes" id="me1_no">No</label></td>
                                    <td><?php echo $ZhaFigureDescriptionqn["ME1c"][0] ?><br> <input type="text" name="mc1_reason" class="text"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-footer">
                            <table width="100%" border="0" cellspacing="0" style="border: none !important">
                                <tr>
                                    <td>Completed by</td>
                                    <td><select name="" class="select"><option></option></select></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Positon in organisation</td>
                                    <td>&nbsp;</td>
                                    <td>Date:</td>
                                    <td><input type="date" name="" class="text"></td>
                                </tr>
                                <tr>
                                    <td>Approved by:</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Position in organisation:</td>
                                    <td>&nbsp;</td>
                                    <td>Date:</td>
                                    <td><input type="date" name="" class="text"></td>
                                </tr>
                            </table>
                        </div>
                        <dv class="data-form-buttons">
                            <table border="0" cellpadding="0" cellspacing="0" style="border: none">
                                <tr><td></td><td><button type="submit">Save</button><button type="reset">Reset</button></td></tr>
                            </table>
                            <!-- .end data-form-buttons --></dv>
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>