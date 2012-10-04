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

$appln_date = clean($_POST['appln_date']);
$appln_type = clean($_POST['appln_type']);
$surveyed_date = clean($_POST['surveyed_date']);
$engeneer_appr = clean($_POST['engeneer_appr']);
$approved_date = clean($_POST['approved_date']);
$inspected_by = clean($_POST['inspected_by']);
$premise_nature = clean($_POST['premise_nature']);
$service_nature = clean($_POST['service_nature']);
$appnt_type = clean($_POST['appnt_type']);
$appnt_fullname = clean($_POST['appnt_fullname']);
$occupants = clean($_POST['occupants']);
$appnt_tel = clean($_POST['appnt_tel']);
$appnt_post_addr = clean($_POST['appnt_post_addr']);
$appnt_phy_address = clean($_POST['appnt_phy_address']);
$block_no = clean($_POST['block_no']);
$plot_no = clean($_POST['plot_no']);
$living_area = clean($_POST['living_area']);
$living_town = clean($_POST['living_town']);
$billing_area = clean($_POST['billing_area']);

// Inserting applicant details
$query_applnt = "INSERT INTO applicant
                             (appnt_type_id, appnt_fullname, occupants, appnt_tel,
                              appnt_post_addr, appnt_phy_addr, block_no, plot_no,
                             living_area, living_town, ba_id)
                      VALUES ('$appnt_type', '$appnt_fullname', '$occupants', '$appnt_tel',
                             '$appnt_post_addr', '$appnt_phy_address', '$block_no', '$plot_no',
                             '$living_area', '$living_town', '$billing_area')";

$result_applnt = mysql_query($query_applnt) or die(mysql_error());

$appnt_id = mysql_insert_id();

// Inserting application details
$query_appln_no = "SELECT MAX(appln_no) AS appln_no
                   FROM application";
$result_appln_no = mysql_query($query_appln_no) or die(mysql_error());

$row_appln = mysql_fetch_array($result_appln_no);
$cur_appln_no = $row_appln['appln_no'];
$appln_rows = mysql_num_rows($result_appln_no);

$appln_no = ($appln_rows > 0 ? $appln_no = $cur_appln_no : $appln_no = '0');
$appln_no++;

$query_appln = "INSERT INTO application
                            (appln_no, appln_date, appln_type, appnt_id, surveyed_date, engeneer_appr,
                             approved_date, inspected_by, premise_nature, service_nature_id, status )
                     VALUES ('$appln_no', '$appln_date', '$appln_type', '$appnt_id', '$surveyed_date', '$engeneer_appr',
                             '$approved_date', '$inspected_by', '$premise_nature', '$service_nature', 'Not Paid')";

$result_appln = mysql_query($query_appln) or die(mysql_error());

if ($result_appln && $result_applnt) {

    info('message', 'New application saved!');
    header('Location: add_new_appln.php');
} else {

    info('error', 'Cannot save, Please try again.');
    header('Location: add_new_appln.php');
}
?>
