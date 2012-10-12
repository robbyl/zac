<?php

/*
 * 2012 softbill
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
 *  @copyright  2012 softbill
 *  @version  Release: 1.0.0
 */

require '../../config/config.php';
require '../../functions/general_functions.php';

// Getting form data

$username = clean($_POST['username']);
$password = sha1($_POST['password']);

// checkig if username and password are valid

$query_user = "SELECT user_id, usr_fname, usr_lname, username, 
                      password, role, password, status
                 FROM users
                WHERE username = '$username' AND password = '$password' ";

$result_user = mysql_query($query_user) or die(mysql_error());
$row_user = mysql_fetch_array($result_user);

$num_row = mysql_num_rows($result_user);

if ($num_row === 1 && $row_user['status'] === 'ACTIVE') {

    // Login successfully
    
    // Login out any un-logged user first.
    mysql_close($conn);
    session_start();
    $_SESSION['username'] = $row_user['username'];
    $_SESSION['usr_fname'] = $row_user['usr_fname'];
    $_SESSION['usr_lname'] = $row_user['usr_lname'];
    $_SESSION['user_id'] = $row_user['user_id'];
    $_SESSION['password'] = $row_user['password'];
    $_SESSION['role'] = $row_user['role'];
    session_commit();

    header('Location: ../../home.php');
} elseif ($row_user['status'] === 'BLOCKED') {

    // Accont blocked.
    session_start();
    $_SESSION['error-outer'] = "Account blocked!. Contact admin";
    session_commit();
    mysql_close($conn);

    header('Location: ../../index.php');
} else {

    // Login fail
    session_start();
    $_SESSION['error-outer'] = "Username or password is incorrect!";
    session_commit();
    mysql_close($conn);

    header('Location: ../../index.php');
}
?>
