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
 *  @version  Release:  1.0.0
 */

session_start();

if (!empty($_SESSION['message-outer'])) {

    echo '<div class="message-outer">';
    echo $_SESSION['message-outer'];
    echo '</div>';

    unset($_SESSION['message-outer']);
}

if (!empty($_SESSION['error-outer'])) {

    echo '<div class="error-outer">';
    echo $_SESSION['error-outer'];
    echo '</div>';

    unset($_SESSION['error-outer']);
}

if (!empty($_SESSION['message'])) {

    echo '<div class="message">';
    echo $_SESSION['message'];
    echo '</div>';

    unset($_SESSION['message']);
}

if (!empty($_SESSION['error'])) {

    echo '<div class="error">';
    echo $_SESSION['error'];
    echo '</div>';

    unset($_SESSION['error']);
}

session_commit();
?>