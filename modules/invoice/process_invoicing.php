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
                          level, wt_from, wt_to, wt_rate, wt_flat_rate, 
                          cust.cust_id, s_flat_rate, acc_id, appnt.appnt_type_id,
                          aging_date, aging_debit
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
                LEFT JOIN aging_analysis age
                       ON cust.cust_id = age.cust_id
                    WHERE cust_status = 'Connected'
                      AND billing_date = '$billing_month'
                       OR billing_date IS NULL";

$result_readings = mysql_query($query_readings) or die(mysql_error());

$query_inv_no = "SELECT MAX(inv_no) AS cur_inv_no
                   FROM invoice";
$result_inv_no = mysql_query($query_inv_no) or die(mysql_error());

$row_inv = mysql_fetch_array($result_inv_no);
$cur_inv_no = $row_inv['cur_inv_no'];
$inv_rows = mysql_num_rows($result_inv_no);

$inv_no = ($inv_rows > 0 ? $inv_no = $cur_inv_no : $inv_no = '0');

$query_level = "SELECT appnt_type_id, level, wt_rate, wt_from, wt_to 
                  FROM water_tariff wt
            INNER JOIN service_nature sev
                    ON wt.service_nature_id = sev.service_nature_id
              ORDER BY level ASC";

$result_level = mysql_query($query_level) or die(mysql_error());
$no_level = mysql_num_rows($result_level);

for ($i = 0; $i < $no_level; $i++) {
    $row_level = mysql_fetch_array($result_level);
    $levels[$row_level['appnt_type_id']][$i] = $row_level['level'];
    $nwt_to[$row_level['appnt_type_id']][$row_level['level']] = $row_level['wt_to'];
    $nwt_rate[$row_level['appnt_type_id']][$row_level['level']] = $row_level['wt_rate'];
}

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

        if ($row_reading['premise_status'] === 'Metered') {

            $consumption = $row_reading['consumption'];
            $to = $row_reading['wt_to'];
            $wt_rate = $row_reading['wt_rate'];
            $curr_level = $row_reading['level'];
            $appnt_type = strval($row_reading['appnt_type_id']);
            $inv_type = "Actual";
            $top_level = end($levels[$appnt_type]);

            if ($consumption <= $to) {

                $cost = $consumption * $wt_rate;
            } elseif ($consumption > $to) {

                $cost = $consumption * $wt_rate;
            } elseif ($consumption > $to && strval($curr_level) != strval($top_level)) {

                $curr_level = $row_reading['level'];
                $extra = $consumption - $to;
                $cost = $to * $wt_rate;

                while ($extra >= 0 && $curr_level <= $top_level) {

                    $curr_level += + 0.1;

                    if ($extra <= $nwt_to[$appnt_type][strval($curr_level)]) {

                        $cost += $extra * $nwt_rate[$appnt_type][strval($curr_level)];
                        break;
                    } elseif ($extra > $nwt_to[$appnt_type][strval($curr_level)]) {

                        if (strval($curr_level) === strval($top_level)) {

                            $cost += $extra * $nwt_rate[$appnt_type][strval($curr_level)];
                            break;
                        } else {

                            $extra -= $nwt_to[$appnt_type][strval($curr_level)];
                            $cost += $nwt_to[$appnt_type][strval($curr_level)] * $nwt_rate[$appnt_type][strval($curr_level)];
                        }
                    }
                }
            }

            //If water customer and premise status metered
        } elseif ($row_reading['premise_status'] === 'Un metered') {

            // If water customer and premise status un metered use
            // water flat rate as water cost
            $inv_type = "Estimate";
            $cost = $row_reading['wt_flat_rate'];
        }
    } elseif ($row_reading['appln_type'] === 'Sewer') {

        // Making Sewer Billing transaction
        $query_transaction_sewer = "INSERT INTO transaction
                                                    (trans_date, description)
                                             VALUES (CURRENT_TIMESTAMP(), 'Sewer Billing')";

        $result_transaction_sewer = mysql_query($query_transaction_sewer) or die(mysql_error());

        $trans_id = mysql_insert_id();
        $cust_id = $row_reading['cust_id'];
        $acc_id = $row_reading['acc_id'];
        $inv_type = "Actual";

        //Calculating sewer costs
        $cost = $row_reading['s_flat_rate'];
    }

    // Generating invoices
    $inv_no++;

    $query_invoice_water = "INSERT INTO invoice
                                        (inv_no, invoicing_date, created_date,
                                        cust_id, acc_id, trans_id, inv_type, cost)
                                 VALUES ('$inv_no', '$billing_month', CURRENT_TIMESTAMP(),
                                                 '$cust_id', '$acc_id', '$trans_id', '$inv_type', '$cost')";

    $result_invoice_water = mysql_query($query_invoice_water) or die(mysql_error());

    //Inserting debits in aging analysis
    $curr_debit = $row_reading['aging_debit'];
    $new_debit = $curr_debit + $cost;

    $query_age_analysis = "INSERT INTO aging_analysis
                                       (aging_date, cust_id, aging_debit)
                                VALUES (CURRENT_DATE(), '$cust_id', '$new_debit')";

    $result_age_analysis = mysql_query($query_age_analysis) or die(mysql_error());
}

mysql_close($conn);

if ($result_invoice_water || $result_invoice_sewer) {

    info('message', 'Invoices successfully generated');
    header('Location: generate_invoices.php');
} else {

    info('error', 'There was an error during processing invoices. Try again.');
    header('Location: generate_invoices.php');
}
?>