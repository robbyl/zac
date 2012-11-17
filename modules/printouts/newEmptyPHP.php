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
        GROUP BY `BreakdownTypeID`, BreakdownTypeID3,
                  OrganisationGroup, ZhaFigureCode
        ORDER BY BreakdownTypeDescription ASC";

$resultHP2 = mysql_query($queryHP2) or die(mysql_error());

while ($rowHP2 = mysql_fetch_array($resultHP2)) {
    $totalValueHP2[$rowHP2['ZhaFigureCode']][$rowHP2['BreakdownTypeID']][$rowHP2['OrganisationGroup']][$rowHP2['BreakdownTypeID2']] = $rowHP2['total'];
    $breackdownTypeHP2[$rowHP2['ZhaFigureCode']][] = $rowHP2['BreakdownTypeID'];
    $organisationCategoryHP2[$rowHP2['BreakdownTypeID']] = $rowHP2['BreakdownTypeDescription'];
}

$queryHP3 = "SELECT DISTINCT `ZhaFigureCode`, `BreakdownTypeID`, `OrganisationGroup`,
                    SUM(`ZhaFigureValue`) AS total
               FROM `tblzhafigures` fig
          LEFT JOIN `tblzhasetupfigurebreakdowntypes` typ
                 ON fig.`BreakdownTypeID1` = typ.`BreakdownTypeID`
         INNER JOIN tblzhaformssubmitted sub
                 ON fig.`FormSerialNumber` = sub.`FormSerialNumber`
         INNER JOIN `tblgenorganisations` org
                 ON sub.`OrganisationCode` = org.`OrganisationCode`
         INNER JOIN `tblgensetuporganisationcategories` cat
                 ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
              WHERE ZhaFigureCode = 'HP3'      
                 OR ZhaFigureCode = 'HP6'      
                 OR ZhaFigureCode = 'HP7'      
                 OR ZhaFigureCode = 'CS1'      
                 OR ZhaFigureCode = 'CS2'      
           GROUP BY `BreakdownTypeID`, OrganisationGroup, ZhaFigureCode";

$resultHP3 = mysql_query($queryHP3) or die(mysql_error());

while ($rowHP3 = mysql_fetch_array($resultHP3)) {
    $totalValueHP3[$rowHP3['ZhaFigureCode']][$rowHP3['BreakdownTypeID']][$rowHP3['OrganisationGroup']] = $rowHP3['total'];
}

$queryHP4 = "SELECT `ZhaFigureCode`, typ.`BreakdownTypeID`, BreakdownTypeID1, 
                   typ.`BreakdownTypeDescription`, typTC1.BreakdownTypeDescription AS BreakdownTypeDescriptionTC1,
                  `OrganisationGroup`, BreakdownTypeID3,
                  SUM(`ZhaFigureValue`) AS total
            FROM `tblzhafigures` fig
       LEFT JOIN `tblzhasetupfigurebreakdowntypes` typ
              ON fig.`BreakdownTypeID2` = typ.`BreakdownTypeID`
       LEFT JOIN `tblzhasetupfigurebreakdowntypes` typTC1
              ON fig.`BreakdownTypeID1` = typTC1.`BreakdownTypeID`
      INNER JOIN tblzhaformssubmitted sub
              ON fig.`FormSerialNumber` = sub.`FormSerialNumber`
      INNER JOIN `tblgenorganisations` org
              ON sub.`OrganisationCode` = org.`OrganisationCode`
      INNER JOIN `tblgensetuporganisationcategories` cat
              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
           WHERE ZhaFigureCode = 'HP4'
              OR ZhaFigureCode = 'HP8'
              OR ZhaFigureCode = 'HP9'
              OR ZhaFigureCode = 'M01'
              OR ZhaFigureCode = 'TC1'
              OR ZhaFigureCode = 'TC2'
              OR ZhaFigureCode = 'MC2'
              OR ZhaFigureCode = 'MC4'
              OR ZhaFigureCode = 'B01'
              OR ZhaFigureCode = 'B02'
              OR ZhaFigureCode = 'B03'
        GROUP BY `BreakdownTypeID`,BreakdownTypeID1, BreakdownTypeID3,
                 OrganisationGroup, ZhaFigureCode
        ORDER BY BreakdownTypeDescription ASC, BreakdownTypeDescriptionTC1 ASC";

