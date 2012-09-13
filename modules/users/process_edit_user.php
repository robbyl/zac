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
require '../../config/config.php';
require '../../functions/general_functions.php';

// Getting form data
$user_id = $_POST['user_id'];
$user_full_name = $_POST['fullname'];
$email = $_POST['email'];
$role = $_POST['role'];

$num_id = count($user_id);

for ($i = 0; $i < $num_id; $i++) {

    $user_id[$i] = clean($user_id[$i]);
    $user_full_name[$i] = clean($user_full_name[$i]);
    $email[$i] = clean($email[$i]);
    $role[$i] = clean($role[$i]);

    // Inserting form data to the database
    $query_user = "UPDATE users
                      SET user_full_name = '$user_full_name[$i]',
                          email = '$email[$i]', role = '$role[$i]'
                    WHERE user_id = '$user_id[$i]' ";

    $result_user = mysql_query($query_user) or die(mysql_error());
}


if ($result_user) {

    // Showing success message
    info('message', 'Updated successfully!');
    header('Location: users.php');
} else {

    // Showing error message
    info('error', 'Cannot update. Please try again!');
    header('Location: users.php');
}
?>
