<?php

/*
 * 2012 Flight
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
 *  @copyright  2012 Flight
 *  @version  Release: 1.0.0
 */

require '../../includes/session_validator.php';
require '../../functions/general_functions.php';

if (!empty($_POST['checkbox'])) {

    // Conneting to the database
    require '../../config/config.php';

    while (list($key, $val) = each($_POST['checkbox'])) {

        $query_user = "UPDATE users
                          SET status = 'BLOCKED'
                        WHERE user_id = '$val'";

        $result_user = mysql_query($query_user) or die(mysql_error());
    }

    if ($result_user) {

        info('message', 'User(s) blocked successfully!');
        header('Location: users.php');
    } else {

        info('error', 'Cannot block user!. Please Try again');
        header('Location: users.php');
    }
} else {

    info('error', 'Please select user(s) first.');
    header('Location: users.php');
}
?>
