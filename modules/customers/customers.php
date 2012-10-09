<?php
require '../../includes/session_validator.php';
ob_start();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | CUSTOMERS</title>
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

            $(document).ready(function() { 

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

                $('#billing_area').change(function(){

                    getContent('customer_listing.php', {filter: $(this).val()});

                });

                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

            } );

            function nav(url){
                //document.location.href = url;
            }

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
                    <li> <a href="../customers/customers.php" class="customers">Customers</a>
                        <ul>
                            <li> <a href="../customers/customer_status.php" class="customer Status">Customer status</a></li>
                        </ul>
                    </li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>Customers</h1>
                <div class="hr-line"></div>
                <div style="margin-bottom: 15px;">
                    <label> Billing Area/Zone &nbsp;
                        <select name="billing_area" class="select" required id="billing_area" >
                            <option value="">--Select billing area/zone--</option>
                            <?php
                            require '../../config/config.php';
                            $query = "SELECT billing_areas FROM billing_area ORDER BY billing_areas ASC";
                            $result = mysql_query($query) or die(mysql_error());
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['billing_areas'] ?>"><?php echo $row['billing_areas'] ?></option>
                                <?php
                            }
                            mysql_close($conn);
                            ?>
                            <option value="All">All</option>
                        </select>
                    </label>
                </div>
                <div id="listing"></div>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>
