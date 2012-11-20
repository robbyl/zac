<div class="section">
    <h3><strong>B. <?php echo $text["SECT_HEAD_B"]; ?></strong></h3>
    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP1"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_HIV"] ?></th>
            <th rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_VGT"] ?></th>
            <th colspan="5"><?php echo $text["SECT_SUB_HEAD_HP_NPR"] ?></th>
            <td rowspan="9"  width="47" class="data-group">HP1</td>
        </tr>
        <tr>
            <th colspan="2"><?php echo $text["SECT_LABEL_Y25"] ?></th>
            <th colspan="2"><?php echo $text["SECT_LABEL_25O"] ?></th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th width="110"><?php echo $text["SECT_LABEL_TOT"] ?></th>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td>
                <input type="number" name="hp1_male_younger[]" min="0" class="number fst">
            </td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number  fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select></td>
            <td><input type="number" name="hp1_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"><?php echo $risk['breakdownrisk'] ?></option>
                    <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp1_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
    </table>

    <p style="font-weight: bold;"><?php echo $text["SECT_SUB_HEAD_HP2"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th colspan="2" rowspan="3"><?php echo $text["SECT_SUB_HEAD_HP_HIV"] ?></th>
            <th colspan="5"><?php echo $text["SECT_SUB_HEAD_HP_NPR"] ?></th>
            <td rowspan="9"  width="60" class="data-group">HP2</td>
        </tr>
        <tr>
            <th colspan="2"><?php echo $text["SECT_LABEL_Y25"] ?></th>
            <th colspan="2"><?php echo $text["SECT_LABEL_25O"] ?></th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th width="110"><?php echo $text["SECT_LABEL_TOT"] ?></th>
        </tr>
        <tr>
            <td colspan="2">
                <select name="hiv_inter[]" class="select" style="width: 480px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="" class="select" style="width: 480px;">
                    <option value="hiv_inter[]"></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="" class="select" style="width: 480px;">
                    <option value="hiv_inter[]"></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="hiv_inter[]" class="select" style="width: 480px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="hiv_inter[]" class="select" style="width: 480px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
        <tr>
            <td colspan="2">
                <select name="hiv_inter[]" class="select" style="width: 480px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"><?php echo $hiv['breakdown'] ?></option>
                    <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number fst"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP3"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th><?php echo $BreakdownTypeDescription1["HP3"][0] ?></th>
            <th><?php echo $BreakdownTypeDescription1["HP3"][1] ?></th>
            <td rowspan="2" width="60" class="data-group">HP3</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP3"][0]; ?></td>
            <td><input type="number" name="hp3_radio_hrs" min="0" class="number"></td>
            <td><input type="number" name="hp3_tv_hrs" min="0" class="number"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP4"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td rowspan="2"></td>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][9] ?></th>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][8] ?></th>
            <td rowspan="3"  width="60" class="data-group">HP4</td>
        </tr>
        <tr>
            <th><?php echo $BreakdownTypeDescription3["HP4"][10] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][9] ?></th>
            <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][11] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][7] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][6] ?></th>
            <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][8] ?></th>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP4"][6]; ?></td>
            <td><input type="number" name="hp4_male_peer" min="0" class="number fst"></td>
            <td><input type="number" name="hp4_female_peer" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="hp4_male_community" min="0" class="number snd"></td>
            <td><input type="number" name="hp4_female_community" min="0" class="number snd"></td>
            <td align="center" class="snd"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP5"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td rowspan="2">&nbsp;</td>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][3] ?></th>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["HP4"][0] ?></th>
            <td rowspan="3"  width="60" class="data-group">HP5</td>
        </tr>
        <tr>
            <th><?php echo $BreakdownTypeDescription3["HP4"][4] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][3] ?></th>
            <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][5] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][1] ?></th>
            <th><?php echo $BreakdownTypeDescription3["HP4"][0] ?></th>
            <th width="110"><?php echo $BreakdownTypeDescription3["HP4"][2] ?></th>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP4"][0]; ?></td>
            <td><input type="number" name="hp5_male_peer" min="0" class="number fst"></td>
            <td><input type="number" name="hp5_female_peer" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="hp5_male_community" min="0" class="number snd"></td>
            <td><input type="number" name="hp5_female_community" min="0" class="number snd"></td>
            <td align="center" class="snd"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP6"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th><?php echo $BreakdownTypeDescription1["HP6"][0] ?></th>
            <th><?php echo $BreakdownTypeDescription1["HP6"][1] ?></th>
            <th><?php echo $BreakdownTypeDescription1["HP6"][2] ?></th>
            <td rowspan="2"  width="60" class="data-group">HP6</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP6"][0] ?></td>
            <td><input type="number" name="hp6_booklets" min="0" class="number"></td>
            <td><input type="number" name="hp6_posters" min="0" class="number"></td>
            <td><input type="number" name="hp6_others"  class="number"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP7"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th><?php echo $BreakdownTypeDescription1["HP7"][1] ?></th>
            <th><?php echo $BreakdownTypeDescription1["HP7"][0] ?></th>
            <td rowspan="2"  width="48" class="data-group">HP7</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP7"][0] ?></td>
            <td><input type="number" name="hp7_male_condoms" min="0" class="number"></td>
            <td><input type="number" name="hp7_female_condoms" min="0" class="number"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP8"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][1] ?></th>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][0] ?></th>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP8"][2] ?></th>
            <td rowspan="2"  width="51" class="data-group">HP8</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP8"][0] ?></td>
            <td><input type="number" name="hp8_pep_male" min="0" class="number fst"></td>
            <td><input type="number" name="hp8_pep_female" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
    </table>

    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_HP9"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][1] ?></th>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][0] ?></th>
            <th width="100"><?php echo $BreakdownTypeDescription1["HP9"][2] ?></th>
            <td rowspan="2"  width="51" class="data-group">HP9</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["HP9"][0] ?></td>
            <td><input type="number" name="hp9_wkpl_male" min="0" class="number fst"></td>
            <td><input type="number" name="hp9_wkpl_female" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
    </table>
