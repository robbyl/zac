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

if (isset($_GET['filter']) && !empty($_GET['filter'])) {

    require '../../config/config.php';
    require '../../functions/general_functions.php';

    $filter = clean($_GET['filter']);

    $filter === 'All' ? $filter = ";" : $filter = 'WHERE billing_areas = ' . "'$filter' ";

    $query_appln = "SELECT cust.cust_id, appnt_fullname, acc_no, met_number, service,
                           premise_status, appnt_post_addr, billing_areas, appln_type,
                           plot_no, cust_status
                      FROM customer cust
                 LEFT JOIN applicant appnt
                        ON cust.appnt_id = appnt.appnt_id
                 LEFT JOIN application appln
                        ON appln.appnt_id = appnt.appnt_id
                 LEFT JOIN meter_customer mecu
                        ON cust.cust_id = mecu.cust_id
                 LEFT JOIN meter met
                        ON mecu.met_id = met.met_id
                 LEFT JOIN service_nature sn
                        ON appln.service_nature_id = sn.service_nature_id
                 LEFT JOIN billing_area ba
                        ON cust.ba_id = ba.ba_id
                 LEFT JOIN account acc
                        ON cust.cust_id = acc.cust_id                 
                          {$filter}";

    $result_appln = mysql_query($query_appln) or die(mysql_error());
    ?>

    <script type="text/javascript">
        oTable = $('#dataTable').dataTable({
            "bJQueryUI": true,
            "bScrollCollapse": true,
            "sScrollY": "600px",
            "bAutoWidth": false,
            "bPaginate": true,
            "sPaginationType": "full_numbers", //full_numbers,two_button
            "bStateSave": true,
            "bInfo": true,
            "bFilter": true,
            "iDisplayLength": 25,
            "bLengthChange": true,
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
        });
            
        $('#select-all').click(function(){
            // Iterate each check box

            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                    $(this).closest('tr').addClass('selected');
                });

            } else {
                $('.checkbox').each(function(){
                    this.checked = false;
                    $(this, '.checkbox').closest('tr').removeClass('selected');
                });
            }
        });
                                                                            
        // Putting backgoround color to the tr for checked checkbox 
        $('.checkbox').click(function(event) {
            event.stopPropagation();
            $(this).closest('tr').toggleClass('selected');
            if (event.target.type !== 'checkbox') {
                $(':checkbox', this).attr('checked', function() {
                    return !this.checked;
                });
            }
        });

        $('.tooltip').tipTip({
            delay: "300"
        });

    </script>

    <form action="action.php" method="post" onSubmit="">
        <div class="actions" style="top: 212px">
            <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT">Edit</button>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
            <thead>
                <tr>
                    <th width="23"> <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                    </th>
                    <th>Account No.</th>
                    <th>Customer name</th>
                    <th>Service type</th>
                    <th>Service nature</th>
                    <th>Premise status</th>
                    <th>Customer status</th>
                    <th>Meter No.</th>
                    <th>Plot No.</th>
                    <th>Billing area/zone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysql_fetch_array($result_appln)) {
                    ?>
                    <tr onClick="nav('view_customer.php?id=<?php echo $row['cust_id'] ?>')">
                        <td><input type="checkbox" class="checkbox" name="checkbox[]" value="<?php echo $row['cust_id'] ?>"
                                   id="<?php echo $row['cust_id'] ?>" ></td>
                        <td><?php echo $row['acc_no'] ?></td>
                        <td><?php echo $row['appnt_fullname'] ?></td>
                        <td><?php echo $row['appln_type'] ?></td>
                        <td><?php echo $row['service'] ?></td>
                        <td><?php echo $row['premise_status'] ?></td>
                        <td><?php echo $row['cust_status'] ?></td>
                        <td><?php echo $row['met_number'] ?></td>
                        <td><?php echo $row['plot_no'] ?></td>
                        <td><?php echo $row['billing_areas'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </form>

<?php } ?>
