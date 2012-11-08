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
            <?php // $heading = $text["FORM_1_HEAD"];  ?>
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
                <h1>Add New ZHAPMoS Form 1</h1>
                <div class="hr-line"></div>
                <form action="process_form1.php" method="post" novalidate>
                    <input type="hidden" name="lang" value="<?php echo $lang ?>">
                    <div class="data-form-wapper">
                        <?php require 'sections/head_section.php'; ?>
                        <div class="section">
                            <h3><strong>4. <?php echo $sections['1I']['4']; ?></strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr><td>4.1. <?php echo $questions['41'] ?></td><td width="188">
                                        
                                         <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['21']['8']; ?></option>
                                            <option value="no"><?php echo $setup_answ['22']['8']; ?></option>
                                            <option value="no"><?php echo $setup_answ['23']['8']; ?></option>
                                        </select>
                                    </td></tr>
                                <tr><td>4.2. <?php echo $questions['42'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>4.3. <?php echo $questions['43'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>4.5. <?php echo $questions['45'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>4.6. <?php echo $questions['46'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr><td>4.8. <?php echo $questions['51'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>4.9. <?php echo $questions['52'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>5.0. <?php echo $questions['49'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>5.1. <?php echo $questions['50'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>5.2. <?php echo $questions['59'] ?></td><td><textarea></textarea></td></tr>
                            </table>
                        </div>
                        <div class="section">
                            <h3><strong>5. ZHAPMoS data auditing</strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr><td>5.1. <?php echo $questions['60'] ?></td><td width="188">                                
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['24']['9']; ?></option>
                                            <option value="no"><?php echo $setup_answ['25']['9']; ?></option>
                                            <option value="no"><?php echo $setup_answ['26']['9']; ?></option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.2. <?php echo $questions['61'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes"><?php echo $setup_answ['27']['10']; ?></option>
                                            <option value="no"><?php echo $setup_answ['28']['10']; ?></option>
                                            <option value="no"><?php echo $setup_answ['29']['10']; ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>5.3. <?php echo $questions['62'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.4. <?php echo $questions['63'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.5. <?php echo $questions['64'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.6. <?php echo $questions['65'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.7. <?php echo $questions['66'] ?></td><td width="188">
                                        <select name="month_range" class="select" required="">
                                            <option value=""></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </td></tr>
                                <tr><td>5.8. <?php echo $questions['67'] ?></td><td><input type="text"></td></tr>
                            </table>
                            <h3><strong>5.5 <?php echo $questions['68'] ?>:</strong></h3>
                            <textarea name="remedial"></textarea>
                            <h3><strong>5.6. Describe the areas of weakness that have been identfied,as well as the remedial action that has been agreed upon:</strong></h3>
                            <table width="100%" border="1" cellspacing="0" cellpadding="5" class="form-data-table">
                                <tr>
                                    <th>CHALLENGE</th><th>REMEDIAL ACTION</th>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge"></textarea></td>
                                    <td><textarea name="remedial"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge"></textarea></td>
                                    <td><textarea name="remedial"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge"></textarea></td>
                                    <td><textarea name="remedial"></textarea></td>
                                </tr>
                                <tr>
                                    <td><textarea name="chalenge"></textarea></td>
                                    <td><textarea name="remedial"></textarea></td>
                                </tr>                           
                            </table>


                            <!-- end .section  --></div> 
                        <div class="section">
                            <h3><strong>6. <?php echo $questions['69'] ?>:</strong></h3>
                            <textarea name="remedial"></textarea>
                        </div>
                        <div class="section">
                            <h3><strong>7. <?php echo $questions['70'] ?>:</strong></h3>
                            <textarea name="remedial"></textarea> 
                        </div>
                        <!-- end .data-form-wrapper  -->  </div>
                </form>
                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
