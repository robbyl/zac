<?php

include '../../config/config.php';
error_reporting(0);

$query = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                  `OrganisationGroup`,
                  SUM(`ZhaFigureValue`) AS total
            FROM `tblzhafigures` fig
      INNER JOIN `tblzhasetupfigurebreakdowntypes` typ
              ON fig.`BreakdownTypeID1` = typ.`BreakdownTypeID`
      INNER JOIN tblzhaformssubmitted sub
              ON fig.`FormSerialNumber` = sub.`FormSerialNumber`
      INNER JOIN `tblgenorganisations` org
              ON sub.`OrganisationCode` = org.`OrganisationCode`
      INNER JOIN `tblgensetuporganisationcategories` cat
              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
           WHERE `BreakdownCategoryID` = 'HVI'
        GROUP BY `BreakdownTypeID`, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
    $totalValue[$row['ZhaFigureCode']][$row['BreakdownTypeID']][$row['OrganisationGroup']] = $row['total'];
    $breackdownType[$row['ZhaFigureCode']][] = $row['BreakdownTypeID'];
    $organisationCategory[$row['BreakdownTypeID']] = $row['BreakdownTypeDescription'];
}

$query_rist = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                  `OrganisationGroup`, BreakdownTypeID4,
                  SUM(`ZhaFigureValue`) AS total
            FROM `tblzhafigures` fig
      INNER JOIN `tblzhasetupfigurebreakdowntypes` typ
              ON fig.`BreakdownTypeID2` = typ.`BreakdownTypeID`
      INNER JOIN tblzhaformssubmitted sub
              ON fig.`FormSerialNumber` = sub.`FormSerialNumber`
      INNER JOIN `tblgenorganisations` org
              ON sub.`OrganisationCode` = org.`OrganisationCode`
      INNER JOIN `tblgensetuporganisationcategories` cat
              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
           WHERE `BreakdownCategoryID` = 'MRV'
        GROUP BY `BreakdownTypeID`, BreakdownTypeID4, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$result_risk = mysql_query($query_rist) or die(mysql_error());

while ($row_risk = mysql_fetch_array($result_risk)) {
    $totalValueRisk[$row_risk['ZhaFigureCode']][$row_risk['BreakdownTypeID']][$row_risk['OrganisationGroup']][$row_risk['BreakdownTypeID4']] = $row_risk['total'];
    $breackdownTypeRisk[$row_risk['ZhaFigureCode']][] = $row_risk['BreakdownTypeID'];
    $organisationCategoryRisk[$row_risk['BreakdownTypeID']] = $row_risk['BreakdownTypeDescription'];
}

//echo $value['HP1']['CAH']['Government'];
echo '<table border="1">';
echo '<tr>';
echo '<th>Type of intervertions</th>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';

foreach (array_unique($breackdownType['HP1']) as $value) {

    echo '<tr>';
    echo'<td>' . $organisationCategory[$value] . '</td>';
    echo '<td>' . $totalValue['HP1'][$value]['CSOs'] . '</td>';
    echo '<td>' . $totalValue['HP1'][$value]['Private Sector'] . '</td>';
    echo '<td>' . $totalValue['HP1'][$value]['Government'] . '</td>';
    echo '<td>' . $totalValue['HP1'][$value]['SHACCOMs'] . '</td>';
    echo '</tr>';
}
echo '<table>';

echo '<br>';

echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Type of intervertions</th>';
echo '<th colspan="3">CSOs</th>';
echo '<th colspan="3">Private Sector</th>';
echo '<th colspan="3">Government</th>';
echo '<th colspan="3">SHACCOMs</th>';
echo '<th colspan="3">TOTAL</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '</tr>';

foreach (array_unique($breackdownTypeRisk['HP1']) as $valueRisk) {

    echo '<tr>';
    echo '<td>' . $organisationCategoryRisk[$valueRisk] . '</td>';
    echo '<td>' . $CSOsMAL = $totalValueRisk['HP1'][$valueRisk]['CSOs']['MAL'] . '</td>';
    echo '<td>' . $CSOsFEM = $totalValueRisk['HP1'][$valueRisk]['CSOs']['FEM'] . '</td>';
    echo '<td>' . $CSOsTOT = ($CSOsMAL + $CSOsFEM) . '</td>';
    echo '<td>' . $PrivateMAL = $totalValueRisk['HP1'][$valueRisk]['Private Sector']['MAL'] . '</td>';
    echo '<td>' . $PrivateFEM = $totalValueRisk['HP1'][$valueRisk]['Private Sector']['FEM'] . '</td>';
    echo '<td>' . $PrivateTOT = ($PrivateMAL + $PrivateFEM) . '</td>';
    echo '<td>' . $GovernmentMAL = $totalValueRisk['HP1'][$valueRisk]['Government']['MAL'] . '</td>';
    echo '<td>' . $GovernmentFEM = $totalValueRisk['HP1'][$valueRisk]['Government']['FEM'] . '</td>';
    echo '<td>' . $GovernmentTOT = ($GovernmentMAL + $GovernmentFEM) . '</td>';
    echo '<td>' . $SHACCOMsMAL = $totalValueRisk['HP1'][$valueRisk]['SHACCOMs']['MAL'] . '</td>';
    echo '<td>' . $SHACCOMsFEM = $totalValueRisk['HP1'][$valueRisk]['SHACCOMs']['FEM'] . '</td>';
    echo '<td>' . $SHACCOMsTOT = ($SHACCOMsMAL + $SHACCOMsFEM) . '</td>';
    echo '<td>' . ($CSOsMAL + $PrivateMAL + $GovernmentMAL + $SHACCOMsMAL) . '</td>';
    echo '<td>' . ($CSOsFEM + $PrivateFEM + $GovernmentFEM + $SHACCOMsFEM) . '</td>';
    echo '<td>' . ($CSOsTOT + $PrivateTOT + $GovernmentTOT + $SHACCOMsTOT) . '</td>';
    echo '</tr>';
}
echo '<table>';
?>
