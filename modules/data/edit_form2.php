<?php require '../../includes/session_validator.php'; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | FORM-2</title>
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

                <h1>Add New ZHAPMoS Form 2</h1>
                <div class="hr-line"></div>
                <?php
                require '../../config/config.php';
                require '../../functions/general_functions.php';

//                $form_id = clean($_GET['form_id']);
//                $lang = clean($_GET['lang']);
                $lang = 'sw';
                $form_id = 'F2-121051';

                if (isset($form_id) && !empty($form_id) && isset($lang) && !empty($lang)) {

                    $form_serial_no = $form_id;

                    require 'sections/lang_section.php';

                    $query_ans = "SELECT `FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`, `ZhaFigureValue`
                                    FROM tblzhafigures
                                   WHERE `FormSerialNumber` = '$form_id'";

                    $result_ans = mysql_query($query_ans) or die(mysql_error());

                    while ($ans = mysql_fetch_array($result_ans)) {

                        $fig_ans[$ans['ZhaFigureCode']][$ans['BreakdownTypeID1']] = $ans['ZhaFigureValue'];
                    }

                    $query_submitted = "SELECT `FormSerialNumber`, `OrganisationCode`, `DistrictCode`, `PeriodFrom`,
                                               `PeriodTo`, `CompletedByPersonID`, DATE(`DateCompleted`) AS DateCompleted, `ApprovedByPersonID`,
                                               DATE(`DateApproved`) AS DateApproved, DATE(`DateReceived`) AS DateReceived, 
                                               DATE(`DateCaptured`) AS DateCaptured, `CapturedByUserID`,
                                               DATE(`DateVerified`) AS DateVerified, `VerifiedByUserID`, `NotesWrittenOnForm`, 
                                               DATE(`DataEntryNotes`) AS DataEntryNotes
                                          FROM tblzhaformssubmitted
                                         WHERE FormSerialNumber = '$form_id'";
                    
                    $result_submitted = mysql_query($query_submitted) or die(mysql_error());
                    $submitted = mysql_fetch_array($result_submitted);

                    ?>
                    <form action="process_edit_form2.php" method="post" novalidate>
                        <input type="hidden" name="lang" value="<?php echo $lang ?>">
                        <div class="data-form-wapper">
                            <?php $heading = $text["FORM_2_HEAD"]; ?>
                            <?php require 'sections/edit_head_section.php'; ?>
                            <div class="section">
                                <h3><strong>A. <?php echo $text["SECT_HEAD_A2"]; ?></strong></h3>
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                    <tr>
                                        <td width="272"><?php echo $text["SECT_LABEL_NOS"] ?></td>
                                        <td colspan="3">
                                            <select class="select" name="sch_name" required style="width: 100%;">
                                                <option value=""></option>
                                                <?php
                                                $query_org = "SELECT `OrganisationCode`, `OrganisationName`, `ZhaFormNumber`
                                                            FROM tblgenorganisations org
                                                       LEFT JOIN tblzhasetuplinkorgcatformtypes cat
                                                              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                                           WHERE `ZhaFormNumber` = '2'
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
                                        <td width="43" class="data-group">A1</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_PHS"]; ?></td>
                                        <td colspan="3"><input type="text" name="phy_addr" id="phy_addr" class="text" style="width: 98%"></td>
                                        <td class="data-group">A2</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_SPO"]; ?></td>
                                        <td colspan="3"><input type="text" name="post_addr" id="post_addr" class="text" style="width: 98%"></td>
                                        <td class="data-group">A3</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_SDC"]; ?></td>
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
                                        <td class="data-group">A4</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_FOP"]; ?></td>
                                        <td colspan="3"><input type="text" name="focal_per" id="focal_per" class="text" style="width: 98%"></td>
                                        <td class="data-group">A5</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"><?php echo $text["SECT_LABEL_CFP"]; ?></td>
                                        <td colspan="2"><?php echo $text["SECT_LABEL_TEL"]; ?> <input type="tel" name="focal_tel" id="focal_tel" class="text" style="width: 78%"></td>
                                        <td width="206"><?php echo $text["SECT_LABEL_FAX"]; ?> <input type="tel" name="focal_fax" id="focal_fax" class="text" style="width: 77%"></td>
                                        <td class="data-group">A6</td>
                                    </tr>
                                    <tr>

                                        <td colspan="3"><?php echo $text["SECT_LABEL_EML"]; ?> <input type="email" name="focal_email" id="focal_email" class="text" style="width: 80%"></td>
                                        <td  class="data-group">A7</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_STY"]; ?></td>
                                        <td colspan="3">
                                            <label><input type="radio" name="school_type" value="Primary" id="primary_school"> <?php echo $text["SECT_LABEL_PRM"] ?></label> &nbsp;
                                            <label><input type="radio" name="school_type" value="Secondary" id="secondary_school"> <?php echo $text["SECT_LABEL_SCO"] ?></label>
                                        </td>
                                        <td class="data-group">A8</td>
                                    </tr>

                                    <tr>
                                        <td width="272" rowspan="2"><?php echo $text["SECT_LABEL_SNO"]; ?></td>
                                        <td align="center" width="152"><?php echo $text["SECT_LABEL_MAL"]; ?></td>
                                        <td align="center" width="160"><?php echo $text["SECT_LABEL_FEM"]; ?></td>
                                        <td align="center"><?php echo $text["SECT_LABEL_TOT"]; ?></td>
                                        <td rowspan="2" class="data-group">A9</td>
                                    </tr>
                                    <tr>

                                        <td><input type="number" name="std_male" id="std_male" min="0" class="number"></td>
                                        <td><input type="number" name="std_female" id="std_female" min="0" class="number"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $text["SECT_LABEL_SOW"]; ?></td>
                                        <td colspan="3">
                                            <label><input type="radio" name="school_owner" value="Government" id="primary_school"> <?php echo $text["SECT_LABEL_GOV"] ?></label> &nbsp;
                                            <label><input type="radio" name="school_owner" value="Private" id="secondary_school"> <?php echo $text["SECT_LABEL_PRI"] ?></label>
                                        </td>
                                        <td class="data-group">A10</td>
                                    </tr>
                                </table>
                                <!-- end .section  --></div>
                            <div class="section">
                                <h3><strong>B. <?php echo $text["SECT_HEAD_B1"] ?></strong></h3>
                                <table width="100%" border="1" cellspacing="0">
                                    <tr>
                                        <td></td>
                                        <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][1] ?></th>
                                        <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][0] ?></th>
                                        <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][2] ?></th> 
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B01"][0]; ?></td>
                                        <td><input type="number" name="b1_males" min="0" value="<?php if (!empty($fig_ans['B01']['MAL'])) echo $fig_ans['B01']['MAL']; ?>" class="number"></td>
                                        <td><input type="number" name="b1_females" min="0" value="<?php if (!empty($fig_ans['B01']['FEM'])) echo $fig_ans['B01']['FEM']; ?>" class="number"></td>
                                        <td></td>
                                        <td width="60" class="data-group">B1</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B02"][0]; ?></td>
                                        <td><input type="number" name="b2_males" min="0" value="<?php if (!empty($fig_ans['B02']['MAL'])) echo $fig_ans['B02']['MAL']; ?>" class="number"></td>
                                        <td><input type="number" name="b2_females" min="0" value="<?php if (!empty($fig_ans['B02']['FEM'])) echo $fig_ans['B02']['FEM']; ?>" class="number"></td>
                                        <td></td>
                                        <td width="60" class="data-group">B2</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B03"][0]; ?></td>
                                        <td><input type="number" name="b3_males" min="0" value="<?php if (!empty($fig_ans['B03']['MAL'])) echo $fig_ans['B03']['MAL']; ?>" class="number"></td>
                                        <td><input type="number" name="b3_females" min="0" value="<?php if (!empty($fig_ans['B03']['FEM'])) echo $fig_ans['B03']['FEM']; ?>" class="number"></td>
                                        <td></td>
                                        <td width="60" class="data-group">B3</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B04"][0]; ?></td>
                                        <td><input type="number" name="b4_males" min="0" value="<?php if (!empty($fig_ans['B04']['MAL'])) echo $fig_ans['B04']['MAL']; ?>" class="number"></td>
                                        <td><input type="number" name="b4_females" min="0" value="<?php if (!empty($fig_ans['B04']['FEM'])) echo $fig_ans['B04']['FEM']; ?>" class="number"></td>
                                        <td></td>
                                        <td width="60" class="data-group">B4</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B05"][0]; ?></td>
                                        <td><input type="number" name="b5_males" min="0" value="<?php if (!empty($fig_ans['B05']['MAL'])) echo $fig_ans['B05']['MAL']; ?>" class="number"></td>
                                        <td><input type="number" name="b5_females" min="0" value="<?php if (!empty($fig_ans['B05']['FEM'])) echo $fig_ans['B05']['FEM']; ?>" class="number"></td>
                                        <td></td>
                                        <td width="60" class="data-group">B5</td>
                                    </tr>
                                </table>

                                <table width="100%" border="1" cellspacing="0">
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B06"][0] ?></td>
                                        <td width="310"><input type="number" name="b6_hiv_related" min="0" value="<?php if (!empty($fig_ans['B01']['FEM'])) echo $fig_ans['B06']['']; ?>" class="number"></td>
                                        <td width="60" class="data-group">B6</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $ZhaFigureDescription["B07"][0] ?></td>
                                        <td width="310"><input type="number" name="b7_youth_club" min="0" value="<?php if (!empty($fig_ans['B01']['FEM'])) echo $fig_ans['B07']['']; ?>" class="number"></td>
                                        <td width="60" class="data-group">B7</td>
                                    </tr>
                                </table>
                            </div>
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
</html>
