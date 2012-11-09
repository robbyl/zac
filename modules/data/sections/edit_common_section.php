<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
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
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_1 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_1f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_1o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_1fo)
                            echo "selected"
                            ?>><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_1 ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_1f ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_1o ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_1fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td>
                <input type="number" name="hp1_male_younger[]" value="<?php echo $ZhaFigureValue_1 ?>" min="0" class="number">
            </td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_1f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]" value="<?php echo $ZhaFigureValue_1o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]" value="<?php echo $ZhaFigureValue_1fo ?>" min="0" class="number"></td>
            <td align="center" class="total"></td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_2 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_2f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_2o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_2fo)
                            echo "selected"
                            ?>><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td><select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>" 
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_2 ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_2f ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_2o ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_2fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select></td>
            <td><input type="number" name="hp1_male_younger[]" value="<?php echo $ZhaFigureValue_2 ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_2f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]" value="<?php echo $ZhaFigureValue_2o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]" value="<?php echo $ZhaFigureValue_2fo ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>"
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_3 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_3f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_3o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_3fo)
                            echo "selected"
                            ?>><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>" 
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_3 ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_3f ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_3o ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_3fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" value="<?php echo $ZhaFigureValue_3 ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_3f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]" value="<?php echo $ZhaFigureValue_3o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]" value="<?php echo $ZhaFigureValue_3fo ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>" 
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_4 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_4f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_4o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_4fo)
                            echo "selected"
                            ?>><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_4 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID2_4f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID2_4o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID2_4fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]"  value="<?php echo $ZhaFigureValue_4 ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_4f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]" value="<?php echo $ZhaFigureValue_4o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]" value="<?php echo $ZhaFigureValue_4fo ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?>" 
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_5 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_5f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_5o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_5fo)
                            echo "selected"
                            ?>><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_5 ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_5f ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_5o ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_5fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" value="<?php echo $ZhaFigureValue_5 ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_5f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]"  value="<?php echo $ZhaFigureValue_5o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]"  value="<?php echo $ZhaFigureValue_5fo ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <select name="hiv_type[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($hiv = mysql_fetch_array($result_hiv_intv)) { ?>
                        <option value="<?php echo $hiv['BreakdownTypeID'] ?> 
                        <?php
                        if ($hiv['BreakdownTypeID'] == $BreakdownTypeID1_6 ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_6f ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_6o ||
                                $hiv['BreakdownTypeID'] == $BreakdownTypeID1_6fo)
                            echo "selected"
                            ?>"><?php echo $hiv['breakdown'] ?></option>
                            <?php } mysql_data_seek($result_hiv_intv, 0); ?>
                </select>
            </td>
            <td>
                <select name="most_risk[]" class="select" style="width: 240px;">
                    <option value=""></option>
                    <?php while ($risk = mysql_fetch_array($result_risk)) { ?>
                        <option value="<?php echo $risk['BreakdownTypeID'] ?>"
                        <?php
                        if ($risk['BreakdownTypeID'] == $BreakdownTypeID2_6 ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_6f ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_6o ||
                                $risk['BreakdownTypeID'] == $BreakdownTypeID2_6fo)
                            echo "selected"
                            ?>><?php echo $risk['breakdownrisk'] ?></option>
                            <?php } mysql_data_seek($result_risk, 0) ?>
                </select>
            </td>
            <td><input type="number" name="hp1_male_younger[]" value="<?php echo $ZhaFigureValue_6 ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_younger[]" value="<?php echo $ZhaFigureValue_6f ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_male_older[]" value="<?php echo $ZhaFigureValue_6o ?>" min="0" class="number"></td>
            <td><input type="number" name="hp1_female_older[]" value="<?php echo $ZhaFigureValue_6fo ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp2_male_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_younger[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_male_older[]" min="0" class="number"></td>
            <td><input type="number" name="hp2_female_older[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp3_radio_hrs" value="<?php if (!empty($fig_ans['HP3']['RAD'][''][''][''])) echo $fig_ans['HP3']['RAD']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp3_tv_hrs" value="<?php if (!empty($fig_ans['HP3']['TVN'][''][''][''])) echo $fig_ans['HP3']['TVN']['']['']['']; ?>" min="0" class="number"></td>
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
            <td><input type="number" name="hp4_male_peer" value="<?php if (!empty($fig_ans['HP4']['REG']['PRE']['MAL'][''])) echo $fig_ans['HP4']['REG']['PRE']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp4_female_peer" value="<?php if (!empty($fig_ans['HP4']['REG']['PRE']['FEM'][''])) echo $fig_ans['HP4']['REG']['PRE']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="hp4_male_community" value="<?php if (!empty($fig_ans['HP4']['REG']['CME']['MAL'][''])) echo $fig_ans['HP4']['REG']['CME']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp4_female_community" value="<?php if (!empty($fig_ans['HP4']['REG']['CME']['FEM'][''])) echo $fig_ans['HP4']['REG']['CME']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp5_male_peer" value="<?php if (!empty($fig_ans['HP4']['RAA']['PRE']['MAL'][''])) echo $fig_ans['HP4']['RAA']['PRE']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp5_female_peer" value="<?php if (!empty($fig_ans['HP4']['RAA']['PRE']['FEM'][''])) echo $fig_ans['HP4']['RAA']['PRE']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="hp5_male_community" value="<?php if (!empty($fig_ans['HP4']['RAA']['CME']['MAL'][''])) echo $fig_ans['HP4']['RAA']['CME']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp5_female_community" value="<?php if (!empty($fig_ans['HP4']['RAA']['CME']['FEM'][''])) echo $fig_ans['HP4']['RAA']['CME']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp6_booklets" value="<?php if (!empty($fig_ans['HP6']['BKL'][''][''][''])) echo $fig_ans['HP6']['BKL']['']['']['']; ?>"  min="0" class="number"></td>
            <td><input type="number" name="hp6_posters" value="<?php if (!empty($fig_ans['HP6']['POS'][''][''][''])) echo $fig_ans['HP6']['POS']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp6_others" value="<?php if (!empty($fig_ans['HP6']['OIE'][''][''][''])) echo $fig_ans['HP6']['OIE']['']['']['']; ?>" class="number"></td>
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
            <td><input type="number" name="hp7_male_condoms" value="<?php if (!empty($fig_ans['HP7']['MCD'][''][''][''])) echo $fig_ans['HP7']['MCD']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp7_female_condoms" value="<?php if (!empty($fig_ans['HP7']['FCD'][''][''][''])) echo $fig_ans['HP7']['FCD']['']['']['']; ?>" min="0" class="number"></td>
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
            <td><input type="number" name="hp8_pep_male" value="<?php if (!empty($fig_ans['HP8']['MAL'][''][''][''])) echo $fig_ans['HP8']['MAL']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp8_pep_female" value="<?php if (!empty($fig_ans['HP8']['FEM'][''][''][''])) echo $fig_ans['HP8']['FEM']['']['']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="hp9_wkpl_male" value="<?php if (!empty($fig_ans['HP9']['MAL'][''][''][''])) echo $fig_ans['HP9']['MAL']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="hp9_wkpl_female" value="<?php if (!empty($fig_ans['HP9']['FEM'][''][''][''])) echo $fig_ans['HP9']['FEM']['']['']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="m1_health_chldn_male" value="<?php if (!empty($fig_ans['M01']['HCS']['MVC']['MAL'][''])) echo $fig_ans['M01']['HCS']['MVC']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_health_chldn_female" value="<?php if (!empty($fig_ans['M01']['HCS']['MVC']['FEM'][''])) echo $fig_ans['M01']['HCS']['MVC']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_health_elderly_male" value="<?php if (!empty($fig_ans['M01']['HCS']['ELD']['MAL'][''])) echo $fig_ans['M01']['HCS']['ELD']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_health_elderly_female" value="<?php if (!empty($fig_ans['M01']['HCS']['ELD']['FEM'][''])) echo $fig_ans['M01']['HCS']['ELD']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_health_widows" value="<?php if (!empty($fig_ans['M01']['HCS']['WID']['TOT'][''])) echo $fig_ans['M01']['HCS']['WID']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_health_vulnerable" value="<?php if (!empty($fig_ans['M01']['HCS']['VLH']['TOT'][''])) echo $fig_ans['M01']['HCS']['VLH']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_health_other" value="<?php if (!empty($fig_ans['M01']['HCS']['OVG']['TOT'][''])) echo $fig_ans['M01']['HCS']['OVG']['TOT']['']; ?>" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][0] ?></td>
            <td><input type="number" name="m1_emotional_chldn_male" value="<?php if (!empty($fig_ans['M01']['EMP']['MVC']['MAL'][''])) echo $fig_ans['M01']['EMP']['MVC']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_emotional_chldn_female" value="<?php if (!empty($fig_ans['M01']['EMP']['MVC']['FEM'][''])) echo $fig_ans['M01']['EMP']['MVC']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_emotional_elderly_male" value="<?php if (!empty($fig_ans['M01']['EMP']['ELD']['MAL'][''])) echo $fig_ans['M01']['EMP']['ELD']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_emotional_elderly_female" value="<?php if (!empty($fig_ans['M01']['EMP']['ELD']['FEM'][''])) echo $fig_ans['M01']['EMP']['ELD']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_emotional_widows" value="<?php if (!empty($fig_ans['M01']['EMP']['WID']['TOT'][''])) echo $fig_ans['M01']['EMP']['WID']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_emotional_vulnerable" value="<?php if (!empty($fig_ans['M01']['EMP']['VLH']['TOT'][''])) echo $fig_ans['M01']['EMP']['VLH']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_emotional_other" value="<?php if (!empty($fig_ans['M01']['EMP']['OVG']['TOT'][''])) echo $fig_ans['M01']['EMP']['OVG']['TOT']['']; ?>" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][45] ?></td>
            <td><input type="number" name="m1_nutrition_chldn_male" value="<?php if (!empty($fig_ans['M01']['NUT']['MVC']['MAL'][''])) echo $fig_ans['M01']['NUT']['MVC']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_nutrition_chldn_female" value="<?php if (!empty($fig_ans['M01']['NUT']['MVC']['FEM'][''])) echo $fig_ans['M01']['NUT']['MVC']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_nutrition_elderly_male" value="<?php if (!empty($fig_ans['M01']['NUT']['ELD']['MAL'][''])) echo $fig_ans['M01']['NUT']['ELD']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_nutrition_elderly_female" value="<?php if (!empty($fig_ans['M01']['NUT']['ELD']['FEM'][''])) echo $fig_ans['M01']['NUT']['ELD']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_nutrition_widows" value="<?php if (!empty($fig_ans['M01']['NUT']['WID']['TOT'][''])) echo $fig_ans['M01']['NUT']['WID']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_nutrition_vulnerable" value="<?php if (!empty($fig_ans['M01']['NUT']['VLH']['TOT'][''])) echo $fig_ans['M01']['NUT']['VLH']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_nutrition_other" value="<?php if (!empty($fig_ans['M01']['NUT']['OVG']['TOT'][''])) echo $fig_ans['M01']['NUT']['OVG']['TOT']['']; ?>" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][15] ?></td>
            <td><input type="number" name="m1_financial_chldn_male" value="<?php if (!empty($fig_ans['M01']['FIN']['MVC']['MAL'][''])) echo $fig_ans['M01']['FIN']['MVC']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_financial_chldn_female" value="<?php if (!empty($fig_ans['M01']['FIN']['MVC']['FEM'][''])) echo $fig_ans['M01']['FIN']['MVC']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_financial_elderly_male" value="<?php if (!empty($fig_ans['M01']['FIN']['ELD']['MAL'][''])) echo $fig_ans['M01']['FIN']['ELD']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_financial_elderly_female" value="<?php if (!empty($fig_ans['M01']['FIN']['ELD']['FEM'][''])) echo $fig_ans['M01']['FIN']['ELD']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="m1_financial_widows" value="<?php if (!empty($fig_ans['M01']['FIN']['WID']['TOT'][''])) echo $fig_ans['M01']['FIN']['WID']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_financial_vulnerable" value="<?php if (!empty($fig_ans['M01']['FIN']['VLH']['TOT'][''])) echo $fig_ans['M01']['FIN']['VLH']['TOT']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_financial_other" value="<?php if (!empty($fig_ans['M01']['FIN']['OVG']['TOT'][''])) echo $fig_ans['M01']['FIN']['OVG']['TOT']['']; ?>" min="0" class="number"></td>
        </tr>
        <tr>
            <td><?php echo $BreakdownTypeDescription1['M01'][60] ?></td>
            <td><input type="number" name="m1_school_chldn_male" value="<?php if (!empty($fig_ans['M01']['SCH']['MVC']['MAL'][''])) echo $fig_ans['M01']['SCH']['MVC']['MAL']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="m1_school_chldn_female" value="<?php if (!empty($fig_ans['M01']['SCH']['MVC']['FEM'][''])) echo $fig_ans['M01']['SCH']['MVC']['FEM']['']; ?>" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="cs1_males" value="<?php if (!empty($fig_ans['CS1']['MAL'][''][''][''])) echo $fig_ans['CS1']['MAL']['']['']['']; ?>" min="0" class="number"></td>
            <td><input type="number" name="cs1_females" value="<?php if (!empty($fig_ans['CS1']['FEM'][''][''][''])) echo $fig_ans['CS1']['FEM']['']['']['']; ?>" min="0" class="number"></td>
            <td></td>
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
            <td><input type="number" name="cs2_person_visit" value="<?php if (!empty($fig_ans['CS2'][''][''][''][''])) echo $fig_ans['CS2']['']['']['']['']; ?>" min="0" class="number"></td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc1_volunteers_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_volunteers_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_staff_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_staff_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
            <td><input type="number" name="tc1_employees_male[]" min="0" class="number"></td>
            <td><input type="number" name="tc1_employees_female[]" min="0" class="number"></td>
            <td>&nbsp;</td>
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
            <td><input type="number" name="tc2_community" value="<?php if (!empty($fig_ans['TC2'][''][''][''][''])) echo $fig_ans['TC2']['']['']['']['']; ?>"  min="0" class="number"></td>
        </tr>
    </table>
