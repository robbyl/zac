<?php

/*
 * 2012 zanhid
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Londo <robbyl@ovi.com>
 *  @copyright  2012 sotbill
 *  @version  Release: 1.0.0
 */


//require '../../includes/session_validator.php';
require '../../config/config.php';
require '../../functions/general_functions.php';

session_start();
$user_id = $_SESSION['user_id'];
session_commit();

$curr_pass = sha1($_POST['curr_pass']);
$new_pass = sha1($_POST['new_pass']);

// Cheking if the provided current password is in the database
$query_currpass = "SELECT user_id, password
                     FROM users
                    WHERE user_id = $user_id
                      AND password = '$curr_pass'";

$result_currpass = mysql_query($query_currpass) or die(mysql_error());
$num_currpass = mysql_num_rows($result_currpass);

if ($num_currpass === 1) {

    // Current password is present
    // Updating it with  new password

    $query_newpass = "UPDATE users
                        SET password = '$new_pass'
                      WHERE user_id = '$user_id'";

    $result_newpass = mysql_query($query_newpass) or die();

    if ($result_newpass) {
        // Password change successfully
        info('message', 'Password changed!');
        header('Location: change_password.php');
    } else {

        // Password change failed.
        info('error', 'Cannot change!. Please try again');
        header('Location: change_password.php');
    }
} else {

    // Provided current password is not in the database
    info('error', 'Please provide the correct current password!');
    header('Location: change_password.php');
}
?>
