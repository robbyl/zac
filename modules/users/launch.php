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

        <script src="../../js/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/splitter.js" type="text/javascript"></script>
        <script src="../../js/jquery.cookie.js" type="text/javascript"></script>

        <style type="text/css">
            .fnavigation {
                position: absolute;
                width: 200px;
                border: none;
                height: 100%;
                box-sizing: border-box;
                -moz-box-sizing: border-box; 
                -webkit-box-sizing:border-box;
            }
            .fcontent {
                position: absolute;
                height: 100%;
                width: 1160px;
                border: none;
                padding-left: 5px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing:border-box;
            }

            .simple {
                position: absolute;
                height: 600px;
                width: 100%;
                *height: 100%;
            }
            .vsplitbar {
                width: 1px;
                background: #cab;
                cursor: e-resize;	/* in case col-resize isn't supported */
                cursor: col-resize;
                z-index: 9 !important;
                border-left: 2px solid #fff;
                border-right: 2px solid #fff;
            }
        </style>

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
                
                $(".simple").splitter({
                    type: "v",
                    //outline: true,
                    minLeft: 120, sizeLeft: 180, minRight: 100,
                    //resizeToWidth: true,
                    cookie: "vsplitter"
                });
                

            } );
        </script>
    </head>

    <body>
        <div class="container" style="position: absolute !important;">
            <?php require '../../includes/header.php'; ?>
            <div class="simple">
                <iframe src="navigation.php" seamless name="navigation" class="fnavigation" id="fnavigation"></iframe>

                <iframe src="content.php" seamless name="content" class="fcontent" ></iframe> 
            </div>

            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>