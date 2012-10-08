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
 *  @copyright  2012 sofbill
 *  @version  Release: 1.0.0
 */
?>
<?php
if (isset($_GET['filter']) && !empty($_GET['filter'])) {

    require '../../config/config.php';
    require '../../functions/general_functions.php';

    $query_authority = "SELECT aut_name, logo
                          FROM settings";

    $result_authority = mysql_query($query_authority) or die(mysql_error());

    $row_authority = mysql_fetch_array($result_authority);

    $filter = clean($_GET['filter']);

    $filter === 'All' ? $filter = "" : $filter = 'AND billing_areas = ' . "'$filter' ";

    $query_meter_reading = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number,
                               premise_status, appnt_post_addr, reading, met.met_id,
                               billing_date, initial_reading, plot_no, block_no,
                               billing_areas
                          FROM customer cust
                     LEFT JOIN meter_reading metr
                            ON cust.cust_id = metr.cust_id
                    INNER JOIN billing_area ba
                            ON cust.ba_id = ba.ba_id
                    INNER JOIN applicant appnt
                            ON cust.appnt_id = appnt.appnt_id
                    INNER JOIN application appln
                            ON appln.appnt_id = appnt.appnt_id
                    INNER JOIN appnt_type apty
                            ON appnt.appnt_type_id = apty.appnt_type_id
                    INNER JOIN account acc
                            ON cust.cust_id = acc.cust_id
                    INNER JOIN meter met
                            ON metr.met_id = met.met_id
                         WHERE premise_status = 'Metered'
                               {$filter}
                           AND billing_date = (
                        SELECT MAX(billing_date)
                          FROM meter_reading)";

    $result_meter_reading = mysql_query($query_meter_reading) or die(mysql_error());
    ?>

    <!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
            <title></title>
            <style type="text/css">
                table {
                    border-collapse: collapse;
                }
            </style>
            <link href="../../css/sheet.css" rel="stylesheet" type="text/css">
        </head>
        <body onload="window.print(); window.close();" style="font-size: 80%;">
            <div class="sheet-wraper">
                <div class="sheet-header">

                    <div class="header-title">
                        <p><?php echo $row_authority['aut_name'] ?></p> 
                        <p style="font-size: 18px;">METER READING SHEET</p>
                        <div class="page-logo">
                            <img src="../settings/logo/<?php echo $row_authority['logo'] ?>" height="80">
                        </div>
                    </div>

                    <!-- end .sheet-header --></div>
                <div class="print-details" style="float: right">
                    <p>Print Date: <span style="font-weight: normal"><?php echo date('Y-m-d') ?></span></p>
                    <p>Billing Area/Zone: <span style="font-weight: normal">Migongo</span></p>
                </div>
                <div class="print-details">
                    <p>Reading Date: ..................................</p>
                    <p>Meter Reader: ................................................................</p>
                    <p>Billing Month: <span style="font-weight: normal"><?php echo date('Y-m-d') ?></span></p>                   
                </div>
                <div class="sheet-table">
                    <table cellpadding="3" cellspacing="0" border="1" width="100%">
                        <thead>
                            <tr>
                                <th title="Serial No." class="tooltip"> SN </th>
                                <th title="Account number" class="tooltip">Account No.</th>
                                <th title="Meter number" class="tooltip">Meter No.</th>
                                <th>Customer name</th>
                                <th title="Plot number" class="tooltip" >Plot no</th>
                                <th title="Block number" class="tooltip">Block no.</th>
                                <th title="Previous reading" class="tooltip">Pre reading</th>
                                <th title="Current reading" class="tooltip">Curr reading</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $SN = 1;
                            while ($row = mysql_fetch_array($result_meter_reading)) {
                                ?>
                                <tr>

                                    <td><?php echo $SN ?></td>
                                    <td><?php echo $row['acc_no'] ?></td>
                                    <td><?php echo $row['met_number'] ?></td>
                                    <td><?php echo $row['appnt_fullname'] ?></td>
                                    <td><?php echo $row['plot_no'] ?></td>
                                    <td><?php echo $row['block_no'] ?></td>
                                    <td><?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php
                                $SN++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--            --></div>
        </body>
    <?php } ?>
</html>
