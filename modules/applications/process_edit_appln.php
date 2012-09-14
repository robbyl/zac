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

$appln_id = $_POST['appln_id'];
$appnt_id = $_POST['appnt_id'];
$appln_date = clean_arr($_POST['appln_date']);
$appln_type = clean_arr($_POST['appln_type']);
$surveyed_date = clean_arr($_POST['surveyed_date']);
$engeneer_appr = clean_arr($_POST['engeneer_appr']);
$approved_date = clean_arr($_POST['approved_date']);
$inspected_by = clean_arr($_POST['inspected_by']);
$premise_nature = clean_arr($_POST['premise_nature']);
$service_nature = clean_arr($_POST['service_nature']);
$appnt_type = clean_arr($_POST['appnt_type']);
$appnt_fullname = clean_arr($_POST['appnt_fullname']);
$occupants = clean_arr($_POST['occupants']);
$appnt_tel = clean_arr($_POST['appnt_tel']);
$appnt_post_addr = clean_arr($_POST['appnt_post_addr']);
$appnt_phy_addr = clean_arr($_POST['appnt_phy_addr']);
$block_no = clean_arr($_POST['block_no']);
$plot_no = clean_arr($_POST['plot_no']);
$living_area = clean_arr($_POST['living_area']);
$living_town = clean_arr($_POST['living_town']);
$tech_area = clean_arr($_POST['tech_area']);
$tech_zone = clean_arr($_POST['tech_zone']);

$appln_no = count($appln_id);

for ($i = 0; $i < $appln_no; $i++) {
    $query_appln = "UPDATE application
                       SET appln_date = '$appln_date[$i]',
                           appln_type = '$appln_type[$i]',
                           surveyed_date = '$surveyed_date[$i]',
                           engeneer_appr = '$engeneer_appr[$i]',
                           approved_date = '$approved_date[$i]',
                           inspected_by = '$inspected_by[$i]',
                           premise_nature = '$premise_nature[$i]',
                           service_nature_id = '$service_nature[$i]'
                     WHERE appln_id = '$appln_id[$i]'";

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
                           tech_area_id = '$tech_area[$i]',
                           tech_zone_id = '$tech_zone[$i]'
                     WHERE appnt_id = $appnt_id[$i]";

    $result_applnt = mysql_query($query_appnt) or die(mysql_error());
}

if ($result_applnt && $result_appln) {

    info('message', 'Updated successfully!');
    header('Location: applications.php');
} else {

    info('error', 'Cannot save, Please try again.');
    header('Location: applications.php');
}
?>
