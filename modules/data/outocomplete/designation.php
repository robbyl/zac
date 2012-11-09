<?php 
require '../../../config/config.php';
require '../../../functions/general_functions.php';
?>

<?php
//$org_id = clean($_POST['org_id']);

$org_id = 'CHK004002';

if (!empty($org_id) && isset($org_id)) {
    $query_org_person = "SELECT `OrganisationPersonID`, `Designation`
                       FROM tblgenorganisationpeople
                      WHERE OrganisationPersonID = '$org_id'";
                          
    $result_org_person = mysql_query($query_org_person) or die(mysql_error());
    
    $person = mysql_fetch_array($result_org_person);
    
    echo $person['Designation'];
}
?>
