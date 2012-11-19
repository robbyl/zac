<?php
/*
 * 2012 zanhid
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Londo <robbyl@ovi.com>
 *  @copyright  2012 sofbill
 *  @version  Release: 1.0.0
 */
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

require '../../includes/session_validator.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>ZANHID | ZAHPMoS FORMS SUMMARY PRINTOUT</title>

        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/print.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });

                $('#pdf').click(function() {

                    savePDF('report', '../css/print.css');
                });
            });

        </script>
    </head>
    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <h1>ZHAPMoS Submission Records Printout</h1>
                <div class="actions" style="top: 100px; width: auto; right: 0; margin: 0 15px 0 0" >
                    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" onClick="printPage('report', '../../css/print.css')">Print</button>
                    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" id="pdf" >PDF</button>
                </div>
                <div class="hr-line"></div>
                <?php
                require '../../functions/general_functions.php';
                require '../../config/config.php';

                $quarter = clean($_GET['quarter']);
                $year = clean($_GET['year']);
                $geoarea = clean($_GET['geoarea']);

                if (isset($quarter) && !empty($quarter) && isset($year) && !empty($year) && isset($geoarea) && !empty($geoarea)) {

                    $reportin_period = period_to_words($quarter) . ' ' . $year;

                    $exp_quarter = explode("/", $quarter);
                    $dateFrom = "'" . $year . '-' . $exp_quarter[0] . "'";


                    switch ($geoarea) {
                        case 'Unguja zone':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`,
                                                       zon.`ZoneCode`, `Zone`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                            INNER JOIN tblgensetupzones zon
                                                    ON reg.`ZoneCode` = zon.`ZoneCode`
                                                 WHERE zon.ZoneCode = 1";
                            break;

                        case 'North Unguja region':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                                 WHERE reg.`RegionCode` = 122";
                            break;

                        case 'South Unguja region':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                                 WHERE reg.`RegionCode` = 123";
                            break;

                        case 'Urban west region':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                                 WHERE reg.`RegionCode` = 124";
                            break;

                        case 'Pemba zone':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`,
                                                       zon.`ZoneCode`, `Zone`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                            INNER JOIN tblgensetupzones zon
                                                    ON reg.`ZoneCode` = zon.`ZoneCode`
                                                 WHERE zon.ZoneCode = 2";
                            break;

                        case 'North Pemba region':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                                 WHERE reg.`RegionCode` = 225";
                            break;
                        
                        case 'South Pemba region':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                                 WHERE reg.`RegionCode` = 226";
                            break;
                        
                        case 'National':
                            $query_districts = "SELECT `DistrictCode`, `District`, reg.`RegionCode`, `Region`,
                                                       zon.`ZoneCode`, `Zone`
                                                  FROM tblgensetupdistricts dis
                                            INNER JOIN tblgensetupregions reg
                                                    ON dis.`RegionCode` = reg.`RegionCode`
                                            INNER JOIN tblgensetupzones zon
                                                    ON reg.`ZoneCode` = zon.`ZoneCode`
                                                 WHERE zon.ZoneCode = 1
                                                    OR zon.ZoneCode = 2";

                        default:
                            break;
                    }

                    $result_districts = mysql_query($query_districts) or die(mysql_error());

                    $districtCodes1 = '';
                    $districtCodes2 = '';
                    $districtCodes3 = '';
                    $districtCodes4 = '';
                    $districtCodes5 = '';
                    $districtCodes6 = '';

                    $index = 1;

                    while ($district = mysql_fetch_array($result_districts)) {
                        if ($index == 1) {
                            $districtCodes1 .= "WHERE `BreakdownCategoryID` = 'HVI' AND ZhaFigureCode = 'HP1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes2 .= "WHERE `BreakdownCategoryID` = 'MRV' AND ZhaFigureCode = 'HP1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes3 .= "WHERE `BreakdownCategoryID` = 'HVI' AND ZhaFigureCode = 'HP2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes4 .= "WHERE ZhaFigureCode = 'HP3' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'HP6' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'HP7' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'CS1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'CS2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes5 .= "WHERE ZhaFigureCode = 'HP4' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'HP8' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'HP9' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'M01' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'TC1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'TC2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'MC2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'MC4' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B01' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B02' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B03' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes6 .= "WHERE ZhaQuestionCode = 'MC1' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC3' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC5' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6a' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6b' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6c' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6d' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6e' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6f' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6g' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6h' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'ME1a' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                        } else {
                            $districtCodes1 .= " OR `BreakdownCategoryID` = 'HVI' AND ZhaFigureCode = 'HP1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes2 .= " OR `BreakdownCategoryID` = 'MRV' AND ZhaFigureCode = 'HP1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes3 .= " OR `BreakdownCategoryID` = 'HVI' AND ZhaFigureCode = 'HP2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes4 .= " OR ZhaFigureCode = 'HP3' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'HP6' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'HP7' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'CS1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes4 .= " OR ZhaFigureCode = 'CS2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes5 .= " OR ZhaFigureCode = 'HP4' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'HP8' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'HP9' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'M01' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'TC1' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'TC2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'MC2' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'MC4' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B01' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B02' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes5 .= " OR ZhaFigureCode = 'B03' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;

                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC1' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC3' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC5' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6a' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6b' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6c' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6d' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6e' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6f' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6g' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'MC6h' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                            $districtCodes6 .= " OR ZhaQuestionCode = 'ME1a' AND `ZhaAnswer` = 'Yes' AND DistrictCode = " . $district['DistrictCode'] . ' AND PeriodFrom = ' . $dateFrom;
                        }
                        $index++;
                    }

                    $query = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                                     `DistrictCode`, `OrganisationGroup`, DATE(PeriodFrom) AS PeriodFrom,
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
                                     {$districtCodes1}
                            GROUP BY `BreakdownTypeID`, OrganisationGroup
                            ORDER BY BreakdownTypeDescription ASC";

                    $result = mysql_query($query) or die(mysql_error());

                    while ($row = mysql_fetch_array($result)) {
                        $totalValue[$row['ZhaFigureCode']][$row['BreakdownTypeID']][$row['OrganisationGroup']] = $row['total'];
                        $breackdownType[$row['ZhaFigureCode']][] = $row['BreakdownTypeID'];
                        $organisationCategory[$row['BreakdownTypeID']] = $row['BreakdownTypeDescription'];
                    }

                    $query_risk = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                                       `DistrictCode`, `OrganisationGroup`, BreakdownTypeID4,
                                       DATE(PeriodFrom) AS PeriodFrom,
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
                                      {$districtCodes2}
                             GROUP BY `BreakdownTypeID`, BreakdownTypeID4, OrganisationGroup
                             ORDER BY BreakdownTypeDescription ASC";

                    $result_risk = mysql_query($query_risk) or die(mysql_error());

                    while ($row_risk = mysql_fetch_array($result_risk)) {
                        $totalValueRisk[$row_risk['ZhaFigureCode']][$row_risk['BreakdownTypeID']][$row_risk['OrganisationGroup']][$row_risk['BreakdownTypeID4']] = $row_risk['total'];
                        $breackdownTypeRisk[$row_risk['ZhaFigureCode']][] = $row_risk['BreakdownTypeID'];
                        $organisationCategoryRisk[$row_risk['BreakdownTypeID']] = $row_risk['BreakdownTypeDescription'];
                    }


                    $queryHP2 = "SELECT `ZhaFigureCode`, `BreakdownTypeID`, `BreakdownTypeDescription`,
                                     `DistrictCode`, `OrganisationGroup`, BreakdownTypeID2, DATE(PeriodFrom) AS PeriodFrom,
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
                                    {$districtCodes3}
                           GROUP BY `BreakdownTypeID`, OrganisationGroup, BreakdownTypeID2
                           ORDER BY BreakdownTypeDescription ASC";

                    $resultHP2 = mysql_query($queryHP2) or die(mysql_error());

                    while ($rowHP2 = mysql_fetch_array($resultHP2)) {
                        $totalValueHP2[$rowHP2['ZhaFigureCode']][$rowHP2['BreakdownTypeID']][$rowHP2['OrganisationGroup']][$rowHP2['BreakdownTypeID2']] = $rowHP2['total'];
                        $breackdownTypeHP2[$rowHP2['ZhaFigureCode']][] = $rowHP2['BreakdownTypeID'];
                        $organisationCategoryHP2[$rowHP2['BreakdownTypeID']] = $rowHP2['BreakdownTypeDescription'];
                    }

                    $queryHP3 = "SELECT DISTINCT `ZhaFigureCode`, `BreakdownTypeID`, `OrganisationGroup`,
                                    `DistrictCode`, DATE(PeriodFrom) AS PeriodFrom, SUM(`ZhaFigureValue`) AS total
                               FROM `tblzhafigures` fig
                          LEFT JOIN `tblzhasetupfigurebreakdowntypes` typ
                                 ON fig.`BreakdownTypeID1` = typ.`BreakdownTypeID`
                         INNER JOIN tblzhaformssubmitted sub
                                 ON fig.`FormSerialNumber` = sub.`FormSerialNumber`
                         INNER JOIN `tblgenorganisations` org
                                 ON sub.`OrganisationCode` = org.`OrganisationCode`
                         INNER JOIN `tblgensetuporganisationcategories` cat
                                 ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                    {$districtCodes4}
                           GROUP BY `BreakdownTypeID`, OrganisationGroup, ZhaFigureCode";

                    $resultHP3 = mysql_query($queryHP3) or die(mysql_error());

                    while ($rowHP3 = mysql_fetch_array($resultHP3)) {
                        $totalValueHP3[$rowHP3['ZhaFigureCode']][$rowHP3['BreakdownTypeID']][$rowHP3['OrganisationGroup']] = $rowHP3['total'];
                    }

                    $queryHP4 = "SELECT `ZhaFigureCode`, typ.`BreakdownTypeID`, BreakdownTypeID1, `DistrictCode`,
                                      typ.`BreakdownTypeDescription`, typTC1.BreakdownTypeDescription AS BreakdownTypeDescriptionTC1,
                                     `OrganisationGroup`, BreakdownTypeID3, DATE(PeriodFrom) AS PeriodFrom,
                                     SUM(`ZhaFigureValue`) AS total, COUNT(OrganisationGroup) AS groupTotal
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
                                    {$districtCodes5}
                           GROUP BY `BreakdownTypeID`,BreakdownTypeID1, BreakdownTypeID3,
                                    OrganisationGroup, ZhaFigureCode
                           ORDER BY BreakdownTypeDescription ASC, BreakdownTypeDescriptionTC1 ASC";

                    $resultHP4 = mysql_query($queryHP4) or die(mysql_error());

                    while ($rowHP4 = mysql_fetch_array($resultHP4)) {
                        $totalValueHP4[$rowHP4['ZhaFigureCode']][$rowHP4['BreakdownTypeID']][$rowHP4['BreakdownTypeID1']][$rowHP4['OrganisationGroup']][$rowHP4['BreakdownTypeID3']] = $rowHP4['total'];
                        $totalOrg[$rowHP4['ZhaFigureCode']][$rowHP4['BreakdownTypeID1']][$rowHP4['OrganisationGroup']] = $rowHP4['groupTotal'];
                        $breackdownTypeHP4[$rowHP4['ZhaFigureCode']][] = $rowHP4['BreakdownTypeID'];
                        $breackdownTypeTC1[$rowHP4['ZhaFigureCode']][] = $rowHP4['BreakdownTypeID1'];
                        $organisationCategoryHP4[$rowHP4['BreakdownTypeID']] = $rowHP4['BreakdownTypeDescription'];
                        $organisationCategoryTC1[$rowHP4['BreakdownTypeID1']] = $rowHP4['BreakdownTypeDescriptionTC1'];
                    }

                    $queryMC = "SELECT `ZhaQuestionCode`, `OrganisationGroup`, `DistrictCode`, DATE(PeriodFrom) AS PeriodFrom,
                                   COUNT(`ZhaAnswer`) AS total
                              FROM `tblzhaanswers` ans
                        INNER JOIN tblzhaformssubmitted sub
                                ON ans.`FormSerialNumber` = sub.`FormSerialNumber`
                        INNER JOIN `tblgenorganisations` org
                                ON sub.`OrganisationCode` = org.`OrganisationCode`
                        INNER JOIN `tblgensetuporganisationcategories` cat
                                ON org.`OrganisationCategoryID` = cat.`OrganisationCategoryID`
                                   {$districtCodes6}
                          GROUP BY ZhaQuestionCode, OrganisationGroup";

                    $resultMC = mysql_query($queryMC) or die(mysql_error());

                    while ($rowMC = mysql_fetch_array($resultMC)) {
                        $totalValueMC[$rowMC['ZhaQuestionCode']][$rowMC['OrganisationGroup']] = $rowMC['total'];
                    }
                    ?>
                    <form action="../../includes/pdf.php" method="post" id="html-form" style="display: none">
                        <input type="hidden" name="html" id="html">
                    </form>
                    <div class="report-wrapper">
                        <div id="report">
                            <div class="sheet-wraper summary">
                                <div class="sheet-header">
                                    <div class="header-title">
                                        <div class="zanz-logo"></div>
                                        <div class="zac-logo"></div>
                                        <p class="form-heading" style="width: 60%;
                                           margin: 0 auto !important;
                                           text-align: center;
                                           font-weight: bold;" >
                                            ZANZIBAR AIDS COMMISSION (ZAC)</p>
                                        <p class="form-sub-header" style="width: 60%;
                                           font-size: 1.5em;
                                           margin: 0 auto !important;
                                           text-align: center;
                                           font-weight: bold;">
                                            ZHAPMoS SUMMARY FORM FOR <?php echo ' ' . strtoupper($geoarea); ?> <br>Reporting Period <?php echo $reportin_period; ?></p>
                                    </div>
                                    <!-- end .sheet-header --></div>
                                <div class="print-details" style="float: right">
                                    <p><strong>Print Date: </strong><span style="font-weight: normal;"><?php echo date('d M, Y') ?></span></p>
                                </div>
                                <div class="black-separator"></div>
                                <div class="section">
                                    <h3><strong>B. HIV PREVENTION - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4</strong></h3>
                                    <p style="font-weight: bold;">HIV Prevention amongst vulnerable and high risk groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Type of interventions</th>
                                            <th colspan="4">Number of persons reached</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownType['HP1'])) + 2 ?>" class="data-group">HP1A</td>
                                        </tr>
                                        <tr>
                                            <th>CSOs</th>
                                            <th>Private Sector</th>
                                            <th>Government</th>
                                            <th>SHACCOMs</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownType['HP1']) as $value) {
                                            echo '<tr>';
                                            echo'<td>' . $organisationCategory[$value] . '</td>';
                                            echo '<td align="right">' . number_format($totalValue['HP1'][$value]['CSOs'], 0, ".", ",") . '</td>';
                                            echo '<td align="right">' . number_format($totalValue['HP1'][$value]['Private Sector'], 0, ".", ",") . '</td>';
                                            echo '<td align="right">' . number_format($totalValue['HP1'][$value]['Government'], 0, ".", ",") . '</td>';
                                            echo '<td align="right">' . number_format($totalValue['HP1'][$value]['SHACCOMs'], 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">HIV Prevention amongst vulnerable and high risk groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="3">Name of Vulnerable or High Risk Group</th>
                                            <th colspan="15">Number of persons reached</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownTypeRisk['HP1'])) + 3 ?>"  class="data-group">HP1B</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">CSOs</th>
                                            <th colspan="3">Private Sector</th>
                                            <th colspan="3">Government</th>
                                            <th colspan="3">SHACCOMs</th>
                                            <th colspan="3">TOTAL</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownTypeRisk['HP1']) as $valueRisk) {

                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryRisk[$valueRisk] . '</td>';
                                            echo '<td>' . number_format($CSOsMAL = $totalValueRisk['HP1'][$valueRisk]['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($CSOsFEM = $totalValueRisk['HP1'][$valueRisk]['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($CSOsTOT = ($CSOsMAL + $CSOsFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($PrivateMAL = $totalValueRisk['HP1'][$valueRisk]['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($PrivateFEM = $totalValueRisk['HP1'][$valueRisk]['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($PrivateTOT = ($PrivateMAL + $PrivateFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($GovernmentMAL = $totalValueRisk['HP1'][$valueRisk]['Government']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($GovernmentFEM = $totalValueRisk['HP1'][$valueRisk]['Government']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($GovernmentTOT = ($GovernmentMAL + $GovernmentFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($SHACCOMsMAL = $totalValueRisk['HP1'][$valueRisk]['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($SHACCOMsFEM = $totalValueRisk['HP1'][$valueRisk]['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($SHACCOMsTOT = ($SHACCOMsMAL + $SHACCOMsFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format(($CSOsMAL + $PrivateMAL + $GovernmentMAL + $SHACCOMsMAL), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format(($CSOsFEM + $PrivateFEM + $GovernmentFEM + $SHACCOMsFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format(($CSOsTOT + $PrivateTOT + $GovernmentTOT + $SHACCOMsTOT), 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">HIV Prevention amongst general population</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="3">Type of interventions</th>
                                            <th colspan="8">Number of persons reached</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownTypeHP2['HP2'])) + 3 ?>"  class="data-group">HP2</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Younger than 25</th>
                                            <th colspan="4">25 and Older</th>
                                        </tr>
                                        <tr>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownTypeHP2['HP2']) as $valueHP2) {
                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryHP2[$valueHP2] . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['CSOs']['Y25'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['Private Sector']['Y25'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['']['Y25'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['SHACCOMs']['Y25'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['CSOs']['25O'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['Private Sector']['25O'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['Government']['25O'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($totalValueHP2['HP2'][$valueHP2]['SHACCOMs']['25O'], 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Radio and TV</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="2">By CSOs</th>
                                            <th colspan="2">By Private Sector</th>
                                            <th colspan="2">By Government</th>
                                            <th colspan="2">By SHACCOMs</th>
                                            <td rowspan="3"  class="data-group">HP3</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>RADIO</th>
                                            <th>TV</th>
                                            <th>RADIO</th>
                                            <th>TV</th>
                                            <th>RADIO</th>
                                            <th>TV</th>
                                            <th>RADIO</th>
                                            <th>TV</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Number of hours of radio and television airtime for broadcasting HIV-related content</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['RAD']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['TVN']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['RAD']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['TVN']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['RAD']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['TVN']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['RAD']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP3']['TVN']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Community educators and peer educators</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="3"></th>
                                            <th colspan="15">Number of persons reached</th>
                                            <td rowspan="7"  class="data-group">HP4</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">CSOs</th>
                                            <th colspan="3">Private Sector</th>
                                            <th colspan="3">Government</th>
                                            <th colspan="3">SHACCOMs</th>
                                            <th colspan="3">TOTAL</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Community educator-Registered</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['HP4']['CME']['REG']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['HP4']['CME']['REG']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['HP4']['CME']['REG']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['HP4']['CME']['REG']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['HP4']['CME']['REG']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['HP4']['CME']['REG']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsMAL = $totalValueHP4['HP4']['CME']['REG']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsFEM = $totalValueHP4['HP4']['CME']['REG']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Peer educator-Registered</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['HP4']['PRE']['REG']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['HP4']['PRE']['REG']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['HP4']['PRE']['REG']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['HP4']['PRE']['REG']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['HP4']['PRE']['REG']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['HP4']['PRE']['REG']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsMAL = $totalValueHP4['HP4']['PRE']['REG']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsFEM = $totalValueHP4['HP4']['PRE']['REG']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Community educator-Registered and active</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['HP4']['CME']['RAA']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['HP4']['CME']['RAA']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['HP4']['CME']['RAA']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['HP4']['CME']['RAA']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['HP4']['CME']['RAA']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['HP4']['CME']['RAA']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsMAL = $totalValueHP4['HP4']['CME']['RAA']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsFEM = $totalValueHP4['HP4']['CME']['RAA']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Peer educator-Registered and active</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['HP4']['PRE']['RAA']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['HP4']['PRE']['RAA']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['HP4']['PRE']['RAA']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['HP4']['PRE']['RAA']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['HP4']['PRE']['RAA']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['HP4']['PRE']['RAA']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentTOT = ($HP4GovernmentMAL + $HP4GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsMAL = $totalValueHP4['HP4']['PRE']['RAA']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsFEM = $totalValueHP4['HP4']['PRE']['RAA']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4SHACCOMsTOT = ($HP4SHACCOMsMAL + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsMAL + $HP4PrivateMAL + $HP4GovernmentMAL + $HP4SHACCOMsMAL), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsFEM + $HP4PrivateFEM + $HP4GovernmentFEM + $HP4SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP4CSOsTOT + $HP4PrivateTOT + $HP4GovernmentTOT + $HP4SHACCOMsTOT), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">IEC Materials</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Booklets</th>
                                            <th colspan="4">Posters</th>
                                            <td rowspan="3"  class="data-group">HP6</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Number of IEC materials distributed to end users this quarter</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['BKL']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['BKL']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['BKL']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['BKL']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['POS']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['POS']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['POS']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP6']['POS']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Condoms</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Number of male condoms</th>
                                            <th colspan="4">Number of female condoms</th>
                                            <td rowspan="3"  class="data-group">HP7</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                            <th>By CSOs</th>
                                            <th>By Private Sector</th>
                                            <th>By Government</th>
                                            <th>By SHACCOMs</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Number of male and female condoms distributed to end users this quarter</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['MCD']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['MCD']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['MCD']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['MCD']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['FCD']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['FCD']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['FCD']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['HP7']['FCD']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Post Exposure Prophylaxis (PEP)</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Within CSOs</th>
                                            <th colspan="3">Within Private Sector</th>
                                            <th colspan="3">Within Government</th>
                                            <th colspan="3">Within SHACCOMs</th>
                                            <td rowspan="3"  class="data-group">HP8</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">Number of persons who have been trained in how to counsel persons in and refer persons for PEP this quarter</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>' . number_format($HP8CSOsMAL = $totalValueHP4['HP8']['']['MAL']['CSOs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8CSOsFEM = $totalValueHP4['HP8']['']['FEM']['CSOs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8CSOsMAL + $HP8CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8PrivateMAL = $totalValueHP4['HP8']['']['MAL']['Private Sector'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8PrivateFEM = $totalValueHP4['HP8']['']['FEM']['Private Sector'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8PrivateMAL + $HP8PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8GovernmentMAL = $totalValueHP4['HP8']['']['MAL']['Government'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8GovernmentFEM = $totalValueHP4['HP8']['']['FEM']['Government'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8GovernmentMAL + $HP8GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8SHACCOMsMAL = $totalValueHP4['HP8']['']['MAL']['SHACCOMs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8SHACCOMsFEM = $totalValueHP4['HP8']['']['FEM']['SHACCOMs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8SHACCOMsMAL + $HP8SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Work place programmes</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Within CSOs</th>
                                            <th colspan="3">Within Private Sector</th>
                                            <th colspan="3">Within Government</th>
                                            <th colspan="3">Within SHACCOMs</th>
                                            <td rowspan="3"  class="data-group">HP9</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">Number of employees who have participated in or benefited from an HIV workplace programme this quarter</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>' . number_format($HP8CSOsMAL = $totalValueHP4['HP9']['']['MAL']['CSOs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8CSOsFEM = $totalValueHP4['HP9']['']['FEM']['CSOs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8CSOsMAL + $HP8CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8PrivateMAL = $totalValueHP4['HP9']['']['MAL']['Private Sector'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8PrivateFEM = $totalValueHP4['HP9']['']['FEM']['Private Sector'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8PrivateMAL + $HP8PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8GovernmentMAL = $totalValueHP4['HP9']['']['MAL']['Government'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8GovernmentFEM = $totalValueHP4['HP9']['']['FEM']['Government'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8GovernmentMAL + $HP8GovernmentFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8SHACCOMsMAL = $totalValueHP4['HP9']['']['MAL']['SHACCOMs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP8SHACCOMsFEM = $totalValueHP4['HP9']['']['FEM']['SHACCOMs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($HP8SHACCOMsMAL + $HP8SHACCOMsFEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end .section  --></div>

                                <div class="section">
                                    <h3><strong>C: HIV IMPACT MITIGATION SERVICES - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4</strong></h3>
                                    <p style="font-weight: bold;">By civil society organisations</p>
                                    <p style="font-weight: bold;">Support to vulnerable groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Name of Vulnerable or High Risk Group</th>
                                            <th colspan="3">MVC</th>
                                            <th colspan="3">Elderly</th>
                                            <th rowspan="2">Widow / Widowers</th>
                                            <th rowspan="2">Vulnerable Households</th>
                                            <th rowspan="2">Other vulnerable groups</th>
                                            <td rowspan="7"  class="data-group">M01A</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Emotional and psychological</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Financial support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Health care and supplies</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Nutritional support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['CSOs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>School related assistance</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By private sector</p>
                                    <p style="font-weight: bold;">Support to vulnerable groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Name of Vulnerable or High Risk Group</th>
                                            <th colspan="3">MVC</th>
                                            <th colspan="3">Elderly</th>
                                            <th rowspan="2">Widow / Widowers</th>
                                            <th rowspan="2">Vulnerable Households</th>
                                            <th rowspan="2">Other vulnerable groups</th>
                                            <td rowspan="7"  class="data-group">M01B</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Emotional and psychological</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Financial support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Health care and supplies</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Nutritional support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['Private Sector']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>School related assistance</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By public sector</p>
                                    <p style="font-weight: bold;">Support to vulnerable groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Name of Vulnerable or High Risk Group</th>
                                            <th colspan="3">MVC</th>
                                            <th colspan="3">Elderly</th>
                                            <th rowspan="2">Widow / Widowers</th>
                                            <th rowspan="2">Vulnerable Households</th>
                                            <th rowspan="2">Other vulnerable groups</th>
                                            <td rowspan="7"  class="data-group">M01C</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Emotional and psychological</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Financial support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Health care and supplies</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Nutritional support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['Government']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>School related assistance</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['Government']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['Government']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By SHACCOMs</p>
                                    <p style="font-weight: bold;">Support to vulnerable groups</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Name of Vulnerable or High Risk Group</th>
                                            <th colspan="3">MVC</th>
                                            <th colspan="3">Elderly</th>
                                            <th rowspan="2">Widow / Widowers</th>
                                            <th rowspan="2">Vulnerable Households</th>
                                            <th rowspan="2">Other vulnerable groups</th>
                                            <td rowspan="7"  class="data-group">M01D</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Emotional and psychological</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['EMP']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['EMP']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['EMP']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['EMP']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['EMP']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['EMP']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['EMP']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Financial support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['FIN']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['FIN']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['FIN']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['FIN']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['FIN']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['FIN']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['FIN']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Health care and supplies</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['HCS']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['HCS']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['HCS']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['HCS']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['HCS']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['HCS']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['HCS']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Nutritional support</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['NUT']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['NUT']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateMAL = $totalValueHP4['M01']['ELD']['NUT']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateFEM = $totalValueHP4['M01']['ELD']['NUT']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4PrivateTOT = ($HP4PrivateMAL + $HP4PrivateFEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentMAL = $totalValueHP4['M01']['WID']['NUT']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['VLH']['NUT']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4GovernmentFEM = $totalValueHP4['M01']['OVG']['NUT']['SHACCOMs']['TOT'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>School related assistance</td>';
                                        echo '<td>' . number_format($HP4CSOsMAL = $totalValueHP4['M01']['MVC']['SCH']['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsFEM = $totalValueHP4['M01']['MVC']['SCH']['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($HP4CSOsTOT = ($HP4CSOsMAL + $HP4CSOsFEM), 0, ".", ",") . '</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end .section  --></div>

                                <div class="section">
                                    <h3><strong>D: HIV CARE AND SUPPORT SERVICES - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4</strong></h3>
                                    <p style="font-weight: bold;">Home-based care volunteers</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="2">CSOs</th>
                                            <th colspan="2">Private Sector</th>
                                            <th colspan="2">Government</th>
                                            <th colspan="2">SHACCOMs</th>
                                            <td rowspan="3"  class="data-group">CS1</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">Number of active home-based care volunteers registered this quarter</td>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['MAL']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['FEM']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['MAL']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['FEM']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['MAL']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['FEM']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['MAL']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS1']['FEM']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Home-based care visits</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Number of person-visits</th>
                                            <td rowspan="3"  class="data-group">CS2</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>CSOs</th>
                                            <th>Private Sector</th>
                                            <th>Government</th>
                                            <th>SHACCOMs</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Number of community home-based care person-visits this quarter</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS2']['']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS2']['']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS2']['']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP3['CS2']['']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end .section  --></div>

                                <div class="section">
                                    <h3><strong>E: TRAINING AND CAPACITY BUILDING FOR HIV - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4</strong></h3>
                                    <p style="font-weight: bold;">By Civil Society Organisations</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Training topic</th>
                                            <th colspan="3">Number of volunteers trained</th>
                                            <th colspan="3">Number of project staff trained</th>
                                            <th colspan="3">Number of employees trained</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownTypeTC1['TC1'])) + 2 ?>"  class="data-group">TC1A</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['CSOs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['CSOs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By Private Sector</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Training topic</th>
                                            <th colspan="3">Number of volunteers trained</th>
                                            <th colspan="3">Number of project staff trained</th>
                                            <th colspan="3">Number of employees trained</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownTypeTC1['TC1'])) + 2 ?>"  class="data-group">TC1B</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['Private Sector']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['Private Sector']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By Public Sector</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Training topic</th>
                                            <th colspan="3">Number of volunteers trained</th>
                                            <th colspan="3">Number of project staff trained</th>
                                            <th colspan="3">Number of employees trained</th>
                                            <td rowspan="<?php echo count($breackdownTypeTC1['TC1']) + 2 ?>"  class="data-group">TC1C</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique(array_unique($breackdownTypeTC1['TC1'])) as $valueTC1) {

                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['Government']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['Government']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['Government']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['Government']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['Government']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['Government']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">By SHACCOMs</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Training topic</th>
                                            <th colspan="3">Number of volunteers trained</th>
                                            <th colspan="3">Number of project staff trained</th>
                                            <th colspan="3">Number of employees trained</th>
                                            <td rowspan="<?php echo count(array_unique($breackdownTypeTC1['TC1'])) + 2 ?>"  class="data-group">TC1D</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        foreach (array_unique($breackdownTypeTC1['TC1']) as $valueTC1) {

                                            echo '<tr>';
                                            echo '<td>' . $organisationCategoryTC1[$valueTC1] . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['VOL'][$valueTC1]['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['VOL'][$valueTC1]['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFMAL = $totalValueHP4['TC1']['PSF'][$valueTC1]['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFFEM = $totalValueHP4['TC1']['PSF'][$valueTC1]['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1PSFTOT = ($TC1PSFMAL + $TC1PSFFEM), 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFMAL = $totalValueHP4['TC1']['NSF'][$valueTC1]['SHACCOMs']['MAL'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFFEM = $totalValueHP4['TC1']['NSF'][$valueTC1]['SHACCOMs']['FEM'], 0, ".", ",") . '</td>';
                                            echo '<td>' . number_format($TC1NSFTOT = ($TC1NSFMAL + $TC1NSFFEM), 0, ".", ",") . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Training of community-level organisations</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th>Training of community level organisations</th>
                                            <th>Within CSOs</th>
                                            <th>Within Private Sector</th>
                                            <th>Within Government</th>
                                            <th>Within SHACCOMs</th>
                                            <td rowspan="3"  class="data-group">TC2</td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Number of organisations at the community level trained in planning, implementation and management of HIV services this quarter</td>';
                                        echo '<td>' . number_format($totalValueHP4['TC2']['']['']['CSOs'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['TC2']['']['']['Private Sector'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['TC2']['']['']['Government'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['TC2']['']['']['SHACCOMs'][''], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end .section  --></div>
                                <div class="section">
                                    <h3><strong>F: MANAGEMENT AND COORDINATION OF HIV INTERVENTIONS - SUMMARY DATA FROM ZHAPMoS FORM 1, ZHAPMoS FORM 3 AND ZHAPMoS FORM 4</strong></h3>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <td></td>
                                            <th>CSOs</th>
                                            <th>Private Sector</th>
                                            <th>Government</th>
                                            <th>SHACCOMs</th>
                                            <td class="data-group"></td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>How many organisations have HIV work plans for the current financial year?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC1']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC1']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC1']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC1']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td class="data-group">MC1</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>How many organisations have indicated that funding was available in the last quarter to implement the HIV work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC3']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC3']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC3']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC3']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td class="data-group">MC3</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>How many organisations implemented their HIV work plans this quarter?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC5']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC5']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC5']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC5']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '<td class="data-group">MC5</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Funding</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th>CSOs</th>
                                            <th>Private Sector</th>
                                            <th>Government</th>
                                            <th>SHACCOMs</th>
                                            <td class="data-group"></td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td></td>';
                                        echo '<td>' . number_format($totalValueHP4['MC2']['']['']['CSOs'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC2']['']['']['Private Sector'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC2']['']['']['Government'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC2']['']['']['SHACCOMs'][''], 2, ".", ",") . '</td>';
                                        echo '<td class="data-group">MC2</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td></td>';
                                        echo '<td>' . number_format($totalValueHP4['MC4']['']['']['CSOs'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC4']['']['']['Private Sector'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC4']['']['']['Government'][''], 2, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueHP4['MC4']['']['']['SHACCOMs'][''], 2, ".", ",") . '</td>';
                                        echo '<td class="data-group">MC4</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Areas covered in work plan</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Number of organisations</th>
                                            <td rowspan="10" class="data-group">MC6</td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Within CSOs</th>
                                            <th>Within Private Sector</th>
                                            <th>Within Government</th>
                                            <th>Within SHACCOMs</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Is HIV prevention in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6a']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6a']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6a']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6a']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Is HIV treatment, care and support in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6b']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6b']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6b']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6b']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Are HIV impact mitigation services in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6c']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6c']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6c']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6c']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Is management in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6d']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6d']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6d']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6d']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Is planning in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6e']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6e']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6e']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6e']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>s coordination in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6f']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6f']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6f']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6f']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Is advocacy in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6g']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6g']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6g']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6g']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Is capacity building in your work plan?</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6h']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6h']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6h']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['MC6h']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th></th>
                                            <th>Within CSOs</th>
                                            <th>Within Private Sector</th>
                                            <th>Within Government</th>
                                            <th>Within SHACCOMs</th>
                                            <td rowspan="2" class="data-group">ME1</td>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>How many organisations attended an HIV feedback or data dissemination workshop at district level this quarter?</td>';
                                        echo '<td>' . number_format($totalValueMC['ME1a']['CSOs'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['ME1a']['Private Sector'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['ME1a']['Government'], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($totalValueMC['ME1a']['SHACCOMs'], 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end .section  --></div>

                                <div class="section">
                                    <h3><strong>G: SUMMARY DATA FROM ZHAPMoS FORM 2 (SCHOOLS)</strong></h3>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
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
                                            <td rowspan="2" class="data-group">CS1</td>
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


                                    <p style="font-weight: bold;">Life skills education on HIV</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Type of school</th>
                                            <th rowspan="2">Number of schools with teachers trained</th>
                                            <th colspan="3">Number of teachers trained in life skills</th>
                                            <th colspan="3">Number of trained teachers who taught life skills regularly</th>
                                            <td rowspan="7" class="data-group">CS2</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Government primary school</td>';
                                        echo '<td>' . number_format($B01GPSTOT = ($totalOrg['B01']['MAL']['Government primary schools'] + $totalOrg['B01']['FEM']['Government primary schools']
                                                + $totalOrg['B02']['MAL']['Government primary schools'] + $totalOrg['B02']['FEM']['Government primary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01MAL = $totalValueHP4['B01']['']['MAL']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01FEM = $totalValueHP4['B01']['']['FEM']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B01MAL + $B01FEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02MAL = $totalValueHP4['B02']['']['MAL']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02FEM = $totalValueHP4['B02']['']['FEM']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B02MAL + $B02FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Government secondary schools</td>';
                                        echo '<td>' . number_format($B01GSSTOT = ($totalOrg['B01']['MAL']['Government secondary schools'] + $totalOrg['B01']['FEM']['Government secondary schools']
                                                + $totalOrg['B02']['MAL']['Government secondary schools'] + $totalOrg['B02']['FEM']['Government secondary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01MAL = $totalValueHP4['B01']['']['MAL']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01FEM = $totalValueHP4['B01']['']['FEM']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B01MAL + $B01FEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02MAL = $totalValueHP4['B02']['']['MAL']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02FEM = $totalValueHP4['B02']['']['FEM']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B02MAL + $B02FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Private primary schools</td>';
                                        echo '<td>' . number_format($B01PPSTOT = ($totalOrg['B01']['MAL']['Private primary schools'] + $totalOrg['B01']['FEM']['Private primary schools']
                                                + $totalOrg['B02']['MAL']['Private primary schools'] + $totalOrg['B02']['FEM']['Private primary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01MAL = $totalValueHP4['B01']['']['MAL']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01FEM = $totalValueHP4['B01']['']['FEM']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B01MAL + $B01FEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02MAL = $totalValueHP4['B02']['']['MAL']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02FEM = $totalValueHP4['B02']['']['FEM']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B02MAL + $B02FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Private secondary schools</td>';
                                        echo '<td>' . number_format($B01PSSTOT = ($totalOrg['B01']['MAL']['Private secondary schools'] + $totalOrg['B01']['FEM']['Private secondary schools']
                                                + $totalOrg['B02']['MAL']['Private secondary schools'] + $totalOrg['B02']['FEM']['Private secondary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01MAL = $totalValueHP4['B01']['']['MAL']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B01FEM = $totalValueHP4['B01']['']['FEM']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B01MAL + $B01FEM), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02MAL = $totalValueHP4['B02']['']['MAL']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B02FEM = $totalValueHP4['B02']['']['FEM']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B02MAL + $B02FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Total</td><td>' . number_format(($B01GPSTOT + $B01GSSTOT + $B01PPSTOT + $B01PSSTOT), 0, ".", ",") . '</td><td></td><td></td><td></td><td></td><td></td><td></td>';
                                        echo '</tr>';
                                        ?>
                                    </table>

                                    <p style="font-weight: bold;">Presence of clubs in schools that have HIV prevention programmes</p>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table form-summery" style="margin-bottom: 20px;">
                                        <tr>
                                            <th rowspan="2">Type of school</th>
                                            <th rowspan="2">Number of schools with youth clubs</th>
                                            <th colspan="3">Number of youth club members</th>
                                            <td rowspan="7" class="data-group">CS3,4</td>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        echo '<tr>';
                                        echo '<td>Government primary school</td>';
                                        echo '<td>' . number_format(($totalOrg['B03']['MAL']['Government primary schools'] + $totalOrg['B03']['FEM']['Government primary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03MAL = $totalValueHP4['B03']['']['MAL']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03FEM = $totalValueHP4['B03']['']['FEM']['Government primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B03MAL + $B03FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Government secondary schools</td>';
                                        echo '<td>' . number_format(($totalOrg['B03']['MAL']['Government secondary schools'] + $totalOrg['B03']['FEM']['Government secondary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03MAL = $totalValueHP4['B03']['']['MAL']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03FEM = $totalValueHP4['B03']['']['FEM']['Government secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B03MAL + $B03FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Private primary schools</td>';
                                        echo '<td>' . number_format(($totalOrg['B03']['MAL']['Private primary schools'] + $totalOrg['B03']['FEM']['Private primary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03MAL = $totalValueHP4['B03']['']['MAL']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03FEM = $totalValueHP4['B03']['']['FEM']['Private primary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B03MAL + $B03FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '<td>Private secondary schools</td>';
                                        echo '<td>' . number_format(($totalOrg['B03']['MAL']['Private secondary schools'] + $totalOrg['B03']['FEM']['Private secondary schools']), 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03MAL = $totalValueHP4['B03']['']['MAL']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format($B03FEM = $totalValueHP4['B03']['']['FEM']['Private secondary schools'][''], 0, ".", ",") . '</td>';
                                        echo '<td>' . number_format(($B03MAL + $B03FEM), 0, ".", ",") . '</td>';
                                        echo '</tr>';
                                        ?>
                                    </table>
                                    <!-- end sheet-wrapper  --></div>
                                <!-- end #report --></div>
                            <!-- end .report-wrapper --></div>
                        <?php
                    } else {
                        echo '<div class="error">Please provide period and geo area!</div>';
                    }
                    ?>
                    <!-- end .content --></div>
                <?php include '../../includes/footer.php'; ?>
                <!-- end .container --></div>
    </body>
    <script type="text/javascript">

            $('.printouts').attr("id", "current");
            var i = $('h3#current').index('.menuheader') - 1;

            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
                defaultexpanded: [i], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: true, //Should contents open by default be animated into view?
                persiststate: false, //persist state of opened contents within browser session?
                toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            });
    </script>
</html>
