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
$cust_id = $_POST['cust_id'];
$appln_id = $_POST['appln_id'];
$appnt_id = $_POST['appnt_id'];
$ba_id = $_POST['ba_id'];
$appln_type = clean_arr($_POST['appln_type']);
$premise_nature = clean_arr($_POST['premise_nature']);
$service_nature = clean_arr($_POST['service_nature']);
$appnt_type = clean_arr($_POST['appnt_type']);
$appnt_fullname = clean_arr($_POST['appnt_fullname']);
$appnt_tel = clean_arr($_POST['appnt_tel']);
$appnt_post_addr = clean_arr($_POST['appnt_post_addr']);
$appnt_phy_addr = clean_arr($_POST['appnt_phy_addr']);
$block_no = clean_arr($_POST['block_no']);
$plot_no = clean_arr($_POST['plot_no']);
$living_area = clean_arr($_POST['living_area']);
$living_town = clean_arr($_POST['living_town']);
$billing_area = clean_arr($_POST['billing_area']);

$cust_no = count($cust_id);

for ($i = 0; $i < $cust_no; $i++) {
    $query_appln = "UPDATE application
                       SET appln_id = '$appln_id[$i]]',
                           appln_type = '$appln_type[$i]',
                           premise_nature = '$premise_nature[$i]',
                           service_nature_id = '$service_nature[$i]'
                    WHERE appln_id = '$appln_id[$i]'";

    $result_appln = mysql_query($query_appln) or die(mysql_error());

    $query_appnt = "UPDATE applicant
                       SET appnt_type_id = '$appnt_type[$i]',
                           appnt_fullname = '$appnt_fullname[$i]',     
                           appnt_tel = '$appnt_tel[$i]',
                           appnt_post_addr = '$appnt_post_addr[$i]',
                           appnt_phy_addr = '$appnt_phy_addr[$i]',
                           block_no = '$block_no[$i]',
                           plot_no = '$plot_no[$i]',
                           living_area = '$living_area[$i]',
                           living_town = '$living_town[$i]'
                   WHERE appnt_id = '$appnt_id[$i]'";
    $result_appnt = mysql_query($query_appnt) or die(mysql_error());
}

if ($result_appnt && $result_appln) {

    info('message', 'Updated successfully!');
    header('Location: customers.php');
} else {

    info('error', 'Cannot save, Please try again.');
    header('Location: customers.php');
}
?>
