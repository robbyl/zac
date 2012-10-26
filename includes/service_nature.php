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

require '../config/config.php';

if (isset($_POST['appln_id']) && !empty($_POST['appln_id'])) {

    $appln_id = $_POST['appln_id'];

    $query_appln = "SELECT service_nature_id
                      FROM application appln
                INNER JOIN applicant appnt
                        ON appln.appnt_id = appnt.appnt_id
                     WHERE appln_id = '$appln_id'";

    $result_appln = mysql_query($query_appln) or die(mysql_error());
    $row = mysql_fetch_array($result_appln);

    $sev_nat_id = $row['service_nature_id'];
}

$query_sev_nature = "SELECT *
                       FROM service_nature";

$result_sev_nature = mysql_query($query_sev_nature) or die(mysql_error());

$sublist = array();

while ($row_sev = mysql_fetch_assoc($result_sev_nature)) {
    $sublist[$row_sev['appnt_type_id']][$row_sev['service_nature_id']] = $row_sev['service'];
}

$services = '';

if (!empty($_POST['appnt_type'])) {

    if (isset($sublist[$_POST['appnt_type']]))
        $value = $_POST['appnt_type'];

    foreach ($sublist[$value] as $service_nature_id => $service) {

        $services.="<option value=\"{$service_nature_id}\"";
        if (!empty($row['service_nature_id'])) {
            if ($service_nature_id == $sev_nat_id)
                $services.=' selected="selected" ';
        }
        $services.= ">{$service}</option>\n";
    }
}

echo '<select name="service_nature" class="select" required>
      <option value="">--select service nature--</option>'
 . $services .
 '</select>';
?>
