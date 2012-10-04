<?php require '../../includes/session_validator.php'; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | CUSTOMERS</title>
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

                    // Getting user data form the database
                    require '../../config/config.php';


                    $id = clean($_GET['id']);

                    $query_customer = "SELECT cust.cust_id,  appnt_types, appnt_fullname, plot_no,
                                            service, billing_areas,  acc_no,met_number, premise_status, billing_areas, 
                                            occupants,appnt_tel,appnt_post_addr,appnt_phy_addr, living_area, living_town
                                           
                                      FROM customer cust
                                 LEFT JOIN applicant appnt
                                        ON cust.appnt_id = appnt.appnt_id
                                 LEFT JOIN appnt_type apnty
                                        ON appnt.appnt_type_id = apnty.appnt_type_id
                                 LEFT JOIN application appln
                                        ON appnt.appnt_id = appln.appnt_id
                                 LEFT JOIN service_nature sev
                                        ON appln.service_nature_id = sev.service_nature_id
                                 LEFT JOIN billing_area ba
                                        ON cust.ba_id = ba.ba_id	
                                 LEFT JOIN account acc
				        ON cust.cust_id = acc.cust_id 
                                 LEFT JOIN meter met
                                        ON cust.met_id = met.met_id
                                     WHERE cust.cust_id = 2";

                    $result_customer = mysql_query($query_customer) or die(mysql_error());
                    $row = mysql_fetch_array($result_customer);
                    $num_row = mysql_num_rows($result_customer);

                    if ($num_row > 0) {
                        ?>
                        <h1><?php echo $row['appnt_fullname'] ?> Customer</h1>
                        

                        <div class="hr-line"></div>
                        <fieldset style="float: left">
                            <legend>Customer</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="170">Acc No:</td>
                                    <td><strong><?php echo $row['acc_no'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Customer Name:</td>
                                    <td><strong><?php echo $row['appnt_fullname'] ?></strong></td>
                                </tr>
 <tr>
                                    <td width="170">Occupants/No of people:</td>
                                    <td><strong><?php echo $row['occupants'] ?></strong></td>
                                </tr>
                                 <tr>
                                    <td width="170">Phone Number:</td>
                                    <td><strong><?php echo $row['appnt_tel'] ?></strong></td>
                                    <tr>
                                    <td width="170">Post Adress:</td>
                                    <td><strong><?php echo $row['appnt_post_addr'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Physical Adress:</td>
                                    <td><strong><?php echo $row['appnt_phy_addr'] ?></strong></td>
                                    </tr>
                                 <tr>
                                        <td width="170">Living Area:</td>
                                    <td><strong><?php echo $row['living_area'] ?></strong></td>
                                    </tr>
                                    <tr>
                                    <td width="170">Plot No:</td>
                                    <td><strong><?php echo $row['plot_no'] ?></strong></td>
                                </tr>

                                    <tr>
                                        <td width="170">Living Town:</td>
                                    <td><strong><?php echo $row['living_town'] ?></strong></td>
                                    </tr>
                                <tr>
                                    <td width="170">Service Type:</td>
                                    <td><strong><?php echo $row['appnt_types'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Service nature:</td>
                                    <td><strong><?php echo $row['service'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Premise Status:</td>
                                    <td><strong><?php echo $row['premise_status'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170">Meter No:</td>
                                    <td><strong><?php echo $row['met_number'] ?></strong></td>
                                </tr>
                                

                                <tr>
                                    <td width="170">Billing Area:</td>
                                    <td><strong><?php echo $row['billing_areas'] ?></strong></td>
                                </tr>
                            </table>
                            </tr>
                            </table>
                        </fieldset>
                        <?php
                    } else {
                        info('error', 'No records for this customer');
                        header('Location: customers.php');
                    }
                } else {
                    info('error', 'Customer id not provided. Please try again');
                    header('Location: customers.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
