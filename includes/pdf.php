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

$html = $_POST['html'];

include("../plugins/mpdf/mpdf.php");

$mpdf = new mPDF('s');
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>
