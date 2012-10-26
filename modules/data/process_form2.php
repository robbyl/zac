<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_POST['lang']);
$form_no = clean($_POST['form_no']);

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

$period_from = '2008-01-01';
$period_to = '2008-03-31';
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
?>
