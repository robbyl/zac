<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <title>FORM 1</title>
        <link rel="stylesheet" type="text/css" href="../../css/layout.css" />
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="js/jquery-1.7.2.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.message-outer, .error-outer').hide().slideDown('normal');
            });
        </script>
    </head>

    <body>
        <form action="" method="post">
            <div class="data-form-wapper">
                <div class="form-header">

                    <!-- end .form-header --></div>
                <div class="section">
                    <h3>A. INFORMATION ABOUT YOUR ORGANISATION</h3>
                    <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">
                            <select class="select">
                            <option></option>
                            </select>
                            </td>
                            <td width="60" class="data-group">CD1</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td class="data-group">CD2</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td class="data-group">CD3</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td class="data-group">CD4</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2" class="data-group">CD5</td>
                        </tr>
                        <tr>

                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td class="data-group">CD6</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="data-group">CD7</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td class="data-group">CD8</td>
                        </tr>
                        <tr>
                            <td rowspan="3">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>males</td>
                            <td>females</td>
                            <td>total</td>
                            <td rowspan="3" class="data-group">CD9</td>
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="data-group">CD10</td>
                        </tr>
                    </table>
                    <!-- end .section  --></div>
                <div class="section">
                    <h3>B. HIV PREVENTION SERVICES</h3>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="5">Number of persons reached</td>
                            <td rowspan="9"  width="60" class="data-group">HP1</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Male</td>
                            <td>Female</td>
                            <td>Male</td>
                            <td>Female</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                            <input type="number" name="hp1_male_younger[]" min="0" class="number">
                            </td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp1_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <h5>HIV PREVENTION AMONGST GENERAL POPULATION</h5>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td colspan="2" rowspan="3">Type of intervation</td>
                            <td colspan="5">Number of persons reached</td>
                            <td rowspan="9"  width="60" class="data-group">HP2</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Male</td>
                            <td>Female</td>
                            <td>Male</td>
                            <td>Female</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp1_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
                            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>


                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of airtime</td>
                            <td>Hours of airtime</td>
                            <td rowspan="2" width="60" class="data-group">HP3</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp3_radio_hrs" min="0" class="number"></td>
                            <td><input type="number" name="hp3_radio_hrs" min="0" class="number"></td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td rowspan="2">EDUCATORS</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td rowspan="3"  width="60" class="data-group">HP4</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp4_male_peer" min="0" class="number"></td>
                            <td><input type="number" name="hp4_female_peer" min="0" class="number"></td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp4_male_community" min="0" class="number"></td>
                            <td><input type="number" name="hp4_female_community" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td rowspan="2">EDUCATORS</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td rowspan="3"  width="60" class="data-group">HP5</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp5_male_peer" min="0" class="number"></td>
                            <td><input type="number" name="hp5_female_peer" min="0" class="number"></td>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp5_male_community" min="0" class="number"></td>
                            <td><input type="number" name="hp5_female_community" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of airtime</td>
                            <td>&nbsp;</td>
                            <td>Hours of airtime</td>
                            <td rowspan="2"  width="60" class="data-group">HP6</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp6_booklets" min="0" class="number"></td>
                            <td><input type="number" name="hp6_posters" min="0" class="number"></td>
                            <td><input type="text" name="hp6_others"  class="text"></td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of airtime</td>
                            <td>Hours of airtime</td>
                            <td rowspan="2"  width="60" class="data-group">HP7</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp7_male_condoms" min="0" class="number"></td>
                            <td><input type="number" name="hp7_female_condoms" min="0" class="number"></td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of airtime</td>
                            <td>&nbsp;</td>
                            <td>Hours of airtime</td>
                            <td rowspan="2"  width="60" class="data-group">HP8</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp8_pep_male" min="0" class="number"></td>
                            <td><input type="number" name="hp8_pep_female" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>


                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of air time</td>
                            <td>&nbsp;</td>
                            <td>Hours of air time</td>
                            <td rowspan="2"  width="60" class="data-group">HP9</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="number" name="hp9_wkpl_male" min="0" class="number"></td>
                            <td><input type="number" name="hp9_wkpl_female" min="0" class="number"></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>

                <div class="section">
                    <h3>C. HIV IMPACT MITIGATION SERVICES</h3>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                            <td rowspan="7"  width="60" class="data-group">M1</td>
                        </tr>
                        <tr>
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
                </div>

                <div class="section">
                    <h3>D. HIV & AIDS CARE AND SUPPORT SERVICES</h3>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>RADIO AND TV</td>
                            <td>Hours of airtime</td>
                            <td>&nbsp;</td>
                            <td>Hours of airtime</td>
                            <td rowspan="2"  width="60" class="data-group">CS1</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2" width="60" class="data-group">CS2</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                </div>

                <div class="section">
                    <h3>E. TRAINING AND CAPACITY BUILDING FOR HIV</h3>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td rowspan="2">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td rowspan="12" width="60" class="data-group">TC1</td>
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

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2" width="60" class="data-group">TC2</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>

                <div class="section">
                    <h3>F: MANAGEMENT AND COORDINATION OF HIV INTERVENTIONS</h3>
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="60" class="data-group">MC1</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td width="60" class="data-group">MC2</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="60" class="data-group">MC3</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td width="60" class="data-group">MC4</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="60" class="data-group">MC5</td>
                        </tr>
                    </table>


                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="9" width="60" class="data-group">MC6</td>
                        </tr>
                        <tr>
                            <td rowspan="8">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td rowspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2" width="60" class="data-group">ME1</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>

                <div class="form-footer">
                    <table width="100%" border="1" cellspacing="0">
                        <tr>
                            <td>Completed by</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Positon in organisation</td>
                            <td>&nbsp;</td>
                            <td>Date:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Approved by:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Position in organisation:</td>
                            <td>&nbsp;</td>
                            <td>Date:</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                </div>


                <!-- end .section --></div>
            <!-- end .section --></div>
        <!-- end .data-form-wrapper  -->  </div>
</form>


</body>
</html>