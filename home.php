<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
    $_SESSION['error-outer'] = 'Please sign in first to continue';
    header('Location: index.php');
}
session_commit();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <title>SOFTBILL | HOME</title>
        <style type="text/css">
            .fltlft a {
                text-decoration: none !important;
            }
            .fltlft {
                margin: 0 !important;
                text-decoration: none !important;
            }
        </style>
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <link href="css/tooltip.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="js/tooltip.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tooltip').tipTip({
                    delay: 300
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <?php date_default_timezone_set('Africa/Dar_es_Salaam'); ?>
                <div class="logo"></div>
                <ul class="user-details">
                    <li class="username">Hello, <?php
                session_start();
                echo $_SESSION['username'];
                session_commit();
                ?>!
                        <div class="user-sub">
                            <ul>
                                <li><a href="modules/users/my_profile.php">My profile</a></li>
                                <li><a href="modules/users/change_password.php">Change password</a></li>
                                <li><a href="modules/users/logout.php">Switch user</a></li>
                                <li><a href="modules/users/logout.php">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="date"><?php echo date('l d M, Y') ?></li>
                </ul>
                <!-- end .header --></div>
            <div class="content" style="margin-left: auto; margin-right: auto; float: none;">

                <h1 style="margin-left: 50px;">Welcome!, let's begin.</h1>

                <a href="modules/users/new_user.php" class="tooltip fltlft" title="Create, edit... user accounts">
                    <div class="home-icon user-icon">
                        <div class="icon-label">Manage Users</div>
                    </div>
                </a>

                <a href="modules/settings/settings.php" class="tooltip fltlft" title="Set, edit... system settings">
                    <div class="home-icon settings-icon">
                        <div class="icon-label">Settings</div>
                    </div>
                </a>

                <a href="modules/applications/add_new_appln.php" class="tooltip fltlft" title="View, add, edit.. customer applns">
                    <div class="home-icon applications-icon">
                        <div class="icon-label">Applications</div>
                    </div>
                </a>

                <a href="modules/customers/customers.php" class="tooltip fltlft" title="View, add, edit.. customer details">
                    <div class="home-icon customers-icon">
                        <div class="icon-label">Customers</div>
                    </div>
                </a>
                <a href="modules/meters/add_meter.php" class="tooltip fltlft" title="View, add, edit.. meter details">
                    <div class="home-icon water-meter-icon">
                        <div class="icon-label">Water Meters</div>
                    </div>
                </a>
                <a href="modules/invoice/generate_invoices.php" class="tooltip fltlft" title="View,generate... invoices" >
                    <div class="home-icon invoice-icon">
                        <div class="icon-label">Sales</div>
                    </div>
                </a>
                <a href="modules/paypoint/online_payments.php" class="tooltip fltlft" title="Accept payments.., provide receipts" >
                    <div class="home-icon financials-icon">
                        <div class="icon-label">Pay Point</div>
                    </div>
                </a>
                <a href="modules/report/reports.php" class="tooltip fltlft" title="Correct or modify accounts" >
                    <div class="home-icon report-icon">
                        <div class="icon-label">Adjustments</div>
                    </div>
                </a>
                <a href="modules/report/reports.php" class="tooltip fltlft" title="Generate and view various reports" >
                    <div class="home-icon report-icon">
                        <div class="icon-label">Report Manager</div>
                    </div>
                </a>

                <div class="clearfloat"></div>
                <!-- end .content --></div>
            <?php include 'includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
