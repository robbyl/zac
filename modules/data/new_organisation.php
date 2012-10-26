<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | ADD USER</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
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
                <h1>Add New Organisation</h1>
                <div class="hr-line"></div>
                <form action="process_add_organisaton.php" method="post">
                    <fieldset>
                        <legend>Organisation Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">Headquarters District</td>
                                <td>
                                    <select name="headquarters" class="select" style="width: 390px;">
                                        <option value=""></option>
                                        <?php
                                        $query_dis = "SELECT `DistrictCode`, `District`
                                                            FROM  tblgensetupdistricts
                                                        ORDER BY `District` ASC";
                                        $result_dis = mysql_query($query_dis) or die(mysql_error());
                                        while ($dis = mysql_fetch_array($result_dis)) {
                                            ?>
                                            <option value="<?php echo $dis['DistrictCode'] ?>"><?php echo $dis['District'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td width="100">Organisation Code</td>
                                <td><input type="text" name="org_code" required size="255" class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">Organisation  Name</td>
                                <td><input type="text" name="org_name" required size="255" class="text" style="width: 380px;"></td>
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
                                <td><input type="text" name="phy_address" required class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">Postal Address</td>
                                <td><input type="text" name="post_address" class="text" style="width: 380px;"></td>
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
                                <td><input type="text" name="ZHAPMoS_reporter" class="text" style="width: 380px;"></td>
                            </tr>
                            <tr>
                                <td width="100">Started Operating</td>
                                <td><input type="date" name="org_start_date" class="text" style="width: 380px;"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Contact People at this Organisation</legend>
                        <table width="98%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td>Person code</td>
                                <td>Full Name</td>
                                <td>Designation</td>
                                <td>Phone</td>
                                <td>Fax</td>
                                <td>E-mail</td>
                                <td>METTHAZ</td>
                                <td>Is still</td>
                            </tr>
                            <tr>
                                <td><input type="number" name="person_code[]" class="number" min="0"></td>
                                <td><input type="text" name="person_name" class="text" style="width: 90%"></td>
                                <td><input type="text" name="designation[]" class="text"></td>
                                <td><input type="tel" name="person_phone[]" class="text"></td>
                                <td><input type="text" name="person_fax[]" class="text"></td>
                                <td><input type="email" name="person_email[]" class="text"></td>
                                <td><input type="checkbox" name="metthaz[]" value="" required></td>
                                <td><input type="checkbox" name="still[]" value="" required></td>
                            </tr>
                        </table>
                        <table width="" border="0" cellspacing="0" cellpadding="3" style="margin-top: 10px;">
                            <tr>
                                <td width="210">ZHAPMoS Focal Person</td>
                                <td>
                                <select name="ZHAPMoS_person" class="select" style="width: 390px;" >
                                <span class="org_persons"></span>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td>HIV Focal Person</td>
                                <td>
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
</html>
