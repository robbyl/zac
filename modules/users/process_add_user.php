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
$usr_fname = clean($_POST['usr_fname']);
$usr_lname = clean($_POST['usr_lname']);
$email = clean($_POST['email']);
$username = clean($_POST['username']);
$password = sha1($_POST['password']);
$role = clean($_POST['role']);

// Inserting form data to the database
$query_user = "INSERT INTO users
                           (usr_fname, usr_lname, email, username, password, role)
                     VALUES('$usr_fname','$usr_lname', '$email', '$username', '$password', '$role')";

$result_user = mysql_query($query_user) or die(mysql_error());

if ($result_user) {

    // Showing success message
    info('message', 'Saved Successfully!');
    header('Location: new_user.php');
} else {

    // Showing error message
    info('error', 'Cannot save. Please try again');
    header('Location: new_user.php');
}
?>
