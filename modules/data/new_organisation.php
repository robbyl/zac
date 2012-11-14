<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | ADD ORGANISATION</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <style type="text/css">
            .text {
                width: auto;
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

                function setPerson() {
                    var select = "<select name='hiv_focal[]' class='select' style='width: 390px;'>";
                    select += "<option></option>";
                    $('.person-name').each(function() {
                        select += "<option>" + $(this).val().toUpperCase() + "</option>";
                    });

                    select += "</select>";

                    $('.org_persons').html(select);
                }

                $('a.remove-row').live("click", function() {

                    $(this).closest("tr").remove();
                    setPerson();
                });

                $('.person-name').live("blur", function() {
                    setPerson();
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
                <h1>Add New Organisation</h1>
                <div class="hr-line"></div>
                <form action="process_add_organisation.php" method="post">
                    <fieldset>
                        <legend>Organisation Details</legend>
                        <table width="" border="0" cellpadding="5">
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
                                            <option value="<?php echo $dis['DistrictAbb'] ?>"><?php echo $dis['District'] ?></option>
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
                                        <input type="text" name="abbr" id="abbr" disabled="" style="width: 40px; font-size: inherit; border: none; background: transparent; color: inherit;">
                                        <input type="number" name="org_code" required id="org_code" class="number" style="width: 350px; float:none">
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="100">Organisation  Name</td>
                                <td><input type="text" name="org_name" required class="text" style="width: 380px; text-transform: uppercase;"></td>
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
                                            <option value="<?php echo $cat['OrganisationCategoryID'] ?>"><?php echo $cat['OrganisationCategoryDescription'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="100">Physical Address</td>
                                <td><input type="text" name="phy_address" required class="text" style="width: 380px; text-transform: uppercase;"></td>
                            </tr>
                            <tr>
                                <td width="100">Postal Address</td>
                                <td><input type="text" name="post_address" class="text" style="width: 380px; text-transform: uppercase;"></td>
                            </tr>
                            <tr>
                                <td width="100">Phone</td>
                                <td><input type="tel" name="org_phone" class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">Fax</td>
                                <td><input type="text" name="org_fax" class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">E-mail</td>
                                <td><input type="email" name="org_email"  class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">ZHAPMoS Reporter</td>
                                <td><input type="text" name="ZHAPMoS_reporter" class="text" style="width: 380px; text-transform: uppercase;"></td>
                            </tr>
                            <tr>
                                <td width="100">Started Operating</td>
                                <td><input type="date" name="org_start_date" class="text" style="width: 380px;"></td>
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
                            <tr>
                                <td><a class="add-row tooltip" title="Add new row"></a></td>
                                <td><input type="text" name="person_name[]" id="person_name" class="text person-name" style="width: 90%; text-transform: uppercase;"></td>
                                <td><input type="text" name="designation[]" style="text-transform: uppercase;" class="text"></td>
                                <td><input type="tel" name="person_phone[]" class="text" style="width: 135px;"></td>
                                <td><input type="text" name="person_fax[]" class="text" style="width: 135px;"></td>
                                <td><input type="email" name="person_email[]" class="text" style="width: 150px;"></td>
                                <td><input type="checkbox" name="metthaz[]" value="" required></td>
                                <td><input type="checkbox" name="still[]" value="" required></td>
                            </tr>
                        </table>
                        <table width="" border="0" cellspacing="0" cellpadding="3" style="margin-top: 10px;">
                            <tr>
                                <td width="210">ZHAPMoS Focal Person</td>
                                <td class="org_persons">
                                    <select name="ZHAPMoS_person" class="select" style="width: 390px;" >
                                        <span ></span>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>HIV Focal Person</td>
                                <td class="org_persons">
                                    <select name="HIV_person" class="select" style="width: 390px;">
                                        <span class="org_persons"></span>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Umbrella Organisation(s)</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">User Name</td>
                                <td width="364"><input type="text" name="umbralla" required size="255" class="text"  style="width: 380px;" ></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit">Save</button>
                                    <button type="reset">Reset</button></td>
                            </tr>
                        </table>
                    </fieldset>
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
