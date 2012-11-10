<?php
require '../../includes/session_validator.php';
require '../../config/config.php';

$query_settings = "SELECT aut_name, address, phone, fax, email, url, logo,
                          parking_fee, landing_fee, terms_conds, page_orientation
                     FROM settings";
$result_settings = mysql_query($query_settings) or die(mysql_error());
$row_setting = mysql_fetch_array($result_settings);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | SETTINGS</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>
        
        <style type="text/css">
            textarea {
                font: inherit !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {

                // Display and hide system messages and errors.
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
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>General Settings</h1>
                <div class="hr-line"></div>
                <form action="process_settings.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Authority Details</legend>
                        <table width="" border="0" cellpadding="5">
                            <tr>
                                <td width="170">Authority</td>
                                <td><input type="text" name="authority" value="<?php echo $row_setting['aut_name']; ?>" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Address</td>
                                <td><input type="text" name="address" value="<?php echo $row_setting['address']; ?>" required size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Phone</td>
                                <td><input type="tel" name="tel" value="<?php echo $row_setting['phone']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Fax</td>
                                <td><input type="text" name="fax" value="<?php echo $row_setting['fax']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">E-mal</td>
                                <td><input type="email" name="email" value="<?php echo $row_setting['email']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170">Web</td>
                                <td><input type="url" name="web" value="<?php echo $row_setting['url']; ?>" size="255" class="text"></td>
                            </tr>
                            <tr>
                                <td width="170" style="vertical-align: top">Logo <span class="hint">(Allowed file types jpg, png)</span></td>
                                <td><?php
                if (!empty($row_setting['logo'])) {
                    echo '<img src="logo/' . $row_setting["logo"] . '" height="150"><br>';
                    echo '<input type="checkbox" id="romove_logo" name="romove_logo" value="REMOVE_AUTH_LOGO" />
		          <label for="romove_logo">Remove this logo</label> <br>';
                }
                echo '<input type="file" name="logo" id="file">';
                ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <table width="440">
                        <tr>
                            <td width="210">&nbsp;</td>
                            <td width="218"><button type="submit">Save</button>
                                <button type="reset">Reset</button></td>
                        </tr>
                    </table>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">
        $('.settings').attr("id", "current");
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
