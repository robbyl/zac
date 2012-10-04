<?php
require '../../includes/session_validator.php';
require '../../config/config.php';

$query_p_tariff = "SELECT service, wt_rate, wt_flat_rate, wt_id, wt_from, wt_to
                     FROM service_nature s
                LEFT JOIN water_tariff wt
                       ON s.service_nature_id = wt.service_nature_id
                 ORDER BY service ASC";

$result_p_tariff = mysql_query($query_p_tariff) or die(mysql_error());

$query_s_tariff = "SELECT service, s_flat_rate, st_id
                     FROM service_nature s
                LEFT JOIN sewer_tariff st
                       ON s.service_nature_id = st.service_nature_id
                 ORDER BY service ASC";

$result_s_tariff = mysql_query($query_s_tariff) or die(mysql_error());
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | TARIFFS</title>
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
                            <li><a href="#">Tariffs</a></li>
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
                <h1>Tariff Settings</h1>
                <div class="hr-line"></div>
                <form action="process_tariffs.php" method="post">
                    <fieldset>
                        <legend>Pure Water Tariffs</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170" bgcolor="#f1f1e1">Tariff Name</td>
                                <td width="100" colspan="4" align="center" bgcolor="#f1f1e1">Consumption Range</td>
                                <td width="100" align="right" bgcolor="#f1f1e1">Metered Rate</td>
                                <td width="100" align="right" bgcolor="#f1f1e1">Flat Rate</td>
                            </tr>
                            <?php
                            while ($p_row = mysql_fetch_array($result_p_tariff)) {
                                ?>

                                <tr>
                                <input type="hidden" name="wt_id[]" value="<?php echo $p_row['wt_id'] ?>">
                                <td width="170"><?php echo $p_row['service'] ?></td>
                                <td>From</td>
                                <td align="right">
                                    <input name="wt_from[]" value="<?php echo $p_row['wt_from'] ?>"
                                           type="number" min="0" class="number" style="width: 100px;" >
                                </td>
                                <td>To</td>
                                <td align="right">
                                    <input name="wt_to[]" value="<?php echo $p_row['wt_to'] ?>"
                                           type="number" min="0" class="number" style="width: 100px;" >
                                </td>
                                <td align="right">
                                    <input name="wt_rate[]" value="<?php echo $p_row['wt_rate'] ?>"
                                           type="number" min="0" step="0.01" class="number" style="width: 100px;" >
                                </td>
                                <td align="right">
                                    <input name="wt_flat_rate[]" value="<?php echo $p_row['wt_flat_rate'] ?>"
                                           type="number" min="0" step="0.01" class="number" style="width: 150px;" >
                                </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Sewer Tariffs</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170" bgcolor="#f1f1e1">Tariff Name</td>
                                <td  width="100" align="right" bgcolor="#f1f1e1">Flat Rate</td>
                            </tr>
                            <?php
                            while ($s_row = mysql_fetch_array($result_s_tariff)) {
                                ?>

                                <tr>
                                <input type="hidden" name="st_id[]" value="<?php echo $s_row['st_id'] ?>">
                                <td><?php echo $s_row['service'] ?></td>
                                <td align="right">
                                    <input name="s_flat_rate[]" value="<?php echo $s_row['s_flat_rate'] ?>"
                                           type="number" min="0" step="0.01" class="number" style="width: 150px;" >
                                </td>
                                </tr>
                            <?php } ?>
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
