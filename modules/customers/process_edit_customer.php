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
$customer_id = $_POST['cust_id'];
$user_full_name = $_POST['fullname'];
$email = $_POST['email'];
$role = $_POST['role'];

$num_id = count($cust_id_id);

for ($i = 0; $i < $num_id; $i++) {

    $cust_id[$i] = $user_id[$i];
    echo  $customer_id;
    exit;
    $user_full_name[$i] = $user_full_name[$i];
    $email[$i] = $email[$i];
    $role[$i] = $role[$i];

    // Inserting form data to the database
    $query_customer = "UPDATE customer
                      SET user_full_name = '$user_full_name[$i]',
                          email = '$email[$i]', role = '$role[$i]'
                    WHERE user_id = '$user_id[$i]' ";

    $result_user = mysql_query($query_customer) or die(mysql_error());
}


if ($result_customer) {

    // Showing success message
    info('message', 'Updated successfully!');
    header('Location: customers.php');
} else {

    // Showing error message
    info('error', 'Cannot update. Please try again!');
    header('Location: customers.php');
}
?>
