<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_POST['lang']);
$form_no = clean($_POST['form_no']);
$month_range = clean($_POST['month_range']);
$year = clean($_POST['year']);

$exmonth_range = explode("/", $month_range);

$period_from = $year . '-' . $exmonth_range[0];
$period_to = $year . '-' . $exmonth_range[1];

// Geting form-data for data-section A data-set CD
$org_name = clean($_POST['org_name']);
$phy_addr = clean($_POST['phy_addr']);
$post_addr = clean($_POST['post_addr']);
$focal_per = clean($_POST['focal_per']);
$focal_tel = clean($_POST['focal_tel']);
$focal_fax = clean($_POST['focal_fax']);
$focal_email = clean($_POST['focal_email']);
$reg_no = clean($_POST['reg_no']);
$is_umbrella = clean($_POST['is_umbrella']);
$umbrella = clean($_POST['umbrella']);
$org_date = clean($_POST['org_date']);
$full_male = clean($_POST['full_male']);
$full_female = clean($_POST['full_female']);
$part_male = clean($_POST['part_male']);
$part_female = clean($_POST['part_female']);
$district = clean($_POST['district']);

/* ########################### END SECTION A ############################### */

// Geting form-data for data-section B data-set HP
$hiv_type = clean_arr($_POST['hiv_type']);
$most_risk = clean_arr($_POST['most_risk']);
$hp1_male_younger = clean_arr($_POST['hp1_male_younger']);
$hp1_female_younger = clean_arr($_POST['hp1_female_younger']);
$hp1_male_older = clean_arr($_POST['hp1_male_older']);
$hp1_female_older = clean_arr($_POST['hp1_female_older']);

$hiv_inter = clean_arr($_POST['hiv_inter']);
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
$m1_health_other = clean($_POST['m1_health_other']);
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
$m1_nutrition_other = clean($_POST['m1_nutrition_other']);
$m1_financial_chldn_male = clean($_POST['m1_financial_chldn_male']);
$m1_financial_chldn_female = clean($_POST['m1_financial_chldn_female']);
$m1_financial_elderly_male = clean($_POST['m1_financial_elderly_male']);
$m1_financial_elderly_female = clean($_POST['m1_financial_elderly_female']);
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

$mc6a = $_POST['mc6a'];
$mc6b = $_POST['mc6b'];
$mc6c = $_POST['mc6c'];
$mc6d = $_POST['mc6d'];
$mc6e = $_POST['mc6e'];
$mc6f = $_POST['mc6f'];
$mc6g = $_POST['mc6g'];
$mc6h = $_POST['mc6h'];

$me1a = $_POST['me1a'];
$me1b = $_POST['me1b'];
$me1c = $_POST['me1c'];

/* ########################### END SECTION F ############################### */

// Geting form approval details
$completed_by = clean($_POST['completed_by']);
$approved_by = clean($_POST['approved_by']);
$completed_date = clean($_POST['completed_date']);
$approved_date = clean($_POST['approved_date']);
$received_date = clean($_POST['received_date']);
$captured_date = clean($_POST['captured_date']);
$captured_by = clean($_POST['captured_by']);
$verified_date = clean($_POST['verified_date']);
$verified_by = clean($_POST['verified_by']);
$filed_date = clean($_POST['filed_date']);
$comments = clean($_POST['comments']);
$comments_zac = clean($_POST['comments_zac']);

/* ########################### END FORM APPROVAL ############################### */

