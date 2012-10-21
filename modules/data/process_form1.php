<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$form_no = clean($_POST['form_no']);

// Geting form-data for data-section A data-set CD
//$some = clean($_POST['some']);
// Geting form-data for data-section B data-set HP
$hp1_male_younger = clean_arr($_POST['hp1_male_younger']);
$hp1_female_younger = clean_arr($_POST['hp1_female_younger']);
$hp1_male_older = clean_arr($_POST['hp1_male_older']);
$hp1_female_older = clean_arr($_POST['hp1_female_older']);

$hp2_male_younger = clean_arr($_POST['hp2_male_younger']);
$hp2_female_younger = clean_arr($_POST['hp2_female_younger']);
$hp2_male_older = clean_arr($_POST['hp2_male_older']);
$hp2_female_older = clean_arr($_POST['hp2_female_older']);

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

$mc2_tshs = clean($_POST['mc2_tshs']);

$mc3_money = $_POST['mc3_money'];

$mc4_tshs = clean($_POST['mc4_tshs']);

$mc5_activity = $_POST['mc5_activity'];

/* ########################### END SECTION F ############################### */

// Geting form approval details
$some = clean($_POST['some']);


$query_ans = "INSERT INTO tblzhafigures
                          (`FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`, 
                          `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`, 
                          `ZhaFigureValue`)
                         
                   VALUES ('$form_no', 'HP1', 'EHP', 'OSC', 'Y25', 'MAL', '$hp1_male_younger[0]')";
