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
require '../../config/config.php';

$query_meter_reading = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number,
                               premise_status, appnt_post_addr, reading, met.met_id,
                               billing_date, initial_reading, plot_no, block_no
                          FROM customer cust
                     LEFT JOIN meter_reading metr
                            ON cust.cust_id = metr.cust_id
                    INNER JOIN applicant appnt
                            ON cust.appnt_id = appnt.appnt_id
                    INNER JOIN application appln
                            ON appln.appnt_id = appnt.appnt_id
                    INNER JOIN appnt_type apty
                            ON appnt.appnt_type_id = apty.appnt_type_id
                    INNER JOIN account acc
                            ON cust.cust_id = acc.cust_id
                    INNER JOIN meter met
                            ON cust.met_id = met.met_id
                         WHERE premise_status = 'Metered'
                           AND billing_date = (
                        SELECT MAX(billing_date)
                          FROM meter_reading)";

$result_meter_reading = mysql_query($query_meter_reading) or die(mysql_error());
?>

<script type="text/javascript">

    oTable = $('#dataTable').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": true,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    $('.message, .error').hide().slideDown('normal').click(function(){
        $(this).slideUp('normal');
    });

    $('.tooltip').tipTip({
        delay: "300"
    });
</script>

<div class="actions" style="top: 212px">
    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" name="action[]" value="PRINT">Print</button>
    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" name="action[]" value="PDF">PDF</button>
</div>
<table cellpadding="0" cellspacing="0" border="0" id="dataTable">
    <thead>
        <tr>
            <th width="23" title="Serial No." class="tooltip">
                SN
            </th>
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
        <input type="hidden" name="cust_id[]" value="<?php echo $row['cust_id'] ?>" >
        <input type="hidden" name="met_id[]" value="<?php echo $row['met_id'] ?>" >
        <td><?php echo $SN ?></td>
        <td><?php echo $row['acc_no'] ?></td>
        <td><?php echo $row['met_number'] ?></td>
        <td><?php echo $row['appnt_fullname'] ?></td>
        <td><?php echo $row['plot_no'] ?></td>
        <td><?php echo $row['block_no'] ?></td>
        <td>
            <?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?>
        </td>
        <td></td>
        <td>
        </td>
    </tr>
    <?php
    $SN++;
}
?>
</tbody>
</table>