</div>

<div class="section">
    <h3><strong>C. <?php echo $text["SECT_HEAD_C"]; ?></strong></h3>
    <p style="font-weight: bold"><?php echo $text["SECT_SUB_HEAD_M1"] ?></p>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th>&nbsp;</th>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["M01"][3] ?></th>
            <th colspan="3"><?php echo $BreakdownTypeDescription2["M01"][0] ?></th>
            <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][13] ?></th>
            <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][10] ?></th>
            <th rowspan="2"><?php echo $BreakdownTypeDescription2["M01"][6] ?></th>
            <td rowspan="7"  width="60" class="data-group">M1</td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <th><?php echo $BreakdownTypeDescription3["M01"][19] ?></th>
            <th><?php echo $BreakdownTypeDescription3["M01"][18] ?></th>
            <th width="70"><?php echo $BreakdownTypeDescription3["M01"][20] ?></th>
            <th><?php echo $BreakdownTypeDescription3["M01"][1]; ?></th>
            <th><?php echo $BreakdownTypeDescription3["M01"][0] ?></th>
            <th width="70"><?php echo $BreakdownTypeDescription3["M01"][2] ?></th>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][30] ?></td>
            <td><input type="number" name="m1_health_chldn_male" min="0" class="number fst" /></td>
            <td><input type="number" name="m1_health_chldn_female" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="m1_health_elderly_male" min="0" class="number snd" /></td>
            <td><input type="number" name="m1_health_elderly_female" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="m1_health_widows" min="0" class="number" /></td>
            <td><input type="number" name="m1_health_vulnerable" min="0" class="number" /></td>
            <td><input type="number" name="m1_health_other" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][0] ?></td>
            <td><input type="number" name="m1_emotional_chldn_male" min="0" class="number fst" /></td>
            <td><input type="number" name="m1_emotional_chldn_female" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="m1_emotional_elderly_male" min="0" class="number snd" /></td>
            <td><input type="number" name="m1_emotional_elderly_female" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="m1_emotional_widows" min="0" class="number" /></td>
            <td><input type="number" name="m1_emotional_vulnerable" min="0" class="number" /></td>
            <td><input type="number" name="m1_emotional_other" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][45] ?></td>
            <td><input type="number" name="m1_nutrition_chldn_male" min="0" class="number fst" /></td>
            <td><input type="number" name="m1_nutrition_chldn_female" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="m1_nutrition_elderly_male" min="0" class="number snd" /></td>
            <td><input type="number" name="m1_nutrition_elderly_female" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="m1_nutrition_widows" min="0" class="number" /></td>
            <td><input type="number" name="m1_nutrition_vulnerable" min="0" class="number" /></td>
            <td><input type="number" name="m1_nutrition_other" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][15] ?></td>
            <td><input type="number" name="m1_financial_chldn_male" min="0" class="number fst" /></td>
            <td><input type="number" name="m1_financial_chldn_female" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="m1_financial_elderly_male" min="0" class="number snd" /></td>
            <td><input type="number" name="m1_financial_elderly_female" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="m1_financial_widows" min="0" class="number" /></td>
            <td><input type="number" name="m1_financial_vulnerable" min="0" class="number"></td>
            <td><input type="number" name="m1_financial_other" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][60] ?></td>
            <td><input type="number" name="m1_school_chldn_male" min="0" class="number fst" /></td>
            <td><input type="number" name="m1_school_chldn_female" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td class="not-editable">&nbsp;</td>
            <td class="not-editable">&nbsp;</td>
            <td class="not-editable">&nbsp;</td>
            <td class="not-editable">&nbsp;</td>
            <td class="not-editable">&nbsp;</td>
            <td class="not-editable">&nbsp;</td>
        </tr>
    </table>
