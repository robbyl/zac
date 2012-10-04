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

$cust_appnt = clean($_POST['cust_appnt']);
$number = clean($_POST['number']);
$transaction_type = clean($_POST['transaction_type']);
$cheque_no = clean($_POST['cheque_no']);
$bank = clean($_POST['cust_appnt']);
$payed_amount = clean($_POST['payed_amount']);
$amount_in_words = clean($_POST['amount_in_words']);

echo $cust_appnt . '<br>';
echo $number . '<br>';
echo $transaction_type . '<br>';
echo $cheque_no . '<br>';
echo $bank . '<br>';
echo $payed_amount . '<br>';
echo $amount_in_words . '<br>';
?>
