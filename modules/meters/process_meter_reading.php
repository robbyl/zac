<?php

/*
 * 2012 Flight
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
 *  @copyright  2012 Flight
 *  @version  Release: 1.0.0
 */

require '../../config/config.php';
require '../../functions/general_functions.php';

$curr_reading = clean_arr($_POST['curr_reading']);
$prev_reading = clean_arr($_POST['prev_reading']);
$cust_id = clean_arr($_POST['cust_id']);
$met_id = clean_arr($_POST['met_id']);
$remarks = clean_arr($_POST['remarks']);
$billing_date = $_POST['billing_date'];
$reading_date = $_POST['reading_date'];

$num_meter = count($met_id);

for ($i = 0; $i < $num_meter; $i++) {

    $consumption[$i] = $curr_reading[$i] - $prev_reading[$i];

    $query_readings = "INSERT INTO meter_reading
                                   (billing_date, reading_date, entered_date,
                                    reading, consumption, met_id, cust_id, remarks)
                            VALUES ('$billing_date', '$reading_date', CURRENT_TIMESTAMP(),
                                    '$curr_reading[$i]', '$consumption[$i]', '$met_id[$i]', '$cust_id[$i]', '$remarks[$i]')";

    $result_readings = mysql_query($query_readings) or die(mysql_error());
}

if ($result_readings) {

    info('message', 'Meter readings saved!');
    header('Location: enter_meter_readings.php');
} else {

    info('error', 'Cannot save. Please tyr again');
    header('Location: enter_meter_readings.php');
}
?>
