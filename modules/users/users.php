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

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.pagination.js" type="text/javascript"></script>
        <script src="../../js/tooltip.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>

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
                        $('.checkbox').each(function(){
                            this.checked = true;
                            $(this).closest('tr').addClass('selected');
                        });

                    } else {
                        $('.checkbox').each(function(){
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

                $('.message, .error').hide().slideDown('normal').click(function(){
                    $(this).slideUp('normal');
                });

                $('.tooltip').tipTip({
                    delay: "300"
                });
                
            } );
            
            ddaccordion.init({
                headerclass: "expandable", //Shared CSS class name of headers group that are expandable
                contentclass: "categoryitems", //Shared CSS class name of contents group
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
                defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
                animatedefault: false, //Should contents open by default be animated into view?
                persiststate: true, //persist state of opened contents within browser session?
                toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
                togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                    //do nothing
                },
                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                    //do nothing
                }
            })
        </script>
    </head>

    <body>
        <div class="container">
            <?php require '../../includes/header.php'; ?>
            <div class="sidebar">
                <div class="arrowlistmenu">
                    <h3 class="menuheader home">Home</h3>

                    <h3 class="menuheader expandable users">Manage Users</h3>
                    <ul class="categoryitems">
                        <li><a href="#">Add new user</a></li>
                        <li><a href="#">View users</a></li>
                    </ul>

                    <h3 class="menuheader expandable settings">Settings</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >General settings</a></li>
                        <li><a href="#">Tariffs</a></li>
                    </ul>

                    <h3 class="menuheader expandable applications">Applications</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >Add application</a></li>
                        <li><a href="#">View applications</a></li>
                    </ul>

                    <h3 class="menuheader expandable customers">Customers</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >View customers</a></li>
                        <li><a href="#" >Customer status</a></li>
                    </ul>

                    <h3 class="menuheader expandable meters">Water Meters</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >Add meter</a></li>
                        <li><a href="#">View meter readings</a></li>
                        <li><a href="#">Enter meter readings</a></li>
                        <li><a href="#">Print reading sheets</a></li>
                    </ul>

                    <h3 class="menuheader expandable invoices">Invoice</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >Generate invoices</a></li>
                        <li><a href="#">View invoices</a></li>
                    </ul>

                    <h3 class="menuheader expandable financial">Paypoint</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >Online payments</a></li>
                        <li><a href="#">Offline payments</a></li>
                        <li><a href="#">Transactions</a></li>
                    </ul>

                    <h3 class="menuheader expandable reports">Reports</h3>
                    <ul class="categoryitems">
                        <li><a href="#" >Generate reports</a></li>
                    </ul>
                </div>
                <!-- end .sidebar --></div>
            <div class="content">
                <?php
                // Displaying messages and errors
                include '../../includes/info.php';
                ?>
                <h1>All Users of the System</h1>
                <div class="hr-line"></div>
                <form action="action.php" method="post" onSubmit="">
                    <div class="actions">
                        <button class="edit tooltip" accesskey="E" title="Edit [Alt+Shift+E]" name="action[]"  value="EDIT">Edit</button>
                        <button class="block tooltip" accesskey="B" title="Block [Alt+Shift+B]" name="action[]" value="BLOCK" onClick="return confirm('Are you sure you want to block user(s)?')">Block</button>
                        <button class="activate tooltip" accesskey="I" title="Activate [Alt+Shift+I]" name="action[]" value="ACTIVATE" onClick="return confirm('Are you sure you want to activate user(s)')">Activate</button>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="23">
                                    <input type="checkbox" id="select-all" accesskey="A" title="Select all [Alt+Shift+A]" class="tooltip">
                                </th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>E-mail</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysql_fetch_array($result_user)) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" title="Select this user" class="checkbox tooltip" value="<?php echo $row['user_id'] ?>" id="<?php echo $row['user_id'] ?>">
                                    </td>
                                    <td><?php echo $row['usr_fname'] ?></td>
                                    <td><?php echo $row['usr_lname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>

                <!-- end .content --></div>
            <?php include '../../includes/footer.php'; ?>
            <!-- end .container --></div>
    </body>
</html>
<?php ob_flush(); ?>