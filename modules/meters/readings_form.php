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

    $filter = clean($_GET['filter']);

    $filter === 'All' ? $filter = "" : $filter = 'AND billing_areas = ' . "'$filter' ";

    $query_meter_reading = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number,
                               premise_status, appnt_post_addr, reading, met.met_id,
                               billing_date, initial_reading, reading_date, billing_areas
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
                            ON cust.met_id = met.met_id
                               {$filter}
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

    <form action="process_meter_reading.php" method="post" name="readings" id="readings" oninput="consumptions()" >
        <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
            <thead>
                <tr>
                    <th width="23" title="Serial No." class="tooltip">
                        SN
                    </th>
                    <th title="Account number" class="tooltip">Account No.</th>
                    <th title="Meter number" class="tooltip">Meter No.</th>
                    <th>Customer name</th>
                    <th title="Previous reading date" class="tooltip" >Prev reading date</th>
                    <th title="Previous reading" class="tooltip">Prev reading</th>
                    <th title="Current reading" class="tooltip">Curr reading</th>
                    <th>Consumption</th>
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
                <td><?php echo $row['reading_date'] ?></td>
                <td>
                    <input type="text" name="prev_reading[]" value="<?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?>" readonly  class="prev" >
                </td>
                <td>
                    <input type="number" name="curr_reading[]" min="<?php if (!empty($row['reading'])) echo $row['reading']; else echo $row['initial_reading']; ?>" required class="number" style="width: 100px;">
                </td>
                <td><output name="cons[]" ></output></td>
                <td>
                    <input type="text" name="remarks[]" class="text" style="width: 200px;">
                </td>
                </tr>
                <?php
                $SN++;
            }
            ?>
        </tbody>
    </table>
    <table width="531">
        <tr>
            <td width="307"><button type="submit">Save</button>
                <button type="reset">Reset</button></td>
        </tr>
    </table>
</form>
<?php } ?>