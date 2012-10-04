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
                               premise_status, appnt_post_addr, prev_reading, reading AS curr_reading, met.met_id,
                               billing_date, reading_date, billing_areas, initial_reading, consumption,
                               block_no
                          FROM customer cust
                     LEFT JOIN  meter_reading metr 
                            ON cust.cust_id = metr.cust_id
                     LEFT JOIN (
                        SELECT mred_id, reading AS prev_reading
                          FROM meter_reading
                                ) AS b 
                            ON metr.mred_id - (SELECT COUNT(*) FROM meter_customer) = b.mred_id
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
                               {$filter}
                         WHERE premise_status = 'Metered'";

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
                    
        $('#select-all').click(function(){
            // Iterate each check box

            if(this.checked){
                $(':checkbox').each(function(){
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
    </script>
    <form action="action.php" method="post" onSubmit="">
        <div class="actions" style="top: 212px">
            <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT-READINGS">Edit</button>
            <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" name="action[]" value="PRINT">Print</button>
            <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" name="action[]" value="PDF">PDF</button>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
            <thead>
                <tr>
                    <th width="23">
                        <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                    </th>
                    <th title="Account number" class="tooltip">Account No.</th>
                    <th title="Meter number" class="tooltip">Meter No.</th>
                    <th>Customer name</th>
                    <th>Billing date</th>
                    <th title="Previous reading date" class="tooltip">Pre reading date</th>
                    <th title="Previous reading" class="tooltip">Pre reading</th>
                    <th title="Current reading" class="tooltip">Curr reading</th>
                    <th>Consumption</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysql_fetch_array($result_meter_reading)) {
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="checkbox[]" value="<?php echo $row['mred_id'] ?>" id="<?php echo $row['mred_id'] ?>">
                        </td>
                        <td><?php echo $row['acc_no'] ?></td>
                        <td><?php echo $row['met_number'] ?></td>
                        <td><?php echo $row['appnt_fullname'] ?></td>
                        <td><?php echo $row['billing_date'] ?></td>
                        <td><?php echo $row['block_no'] ?></td>
                        <td>
                            <?php if (!empty($row['prev_reading'])) echo $row['prev_reading']; else echo $row['initial_reading']; ?>
                        </td>
                        <td><?php echo $row['curr_reading'] ?></td>
                        <td><?php echo $row['consumption'] ?></td>
                        <td style="vertical-align: top" >some remarks</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </form>
<?php } ?>
