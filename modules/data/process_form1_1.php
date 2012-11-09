<?php


require '../../config/config.php';
require '../../functions/general_functions.php';


$form_no = clean($_POST['form_no']);
//getting form data from the form for section 01 
$answ11 = clean($_POST['answ11']);
$full_name = clean($_POST['full_name']);
$answ13 = clean($_POST['answ13']);
$answ14 = clean($_POST['answ14']);
$answ15 = clean($_POST['answ15']);
$answ16 = clean($_POST['answ16']);
$answ17 = clean($_POST['answ17']);
$qn05 = clean($_POST['qn05']);

//getting form data for section 02
$answ21 = clean($_POST['answ21']);
$MnE = clean($_POST['MnE']);
$qn11 = clean($_POST['qn11']);
$answ21 = clean($_POST['answ21']);
$rout = clean($_POST['rout']);
$periodic = clean($_POST['periodic']);
$survey = clean($_POST['survey']);
$other = clean($_POST['other']);
$req = clean($_POST['req']);
$un = clean($_POST['un']);
$bilateral = clean($_POST['bilateral']);
$ngo = clean($_POST['ngo']);
$org = clean($_POST['org']);
$y = clean($_POST['y']);
$no = clean($_POST['no']);
$s = clean($_POST['s']);
$qn025 = clean($_POST['qn025']);
$que26 = clean($_POST['que26']);


//getting form data from section 03
$answ31 = clean($_POST['answ31']);
$answ32 = clean($_POST['answ32']);
$answ33 = clean($_POST['answ33']);
$qn030 = clean($_POST['qn030']);
$answ35 = clean($_POST['answ35']);
$luck = clean($_POST['luck']);
$zac = clean($_POST['zac']);
$zanhid = clean($_POST['zanhid']);
$answ35 = clean($_POST['answ35']);
$answ310 = clean($_POST['answ310']);
$answ37 = clean($_POST['answ37']);
$answ38 = clean($_POST['answ38']);
$qn0039 = clean($_POST['qn0039']);
$qn040 = clean($_POST['qn040']);


//getting form data from section 04
$answ41 = clean($_POST['answ41']);
$answ42 = clean($_POST['answ42']);
$answ43 = clean($_POST['answ43']);
$answ44 = clean($_POST['answ44']);
$answ45 = clean($_POST['answ45']);
$answ46 = clean($_POST['answ46']);
$answ48 = clean($_POST['answ48']);
$answ52 = clean($_POST['answ52']);
$answ49 = clean($_POST['answ49']);
$answ50 = clean($_POST['answ50']);
$qn059 = clean($_POST['qn059']);


//getting form data from section 05
$answ60 = clean($_POST['answ60']);
$answ61 = clean($_POST['answ61']);
$answ62 = clean($_POST['answ62']);
$answ63 = clean($_POST['answ63']);
$answ64 = clean($_POST['answ64']);
$answ65 = clean($_POST['answ65']);
$answ66 = clean($_POST['answ66']);
$qn67= clean($_POST['qn67']);
$remedial= clean($_POST['remedial']);

$query_answ = "ISERT INTO `tblzhsanswers`
                          (FormSerialID, ZhsQuestionID, AnswerText, AnswerNumber,
                           AnswerID, AnswerOrgPersonID, AnswerDate)
                    VALUES (";
 if(!empty($answ11)){ $query_answ .= "'" . $form_no . "', '71', '', '', '" . $answ11. "', '', '')"; }
 if(!empty($answ11)){ $query_answ .= ",('" . $form_no . "', '71', '', '', '" . $answ11. "', '', '')"; }
 if(!empty($answ11)){ $query_answ .= ",('" . $form_no . "', '71', '', '', '" . $answ11. "', '', '')"; }
 if(!empty($answ11)){ $query_answ .= ",('" . $form_no . "', '71', '', '', '" . $answ11. "', '', '')"; }
 if(!empty($answ11)){ $query_answ .= ",('" . $form_no . "', '71', '', '', '" . $answ11. "', '', '')"; }
 
 echo $query_answ;
 exit;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
