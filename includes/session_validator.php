<?php

/*
 * 2012 zanhid
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
 *  @copyright  2012 zanhid
 *  @version  Release: 1.0.0
 */

session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
    $_SESSION['error-outer'] = 'Please sign in first to continue';
    header('Location: ../../index.php');
}
session_commit();
?>
