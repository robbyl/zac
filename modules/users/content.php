<?php
require '../../includes/session_validator.php';
ob_start();
// Getting user data

require '../../config/config.php';

$query_user = "SELECT *
                 FROM users";

$result_user = mysql_query($query_user) or die(mysql_error());
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | USERS</title>
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
        <script type="text/javascript">

            $(document).ready(function() {
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

                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });

            } );
        </script>
    </head>

    <body>
        <div class="container">

            <div class="content" style="width: 100%; margin: 0">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>All Users of the System</h1>
                <div class="hr-line"></div>
                <form action="action.php" method="post" onSubmit="">
                    <div class="actions">
                        <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT">Edit</button>
                        <button class="block tooltip" accesskey="B" title="Block [Alt+Shift+B]" name="action[]" value="BLOCK" onClick="return confirm('Are you sure you want to block user(s)?')">Block</button>
                        <button class="activate tooltip" accesskey="I" title="Activate [Alt+Shift+I]" name="action[]" value="ACTIVATE" onClick="return confirm('Are you sure you want to activate user(s)')">Activate</button>
                        <button class="print tooltip" accesskey="P" title="Print [Alt+Shift+P]" name="action[]" value="PRINT">Print</button>
                        <button class="pdf tooltip" accesskey="D" title="Save as PDF [Alt+Shift+D]" name="action[]" value="PDF">PDF</button>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="23">
                                    <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                                </th>
                                <th>Full name</th>
                                <th>E-mail</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysql_fetch_array($result_user)) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo $row['user_id'] ?>" id="<?php echo $row['user_id'] ?>">
                                    </td>
                                    <td><?php echo $row['user_full_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>

                <!-- end .content --></div>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>