</div>

<div class="section">
    <h3><strong>D. <?php echo $text["SECT_HEAD_D"]; ?></strong></h3>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td></td>
            <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][1] ?></th>
            <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][0] ?></th>
            <th width="104"><?php echo $BreakdownTypeDescription1["CS1"][2] ?></th>
            <td rowspan="2"  width="60" class="data-group">CS1</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["CS1"][0]; ?></td>
            <td><input type="number" name="cs1_males" min="0" class="number fst"></td>
            <td><input type="number" name="cs1_females" min="0" class="number fst"></td>
            <td align="center" class="fst"></td>
        </tr>
    </table>

    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td>&nbsp;</td>
            <th width="200"><?php echo $text["SECT_SUB_HEAD_CS_PVI"] ?></th>
            <td rowspan="2" width="47" class="data-group">CS2</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["CS2"][0] ?></td>
            <td><input type="number" name="cs2_person_visit" min="0" class="number"></td>
        </tr>
    </table>
</div>

<div class="section">
    <h3><strong> E. <?php echo $text["SECT_HEAD_E"]; ?></strong></h3>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th rowspan="2"><?php echo $text["SECT_SUB_HEAD_TC_TTR"] ?></th>
            <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_VLN"] ?></th>
            <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_PSN"] ?></th>
            <th colspan="3"><?php echo $text["SECT_SUB_HEAD_TC_EMN"] ?></th>
            <td rowspan="10" width="60" class="data-group">TC1</td>
        </tr>
        <tr>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
            <th><?php echo $text["SECT_LABEL_MAL"] ?></th>
            <th><?php echo $text["SECT_LABEL_FEM"] ?></th>
            <th width="70"><?php echo $text["SECT_LABEL_TOT"] ?></th>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
          <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="tc1_topic[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
        <tr>
            <td>
                <select name="" class="select" style="width: 240px;">
                    <option value="tc1_topic[]"></option>
                    <?php while ($training = mysql_fetch_array($result_training)) { ?>
                        <option value="<?php echo $training['BreakdownTypeID'] ?>"><?php echo $training['breakdowntraining'] ?></option>
                    <?php } mysql_data_seek($result_training, 0); ?>
                </select>
            </td>
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number fst" /></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number fst" /></td>
            <td align="center" class="fst"></td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number snd" /></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number snd" /></td>
            <td align="center" class="snd"></td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number trd" /></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number trd" /></td>
            <td align="center" class="trd"></td>
        </tr>
    </table>

    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td>&nbsp;</td>
            <th width="200"><?php echo $text["SECT_SUB_HEAD_TC_COL"] ?></th>
            <td rowspan="2" width="47" class="data-group">TC2</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescription["TC2"][0] ?></td>
            <td><input type="number" name="tc2_community" min="0" class="number"></td>
        </tr>
    </table>
</div>