?>
<?php if(!empty($hp1_female_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp1_female_younger[0]. "')";  } ?>
<?php if(!empty($hp1_male_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'MAL', '" .$hp1_male_older[0]. "')";  } ?>
<?php if(!empty($hp1_female_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'FEM', '" .$hp1_female_older[0]. "')";  } ?>
<?php if(!empty($hp1_male_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp1_male_younger[1]. "')";  } ?>
<?php if(!empty($hp1_female_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp1_female_younger[1]. "')";  } ?>
<?php if(!empty($hp1_male_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'MAL', '" .$hp1_male_older[1]. "')";  } ?>
<?php if(!empty($hp1_female_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'FEM', '" .$hp1_female_older[1]. "')";  } ?>
<?php if(!empty($hp1_male_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp1_male_younger[2]. "')";  } ?>
<?php if(!empty($hp1_female_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp1_female_younger[2]. "')";  } ?>
<?php if(!empty($hp1_male_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'MAL', '" .$hp1_male_older[2]. "')";  } ?>
<?php if(!empty($hp1_female_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'FEM', '" .$hp1_female_older[2]. "')";  } ?>
<?php if(!empty($hp1_male_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp1_male_younger[3]. "')";  } ?>
<?php if(!empty($hp1_female_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp1_female_younger[3]. "')";  } ?>
<?php if(!empty($hp1_male_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'MAL', '" .$hp1_male_older[3]. "')";  } ?>
<?php if(!empty($hp1_female_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'FEM', '" .$hp1_female_older[3]. "')";  } ?>
<?php if(!empty($hp1_male_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp1_male_younger[4]. "')";  } ?>
<?php if(!empty($hp1_female_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp1_female_younger[4]. "')";  } ?>
<?php if(!empty($hp1_male_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'MAL', '" .$hp1_male_older[4]. "')";  } ?>
<?php if(!empty($hp1_female_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', 'EHP', 'OSC', '25O', 'FEM', '" .$hp1_female_older[4]. "')";  } ?>

<?php if(!empty($hp2_male_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[0]. "')";  } ?>
<?php if(!empty($hp2_female_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[0]. "')";  } ?>
<?php if(!empty($hp2_male_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[0]. "')";  } ?>
<?php if(!empty($hp2_female_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[0]. "')";  } ?>
<?php if(!empty($hp2_male_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[1]. "')";  } ?>
<?php if(!empty($hp2_female_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[1]. "')";  } ?>
<?php if(!empty($hp2_male_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[1]. "')";  } ?>
<?php if(!empty($hp2_female_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[1]. "')";  } ?>
<?php if(!empty($hp2_male_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[2]. "')";  } ?>
<?php if(!empty($hp2_female_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[2]. "')";  } ?>
<?php if(!empty($hp2_male_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[2]. "')";  } ?>
<?php if(!empty($hp2_female_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[2]. "')";  } ?>
<?php if(!empty($hp2_male_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[3]. "')";  } ?>
<?php if(!empty($hp2_female_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[3]. "')";  } ?>
<?php if(!empty($hp2_male_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[3]. "')";  } ?>
<?php if(!empty($hp2_female_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[3]. "')";  } ?>
<?php if(!empty($hp2_male_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[4]. "')";  } ?>
<?php if(!empty($hp2_female_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[4]. "')";  } ?>
<?php if(!empty($hp2_male_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[4]. "')";  } ?>
<?php if(!empty($hp2_female_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[4]. "')";  } ?>
<?php if(!empty($hp2_male_younger[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'MAL', '" .$hp2_male_younger[5]. "')";  } ?>
<?php if(!empty($hp2_female_younger[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', 'Y25', 'FEM', '" .$hp2_female_younger[5]. "')";  } ?>
<?php if(!empty($hp2_male_older[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'MAL', '" .$hp2_male_older[5]. "')";  } ?>
<?php if(!empty($hp2_female_older[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', 'EHP', 'OSC', '25O', 'FEM', '" .$hp2_female_older[5]. "')";  } ?>

<?php if(!empty($hp3_radio_hrs)){ $query_ans .= ",('" . $form_no . "', 'HP3', 'RAD', '', '', '', '" .$hp3_radio_hrs. "')";  } ?>
<?php if(!empty($hp3_tv_hrs)){ $query_ans .= ",('" . $form_no . "', 'HP3', 'TV', '', '', '', '" .$hp3_tv_hrs. "')";  } ?>

<?php if(!empty($hp4_male_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'PRE', 'MAL', '', '" .$hp4_male_peer. "')";  } ?>
<?php if(!empty($hp4_female_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'PRE', 'FEM', '', '" .$hp4_female_peer. "')";  } ?>
<?php if(!empty($hp4_male_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'CME', 'MAL', '', '" .$hp4_male_community. "')";  } ?>
<?php if(!empty($hp4_female_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'CME', 'FEM', '', '" .$hp4_female_community. "')";  } ?>

<?php if(!empty($hp5_male_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'PRE', 'MAL', '', '" .$hp5_male_peer. "')";  } ?>
<?php if(!empty($hp5_female_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'PRE', 'FEM', '', '" .$hp5_female_peer. "')";  } ?>
<?php if(!empty($hp5_male_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'CME', 'MAL', '', '" .$hp5_male_community. "')";  } ?>
<?php if(!empty($hp5_female_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'CME', 'FEM', '', '" .$hp5_female_community. "')";  } ?>

<?php if(!empty($hp6_booklets)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'BKL', '', '', '', '" .$hp6_booklets. "')";  } ?>
<?php if(!empty($hp6_posters)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'POS', '', '', '', '" .$hp6_posters. "')";  } ?>
<?php // if(!empty($hp6_others)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'RAA', '', '', '', '" .$hp6_others. "')";  } ?>

<?php if(!empty($hp7_male_condoms)){ $query_ans .= ",('" . $form_no . "', 'HP7', 'MCD', '', '', '', '" .$hp7_male_condoms. "')";  } ?>
<?php if(!empty($hp7_female_condoms)){ $query_ans .= ",('" . $form_no . "', 'HP7', 'FCD', '', '', '', '" .$hp7_female_condoms. "')";  } ?>

<?php if(!empty($hp8_pep_male)){ $query_ans .= ",('" . $form_no . "', 'HP8', 'MAL', '', '', '', '" .$hp8_pep_male. "')";  } ?>
<?php if(!empty($hp8_pep_female)){ $query_ans .= ",('" . $form_no . "', 'HP8', 'FEM', '', '', '', '" .$hp8_pep_female. "')";  } ?>

<?php if(!empty($hp9_wkpl_male)){ $query_ans .= ",('" . $form_no . "', 'HP9', 'MAL', '', '', '', '" .$hp9_wkpl_male. "')";  } ?>
<?php if(!empty($hp9_wkpl_female)){ $query_ans .= ",('" . $form_no . "', 'HP9', 'FEM', '', '', '', '" .$hp9_wkpl_female. "')";  } ?>


<?php // FOR M1  ?>



<?php if(!empty($cs1_males)){ $query_ans .= ",('" . $form_no . "', 'CS1', 'MAL', '', '', '', '" .$cs1_males. "')";  } ?>
<?php if(!empty($cs1_females)){ $query_ans .= ",('" . $form_no . "', 'CS1', 'FEM', '', '', '', '" .$cs1_females. "')";  } ?>
                         
<?php if(!empty($cs2_person_visit)){ $query_ans .= ",('" . $form_no . "', 'CS2', '', '', '', '', '" .$cs2_person_visit. "')";  } ?>

<?php if(!empty($tc1_volunteers_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[0]. "')";  } ?>
<?php if(!empty($tc1_volunteers_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[0]. "')";  } ?>
<?php if(!empty($tc1_staff_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'PSF', 'MAL', '', '" .$tc1_staff_male[0]. "')";  } ?>
<?php if(!empty($tc1_staff_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'PSF', 'FEM', '', '" .$tc1_staff_female[0]. "')";  } ?>
<?php if(!empty($tc1_employees_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'NSF', 'MAL', '', '" .$tc1_employees_male[0]. "')";  } ?>
<?php if(!empty($tc1_employees_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '', 'NSF', 'FEM', '', '" .$tc1_employees_female[0]. "')";  } ?>



<?php echo $query_ans ?>