$resultHP4 = mysql_query($queryHP4) or die(mysql_error());

while ($rowHP4 = mysql_fetch_array($resultHP4)) {
    $totalValueHP4[$rowHP4['ZhaFigureCode']][$rowHP4['BreakdownTypeID']][$rowHP4['BreakdownTypeID1']][$rowHP4['OrganisationGroup']][$rowHP4['BreakdownTypeID3']] = $rowHP4['total'];
    $breackdownTypeHP4[$rowHP4['ZhaFigureCode']][] = $rowHP4['BreakdownTypeID'];
    $breackdownTypeTC1[$rowHP4['ZhaFigureCode']][] = $rowHP4['BreakdownTypeID1'];
    $organisationCategoryHP4[$rowHP4['BreakdownTypeID']] = $rowHP4['BreakdownTypeDescription'];
    $organisationCategoryTC1[$rowHP4['BreakdownTypeID1']] = $rowHP4['BreakdownTypeDescriptionTC1'];
}

$queryMC = "SELECT `ZhaQuestionCode`, `OrganisationGroup`,
                  COUNT(`ZhaAnswer`) AS total
            FROM `tblzhaanswers` ans
      INNER JOIN tblzhaformssubmitted sub
              ON ans.`FormSerialNumber` = sub.`FormSerialNumber`
      INNER JOIN `tblgenorganisations` org
              ON sub.`OrganisationCode` = org.`OrganisationCode`
      INNER JOIN `tblgensetuporganisationcategories` cat
              ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
           WHERE ZhaQuestionCode = 'MC1'
              OR ZhaQuestionCode = 'MC3'
              OR ZhaQuestionCode = 'MC5'
              OR ZhaQuestionCode = 'MC6a'
              OR ZhaQuestionCode = 'MC6b'
              OR ZhaQuestionCode = 'MC6c'
              OR ZhaQuestionCode = 'MC6d'
              OR ZhaQuestionCode = 'MC6e'
              OR ZhaQuestionCode = 'MC6f'
              OR ZhaQuestionCode = 'MC6g'
              OR ZhaQuestionCode = 'MC6h'
              OR ZhaQuestionCode = 'ME1a'
             AND `ZhaAnswer` = 'Yes'
        GROUP BY ZhaQuestionCode, OrganisationGroup";

$resultMC = mysql_query($queryMC) or die(mysql_error());

while ($rowMC = mysql_fetch_array($resultMC)) {
    $totalValueMC[$rowMC['ZhaQuestionCode']][$rowMC['OrganisationGroup']] = $rowMC['total'];
}


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

echo 'Community educators and peer educators';
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
echo '<tr>';
echo '<td>Community educator-Registered</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['HP4']['CME']['REG']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['HP4']['CME']['REG']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['HP4']['CME']['REG']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['HP4']['CME']['REG']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['HP4']['CME']['REG']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['HP4']['CME']['REG']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM) . '</td>';
echo '<td>' . $HP4SHACCOMsMAL = $totalValueHP4['HP4']['CME']['REG']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4SHACCOMsFEM = $totalValueHP4['HP4']['CME']['REG']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL) . '</td>';
echo '<td>' . ($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Peer educator-Registered</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['HP4']['PRE']['REG']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['HP4']['PRE']['REG']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['HP4']['PRE']['REG']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['HP4']['PRE']['REG']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['HP4']['PRE']['REG']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['HP4']['PRE']['REG']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM) . '</td>';
echo '<td>' . $HP4SHACCOMsMAL = $totalValueHP4['HP4']['PRE']['REG']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4SHACCOMsFEM = $totalValueHP4['HP4']['PRE']['REG']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL) . '</td>';
echo '<td>' . ($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Community educator-Registered and active</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['HP4']['CME']['RAA']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['HP4']['CME']['RAA']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['HP4']['CME']['RAA']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['HP4']['CME']['RAA']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['HP4']['CME']['RAA']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['HP4']['CME']['RAA']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM) . '</td>';
echo '<td>' . $HP4SHACCOMsMAL = $totalValueHP4['HP4']['CME']['RAA']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4SHACCOMsFEM = $totalValueHP4['HP4']['CME']['RAA']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL) . '</td>';
echo '<td>' . ($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Peer educator-Registered and active</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['HP4']['PRE']['RAA']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['HP4']['PRE']['RAA']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['HP4']['PRE']['RAA']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['HP4']['PRE']['RAA']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['HP4']['PRE']['RAA']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['HP4']['PRE']['RAA']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM) . '</td>';
echo '<td>' . $HP4SHACCOMsMAL = $totalValueHP4['HP4']['PRE']['RAA']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4SHACCOMsFEM = $totalValueHP4['HP4']['PRE']['RAA']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL) . '</td>';
echo '<td>' . ($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM) . '</td>';
echo '<td>' . ($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT) . '</td>';
echo '</tr>';
echo '<table>';

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

