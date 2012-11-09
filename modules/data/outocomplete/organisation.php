<?php

require '../../../config/config.php';
require '../../../functions/general_functions.php';

$org_id = clean($_POST['org_id']);

if (isset($org_id) && !empty($org_id)) {

    $query_school = "SELECT org.`OrganisationCode`, `PhysicalAddress`, org.`PostalAddress`,
                            zms.`FullName` AS zhamos_person, hiv.`FullName` AS hiv_person,
                            zms.`Phone`, zms.`Fax`, zms.`Email`, `DistrictCode`,
                            DATE(`StartedOperating`) AS StartedOperating
                       FROM tblgenorganisations org
                  LEFT JOIN tblgenorganisationpeople zms
                         ON zms.`OrganisationPersonID` = org.`ZHAPMoSFocalPersonID`
                  LEFT JOIN tblgenorganisationpeople hiv
                         ON hiv.`OrganisationPersonID` = org.`HIVFocalPersonID`
                  LEFT JOIN tblgensetupdistricts dis
                         ON SUBSTR(org.`OrganisationCode`, 1, 3) = dis.DistrictAbb
                      WHERE org.`OrganisationCode` = '$org_id'";

    $result_school = mysql_query($query_school) or die(mysql_error());

    $org = mysql_fetch_array($result_school);

    $organisation["PhysicalAddress"] = $org["PhysicalAddress"];
    $organisation["PostalAddress"] = $org["PostalAddress"];
    $organisation["DistrictCode"] = $org["DistrictCode"];
    $organisation["zhamos_person"] = $org["zhamos_person"];
    $organisation["Phone"] = $org["Phone"];
    $organisation["Fax"] = $org["Fax"];
    $organisation["Email"] = $org["Email"];
    $organisation["StartedOperating"] = $org["StartedOperating"];

    $query_people = "SELECT `OrganisationPersonID`, `OrganisationCode`, `FullName`, `Designation`
                       FROM tblgenorganisationpeople
                      WHERE `OrganisationCode` = '$org_id'";

    $result_people = mysql_query($query_people) or die(mysql_error());

    $options = "<select>";

    while ($people = mysql_fetch_array($result_people)) {

        $options .= '<option value="' . $people['OrganisationPersonID'] . '">' . $people['FullName'] . '</option>';
        $persons[$people['OrganisationPersonID']] = $people['Designation'];
    }

    $options .= '</select>';

//    $query_ans = "SELECT `FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`,
//                         `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`,
//                         `ZhaFigureValue`
//                    FROM tblzhafigures
//                   WHERE `FormSerialNumber` = '$form_id'";
//
//    $result_ans = mysql_query($query_ans) or die(mysql_error());
//
//    while ($ans = mysql_fetch_array($result_ans)) {
//
//        $fig_ans[$ans['ZhaFigureCode']][$ans['BreakdownTypeID1']][$ans['BreakdownTypeID2']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']] = $ans['ZhaFigureValue'];
//    }

    $organisation['selection'] = $persons;
    $organisation['selection'] = $options;

    echo json_encode($organisation);
}
?>
