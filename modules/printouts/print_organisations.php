<?php

$query_org = "SELECT `OrganisationName`, `OrganisationCode`, `PostalAddress`,
                     `StartedOperating`, `OrganisationGroup`, `OrganisationCategoryDescription`
                FROM tblgenorganisations org
           LEFT JOIN tblgensetuporganisationcategories cat
                  ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`";

?>