<div class="section">
    <h3><strong>F:  <?php echo $text["SECT_HEAD_F"]; ?></strong></h3>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC1"][0] ?></td>
            <td width="200"><label for="mc1_yes" style="margin-right: 50px"><input type="radio" name="mc1_mngmnt" id="mc1_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc1_no"><input type="radio" name="mc1_mngmnt" id="mc1_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label>
            </td>
            <td width="47" class="data-group">MC1</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>TSH<input type="number" step="0.01" name="mc2_tshs" min="0" class="number" style="width: 80% !important"></td>
            <td width="47" class="data-group">MC2</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC3"][0] ?></td>
            <td><label for="mc3_yes" style="margin-right: 50px"><input type="radio" name="mc3_money" id="mc3_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc3_no"><input type="radio" name="mc3_money" id="mc3_no" value="No"> <?php echo $text["SECT_LABEL_NO"] ?></label>
            </td>
            <td width="47" class="data-group">MC3</td>
        </tr>
        <tr>
            <td></td>
            <td>TSH<input type="number" step="0.01" name="mc4_tshs" min="0" class="number" style="width: 80% !important"></td>
            <td width="47" class="data-group">MC4</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC5"][0] ?></td>
            <td><label for="mc5_yes" style="margin-right: 50px"><input type="radio" name="mc5_activity" id="mc5_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc5_no"><input type="radio" name="mc5_activity" id="mc5_no" value="No"> <?php echo $text["SECT_LABEL_NO"] ?></label>
            </td>
            <td width="47" class="data-group">MC5</td>
        </tr>
    </table>


    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td width="300" rowspan="8"><?php echo $text["SECT_SUB_HEAD_MC_HIV"] ?></td>
            <td><?php echo $ZhaFigureDescriptionqn["MC6a"][0] ?></td>
            <td  width="200"><label for="mc6a_yes" style="margin-right: 50px"><input type="radio" name="mc6a" id="mc6a_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6a_no"><input type="radio" name="mc6a" id="mc6a_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
            <td rowspan="8" width="47" class="data-group">MC6</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6b"][0] ?></td>
            <td><label for="mc6b_yes"  style="margin-right: 50px"><input type="radio" name="mc6b" id="mc6b_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6b_no"><input type="radio" name="mc6b" id="mc6b_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6c"][0] ?></td>
            <td><label for="mc6c_yes" style="margin-right: 50px"><input type="radio" name="mc6c" id="mc6c_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6c_no"><input type="radio" name="mc6c" id="mc6c_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6d"][0] ?></td>
            <td><label for="mc6d_yes" style="margin-right: 50px"><input type="radio" name="mc6d" id="mc6d_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6d_no"><input type="radio" name="mc6d" id="mc6d_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6e"][0] ?></td>
            <td><label for="mc6e_yes" style="margin-right: 50px"><input type="radio" name="mc6e" id="mc6e_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6e_no"><input type="radio" name="mc6e" id="mc6e_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6f"][0] ?></td>
            <td><label for="mc6f_yes" style="margin-right: 50px"><input type="radio" name="mc6f" id="mc6f_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6f_no"><input type="radio" name="mc6f" id="mc6f_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6g"][0] ?></td>
            <td><label for="mc6g_yes" style="margin-right: 50px"><input type="radio" name="mc6g" id="mc6g_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6g_no"><input type="radio" name="mc6g" id="mc6g_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6h"][0] ?></td>
            <td><label for="mc6h_yes" style="margin-right: 50px"><input type="radio" name="mc6h" id="mc6h_yes" value="Yes"> <?php echo $text["SECT_LABEL_YES"] ?></label>
                <label for="mc6h_no" style="margin-right: 50px"><input type="radio" name="mc6h" id="mc6h_no" value="No">  <?php echo $text["SECT_LABEL_NO"] ?></label></td>
        </tr>
    </table>

    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td rowspan="2"><?php echo $ZhaFigureDescriptionqn["ME1a"][0] ?></td>
            <td width="100"><label for="me1_yes"><input type="radio" name="me1a" value="Yes" id="me1_yes"> <?php echo $text["SECT_LABEL_YES"] ?></label></td>
            <td><?php echo $ZhaFigureDescriptionqn["ME1b"][0] ?>  <br><input type="date" name="me1b" class="text"></td>
            <td rowspan="2" width="60" class="data-group">ME1</td>
        </tr>
        <tr>
            <td><label for="me1_no"><input type="radio" name="me1a" value="No" id="me1_no"> <?php echo $text["SECT_LABEL_NO"] ?></label></td>
            <td><?php echo $ZhaFigureDescriptionqn["ME1c"][0] ?><br> <input type="text" name="me1c" class="text" style="width: 90%"></td>
        </tr>
    </table>
</div>

