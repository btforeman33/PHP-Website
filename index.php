<html>
    <head>
        <style>
            body{
                background-image: url("https://images.fineartamerica.com/images-medium-large-5/zelda-hylian-shield-becca-buecher.jpg");
                background-size: 100%;
                text-align:center;
                align-content: center;
                font-family: "Comic Sans MS","Comic Sans";
                font-size: 25pt;
            }
            t1{
                color:orange;
                text-shadow: 0px 0px 7px black;
                font-size:35pt;
            }
            div{
                margin:auto;
                border-radius: 5px;
                background-color:white;
                border-style: solid;
                border-color: green;
                width: 75%;
            }
            button{
                height:20px;
                width:20px;
            }
        </style>
        <script>
            function active(){
                var content = document.getElementById("content");
                content.innerHTML = "";
                content.innerHTML = '<img style="height:50%;width:50%" src="https://static.dw.com/image/53724164_6.jpg"></img> <p>Bro just breathe you\'re getting irl teabagged</p>';

            }
        </script>
    </head>
    <body>
        <t1>
            The Legend Of Zelda Fan Movie
        </t1>
        <div id="content">
            <t2 style="background-color:red;color:yellow;">
                VOICE ACTORS NEEDED!
            </t2>
            <ul style="text-align:left;">
                <li>
                    No Pay
                </li>
                <li>
                    No 401k
                </li>
                <li>
                    No insurance policy (including any and all medical)
                </li>
                <li>
                    No time and a half
                </li>
                <li>
                    Good, quality fun
                </li>
            </ul>
            <p>
                Please call me at: (410) 500-4687
            </p>
            <p>
                <i><b>My boys and I, we got something big going on.
                    If you wanna be the next big thing, you need to join us. Free work, free labor, but most importantly, free laughs.
                </b></i>
            </p>
            <img src="zelda.png"></img>

        </div>
        <button onclick="active();"></button>
    </body>
</html>