</div>

<div class="section">
    <h3><strong>F:  <?php echo $text["SECT_HEAD_F"]; ?></strong></h3>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC1"][0] ?></td>
            <td width="200">
                <label for="mc1_yes" style="margin-right: 50px">
                    <input type="radio" name="mc1_mngmnt" id="mc1_yes" <?php if ($mcans['MC1'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc1_no">
                    <input type="radio" name="mc1_mngmnt" id="mc1_no" <?php if ($mcans['MC1'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
            <td width="47" class="data-group">MC1</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>TSH<input type="number" step="0.01" name="mc2_tshs" min="0" value="<?php if (!empty($fig_ans['MC2'][''][''][''][''])) echo $fig_ans['MC2']['']['']['']['']; ?>" class="number" style="width: 80% !important"></td>
            <td width="47" class="data-group">MC2</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC3"][0] ?></td>
            <td>
                <label for="mc3_yes" style="margin-right: 50px">
                    <input type="radio" name="mc3_money" id="mc3_yes" <?php if ($mcans['MC3'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc3_no">
                    <input type="radio" name="mc3_money" id="mc3_no" <?php if ($mcans['MC3'] == "No") echo "checked"; ?> value="No" required> <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
            <td width="47" class="data-group">MC3</td>
        </tr>
        <tr>
            <td></td>
            <td>TSH<input type="number" step="0.01" name="mc4_tshs" value="<?php if (!empty($fig_ans['MC4'][''][''][''][''])) echo $fig_ans['MC4']['']['']['']['']; ?>" min="0" class="number" style="width: 80% !important"></td>
            <td width="47" class="data-group">MC4</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC5"][0] ?></td>
            <td>
                <label for="mc5_yes" style="margin-right: 50px">
                    <input type="radio" name="mc5_activity" id="mc5_yes" <?php if ($mcans['MC5'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc5_no">
                    <input type="radio" name="mc5_activity" id="mc5_no" <?php if ($mcans['MC5'] == "No") echo "checked"; ?> value="No" required> <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
            <td width="47" class="data-group">MC5</td>
        </tr>
    </table>


    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td width="300" rowspan="8"><?php echo $text["SECT_SUB_HEAD_MC_HIV"] ?></td>
            <td><?php echo $ZhaFigureDescriptionqn["MC6a"][0] ?></td>
            <td  width="200">
                <label for="mc6a_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6a" id="mc6a_yes" <?php if ($mcans['MC6a'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6a_no">
                    <input type="radio" name="mc6a" id="mc6a_no" <?php if ($mcans['MC6a'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
            <td rowspan="8" width="47" class="data-group">MC6</td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6b"][0] ?></td>
            <td>
                <label for="mc6b_yes"  style="margin-right: 50px">
                    <input type="radio" name="mc6b" id="mc6b_yes" <?php if ($mcans['MC6b'] == "Yes") echo "checked"; ?> value="Yes" required > <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6b_no">
                    <input type="radio" name="mc6b" id="mc6b_no" <?php if ($mcans['MC6b'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6c"][0] ?></td>
            <td>
                <label for="mc6c_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6c" id="mc6c_yes" <?php if ($mcans['MC6c'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6c_no">
                    <input type="radio" name="mc6c" id="mc6c_no" <?php if ($mcans['MC6c'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6d"][0] ?></td>
            <td>
                <label for="mc6d_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6d" id="mc6d_yes" <?php if ($mcans['MC6d'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6d_no">
                    <input type="radio" name="mc6d" id="mc6d_no" <?php if ($mcans['MC6d'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6e"][0] ?></td>
            <td>
                <label for="mc6e_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6e" id="mc6e_yes" <?php if ($mcans['MC6e'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6e_no">
                    <input type="radio" name="mc6e" id="mc6e_no" <?php if ($mcans['MC6e'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6f"][0] ?></td>
            <td>
                <label for="mc6f_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6f" id="mc6f_yes" <?php if ($mcans['MC6f'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6f_no">
                    <input type="radio" name="mc6f" id="mc6f_no" <?php if ($mcans['MC6f'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6g"][0] ?></td>
            <td>
                <label for="mc6g_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6g" id="mc6g_yes" <?php if ($mcans['MC6g'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6g_no">
                    <input type="radio" name="mc6g" id="mc6g_no" <?php if ($mcans['MC6g'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
        <tr>
            <td><?php echo $ZhaFigureDescriptionqn["MC6h"][0] ?></td>
            <td>
                <label for="mc6h_yes" style="margin-right: 50px">
                    <input type="radio" name="mc6h" id="mc6h_yes" <?php if ($mcans['MC6h'] == "Yes") echo "checked"; ?> value="Yes" required> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
                <label for="mc6h_no" style="margin-right: 50px">
                    <input type="radio" name="mc6h" id="mc6h_no" <?php if ($mcans['MC6h'] == "No") echo "checked"; ?> value="No">  <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
        </tr>
    </table>

    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td rowspan="2"><?php echo $ZhaFigureDescriptionqn["ME1a"][0] ?></td>
            <td width="100">
                <label for="me1_yes">
                    <input type="radio" name="me1a" <?php if ($mcans['ME1a'] == "Yes") echo "checked"; ?> value="Yes" id="me1_yes"> <?php echo $text["SECT_LABEL_YES"] ?>
                </label>
            </td>
            <td><?php echo $ZhaFigureDescriptionqn["ME1b"][0] ?>  <br>
                <input type="date" name="me1b" value="<?php echo $mcdate['ME1b'] ?>" class="text">
            </td>
            <td rowspan="2" width="60" class="data-group">ME1</td>
        </tr>
        <tr>
            <td>
                <label for="me1_no">
                    <input type="radio" name="me1a" <?php if ($mcans['ME1a'] == "No") echo "checked"; ?> value="No" id="me1_no"> <?php echo $text["SECT_LABEL_NO"] ?>
                </label>
            </td>
            <td><?php echo $ZhaFigureDescriptionqn["ME1c"][0] ?><br> <input type="text" name="me1c" value="<?php echo $mctext['ME1c'] ?>" class="text" style="width: 90%"></td>
        </tr>
    </table>
</div>

