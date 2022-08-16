<head>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            
        }
        #jsdos{
            width : 75%;
            height: 75%;
        }
    </style>    
    
</head>
<body>
    <link rel="stylesheet" href="./includes/emulators/DOS/js-dos.css">
    <div id="jsdos"></div>
    <input id="input" type='text'></input>
    <script>
        
        emulators.pathPrefix = "./includes/emulators/DOS/";
        Dos(document.getElementById("jsdos"))
            .run("/includes/emulators/DOS/Maniac Mansion.jsdos")
    </script>
</body>