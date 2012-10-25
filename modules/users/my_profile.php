<?php
require '../../includes/session_validator.php';
require '../../functions/general_functions.php';
require '../../config/config.php';

session_start();
$user_id = $_SESSION['user_id'];
session_commit();

$query_user = "SELECT *
                 FROM users
                WHERE user_id = '$user_id'";

$result_user = mysql_query($query_user) or die(mysql_error());
$row = mysql_fetch_array($result_user);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | MY PROFILE</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
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
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>My Profile</h1>
                <div class="hr-line"></div>
                <form action="process_my_profile.php" method="post">
                    <fieldset>
                        <legend>User Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <input name="user_id" value="<?php echo $row['user_id'] ?>" type="hidden" />
                            <tr>
                                <td width="200">First Name</td>
                                <td><input type="text" name="fname" value="<?php echo $row['usr_fname'] ?>" required size="255" class="text"></td>

                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input type="text" name="lname" value="<?php echo $row['usr_lname'] ?>" required size="255" class="text"></td>

                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><input type="email" name="email"  value="<?php echo $row['email'] ?>" required size="255" class="text"></td>
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
                                <td><input type="text" value="<?php echo $row['role'] ?>" class="text" disabled="disabled" /></td>
                            </tr>

                        </table>

                    </fieldset>
                    <table width="616" border="0" cellpadding="5">
                        <tr>
                            <td width="228">&nbsp;</td>
                            <td width="362"><button type="submit" style="margin-top: 0px;">Update</button>
                                <button type="reset" style="margin-top: 0px;">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
