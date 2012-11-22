<?php

$query_ans = "SELECT `FormSerialNumber`, `ZhaFigureCode`, `BreakdownTypeID1`,
                      `BreakdownTypeID2`, `BreakdownTypeID3`, `BreakdownTypeID4`,
                      `ZhaFigureValue`, CONCAT(BreakdownTypeID1, '-', BreakdownTypeID2,  '-',
                      BreakdownTypeID3, '-', BreakdownTypeID4, '-', ZhaFigureValue) AS HPanswer,
                      CONCAT(BreakdownTypeID1, '-', BreakdownTypeID2,  '-',
                      BreakdownTypeID3, '-', BreakdownTypeID4, '-', ZhaFigureValue) AS HP2answer
                 FROM tblzhafigures
                WHERE `FormSerialNumber` = '$form_id'";

$result_ans = mysql_query($query_ans) or die(mysql_error());

while ($ans = mysql_fetch_array($result_ans)) {

    $fig_ans[$ans['ZhaFigureCode']][$ans['BreakdownTypeID1']][$ans['BreakdownTypeID2']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']] = $ans['ZhaFigureValue'];
    $fig_anshs[$ans['ZhaFigureCode']][$ans['BreakdownTypeID3']][$ans['BreakdownTypeID4']][] = $ans['HPanswer'];
    $fig_h2[$ans['ZhaFigureCode']][$ans['BreakdownTypeID2']][$ans['BreakdownTypeID3']][] = $ans['HP2answer'];
}

$figval_1 = $fig_anshs['HP1']['Y25']['MAL'][0];
$expfig_1 = explode("-", $figval_1);
$BreakdownTypeID1_1 = $expfig_1[0];
$BreakdownTypeID2_1 = $expfig_1[1];
$ZhaFigureValue_1 = $expfig_1[4];

$figval_2 = $fig_anshs['HP1']['Y25']['MAL'][1];
$expfig_2 = explode("-", $figval_2);
$BreakdownTypeID1_2 = $expfig_2[0];
$BreakdownTypeID2_2 = $expfig_2[1];
$ZhaFigureValue_2 = $expfig_2[4];

$figval_3 = $fig_anshs['HP1']['Y25']['MAL'][2];
$expfig_3 = explode("-", $figval_3);
$BreakdownTypeID1_3 = $expfig_3[0];
$BreakdownTypeID2_3 = $expfig_3[1];
$ZhaFigureValue_3 = $expfig_3[4];

$figval_4 = $fig_anshs['HP1']['Y25']['MAL'][3];
$expfig_4 = explode("-", $figval_4);
$BreakdownTypeID1_4 = $expfig_4[0];
$BreakdownTypeID2_4 = $expfig_4[1];
$ZhaFigureValue_4 = $expfig_4[4];

$figval_5 = $fig_anshs['HP1']['Y25']['MAL'][4];
$expfig_5 = explode("-", $figval_5);
$BreakdownTypeID1_5 = $expfig_5[0];
$BreakdownTypeID2_5 = $expfig_5[1];
$ZhaFigureValue_5 = $expfig_5[4];

$figval_6 = $fig_anshs['HP1']['Y25']['MAL'][5];
$expfig_6 = explode("-", $figval_6);
$BreakdownTypeID1_6 = $expfig_6[0];
$BreakdownTypeID2_6 = $expfig_6[1];
$ZhaFigureValue_6 = $expfig_6[4];

$figval_1f = $fig_anshs['HP1']['Y25']['FEM'][0];
$expfig_1f = explode("-", $figval_1f);
$BreakdownTypeID1_1f = $expfig_1f[0];
$BreakdownTypeID2_1f = $expfig_1f[1];
$ZhaFigureValue_1f = $expfig_1f[4];

$figval_2f = $fig_anshs['HP1']['Y25']['FEM'][1];
$expfig_2f = explode("-", $figval_2f);
$BreakdownTypeID1_2f = $expfig_2f[0];
$BreakdownTypeID2_2f = $expfig_2f[1];
$ZhaFigureValue_2f = $expfig_2f[4];

$figval_3f = $fig_anshs['HP1']['Y25']['FEM'][2];
$expfig_3f = explode("-", $figval_3f);
$BreakdownTypeID1_3f = $expfig_3f[0];
$BreakdownTypeID2_3f = $expfig_3f[1];
$ZhaFigureValue_3f = $expfig_3f[4];

$figval_4f = $fig_anshs['HP1']['Y25']['FEM'][3];
$expfig_4f = explode("-", $figval_4f);
$BreakdownTypeID1_4f = $expfig_4f[0];
$BreakdownTypeID2_4f = $expfig_4f[1];
$ZhaFigureValue_4f = $expfig_4f[4];

$figval_5f = $fig_anshs['HP1']['Y25']['FEM'][4];
$expfig_5f = explode("-", $figval_5f);
$BreakdownTypeID1_5f = $expfig_5f[0];
$BreakdownTypeID2_5f = $expfig_5f[1];
$ZhaFigureValue_5f = $expfig_5f[4];

$figval_6f = $fig_anshs['HP1']['Y25']['FEM'][5];
$expfig_6f = explode("-", $figval_6f);
$BreakdownTypeID1_6f = $expfig_6f[0];
$BreakdownTypeID2_6f = $expfig_6f[1];
$ZhaFigureValue_6f = $expfig_6f[4];


$figval_1o = $fig_anshs['HP1']['25O']['MAL'][0];
$expfig_1o = explode("-", $figval_1o);
$BreakdownTypeID1_1o = $expfig_1o[0];
$BreakdownTypeID2_1o = $expfig_1o[1];
$ZhaFigureValue_1o = $expfig_1o[4];

$figval_2o = $fig_anshs['HP1']['25O']['MAL'][1];
$expfig_2o = explode("-", $figval_2o);
$BreakdownTypeID1_2o = $expfig_2o[0];
$BreakdownTypeID2_2o = $expfig_2o[1];
$ZhaFigureValue_2o = $expfig_2o[4];

$figval_3o = $fig_anshs['HP1']['25O']['MAL'][2];
$expfig_3o = explode("-", $figval_3o);
$BreakdownTypeID1_3o = $expfig_3o[0];
$BreakdownTypeID2_3o = $expfig_3o[1];
$ZhaFigureValue_3o = $expfig_3o[4];

$figval_4o = $fig_anshs['HP1']['25O']['MAL'][3];
$expfig_4o = explode("-", $figval_4o);
$BreakdownTypeID1_4o = $expfig_4o[0];
$BreakdownTypeID2_4o = $expfig_4o[1];
$ZhaFigureValue_4o = $expfig_4o[4];

$figval_5o = $fig_anshs['HP1']['25O']['MAL'][4];
$expfig_5o = explode("-", $figval_5o);
$BreakdownTypeID1_5o = $expfig_5o[0];
$BreakdownTypeID2_5o = $expfig_5o[1];
$ZhaFigureValue_5o = $expfig_5o[4];

$figval_6o = $fig_anshs['HP1']['25O']['MAL'][5];
$expfig_6o = explode("-", $figval_6o);
$BreakdownTypeID1_6o = $expfig_6o[0];
$BreakdownTypeID2_6o = $expfig_6o[1];
$ZhaFigureValue_6o = $expfig_6o[4];

$figval_1fo = $fig_anshs['HP1']['25O']['FEM'][0];
$expfig_1fo = explode("-", $figval_1fo);
$BreakdownTypeID1_1fo = $expfig_1fo[0];
$BreakdownTypeID2_1fo = $expfig_1fo[1];
$ZhaFigureValue_1fo = $expfig_1fo[4];

$figval_2fo = $fig_anshs['HP1']['25O']['FEM'][1];
$expfig_2fo = explode("-", $figval_2fo);
$BreakdownTypeID1_2fo = $expfig_2fo[0];
$BreakdownTypeID2_2fo = $expfig_2fo[1];
$ZhaFigureValue_2fo = $expfig_2fo[4];

$figval_3fo = $fig_anshs['HP1']['25O']['FEM'][2];
$expfig_3fo = explode("-", $figval_3fo);
$BreakdownTypeID1_3fo = $expfig_3fo[0];
$BreakdownTypeID2_3fo = $expfig_3fo[1];
$ZhaFigureValue_3fo = $expfig_3fo[4];

$figval_4fo = $fig_anshs['HP1']['25O']['FEM'][3];
$expfig_4fo = explode("-", $figval_4fo);
$BreakdownTypeID1_4fo = $expfig_4fo[0];
$BreakdownTypeID2_4fo = $expfig_4fo[1];
$ZhaFigureValue_4fo = $expfig_4fo[4];

$figval_5fo = $fig_anshs['HP1']['25O']['FEM'][4];
$expfig_5fo = explode("-", $figval_5fo);
$BreakdownTypeID1_5fo = $expfig_5fo[0];
$BreakdownTypeID2_5fo = $expfig_5fo[1];
$ZhaFigureValue_5fo = $expfig_5fo[4];

$figval_6fo = $fig_anshs['HP1']['25O']['FEM'][5];
$expfig_6fo = explode("-", $figval_6fo);
$BreakdownTypeID1_6fo = $expfig_6fo[0];
$BreakdownTypeID2_6fo = $expfig_6fo[1];
$ZhaFigureValue_6fo = $expfig_6fo[4];
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

$figvalh2_1 = $fig_h2['HP2']['Y25']['MAL'][0];
$expfigh2_1 = explode("-", $figvalh2_1);
$BreakdownTypeID1h2_1 = $expfigh2_1[0];
$ZhaFigureValueh2_1 = $expfigh2_1[4];

$figvalh2_2 = $fig_h2['HP2']['Y25']['MAL'][1];
$expfigh2_2 = explode("-", $figvalh2_2);
$BreakdownTypeID1h2_2 = $expfigh2_2[0];
$ZhaFigureValueh2_2 = $expfigh2_2[4];

$figvalh2_3 = $fig_h2['HP2']['Y25']['MAL'][2];
$expfigh2_3 = explode("-", $figvalh2_3);
$BreakdownTypeID1h2_3 = $expfigh2_3[0];
$ZhaFigureValueh2_3 = $expfigh2_3[4];

$figvalh2_4 = $fig_h2['HP2']['Y25']['MAL'][3];
$expfigh2_4 = explode("-", $figvalh2_4);
$BreakdownTypeID1h2_4 = $expfigh2_4[0];
$ZhaFigureValueh2_4 = $expfigh2_4[4];

$figvalh2_5 = $fig_h2['HP2']['Y25']['MAL'][4];
$expfigh2_5 = explode("-", $figvalh2_5);
$BreakdownTypeID1h2_5 = $expfigh2_5[0];
$ZhaFigureValueh2_5 = $expfigh2_5[4];

$figvalh2_6 = $fig_h2['HP2']['Y25']['MAL'][5];
$expfigh2_6 = explode("-", $figvalh2_6);
$BreakdownTypeID1h2_6 = $expfigh2_6[0];
$ZhaFigureValueh2_6 = $expfigh2_6[4];

$figvalh2_1f = $fig_h2['HP2']['Y25']['FEM'][0];
$expfigh2_1f = explode("-", $figvalh2_1f);
$BreakdownTypeID1h2_1f = $expfigh2_1f[0];
$ZhaFigureValueh2_1f = $expfigh2_1f[4];

$figvalh2_2f = $fig_h2['HP2']['Y25']['FEM'][1];
$expfigh2_2f = explode("-", $figvalh2_2f);
$BreakdownTypeID1h2_2f = $expfigh2_2f[0];
$ZhaFigureValueh2_2f = $expfigh2_2f[4];

$figvalh2_3f = $fig_h2['HP2']['Y25']['FEM'][2];
$expfigh2_3f = explode("-", $figvalh2_3f);
$BreakdownTypeID1h2_3f = $expfigh2_3f[0];
$ZhaFigureValueh2_3f = $expfigh2_3f[4];

$figvalh2_4f = $fig_h2['HP2']['Y25']['FEM'][3];
$expfigh2_4f = explode("-", $figvalh2_4f);
$BreakdownTypeID1h2_4f = $expfigh2_4f[0];
$ZhaFigureValueh2_4f = $expfigh2_4f[4];

$figvalh2_5f = $fig_h2['HP2']['Y25']['FEM'][4];
$expfigh2_5f = explode("-", $figvalh2_5f);
$BreakdownTypeID1h2_5f = $expfigh2_5f[0];
$ZhaFigureValueh2_5f = $expfigh2_5f[4];

$figvalh2_6f = $fig_h2['HP2']['Y25']['FEM'][5];
$expfigh2_6f = explode("-", $figvalh2_6f);
$BreakdownTypeID1h2_6f = $expfigh2_6f[0];
$ZhaFigureValueh2_6f = $expfigh2_6f[4];


$figvalh2_1o = $fig_h2['HP2']['25O']['MAL'][0];
$expfigh2_1o = explode("-", $figvalh2_1o);
$BreakdownTypeID1h2_1o = $expfigh2_1o[0];
$ZhaFigureValueh2_1o = $expfigh2_1o[4];

$figvalh2_2o = $fig_h2['HP2']['25O']['MAL'][1];
$expfigh2_2o = explode("-", $figvalh2_2o);
$BreakdownTypeID1h2_2o = $expfigh2_2o[0];
$ZhaFigureValueh2_2o = $expfigh2_2o[4];

$figvalh2_3o = $fig_h2['HP2']['25O']['MAL'][2];
$expfigh2_3o = explode("-", $figvalh2_3o);
$BreakdownTypeID1h2_3o = $expfigh2_3o[0];
$ZhaFigureValueh2_3o = $expfigh2_3o[4];

$figvalh2_4o = $fig_h2['HP2']['25O']['MAL'][3];
$expfigh2_4o = explode("-", $figvalh2_4o);
$BreakdownTypeID1h2_4o = $expfigh2_4o[0];
$ZhaFigureValueh2_4o = $expfigh2_4o[4];

$figvalh2_5o = $fig_h2['HP2']['25O']['MAL'][4];
$expfigh2_5o = explode("-", $figvalh2_5o);
$BreakdownTypeID1h2_5o = $expfigh2_5o[0];
$ZhaFigureValueh2_5o = $expfigh2_5o[4];

$figvalh2_6o = $fig_h2['HP2']['25O']['MAL'][5];
$expfigh2_6o = explode("-", $figvalh2_6o);
$BreakdownTypeID1h2_6o = $expfigh2_6o[0];
$ZhaFigureValueh2_6o = $expfigh2_6o[4];

$figvalh2_1fo = $fig_h2['HP2']['25O']['FEM'][0];
$expfigh2_1fo = explode("-", $figvalh2_1fo);
$BreakdownTypeID1h2_1fo = $expfigh2_1fo[0];
$ZhaFigureValueh2_1fo = $expfigh2_1fo[4];

$figvalh2_2fo = $fig_h2['HP2']['25O']['FEM'][1];
$expfigh2_2fo = explode("-", $figvalh2_2fo);
$BreakdownTypeID1h2_2fo = $expfigh2_2fo[0];
$ZhaFigureValueh2_2fo = $expfigh2_2fo[4];

$figvalh2_3fo = $fig_h2['HP2']['25O']['FEM'][2];
$expfigh2_3fo = explode("-", $figvalh2_3fo);
$BreakdownTypeID1h2_3fo = $expfigh2_3fo[0];
$ZhaFigureValueh2_3fo = $expfigh2_3fo[4];

$figvalh2_4fo = $fig_h2['HP2']['25O']['FEM'][3];
$expfigh2_4fo = explode("-", $figvalh2_4fo);
$BreakdownTypeID1h2_4fo = $expfigh2_4fo[0];
$ZhaFigureValueh2_4fo = $expfigh2_4fo[4];

$figvalh2_5fo = $fig_h2['HP2']['25O']['FEM'][4];
$expfigh2_5fo = explode("-", $figvalh2_5fo);
$BreakdownTypeID1h2_5fo = $expfigh2_5fo[0];
$ZhaFigureValueh2_5fo = $expfigh2_5fo[4];

$figvalh2_6fo = $fig_h2['HP2']['25O']['FEM'][5];
$expfigh2_6fo = explode("-", $figvalh2_6fo);
$BreakdownTypeID1h2_6fo = $expfigh2_6fo[0];
$ZhaFigureValueh2_6fo = $expfigh2_6fo[4];
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */


$figvaltc_1 = $fig_h2['TC1']['VOL']['MAL'][0];
$expfigtc_1 = explode("-", $figvaltc_1);
$BreakdownTypeID1tc_1 = $expfigtc_1[0];
$ZhaFigureValuetc_1 = $expfigtc_1[4];

$figvaltc_2 = $fig_h2['TC1']['VOL']['MAL'][1];
$expfigtc_2 = explode("-", $figvaltc_2);
$BreakdownTypeID1tc_2 = $expfigtc_2[0];
$ZhaFigureValuetc_2 = $expfigtc_2[4];

$figvaltc_3 = $fig_h2['TC1']['VOL']['MAL'][2];
$expfigtc_3 = explode("-", $figvaltc_3);
$BreakdownTypeID1tc_3 = $expfigtc_3[0];
$ZhaFigureValuetc_3 = $expfigtc_3[4];

$figvaltc_4 = $fig_h2['TC1']['VOL']['MAL'][3];
$expfigtc_4 = explode("-", $figvaltc_4);
$BreakdownTypeID1tc_4 = $expfigtc_4[0];
$ZhaFigureValuetc_4 = $expfigtc_4[4];

$figvaltc_5 = $fig_h2['TC1']['VOL']['MAL'][4];
$expfigtc_5 = explode("-", $figvaltc_5);
$BreakdownTypeID1tc_5 = $expfigtc_5[0];
$ZhaFigureValuetc_5 = $expfigtc_5[4];

$figvaltc_6 = $fig_h2['TC1']['VOL']['MAL'][5];
$expfigtc_6 = explode("-", $figvaltc_6);
$BreakdownTypeID1tc_6 = $expfigtc_6[0];
$ZhaFigureValuetc_6 = $expfigtc_6[4];

$figvaltc_7 = $fig_h2['TC1']['VOL']['MAL'][6];
$expfigtc_7 = explode("-", $figvaltc_7);
$BreakdownTypeID1tc_7 = $expfigtc_7[0];
$ZhaFigureValuetc_7 = $expfigtc_7[4];

$figvaltc_8 = $fig_h2['TC1']['VOL']['MAL'][7];
$expfigtc_8 = explode("-", $figvaltc_8);
$BreakdownTypeID1tc_8 = $expfigtc_8[0];
$ZhaFigureValuetc_8 = $expfigtc_8[4];

$figvaltc_1f = $fig_h2['TC1']['VOL']['FEM'][0];
$expfigtc_1f = explode("-", $figvaltc_1f);
$BreakdownTypeID1tc_1f = $expfigtc_1f[0];
$ZhaFigureValuetc_1f = $expfigtc_1f[4];

$figvaltc_2f = $fig_h2['TC1']['VOL']['FEM'][1];
$expfigtc_2f = explode("-", $figvaltc_2f);
$BreakdownTypeID1tc_2f = $expfigtc_2f[0];
$ZhaFigureValuetc_2f = $expfigtc_2f[4];

$figvaltc_3f = $fig_h2['TC1']['VOL']['FEM'][2];
$expfigtc_3f = explode("-", $figvaltc_3f);
$BreakdownTypeID1tc_3f = $expfigtc_3f[0];
$ZhaFigureValuetc_3f = $expfigtc_3f[4];

$figvaltc_4f = $fig_h2['TC1']['VOL']['FEM'][3];
$expfigtc_4f = explode("-", $figvaltc_4f);
$BreakdownTypeID1tc_4f = $expfigtc_4f[0];
$ZhaFigureValuetc_4f = $expfigtc_4f[4];

$figvaltc_5f = $fig_h2['TC1']['VOL']['FEM'][4];
$expfigtc_5f = explode("-", $figvaltc_5f);
$BreakdownTypeID1tc_5f = $expfigtc_5f[0];
$ZhaFigureValuetc_5f = $expfigtc_5f[4];

$figvaltc_6f = $fig_h2['TC1']['VOL']['FEM'][5];
$expfigtc_6f = explode("-", $figvaltc_6f);
$BreakdownTypeID1tc_6f = $expfigtc_6f[0];
$ZhaFigureValuetc_6f = $expfigtc_6f[4];

$figvaltc_7f = $fig_h2['TC1']['VOL']['FEM'][6];
$expfigtc_7f = explode("-", $figvaltc_7f);
$BreakdownTypeID1tc_7f = $expfigtc_7f[0];
$ZhaFigureValuetc_7f = $expfigtc_7f[4];

$figvaltc_8f = $fig_h2['TC1']['VOL']['FEM'][7];
$expfigtc_8f = explode("-", $figvaltc_8f);
$BreakdownTypeID1tc_8f = $expfigtc_8f[0];
$ZhaFigureValuetc_8f = $expfigtc_8f[4];


$figvaltc_1o = $fig_h2['TC1']['PSF']['MAL'][0];
$expfigtc_1o = explode("-", $figvaltc_1o);
$BreakdownTypeID1tc_1o = $expfigtc_1o[0];
$ZhaFigureValuetc_1o = $expfigtc_1o[4];

$figvaltc_2o = $fig_h2['TC1']['PSF']['MAL'][1];
$expfigtc_2o = explode("-", $figvaltc_2o);
$BreakdownTypeID1tc_2o = $expfigtc_2o[0];
$ZhaFigureValuetc_2o = $expfigtc_2o[4];

$figvaltc_3o = $fig_h2['TC1']['PSF']['MAL'][2];
$expfigtc_3o = explode("-", $figvaltc_3o);
$BreakdownTypeID1tc_3o = $expfigtc_3o[0];
$ZhaFigureValuetc_3o = $expfigtc_3o[4];

$figvaltc_4o = $fig_h2['TC1']['PSF']['MAL'][3];
$expfigtc_4o = explode("-", $figvaltc_4o);
$BreakdownTypeID1tc_4o = $expfigtc_4o[0];
$ZhaFigureValuetc_4o = $expfigtc_4o[4];

$figvaltc_5o = $fig_h2['TC1']['PSF']['MAL'][4];
$expfigtc_5o = explode("-", $figvaltc_5o);
$BreakdownTypeID1tc_5o = $expfigtc_5o[0];
$ZhaFigureValuetc_5o = $expfigtc_5o[4];

$figvaltc_6o = $fig_h2['TC1']['PSF']['MAL'][5];
$expfigtc_6o = explode("-", $figvaltc_6o);
$BreakdownTypeID1tc_6o = $expfigtc_6o[0];
$ZhaFigureValuetc_6o = $expfigtc_6o[4];

$figvaltc_7o = $fig_h2['TC1']['PSF']['MAL'][6];
$expfigtc_7o = explode("-", $figvaltc_7o);
$BreakdownTypeID1tc_7o = $expfigtc_7o[0];
$ZhaFigureValuetc_7o = $expfigtc_7o[4];

$figvaltc_8o = $fig_h2['TC1']['PSF']['MAL'][7];
$expfigtc_8o = explode("-", $figvaltc_8o);
$BreakdownTypeID1tc_8o = $expfigtc_8o[0];
$ZhaFigureValuetc_8o = $expfigtc_8o[4];

$figvaltc_1fo = $fig_h2['TC1']['PSF']['FEM'][0];
$expfigtc_1fo = explode("-", $figvaltc_1fo);
$BreakdownTypeID1tc_1fo = $expfigtc_1fo[0];
$ZhaFigureValuetc_1fo = $expfigtc_1fo[4];

$figvaltc_2fo = $fig_h2['TC1']['PSF']['FEM'][1];
$expfigtc_2fo = explode("-", $figvaltc_2fo);
$BreakdownTypeID1tc_2fo = $expfigtc_2fo[0];
$ZhaFigureValuetc_2fo = $expfigtc_2fo[4];

$figvaltc_3fo = $fig_h2['TC1']['PSF']['FEM'][2];
$expfigtc_3fo = explode("-", $figvaltc_3fo);
$BreakdownTypeID1tc_3fo = $expfigtc_3fo[0];
$ZhaFigureValuetc_3fo = $expfigtc_3fo[4];

$figvaltc_4fo = $fig_h2['TC1']['PSF']['FEM'][3];
$expfigtc_4fo = explode("-", $figvaltc_4fo);
$BreakdownTypeID1tc_4fo = $expfigtc_4fo[0];
$ZhaFigureValuetc_4fo = $expfigtc_4fo[4];

$figvaltc_5fo = $fig_h2['TC1']['PSF']['FEM'][4];
$expfigtc_5fo = explode("-", $figvaltc_5fo);
$BreakdownTypeID1tc_5fo = $expfigtc_5fo[0];
$ZhaFigureValuetc_5fo = $expfigtc_5fo[4];

$figvaltc_6fo = $fig_h2['TC1']['PSF']['FEM'][5];
$expfigtc_6fo = explode("-", $figvaltc_6fo);
$BreakdownTypeID1tc_6fo = $expfigtc_6fo[0];
$ZhaFigureValuetc_6fo = $expfigtc_6fo[4];

$figvaltc_7fo = $fig_h2['TC1']['PSF']['FEM'][6];
$expfigtc_7fo = explode("-", $figvaltc_7fo);
$BreakdownTypeID1tc_7fo = $expfigtc_7fo[0];
$ZhaFigureValuetc_7fo = $expfigtc_7fo[4];

$figvaltc_8fo = $fig_h2['TC1']['PSF']['FEM'][7];
$expfigtc_8fo = explode("-", $figvaltc_8fo);
$BreakdownTypeID1tc_8fo = $expfigtc_8fo[0];
$ZhaFigureValuetc_8fo = $expfigtc_8fo[4];


$figvaltc_1p = $fig_h2['TC1']['NSF']['MAL'][0];
$expfigtc_1p = explode("-", $figvaltc_1p);
$BreakdownTypeID1tc_1p = $expfigtc_1p[0];
$ZhaFigureValuetc_1p = $expfigtc_1p[4];

$figvaltc_2p = $fig_h2['TC1']['NSF']['MAL'][1];
$expfigtc_2p = explode("-", $figvaltc_2p);
$BreakdownTypeID1tc_2p = $expfigtc_2p[0];
$ZhaFigureValuetc_2p = $expfigtc_2p[4];

$figvaltc_3p = $fig_h2['TC1']['NSF']['MAL'][2];
$expfigtc_3p = explode("-", $figvaltc_3p);
$BreakdownTypeID1tc_3p = $expfigtc_3p[0];
$ZhaFigureValuetc_3p = $expfigtc_3p[4];

$figvaltc_4p = $fig_h2['TC1']['NSF']['MAL'][3];
$expfigtc_4p = explode("-", $figvaltc_4p);
$BreakdownTypeID1tc_4p = $expfigtc_4p[0];
$ZhaFigureValuetc_4p = $expfigtc_4p[4];

$figvaltc_5p = $fig_h2['TC1']['NSF']['MAL'][4];
$expfigtc_5p = explode("-", $figvaltc_5p);
$BreakdownTypeID1tc_5p = $expfigtc_5p[0];
$ZhaFigureValuetc_5p = $expfigtc_5p[4];

$figvaltc_6p = $fig_h2['TC1']['NSF']['MAL'][5];
$expfigtc_6p = explode("-", $figvaltc_6p);
$BreakdownTypeID1tc_6p = $expfigtc_6p[0];
$ZhaFigureValuetc_6p = $expfigtc_6p[4];

$figvaltc_7p = $fig_h2['TC1']['NSF']['MAL'][6];
$expfigtc_7p = explode("-", $figvaltc_7p);
$BreakdownTypeID1tc_7p = $expfigtc_7p[0];
$ZhaFigureValuetc_7p = $expfigtc_7p[4];

$figvaltc_8p = $fig_h2['TC1']['NSF']['MAL'][7];
$expfigtc_8p = explode("-", $figvaltc_8p);
$BreakdownTypeID1tc_8p = $expfigtc_8p[0];
$ZhaFigureValuetc_8p = $expfigtc_8p[4];

$figvaltc_1fp = $fig_h2['TC1']['NSF']['FEM'][0];
$expfigtc_1fp = explode("-", $figvaltc_1fp);
$BreakdownTypeID1tc_1fp = $expfigtc_1fp[0];
$ZhaFigureValuetc_1fp = $expfigtc_1fp[4];

$figvaltc_2fp = $fig_h2['TC1']['NSF']['FEM'][1];
$expfigtc_2fp = explode("-", $figvaltc_2fp);
$BreakdownTypeID1tc_2fp = $expfigtc_2fp[0];
$ZhaFigureValuetc_2fp = $expfigtc_2fp[4];

$figvaltc_3fp = $fig_h2['TC1']['NSF']['FEM'][2];
$expfigtc_3fp = explode("-", $figvaltc_3fp);
$BreakdownTypeID1tc_3fp = $expfigtc_3fp[0];
$ZhaFigureValuetc_3fp = $expfigtc_3fp[4];

$figvaltc_4fp = $fig_h2['TC1']['NSF']['FEM'][3];
$expfigtc_4fp = explode("-", $figvaltc_4fp);
$BreakdownTypeID1tc_4fp = $expfigtc_4fp[0];
$ZhaFigureValuetc_4fp = $expfigtc_4fp[4];

$figvaltc_5fp = $fig_h2['TC1']['NSF']['FEM'][4];
$expfigtc_5fp = explode("-", $figvaltc_5fp);
$BreakdownTypeID1tc_5fp = $expfigtc_5fp[0];
$ZhaFigureValuetc_5fp = $expfigtc_5fp[4];

$figvaltc_6fp = $fig_h2['TC1']['NSF']['FEM'][5];
$expfigtc_6fp = explode("-", $figvaltc_6fp);
$BreakdownTypeID1tc_6fp = $expfigtc_6fp[0];
$ZhaFigureValuetc_6fp = $expfigtc_6fp[4];

$figvaltc_7fp = $fig_h2['TC1']['NSF']['FEM'][6];
$expfigtc_7fp = explode("-", $figvaltc_7fp);
$BreakdownTypeID1tc_7fp = $expfigtc_7fp[0];
$ZhaFigureValuetc_7fp = $expfigtc_7fp[4];

$figvaltc_8fp = $fig_h2['TC1']['NSF']['FEM'][7];
$expfigtc_8fp = explode("-", $figvaltc_8fp);
$BreakdownTypeID1tc_8fp = $expfigtc_8fp[0];
$ZhaFigureValuetc_8fp = $expfigtc_8fp[4];

$query_mc = "SELECT FormSerialNumber, `ZhaQuestionCode`, `ZhaAnswer`, `ZhaAnswerText`,
                    DATE(`ZhaAnswerDate`) AS ZhaAnswerDate
               FROM tblzhaanswers
              WHERE `FormSerialNumber` = '$form_id'";
$result_mc = mysql_query($query_mc) or die(mysql_error());

while ($mc = mysql_fetch_array($result_mc)) {
    $mcans[$mc['ZhaQuestionCode']] = $mc['ZhaAnswer'];
    $mcdate[$mc['ZhaQuestionCode']] = $mc['ZhaAnswerDate'];
    $mctext[$mc['ZhaQuestionCode']] = $mc['ZhaAnswerText'];
}

$query_submitted = "SELECT `FormSerialNumber`, `OrganisationCode`, `DistrictCode`, DATE(`PeriodFrom`) AS PeriodFrom,
                            DATE(`PeriodTo`) AS PeriodTo, `CompletedByPersonID`, DATE(`DateCompleted`) AS DateCompleted,
                            `ApprovedByPersonID`, DATE(`DateApproved`) AS DateApproved, DATE(`DateReceived`) AS DateReceived,
                            DATE(`DateCaptured`) AS DateCaptured, `CapturedByUserID`, DATE(`DateFiled`) AS DateFiled,
                            DATE(`DateVerified`) AS DateVerified, `VerifiedByUserID`, `NotesWrittenOnForm`, DataEntryNotes
                       FROM tblzhaformssubmitted
                      WHERE FormSerialNumber = '$form_id'";

$result_submitted = mysql_query($query_submitted) or die(mysql_error());
$submitted = mysql_fetch_array($result_submitted);

$period_from = $submitted['PeriodFrom'];
$period_to = $submitted['PeriodTo'];

$experiod_from = explode("-", $period_from);
$experiod_to = explode("-", $period_to);
$year = $experiod_from[0];
$month_range = $experiod_from[1] . '-' . $experiod_from[2] . '/' . $experiod_to[1] . '-' . $experiod_to[2];
?>
