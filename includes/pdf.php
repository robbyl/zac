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

require_once("../plugins/dompdf/dompdf_config.inc.php");

$html = $_POST['html'];


//echo $html;
//exit;

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('latter', 'portrait');
$dompdf->render();

$dompdf->stream("invoice.pdf", array("Attachment" => false));
?>
