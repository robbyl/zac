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

$wt_id = clean_arr($_POST['wt_id']);
$st_id = clean_arr($_POST['st_id']);
$wt_rate = clean_arr($_POST['wt_rate']);
$wt_flat_rate = clean_arr($_POST['wt_flat_rate']);
$s_flat_rate = clean_arr($_POST['s_flat_rate']);

$num_rate = count($wt_rate);

for ($i = 0; $i < $num_rate; $i++) {

    $query_water_tariff = "UPDATE water_tariff
                              SET wt_rate = '$wt_rate[$i]',
                                  wt_flat_rate = '$wt_flat_rate[$i]'
                            WHERE wt_id = '$wt_id[$i]'";

    $result_water_tariff = mysql_query($query_water_tariff) or die(mysql_error());

    $query_sewer_tariff = "UPDATE sewer_tariff
                              SET s_flat_rate = '$s_flat_rate[$i]'
                            WHERE st_id = '$st_id[$i]'";

    $result_sewer_tariff = mysql_query($query_sewer_tariff) or die(mysql_error());
}

if ($result_water_tariff && $result_sewer_tariff) {

    info('message', 'Saved successfully!');
    header('Location: tariffs.php');
} else {

    info('error', 'Cannot save, Try again.');
    header('Location: tariffs.php');
}
?>
