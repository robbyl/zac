<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$headquarters = clean($_POST['headquarters']);
$org_code = clean($_POST['org_code']);
$org_name = clean($_POST['org_name']);
$org_cat = clean($_POST['org_cat']);
$phy_address = clean($_POST['phy_address']);
$post_address = clean($_POST['post_address']);
$org_phone = clean($_POST['org_phone']);
$org_fax = clean($_POST['org_fax']);
$org_email = clean($_POST['org_email']);
//$ZHAPMoS_reporter = clean($_POST['ZHAPMoS_reporter']);
$hiv_focal = $_POST['hiv_focal'];
$org_start_date = clean($_POST['org_start_date']);
$person_code = clean_arr($_POST['person_code']);
$person_name = clean_arr($_POST['person_name']);
$designation = clean_arr($_POST['designation']);
$person_phone = clean_arr($_POST['person_phone']);
$person_fax = clean_arr($_POST['person_fax']);
$person_email = clean_arr($_POST['person_email']);
$metthaz = clean_arr($_POST['metthaz']);
$still = clean_arr($_POST['still']);

$org_name = strtoupper($org_name);
$phy_address = strtoupper($phy_address);
$post_address = strtoupper($post_address);
$n = count($person_name);

$query_organisation = "UPDATE tblgenorganisations
                          SET `OrganisationName` = '$org_name',
                              `OrganisationCategoryID` = '$org_cat',
                              `PhysicalAddress` = '$phy_address',
                              `PostalAddress` = '$post_address',
                              `Phone` = '$org_phone',
                              `Fax` = '$org_fax',
                              `Email` = '$org_email',
                              `ZHAPMoSFocalPersonID` = '$hiv_focal[0]',
                              `HIVFocalPersonID` = '$hiv_focal[1]', 
                              `StartedOperating` = '$org_start_date'
                        WHERE `OrganisationCode` = '$org_code'";

$result_organisation = mysql_query($query_organisation) or die(mysql_error());

for ($i = 0; $i < $n; $i++) {

    $query_persons = "UPDATE tblgenorganisationpeople
                         SET `FullName` = '$person_name[$i]',
                             `Designation` = '$designation[$i]',
                             `Phone` = '$person_phone[$i]',
                             `Fax` = '$person_fax[$i]',
                             `Email` = '$person_email[$i]',
                             `METTHAZ` = '$metthaz[$i]',
                             `StillAtOrganisation` = '$still[$i]'
                       WHERE `OrganisationPersonID` = '$person_code[$i]'";

    $result_persons = mysql_query($query_persons) or die(mysql_error());
}

for ($i = 0; $i < $n; $i++) {

    $query_persons = "INSERT IGNORE INTO tblgenorganisationpeople
                              (`OrganisationPersonID`, `OrganisationCode`, `FullName`, `Designation`,
                               `Phone`, `Fax`, `Email`, `METTHAZ`, `StillAtOrganisation`)
                       VALUES ('$person_code[$i]', '$org_code', '$person_name[$i]', '$designation[$i]',
                               '$person_phone[$i]', '$person_fax[$i]', '$person_email[$i]', '$metthaz[$i]', '$still[$i]')";

    $result_persons = mysql_query($query_persons) or die(mysql_error());
}

foreach (clean_arr($_POST['umbrella']) as $umbrella) {

    $query_umbrella = "UPDATE tblgenorganisationsumbrella
                          SET `UmbrellaOrganisationCode` =  '$umbrella'
                        WHERE `OrganisationCode` = '$org_code'";

    $result_umbrella = mysql_query($query_umbrella) or die(mysql_error());
}

foreach (clean_arr($_POST['umbrella']) as $umbrella) {

    $query_umbrella = "INSERT IGNORE INTO tblgenorganisationsumbrella
                                  (`OrganisationCode`, `UmbrellaOrganisationCode`)
                           VALUES ('$org_code', '$umbrella')";

    $result_umbrella = mysql_query($query_umbrella) or die(mysql_error());
}

if ($result_organisation) {
    info('message', "Organisation updated successfully!");
    header("Location: edit_organisation.php?org_id=" . $org_code);
} else {
    info('error', 'Cannot update organisation. Please try again!');
    header("Location: edit_organisation.php?org_id=" . $org_code);
}
?>
