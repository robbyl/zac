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
 *  @author Robert Loondo <robbyl@ovi.com>
 *  @copyright  2012 Flight
 *  @version  Release: $Revision: 1.0.0 $
 */

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '0881');
define('DATABASE', 'softbill');

$conn = mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
$db = mysql_select_db(DATABASE);

?>
