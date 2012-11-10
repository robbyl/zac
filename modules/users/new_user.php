<?php require '../../includes/session_validator.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | ADD USER</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Add New User</h1>
                <div class="hr-line"></div>
                <form action="process_add_user.php" method="post">
                    <fieldset>
                        <legend>User Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">First Name</td>
                                <td><input type="text" name="usr_fname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" name="usr_lname" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Sir Name</td>
                                <td><input type="text" name="sir_name" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="tel" name="phone" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Fax</td>
                                <td><input type="tel" name="fax" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><input type="email" name="email" required size="255" class="text"></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Account Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="200">User Name</td>
                                <td><input type="text" name="username" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" required size="255" class="text" ></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><select name="role" class="select" required="required">
                                        <option value="">-- Select role --</option>
                                        <option value="ROOT">Administrator</option>
                                        <option value="ACCOUNTANT">Accountant</option>
                                        <option value="BILLING OFFICER">Billing Officer</option>
                                        <option value="CASHIER">Cashier</option>
                                        <option value="CONNECTION OFFICER">Connection Officer</option>
                                        <option value="CREDIT CONTROLLER">Credit Controller</option>
                                        <option value="MANAGER">Manager</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit">Save</button>
                                    <button type="reset">Reset</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">

        $('.users').attr("id", "current");
        var i = $('h3#current').index('.menuheader') - 1;

        ddaccordion.init({
            headerclass: "expandable", //Shared CSS class name of headers group that are expandable
            contentclass: "categoryitems", //Shared CSS class name of contents group
            revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
            mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
            collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
            defaultexpanded: [i], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
            onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
            animatedefault: true, //Should contents open by default be animated into view?
            persiststate: false, //persist state of opened contents within browser session?
            toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
            togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
            animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
            oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
                //do nothing
            },
            onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
                //do nothing
            }
        });
    </script>
</html>
