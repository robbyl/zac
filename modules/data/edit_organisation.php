<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | EDIT ORGANISATION</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/chosen.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>
        <script src="../../js/chosen.jquery.js" type="text/javascript"></script>

        <style type="text/css">
            .text {
                width: auto;
            }
            td {
                vertical-align: top;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('#headquarters').change(function() {

                    var districtAbbr = $(this).val();
                    $('#abbr').val(districtAbbr);
                    getOrgCode('outocomplete/reg_no.php', districtAbbr);
                });

                $('#abbr, #org_code').change(function() {
                    getPersonId();
                });

                $('a.add-row').live("click", function() {

                    var row = $(this).closest("tr").clone();
                    row.find('input').val('');
                    row.find('a').attr('title', 'Add new row');
                    $('a.add-row').removeClass().addClass('remove-row').removeAttr('title').attr('title', 'Remove this row');
                    $('.personal-details').append(row);
                });

                $('a.remove-row').live("click", function() {

                    $(this).closest("tr").remove();
                });

                function setPesons() {
                    var orgCode = pad($('#org_code').val(), 3);
                    var code = '001';
                    var select = "<select name='hiv_focal[]' class='select' style='width: 390px;'>";
                    var personCode = "";
                    select += "<option></option>";

                    $('.person-name').each(function() {

                        code = pad(code, 3);
                        select += "<option value='" + orgCode + code + "'>" + $(this).val().toUpperCase() + "</option>";
                        personCode += '<input type="text" value="' + orgCode + code + '" name=person_code[]>';
                        code++;
                    });

                    select += "</select>";

                    $('.org_persons').html(select);
                    $('#personIds').html(personCode);
                    $('#focalPersonSelect select').val($('#focalPerson').val()).attr('selected', 'selected');
                    $('#HIVPersonSelect select').val($('#HIVPerson').val()).attr('selected', 'selected');
                }

                $('.person-name').live("blur", function() {
                    setPesons();
                });

                setPesons();

                $(".chzn-select").chosen();
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
                <h1>Edit Organisation</h1>
                <div class="hr-line"></div>
                <?php
                $org_id = clean($_GET['org_id']);

                if (isset($org_id) && !empty($org_id)) {

                    $query_org = "SELECT `OrganisationCode`, `OrganisationCategoryID`, `OrganisationName`,
                                         `PhysicalAddress`, `PostalAddress`, `Phone`, `Email`, `Fax`,
                                         DATE(`StartedOperating`) AS StartedOperating, 
                                         `ZHAPMoSFocalPersonID`, `HIVFocalPersonID`
                                    FROM tblgenorganisations org
                                   WHERE OrganisationCode = '$org_id'
                                   LIMIT 1";

                    $result_org = mysql_query($query_org) or die(mysql_error());

                    $organisation = mysql_fetch_array($result_org);

                    $district = substr($organisation['OrganisationCode'], 0, 3);

                    $query_umbrella = "SELECT `OrganisationCode`, `UmbrellaOrganisationCode`
                                         FROM tblgenorganisationsumbrella
                                        WHERE `OrganisationCode` = '$org_id'";

                    $result_umbrella = mysql_query($query_umbrella) or die(mysql_error());

                    while ($row_umbrella = mysql_fetch_array($result_umbrella)) {
                        $umbrella[] = $row_umbrella['UmbrellaOrganisationCode'];
                    }

                    $query_org_person = "SELECT `OrganisationPersonID`, `OrganisationCode`, `FullName`,
                                                `Designation`, `Phone`, `Fax`, `Email`, `METTHAZ`, `StillAtOrganisation`
                                           FROM `tblgenorganisationpeople`
                                          WHERE `OrganisationCode` = '$org_id'";

                    $result_org_person = mysql_query($query_org_person) or die(mysql_error());
                    ?>
                    <form action="process_edit_organisaton.php" method="post">
                        <fieldset>
                            <legend>Organisation Details</legend>
                            <table width="" border="0" cellpadding="5">
                                <span id="personIds"></span>
                                <input type="text" id="focalPerson" value="<?php echo $organisation['ZHAPMoSFocalPersonID'] ?>">
                                <input type="text" id="HIVPerson" value="<?php echo $organisation['HIVFocalPersonID'] ?>">
                                <tr>
                                    <td width="200">Headquarters District</td>
                                    <td>
                                        <select name="headquarters" id="headquarters" class="select" style="width: 390px;">
                                            <option value=""></option>
                                            <?php
                                            $query_dis = "SELECT `DistrictAbb`, `District`
                                                            FROM  tblgensetupdistricts
                                                        ORDER BY `District` ASC";
                                            $result_dis = mysql_query($query_dis) or die(mysql_error());
                                            while ($dis = mysql_fetch_array($result_dis)) {
                                                ?>
                                                <option value="<?php echo $dis['DistrictAbb'] ?>" <?php if ($district === $dis['DistrictAbb']) echo 'selected' ?>><?php echo $dis['District'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Organisation Code</td>
                                    <td>
                                        <p style=" margin: 0; padding: 0">
                                            <input type="text" name="org_code" required id="org_code" class="text" value="<?php echo $org_id ?>" disabled="" style="width: 350px; float:none">
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Organisation  Name</td>
                                    <td><input type="text" name="org_name" value="<?php echo $organisation['OrganisationName'] ?>" required class="text" style="width: 380px; text-transform: uppercase;"></td>
                                </tr>
                                <tr>
                                    <td width="100">Category</td>
                                    <td>
                                        <select name="org_cat" class="select" required="" style="width: 390px;">
                                            <option></option> 
                                            <?php
                                            $query_cat = "SELECT `OrganisationCategoryID`, `OrganisationCategoryDescription`
                                                            FROM tblgensetuporganisationcategories
                                                        ORDER BY `OrganisationCategoryDescription` ASC";
                                            $result_cat = mysql_query($query_cat) or die(mysql_error());
                                            while ($cat = mysql_fetch_array($result_cat)) {
                                                ?>
                                                <option value="<?php echo $cat['OrganisationCategoryID'] ?>" <?php if ($organisation['OrganisationCategoryID'] === $cat['OrganisationCategoryID']) echo 'selected' ?>><?php echo $cat['OrganisationCategoryDescription'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100">Physical Address</td>
                                    <td><input type="text" name="phy_address" value="<?php echo $organisation['PhysicalAddress'] ?>" required class="text" style="width: 380px; text-transform: uppercase;"></td>
                                </tr>
                                <tr>
                                    <td width="100">Postal Address</td>
                                    <td><input type="text" name="post_address" value="<?php echo $organisation['PostalAddress'] ?>" class="text" style="width: 380px; text-transform: uppercase;"></td>
                                </tr>
                                <tr>
                                    <td width="100">Phone</td>
                                    <td><input type="tel" name="org_phone" value="<?php echo $organisation['Phone'] ?>" class="text" style="width: 380px;"></td>
                                </tr>
                                <tr>
                                    <td width="100">Fax</td>
                                    <td><input type="text" name="org_fax" value="<?php echo $organisation['Fax'] ?>" class="text" style="width: 380px;"></td>
                                </tr>
                                <tr>
                                    <td width="100">E-mail</td>
                                    <td><input type="email" name="org_email" value="<?php echo $organisation['Email'] ?>" class="text" style="width: 380px;"></td>
                                </tr>
                                <tr>
                                    <td width="100">ZHAPMoS Reporter</td>
                                    <td><input type="text" name="ZHAPMoS_reporter" class="text" style="width: 380px; text-transform: uppercase;"></td>
                                </tr>
                                <tr>
                                    <td width="100">Started Operating</td>
                                    <td><input type="date" name="org_start_date" value="<?php echo $organisation['StartedOperating'] ?>" class="text" style="width: 380px;"></td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Contact People at this Organisation</legend>
                            <table width="98%" border="0" cellspacing="0" cellpadding="3"  class="personal-details">
                                <tr>
                                    <td></td>
                                    <td>Full Name</td>
                                    <td>Designation</td>
                                    <td>Phone</td>
                                    <td>Fax</td>
                                    <td>E-mail</td>
                                    <td>METTHAZ</td>
                                    <td>Is still</td>
                                </tr>
                                <?php while ($person = mysql_fetch_array($result_org_person)) {
                                    ?>
                                    <tr>
                                        <td><a class="add-row tooltip" title="Add new row"></a></td>
                                        <td><input type="text" name="person_name" value="<?php echo $person['FullName'] ?>" id="person_name" class="text person-name" style="width: 90%; text-transform: uppercase;"></td>
                                        <td><input type="text" name="designation[]" value="<?php echo $person['Designation'] ?>" style="text-transform: uppercase;" class="text"></td>
                                        <td><input type="tel" name="person_phone[]" value="<?php echo $person['Phone'] ?>" class="text" style="width: 135px;"></td>
                                        <td><input type="text" name="person_fax[]" value="<?php echo $person['Fax'] ?>" class="text" style="width: 135px;"></td>
                                        <td><input type="email" name="person_email[]" value="<?php echo $person['Email'] ?>" class="text" style="width: 150px;"></td>
                                        <td><input type="checkbox" name="metthaz[]" value="" required></td>
                                        <td><input type="checkbox" name="still[]" value="" required></td>
                                    </tr>
                                <?php }
                                ?>

                            </table>
                            <table width="" border="0" cellspacing="0" cellpadding="3" style="margin-top: 10px;">
                                <tr>
                                    <td width="210">ZHAPMoS Focal Person</td>
                                    <td class="org_persons" id="focalPersonSelect">
                                        <select name="ZHAPMoS_person" class="select" style="width: 390px;" >

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HIV Focal Person</td>
                                    <td class="org_persons" id="HIVPersonSelect">
                                        <select name="HIV_person" class="select" style="width: 390px;">

                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Umbrella Organisation(s)</legend>
                            <table width="" border="0" cellpadding="5">
                                <tr>
                                    <td width="200">Umbrella Organisation(s)</td>
                                    <td width="364">
                                        <select class="select chzn-select" data-placeholder="select organisation" name="umbrella[]" id="org_name" multiple  required style="width: 390px;">
                                            <option value=""></option>
                                            <?php
                                            $query_orgns = "SELECT `OrganisationCode`, `OrganisationName`
                                                              FROM tblgenorganisations org
                                                          ORDER BY `OrganisationName` ASC";
                                            $result_orgns = mysql_query($query_orgns) or die(mysql_error());
                                            while ($org = mysql_fetch_array($result_orgns)) {
                                                ?>
                                                <option value="<?php echo $org['OrganisationCode'] ?>"
                                                <?php
                                                if (in_array($org['OrganisationCode'], $umbrella))
                                                    echo 'selected';
                                                ?>>
                                                    <?php echo $org['OrganisationName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><button type="submit">Save</button>
                                        <button type="reset">Reset</button></td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                <?php } ?>
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
