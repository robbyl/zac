<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$lang = clean($_POST['lang']);

$org_name = clean($_POST['org_name']);
$phy_addr = clean($_POST['phy_addr']);
$post_addr = clean($_POST['post_addr']);
$focal_per = clean($_POST['focal_per']);
$focal_tel = clean($_POST['focal_tel']);
$focal_fax = clean($_POST['focal_fax']);
$focal_email = clean($_POST['focal_email']);
$gov = clean($_POST['gov']);
$dev_agency = clean($_POST['dev_agency']);
$ngo = clean($_POST['ngo']);
$faith = clean($_POST['faith']);
$other = clean($_POST['other']);
$plan_hiv_prevention = clean($_POST['plan_hiv_prevention']);
$plan_hiv_treatment = clean($_POST['plan_hiv_treatment']);
$plan_hiv_mitigation = clean($_POST['plan_hiv_mitigation']);
$plan_hiv_management = clean($_POST['plan_hiv_management']);
$plan_hiv_mne = clean($_POST['plan_hiv_mne']);
$actual_hiv_prevention = clean($_POST['actual_hiv_prevention']);
$actual_hiv_treatment = clean($_POST['actual_hiv_treatment']);
$actual_hiv_mitigation = clean($_POST['actual_hiv_mitigation']);
$actual_hiv_management = clean($_POST['actual_hiv_management']);
$actual_hiv_mne = clean($_POST['actual_hiv_mne']);

// Geting form approval details
$org_person = clean_arr(($_POST['org_person']));
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
                                  '$period_from', '$period_to', '$org_person[0]', '$completed_date',
                                  '$org_person[1]', '$approved_date', '$received_date', '$captured_date',
                                  '$captured_by', '$filed_date', '$verified_by', '$verified_date',
                                  '$comments', '$comments_zac')";

$result_submitted = mysql_query($query_submitted) or die(mysql_error());

if($result_submitted){

    info('message', 'Form saved successfully!');
    header("Location: form6.php?lang=" . $lang);
}else {
    
    info('error', 'Cannot add form, Please try again!!');
    header("Location: form6.php?lang=" . $lang);
}
?>
