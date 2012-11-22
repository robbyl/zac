<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require '../../functions/general_functions.php';

$form_id = clean($_GET['form_id']);
if (isset($form_id) && !empty($form_id)) {

    require '../../config/config.php';

    $query_form = "DELETE sub, ans, fig
                          FROM tblzhaformssubmitted sub
                     LEFT JOIN tblzhaanswers ans
                            ON sub.`FormSerialNumber` = ans.`FormSerialNumber`
                     LEFT JOIN tblzhafigures fig
                            ON sub.`FormSerialNumber` = fig.`FormSerialNumber`
                         WHERE sub.`FormSerialNumber` = '$form_id'";

    $result_form = mysql_query($query_form) or die(mysql_error());

    if ($result_form) {
        info('message', 'Form deleted successfully!');
        header("Location: forms.php");
    } else {
        info('error', 'Cannot delete form. Please try again!');
        header('Location: forms.php');
    }
}
mysql_close($conn);
?>
