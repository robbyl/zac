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
$user_id = clean($_POST['user_id']);
$user_full_name = clean($_POST['fullname']);
$email = clean($_POST['email']);

// Inserting form data to the database
$query_user = "UPDATE users
                  SET user_full_name = '$user_full_name', email = '$email'
                WHERE user_id = '$user_id' ";

$result_user = mysql_query($query_user) or die(mysql_error());

if ($result_user) {

    // Showing success message
    info('message', 'Updated successfully!');
    header('Location: ../../modules/users/my_profile.php');
} else {

    // Showing error message
    info('error', 'Cannot update. Please try again!');
    header('Location: ../../mudules/users/my_profile.php');
}
?>
