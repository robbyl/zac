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
require '../../functions/general_functions.php';

if (!empty($_POST['checkbox'])) {

    // Conneting to the database
    require '../../config/config.php';

    while (list($key, $val) = each($_POST['checkbox'])) {

        $deleted = unlink('backups/' . $val);
    }

    if ($deleted) {

        info('message', 'Backup(s) deleted successfully!');
        header('Location: backups.php');
    } else {

        info('error', 'Cannot delete backup(s)!. Please Try again');
        header('Location: backups.php');
    }
} else {

    info('error', 'Please select backup(s) first.');
    header('Location: backups.php');
}
?>
