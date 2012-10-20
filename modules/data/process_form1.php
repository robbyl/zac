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

$hp6_booklets = clean($_POST['hp6_booklets']);
$hp6_posters = clean($_POST['hp6_posters']);
$hp6_others = clean($_POST['hp6_others']);

$hp7_male_condoms = clean($_POST['hp7_male_condoms']);
$hp7_female_condoms = clean($_POST['hp7_female_condoms']);

$hp8_pep_male = clean($_POST['hp8_pep_male']);
$hp8_pep_female = clean($_POST['hp8_pep_female']);

$hp9_wkpl_male = clean($_POST['hp9_wkpl_male']);
$hp9_wkpl_female = clean($_POST['hp9_wkpl_female']);

/* ########################### END SECTION B ############################### */


// Geting form-data for data-section C data-set M
$m1_health_chldn_male = clean($_POST['m1_health_chldn_male']);
$m1_health_chldn_female = clean($_POST['m1_health_chldn_female']);
$m1_health_elderly_male = clean($_POST['m1_health_elderly_male']);
$m1_health_elderly_female = clean($_POST['m1_health_elderly_female']);
$m1_health_widows = clean($_POST['m1_health_widows']);
$m1_health_vulnerable = clean($_POST['m1_health_vulnerable']);
$m1_emotional_chldn_male = clean($_POST['m1_emotional_chldn_male']);
$m1_emotional_chldn_female = clean($_POST['m1_emotional_chldn_female']);
$m1_emotional_elderly_male = clean($_POST['m1_emotional_elderly_male']);
$m1_emotional_elderly_female = clean($_POST['m1_emotional_elderly_female']);
$m1_emotional_widows = clean($_POST['m1_emotional_widows']);
$m1_emotional_vulnerable = clean($_POST['m1_emotional_vulnerable']);
$m1_emotional_other = clean($_POST['m1_emotional_other']);
$m1_nutrition_chldn_male = clean($_POST['m1_nutrition_chldn_male']);
$m1_nutrition_chldn_female = clean($_POST['m1_nutrition_chldn_female']);
$m1_nutrition_elderly_male = clean($_POST['m1_nutrition_elderly_male']);
$m1_nutrition_elderly_female = clean($_POST['m1_nutrition_elderly_female']);
$m1_nutrition_widows = clean($_POST['m1_nutrition_widows']);
$m1_nutrition_vulnerable = clean($_POST['m1_nutrition_vulnerable']);
$m1_financial_chldn_male = clean($_POST['m1_financial_chldn_male']);
$m1_financial_chldn_female = clean($_POST['m1_financial_chldn_female']);
$m1_financial_elderyl_male = clean($_POST['m1_financial_elderyl_male']);
$m1_financial_elderyl_female = clean($_POST['m1_financial_elderyl_female']);
$m1_financial_widows = clean($_POST['m1_financial_widows']);
$m1_financial_vulnerable = clean($_POST['m1_financial_vulnerable']);
$m1_financial_other = clean($_POST['m1_financial_other']);
$m1_school_chldn_male = clean($_POST['m1_school_chldn_male']);
$m1_school_chldn_female = clean($_POST['m1_school_chldn_female']);

/* ########################### END SECTION C ############################### */


// Geting form-data for data-section D data-set CS
$cs1_males = clean($_POST['cs1_males']);
$cs1_females = clean($_POST['cs1_females']);

$cs2_person_visit = clean($_POST['cs2_person_visit']);

/* ########################### END SECTION D ############################### */


// Geting form-data for data-section E data-set TC
$tc1_topic = clean_arr($_POST['tc1_topic']);
$tc1_volunteers_male = clean_arr($_POST['tc1_volunteers_male']);
$tc1_volunteers_female = clean_arr($_POST['tc1_volunteers_female']);
$tc1_staff_male = clean_arr($_POST['tc1_staff_male']);
$tc1_staff_female = clean_arr($_POST['tc1_staff_female']);
$tc1_employees_male = clean_arr($_POST['tc1_employees_male']);
$tc1_employees_female = clean_arr($_POST['tc1_employees_female']);

$tc2_community = clean($_POST['tc2_community']);

/* ########################### END SECTION E ############################### */


// Geting form-data for data-section F data-set MC
$mc1_mngmnt = $_POST['mc1_mngmnt'];

$mc2_tshs = $_POST['mc2_tshs'];

$mc3_money = $_POST['mc3_money'];

$mc4_tshs = $_POST['mc4_tshs'];

$mc5_activity = $_POST['mc5_activity'];

/* ########################### END SECTION F ############################### */

// Geting form approval details
$some = clean($_POST['some']);
?>