echo '<br>';

echo 'Post Exposure Prophylaxis (PEP)';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="3">Within CSOs</th>';
echo '<th colspan="3">Within Private Sector</th>';
echo '<th colspan="3">Within Government</th>';
echo '<th colspan="3">Within SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td rowspan="2">Number of persons who have been trained in how to counsel persons in and refer persons for PEP this quarter</td>';
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
echo '<tr>';
echo '<td>' . $HP8CSOsMAL = $totalValueHP4['HP8']['']['MAL']['CSOs'][''] . '</td>';
echo '<td>' . $HP8CSOsFEM = $totalValueHP4['HP8']['']['FEM']['CSOs'][''] . '</td>';
echo '<td>' . ($HP8CSOsMAL + $HP8CSOsFEM) . '</td>';
echo '<td>' . $HP8PrivateMAL = $totalValueHP4['HP8']['']['MAL']['Private Sector'][''] . '</td>';
echo '<td>' . $HP8PrivateFEM = $totalValueHP4['HP8']['']['FEM']['Private Sector'][''] . '</td>';
echo '<td>' . ($HP8PrivateMAL + $HP8PrivateFEM) . '</td>';
echo '<td>' . $HP8GovernmentMAL = $totalValueHP4['HP8']['']['MAL']['Government'][''] . '</td>';
echo '<td>' . $HP8GovernmentFEM = $totalValueHP4['HP8']['']['FEM']['Government'][''] . '</td>';
echo '<td>' . ($HP8GovernmentMAL + $HP8GovernmentFEM) . '</td>';
echo '<td>' . $HP8SHACCOMsMAL = $totalValueHP4['HP8']['']['MAL']['SHACCOMs'][''] . '</td>';
echo '<td>' . $HP8SHACCOMsFEM = $totalValueHP4['HP8']['']['FEM']['SHACCOMs'][''] . '</td>';
echo '<td>' . ($HP8SHACCOMsMAL + $HP8SHACCOMsFEM) . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'Post Exposure Prophylaxis (PEP)';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="3">Within CSOs</th>';
echo '<th colspan="3">Within Private Sector</th>';
echo '<th colspan="3">Within Government</th>';
echo '<th colspan="3">Within SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td rowspan="2">Number of persons who have been trained in how to counsel persons in and refer persons for PEP this quarter</td>';
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
echo '<tr>';
echo '<td>' . $HP8CSOsMAL = $totalValueHP4['HP9']['']['MAL']['CSOs'][''] . '</td>';
echo '<td>' . $HP8CSOsFEM = $totalValueHP4['HP9']['']['FEM']['CSOs'][''] . '</td>';
echo '<td>' . ($HP8CSOsMAL + $HP8CSOsFEM) . '</td>';
echo '<td>' . $HP8PrivateMAL = $totalValueHP4['HP9']['']['MAL']['Private Sector'][''] . '</td>';
echo '<td>' . $HP8PrivateFEM = $totalValueHP4['HP9']['']['FEM']['Private Sector'][''] . '</td>';
echo '<td>' . ($HP8PrivateMAL + $HP8PrivateFEM) . '</td>';
echo '<td>' . $HP8GovernmentMAL = $totalValueHP4['HP9']['']['MAL']['Government'][''] . '</td>';
echo '<td>' . $HP8GovernmentFEM = $totalValueHP4['HP9']['']['FEM']['Government'][''] . '</td>';
echo '<td>' . ($HP8GovernmentMAL + $HP8GovernmentFEM) . '</td>';
echo '<td>' . $HP8SHACCOMsMAL = $totalValueHP4['HP9']['']['MAL']['SHACCOMs'][''] . '</td>';
echo '<td>' . $HP8SHACCOMsFEM = $totalValueHP4['HP9']['']['FEM']['SHACCOMs'][''] . '</td>';
echo '<td>' . ($HP8SHACCOMsMAL + $HP8SHACCOMsFEM) . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'By civil society organisations';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Name of Vulnerable or High Risk Group</th>';
echo '<th colspan="3">MVC</th>';
echo '<th colspan="3">Elderly</th>';
echo '<th rowspan="2">Widow / Widowers</th>';
echo '<th rowspan="2">Vulnerable Households</th>';
echo '<th rowspan="2">Other vulnerable groups</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Emotional and psychological</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['CSOs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Financial support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['CSOs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Health care and supplies</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['CSOs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nutritional support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['CSOs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['CSOs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>School related assistance</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['CSOs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['CSOs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';
echo '<table>';

echo '<br>';

echo 'By private sector';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Name of Vulnerable or High Risk Group</th>';
echo '<th colspan="3">MVC</th>';
echo '<th colspan="3">Elderly</th>';
echo '<th rowspan="2">Widow / Widowers</th>';
echo '<th rowspan="2">Vulnerable Households</th>';
echo '<th rowspan="2">Other vulnerable groups</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Emotional and psychological</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['Private Sector']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Financial support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['Private Sector']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Health care and supplies</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['Private Sector']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nutritional support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['Private Sector']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['Private Sector']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>School related assistance</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['Private Sector']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['Private Sector']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';
echo '<table>';

echo '<br>';

echo 'By public sector';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Name of Vulnerable or High Risk Group</th>';
echo '<th colspan="3">MVC</th>';
echo '<th colspan="3">Elderly</th>';
echo '<th rowspan="2">Widow / Widowers</th>';
echo '<th rowspan="2">Vulnerable Households</th>';
echo '<th rowspan="2">Other vulnerable groups</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Emotional and psychological</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['Government']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Financial support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['Government']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Health care and supplies</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['Government']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nutritional support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['Government']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['Government']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>School related assistance</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['Government']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['Government']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';
echo '<table>';

echo '<br>';

echo 'D: HIV CARE AND SUPPORT SERVICES - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4';

echo '<br>';

echo 'Home-based care volunteers';
echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="2">CSOs</th>';
echo '<th colspan="2">Private Sector</th>';
echo '<th colspan="2">Government</th>';
echo '<th colspan="2">SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td rowspan="2">Number of active home-based care volunteers registered this quarter</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '</tr>';
echo '<tr>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['SHACCOMs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'Home-based care visits';
echo '<br>';
echo 'Home-based care volunteers';

echo '<table border="1">';
echo '<tr>';
echo '<th></th>';
echo '<th colspan="2">CSOs</th>';
echo '<th colspan="2">Private Sector</th>';
echo '<th colspan="2">Government</th>';
echo '<th colspan="2">SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td rowspan="2">Number of active home-based care volunteers registered this quarter</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '</tr>';
echo '<tr>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['MAL']['SHACCOMs'] . '</td>';
echo '<td>' . $totalValueHP3['CS1']['FEM']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table';

echo '<br>';

echo 'Home-based care visits';

echo '<table border="1">';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Number of community home-based care person-visits this quarter</td>';
echo '<td>' . $totalValueHP3['CS2']['']['CSOs'] . '</td>';
echo '<td>' . $totalValueHP3['CS2']['']['Private Sector'] . '</td>';
echo '<td>' . $totalValueHP3['CS2']['']['Government'] . '</td>';
echo '<td>' . $totalValueHP3['CS2']['']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'By SHACCOMs';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Name of Vulnerable or High Risk Group</th>';
echo '<th colspan="3">MVC</th>';
echo '<th colspan="3">Elderly</th>';
echo '<th rowspan="2">Widow / Widowers</th>';
echo '<th rowspan="2">Vulnerable Households</th>';
echo '<th rowspan="2">Other vulnerable groups</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '<td>Male</td>';
echo '<td>Female</td>';
echo '<td>Total</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Emotional and psychological</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['SHACCOMs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Financial support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['SHACCOMs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Health care and supplies</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['SHACCOMs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nutritional support</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td>' . $HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM) . '</td>';
echo '<td>' . $HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['SHACCOMs']['TOT'] . '</td>';
echo '<td>' . $HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['SHACCOMs']['TOT'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>School related assistance</td>';
echo '<td>' . $HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['SHACCOMs']['MAL'] . '</td>';
echo '<td>' . $HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['SHACCOMs']['FEM'] . '</td>';
echo '<td>' . $HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM) . '</td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '<td></td>';
echo '</tr>';
echo '<table>';

echo '<br>';

echo 'E: TRAINING AND CAPACITY BUILDING FOR HIV - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4';
echo '<br>';
echo 'By civil society organisations';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Training topic</th>';
echo '<th colspan="3">Number of volunteers trained</th>';
echo '<th colspan="3">Number of project staff trained</th>';
echo '<th colspan="3">Number of employees trained</th>';
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
echo '</tr>';

foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

    echo '<tr>';
    echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['CSOs']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['CSOs']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '<td>' . $TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['CSOs']['MAL'] . '</td>';
    echo '<td>' . $TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['CSOs']['FEM'] . '</td>';
    echo '<td>' . $TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM) . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['CSOs']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['CSOs']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '</tr>';
    echo '<tr>';
}

echo '<table>';
echo '<br>';

echo 'By Private Sector';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Training topic</th>';
echo '<th colspan="3">Number of volunteers trained</th>';
echo '<th colspan="3">Number of project staff trained</th>';
echo '<th colspan="3">Number of employees trained</th>';
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
echo '</tr>';

foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

    echo '<tr>';
    echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['Private Sector']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['Private Sector']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '<td>' . $TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['Private Sector']['MAL'] . '</td>';
    echo '<td>' . $TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['Private Sector']['FEM'] . '</td>';
    echo '<td>' . $TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM) . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['Private Sector']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['Private Sector']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '</tr>';
    echo '<tr>';
}

