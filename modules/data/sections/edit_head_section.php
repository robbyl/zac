<div class="form-header">
    <div class="zanz-logo"></div>
    <div class="zac-logo"></div>
    <p class="form-heading">ZANZIBAR AIDS COMMISSION (ZAC)</p>
    <p class="form-sub-header"><?php echo $heading ?></p>
    <div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: none; margin-bottom: 0">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="10%"></td>
                <td width="17%"></td>
            </tr>
            <tr>
                <td width="150">Reporting Period</td>
                <td>
                    <p>
                        <select name="month_range" class="select" required="">
                            <option value=""></option>
                            <option value="01-01/03-31" <?php if ($month_range === "01-01/03-31") echo 'selected'; ?>>January - March</option>
                            <option value="04-01/06-30" <?php if ($month_range === "04-01/06-30") echo 'selected'; ?>>April - June</option>
                            <option value="07-01/09-30" <?php if ($month_range === "07-01/09-30") echo 'selected'; ?>>July - September</option>
                            <option value="10-01/12-31" <?php if ($month_range === "10-01/12-31") echo 'selected'; ?>>October - December</option>
                        </select>
                        <select name="year" class="select" required="">
                            <option value="" ></option>
                            <?php
                            for ($i = 2007; $i <= date('Y'); $i++) {
                                echo '<option value="' . $i . '" ';
                                if ($year == $i)
                                    echo 'selected'; echo '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </p>
                </td>
                <td>&nbsp;</td>
                <td align="right">Form No:</td>
                <td align="right">
                    <input type="text" value="<?php echo $form_serial_no ?>" name="form_no" id="form_no" readonly="" class="text" style="font-size: 1.5em; width: 150px; text-align: right">
                </td>
            </tr>
        </table>
    </div>
    <!-- end .form-header --></div>