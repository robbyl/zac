<?php require '../../includes/session_validator.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | EDIT CUSTOMER</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('#appnt_type').change(function(){
                    $.post('../../includes/service_nature.php',{appnt_type: $(this).val()},function(data){
                        $('#service_nature').html(data);
                    });
                });
            });

            function service(){

                $.post('../../includes/service_nature.php',{appnt_type: $('#appnt_type').val(), appln_id: $('#appln_id').val()},function(data){
                    $('#service_nature').html(data);
                });
            }
        </script>
    </head>

    <body onLoad="service()">
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a>
                        <ul>
                            <li><a href="#">Add application</a></li>
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
                ?>
                <h1>Edit Customer Details</h1>
                <div class="hr-line"></div>
                <form action="process_edit_customer.php" method="post">
                    <?php
                    require '../../functions/general_functions.php';

                    // Getting user details from the database.
                    if (!empty($_POST['checkbox'])) {

                        require '../../config/config.php';

                        while (list($key, $val) = each($_POST['checkbox'])) {
                            // Getting applicantion data form the database

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
                                             WHERE appln.appln_id = '$val'";

                            $result_appln = mysql_query($query_appln) or die(mysql_error());
                            $row = mysql_fetch_array($result_appln);
                            ?>
                            <h3><?php echo $row['appnt_fullname'] ?> Customer Details</h3>

                            <fieldset style="float: left">
                                <legend>Customer Details</legend>
                                <input type="hidden" name="ba_id[]" value="<?php echo $row['ba_id'] ?>" id="ba_id">
                                <input type="hidden" name="cust_id[]" value="<?php echo $val ?>" id="cust_id">

                                <table width="" border="0" cellpadding="5">
                                    <tr>
                                        <td width="170">Customer Type</td>
                                        <td><select name="appnt_type[]" id="appnt_type" required class="select">
                                                <option value="">--select Applicant type--</option>
                                                <?php
                                                $result_type = mysql_query("SELECT * FROM appnt_type ORDER BY appnt_types ASC") or die(mysql_error());
                                                while ($row_type = mysql_fetch_array($result_type)) {
                                                    ?>
                                                    <option value="<?php echo $row_type['appnt_type_id'] ?>" <?php if ($row_type['appnt_type_id'] === $row['appnt_type_id']) echo 'selected'; ?> >
                                                        <?php echo $row_type['appnt_types'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Full Name</td>
                                         <input type="hidden" name="appnt_id[]" value="<?php echo $val ?>" id="appnt_id">
                                        <td><input type="text" name="appnt_fullname[]" value="<?php echo $row['appnt_fullname'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Occupants/No of people</td>
                                        <td><input type="number" name="occupants[]" required value="<?php echo $row['occupants'] ?>" min="0" class="number" style="width: 70px;"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Phone Number</td>
                                        <td><input type="tel" name="appnt_tel[]" value="<?php echo $row['appnt_tel'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Postal Address</td>
                                        <td><input type="text" name="appnt_post_addr[]" value="<?php echo $row['appnt_post_addr'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Physical Address</td>
                                        <td><input type="text" name="appnt_phy_addr[]" value="<?php echo $row['appnt_phy_addr'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Block Number</td>
                                        <td><input type="text" name="block_no[]" value="<?php echo $row['block_no'] ?>"  required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Plot Number</td>
                                        <td><input type="text" name="plot_no[]" value="<?php echo $row['plot_no'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Living Area</td>
                                        <td><input type="text" name="living_area[]" value="<?php echo $row['living_area'] ?>" required size="255" class="text"></td>
                                    </tr>
                                    <tr>
                                        <td width="170">Living Town</td>
                                        <td><input type="text" name="living_town[]" value="<?php echo $row['living_town'] ?>" required size="255" class="text"></td>
                                    </tr>

                                    <tr>
                                        <td width="170">Billing Area/Zone</td>
                                         <td><select name="billing_area" class="select" required>
                                                <option value="">--select technical area/zone--</option>
                                                <?php
                                                $result = mysql_query("SELECT * FROM billing_area ORDER BY billing_areas ASC") or die(mysql_error());
                                                while ($row_ba = mysql_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row_ba['ba_id'] ?>"
                                                            <?php if ($row['ba_id'] === $row_ba['ba_id']) echo 'selected'; ?>
                                                                <?php echo $row_ba['billing_areas'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select></td>
                                    </tr>

                          </table>
                             </fieldset>

                            <fieldset style="float: left">
                                <legend>Service Details</legend>
                                <table width="" border="0" cellpadding="5">                                 
                                    <tr>
                                        <td width="170">Application Type</td>
                                         <input type="hidden" name="appln_id[]" value="<?php echo $val ?>" id="appln_id">
                                        <td>
                                            <label><input type="checkbox" name="appln_type[]" <?php if ($row['appln_type'] === "Clean water") echo 'checked'; ?> value="Clean water" required class="radio">Clean water</label>&nbsp;&nbsp;
                                            <label><input type="checkbox" name="appln_type[]" <?php if ($row['appln_type'] === "Sewer") echo 'checked'; ?> value="Sewer" required class="radio">Sewer</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="170">Premises Nature</td>
                                        <td>
                                            <label><input type="radio" name="premise_nature[]" <?php if ($row['premise_nature'] === "Residential") echo 'checked'; ?> value="Residential" required class="radio">Residential</label>&nbsp;&nbsp;
                                            <label><input type="radio" name="premise_nature[]" <?php if ($row['premise_nature'] === "Institution") echo 'checked'; ?> value="Institution" required class="radio">Institution</label>&nbsp;&nbsp;
                                            <label><input type="radio" name="premise_nature[]" <?php if ($row['premise_nature'] === "Business") echo 'checked'; ?> value="Business" required class="radio">Business</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="170">Service Nature</td>
                                        <td><span id="service_nature">
                                                <select name="service_nature" class="select" required >
                                                    <option value="">--select service nature--</option>
                                                </select>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>

                            <div class="hr-line" style="width: 97%; background: #e0e0e0; margin: 15px 5px; clear: both"></div>


                        <?php } ?>
                        <table width="531" style="clear: both">
                            <tr>
                                <td width="212">&nbsp;</td>
                                <td width="307"><button type="submit">Save</button>
                                    <button type="reset">Reset</button></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                } else {
                    info('error', 'Please select customer first');
                    header('Location: customers.php');
                }
                ?>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
