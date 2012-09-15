<?php

/*
 * 2012 softbill
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Londo <robbyl@ovi.com>
 *  @copyright  2012 softbill
 *  @version  Release: 1.0.0
 */

require '../../functions/general_functions.php';
require '../../config/config.php';

//$last_receipting_date = clean($_POST['last_receipting_date']);
$billing_month = clean($_POST['billing_month']);

$query_readings = "SELECT premise_status, appln_type,  appnt_fullname,
                          billing_date, service, cust_status, consumption,
                          wt_from, wt_to, wt_rate, wt_flat_rate, cust.cust_id,
                          s_flat_rate, acc_id
                     FROM customer cust
                LEFT JOIN application appln
                       ON cust.appln_id = appln.appln_id
                LEFT JOIN meter_reading mred
                       ON cust.cust_id = mred.cust_id
                LEFT JOIN applicant appnt
                       ON cust.appnt_id = appnt.appnt_id
                LEFT JOIN service_nature sn
                       ON appln.service_nature_id = sn.service_nature_id
                LEFT JOIN water_tariff wt
                       ON sn.service_nature_id = wt.service_nature_id
                LEFT JOIN sewer_tariff st
                       ON sn.service_nature_id = st.service_nature_id
                LEFT JOIN account acc
                       ON cust.cust_id = acc.cust_id
                    WHERE billing_date = '$billing_month'";

$result_readings = mysql_query($query_readings) or die(mysql_error());

$num_readings = mysql_num_rows($result_readings);

if ($num_readings > 0) {
    while ($row_reading = mysql_fetch_array($result_readings)) {

        // Generating Invoices for Clean water
        if ($row_reading['appln_type'] === 'Clean water') {

            // Making Water Billing transaction
            $query_transaction_water = "INSERT INTO transaction
                                                    (trans_date, description)
                                             VALUES (CURRENT_TIMESTAMP(), 'Water Billing')";

            $result_transaction_water = mysql_query($query_transaction_water) or die(mysql_error());

            $trans_id = mysql_insert_id();
            $cust_id = $row_reading['cust_id'];
            $acc_id = $row_reading['acc_id'];

            $cost_water = $row_reading['consumption'] * $row_reading['wt_rate'];

            $query_invoice_water = "INSERT INTO invoice
                                                (inv_no, invoicing_date, created_date,
                                                 cust_id, acc_id, trans_id, cost)
                                         VALUES ('89232AS', '$billing_month', CURRENT_TIMESTAMP(),
                                                 '$cust_id', '$acc_id', '$trans_id', '$cost_water')";

            $result_invoice_water = mysql_query($query_invoice_water) or die(mysql_error());
        } elseif ($row_reading['appln_type'] === 'Sewer') {

            // Making Sewer Billing transaction
            $query_transaction_sewer = "INSERT INTO transaction
                                                    (trans_date, description)
                                             VALUES (CURRENT_TIMESTAMP(), 'Sewer Billing')";

            $result_transaction_sewer = mysql_query($query_transaction_sewer) or die(mysql_error());

            $trans_id = mysql_insert_id();
            $cust_id = $row_reading['cust_id'];
            $acc_id = $row_reading['acc_id'];

            //Generating Invoices for Sewer
            $cost_sewer = $row_reading['s_flat_rate'];

            $query_invoice_sewer = "INSERT INTO invoice
                                      (inv_no, invoicing_date, created_date,
                                       cust_id, trans_id, cost)
                                VALUES ('893439', '$billing_month', CURRENT_TIMESTAMP(),
                                       '$cust_id', '$trans_id', '$cost_sewer')";

            $result_invoice_sewer = mysql_query($query_invoice_sewer) or die(mysql_error());
        }
    }

    mysql_close($conn);

    if ($result_invoice_water || $result_invoice_sewer) {

        info('message', 'Invoices successfully generated');
        header('Location: generate_invoices.php');
    } else {

        info('error', 'There was an error during processing invoices. Try again.');
        header('Location: generate_invoices.php');
    }
} else {

    info('error', 'Meter readings for billing month ' . $billing_month . ' are not available!');
    header('Location: generate_invoices.php');
}
?>