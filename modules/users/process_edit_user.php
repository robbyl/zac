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
$user_id = clean_arr($_POST['user_id']);
$usr_fname = clean_arr($_POST['usr_fname']);
$usr_lname = clean_arr($_POST['usr_lname']);
$email = clean_arr($_POST['email']);
$role = clean_arr($_POST['role']);

$num_id = count($user_id);

for ($i = 0; $i < $num_id; $i++) {

    // Inserting form data to the database
    $query_user = "UPDATE users
                      SET usr_fname = '$usr_fname[$i]',
                          usr_lname = '$usr_lname[$i]',
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
