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

// Geting form-data for data-section A data-set A
$sch_name = clean($_POST['sch_name']);
$phy_addr = clean($_POST['phy_addr']);
$post_addr = clean($_POST['post_addr']);
$district = clean($_POST['district']);
$focal_per = clean($_POST['focal_per']);
$focal_tel = clean($_POST['focal_tel']);
$focal_fax = clean($_POST['focal_fax']);
$focal_email = clean($_POST['focal_email']);
$school_type = clean($_POST['school_type']);
$std_male = clean($_POST['std_male']);
$std_female = clean($_POST['std_female']);
$school_owner = clean($_POST['school_owner']);


/* ########################### END SECTION A ############################### */

// Geting form-data for data-section B data-set B
$b1_males = clean($_POST['b1_males']);
$b1_females = clean($_POST['b1_females']);

$b2_males = clean($_POST['b2_males']);
$b2_females = clean($_POST['b2_females']);

$b3_males = clean($_POST['b3_males']);
$b3_females = clean($_POST['b3_females']);

$b4_males = clean($_POST['b4_males']);
$b4_females = clean($_POST['b4_females']);

$b5_males = clean($_POST['b5_males']);
$b5_females = clean($_POST['b5_females']);

$b6_hiv_related = clean($_POST['b6_hiv_related']);

$b7_youth_club = clean($_POST['b7_youth_club']);

/* ########################### END SECTION B ############################### */

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


$query_ans = "INSERT INTO tblzhafigures
                          (`FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`, 
                          `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`, 
                          `ZhaFigureValue`)
                   VALUES (";
 if(!empty($b1_males)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b1_males . "')"; }
 if(!empty($b1_females)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b1_females . "')"; }
 
 if(!empty($b2_males)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b2_males . "')"; }
 if(!empty($b2_females)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b2_females . "')"; }
 
 if(!empty($b3_males)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b3_males . "')"; }
 if(!empty($b3_females)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b3_females . "')"; }
 
 if(!empty($b4_males)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b4_males . "')"; }
 if(!empty($b4_females)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b4_females . "')"; }
 
 if(!empty($b5_males)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b5_males . "')"; }
 if(!empty($b5_females)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b5_females . "')"; }
 
 if(!empty($b6_hiv_related)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b6_hiv_related . "')"; }
 
  if(!empty($b7_youth_club)){ $query_ans .= "'" . $form_no . "', 'B01', 'MAL', '', '', '', '" . $b7_youth_club . "')"; }
 
 

$query_submitted = "INSERT INTO tblzhaformssubmitted
                                 (`FormSerialNumber`, `OrganisationCode`, `DistrictCode`,
                                  `PeriodFrom`, `PeriodTo`, `CompletedByPersonID`, `DateCompleted`,
                                  `ApprovedByPersonID`, `DateApproved`, `DateReceived`, `DateCaptured`,
                                  `CapturedByUserID`, `DateFiled`, `VerifiedByUserID`, `DateVerified`,
                                  `NotesWrittenOnForm`, `DataEntryNotes`)
                          VALUES ('$form_no', '$reg_no', '$district',
                                  '$period_from', '$period_to', '$completed_by', '$completed_date',
                                  '$approved_by', '$approved_date', '$received_date', '$captured_date',
                                  '$captured_by', '$filed_date', '$verified_by', '$verified_date',
                                  '$comments', '$comments_zac')";

$result_submitted = mysql_query($query_submitted) or die(mysql_error());

if ($result_submitted) {
    info('message', 'Form saved successully!');
    header("Location: form2.php?lang=" . $lang);
} else {
    info('error', 'Cannot save. Please try again!');
    header("Location: form2.php?lang=" . $lang);
}
?>
