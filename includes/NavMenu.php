<html>
    <head>
        <style>
            body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: whitesmoke;
            }

            .NavMenu {
            overflow: hidden;
            background-color: whitesmoke;
            border-radius: 25px;
            font-weight: bold;
            }

            .NavMenu a{
            float: left;
            font-size: 16px;
            background-color: white;
            color: #89CFF0;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            border-radius: 25px;
            border-style: solid;
            border-color: #89CFF0;
            }

            .NavMenu a:hover, .dropdown:hover .dropbtn {
            background-color: #89CFF0;
            color: white;
            }
        </style>
    </head>
    <body>
        <div id="NavMenu" class="NavMenu">
            <a class="NavMenu" href="" onclick="return ajaxNavigation('files');">Files</a>
            <a class="NavMenu" href="" onclick="return ajaxNavigation('emulator');">Emulators</a>
            
            <?php 
            if(session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            
            //echo navmenu buttons depending if user is logged in or not
            ?>
            <br>
        </div>
    </body>
</html>