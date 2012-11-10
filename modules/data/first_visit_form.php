<?php require '../../includes/session_validator.php'; ?>
<?php
require '../../config/config.php';
require '../../functions/general_functions.php';

// Getting last form serial number
$query_form_id = "SELECT MAX(`FormSerialNumber`) AS last_serial
                    FROM tblzhaformssubmitted
                   WHERE `FormSerialNumber`
                    LIKE 'F1-%'";

$result_form_id = mysql_query($query_form_id) or die(mysql_error());

$last_serial = mysql_fetch_array($result_form_id);

$form_serial_no = $last_serial['last_serial'];

$no = explode("-", $form_serial_no);
$expl_no = $no[1];
$expl_no++;
$form_serial_no = 'F1-' . $expl_no;

$query_section = "SELECT `ZhsFormID`, `PartNumber`, `PartHeading`
                    FROM tblzhssetuppartheadings";

$result_section = mysql_query($query_section) or die(mysql_error());

while ($sec = mysql_fetch_array($result_section)) {

    $sections[$sec['ZhsFormID']][$sec['PartNumber']] = $sec['PartHeading'];
}


$query_qns = "SELECT `ZhsQuestionID`, `QuestionText`
                FROM tblzhssetupquestions";

$result_qns = mysql_query($query_qns) or die(mysql_error());

while ($qn = mysql_fetch_array($result_qns)) {

    $questions[$qn['ZhsQuestionID']] = $qn['QuestionText'];
}
$query_setup_answ = "SELECT `AnswerID`,`AnswerSet`,`Answer` FROM tblzhssetupanswers";

$result_setup_answ = mysql_query($query_setup_answ) or die(mysql_error());

while ($anws = mysql_fetch_array($result_setup_answ)) {

    $setup_answ[$anws['AnswerID']][$anws['AnswerSet']] = $anws['Answer'];
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>FIRST VISIT FORM | </title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.message, .error').hide().slideDown('normal').click(function() {
                    $(this).slideUp('normal');
                });

                $('tr').click(function() {
                    var total = 0;
                    $(this).children().find('.number').each(function() {
                        total += $(this).val() * 1;
                    });
                    $(this).children('.total').html(total);
                });
            });
        </script>
        <style type="text/css">
            .text , .text:focus {
                border: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <?php $heading = 'some heading'; ?>
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
               <?php include '../../includes/sidebar.php'; ?>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
// Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>FIRST VISIT FORM </h1>
                <div class="hr-line"></div>
                <form action="process_form1.php" method="post" novalidate>
                    <input type="hidden" name="lang" value="<?php echo $lang ?>">
                    <div class="data-form-wapper">
                        <?php require 'sections/head_section.php'; ?>
                        <div class="section">
                            <h3><strong>A. </strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td colspan="2">Name of the organization being visited</td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td colspan="2">District/s in which the organization operates </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Date of visit </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Time of visit </td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        <div class="section">
                            <h3><strong>1 <?php echo $sections['1F']['1']; ?> </strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>1.1 <?php echo $questions['1'] ?></td>
                                    <td>
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['1']['1'] ;?> </option>
                                            <option value="no"><?php echo $setup_answ['2']['1']; ?> </option>
                                        </select>
                                    </td>
                                     
                                </tr>
                                <tr>
                                    <td>1.2 <?php echo $questions['2'] ?></td>
                                    <td>
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">ANA </option>
                                            <option value="no">MOHAMMED </option>
                                            <option value="no">CARRINGTONE </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.3 <?php echo $questions['3'] ?></td>
                                    <td>
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['1']['1'] ;?> </option>
                                            <option value="no"><?php echo $setup_answ['2']['1']; ?> </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.4 <?php echo $questions['4'] ?></td>
                                    <td>
                                        <input type ="text" > 
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.5 <?php echo $questions['5'] ?></td>
                                    <td><select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['1']['1'] ;?> </option>
                                            <option value="no"><?php echo $setup_answ['2']['1']; ?> </option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>1.6 <?php echo $questions['6'] ?></td>
                                    <td><select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['1']['1'] ;?> </option>
                                            <option value="no"><?php echo $setup_answ['2']['1']; ?> </option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>1.7 <?php echo $questions['7'] ?></td>
                                    <td><select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['1']['1'] ;?> </option>
                                            <option value="no"><?php echo $setup_answ['2']['1']; ?> </option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>1.8 <?php echo $questions['8'] ?></td>
                                    <td>
                                        <input type ="text" height:300px;>
                                    </td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        <div class="section">
                            <h3><strong>2. <?php echo $sections['1F']['2']; ?> </strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>2.1</td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.2 <?php echo $questions['11'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.3 <?php echo $questions['12'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.4 </td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.5 <?php echo $questions['17'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.6</td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.7 <?php echo $questions['25'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>2.8 <?php echo $questions['26'] ?></td>
                                    <td>some</td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                          <div class="section">
                            <h3><strong>3. <?php echo $sections['1F']['3']; ?> </strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>3.1</td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.2 <?php echo $questions['28'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.3 <?php echo $questions['29'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.4 <?php echo $questions['30'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.5 <?php echo $questions['31'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.6</td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.7 <?php echo $questions['39'] ?></td>
                                    <td>some</td>
                                </tr>
                                <tr>
                                    <td>3.8 <?php echo $questions['40'] ?></td>
                                    <td>some</td>
                                </tr>
                            </table>
                            <!-- end .section  --></div>
                        

                        <!-- end .data-form-wrapper  -->  </div>
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
