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
 *  @copyright  2012 zanhid
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

// Converting numeric period into words
function period_to_words($period) {
    switch ($period) {
        case '01-01/03-31':
            return 'January - March';
            break;

        case '04-01/06-30':
            return 'April - June';
            break;

        case '07-01/09-30':
            return 'July - September';
            break;

        case '10-01/12-31':
            return 'October - December';
            break;

        default:
            return 'Invalid period';
            break;
    }
}

?>