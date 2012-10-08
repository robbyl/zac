<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require '../../functions/general_functions.php';

$number = clean($_POST['number']);
$type = clean($_POST['type']);

if (isset($number) && isset($type) && !empty($number) && !empty($type) && strlen($number) >= 8) {

    require '../../config/config.php';

    switch ($type) {

        // Case the payer is customer, display customer details
        case 'Account No':

            sleep(1);
            $query_customer = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number, service,
                                      premise_status, appnt_post_addr, billing_areas, appln_type,
                                      plot_no, block_no, cust_status
                                 FROM customer cust
                            LEFT JOIN applicant appnt
                                   ON cust.appnt_id = appnt.appnt_id
                            LEFT JOIN application appln
                                   ON appln.appnt_id = appnt.appnt_id
                            LEFT JOIN meter_customer mecu
                                   ON cust.cust_id = mecu.cust_id
                            LEFT JOIN meter met
                                   ON mecu.met_id = met.met_id
                            LEFT JOIN service_nature sn
                                   ON appln.service_nature_id = sn.service_nature_id
                            LEFT JOIN billing_area ba
                                   ON cust.ba_id = ba.ba_id
                            LEFT JOIN account acc
                                   ON cust.cust_id = acc.cust_id
                                WHERE acc_no = '$number'";

            $result_customer = mysql_query($query_customer) or die(mysql_error());

            $row_customer = mysql_fetch_array($result_customer);
            $num_cust = mysql_num_rows($result_customer);

            if ($num_cust > 0) {
                ?>

                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td width="170">Customer Name</td>
                        <td><strong id="custName"><?php echo $row_customer['appnt_fullname'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">P.O.Box</td>
                        <td><strong id="postAddr"><?php echo $row_customer['appnt_post_addr'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">Plot No</td>
                        <td><strong id="plotNo"><?php echo $row_customer['plot_no'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">Block No</td>
                        <td><strong id="blockNo"><?php echo $row_customer['block_no'] ?></strong></td>
                    </tr>
                </table>
                <div class="validity correct"></div>

                <?php
            } else {

                echo '<div class="status">The Provided Account No is not correct!</div>';
                echo '<div class="validity incorrect"></div>';
            }
            break;

        // Case the payer is applicant, display customer details
        case 'Appln No':

            sleep(1);
            $query_appln = "SELECT appln_no, appln_id, appln_type,
                                      appnt_fullname, appnt_types,
                                      appnt_post_addr, block_no, plot_no
                                 FROM application appln
                            LEFt JOIN applicant appnt
                                   ON appln.appnt_id = appnt.appnt_id
                            LEFT JOIN appnt_type apnty
                                   ON appnt.appnt_type_id = apnty.appnt_type_id
                            LEFT JOIN service_nature sev
                                   ON appln.service_nature_id = sev.service_nature_id
                                WHERE appln_no = '$number'";

            $result_appln = mysql_query($query_appln) or die(mysql_error());

            $row_appln = mysql_fetch_array($result_appln);
            $num_appln = mysql_num_rows($result_appln);

            if ($num_appln > 0) {
                ?>

                <table width="" border="0" cellpadding="5">
                    <tr>
                        <td width="170">Applicant Name</td>
                        <td><strong id="custName"><?php echo $row_appln['appnt_fullname'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">P.O.Box</td>
                        <td><strong id="postAddr"><?php echo $row_appln['appnt_post_addr'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">Plot No</td>
                        <td><strong id="plotNo"><?php echo $row_appln['plot_no'] ?></strong></td>
                    </tr>
                    <tr>
                        <td width="170">Block No</td>
                        <td><strong id="blockNo"><?php echo $row_appln['block_no'] ?></strong></td>
                    </tr>
                </table>
                <div class="validity correct"></div>

                <?php
            } else {

                echo '<div class="status">The Provided Application No is not correct!</div>';
                echo '<div class="validity incorrect"></div>';
            }
            break;

        default:

            break;
    }
}
?>
