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
                        <select name="month_range" class="select">
                            <option value=""></option>
                            <option value="">January - March</option>
                            <option value="">April - June</option>
                            <option value="">July - September</option>
                            <option value="">October - December</option>
                        </select>
                        <select name="year" class="select">
                            <option value="" ></option>
                           
                        </select>
                    </p>
                </td>
                <td>&nbsp;</td>
                <td align="right">Form No:</td>
                <td align="right">
                    <input type="text" value="<?php echo $form_serial_no ?>" name="form_no" required class="text" style="font-size: 1.5em; width: 150px; text-align: right">
                </td>
            </tr>
        </table>
    </div>
    <!-- end .form-header --></div>