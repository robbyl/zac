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

/* @var $appln_id type */
$cust_id = $_POST['cust_id'];
$appln_id = $_POST['appln_id'];
$appnt_id = $_POST['appnt_id'];
$ba_id = $_POST['ba_id'];
$cust_name = $_POST[appnt_full_name];
$service_type  = clean_arr($_POST['service']);
$premise_status = clean_arr($_POST['premise_status']);
$assigned_met_no = clean_arr($_POST['met_number']);
$pay_center = clean_arr($_POST['pay_center']);
$added_date = clean_arr($_POST['added_date']);


$cust_no = count($cust_id);

for ($i = 0; $i < $cust_no; $i++) {
    $query_customer = "UPDATE customer
                       SET cust_id = '$cust_id[$i]]',
                           added_date = '$added_date[$i]',
                           premise_status = '$premise_status[$i]',
                           
                     WHERE cust_id = '$cust_id[$i]'";

    $result_appln = mysql_query($query_appln) or die(mysql_error());

    $query_appnt = "UPDATE applicant
                       SET appnt_type_id = '$appnt_type[$i]',
                           appnt_fullname = '$appnt_fullname[$i]',
                           occupants = '$occupants[$i]',
                           appnt_tel = '$appnt_tel[$i]',
                           appnt_post_addr = '$appnt_post_addr[$i]',
                           appnt_phy_addr = '$appnt_phy_addr[$i]',
                           block_no = '$block_no[$i]',
                           plot_no = '$plot_no[$i]',
                           living_area = '$living_area[$i]',
                           living_town = '$living_town[$i]',
                           ba_id = '$ba_id[$i]'
                     WHERE appnt_id = '$appnt_id[$i]'";
    $result_appnt = mysql_query($query_appnt) or die(mysql_error());
}

if ($result_appnt && $result_appln && $result_appnt) {

    info('message', 'Updated successfully!');
    header('Location: customers.php');
} else {

    info('error', 'Cannot save, Please try again.');
    header('Location: customers.php');
}
?>
