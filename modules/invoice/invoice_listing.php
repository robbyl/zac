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

$query_invoice = "SELECT inv_no, invoicing_date, created_date, appnt_fullname,
                         cost, billing_areas, acc_no, inv_id
                    FROM invoice inv
              INNER JOIN customer cust
                      ON inv.cust_id = cust.cust_id
              INNER JOIN account acc
                      ON cust.cust_id = acc.cust_id
              INNER JOIN applicant appnt
                      ON cust.appnt_id = appnt.appnt_id
              INNER JOIN billing_area ba
                      ON appnt.ba_id = ba.ba_id";

$result_invoice = mysql_query($query_invoice) or die(mysql_error());
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

    function nav(url){
        document.location.href = url;
    }

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

<div class="actions" style="top: 212px">
    <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" name="action[]" value="PRINT">Print</button>
    <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" name="action[]" value="PDF">PDF</button>
</div>
<table cellpadding="0" cellspacing="0" border="0" id="dataTable">
    <thead>
        <tr>
            <th width="10">
                <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
            </th>
            <th title="Invoice number" class="tooltip">Invoice No.</th>
            <th title="Account number" class="tooltip">Account No.</th>
            <th>Billing month</th>
            <th>Created date</th>
            <th>Customer name</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysql_fetch_array($result_invoice)) {
            ?>
            <tr onClick="nav('view_invoice.php?inv_id=<?php echo $row['inv_id'] ?>')">
                <td>
                    <input type="checkbox" name="checkbox[]" value="<?php echo $row['inv_id'] ?>" id="<?php echo $row['inv_id'] ?>">
                </td>
                <td><?php echo sprintf('%08d', $row['inv_no']) ?></td>
                <td><?php echo $row['acc_no'] ?></td>
                <td><?php echo $row['invoicing_date'] ?></td>
                <td><?php echo $row['created_date'] ?></td>
                <td><?php echo $row['appnt_fullname'] ?></td>
                <td align="right"><?php echo $row['cost'] ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
