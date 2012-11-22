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

$action = $_POST['action'];

$action = $action[0];

switch ($action) {
    case 'DELETE':
        include 'delete_backup.php';
        break;

    default: echo 'Nothing to be performed';
        break;
}
?>
