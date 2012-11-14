<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$headquarters = clean($_POST['headquarters']);
$org_no = clean($_POST['org_code']);
$org_code = $headquarters . $org_no;
$org_name = clean($_POST['org_name']);
$org_cat = clean($_POST['org_cat']);
$phy_address = clean($_POST['phy_address']);
$post_address = clean($_POST['post_address']);
$org_phone = clean($_POST['org_phone']);
$org_fax = clean($_POST['org_fax']);
$org_email = clean($_POST['org_email']);
//$ZHAPMoS_reporter = clean($_POST['ZHAPMoS_reporter']);
$ZHAPMoS_person = clean($_POST['ZHAPMoS_person']);
$HIV_person = clean($_POST['HIV_person']);
$org_start_date = clean($_POST['org_start_date']);
$person_code = clean_arr($_POST['person_code']);
$person_name = clean_arr($_POST['person_name']);
$designation = clean_arr($_POST['designation']);
$person_phone = clean_arr($_POST['person_phone']);
$person_fax = clean_arr($_POST['person_fax']);
$person_email = clean_arr($_POST['person_email']);
$metthaz = clean_arr($_POST['metthaz']);
$still = '';

$org_name = strtoupper($org_name);
$phy_address = strtoupper($phy_address);
$post_address = strtoupper($post_address);

$n = count($person_name);

echo $org_code . '<br>';
echo $org_name . '<br>';
echo $org_cat . '<br>';
echo $phy_address . '<br>';
echo $post_address . '<br>';
echo $org_phone . '<br>';
echo $org_fax . '<br>';
echo $org_email . '<br>';
echo $ZHAPMoS_person . '<br>';
echo $HIV_person . '<br>';
echo $org_start_date . '<br>';

for ($i = 0; $i < $n; $i++) {

    echo $person_code[$i] . ' ';
    echo $person_name[$i] . ' ';
    echo $designation[$i] . ' ';
    echo $person_phone[$i] . ' ';
    echo $person_fax[$i] . ' ';
    echo $person_email[$i] . ' ';
    echo '<br>';
}

echo $metthaz[0] . '<br>';



$umbrella = '';

$query_organisation = "INSERT INTO tblgenorganisations
                                  (`OrganisationCode`, `OrganisationName`, `OrganisationCategoryID`,
                                   `PhysicalAddress`, `PostalAddress`, `Phone`, `Fax`, `Email`,
                                   `ZHAPMoSFocalPersonID`, `HIVFocalPersonID`, `StartedOperating`)
                           VALUES ('$org_code', '$org_name', '$org_cat',
                                   '$phy_address', '$post_address', '$org_phone', '$org_fax', '$org_email',
                                   '$ZHAPMoS_person', '$HIV_person', '$org_start_date')";

//$result_organisation = mysql_query($query_organisation) or die(mysql_error());

$p_code = 001;
for ($i = 0; $i < $n; $i++) {

    $p_code = sprintf('%03d', $p_code++);

    $person_code[$i] = $org_code . $p_code;
    
    echo $person_code[0];
    exit;

    $query_persons = "INSERT INTO tblgenorganisationpeople
                              (`OrganisationPersonID`, `OrganisationCode`, `FullName`, `Designation`,
                               `Phone`, `Fax`, `Email`, `METTHAZ`, `StillAtOrganisation`)
                       VALUES ('$person_code[$i]', '$org_code[$i]', '$person_name[$i]', '$designation[$i]',
                               '$person_phone[$i]', '$person_fax[$i]', '$person_email[$i]', '$metthaz[$i]', '$still[$i]')";

    $result_persons = mysql_query($query_persons) or die(mysql_error());
}
//$query_umbrella = "INSERT INTO tblgenorganisationsumbrella
//                               (`OrganisationCode`, `UmbrellaOrganisationCode`)
//                        VALUES ('$org_code', '$umbrella')";
//
//$result_umbrella = mysql_query($query_umbrella) or die(mysql_error());

if ($result_organisation) {
    info('message', "Organisation added successfully!");
    header("Location: new_organisation.php");
} else {
    info('error', 'Cannot add organisation. Please try again!');
    header("Location: new_organisation.php");
}
?>
