<?php
require '../../includes/session_validator.php';

ob_start();

require '../../config/config.php';

$query_transaction = "SELECT rcpt.rec_id, trans.trans_id, trans_date,description, rec_no,rec_type, payed_amount,
                                      amount_in_words, rcpt.user_id, cheq_no, bank, inv_no, invoicing_date, usr_fname, usr_lname, appnt_fullname
                               FROM transaction trans 
                               LEFT JOIN receipt rcpt
                                      ON rcpt.tran_id = trans.trans_id
                               LEFT JOIN cheque chq
                                      ON  chq.rec_id = rcpt.rec_id
                               LEFT JOIN invoice inv
                                      ON inv.trans_id = trans.trans_id
                               LEFT JOIN users urs
                                      ON urs.user_id = rcpt.user_id
                               LEFT JOIN customer cust
                                      ON cust.cust_id = inv.cust_id
                               LEFT JOIN applicant appnt
                                      ON appnt.appnt_id = cust.appnt_id";
$result_transaction = mysql_query($query_transaction) or die(mysql_error());
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | INVOICES</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link href="../../css/data_table.css" rel="stylesheet" type="text/css">
        <link href="../../css/jquery.ui.theme.css" rel="stylesheet" type="text/css">
        <link href="../../css/ui_darkness.css" rel="stylesheet" type="text/css">
        <link href="../../css/tooltip.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/softbill-core.js" type="text/javascript"></script>

        <script type="text/javascript">
            
            $(document).ready(function(){
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
                
            });
                  
        </script>
    </head>

    <body>  
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="../users/users.php" class="users">Manage Users</a></li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a></li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a>
                        <ul>
                            <li><a href="online_payments.php">Online payments</a></li>
                            <li><a href="offline_payments.php">Offline payments</a></li>
                            <li><a href="#">Transactions</a></li>
                        </ul>
                    </li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Transactions</h1>
                <div class="hr-line"></div>
                <div style="margin-bottom: 15px;">
                    <form>
                        <label>Readings by
                            <select class="select" style="font-size: 90%" required id="enter_by" >
                                <option value="">--Select one--</option>
                            </select> &nbsp; &nbsp;
                            <?php
                            $prev_month = strtotime('-1 month', strtotime(date('Y-m-d')));
                            $prev_month = date('Y-m-d', $prev_month);
                            ?>
                            Reading Date <input type="date" name="reading_date" max="<?php echo date('Y-m-d') ?>" form="readings" required class="text" style="width: 150px;" >
                            &nbsp; &nbsp;
                            Billing Month <input type="date" name="billing_date" max="<?php echo $prev_month ?>" form="readings" required class="text" style="width: 150px;" >
                        </label>
                    </form>
                </div>
                <div id="listing">

                    <!-- end #listing --></div>


                <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                    <thead>
                        <tr>
                            <th width="23"> 
                                <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                            </th>
                            <th>Transation Date</th>
                            <th>Description </th>
                            <th>Receipt Number </th>
                            <th>Cheq Number </th>
                            <th>Bank</th>
                            <th>Inv No</th>
                            
                            <th>Added By</th>
                            <th>Applicant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysql_fetch_array($result_transaction)) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox[]" class="checkbox tooltip" value="<?php echo $row['trans_id'] ?>"
                                           id="<?php echo $row['trans_id'] ?>" title="Select this application"></td>
                                <td><?php echo $row['trans_date']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['rec_no']; ?></td>
                                <td><?php echo $row['cheq_no']; ?></td>
                                <td><?php echo $row['bank']; ?></td>
                                <td><?php echo $row['inv_no']; ?></td>
                                
                                <td><?php echo $row['usr_fname'] . "  " . $row['usr_lname']; ?></td>
                                <td><?php echo $row['appnt_fullname']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>
