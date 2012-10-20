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

echo $hp1_male_younger[0] . '<br>';
echo $hp1_female_younger[0] . '<br>';
echo $hp1_male_older[0] . '<br>';
echo $hp1_female_older[0] . '<br>';
echo $num_hp1 . '<br>';
echo $hp2_male_younger[0] . '<br>';
echo $hp2_female_younger[0] . '<br>';
echo $hp2_male_older[0] . '<br>';
echo $hp2_female_older[0] . '<br>';
echo $num_hp2 . '<br>';

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
