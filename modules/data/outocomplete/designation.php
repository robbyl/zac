<?php

require '../../../config/config.php';
require '../../../functions/general_functions.php';
?>

<?php

$person_id = clean($_POST['person_id']);

//$person_id = 'CHK004002';

if (!empty($person_id) && isset($person_id)) {
    $query_org_person = "SELECT `OrganisationPersonID`, `Designation`
                           FROM tblgenorganisationpeople
                          WHERE OrganisationPersonID = '$person_id'";

    $result_org_person = mysql_query($query_org_person) or die(mysql_error());

    $person = mysql_fetch_array($result_org_person);

    echo $person['Designation'];
}
?>
