<div class="form-footer">
    <table border="0" cellspacing="0" style="border: none !important" width="100%">
        <tr>
            <td width="18%"><?php echo $text["FORM_FOOTER_COMP_BY"] ?></td>
            <td width="28%">
                <select class="select" name="completed_by" required style="width: 90%;">
                    <option value=""></option>
                    <span class="org_person"></span>
                </select>
            </td>
            <td width="18%"><?php echo $text["FORM_FOOTER_DATE_COMP"] ?></td>
            <td width="36%"><input type="date" name="completed_date" value="<?php echo $submitted['DateCompleted']; ?>" class="text" style="width: 67%"></td>
        </tr>
        <tr>
            <td><?php echo $text["FORM_FOOTER_POS"] ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $text["FORM_FOOTER_APR_BY"] ?></td>
            <td><select class="select" name="approved_by" required style="width: 90%;">
                    <option value=""></option>
                    <span class="org_person"></span>
                </select></td>
            <td><?php echo $text["FORM_FOOTER_DATE_APR"] ?></td>
            <td><input type="date" name="approved_date" value="<?php echo $submitted['DateApproved']; ?>" class="text" style="width: 67%"></td>
        </tr>
        <tr>
            <td><?php echo $text["FORM_FOOTER_POS"] ?></td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table border="0" cellspacing="0" style="border: none !important" width="100%">
        <tr>
            <td width="18%">Date Received:</td>
            <td width="28%">
                <input type="date" name="received_date" value="<?php echo $submitted['DateReceived'] ?>" class="text" style="width: 86%;">
            </td>
            <td width="18%">Date Verified:</td>
            <td width="36%"><input type="date" name="verified_date" value="<?php echo $submitted['DateVerified'] ?>" class="text" style="width: 67%"></td>
        </tr>
        <tr>
            <td>Date Captured:</td>
            <td><input type="date" name="captured_date" value="<?php echo $submitted['DateCaptured'] ?>"  class="text" style="width: 86%;"></td>
            <td>Verified by:</td>
            <td>
                <select class="select" name="verified_by" required style="width: 70%;">
                    <option value=""></option>
                    <?php
                    $query_user = "SELECT `UserID`, `FullName` FROM tblgenusers ORDER BY `FullName` ASC";
                    $result_user = mysql_query($query_user) or die(mysql_error());
                    while ($user = mysql_fetch_array($result_user)) {
                        ?>
                        <option value="<?php echo $user['UserID'] ?>" <?php if ($submitted['VerifiedByUserID'] === $user['UserID']) echo 'selected' ?>>
                            <?php echo $user['FullName'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Captured By:</td>
            <td><select class="select" name="captured_by" required style="width: 90%;">
                    <option value=""></option>
                    <?php
                    $query_user = "SELECT `UserID`, `FullName` FROM tblgenusers ORDER BY `FullName` ASC";
                    $result_user = mysql_query($query_user) or die(mysql_error());
                    while ($user = mysql_fetch_array($result_user)) {
                        ?>
                        <option value="<?php echo $user['UserID'] ?>" <?php if ($submitted['CapturedByUserID'] === $user['UserID']) echo 'selected' ?>>
                            <?php echo $user['FullName'] ?></option>
                        <?php
                    }
                    ?>
                </select></td>
            <td>Date Filed:</td>
            <td><input type="date" name="filed_date" value="<?php echo date('Y-m-d') ?>" class="text" style="width: 67%"></td>
        </tr>
        <tr>
            <td>Additional Notes</td><td><textarea name="comments" cols="31"><?php echo $submitted['NotesWrittenOnForm']; ?></textarea></td>
            <td>Additional Notes by ZAC</td><td><textarea name="comments_zac" cols="31"></textarea></td>
        </tr>
    </table>
    <?php mysql_close($conn); ?>
</div>
<dv class="data-form-buttons">
    <button type="submit">Save</button><button type="reset">Reset</button>
    <!-- .end data-form-buttons --></dv>

