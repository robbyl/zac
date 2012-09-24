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
session_start();

$cust_appnt = clean($_POST['cust_appnt']);
$number = clean($_POST['number']);
$payment_type = clean($_POST['payment_type']);
$transaction_type = clean($_POST['transaction_type']);
$cheque_no = clean($_POST['cheque_no']);
$bank = clean($_POST['bank']);
$payed_amount = clean($_POST['payed_amount']);
$amount_in_words = clean($_POST['amount_in_words']);
$user_id = $_SESSION['user_id'];

session_commit();

// Making receipt transaction
$query_transaction = "INSERT INTO transaction
                                  (trans_date, description)
                           VALUES (CURRENT_TIMESTAMP(), '$payment_type')";

$result_transaction = mysql_query($query_transaction) or die(mysql_error());

$transaction_id = mysql_insert_id();

// Inserting receipt details
$query_receipt = "INSERT INTO receipt
                              (tran_id, payed_amount, amount_in_words, user_id)
                       VALUES ('$transaction_id', '$payed_amount', '$amount_in_words', '$user_id')";

$result_receipt = mysql_query($query_receipt) or die(mysql_error());

$receipt_id = mysql_insert_id();

// Insert details into cheque
$query_cheque = "INSERT INTO cheque
                             (cheq_no, bank, rec_id)
                      VALUES ('$cheque_no', '$bank', '$receipt_id')";

$result_cheque = mysql_query($query_cheque) or die(mysql_error());

// Insert data into applicant payment table
$query_appnt_payment = "INSERT INTO appnt_payment
                                    (rec_id)
                             VALUES ('$receipt_id')";

$result_appnt_payment = mysql_query($query_appnt_payment) or die(mysql_error());

// Insert data into customer payment table
$query_cust_payment = "INSERT INTO cust_payment
                                    (rec_id)
                             VALUES ('$receipt_id')";

$result_cust_payment = mysql_query($query_cust_payment) or die(mysql_error());

if ($result_transaction && $result_receipt || $result_appnt_payment || $result_cust_payment || $result_cheque) {

    echo 'success';
} else {

    echo 'failed';
}
?>
