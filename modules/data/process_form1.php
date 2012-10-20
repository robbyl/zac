<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

// Geting form-data for data-section A data-set CD
//$some = clean($_POST['some']);
// Geting form-data for data-section B data-set HP
$hp1_male_younger = clean_arr($_POST['hp1_male_younger']);
$hp1_female_younger = clean_arr($_POST['hp1_female_younger']);
$hp1_male_older = clean_arr($_POST['hp1_male_older']);
$hp1_female_older = clean_arr($_POST['hp1_female_older']);
$num_hp1 = count($hp1_female_younger);

$hp2_male_younger = clean_arr($_POST['hp2_male_younger']);
$hp2_female_younger = clean_arr($_POST['hp2_female_younger']);
$hp2_male_older = clean_arr($_POST['hp2_male_older']);
$hp2_female_older = clean_arr($_POST['hp2_female_older']);
$num_hp2 = count($hp2_female_younger);

$hp3_radio_hrs = clean($_POST['hp3_radio_hrs']);
$hp3_tv_hrs = clean($_POST['hp3_tv_hrs']);

$hp4_male_peer = clean($_POST['hp4_male_peer']);
$hp4_female_peer = clean($_POST['hp4_female_peer']);
$hp4_male_community = clean($_POST['hp4_male_community']);
$hp4_female_community = clean($_POST['hp4_female_community']);

$hp5_male_peer = clean($_POST['hp5_male_peer']);
$hp5_female_peer = clean($_POST['hp5_female_peer']);
$hp5_male_community = clean($_POST['hp5_male_community']);
$hp5_female_community = clean($_POST['hp5_female_community']);

echo $hp5_male_peer . '<br>';
echo $hp5_female_peer . '<br>';
echo $hp5_male_community . '<br>';
echo $hp5_female_community . '<br>';

exit;


// Geting form-data for data-section C data-set M
$some = clean($_POST['some']);

// Geting form-data for data-section D data-set CS
$some = clean($_POST['some']);

// Geting form-data for data-section E data-set TC
$some = clean($_POST['some']);

// Geting form-data for data-section F data-set MC
$some = clean($_POST['some']);

// Geting form-data for data-section F data-set ME
$some = clean($_POST['some']);
?>
