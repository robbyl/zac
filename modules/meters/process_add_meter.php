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

require '../../config/config.php';
require '../../functions/general_functions.php';

$meter_number = clean($_POST['meter_number']);
$meter_type = clean($_POST['meter_type']);
$meter_status = clean($_POST['meter_status']);
$meter_size = clean($_POST['meter_size']);
$no_digits = clean($_POST['no_digits']);
$initial_reading = clean($_POST['initial_reading']);
$meter_remarks = clean($_POST['meter_remarks']);

$query_meter = "INSERT INTO meter
                            (met_number, met_type, met_status_id, met_size,
                             no_digits, initial_reading,  added_date, remarks)
                     VALUES ('$meter_number', '$meter_type', '$meter_status', '$meter_size',
                             '$no_digits', '$initial_reading', CURRENT_DATE(), '$meter_remarks')";

$result_meter = mysql_query($query_meter) or die(mysql_error());

if ($result_meter) {

    info('message', 'Meter successully added');
    header('Location: add_meter.php');
} else {

    info('error', 'Cannot add meter. Try again');
    header('Location: add_meter.php');
}
?>
