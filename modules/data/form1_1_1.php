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

$query_setup_answ = "SELECT `AnswerID`,`AnswerSet`,`Answer`
                       FROM tblzhssetupanswers";

$result_setup_answ = mysql_query($query_setup_answ) or die(mysql_error());
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title>ZANHID | FORM-1</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../css/forms.css" />
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>

        <style type="text/css">
            .text , .text:focus {
                border: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php  $heading = $text["FORM_1_HEAD"];     ?>
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <ul class="nav">
                    <li><a href="../../home.php" class="home">Home</a></li>
                    <li> <a href="users.php" class="users">Manage Users</a>
                        <ul>
                            <li><a href="#">Add new user</a></li>
                        </ul>
                    </li>
                    <li> <a href="../settings/settings.php" class="settings">Settings</a> </li>
                    <li> <a href="../applications/applications.php" class="applications">Applications</a> </li>
                    <li> <a href="../customers/customers.php" class="customers">Customers</a></li>
                    <li> <a href="../meters/meters.php" class="meters">Water Meters</a></li>
                    <li> <a href="../invoice/invoices.php" class="invoices">Invoice</a></li>
                    <li> <a href="../paypoint/paypoint.php" class="financial">Pay Point</a></li>
                    <li> <a href="../report/reports.php" class="reports">Reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying message and errors
                include '../../includes/info.php';
                ?>
                <h1>Participatory Supervision Guidelines</h1>
                <div class="hr-line"></div>
                <form action="process_form1.php" method="post" novalidate>
                    <input type="hidden" name="lang" value="<?php echo $lang ?>">
                    <div class="data-form-wapper">
                        <?php require 'sections/head_section.php'; ?>
                        <div class="section">
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table"> 
                                <tr><td>Name of organisation being visited </td><td><input type="text"></td>
                                <tr><td>District(s) in which the organisation operates </td><td><input type="text"></td>
                                <tr><td>How long ago was the first participatory
                                    supervision visit undertaken?</td><td><input type="text"></td>
                                <tr><td>Date of visit </td><td><input type="date" name="date_of_visit"></td>                                 
                                <tr><td>Time of the visit </td><td><input type="time" name="time"></td>
                                <tr><td>Name(s) of supervisor(s) conducting the visit </td><td><input type="text"></td>
                                <tr><td>Quarter selected for the data auditing part of the 
                                        visit(MM/YYYY)</td><td>  <input type="text"><input type="text"></td>               
                                </tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>1. <?php echo $sections['1F']['1']; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>1.1. <?php echo $questions['71'] ?></td><td width="188">                                     
                                       <select name="111" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 11) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td>
                                </tr>                              
                            </table>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>1.2. <?php echo $questions['2'] ?> (Full name and position)</td><td width="188">                                     
                                        <input type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.3. <?php echo $questions['3'] ?></td><td><?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ13" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>1.4. <?php echo $questions['4'] ?></td><td><?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ14" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>1.5. <?php echo $questions['5'] ?></td><td><?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ15" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?></td>
                                </tr>
                            </table>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>1.6. <?php echo $questions['72'] ?> (Full name and position)</td><td width="188">                                     
                                        <select name="21" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 12) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1.7. <?php echo $questions['73'] ?></td><td><?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ17" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>1.8. <?php echo $questions['5'] ?></td><td><textarea></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>2. <?php echo $sections['1F']['2']; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr><td>2.1. <?php echo $questions['9'] ?></td><td width="188">                                     
                                        <select name="21" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 2) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr>
                                    <td>2.2. <?php echo $questions['10'] ?></td><td width="188"> 
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="MnE" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.3. <?php echo $questions['11'] ?></td><td><textarea></textarea></td>
                                </tr>
                                <tr>
                                    <td>2.4. <?php echo $questions['12'] ?></td><td width="188">                                     
                                        <select name="21" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 4) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>2.5. <?php echo $questions['13'] ?></td><td width="188"> 
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="rout" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>2.6. <?php echo $questions['14'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="periodic" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>2.7. <?php echo $questions['15'] ?></td><td width="188">                                    
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="survey" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>2.8. <?php echo $questions['16'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="other" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                </tr>
                                <tr><td>2.9. <?php echo $questions['17'] ?></td><td width="188">
                                        <input type="text">
                                    </td></tr>
                                <tr><td>2.1.0. <?php echo $questions['18'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="un" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.1. <?php echo $questions['19'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="bilateral" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.2. <?php echo $questions['20'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="ngo" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.3. <?php echo $questions['21'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="org" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.4. <?php echo $questions['22'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="y" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.5. <?php echo $questions['23'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="no" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.6. <?php echo $questions['24'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="s" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>2.1.7. <?php echo $questions['25'] ?></td><td width="188">
                                        <textarea></textarea>
                                    </td>
                                </tr>
                                <tr><td>2.1.8. <?php echo $questions['26'] ?></td><td><input type="text"></td></tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>3. <?php echo $sections['1I']['3']; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr><td>3.1. <?php echo $questions['27'] ?></td><td width="188">
                                        <select name="31" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 5) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>3.2. <?php echo $questions['28'] ?></td><td width="188">
                                        <select name="32" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 6) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>3.3. <?php echo $questions['29'] ?></td><td width="188">
                                        <select name="33" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 7) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>3.4. <?php echo $questions['30'] ?></td><td><textarea></textarea></td></tr>
                                <tr><td>3.5. <?php echo $questions['31'] ?></td><td width="188">
                                        <select name="35" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 8) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>3.6. <?php echo $questions['32'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="luck" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.7. <?php echo $questions['33'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="zac" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.8. <?php echo $questions['34'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="zanhid" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.9. <?php echo $questions['35'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ35" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>

                                <tr><td>3.1.0 <?php echo $questions['36'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ310" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.1.1 <?php echo $questions['37'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ37" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.1.2 <?php echo $questions['38'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ38" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>3.1.3 <?php echo $questions['39'] ?></td><td width="188">
                                        <input type="text">
                                    </td>
                                </tr>
                                <tr><td>3.1.4 <?php echo $questions['40'] ?></td><td><textarea></textarea></td></tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>4. <?php echo $sections['1I']['4']; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <td>4.1. <?php echo $questions['41'] ?></td><td width="188">
                                        <select name="answ41" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 8) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr>
                                    <td>4.2. <?php echo $questions['42'] ?></td>
                                    <td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ42" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.3. <?php echo $questions['43'] ?></td>
                                    <td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ43" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.4. <?php echo $questions['44'] ?></td>
                                    <td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ44" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.5. <?php echo $questions['45'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ45" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>4.6. <?php echo $questions['46'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ46" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.8. <?php echo $questions['51'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ48" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.9. <?php echo $questions['52'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ52" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>5.0. <?php echo $questions['49'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ49" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>5.1. <?php echo $questions['50'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ50" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td>
                                </tr>
                                <tr><td>5.2. <?php echo $questions['59'] ?></td><td><textarea></textarea></td></tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>5. ZHAPMoS data auditing</strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr><td>5.1. <?php echo $questions['60'] ?></td><td width="188">                                
                                        <select name="answ60" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 9) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>5.2. <?php echo $questions['61'] ?></td><td width="188">
                                        <select name="answ61" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 10) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>5.3. <?php echo $questions['62'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ62" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>5.4. <?php echo $questions['63'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ63" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>5.5. <?php echo $questions['64'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ64" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>5.6. <?php echo $questions['76'] ?></td><td width="188">
                                        <?php
                                        while ($anws = mysql_fetch_array($result_setup_answ)) {
                                            if ($anws['AnswerSet'] == 1) {
                                                echo '<label><input type="radio" name="answ76" value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</label> &nbsp &nbsp';
                                            }
                                        }
                                        mysql_data_seek($result_setup_answ, 0);
                                        ?>
                                    </td></tr>
                                <tr><td>5.7. <?php echo $questions['77'] ?></td><td width="188">
                                        <select name="answ77" class="select" required="">
                                            <option value=""></option>
                                            <?php
                                            while ($anws = mysql_fetch_array($result_setup_answ)) {
                                                if ($anws['AnswerSet'] == 13) {
                                                    echo '<option value="' . $anws['AnswerID'] . '">' . $anws['Answer'] . '</option>';
                                                }
                                            }
                                            mysql_data_seek($result_setup_answ, 0);
                                            ?>
                                        </select>
                                    </td></tr>
                                <tr><td>5.8. <?php echo $questions['78'] ?></td><td><textarea></textarea></td></tr>
                            </table>
                            <h3><strong>5.5 <?php echo $questions['68'] ?>:</strong></h3>
                            <textarea name="remedial"></textarea>
                            <h3><strong>5.6. Describe the areas of weakness that have been identfied,as well as the remedial action that has been agreed upon:</strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <th>CHALLENGE</th><th>REMEDIAL ACTION</th>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge561"></textarea></td>
                                    <td><textarea name="remedial561"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge562"></textarea></td>
                                    <td><textarea name="remedial562"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge563"></textarea></td>
                                    <td><textarea name="remedial563"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge563"></textarea></td>
                                    <td><textarea name="remedial563"></textarea></td>
                                </tr>                           
                            </table>
                            <!-- end .section  --></div> 
                        <div class="section">
                            <h3><strong>6. <?php echo $questions['69'] ?>:</strong></h3>
                            <textarea name="remedial6"></textarea>
                        </div>
                        <div class="section">
                            <h3><strong>7. <?php echo $questions['70'] ?>:</strong></h3>
                            <textarea name="remedial7"></textarea> 
                        </div>
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
