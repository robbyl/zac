<?php
require '../../includes/session_validator.php';

ob_start();

require '../../config/config.php';
require '../../functions/format_byte_function.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

        <title>ZANHID | BACKUPS</title>

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
        <script src="../../js/accordion.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>

        <script type="text/javascript">

            $(document).ready(function() {
                oTable = $('#dataTable').dataTable({
                    "bJQueryUI": true,
                    "bScrollCollapse": true,
                    "sScrollY": "auto",
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

                $('#select-all').click(function() {
                    // Iterate each check box

                    if (this.checked) {
                        $('.checkbox').each(function() {
                            this.checked = true;
                            $(this).closest('tr').addClass('selected');
                        });

                    } else {
                        $('.checkbox').each(function() {
                            this.checked = false;
                            $(this, '.checkbox').closest('tr').removeClass('selected');
                        });
                    }
                });

                // Putting backgoround color to the tr for checked checkbox 
                $('.checkbox').click(function(event) {
                    $(this).closest('tr').toggleClass('selected');
                    if (event.target.type !== 'checkbox') {
                        $(':checkbox', this).attr('checked', function() {
                            return !this.checked;
                        });
                    }
                });

                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });

                // Calling the make backup file
                $('#backup').click(function() {

                    $('#action').submit(function(event) {
                        event.preventDefault();
                        makeBackup("make_backups.php", "");
                    });

                });

//                alert($('.arrowlistmenu').children('.categoryitems').index('#current'));
            });

        </script>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div id="backup-info"></div>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>System Backups</h1>
                <div class="hr-line"></div>
                <form action="action.php" method="post" id="action">
                    <div class="actions">
                        <button class="block tooltip" accesskey="B" title="Block [Alt+Shift+B]" form="action"
                                name="action[]" value="BLOCK" onClick="return confirm('Are you sure you want to block user(s)?');">Delete</button>
                        <button class="activate tooltip" accesskey="I" title="Activate [Alt+Shift+I]" id="backup">Make Backup</button>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="23">
                                    <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                                </th>
                                <th>File name</th>
                                <th>Backup date</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dir = "backups/";
                            $handle = opendir($dir);

                            if ($handle) {
                                while (false !== ($entry = readdir($handle))) {
                                    if (($entry != '.') && ($entry != '..')) {
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="checkbox[]" title="Select this user" class="checkbox tooltip" value="<?php echo $row['user_id'] ?>" id="<?php echo $row['user_id'] ?>">
                                            </td>
                                            <td><?php echo $entry ?></td>
                                            <td><?php echo date("d M, Y H:i:s", filemtime($dir . $entry)) ?></td>
                                            <td><?php echo human_filesize(filesize($dir . $entry)) ?></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            closedir($handle);
                            ?>
                        </tbody>
                    </table>
                </form>

                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">

            $('.backups').attr("id", "current");
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
<?php ob_flush(); ?>
