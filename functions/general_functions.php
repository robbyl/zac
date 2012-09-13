<?php

/*
 * 2012 sotbill
 *
 * NOTICE OF LICENSE
 *
 * This source file is protected by copyright
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file.
 *
 *  @author Robert Loondo <robbyl@ovi.com>
 *  @copyright  2012 softbill
 *  @version  Release: $Revision: 1.0.0 $
 */

// Clean user input data
function clean($string) {
    $cleaned_string = mysql_real_escape_string($string);
    return trim($cleaned_string);
}

function clean_arr($string = array()) {
    $elements = count($string);
    for ($i = 0; $i < $elements; $i++) {
        $string[$i] = clean($string[$i]);
    }
    return $string;
}

// Sets messages and errors to session
function info($type, $content) {

    session_start();
    $_SESSION[$type] = $content;
    session_commit();
}

?>