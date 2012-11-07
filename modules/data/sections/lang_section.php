<?php

$lang = clean($_GET['lang']);

if (!empty($lang) && isset($lang)) {
    switch ($lang) {
        case "en": // In case selected language is English, load English version form.

            include 'lang/en.php';

            $query_section = "SELECT `ZhaFigureCode`, `ZhaFigureDescriptionEnglish`,
                          typ1.`BreakdownTypeDescription` AS BreakdownTypeDescription1,
                          typ2.`BreakdownTypeDescription` AS BreakdownTypeDescription2,
                          typ3.`BreakdownTypeDescription` AS BreakdownTypeDescription3,
                          typ4.`BreakdownTypeDescription` AS BreakdownTypeDescription4
                     FROM tblzhasetupfigures fig
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ1
                       ON fig.`BreakdownCategoryID1` = typ1.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ2
                       ON fig.`BreakdownCategoryID2` = typ2.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ3
                       ON fig.`BreakdownCategoryID3` = typ3.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ4
                       ON fig.`BreakdownCategoryID4` = typ4.`BreakdownCategoryID`";

            $result_section = mysql_query($query_section) or die(mysql_error());

            while ($section = mysql_fetch_array($result_section)) {
                $ZhaFigureDescription[$section['ZhaFigureCode']][] = $section['ZhaFigureDescriptionEnglish'];
                $BreakdownTypeDescription1[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription1'];
                $BreakdownTypeDescription2[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription2'];
                $BreakdownTypeDescription3[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription3'];
                $BreakdownTypeDescription4[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription4'];
            }

            $query_setup_qns = "SELECT `ZhaQuestionCode`, `ZhaQuestionDescriptionEnglish`
                                  FROM tblzhasetupquestions";

            $result_setup_qns = mysql_query($query_setup_qns) or die(mysql_error());

            while ($sectionqn = mysql_fetch_array($result_setup_qns)) {
                $ZhaFigureDescriptionqn[$sectionqn['ZhaQuestionCode']][] = $sectionqn['ZhaQuestionDescriptionEnglish'];
            }

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'HVI'
                             ORDER BY `BreakdownTypeDescription` ASC";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            $query_risk = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdownrisk
                             FROM `tblzhasetupfigurebreakdowntypes`
                            WHERE `BreakdownCategoryID` = 'MRV'
                         ORDER BY `BreakdownTypeDescription` ASC";

            $result_risk = mysql_query($query_risk) or die(mysql_error());

            $query_training = "SELECT `BreakdownTypeID`, `BreakdownTypeDescription` AS breakdowntraining
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'TRG'
                             ORDER BY `BreakdownTypeDescription` ASC";

            $result_training = mysql_query($query_training) or die(mysql_error());

            break;

        case "sw": // In case selected language is Kiswahili, load Kiswahili version form.

            include 'lang/sw.php';

            $query_section = "SELECT `ZhaFigureCode`, `ZhaFigureDescriptionSwahili`,
                          typ1.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription1,
                          typ2.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription2,
                          typ3.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription3,
                          typ4.`BreakdownTypeDescriptionSwahili` AS BreakdownTypeDescription4
                     FROM tblzhasetupfigures fig
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ1
                       ON fig.`BreakdownCategoryID1` = typ1.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ2
                       ON fig.`BreakdownCategoryID2` = typ2.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ3
                       ON fig.`BreakdownCategoryID3` = typ3.`BreakdownCategoryID`
                LEFT JOIN tblzhasetupfigurebreakdowntypes typ4
                       ON fig.`BreakdownCategoryID4` = typ4.`BreakdownCategoryID`";

            $result_section = mysql_query($query_section) or die(mysql_error());

            while ($section = mysql_fetch_array($result_section)) {
                $ZhaFigureDescription[$section['ZhaFigureCode']][] = $section['ZhaFigureDescriptionSwahili'];
                $BreakdownTypeDescription1[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription1'];
                $BreakdownTypeDescription2[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription2'];
                $BreakdownTypeDescription3[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription3'];
                $BreakdownTypeDescription4[$section['ZhaFigureCode']][] = $section['BreakdownTypeDescription4'];
            }

            $query_setup_qns = "SELECT `ZhaQuestionCode`, `ZhaQuestionDescriptionSwahili`
                                  FROM tblzhasetupquestions";

            $result_setup_qns = mysql_query($query_setup_qns) or die(mysql_error());

            while ($sectionqn = mysql_fetch_array($result_setup_qns)) {
                $ZhaFigureDescriptionqn[$sectionqn['ZhaQuestionCode']][] = $sectionqn['ZhaQuestionDescriptionSwahili'];
            }

            $query_hiv_intv = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdown
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'HVI'
                             ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_hiv_intv = mysql_query($query_hiv_intv) or die(mysql_error());

            $query_risk = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdownrisk
                             FROM `tblzhasetupfigurebreakdowntypes`
                            WHERE `BreakdownCategoryID` = 'MRV'
                         ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_risk = mysql_query($query_risk) or die(mysql_error());

            $query_training = "SELECT `BreakdownTypeID`, `BreakdownTypeDescriptionSwahili` AS breakdowntraining
                                 FROM `tblzhasetupfigurebreakdowntypes`
                                WHERE `BreakdownCategoryID` = 'TRG'
                             ORDER BY `BreakdownTypeDescriptionSwahili` ASC";

            $result_training = mysql_query($query_training) or die(mysql_error());

            break;

        default:
            exit(0);
            break;
    }
}
?>
