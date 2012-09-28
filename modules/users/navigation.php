<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../../favicon.ico" type="image/x-icon" />
        <title></title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css">

        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="../../js/accordion.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sidebar" style="width: 100%">
            <script type="text/javascript">

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

            <style type="text/css">

                .arrowlistmenu{
                    width: 100%; /*width of accordion menu*/
                }

                .arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
                    font: bold 14px Arial;
                    color: white;
                    background: black url(titlebar.png) repeat-x center left;
                    margin-bottom: 10px; /*bottom spacing between header and rest of content*/
                    text-transform: uppercase;
                    padding: 4px 0 4px 10px; /*header text is indented 10px*/
                    cursor: hand;
                    cursor: pointer;
                }

                .arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
                    background-image: url(titlebar-active.png);
                }

                .arrowlistmenu ul{ /*CSS for UL of each sub menu*/
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
                }

                .arrowlistmenu ul li{
                    padding-bottom: 2px; /*bottom spacing between menu items*/
                }

                .arrowlistmenu ul li a{
                    color: #A70303;
                    background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
                    display: block;
                    padding: 2px 0;
                    padding-left: 19px; /*link text is indented 19px*/
                    text-decoration: none;
                    font-weight: bold;
                    border-bottom: 1px solid #dadada;
                    font-size: 90%;
                }

                .arrowlistmenu ul li a:visited{
                    color: #A70303;
                }

                .arrowlistmenu ul li a:hover{ /*hover state CSS*/
                    color: #A70303;
                    background-color: #F3F3F3;
                }

            </style>

        </head>

        <body>

            <div class="arrowlistmenu">

                <h3 class="menuheader">Home</h3>


                <h3 class="menuheader expandable">Manage Users</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.cssdrive.com">Add new user</a></li>
                    <li><a href="http://www.cssdrive.com/index.php/menudesigns/">View users</a></li>
                </ul>

                <h3 class="menuheader expandable">Settings</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >General settings</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">Tariffs</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Applications</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Add application</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">View applications</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Customers</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >View customers</a></li>
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Update customer status</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Water Meters</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Add meter</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">View meter readings</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">Enter meter readings</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">Print reading sheets</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Invoice</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Generate invoices</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">View invoices</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Paypoint</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Online payments</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">Offlinge payments</a></li>
                    <li><a href="http://www.javascriptkit.com/javatutors/">Transactions</a></li>
                </ul>
                
                <h3 class="menuheader expandable">Reports</h3>
                <ul class="categoryitems">
                    <li><a href="http://www.javascriptkit.com/cutpastejava.shtml" >Generate reports</a></li>
                </ul>
                <!-- end .sidebar --></div>
        </body>
</html>

