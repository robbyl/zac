<?php

require '../../config/config.php';

$query_org = "SELECT `OrganisationName`, `OrganisationCode`, `PostalAddress`, `Phone`, `Fax`, `Email`,
                     DATE(`StartedOperating`) AS StartDAte, `OrganisationGroup`, `OrganisationCategoryDescription`
                FROM tblgenorganisations org
           LEFT JOIN tblgensetuporganisationcategories cat
                  ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`";

$result_org = mysql_query($query_org) or die(mysql_error());

$groups = array();
while ($data = mysql_fetch_assoc($result_org)) {
    $groups[$data['OrganisationCategoryDescription']][] = $data;
}



echo '<table border="1">';

$total = 0;

foreach ($groups as $OrganisationCategoryDescription => $OrganisationCode) {

    echo '<tr><th colspan="6">' . $OrganisationCategoryDescription . '</th></tr>';
    echo '<tr>';
    echo '<th>Code</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>Contacts</th>';
    echo '<th>Started Operating</th>';
    echo '<th>Umbrella Organisations</th>';
    echo '</tr>';

    $num_org = 0;

    foreach ($OrganisationCode as $data) {

        echo '<tr>';
        echo '<td>' . $data['OrganisationCode'] . '</td>';
        echo '<td>' . $data['OrganisationName'] . '</td>';
        echo '<td>' . $data['PostalAddress'] . '</td>';
        echo '<td> Tel: ' . $data['Phone'] . '<br> Fax: ' . $data['Fax'] . '</td>';
        echo '<td>' . $data['StartDAte'] . '</td>';
        echo '<td>' . $data['StartDAte'] . '</td>';
        echo '</tr>';
        $total++;
        $num_org++;
    }

    echo'<tr><td colspan="6" align="right">organisation total ' . $num_org . '</td><tr>';
}

echo '</table>';

echo 'Total forms ' . $total;
?>
