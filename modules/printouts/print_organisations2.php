<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

require '../../config/config.php';

$query_org = "SELECT `OrganisationName`, org.`OrganisationCode`, `PhysicalAddress`,
                     `OrganisationGroup`, `OrganisationCategoryDescription`
                FROM tblgenorganisations org
          INNER JOIN tblgensetuporganisationcategories cat
                  ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
            ORDER BY OrganisationCategoryDescription ASC, OrganisationName ASC";

$result_org = mysql_query($query_org) or die(mysql_error());

$groups = array();
while ($data = mysql_fetch_assoc($result_org)) {
    $groups[$data['OrganisationCategoryDescription']][] = $data;
    
}

$query_submitted = "SELECT  org.`OrganisationCode`, DATE(`PeriodFrom`) AS PeriodFrom,
                            DATE(`PeriodTo`) AS PeriodTo, DATE(`DateReceived`) AS DateReceived
                      FROM tblgenorganisations org
                 LEFT JOIN tblzhaformssubmitted sub
                        ON org.`OrganisationCode` = sub.`OrganisationCode`
                     WHERE `PeriodFrom` BETWEEN '2007-07-01' AND '2008-07-01'";

$result_submitted = mysql_query($query_submitted) or die(mysql_error());

$received = array();

while ($submitted = mysql_fetch_array($result_submitted)) {
    $received[$submitted['OrganisationCode']][$submitted['PeriodFrom']] = $submitted['DateReceived'];
}

echo '<table border="1">';

$total = 0;

foreach ($groups as $OrganisationCategoryDescription => $OrganisationCode) {

    echo '<tr><th colspan="6">' . $OrganisationCategoryDescription . '</th></tr>';
    echo '<tr>';
    echo '<th>Code</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>Jul-Sep</th>';
    echo '<th>Oct-Dec</th>';
    echo '<th>Jan-Mar</th>';
    echo '<th>Apr-Jun</th>';
    echo '<th>Jan-Jul</th>';
    echo '</tr>';

    $num_org = 0;

    foreach ($OrganisationCode as $data) {

        echo '<tr>';
        echo '<td>' . $data['OrganisationCode'] . '</td>';
        echo '<td>' . $data['OrganisationName'] . '</td>';
        echo '<td>' . $data['PhysicalAddress'] . '</td>';
        echo '<td>' . $received[$data['OrganisationCode']]['2007-07-01'] . '</td>';
        echo '<td>' . $received[$data['OrganisationCode']]['2007-10-01'] . '</td>';
        echo '<td>' . $received[$data['OrganisationCode']]['2008-01-01'] . '</td>';
        echo '<td>' . $received[$data['OrganisationCode']]['2008-04-01'] . '</td>';
        echo '<td>' . $data['PhysicalAddress'] . '</td>';
        echo '</tr>';

        $total++;
        $num_org++;
    }

    echo'<tr><td colspan="6" align="right">organisation total ' . $num_org . '</td><tr>';
}

echo '</table>';

echo 'Total forms ' . $total;
?>