echo '<table>';

echo '<br>';

echo 'By Public Sector';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Training topic</th>';
echo '<th colspan="3">Number of volunteers trained</th>';
echo '<th colspan="3">Number of project staff trained</th>';
echo '<th colspan="3">Number of employees trained</th>';
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
echo '</tr>';

foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

    echo '<tr>';
    echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['Government']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['Government']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '<td>' . $TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['Government']['MAL'] . '</td>';
    echo '<td>' . $TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['Government']['FEM'] . '</td>';
    echo '<td>' . $TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM) . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['Government']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['Government']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '</tr>';
    echo '<tr>';
}

echo '<table>';

echo '<br>';

echo 'By SHACCOMs';
echo '<table border="1">';
echo '<tr>';
echo '<th rowspan="2">Training topic</th>';
echo '<th colspan="3">Number of volunteers trained</th>';
echo '<th colspan="3">Number of project staff trained</th>';
echo '<th colspan="3">Number of employees trained</th>';
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
echo '</tr>';

foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

    echo '<tr>';
    echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['SHACCOMs']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['SHACCOMs']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '<td>' . $TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['SHACCOMs']['MAL'] . '</td>';
    echo '<td>' . $TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['SHACCOMs']['FEM'] . '</td>';
    echo '<td>' . $TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM) . '</td>';
    echo '<td>' . $TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['SHACCOMs']['MAL'] . '</td>';
    echo '<td>' . $TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['SHACCOMs']['FEM'] . '</td>';
    echo '<td>' . $TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM) . '</td>';
    echo '</tr>';
    echo '<tr>';
}

