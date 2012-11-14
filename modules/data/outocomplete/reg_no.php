<?php

require '../../../config/config.php';
require '../../../functions/general_functions.php';

$abbr = clean($_POST['abbr']);

if (isset($abbr) && !empty($abbr)) {

    $abbr = $abbr . '%';

    $query_org = "SELECT MAX(`OrganisationCode`) AS lastCode
                    FROM `tblgenorganisations`
                    WHERE `OrganisationCode` LIKE '$abbr'";

    $result_org = mysql_query($query_org) or die(mysql_error());

    $code = mysql_fetch_array($result_org);
    $subabbr = substr($code['lastCode'], 3);
    if($subabbr > 1){
    $newCode = ++$subabbr;
    echo sprintf('%03d', $newCode);
    }  else {
        echo '001';
    }
}
?>
