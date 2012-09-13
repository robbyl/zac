<?php
require '../../includes/session_validator.php';
require '../../config/config.php';

$query_settings = "SELECT aut_name, address, phone, fax, email, url, logo,
                          parking_fee, landing_fee, terms_conds, page_orientation
                     FROM settings";
$result_settings = mysql_query($query_settings) or die(mysql_error());
$row_setting = mysql_fetch_array($result_settings);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | SETTINGS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <style type="text/css">
            textarea {
                font: inherit !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
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
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a>
                        <ul>
                            <li><a href="tariffs.php">Tariffs</a></li>
                        </ul>
                    </li>
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
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>General Settings</h1>
                <div class="hr-line"></div>
                <form action="process_settings.php" method="post" enctype="multipart/form-data">
                    <fieldset style="float: left">
                        <legend>Authority Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Authority</td>
                                <td><input type="text" name="authority" value="<?php echo $row_setting['aut_name']; ?>" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Address</td>
                                <td><input type="text" name="address" value="<?php echo $row_setting['address']; ?>" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Phone</td>
                                <td><input type="tel" name="tel" value="<?php echo $row_setting['phone']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Fax</td>
                                <td><input type="text" name="fax" value="<?php echo $row_setting['fax']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">E-mal</td>
                                <td><input type="email" name="email" value="<?php echo $row_setting['email']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Web</td>
                                <td><input type="url" name="web" value="<?php echo $row_setting['url']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170" style="vertical-align: top">Logo <span class="hint">(Allowed file types jpg, png)</span></td>
                                <td><?php
                if (!empty($row_setting['logo'])) {
                    echo '<img src=logo/' . $row_setting["logo"] . ' ><br>';
                    echo '<input type="checkbox" id="romove_logo" name="romove_logo" value="REMOVE_AUTH_LOGO" />
		          <label for="romove_logo">Remove this logo</label> <br>';
                }
                echo '<input type="file" name="logo" id="file">';
                ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset style="float: left; width: 200px;">
                        <legend>Legal texts</legend>
                        <div style="padding-left: 15px"> Terms & Conditions
                            <textarea name="terms_conds" rows="10" cols="50" placeholder="INVOICE TERMS:"><?php echo $row_setting['terms_conds'] ?></textarea>
                        </div>
                    </fieldset>
                    <fieldset style="clear: both">
                        <legend>PDF Settings</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Page size</td>
                                <td><input type="url" name="url" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Page orientation</td>
                                <td><select name="page_orientation" class="select" style="width: 100%">
                                        <option <?php if ($row_setting['page_orientation'] === "portait") echo 'selected'; ?> value="portrait">portrait</option>
                                        <option <?php if ($row_setting['page_orientation'] === "landscape") echo 'selected'; ?> value="landscape">landscape</option>
                                    </select></td>
                            </tr>
                        </table>
                    </fieldset>
                    <table width="440">
                        <tr>
                            <td width="210">&nbsp;</td>
                            <td width="218"><button type="submit">Save</button>
                                <button type="reset">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
