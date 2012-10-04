<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | CUSTOMER STATUS</title>
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
                    <li> <a href="users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a>
                        <ul>
                            <li><a href="#">Customer status</a></li>


                            <?php
                            require '../../config/config.php';
                            $query_appln = "SELECT appln.appln_id, appnt.ba_id, appnt.appnt_id,  appln_type, appln_date, engeneer_appr, 
                                                   appnt_fullname, appnt.appnt_type_id, approved_date, inspected_by,
                                                   premise_nature, surveyed_date, service_nature_id, occupants,
                                                   appnt_tel, appnt_post_addr, appnt_phy_addr, block_no, plot_no,
                                                   living_area, living_town, cust_status
                                              FROM application appln
                                         LEFT JOIN applicant appnt
                                                ON appln.appnt_id = appnt.appnt_id
                                          LEFT JOIN customer cust
                                                 ON cust.appnt_id= appnt.appnt_id
                                         LEFT JOIN appnt_type apnty
                                                ON appnt.appnt_type_id = apnty.appnt_type_id
                                             WHERE appln.appln_id = ''";

                            $result_appln = mysql_query($query_appln) or die(mysql_error());
                            $row = mysql_fetch_array($result_appln);
                            ?>
                        </ul>
                    </li>
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
                <h1>Change Customer Status</h1>
                <div class="hr-line"></div>
                <form action="" method="post">
                    <fieldset>
                        <legend>Customer Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Account No</td>
                                <td><input type="text" name="fullname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Customer Status</td>
                                <td>
                                    <select name="cust_status" class="select" required>
                                        <option value="">--select customer status--</option>
                                        <option <?php if ($row['cust_status'] === "Connected") echo 'selected' ?> value="Connected">Connected</option>
                                        <option <?php if ($row['cust_status'] === "Disconnected") echo 'selected' ?> value="Disconnected">Disconnected</option>                                          
                                        <option <?php if ($row['cust_status'] === "Blocked") echo 'selected' ?>value="Blocked">Blocked</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Meter Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Meter No</td>
                                <td><input type="text" name="username" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Meter Status</td>
                                <td><select name="role" class="select" required="required">
                                        <option value="">-- Select role --</option>
                                        <option value="ROOT">Administrator</option>
                                        <option value="ACCOUNTANT">Accountant</option>
                                        <option value="CASHIER">Cashier</option>
                                        <option value="CONNECTION OFFICER">Connection Officer</option>
                                        <option value="CREDIT CONTROLLER">Credit Controller</option>
                                        <option value="DATA CLERK">Data Clerk</option>
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