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

$html = $_POST['html'];

require_once("../plugins/dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();

$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);

?>
