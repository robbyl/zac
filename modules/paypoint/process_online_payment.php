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
$paid_amount = clean($_POST['paid_amount']);
$amount_in_words = clean($_POST['amount_in_words']);
$user_id = $_SESSION['user_id'];

session_commit();

if ($cust_appnt === "Account No") {

    //Obtainig customer id depending on the provided account no.
    $query_account = "SELECT acc_no, cust_id
                        FROM account
                       WHERE acc_no = '$number'
                       LIMIT 1";
    $result_account = mysql_query($query_account) or die(mysql_error());
    $nun_account = mysql_num_rows($result_account);

    if ($nun_account >= 1) {

        // If provided account no. exits
        $row_account = mysql_fetch_array($result_account);
        $cust_id = $row_account['cust_id'];
    } else {

        // If account no does not exist
        info('error', 'Account No does not exist!. Please check for any mistakes and try again');
        header("Location: online_payments.php");
    }
} elseif ($cust_appnt === "Appln No") {

    //Obtainig application id depending on the provided application no.
    $query_appln_no = "SELECT appln_no, appnt.appnt_id
                         FROM application appn
                   INNER JOIN applicant appnt
                           ON appn.appnt_id = appnt.appnt_id
                        WHERE appln_no = '$number'
                        LIMIT 1";

    $result_appln_no = mysql_query($query_appln_no) or die(mysql_error());
    $nun_appn_no = mysql_num_rows($result_appln_no);

    if ($nun_appn_no >= 1) {

        $row_appln_no = mysql_fetch_array($result_appln_no);
        $appnt_id = $row_appln_no['appnt_id'];
    } else {

        // If application no does not exist
        info('error', 'Application No. does not exist!. Please check for any mistakes and try again');
        header("Location: online_payments.php");
    }
}

// Making receipt transaction
$query_transaction = "INSERT INTO transaction
                                  (trans_date, description)
                           VALUES (CURRENT_TIMESTAMP(), '$payment_type')";

$result_transaction = mysql_query($query_transaction) or die(mysql_error());

$transaction_id = mysql_insert_id();

// Obtaining the last receipt number
$query_receipt_no = "SELECT MAX(rec_no) AS cur_rec_no
                       FROM receipt
                      WHERE rec_type = 'Online'";
$result_receipt_no = mysql_query($query_receipt_no) or die(mysql_error());

$row_rec = mysql_fetch_array($result_receipt_no);
$cur_rec_no = $row_rec['cur_rec_no'];
$rec_rows = mysql_num_rows($result_receipt_no);

$rec_no = ($rec_rows > 0 ? $rec_no = $cur_rec_no : $rec_no = '0');

$rec_no++;

// Inserting receipt details
$query_receipt = "INSERT INTO receipt
                              (rec_no, rec_type, tran_id, payed_amount, amount_in_words, user_id)
                       VALUES ('$rec_no', 'Online', '$transaction_id', '$paid_amount', '$amount_in_words', '$user_id')";

$result_receipt = mysql_query($query_receipt) or die(mysql_error());

$receipt_id = mysql_insert_id();

if ($cust_appnt === "Account No") {

    // Accepting customer payments  
    // If payment is for sewer or water deduct customer debit
    $cust_open_balance = "";

    if ($payment_type === "Water Payment" || $payment_type === "Sewer Payment") {

        $query_debit = "SELECT aging_debit
                          FROM aging_analysis
                         WHERE cust_id = '$cust_id'
                      ORDER BY aging_date DESC
                         LIMIT 1";

        $result_debit = mysql_query($query_debit) or die(mysql_error());
        $row_bebit = mysql_fetch_array($result_debit);
        $cust_open_balance = $row_bebit['aging_debit'];

        $query_aging = "UPDATE aging_analysis age
                           SET aging_debit = aging_debit - '$paid_amount'
                         WHERE cust_id = '$cust_id'
                      ORDER BY aging_date DESC
                         LIMIT 1";

        $result_aging = mysql_query($query_aging) or die(mysql_error());
    }

    $query_cust_payment = "INSERT INTO cust_payment
                                       (rec_id, trans_id, cust_id, cust_open_balance)
                                VALUES ('$receipt_id', '$transaction_id', '$cust_id', '$cust_open_balance')";

    $result_cust_payment = mysql_query($query_cust_payment) or die(mysql_error());
} elseif ($cust_appnt === "Appln No") {

    // Accepting applicant payments
    $query_appnt_payment = "INSERT INTO appnt_payment
                                    (rec_id, trans_id, appnt_id)
                             VALUES ('$receipt_id', '$transaction_id', '$appnt_id')";

    $result_appnt_payment = mysql_query($query_appnt_payment) or die(mysql_error());

    if ($payment_type === "Application fee") {
        $query_appln = "UPDATE application
                           SET status = 'Paid'
                         WHERE appln_no = '$number'";
        $result_appln = mysql_query($query_appln) or die(mysql_error());
    }
}

if ($transaction_type === "Cheque") {

    // Insert details into cheque
    $query_cheque = "INSERT INTO cheque
                                 (cheq_no, bank, rec_id)
                          VALUES ('$cheque_no', '$bank', '$receipt_id')";

    $result_cheque = mysql_query($query_cheque) or die(mysql_error());
}

if ($result_transaction && $result_receipt && $result_appln || $result_appnt_payment || $result_cust_payment || $result_cheque) {

    info('message', 'Payment accepted successfully!');
    header('Location: online_payments.php');
} else {

    info('error', 'An error occured, Please try again!.');
    header('Location: online_payments.php');
}
?>
