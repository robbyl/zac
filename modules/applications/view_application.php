<?php require '../../includes/session_validator.php'; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT APPLICATION</title>
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
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a>
                        <ul>
                            <li><a href="../applications/add_new_appln.php">Add application</a></li>
                        </ul>
                    </li>
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
                require '../../functions/general_functions.php';

                if (isset($_GET['id']) && !empty($_GET['id'])) {

                    // Getting applicantion data form the database
                    require '../../config/config.php';


                    $id = clean($_GET['id']);

                    $query_appln = "SELECT appln_id, appln_type, appln_date, engeneer_appr,
                                           appnt_fullname, appnt_types, billing_areas,
                                           surveyed_date, approved_date, inspected_by,
                                           premise_nature, service, occupants, appnt_tel, appnt_post_addr,
                                           appnt_phy_addr, block_no, plot_no,living_area, living_town
                                      FROM application appln
                                 LEFt JOIN applicant appnt
                                        ON appln.appnt_id = appnt.appnt_id
                                 LEFT JOIN appnt_type apnty
                                        ON appnt.appnt_type_id = apnty.appnt_type_id
                                 LEFT JOIN service_nature sev
                                        ON appln.service_nature_id = sev.service_nature_id
                                 LEFT JOIN billing_area ba
                                        ON appnt.ba_id = ba.ba_id
                                     WHERE appln_id = '$id'";

                    $result_appln = mysql_query($query_appln) or die(mysql_error());
                    $row = mysql_fetch_array($result_appln);
                    $num_row = mysql_num_rows($result_appln);
                    if ($num_row > 0) {
                        ?>
                        <h1><?php echo $row['appnt_fullname'] ?> Application Details</h1>
                        <div class="hr-line"></div>
                        <fieldset style="float: left">
                            <legend>Applicant Details</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="170">Applicant Type:</td>
                                    <td><strong><?php echo $row['appnt_types'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Full Name:</td>
                                    <td><strong><?php echo $row['appnt_fullname'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Occupants/No of people:</td>
                                    <td><strong><?php echo $row['occupants'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Phone Number:</td>
                                    <td><strong><?php echo $row['appnt_tel'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Postal Address:</td>
                                    <td><strong><?php echo $row['appnt_post_addr'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Physical Address:</td>
                                    <td><strong><?php echo $row['appnt_phy_addr'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Block Number:</td>
                                    <td><strong><?php echo $row['block_no'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Plot Number:</td>
                                    <td><strong><?php echo $row['plot_no'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Living Area:</td>
                                    <td><strong><?php echo $row['living_area'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Living Town:</td>
                                    <td><strong><?php echo $row['living_town'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Billing Area/Zone:</td>
                                    <td><strong><?php echo $row['billing_areas'] ?></strong></td>
                                    
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset style="float: left">
                            <legend>Application Details</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="170">Application Date:</td>
                                    <td>
                                        <strong><?php echo date('Y-m-d'); ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">Application Type:</td>
                                    <td><strong><?php echo $row['appln_type'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Inspected By:</td>
                                    <td><strong><?php echo $row['inspected_by'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Surveyed Date:</td>
                                    <td><strong><?php echo $row['surveyed_date'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Engineer Approval:</td>
                                    <td>
                                        <strong><?php echo $row['engeneer_appr']; ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="170">Approved Date:</td>
                                    <td><strong><?php echo $row['approved_date'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Premises Nature:</td>
                                    <td><strong><?php echo $row['premise_nature'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Service Nature:</td>
                                    <td><strong><?php echo $row['service'] ?></strong></td>
                                </tr>
                            </table>
                        </fieldset>
                        <?php
                    } else {
                        info('error', 'No records for this appln');
                        header('Location: applications.php');
                    }
                } else {
                    info('error', 'Application id not provided. Please try again');
                    header('Location: applications.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
