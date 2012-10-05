<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['number']) && isset($_POST['type']) && !empty($_POST['number']) && !empty($_POST['type'])) {

    require '../../config/config.php';
    require '../../functions/general_functions.php';

    $number = clean($_POST['number']);
    $type = clean($_POST['type']);

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

            <?php
            break;

        // Case the payer is applicant, display customer details
        case 'Appln No':

            echo 'some applicant details';
            break;

        default:

            break;
    }
}
?>
