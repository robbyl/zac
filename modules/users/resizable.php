<html>
    <head>
        <style type="text/css">
            #left {
                width: 200px;
                height: 200px;
                background:  palegoldenrod;
                float: left;
            }

            #right {
                width: 500px;
                height: 200px;
                background: palegreen;
                float: left;
            }

        </style>
        <script src="../../js/jquery-1.7.2.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                $('#left').resizable();
            
        
            });
        </script>
    </head>
    <body>
        <div id="left"></div>
        <div id="right"></div>
    </body>
</html>
