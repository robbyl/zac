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

session_start();
$user_id = $_SESSION['user_id'];
session_commit();

$appln_id = clean($_POST['appln_id']);
$appnt_id = clean($_POST['appnt_id']);
$ba_id = clean($_POST['ba_id']);

$meter_number = clean($_POST['meter_number']);
$premise_status = clean($_POST['premise_status']);
$pay_center = clean($_POST['pay_center']);

$query_customer = "INSERT INTO customer
                               (pay_center, ba_id, premise_status,
                                added_date, appln_id, appnt_id, added_by,
                                cust_status)
                        VALUES ('$pay_center', '$ba_id', '$premise_status',
                                CURRENT_TIMESTAMP(), '$appln_id', '$appnt_id', '$user_id',
                                'Connected')";

$result_customer = mysql_query($query_customer) or die(mysql_error());

$cust_id = mysql_insert_id();
$acc_no = strtoupper(substr(uniqid(), 3));

$query_acc = "INSERT INTO account
                          (acc_no, cust_id)
                   VALUES ('$acc_no', '$cust_id')";
$result_acc = mysql_query($query_acc) or die(mysql_error());

if (!empty($meter_number)) {

    $met_met_cust = "INSERT INTO meter_customer
                             (met_id, cust_id)
                      VALUES ('$meter_number', '$cust_id')";
    $result_met_cust = mysql_query($met_met_cust) or die(mysql_error());

    $update_meter = "UPDATE meter
                        SET availability = 'ISSUED'
                      WHERE met_id = '$meter_number'";
    $result_meter = mysql_query($update_meter) or die(mysql_error());
}

if ($result_meter || $result_customer && $result_acc || $result_met_cust) {

    info('message', 'Customer seccessfully added!');
    header('Location: ../applications/applications.php');
} else {

    info('error', 'Cannot add customer. Please try again');
    header('Location: ../applications/applications.php');
}
?>
