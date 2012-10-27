<?php
require '../../config/config.php';

$query_org = "SELECT `OrganisationName`, `OrganisationCode`, `PostalAddress`,
                     `StartedOperating`, `OrganisationGroup`, `OrganisationCategoryDescription`
                FROM tblgenorganisations org
           LEFT JOIN tblgensetuporganisationcategories cat
                  ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`";

$result_org = mysql_query($query_org) or die(mysql_error());

$groups = array();
while ($data = mysql_fetch_assoc($result_org)) {
    $groups[$data['OrganisationCategoryDescription']][] = $data;
}

$total = 0;

echo '<table border="1">';
foreach ($groups as $OrganisationCategoryDescription => $OrganisationCode) {
    echo '<tr><th>' . $OrganisationCategoryDescription . '</th></tr>';
$num_org =0;
    foreach ($OrganisationCode as $data) {
        echo '<tr><td>' . $data['OrganisationCode'] . '</td><td>' . $data['OrganisationName'] . '</td></tr>';


//        $n = count($forms[$OrganisationGroup][$PeriodFrom]);
//        for ($i = 0; $i < $n; $i++) {
//            
//            echo '<tr><td>' . $forms[$OrganisationGroup][$PeriodFrom][$i] . '</td><tr>';
//            $total++;
//        }
        $total++;
        $num_org++;
    }
    
    echo'<tr><td colspan="2">organisation total ' . $num_org . '</td><tr>';
}

echo '</table>';

echo 'Total forms ' . $total;
?>
