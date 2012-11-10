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
include '../../config/config.php';
include '../../functions/general_functions.php';


// Taking data from the form
$authority = clean($_POST['authority']);
$address = clean($_POST['address']);
$tel = clean($_POST['tel']);
$fax = clean($_POST['fax']);
$email = clean($_POST['email']);
$url = clean($_POST['web']);
$parking_fee = clean($_POST['parking_fee']);
$landing_fee = clean($_POST['landing_fee']);
//$page_size = clean($_POST['page_size']);
$page_orientation = clean($_POST['page_orientation']);

// Get existing Authority logo
$query_log = "SELECT logo
                FROM settings";
$result_logo = mysql_query($query_log) or die(mysql_error());
$row_logo = mysql_fetch_array($result_logo);


// Get and upload image file
$allowedExts = array("jpg", "jpeg", "gif", "png");

$extension = end(explode(".", $_FILES["logo"]["name"]));
if ((($_FILES["logo"]["type"] == "image/gif")
        || ($_FILES["logo"]["type"] == "image/jpeg")
        || ($_FILES["logo"]["type"] == "image/png")
        || ($_FILES["logo"]["type"] == "image/gif")
        || ($_FILES["logo"]["type"] == "image/pjpeg"))
        && ($_FILES["logo"]["size"] < 2000000)
        && in_array($extension, $allowedExts)) {

    // Checking file for errors
    if ($_FILES["logo"]["error"] > 0) {

        $message = "This file contain errors. Return Code: " . $_FILES["logo"]["error"];
        info('error', $message);
    } else {

        // Remove file if requested
        if ($_POST['romove_logo'] === "REMOVE_AUTH_LOGO") {
            unlink('logo/' . $row_logo['logo']);
        }

        // Get file name
        $logo = "authority_logo." . $extension;

        // Uploading it to logo folder.
        move_uploaded_file($_FILES["logo"]["tmp_name"], "logo/authority_logo." . $extension);
    }
} elseif (empty($_FILES["logo"]["name"])) {

    if ($_POST['romove_logo'] === "REMOVE_AUTH_LOGO") {
        unlink('logo/' . $row_logo['logo']);
        $logo = "";
    } else {
        $logo = $row_logo['logo'];
    }
} else {

    info('error', 'This file type is not allowed');
    header('Location: settings.php');
    exit(0);
}


// Inserting data into the database
$query_settings = "UPDATE settings
                      SET aut_name = '$authority',
                          address = '$address',
                          phone = '$tel',
                          fax = '$fax',
                          email = '$email',
                          url = '$url', 
                          logo = '$logo'";

$result_settings = mysql_query($query_settings) or die(mysql_error());

if ($result_settings) {

    info('message', 'Settings saved!');
    header('Location: settings.php');
} else {

    info('error', 'Settings not saved!. Please try again');
    header('Location: settings.php');
}
?>
