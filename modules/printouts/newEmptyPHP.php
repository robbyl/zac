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
             AND ZhaFigureCode = 'HP1'
        GROUP BY `BreakdownTypeID`, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
    $totalValue[$row['ZhaFigureCode']][$row['BreakdownTypeID']][$row['OrganisationGroup']] = $row['total'];
    $breackdownType[$row['ZhaFigureCode']][] = $row['BreakdownTypeID'];
    $organisationCategory[$row['BreakdownTypeID']] = $row['BreakdownTypeDescription'];
}

$query_risk = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
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
             AND ZhaFigureCode = 'HP1'
        GROUP BY `BreakdownTypeID`, BreakdownTypeID4, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$result_risk = mysql_query($query_risk) or die(mysql_error());

while ($row_risk = mysql_fetch_array($result_risk)) {
    $totalValueRisk[$row_risk['ZhaFigureCode']][$row_risk['BreakdownTypeID']][$row_risk['OrganisationGroup']][$row_risk['BreakdownTypeID4']] = $row_risk['total'];
    $breackdownTypeRisk[$row_risk['ZhaFigureCode']][] = $row_risk['BreakdownTypeID'];
    $organisationCategoryRisk[$row_risk['BreakdownTypeID']] = $row_risk['BreakdownTypeDescription'];
}


$queryHP2 = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                  `OrganisationGroup`, BreakdownTypeID2,
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
             AND ZhaFigureCode = 'HP2'
        GROUP BY `BreakdownTypeID`, BreakdownTypeID3, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$resultHP2 = mysql_query($queryHP2) or die(mysql_error());

while ($rowHP2 = mysql_fetch_array($resultHP2)) {
    $totalValueHP2[$rowHP2['ZhaFigureCode']][$rowHP2['BreakdownTypeID']][$rowHP2['OrganisationGroup']][$rowHP2['BreakdownTypeID2']] = $rowHP2['total'];
    $breackdownTypeHP2[$rowHP2['ZhaFigureCode']][] = $rowHP2['BreakdownTypeID'];
    $organisationCategoryHP2[$rowHP2['BreakdownTypeID']] = $rowHP2['BreakdownTypeDescription'];
}

$queryHP3 = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `OrganisationGroup`,
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
        GROUP BY `BreakdownTypeID`, OrganisationGroup";

$resultHP3 = mysql_query($queryHP3) or die(mysql_error());

while ($rowHP3 = mysql_fetch_array($resultHP3)) {
    $totalValueHP3[$rowHP3['ZhaFigureCode']][$rowHP3['BreakdownTypeID']][$rowHP3['OrganisationGroup']] = $rowHP3['total'];
}

$queryHP4 = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, BreakdownTypeID1, `BreakdownTypeDescription`,
                  `OrganisationGroup`, BreakdownTypeID3,
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
           WHERE ZhaFigureCode = 'HP4'
        GROUP BY `BreakdownTypeID`,BreakdownTypeID1, BreakdownTypeID3, OrganisationGroup
        ORDER BY BreakdownTypeDescription ASC";

$resultHP4 = mysql_query($queryHP4) or die(mysql_error());

while ($rowHP4 = mysql_fetch_array($resultHP4)) {
    $totalValueRisk[$rowHP4['ZhaFigureCode']][$rowHP4['BreakdownTypeID']][$rowHP4['OrganisationGroup']][$rowHP4['BreakdownTypeID4']] = $rowHP4['total'];
    $breackdownTypeRisk[$rowHP4['ZhaFigureCode']][] = $rowHP4['BreakdownTypeID'];
    $organisationCategoryRisk[$rowHP4['BreakdownTypeID']] = $rowHP4['BreakdownTypeDescription'];
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
echo '<th rowspan="2">Name of Vulnerable or High Risk Group</th>';
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

echo '<br>';

echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Type of intervertions</th>';
echo '<th colspan="4">Younger than 25</th>';
echo '<th colspan="4">25 and Older</th>';
echo '</tr>';
echo '<tr>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';

foreach (array_unique($breackdownTypeHP2['HP2']) as $valueHP2) {
    echo '<tr>';
    echo '<td>' . $organisationCategoryHP2[$valueHP2] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['CSOs']['Y25'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['Private Sector']['Y25'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['']['Y25'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['SHACCOMs']['Y25'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['CSOs']['25O'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['Private Sector']['25O'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['Government']['25O'] . '</td>';
    echo '<td>' . $totalValueHP2['HP2'][$valueHP2]['SHACCOMs']['25O'] . '</td>';
    echo '</tr>';
}
echo '</table>';

echo '<br>';

echo 'Radio and TV';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="2">CSOs</th>';
echo '<th colspan="2">Private Sector</th>';
echo '<th colspan="2">Government</th>';
echo '<th colspan="2">SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>RADIO</td>';
echo '<td>TV</td>';
echo '<td>RADIO</td>';
echo '<td>TV</td>';
echo '<td>RADIO</td>';
echo '<td>TV</td>';
echo '<td>RADIO</td>';
echo '<td>TV</td>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueHP3['HP3']['RAD']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['TVN']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['RAD']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['TVN']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['RAD']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['TVN']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['RAD']['SHACCOMs'] . '</td>';
echo '<td>' . $totalValueHP3['HP3']['TVN']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'IEC Materials';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="4">Booklets</th>';
echo '<th colspan="4">Posters</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['SHACCOMs'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['POS']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['POS']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['POS']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['POS']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'IEC Materials';
echo '<table border="1">';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP6']['BKL']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'Condoms';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="4">Number of male condoms</th>';
echo '<th colspan="4">Number of female condoms</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueHP3['HP7']['MCD']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['MCD']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['MCD']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['MCD']['SHACCOMs'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['FCD']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['FCD']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['FCD']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['HP7']['FCD']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';
?>
