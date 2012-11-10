<?php
require '../../includes/session_validator.php';

ob_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | DATA ENTRY</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/zanhid-core.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <style type="text/css">
            textarea {
                font: inherit !important;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('#form-creteria').click(function() {

                    // Display form category and language as pop-up
                    getPopForm('form_criteria.php', '');
                });

            });

        </script>
    </head>

    <body>
        <div class="container">

            <?php require '../../includes/header.php'; ?>
            <div id="pop-up"></div>
            <div class="sidebar">
                <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Data Entry</h1>
                <div class="hr-line"></div>
                <form action="" method="post" >
                    <fieldset style="float: left">
                        <legend>ZHAPMoS Forms</legend>
                        <ul class="report-list">
                            <li><a href="new_organisation.php">Add Orangisations and People</a></li>
                            <li><a href="#" id="form-creteria">Add ZHAPMoS Form</a></li>
                            <li><a href="organisations.php">View Organisations</a></li>
                            <li><a href="forms.php">View Received ZHAPMoS Forms</a></li>
                        </ul>
                    </fieldset>
                    <fieldset style="float: left">
                        <legend>ZHAPMoS Supervision Forms</legend>
                        <ul class="report-list">
                            <li><a href="#">Add Orangisations and People</a></li>
                            <li><a href="#" id="form-creteria">Add ZHAPMoS Form</a></li>
                            <li><a href="#">View Organisations</a></li>
                            <li><a href="#">View Received ZHAPMoS Forms</a></li>
                        </ul>
                    </fieldset>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
    <script type="text/javascript">

        $('.data-entry').attr("id", "current");
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
