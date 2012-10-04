<?php
/*
 * 2012 Softbil
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
 *  @copyright  2012 Softbil
 *  @version  Release: 1.0.0
 */


require '../../config/config.php';
require '../../functions/general_functions.php';

// Getting form data
$met_id = clean_arr($_POST['met_id']);
$meter_number = clean_arr($_POST['meter_number']);
$meter_type = clean_arr($_POST['meter_type']);
$meter_status = clean_arr($_POST['meter_status']);
$meter_size = clean_arr($_POST['meter_size']);
$no_digits = clean_arr($_POST['no_digits']);
$initial_reading = clean_arr($_POST['initial_reading']);
$meter_remarks = clean_arr($_POST['meter_remarks']);


$num_id = count($met_id);

for ($i = 0; $i < $num_id; $i++) {

    // Inserting form data to the database
    $edit_meter = "UPDATE meter
                        SET met_number = '$meter_number[$i]',
                            met_type = '$meter_type[$i]',
                            met_size = '$meter_size[$i]',
                            no_digits = '$no_digits[$i]',
                            initial_reading = '$initial_reading[$i]',
                            remarks = '$meter_remarks[$i]'
                      WHERE met_id = '$met_id[$i]'";

    $result_edit_meter = mysql_query($edit_meter) or die(mysql_error());
}


if ($result_edit_meter) {

    // Showing success message
    info('message', 'Updated successfully!');
    header('Location: meters.php');
} else {

    // Showing error message
    info('error', 'Cannot update. Please try again!');
    header('Location: meters.php');
}
?>


?>