echo '<table>';

echo '<br>';

echo 'Training of community-level organisations';

echo '<table border="1">';
echo '<tr>';
echo '<td>Training of community level organisations</td>';
echo '<th>Within CSOs</th>';
echo '<th>Within Private Sector</th>';
echo '<th>Within Government</th>';
echo '<th>Within SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Number of organisations at the community level trained in planning, implementation and management of HIV services this quarter</td>';
echo '<td>' . $totalValueHP4['TC2']['']['']['CSOs'][''] . '</td>';
echo '<td>' . $totalValueHP4['TC2']['']['']['Private Sector'][''] . '</td>';
echo '<td>' . $totalValueHP4['TC2']['']['']['Government'][''] . '</td>';
echo '<td>' . $totalValueHP4['TC2']['']['']['SHACCOMs'][''] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'F: MANAGEMENT AND COORDINATION OF HIV INTERVENTIONS - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4';

echo '<br>';
echo '<br>';

echo '<table border="1">';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td>How many organisations have HIV work plans for the current financial year?</td>';
echo '<td>' . $totalValueMC['MC1']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC1']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC1']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC1']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>How many organisations have indicated that funding was available in the last quarter to implement the HIV work plan?</td>';
echo '<td>' . $totalValueMC['MC3']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC3']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC3']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC3']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>How many organisations implemented their HIV work plans this quarter?</td>';
echo '<td>' . $totalValueMC['MC5']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC5']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC5']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC5']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'Funding';
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
echo '<td>' . $totalValueHP4['MC2']['']['']['CSOs'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC2']['']['']['Private Sector'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC2']['']['']['Government'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC2']['']['']['SHACCOMs'][''] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueHP4['MC4']['']['']['CSOs'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC4']['']['']['Private Sector'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC4']['']['']['Government'][''] . '</td>';
echo '<td>' . $totalValueHP4['MC4']['']['']['SHACCOMs'][''] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'Areas covered in work plan';

echo '<table border="1">';
echo '<tr>';
echo '<td></td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td>Is HIV prevention in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6a']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6a']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6a']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6a']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Is HIV treatment, care and support in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6b']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6b']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6b']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6b']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Are HIV impact mitigation services in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6c']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6c']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6c']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6c']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Is management in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6d']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6d']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6d']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6d']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Is planning in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6e']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6e']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6e']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6e']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>s coordination in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6f']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6f']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6f']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6f']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Is advocacy in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6g']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6g']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6g']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6g']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Is capacity building in your work plan?</td>';
echo '<td>' . $totalValueMC['MC6h']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['MC6h']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['MC6h']['Government'] . '</td>';
echo '<td>' . $totalValueMC['MC6h']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo '<table border="1">';
echo '<tr>';
echo '<td>How many organisations attended an HIV feedback
or data dissemination workshop at district level this
quarter?</td>';
echo '<th>CSOs</th>';
echo '<th>Private Sector</th>';
echo '<th>Government</th>';
echo '<th>SHACCOMs</th>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td>' . $totalValueMC['ME1a']['CSOs'] . '</td>';
echo '<td>' . $totalValueMC['ME1a']['Private Sector'] . '</td>';
echo '<td>' . $totalValueMC['ME1a']['Government'] . '</td>';
echo '<td>' . $totalValueMC['ME1a']['SHACCOMs'] . '</td>';
echo '</tr>';
echo '</table>';

echo '<br>';

echo 'G: SUMMARY DATA FROM ZHAPMoS FORM 2 (SCHOOLS)';
?>
<table width="100%" border="1">
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>

<?php

echo '<br>';
echo 'Lifeskills education on HIV';
?>
