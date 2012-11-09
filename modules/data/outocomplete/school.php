<?php
require '../../../config/config.php';
require '../../../functions/general_functions.php';

$school_id = clean($_GET['school_id']);

if(isset($school_id) && !empty($school_id)){
    
    $query_school = "SELECT org.`OrganisationCode`, `PhysicalAddress`, `PostalAddress`,
                            zms.`FullName` AS zhamos_person, hiv.`FullName` AS hiv_person,
                            org.`Phone`, org.`Fax`, org.`Email`
                       FROM tblgenorganisations org
                  LEFT JOIN tblgenorganisationpeople zms
                         ON zms.`OrganisationPersonID` = org.`ZHAPMoSFocalPersonID`
                  LEFT JOIN tblgenorganisationpeople hiv
                         ON hiv.`OrganisationPersonID` = org.`HIVFocalPersonID`";
    
    $result_school = mysql_query($query_school) or die(mysql_error());
}


?>
