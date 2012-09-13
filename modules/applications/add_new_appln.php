<?php require '../../includes/session_validator.php'; ?>
<?php ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | ADD APPLICATION</title>
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
                require '../../config/config.php';

                date_default_timezone_set('Africa/Dar_es_Salaam');
                ?>
                <h1>Add New Application</h1>
                <div class="hr-line"></div>

                <form action="process_new_appln.php" method="post" >
                    <fieldset style="float: left">
                        <legend>Applicant Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Applicant Type</td>
                                <td>
                                    <select name="appnt_type" id="appnt_type" required class="select">
                                        <option value="">--select applicant type--</option>
                                        <?php
                                        $result = mysql_query("SELECT * FROM appnt_type ORDER BY appnt_types ASC") or die(mysql_error());
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['appnt_type_id'] ?>"><?php echo $row['appnt_types'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Full Name</td>
                                <td><input type="text" name="appnt_fullname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Occupants/No of people</td>
                                <td><input type="number" name="occupants" required min="0" class="number" style="width: 70px;"></td>
                            </tr>
                            <tr>
                                <td width="170">Phone Number</td>
                                <td><input type="tel" name="appnt_tel" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Postal Address</td>
                                <td><input type="text" name="appnt_post_addr" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Physical Address</td>
                                <td><input type="text" name="appnt_phy_address" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Block Number</td>
                                <td><input type="text" name="block_no" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Plot Number</td>
                                <td><input type="text" name="plot_no" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Living Area</td>
                                <td><input type="text" name="living_area" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Living Town</td>
                                <td><input type="text" name="living_town" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Billing Area/Zone</td>
                                <td><select name="billing_area" class="select" required>
                                        <option value="">--select technical area/zone--</option>
                                        <?php
                                        $result = mysql_query("SELECT * FROM billing_area ORDER BY billing_areas ASC") or die(mysql_error());
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['ba_id'] ?>"><?php echo $row['billing_areas'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset style="float: left">
                        <legend>Application Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Application Date</td>
                                <td><input type="date" name="appln_date" max="<?php echo date('Y-m-d'); ?>"
                                           value="<?php echo date('Y-m-d'); ?>" required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Application Type</td>
                                <td>
                                    <label><input type="radio" name="appln_type" value="Clean water" required class="radio">Clean water</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="appln_type" value="Sewer" required class="radio">Sewer</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Inspected By</td>
                                <td><input type="text" name="inspected_by" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Surveyed Date</td>
                                <td><input type="date" name="surveyed_date" max="<?php echo date('Y-m-d'); ?>"
                                           required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Engineer Approval</td>
                                <td>
                                    <label><input type="radio" name="engeneer_appr" value="Yes" required class="radio">Yes</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="engeneer_appr" value="No" required class="radio">No</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="170">Approved Date</td>
                                <td><input type="date" name="approved_date" max="<?php echo date('Y-m-d'); ?>"
                                           required autocomplete="off" class="text" style="text-align: left"></td>
                            </tr>
                            <tr>
                                <td width="170">Premises Nature</td>
                                <td>
                                    <label><input type="radio" name="premise_nature" value="Residential" required class="radio">Residential</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="premise_nature" value="Institution" required class="radio">Institution</label>&nbsp;&nbsp;
                                    <label><input type="radio" name="premise_nature" value="Business" required class="radio">Business</label>
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
                    <table width="531" style="clear: both">
                        <tr>
                            <td width="212">&nbsp;</td>
                            <td width="307"><button type="submit">Save</button>
                                <button type="reset">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
