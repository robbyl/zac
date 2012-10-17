<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <title>SOFTBILL</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <script src="js/jquery-1.7.2.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.message-outer, .error-outer').hide().slideDown('normal');
            });
        </script>
    </head>

    <body>
        <div class="main-wrapper">

            <?php
            // showing errors and messages

            include 'includes/info.php';
            ?>

            <div class="login-wrapper">
                <div class="login-header"></div>
                <form action="modules/users/authentication.php" method="post" >
                    <table cellspacing="15" class="login-table">
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td><input type="text" name="username" id="username" class="text-box login" required autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" id="password" class="text-box login" required autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="button">Sign In</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" class="link">Forgot Password?</a></td>
                        </tr>
                    </table>
                </form>
                <!-- .end login wrapper --></div>
            <div class="login-footer">zanhid - &copy; <?php echo date('Y'); ?> Stemcom Technologies.
                <!-- end .footer --></div>
            <!-- end .main-wrapper --></div>
    </body>
</html>