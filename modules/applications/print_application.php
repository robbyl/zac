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
            
        </script>
        <link href="../../css/sheet.css" rel="stylesheet" type="text/css">
    </head>

    <body onload="window.print(); window.close();" style="font-size: 80%; background: #fff;">
        <div class="container">

            <?php
            // Displaying message and errors
            include '../../includes/info.php';
            require '../../functions/general_functions.php';

            if (isset($_GET['id']) && !empty($_GET['id'])) {

                // Getting applicantion data form the database
                require '../../config/config.php';

                $query_authority = "SELECT aut_name, logo
                          FROM settings";

                $result_authority = mysql_query($query_authority) or die(mysql_error());

                $row_authority = mysql_fetch_array($result_authority);


                $id = clean($_GET['id']);

                $query_appln = "SELECT appln_id, appln_no, appln_type, appln_date, engeneer_appr,
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

                    <div class="sheet-header">

                        <div class="header-title">
                            <p><?php echo $row_authority['aut_name'] ?></p> 
                            <p style="font-size: 18px;">APPLICATION DETAIL</p>
                            <div class="page-logo">
                                <img src="../settings/logo/<?php echo $row_authority['logo'] ?>" height="80">
                            </div>
                        </div>

                        <!-- end .sheet-header --></div>
                    <div class="print-details" style="float: right;">
                        <p>Appn No: <span style="font-weight: bold; font-size: 1.5em"><?php echo sprintf('%08d', $row['appln_no']) ?></span></p>
                    </div>
                    <div class="print-details">
                        <p>Print Date: <span style="font-weight: normal; line-height: 45px;"><?php echo date('Y-m-d') ?></span></p>                  
                    </div>

                    <div class="sheet-table" style="width: 850px; margin: 0 auto">
                        <div class="hr-line"></div>
                        <fieldset>
                            <legend>Applicant Details</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="300">Applicant Type:</td>
                                    <td width="500"><strong><?php echo $row['appnt_types'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td width="170" style="vertical-align: top">Full Name:</td>
                                    <td width="300"><strong><?php echo $row['appnt_fullname'] ?></strong></td>
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
                        <fieldset>
                            <legend>Application Details</legend>
                            <table width="" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td width="300">Application Date:</td>
                                    <td width="500"><strong><?php echo date('Y-m-d'); ?></strong></td>
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
                                    <td><strong><?php echo $row['engeneer_appr']; ?></strong></td>
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
                    }
                }
                ?>
                <!-- end .content --></div>
            <!-- end .container -->
        </div>
    </body>
</html>
