<?php

require '../../config/config.php';
require '../../functions/general_functions.php';

$org_id = clean($_GET['org_id']);

if (isset($org_id) && !empty($org_id)) {
    $query_organisation = "DELETE org, umb, sub, fig, ans, pep
                             FROM `tblgenorganisations` org
                        LEFT JOIN tblgenorganisationpeople pep
                               ON org.`OrganisationCode` = pep.`OrganisationCode`
                        LEFT JOIN tblgenorganisationsumbrella umb
                               ON org.`OrganisationCode` = umb.`OrganisationCode`
                        LEFT JOIN tblzhaformssubmitted sub
                               ON org.`OrganisationCode` = sub.`OrganisationCode`
                        LEFT JOIN tblzhafigures fig
                               ON sub.`FormSerialNumber` = fig.`FormSerialNumber`
                        LEFT JOIN `tblzhaanswers` ans
                               ON sub.`FormSerialNumber` = ans.`FormSerialNumber`
                            WHERE org.OrganisationCode = '$org_id'";

    $result_organisation = mysql_query($query_organisation) or die(mysql_error());

    if ($result_organisation) {
        info('message', 'Organisation deleted successfully!');
        header('Location: organisations.php');
    } else {
        info('error', 'Cannot delete organisation. Please try again!');
        header('Location: organisations.php');
    }
}
?>
