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

// Getting application details

if (isset($_GET['filter']) && !empty($_GET['filter'])) {

    require '../../config/config.php';
    require '../../functions/general_functions.php';

    $filter = clean($_GET['filter']);

    $filter === 'All' ? $filter = ";" : $filter = 'WHERE billing_areas = ' . "'$filter' ";

    $query_appln = "SELECT appln.appln_id, appln_type, appnt.appnt_id, appln_date, engeneer_appr,
                       appnt_fullname, appnt_types, billing_areas, description, cust.appnt_id AS is_customer
                  FROM application appln
             LEFT JOIN applicant appnt
                    ON appln.appnt_id = appnt.appnt_id
             LEFT JOIN customer cust
                    ON appnt.appnt_id = cust.appnt_id
             LEFT JOIN appnt_payment appntp
                    ON appnt.appnt_id = appntp.appnt_id
             LEFT JOIN transaction trans
                    ON appntp.trans_id = trans.trans_id
             LEFT JOIN appnt_type apnty
                    ON appnt.appnt_type_id = apnty.appnt_type_id
             LEFT JOIN billing_area ba
                    ON appnt.ba_id = ba.ba_id
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
                $(':checkbox').each(function(){
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.tooltip').tipTip({
            delay: "300"
        });

        $('.add-customer').click(function(){

            getPopForm('../customers/add_customer.php', $(this).val());
        });
    </script>
    <form action="action.php" method="post" onSubmit="">
        <div class="actions" style="top: 212px">
            <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT">Edit</button>
            <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" name="action[]" value="PRINT">Print</button>
            <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" name="action[]" value="PDF">PDF</button>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
            <thead>
                <tr>
                    <th width="23"> <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                    </th>
                    <th>Application type</th>
                    <th>Application date</th>
                    <th title="Engeneer approved" class="tooltip">Approved</th>
                    <th>Applicant name</th>
                    <th>Applicant type</th>
                    <th>Billing area/zone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysql_fetch_array($result_appln)) {
                    ?>

                    <tr onClick="nav('view_application.php?id=<?php echo $row['appln_id'] ?>')">
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['appln_id'] ?>"
                                   id="<?php echo $row['appln_id'] ?>" ></td>
                        <td><?php echo $row['appln_type'] ?></td>
                        <td><?php echo $row['appln_date'] ?></td>
                        <td><?php echo $row['engeneer_appr'] ?></td>
                        <td><?php echo $row['appnt_fullname'] ?></td>
                        <td><?php echo $row['appnt_types'] ?></td>
                        <td><?php echo $row['billing_areas'] ?></td>
                        <td>
                            <?php
                            if ($row['description'] === "Application fee" && $row['is_customer']) {
                                ?>
                                <button type="reset" class="add-customer" value="<?php echo 'appln_id=' . $row["appln_id"] . '&appnt_id=' . $row["appnt_id"] ?>"></button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </form>
<?php } ?>