$query_ans = "UPDATE tblzhafigures
                 SET `ZhaFigureValue` = CASE ";
 if(!empty($hp1_male_younger[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[0]' AND BreakdownTypeID2 = '$most_risk[0]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_younger[0] . "'"; }
 if(!empty($hp1_female_younger[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[0]' AND BreakdownTypeID2 = '$most_risk[0]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_younger[0]. "'";  } 
 if(!empty($hp1_male_older[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[0]' AND BreakdownTypeID2 = '$most_risk[0]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_older[0]. "'";  } 
 if(!empty($hp1_female_older[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[0]' AND BreakdownTypeID2 = '$most_risk[0]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_older[0]. "'";  }
 if(!empty($hp1_male_younger[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[1]' AND BreakdownTypeID2 = '$most_risk[1]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_younger[1]. "'";  }
 if(!empty($hp1_female_younger[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[1]' AND BreakdownTypeID2 = '$most_risk[1]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_younger[1]. "'"; } 
 if(!empty($hp1_male_older[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[1]' AND BreakdownTypeID2 = '$most_risk[1]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_older[1]. "'";  }
 if(!empty($hp1_female_older[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[1]' AND BreakdownTypeID2 = '$most_risk[1]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_older[1]. "'";  }
 if(!empty($hp1_male_younger[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[2]' AND BreakdownTypeID2 = '$most_risk[2]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_younger[2]. "'";  }
 if(!empty($hp1_female_younger[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[2]' AND BreakdownTypeID2 = '$most_risk[2]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_younger[2]. "'";} 
 if(!empty($hp1_male_older[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[2]' AND BreakdownTypeID2 = '$most_risk[2]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_older[2]. "'";  } 
 if(!empty($hp1_female_older[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[2]' AND BreakdownTypeID2 = '$most_risk[2]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_older[2]. "'";  } 
 if(!empty($hp1_male_younger[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[3]' AND BreakdownTypeID2 = '$most_risk[3]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_younger[3]. "'";  } 
 if(!empty($hp1_female_younger[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[3]' AND BreakdownTypeID2 = '$most_risk[3]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_younger[3]. "'";  } 
 if(!empty($hp1_male_older[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[3]' AND BreakdownTypeID2 = '$most_risk[3]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_older[3]. "'";  } 
 if(!empty($hp1_female_older[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[3]' AND BreakdownTypeID2 = '$most_risk[3]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_older[3]. "'";  } 
 if(!empty($hp1_male_younger[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[4]' AND BreakdownTypeID2 = '$most_risk[4]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_younger[4]. "'";  } 
 if(!empty($hp1_female_younger[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[4]' AND BreakdownTypeID2 = '$most_risk[4]' AND BreakdownTypeID3 = 'Y25' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_younger[4]. "'";  } 
 if(!empty($hp1_male_older[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[4]' AND BreakdownTypeID2 = '$most_risk[4]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'MAL' THEN '" .$hp1_male_older[4]. "'";  } 
 if(!empty($hp1_female_older[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP1' AND BreakdownTypeID1 = '$hiv_type[4]' AND BreakdownTypeID2 = '$most_risk[4]' AND BreakdownTypeID3 = '25O' AND BreakdownTypeID4 = 'FEM' THEN '" .$hp1_female_older[4]. "'";  } 

 if(!empty($hp2_male_younger[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[0]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[0]. "'";  } 
 if(!empty($hp2_female_younger[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[0]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[0]. "'";  } 
 if(!empty($hp2_male_older[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[0]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[0]. "'";  } 
 if(!empty($hp2_female_older[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[0]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[0]. "'";  } 
 if(!empty($hp2_male_younger[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[1]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[1]. "'";  } 
 if(!empty($hp2_female_younger[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[1]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[1]. "'";  } 
 if(!empty($hp2_male_older[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[1]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[1]. "'";  } 
 if(!empty($hp2_female_older[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[1]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[1]. "'";  } 
 if(!empty($hp2_male_younger[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[2]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[2]. "'";  } 
 if(!empty($hp2_female_younger[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[2]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[2]. "'";  } 
 if(!empty($hp2_male_older[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[2]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[2]. "'";  } 
 if(!empty($hp2_female_older[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[2]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[2]. "'";  } 
 if(!empty($hp2_male_younger[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[3]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[3]. "'";  } 
 if(!empty($hp2_female_younger[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[3]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[3]. "'";  } 
 if(!empty($hp2_male_older[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[3]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[3]. "'";  } 
 if(!empty($hp2_female_older[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[3]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[3]. "'";  } 
 if(!empty($hp2_male_younger[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[4]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[4]. "'";  } 
 if(!empty($hp2_female_younger[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[4]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[4]. "'";  } 
 if(!empty($hp2_male_older[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[4]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[4]. "'";  } 
 if(!empty($hp2_female_older[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[4]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[4]. "'";  } 
 if(!empty($hp2_male_younger[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[5]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_younger[5]. "'";  } 
 if(!empty($hp2_female_younger[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[5]' AND BreakdownTypeID2 = 'Y25' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_younger[5]. "'";  } 
 if(!empty($hp2_male_older[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[5]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp2_male_older[5]. "'";  } 
 if(!empty($hp2_female_older[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP2' AND BreakdownTypeID1 = '$hiv_inter[5]' AND BreakdownTypeID2 = '25O' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp2_female_older[5]. "'";  } 

 if(!empty($hp3_radio_hrs)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP3' AND BreakdownTypeID1 = 'RAD' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp3_radio_hrs. "'";  } 
 if(!empty($hp3_tv_hrs)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP3' AND BreakdownTypeID1 = 'TVN' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp3_tv_hrs. "'";  } 

 if(!empty($hp4_male_peer)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'REG' AND BreakdownTypeID2 = 'PRE' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp4_male_peer. "'";  } 
 if(!empty($hp4_female_peer)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'REG' AND BreakdownTypeID2 = 'PRE' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp4_female_peer. "'";  } 
 if(!empty($hp4_male_community)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'REG' AND BreakdownTypeID2 = 'CME' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp4_male_community. "'";  } 
 if(!empty($hp4_female_community)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'REG' AND BreakdownTypeID2 = 'CME' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp4_female_community. "'";  } 

 if(!empty($hp5_male_peer)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'RAA' AND BreakdownTypeID2 = 'PRE' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp5_male_peer. "'";  } 
 if(!empty($hp5_female_peer)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'RAA' AND BreakdownTypeID2 = 'PRE' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp5_female_peer. "'";  } 
 if(!empty($hp5_male_community)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'RAA' AND BreakdownTypeID2 = 'CME' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$hp5_male_community. "'";  } 
 if(!empty($hp5_female_community)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP4' AND BreakdownTypeID1 = 'RAA' AND BreakdownTypeID2 = 'CME' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$hp5_female_community. "'";  } 

 if(!empty($hp6_booklets)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP6' AND BreakdownTypeID1 = 'BKL' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp6_booklets. "'";  } 
 if(!empty($hp6_posters)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP6' AND BreakdownTypeID1 = 'POS' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp6_posters. "'";  } 
 if(!empty($hp6_others)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP6' AND BreakdownTypeID1 = 'RAA' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp6_others. "'";  } 

 if(!empty($hp7_male_condoms)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP7' AND BreakdownTypeID1 = 'MCD' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp7_male_condoms. "'";  } 
 if(!empty($hp7_female_condoms)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP7' AND BreakdownTypeID1 = 'FCD' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp7_female_condoms. "'";  } 

 if(!empty($hp8_pep_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP8' AND BreakdownTypeID1 = 'MAL' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp8_pep_male. "'";  } 
 if(!empty($hp8_pep_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP8' AND BreakdownTypeID1 = 'FEM' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp8_pep_female. "'";  } 

 if(!empty($hp9_wkpl_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP9' AND BreakdownTypeID1 = 'MAL' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp9_wkpl_male. "'";  } 
 if(!empty($hp9_wkpl_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'HP9' AND BreakdownTypeID1 = 'FEM' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$hp9_wkpl_female. "'";  } 

 if(!empty($m1_health_chldn_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_health_chldn_male. "'";  } 
 if(!empty($m1_health_chldn_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_health_chldn_female. "'";  } 
 if(!empty($m1_health_elderly_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_health_elderly_male. "'";  } 
 if(!empty($m1_health_elderly_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_health_elderly_female. "'";  } 
 if(!empty($m1_health_widows)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode =  'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'WID' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_health_widows. "'";  } 
 if(!empty($m1_health_vulnerable)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'VLH' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_health_vulnerable. "'";  } 
 if(!empty($m1_health_other)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'HCS' AND BreakdownTypeID2 = 'OVG' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_health_other. "'";  } 
 if(!empty($m1_emotional_chldn_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_chldn_male. "'";  } 
 if(!empty($m1_emotional_chldn_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_chldn_female. "'";  } 
 if(!empty($m1_emotional_elderly_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_elderly_male. "'";  } 
 if(!empty($m1_emotional_elderly_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_elderly_female. "'";  } 
 if(!empty($m1_emotional_widows)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'WID' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_widows. "'";  } 
 if(!empty($m1_emotional_vulnerable)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'VLH' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_vulnerable. "'";  } 
 if(!empty($m1_emotional_other)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'EMP' AND BreakdownTypeID2 = 'OVG' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_emotional_other. "'";  } 
 if(!empty($m1_nutrition_chldn_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_chldn_male. "'";  } 
 if(!empty($m1_nutrition_chldn_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_chldn_female. "'";  } 
 if(!empty($m1_nutrition_elderly_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_elderly_male. "'";  } 
 if(!empty($m1_nutrition_elderly_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_elderly_female. "'";  } 
 if(!empty($m1_nutrition_widows)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'WID' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_widows. "'";  } 
 if(!empty($m1_nutrition_vulnerable)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'VLH' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_vulnerable. "'";  } 
 if(!empty($m1_nutrition_other)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'NUT' AND BreakdownTypeID2 = 'OVG' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_nutrition_other. "'";  } 
 if(!empty($m1_financial_chldn_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_chldn_male. "'";  } 
 if(!empty($m1_financial_chldn_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_chldn_female. "'";  } 
 if(!empty($m1_financial_elderly_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_elderly_male. "'";  } 
 if(!empty($m1_financial_elderly_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'ELD' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_elderly_female. "'";  } 
 if(!empty($m1_financial_widows)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'WID' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_widows. "'";  } 
 if(!empty($m1_financial_vulnerable)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'VLH' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_vulnerable. "'";  } 
 if(!empty($m1_financial_other)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'FIN' AND BreakdownTypeID2 = 'OVG' AND BreakdownTypeID3 = 'TOT' AND BreakdownTypeID4 = '' THEN '" .$m1_financial_other. "'";  } 
 if(!empty($m1_school_chldn_male)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'SCH' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$m1_school_chldn_male. "'";  } 
 if(!empty($m1_school_chldn_female)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'M01' AND BreakdownTypeID1 = 'SCH' AND BreakdownTypeID2 = 'MVC' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$m1_school_chldn_female. "'";  } 

 if(!empty($cs1_males)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'CS1' AND BreakdownTypeID1 = 'MAL' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$cs1_males. "'";  } 
 if(!empty($cs1_females)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'CS1' AND BreakdownTypeID1 = 'FEM' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$cs1_females. "'";  } 
                    
 if(!empty($cs2_person_visit)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'CS2' AND BreakdownTypeID1 = '' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$cs2_person_visit. "'";  } 

 if(!empty($tc1_volunteers_male[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[0]. "'";  } 
 if(!empty($tc1_volunteers_female[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[0]. "'";  } 
 if(!empty($tc1_staff_male[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[0]. "'";  } 
 if(!empty($tc1_staff_female[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[0]. "'";  } 
 if(!empty($tc1_employees_male[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[0]. "'";  } 
 if(!empty($tc1_employees_female[0])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[0]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[0]. "'";  } 
 if(!empty($tc1_volunteers_male[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[1]. "'";  } 
 if(!empty($tc1_volunteers_female[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[1]. "'";  } 
 if(!empty($tc1_staff_male[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[1]. "'";  } 
 if(!empty($tc1_staff_female[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[1]. "'";  } 
 if(!empty($tc1_employees_male[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[1]. "'";  } 
 if(!empty($tc1_employees_female[1])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[1]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[1]. "'";  } 
 if(!empty($tc1_volunteers_male[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[2]. "'";  } 
 if(!empty($tc1_volunteers_female[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[2]. "'";  } 
 if(!empty($tc1_staff_male[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[2]. "'";  } 
 if(!empty($tc1_staff_female[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[2]. "'";  } 
 if(!empty($tc1_employees_male[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[2]. "'";  } 
 if(!empty($tc1_employees_female[2])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[2]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[2]. "'";  } 
 if(!empty($tc1_volunteers_male[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[3]. "'";  } 
 if(!empty($tc1_volunteers_female[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[3]. "'";  } 
 if(!empty($tc1_staff_male[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[3]. "'";  } 
 if(!empty($tc1_staff_female[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[3]. "'";  } 
 if(!empty($tc1_employees_male[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[3]. "'";  } 
 if(!empty($tc1_employees_female[3])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[3]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[3]. "'";  } 
 if(!empty($tc1_volunteers_male[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[4]. "'";  } 
 if(!empty($tc1_volunteers_female[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[4]. "'";  } 
 if(!empty($tc1_staff_male[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[4]. "'";  } 
 if(!empty($tc1_staff_female[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[4]. "'";  } 
 if(!empty($tc1_employees_male[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[4]. "'";  } 
 if(!empty($tc1_employees_female[4])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[4]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[4]. "'";  } 
 if(!empty($tc1_volunteers_male[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[5]. "'";  } 
 if(!empty($tc1_volunteers_female[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[5]. "'";  } 
 if(!empty($tc1_staff_male[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[5]. "'";  } 
 if(!empty($tc1_staff_female[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[5]. "'";  } 
 if(!empty($tc1_employees_male[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[5]. "'";  } 
 if(!empty($tc1_employees_female[5])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[5]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[5]. "'";  } 
 if(!empty($tc1_volunteers_male[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_male[6]. "'";  } 
 if(!empty($tc1_volunteers_female[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'VOL' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_volunteers_female[6]. "'";  } 
 if(!empty($tc1_staff_male[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_male[6]. "'";  } 
 if(!empty($tc1_staff_female[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'PSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_staff_female[6]. "'";  } 
 if(!empty($tc1_employees_male[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'MAL' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_male[6]. "'";  } 
 if(!empty($tc1_employees_female[6])){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC1' AND BreakdownTypeID1 = '$tc1_topic[6]' AND BreakdownTypeID2 = 'NSF' AND BreakdownTypeID3 = 'FEM' AND BreakdownTypeID4 = '' THEN '" .$tc1_employees_female[6]. "'";  } 

 if(!empty($tc2_community)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'TC2' AND BreakdownTypeID1 = '' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$tc2_community. "'"; }
 
 if(!empty($mc2_tshs)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'MC2' AND BreakdownTypeID1 = '' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$mc2_tshs. "'"; } 
 
 if(!empty($mc4_tshs)){ $query_ans .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaFigureCode = 'MC4' AND BreakdownTypeID1 = '' AND BreakdownTypeID2 = '' AND BreakdownTypeID3 = '' AND BreakdownTypeID4 = '' THEN '" .$mc4_tshs. "'"; }
 
 $query_ans .= " ELSE ZhaFigureValue END";
// $query_ans .= "WHERE FormSerialNumber AND ZhaFigureCode AND BreakdownTypeID1 IN ()";
// 
// echo $query_ans;
// exit;
 
  $result_ans = mysql_query($query_ans) or die(mysql_error());
  
  $query_ans = "";
  
  $query_ans = "INSERT IGNORE INTO tblzhafigures
                          (`FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`, 
                          `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`, 
                          `ZhaFigureValue`) 
                   VALUES ";
 if(!empty($hp1_male_younger[0])){ $query_ans .= "('" . $form_no . "', 'HP1', '$hiv_type[0]', '$most_risk[0]', 'Y25', 'MAL', '" .$hp1_male_younger[0] . "')"; }
 else { $query_ans .= "('', '', '', '', '', '', '')"; }
 if(!empty($hp1_female_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[0]', '$most_risk[0]', 'Y25', 'FEM', '" .$hp1_female_younger[0]. "')";  } 
 if(!empty($hp1_male_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[0]', '$most_risk[0]', '25O', 'MAL', '" .$hp1_male_older[0]. "')";  } 
 if(!empty($hp1_female_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[0]', '$most_risk[0]', '25O', 'FEM', '" .$hp1_female_older[0]. "')";  }
 if(!empty($hp1_male_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[1]', '$most_risk[1]', 'Y25', 'MAL', '" .$hp1_male_younger[1]. "')";  }
 if(!empty($hp1_female_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[1]', '$most_risk[1]', 'Y25', 'FEM', '" .$hp1_female_younger[1]. "')"; } 
 if(!empty($hp1_male_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[1]', '$most_risk[1]', '25O', 'MAL', '" .$hp1_male_older[1]. "')";  }
 if(!empty($hp1_female_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[1]', '$most_risk[1]', '25O', 'FEM', '" .$hp1_female_older[1]. "')";  }
 if(!empty($hp1_male_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[2]', '$most_risk[2]', 'Y25', 'MAL', '" .$hp1_male_younger[2]. "')";  }
 if(!empty($hp1_female_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[2]', '$most_risk[2]', 'Y25', 'FEM', '" .$hp1_female_younger[2]. "')";} 
 if(!empty($hp1_male_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[2]', '$most_risk[2]', '25O', 'MAL', '" .$hp1_male_older[2]. "')";  } 
 if(!empty($hp1_female_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[2]', '$most_risk[2]', '25O', 'FEM', '" .$hp1_female_older[2]. "')";  } 
 if(!empty($hp1_male_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[3]', '$most_risk[3]', 'Y25', 'MAL', '" .$hp1_male_younger[3]. "')";  } 
 if(!empty($hp1_female_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[3]', '$most_risk[3]', 'Y25', 'FEM', '" .$hp1_female_younger[3]. "')";  } 
 if(!empty($hp1_male_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[3]', '$most_risk[3]', '25O', 'MAL', '" .$hp1_male_older[3]. "')";  } 
 if(!empty($hp1_female_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[3]', '$most_risk[3]', '25O', 'FEM', '" .$hp1_female_older[3]. "')";  } 
 if(!empty($hp1_male_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[4]', '$most_risk[4]', 'Y25', 'MAL', '" .$hp1_male_younger[4]. "')";  } 
 if(!empty($hp1_female_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[4]', '$most_risk[4]', 'Y25', 'FEM', '" .$hp1_female_younger[4]. "')";  } 
 if(!empty($hp1_male_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[4]', '$most_risk[4]', '25O', 'MAL', '" .$hp1_male_older[4]. "')";  } 
 if(!empty($hp1_female_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP1', '$hiv_type[4]', '$most_risk[4]', '25O', 'FEM', '" .$hp1_female_older[4]. "')";  } 

 if(!empty($hp2_male_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[0]', 'Y25', 'MAL', '', '" .$hp2_male_younger[0]. "')";  } 
 if(!empty($hp2_female_younger[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[0]', 'Y25', 'FEM', '', '" .$hp2_female_younger[0]. "')";  } 
 if(!empty($hp2_male_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[0]', '25O', 'MAL', '', '" .$hp2_male_older[0]. "')";  } 
 if(!empty($hp2_female_older[0])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[0]', '25O', 'FEM', '', '" .$hp2_female_older[0]. "')";  } 
 if(!empty($hp2_male_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[1]', 'Y25', 'MAL', '', '" .$hp2_male_younger[1]. "')";  } 
 if(!empty($hp2_female_younger[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[1]', 'Y25', 'FEM', '', '" .$hp2_female_younger[1]. "')";  } 
 if(!empty($hp2_male_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[1]', '25O', 'MAL', '', '" .$hp2_male_older[1]. "')";  } 
 if(!empty($hp2_female_older[1])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[1]', '25O', 'FEM', '', '" .$hp2_female_older[1]. "')";  } 
 if(!empty($hp2_male_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[2]', 'Y25', 'MAL', '', '" .$hp2_male_younger[2]. "')";  } 
 if(!empty($hp2_female_younger[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[2]', 'Y25', 'FEM', '', '" .$hp2_female_younger[2]. "')";  } 
 if(!empty($hp2_male_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[2]', '25O', 'MAL', '', '" .$hp2_male_older[2]. "')";  } 
 if(!empty($hp2_female_older[2])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[2]', '25O', 'FEM', '', '" .$hp2_female_older[2]. "')";  } 
 if(!empty($hp2_male_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[3]', 'Y25', 'MAL', '', '" .$hp2_male_younger[3]. "')";  } 
 if(!empty($hp2_female_younger[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[3]', 'Y25', 'FEM', '', '" .$hp2_female_younger[3]. "')";  } 
 if(!empty($hp2_male_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[3]', '25O', 'MAL', '', '" .$hp2_male_older[3]. "')";  } 
 if(!empty($hp2_female_older[3])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[3]', '25O', 'FEM', '', '" .$hp2_female_older[3]. "')";  } 
 if(!empty($hp2_male_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[4]', 'Y25', 'MAL', '', '" .$hp2_male_younger[4]. "')";  } 
 if(!empty($hp2_female_younger[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[4]', 'Y25', 'FEM', '', '" .$hp2_female_younger[4]. "')";  } 
 if(!empty($hp2_male_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[4]', '25O', 'MAL', '', '" .$hp2_male_older[4]. "')";  } 
 if(!empty($hp2_female_older[4])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[4]', '25O', 'FEM', '', '" .$hp2_female_older[4]. "')";  } 
 if(!empty($hp2_male_younger[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[5]', 'Y25', 'MAL', '', '" .$hp2_male_younger[5]. "')";  } 
 if(!empty($hp2_female_younger[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[5]', 'Y25', 'FEM', '', '" .$hp2_female_younger[5]. "')";  } 
 if(!empty($hp2_male_older[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[5]', '25O', 'MAL', '', '" .$hp2_male_older[5]. "')";  } 
 if(!empty($hp2_female_older[5])){ $query_ans .= ",('" . $form_no . "', 'HP2', '$hiv_inter[5]', '25O', 'FEM', '', '" .$hp2_female_older[5]. "')";  } 

 if(!empty($hp3_radio_hrs)){ $query_ans .= ",('" . $form_no . "', 'HP3', 'RAD', '', '', '', '" .$hp3_radio_hrs. "')";  } 
 if(!empty($hp3_tv_hrs)){ $query_ans .= ",('" . $form_no . "', 'HP3', 'TVN', '', '', '', '" .$hp3_tv_hrs. "')";  } 

 if(!empty($hp4_male_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'PRE', 'MAL', '', '" .$hp4_male_peer. "')";  } 
 if(!empty($hp4_female_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'PRE', 'FEM', '', '" .$hp4_female_peer. "')";  } 
 if(!empty($hp4_male_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'CME', 'MAL', '', '" .$hp4_male_community. "')";  } 
 if(!empty($hp4_female_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'REG', 'CME', 'FEM', '', '" .$hp4_female_community. "')";  } 

 if(!empty($hp5_male_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'PRE', 'MAL', '', '" .$hp5_male_peer. "')";  } 
 if(!empty($hp5_female_peer)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'PRE', 'FEM', '', '" .$hp5_female_peer. "')";  } 
 if(!empty($hp5_male_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'CME', 'MAL', '', '" .$hp5_male_community. "')";  } 
 if(!empty($hp5_female_community)){ $query_ans .= ",('" . $form_no . "', 'HP4', 'RAA', 'CME', 'FEM', '', '" .$hp5_female_community. "')";  } 

 if(!empty($hp6_booklets)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'BKL', '', '', '', '" .$hp6_booklets. "')";  } 
 if(!empty($hp6_posters)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'POS', '', '', '', '" .$hp6_posters. "')";  } 
 if(!empty($hp6_others)){ $query_ans .= ",('" . $form_no . "', 'HP6', 'RAA', '', '', '', '" .$hp6_others. "')";  } 

 if(!empty($hp7_male_condoms)){ $query_ans .= ",('" . $form_no . "', 'HP7', 'MCD', '', '', '', '" .$hp7_male_condoms. "')";  } 
 if(!empty($hp7_female_condoms)){ $query_ans .= ",('" . $form_no . "', 'HP7', 'FCD', '', '', '', '" .$hp7_female_condoms. "')";  } 

 if(!empty($hp8_pep_male)){ $query_ans .= ",('" . $form_no . "', 'HP8', 'MAL', '', '', '', '" .$hp8_pep_male. "')";  } 
 if(!empty($hp8_pep_female)){ $query_ans .= ",('" . $form_no . "', 'HP8', 'FEM', '', '', '', '" .$hp8_pep_female. "')";  } 

 if(!empty($hp9_wkpl_male)){ $query_ans .= ",('" . $form_no . "', 'HP9', 'MAL', '', '', '', '" .$hp9_wkpl_male. "')";  } 
 if(!empty($hp9_wkpl_female)){ $query_ans .= ",('" . $form_no . "', 'HP9', 'FEM', '', '', '', '" .$hp9_wkpl_female. "')";  } 

 if(!empty($m1_health_chldn_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'MVC', 'MAL', '', '" .$m1_health_chldn_male. "')";  } 
 if(!empty($m1_health_chldn_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'MVC', 'FEM', '', '" .$m1_health_chldn_female. "')";  } 
 if(!empty($m1_health_elderly_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'ELD', 'MAL', '', '" .$m1_health_elderly_male. "')";  } 
 if(!empty($m1_health_elderly_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'ELD', 'FEM', '', '" .$m1_health_elderly_female. "')";  } 
 if(!empty($m1_health_widows)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'WID', 'TOT', '', '" .$m1_health_widows. "')";  } 
 if(!empty($m1_health_vulnerable)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'VLH', 'TOT', '', '" .$m1_health_vulnerable. "')";  } 
 if(!empty($m1_health_other)){ $query_ans .= ",('" . $form_no . "', 'M01', 'HCS', 'OVG', 'TOT', '', '" .$m1_health_other. "')";  } 
 if(!empty($m1_emotional_chldn_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'MVC', 'MAL', '', '" .$m1_emotional_chldn_male. "')";  } 
 if(!empty($m1_emotional_chldn_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'MVC', 'FEM', '', '" .$m1_emotional_chldn_female. "')";  } 
 if(!empty($m1_emotional_elderly_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'ELD', 'MAL', '', '" .$m1_emotional_elderly_male. "')";  } 
 if(!empty($m1_emotional_elderly_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'ELD', 'FEM', '', '" .$m1_emotional_elderly_female. "')";  } 
 if(!empty($m1_emotional_widows)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'WID', 'TOT', '', '" .$m1_emotional_widows. "')";  } 
 if(!empty($m1_emotional_vulnerable)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'VLH', 'TOT', '', '" .$m1_emotional_vulnerable. "')";  } 
 if(!empty($m1_emotional_other)){ $query_ans .= ",('" . $form_no . "', 'M01', 'EMP', 'OVG', 'TOT', '', '" .$m1_emotional_other. "')";  } 
 if(!empty($m1_nutrition_chldn_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'MVC', 'MAL', '', '" .$m1_nutrition_chldn_male. "')";  } 
 if(!empty($m1_nutrition_chldn_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'MVC', 'FEM', '', '" .$m1_nutrition_chldn_female. "')";  } 
 if(!empty($m1_nutrition_elderly_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'ELD', 'MAL', '', '" .$m1_nutrition_elderly_male. "')";  } 
 if(!empty($m1_nutrition_elderly_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'ELD', 'FEM', '', '" .$m1_nutrition_elderly_female. "')";  } 
 if(!empty($m1_nutrition_widows)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'WID', 'TOT', '', '" .$m1_nutrition_widows. "')";  } 
 if(!empty($m1_nutrition_vulnerable)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'VLH', 'TOT', '', '" .$m1_nutrition_vulnerable. "')";  } 
 if(!empty($m1_nutrition_other)){ $query_ans .= ",('" . $form_no . "', 'M01', 'NUT', 'OVG', 'TOT', '', '" .$m1_nutrition_other. "')";  } 
 if(!empty($m1_financial_chldn_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'MVC', 'MAL', '', '" .$m1_financial_chldn_male. "')";  } 
 if(!empty($m1_financial_chldn_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'MVC', 'FEM', '', '" .$m1_financial_chldn_female. "')";  } 
 if(!empty($m1_financial_elderly_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'ELD', 'MAL', '', '" .$m1_financial_elderly_male. "')";  } 
 if(!empty($m1_financial_elderly_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'ELD', 'FEM', '', '" .$m1_financial_elderly_female. "')";  } 
 if(!empty($m1_financial_widows)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'WID', 'TOT', '', '" .$m1_financial_widows. "')";  } 
 if(!empty($m1_financial_vulnerable)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'VLH', 'TOT', '', '" .$m1_financial_vulnerable. "')";  } 
 if(!empty($m1_financial_other)){ $query_ans .= ",('" . $form_no . "', 'M01', 'FIN', 'OVG', 'TOT', '', '" .$m1_financial_other. "')";  } 
 if(!empty($m1_school_chldn_male)){ $query_ans .= ",('" . $form_no . "', 'M01', 'SCH', 'MVC', 'MAL', '', '" .$m1_school_chldn_male. "')";  } 
 if(!empty($m1_school_chldn_female)){ $query_ans .= ",('" . $form_no . "', 'M01', 'SCH', 'MVC', 'FEM', '', '" .$m1_school_chldn_female. "')";  } 

 if(!empty($cs1_males)){ $query_ans .= ",('" . $form_no . "', 'CS1', 'MAL', '', '', '', '" .$cs1_males. "')";  } 
 if(!empty($cs1_females)){ $query_ans .= ",('" . $form_no . "', 'CS1', 'FEM', '', '', '', '" .$cs1_females. "')";  } 
                    
 if(!empty($cs2_person_visit)){ $query_ans .= ",('" . $form_no . "', 'CS2', '', '', '', '', '" .$cs2_person_visit. "')";  } 

 if(!empty($tc1_volunteers_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[0]. "')";  } 
 if(!empty($tc1_volunteers_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[0]. "')";  } 
 if(!empty($tc1_staff_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'PSF', 'MAL', '', '" .$tc1_staff_male[0]. "')";  } 
 if(!empty($tc1_staff_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'PSF', 'FEM', '', '" .$tc1_staff_female[0]. "')";  } 
 if(!empty($tc1_employees_male[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'NSF', 'MAL', '', '" .$tc1_employees_male[0]. "')";  } 
 if(!empty($tc1_employees_female[0])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[0]', 'NSF', 'FEM', '', '" .$tc1_employees_female[0]. "')";  } 
 if(!empty($tc1_volunteers_male[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[1]. "')";  } 
 if(!empty($tc1_volunteers_female[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[1]. "')";  } 
 if(!empty($tc1_staff_male[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'PSF', 'MAL', '', '" .$tc1_staff_male[1]. "')";  } 
 if(!empty($tc1_staff_female[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'PSF', 'FEM', '', '" .$tc1_staff_female[1]. "')";  } 
 if(!empty($tc1_employees_male[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'NSF', 'MAL', '', '" .$tc1_employees_male[1]. "')";  } 
 if(!empty($tc1_employees_female[1])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[1]', 'NSF', 'FEM', '', '" .$tc1_employees_female[1]. "')";  } 
 if(!empty($tc1_volunteers_male[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[2]. "')";  } 
 if(!empty($tc1_volunteers_female[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[2]. "')";  } 
 if(!empty($tc1_staff_male[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'PSF', 'MAL', '', '" .$tc1_staff_male[2]. "')";  } 
 if(!empty($tc1_staff_female[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'PSF', 'FEM', '', '" .$tc1_staff_female[2]. "')";  } 
 if(!empty($tc1_employees_male[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'NSF', 'MAL', '', '" .$tc1_employees_male[2]. "')";  } 
 if(!empty($tc1_employees_female[2])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[2]', 'NSF', 'FEM', '', '" .$tc1_employees_female[2]. "')";  } 
 if(!empty($tc1_volunteers_male[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[3]. "')";  } 
 if(!empty($tc1_volunteers_female[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[3]. "')";  } 
 if(!empty($tc1_staff_male[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'PSF', 'MAL', '', '" .$tc1_staff_male[3]. "')";  } 
 if(!empty($tc1_staff_female[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'PSF', 'FEM', '', '" .$tc1_staff_female[3]. "')";  } 
 if(!empty($tc1_employees_male[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'NSF', 'MAL', '', '" .$tc1_employees_male[3]. "')";  } 
 if(!empty($tc1_employees_female[3])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[3]', 'NSF', 'FEM', '', '" .$tc1_employees_female[3]. "')";  } 
 if(!empty($tc1_volunteers_male[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[4]. "')";  } 
 if(!empty($tc1_volunteers_female[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[4]. "')";  } 
 if(!empty($tc1_staff_male[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'PSF', 'MAL', '', '" .$tc1_staff_male[4]. "')";  } 
 if(!empty($tc1_staff_female[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'PSF', 'FEM', '', '" .$tc1_staff_female[4]. "')";  } 
 if(!empty($tc1_employees_male[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'NSF', 'MAL', '', '" .$tc1_employees_male[4]. "')";  } 
 if(!empty($tc1_employees_female[4])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[4]', 'NSF', 'FEM', '', '" .$tc1_employees_female[4]. "')";  } 
 if(!empty($tc1_volunteers_male[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[5]. "')";  } 
 if(!empty($tc1_volunteers_female[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[5]. "')";  } 
 if(!empty($tc1_staff_male[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'PSF', 'MAL', '', '" .$tc1_staff_male[5]. "')";  } 
 if(!empty($tc1_staff_female[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'PSF', 'FEM', '', '" .$tc1_staff_female[5]. "')";  } 
 if(!empty($tc1_employees_male[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'NSF', 'MAL', '', '" .$tc1_employees_male[5]. "')";  } 
 if(!empty($tc1_employees_female[5])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[5]', 'NSF', 'FEM', '', '" .$tc1_employees_female[5]. "')";  } 
 if(!empty($tc1_volunteers_male[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'VOL', 'MAL', '', '" .$tc1_volunteers_male[6]. "')";  } 
 if(!empty($tc1_volunteers_female[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'VOL', 'FEM', '', '" .$tc1_volunteers_female[6]. "')";  } 
 if(!empty($tc1_staff_male[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'PSF', 'MAL', '', '" .$tc1_staff_male[6]. "')";  } 
 if(!empty($tc1_staff_female[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'PSF', 'FEM', '', '" .$tc1_staff_female[6]. "')";  } 
 if(!empty($tc1_employees_male[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'NSF', 'MAL', '', '" .$tc1_employees_male[6]. "')";  } 
 if(!empty($tc1_employees_female[6])){ $query_ans .= ",('" . $form_no . "', 'TC1', '$tc1_topic[6]', 'NSF', 'FEM', '', '" .$tc1_employees_female[6]. "')";  } 

 if(!empty($tc2_community)){ $query_ans .= ",('" . $form_no . "', 'TC2', '', '', '', '', '" .$tc2_community. "')"; }
 
 if(!empty($mc2_tshs)){ $query_ans .= ",('" . $form_no . "', 'MC2', '', '', '', '', '" .$mc2_tshs. "')"; } 
 
 if(!empty($mc4_tshs)){ $query_ans .= ",('" . $form_no . "', 'MC4', '', '', '', '', '" .$mc4_tshs. "')"; } 
 
// echo $query_ans;
// exit;
 
 $result_ans = mysql_query($query_ans) or die(mysql_error());

 $query_ansm = "UPDATE tblzhaanswers
                   SET `ZhaAnswer` = CASE";
 if(!empty($mc1_mngmnt)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC1' THEN '" . $mc1_mngmnt . "'"; }
 else { $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC1' THEN ZhaAnswer";  }

 if(!empty($mc3_money)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC3' THEN '" . $mc3_money . "'"; }
 
 if(!empty($mc5_activity)){ $query_ansm .= " WHEN FormSerialNumber = '" .$form_no . "' AND ZhaQuestionCode = 'MC5' THEN '" . $mc5_activity . "'"; } 
 
 if(!empty($mc6a)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6a' THEN '" . $mc6a . "'"; } 
 if(!empty($mc6b)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6b' THEN '" . $mc6b . "'"; } 
 if(!empty($mc6c)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6c' THEN '" . $mc6c . "'"; } 
 if(!empty($mc6d)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6d' THEN '" . $mc6d . "'"; } 
 if(!empty($mc6e)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6e' THEN '" . $mc6e . "'"; } 
 if(!empty($mc6f)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6f' THEN '" . $mc6f . "'"; } 
 if(!empty($mc6g)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6g' THEN '" . $mc6g . "'"; } 
 if(!empty($mc6h)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'MC6h' THEN '" . $mc6h . "'"; } 
 
 if(!empty($me1a)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'ME1a' THEN '" . $me1a . "'"; } 

 $query_ansm .= " ELSE ZhaAnswer END, ZhaAnswerDate = CASE ";
  if(!empty($me1b)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'ME1b' THEN '" . $me1b . "'"; }
  
   $query_ansm .= " ELSE ZhaAnswerDate END, ZhaAnswerText = CASE ";
   if(!empty($me1c)){ $query_ansm .= " WHEN FormSerialNumber = '" . $form_no . "' AND ZhaQuestionCode = 'ME1c' THEN '" . $me1c . "'"; }
   
   $query_ansm .= " ELSE ZhaAnswerText END";

 
// echo $query_ansm;
// 
// exit;
 
 $result_ansm = mysql_query($query_ansm) or die(mysql_error());

$query_ansm = "";
 
$query_ansm = "INSERT IGNORE INTO tblzhaanswers
                           (`FormSerialNumber`, `ZhaQuestionCode`, `ZhaAnswer`, `ZhaAnswerText`, `ZhaAnswerDate`)
                    VALUES ";
 if(!empty($mc1_mngmnt)){ $query_ansm .= "('$form_no', 'MC1', '$mc1_mngmnt', '', '')"; } else { $query_ansm .= "('', '', '', '', '')"; }

 if(!empty($mc3_money)){ $query_ansm .= ",('" . $form_no . "', 'MC3', '" . $mc3_money . "', '', '')"; }
 
 if(!empty($mc5_activity)){ $query_ansm .= ",('" .$form_no . "', 'MC5', '" . $mc5_activity . "', '', '')"; } 
 
 if(!empty($mc6a)){ $query_ansm .= ",('" . $form_no . "', 'MC6a', '" . $mc6a . "', '', '')"; } 
 if(!empty($mc6b)){ $query_ansm .= ",('" . $form_no . "', 'MC6b', '" . $mc6b . "', '', '')"; } 
 if(!empty($mc6c)){ $query_ansm .= ",('" . $form_no . "', 'MC6c', '" . $mc6c . "', '', '')"; } 
 if(!empty($mc6d)){ $query_ansm .= ",('" . $form_no . "', 'MC6d', '" . $mc6d . "', '', '')"; } 
 if(!empty($mc6e)){ $query_ansm .= ",('" . $form_no . "', 'MC6e', '" . $mc6e . "', '', '')"; } 
 if(!empty($mc6f)){ $query_ansm .= ",('" . $form_no . "', 'MC6f', '" . $mc6f . "', '', '')"; } 
 if(!empty($mc6g)){ $query_ansm .= ",('" . $form_no . "', 'MC6g', '" . $mc6g . "', '', '')"; } 
 if(!empty($mc6h)){ $query_ansm .= ",('" . $form_no . "', 'MC6h', '" . $mc6h . "', '', '')"; } 
 
 if(!empty($me1a)){ $query_ansm .= ",('" . $form_no . "', 'ME1a', '" . $me1a . "', '', '')"; } 
 if(!empty($me1b)){ $query_ansm .= ",('" . $form_no . "', 'ME1b', '', '', '" . $me1b . "')"; } 
 if(!empty($me1c)){ $query_ansm .= ",('" . $form_no . "', 'ME1c', '', '" . $me1c . "', '')"; } 
 
 
 $result_ansm = mysql_query($query_ansm) or die(mysql_error());
 
 
 $query_submitted = "UPDATE tblzhaformssubmitted
                        SET `OrganisationCode` = '$reg_no', 
                            `DistrictCode` = '$district',
                            `PeriodFrom` = '$period_from',
                            `PeriodTo` = '$period_to', 
                            `CompletedByPersonID` = '$completed_by', 
                            `DateCompleted` = '$completed_date',
                            `ApprovedByPersonID` = '$approved_by',
                            `DateApproved` = '$approved_date',
                            `DateReceived` = '$received_date',
                            `DateCaptured` = '$captured_date',
                            `CapturedByUserID` = '$captured_by',
                            `DateFiled` = '$filed_date',
                            `VerifiedByUserID` = '$verified_by',
                            `DateVerified` = '$verified_date',
                            `NotesWrittenOnForm` = '$comments',
                            `DataEntryNotes` = '$comments_zac'
                      WHERE `FormSerialNumber` = '$form_no'";
 
 $result_submitted = mysql_query($query_submitted) or die(mysql_error());
 
 if($result_ans && $result_ansm && $result_submitted){
     info('message', 'Form updated successully!');
     header("Location: edit_form1.php?form_id=" . $form_no . "&lang=" . $lang);
 }  else {
     info('error', 'Cannot update. Please try again!');
     header("Location: edit_form1.php?form_id=" . $form_no . "&lang=" . $lang);
}
 
 ?>