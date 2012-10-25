<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT USER</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
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
                            <li><a href="new_user.php">Add new user</a></li>
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
                <h1>Edit User Details</h1>
                <div class="hr-line"></div>
                <?php
                require '../../functions/general_functions.php';

                // Getting user details from the database.
                if (!empty($_POST['checkbox'])) {

                    require '../../config/config.php';
                    ?>

                    <form action="process_edit_user.php" method="post">

                        <?php
                        while (list($key, $val) = each($_POST['checkbox'])) {
                            $query_user = "SELECT *
                                             FROM users
                                            WHERE user_id = '$val'";

                            $result_user = mysql_query($query_user) or die(mysql_error());
                            $row = mysql_fetch_array($result_user);
                            ?>

                            <fieldset>
                                <legend>User Details</legend>
                                <table width="" border="0" cellpadding="5">
                                    <input name="user_id[]" value="<?php echo $row['user_id'] ?>" type="hidden" />
                                    <tr>
                                        <td width="200">Fist Name</td>
                                        <td><input type="text" name="usr_fname[]" value="<?php echo $row['usr_fname'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Middle Name</td>
                                        <td><input type="text" name="usr_lname" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Sir Name</td>
                                        <td><input type="text" name="usr_lname[]" value="<?php echo $row['usr_lname'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td><input type="email" name="email[]"  value="<?php echo $row['email'] ?>" required size="255" class="text"></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset>
                                <legend>Account Details</legend>
                                <table width="" border="0" cellpadding="5">
                                    <tr>
                                        <td width="200">User Name</td>
                                        <td><input type="text" name="username" value="<?php echo $row['username'] ?>" disabled="disabled" size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="password" value="*********" disabled="disabled" size="255" class="text" ></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <select name="role[]" class="select" required="required">
                                                <option value="">-- Select Role --</option>
                                                <option <?php if ($row['role'] === 'ROOT') echo 'selected' ?> value="ROOT">Administrator</option>
                                                <option <?php if ($row['role'] === 'ACCOUNTANT') echo 'selected' ?> value="ACCOUNTANT">Accountant</option>
                                                <option <?php if ($row['role'] === 'BILLING OFFICER') echo 'selected' ?> value="BILLING OFFICER">Billing Officer</option>
                                                <option <?php if ($row ['role'] === 'CASHIER') echo 'selected' ?> value="CASHIER">Cashier</option>
                                                <option <?php if ($row['role'] === 'CONNECTION OFFICER') echo 'selected' ?> value="CONNECTION OFFICER">Connection Officer</option>
                                                <option <?php if ($row['role'] === 'CREDIT CONTROLLER') echo 'selected=' ?> value="CREDIT CONTROLLER">Credit Controller</option>
                                                <option <?php if ($row['role'] === 'MANAGER') echo 'selected' ?> value="MANAGER">Manager</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                            </fieldset>

                            <div class="hr-line" style="width: 50%; background: #e0e0e0; margin: 10px 5px"></div>

                                <?php
                            }
                            ?>
                            <table width="598">
                                <tr>
                                    <td width="243">&nbsp;</td>
                                    <td width="343"><button type="submit" style="margin-top: 0px;">Update</button>
                                        <button type="reset" style="margin-top: 0px;">Reset</button></td>
                                </tr>
                            </table>
                    </form>
                    <?php
                } else {

                    info('error', 'Please select user(s) first!');
                    header('Location: users.php');
                }
                ?>

                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
