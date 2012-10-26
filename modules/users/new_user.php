<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | ADD USER</title>
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
                <h1>Add New User</h1>
                <div class="hr-line"></div>
                <form action="process_add_user.php" method="post">
                    <fieldset>
                        <legend>User Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">First Name</td>
                                <td><input type="text" name="usr_fname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" name="usr_lname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Sir Name</td>
                                <td><input type="text" name="sir_name" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="tel" name="phone" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Fax</td>
                                <td><input type="tel" name="fax" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><input type="email" name="email" required size="255" class="text"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Account Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">User Name</td>
                                <td><input type="text" name="username" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" required size="255" class="text" ></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><select name="role" class="select" required="required">
                                        <option value="">-- Select role --</option>
                                        <option value="ROOT">Administrator</option>
                                        <option value="ACCOUNTANT">Accountant</option>
                                        <option value="BILLING OFFICER">Billing Officer</option>
                                        <option value="CASHIER">Cashier</option>
                                        <option value="CONNECTION OFFICER">Connection Officer</option>
                                        <option value="CREDIT CONTROLLER">Credit Controller</option>
                                        <option value="MANAGER">Manager</option>
                                    </select></td>
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
