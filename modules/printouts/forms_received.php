<?php require '../../includes/session_validator.php'; ?>
<?php

error_reporting(0);
require '../../config/config.php';
require '../../functions/general_functions.php';

$query_received = "SELECT `FormSerialNumber`, sub.`OrganisationCode`, `OrganisationName`, dis.`District`, `OrganisationCategoryDescription`,
                          DATE(`DateCompleted`) AS DateCompleted, DATE(`DateApproved`) AS DateApproved, 
                          DATE(`DateReceived`) AS DateReceived, DATE(`DateCaptured`) AS DateCaptured,
                          DATE(`PeriodFrom`) AS PeriodFrom, DATE(`PeriodTo`) AS PeriodTo
                     FROM tblzhaformssubmitted sub
                  INNER JOIN tblgenorganisations org
                       ON sub.`OrganisationCode` = org.`OrganisationCode`
                LEFT JOIN tblgensetupdistricts dis
                       ON sub.`DistrictCode` = dis.`DistrictCode`
                LEFT JOIN tblgensetuporganisationcategories cat
                       ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                 GROUP BY `OrganisationCategoryDescription`, FormSerialNumber
                 ORDER BY `FormSerialNumber` ASC, `PeriodFrom` ASC";

$result = mysql_query($query_received) or die(mysql_error());

while ($row = mysql_fetch_assoc($result)) {

    $forms[$row['OrganisationCategoryDescription']][] = $row['FormSerialNumber'];
    $PeriodFrom[$row['PeriodFrom']][] = $row;
}
echo '<table border="1">';
foreach ($forms as $OrganisationCategoryDescription => $value) {
    echo '<tr><td>' . $OrganisationCategoryDescription . '</td></tr>';


    foreach ($PeriodFrom as $key => $value) {
        echo '<tr><td>' . $key . '</td><tr>';
        echo '<tr>';
        for($i = 0; $i < count($PeriodFrom); $i++){
            
            foreach (array_unique($PeriodFrom[$key]) as $formvalues) {
                echo '<td>' . $formvalues . '</td>';
            }
            
            echo '</tr>';
        }
    }
//    for ($i = 0; $i < count($PeriodFrom[$OrganisationCategoryDescription]); $i++) {
//        echo $PeriodFrom[$OrganisationCategoryDescription][$i] . '<br>';
//    }
//    for($i = 0; $i < count($forms[$OrganisationCategoryDescription]); $i++ ){
//        echo $forms[$OrganisationCategoryDescription][$i] . '<br>';
//    }
//    echo count($forms[$OrganisationCategoryDescription]) . '<br>';
}

echo '</table>';

//$organisation = "";
//$date_from = "";
//echo "<table>";
//while ($row = mysql_fetch_array($result)) {
//
//    if ($row['OrganisationCategoryDescription'] != $organisation) {
//        echo '<tr><td>' . $row['OrganisationCategoryDescription'] . '</td></tr>';
//        $organisation = $row['OrganisationCategoryDescription'];
//    }
//}
//
//echo "</table>";

exit;
//$groups = array();
//$PeriodFrom = array();
//
//while ($data = mysql_fetch_assoc($result)) {
//    $groups[$data['OrganisationCategoryDescription']][] = $data;
//    $priod[$data['PeriodFrom']] = $data['PeriodFrom'];
//    $received[$data['FormSerialNumber']][$data['OrganisationCategoryDescription']][$data['PeriodFrom']] = $data['FormSerialNumber'];
//}
//
//
//$total = 0;
//echo '<table border="1">';
//foreach ($groups as $OrganisationCategoryDescription => $forms) {
//    echo '<tr><th>' . $OrganisationCategoryDescription . '</th></tr>';
//    foreach ($received as $key => $value) {
//        foreach ($priod as $periodkey => $periodvalue) {
//
//            echo '<tr><td>' . $periodkey . '</td><tr>';
//
//            if (!empty($received[$key][$OrganisationCategoryDescription])) {
//                echo '<tr><td>' . $received[$key][$OrganisationCategoryDescription][$periodkey] . '</td></tr>';
//                $total++;
//            }
//        }
//    }
//}

echo '</table>';

echo 'Total forms ' . $total;

exit;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | FORM-1</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
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
            });
        </script>
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
                                        <td width="61%">&nbsp;</td>
                                        <td width="10%"></td>
                                        <td width="17%"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <p>
                                                <select name="" class="select">
                                                    <option></option>
                                                </select>
                                                <select name="" class="select">
                                                    <option></option>
                                                </select>
                                            </p>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td align="right">Form No:</td>
                                        <td align="right">
                                            <input type="text" value="<?php echo $form_serial_no ?>" name="form_no" required class="text" style="font-size: 1.5em; width: 150px; text-align: right">
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
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">

        $('.printouts').attr("id", "current");
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
