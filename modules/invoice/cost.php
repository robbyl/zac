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
//$billing_month = clean($_POST['billing_month']);

$query_readings = "SELECT premise_status, appln_type,  appnt_fullname,
                          billing_date, service, cust_status, consumption,
                          level, wt_from, wt_to, wt_rate, wt_flat_rate, 
                          cust.cust_id, s_flat_rate, acc_id, appnt.appnt_type_id
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
                    WHERE billing_date = '2012-06-22'";

$result_readings = mysql_query($query_readings) or die(mysql_error());

while ($row_reading = mysql_fetch_array($result_readings)) {



    // Generating Invoices for Clean water
    if ($row_reading['appln_type'] === 'Clean water') {

        // Making Water Billing transaction
//        $query_transaction_water = "INSERT INTO transaction
//                                                    (trans_date, description)
//                                             VALUES (CURRENT_TIMESTAMP(), 'Water Billing')";
//
//        $result_transaction_water = mysql_query($query_transaction_water) or die(mysql_error());
//
//        $trans_id = mysql_insert_id();
//        $cust_id = $row_reading['cust_id'];
//        $acc_id = $row_reading['acc_id'];

        if ($row_reading['premise_status'] === 'Metered') {

            $consumption = $row_reading['consumption'];
            $from = $row_reading['wt_from'];
            $to = $row_reading['wt_to'];
            $wt_rate = $row_reading['wt_rate'];
            $curr_level = $row_reading['level'];
            $appnt_type = $row_reading['appnt_type_id'];
            
            $query_level = "SELECT appnt_type_id, level, wt_rate, wt_from, wt_to 
                                      FROM water_tariff wt
                                INNER JOIN service_nature sev
                                        ON wt.service_nature_id = sev.service_nature_id
                                     WHERE appnt_type_id = '$appnt_type'
                                  ORDER BY level ASC";
            $result_level = mysql_query($query_level) or die(mysql_error());
            $no_level = mysql_num_rows($result_level);

            if ($consumption <= $to) {

                $cost = $consumption * $wt_rate;
            } elseif ($consumption > $to) {

                for ($i = 0; $i < $no_level; $i++) {
                    $row_level = mysql_fetch_array($result_level);
                    $levels[$i] = $row_level['level'];
                    $nwt_to[$row_level['level']] = $row_level['wt_to'];
                    $nwt_rate[$row_level['level']] = $row_level['wt_rate'];
                }

                $top_level = end($levels);

                if ($curr_level === $top_level) {

                    $cost = $consumption * $wt_rate;
                } elseif ($curr_level != $top_level) {

                    $cost = $to * $wt_rate;
                    $extra = $consumption - $to;

                    while ($extra >= 0) {

                        $curr_level = $curr_level + 0.1;

                        if ($extra <= $nwt_rate[$curr_level]) {
                            $cost += $extra * $nwt_rate[$curr_level];
                        } elseif ($extra > $nwt_rate[$curr_level]) {

                            $cost += $nwt_to[$curr_level] * $nwt_rate[$curr_level];
                            $extra -= $nwt_to[$curr_level];
                        }
                    }
                }
            }

            //If water customer and premise status metered
        } elseif ($row_reading['premise_status'] === 'Un metered') {

            // If water customer and premise status un metered use
            // water flat rate as water cost
            $cost = $row_reading['wt_flat_rate'];
        }
        
        echo $cost . '<br>';
        
    } elseif ($row_reading['appln_type'] === 'Sewer') {

        // Making Sewer Billing transaction
//        $query_transaction_sewer = "INSERT INTO transaction
//                                                    (trans_date, description)
//                                             VALUES (CURRENT_TIMESTAMP(), 'Sewer Billing')";
//
//        $result_transaction_sewer = mysql_query($query_transaction_sewer) or die(mysql_error());
//
//        $trans_id = mysql_insert_id();
//        $cust_id = $row_reading['cust_id'];
//        $acc_id = $row_reading['acc_id'];
//
//        //Generating Invoices for Sewer
//        $cost_sewer = $row_reading['s_flat_rate'];
    }
}

exit;

mysql_close($conn);

if ($result_invoice_water || $result_invoice_sewer) {

    info('message', 'Invoices successfully generated');
    header('Location: generate_invoices.php');
} else {

    info('error', 'There was an error during processing invoices. Try again.');
    header('Location: generate_invoices.php');
}
?>