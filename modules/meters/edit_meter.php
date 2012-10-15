<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT METER</title>
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
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a>
                        <ul>
                            <li><a href="add_meter.php">Add meter</a></li>
                            <li><a href="meter_readings.php">Meter readings</a></li>
                            <li><a href="enter_meter_readings.php">Enter meter readings</a></li>
                            <li><a href="meter_sheet.php">Meter reading sheet</a></li>
                        </ul>
                    </li>
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
                <h1>Edit Water Meter Details</h1>
                <div class="hr-line"></div>
                <form action="process_edit_meter.php" method="post">
                    <?php
                    require '../../functions/general_functions.php';

                    // Getting user details from the database.
                    if (!empty($_POST['checkbox'])) {

                        require '../../config/config.php';

                        $i = 0;

                        while (list($key, $val) = each($_POST['checkbox'])) {
                            $query_meter = "SELECT *
                                      FROM meter
                                     WHERE met_id = '$val'";

                            $result_meter = mysql_query($query_meter) or die(mysql_error());
                            $row = mysql_fetch_array($result_meter);
                            ?>
                            <h3>Details for Meter Number <?php echo $row['met_number'] ?></h3>
                            <fieldset>
                                <legend>Meter Details</legend>
                                <table width="" border="0" cellpadding="5">
                                    <input name="met_id[]" value="<?php echo $row['met_id'] ?>" type="hidden" />
                                    <tr>
                                        <td width="170">Meter Number</td>
                                        <td><input type="text" name="meter_number[]" value="<?php echo $row['met_number'] ?>" required autocomplete="off" class="text" ></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Meter Type</td>
                                        <td>


                                            <label><input type="radio" <?php if ($row['met_type'] === "Tameng") echo 'checked' ?> name="<?php echo 'meter_type[' . $i . ']' ?>" value="Tameng">Tameng</label>&nbsp;&nbsp;               


                                            <label><input type="radio" <?php if ($row['met_type'] === "Metscant") echo 'checked' ?> name="<?php echo 'meter_type[' . $i . ']' ?>" value="Metscant">Metscant</label>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width
                                            ="170">Meter Status</td>
                                        <td><select name="meter_status[]"  class="select">
                                                <option value="">--select meter status--</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Meter Size</td>
                                        <td><select name="meter_size[]" required class="select">
                                                <option value="">--select meter size--</option>
                                                <option value="0" <?php if ($row['met_size'] === '0') echo 'selected' ?> >0</option>
                                                <option value="1/2" <?php if ($row['met_size'] === '1/2') echo 'selected' ?> >1/2</option>
                                                <option value=
                                                        "1/3" <?php if ($row['met_size'] === '1/3') echo 'selected' ?> >1/3</option>
                                                <option value="1" <? php if ($row['met_size'] === '1') echo 'selected' ?> >1</option>
                                                <option value="2" <?php if ($row['met_size'] === '2') echo 'selected' ?> >2</option>
                                                <option value="3" <?php if ($row['met_size'] === '3') echo 'selected' ?> >3</option>
                                            </select></td>
                                    </tr>
                                    <tr>

                                        <td width="170">Number of Digits</td>
                                        <td><
                                            input type="number" name="no_digits[]" value="<?php echo $row['no_digits']; ?>" class="number" min="1" required style="width: 70px;"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Initial Reading <span class="hint">(m<sup>3</sup>)</span></td>
                                        <td><input type="number" name="initial_reading[]" value="<?php echo $row['initial_reading']; ?>" class="number" min="0" required style="width: 70px;"></td>
                                    </tr>
                                    <tr>
                                        <td width="170" style="vertical-align: top">Remarks</td>
                                        <td><textarea name="meter_remarks[]" class="text" rows="10" cols="50" placeholder="METER REMARKS:"><?php echo $row['remarks'] ?></textarea></td>
                                    </tr>

                                </table>
                            </fieldset>
                            <div class="hr-line" style="width: 50%; background: #e0e0e0; margin: 10px 5px"></div>
                            <?php
                            $i++;
                        }
                        ?>
                        <table width="531" style="clear: both">
                            <tr>
                                <td width="212">&nbsp;</td>
                                <td width="307"><button type="submit">Save</button>
                                    <button type="reset">Reset</button></td>
                            </tr>
                        </table>
                        <?php
                    } else {

                        info('error', 'Please select meter first!');
                        header('Location: meters.php');
                    }
                    ?>

                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?> 
            <!-- end .container --></div>
    </body>
</html>
