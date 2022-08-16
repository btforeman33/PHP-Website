<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
foreach(array_keys($_FILES) as $i){
    if (isset($_POST['submit'])){
        $target_path = "../../files/".$_SESSION['change'];
        $errors = [];
        $files = scandir($target_path);
        if(!isset($_FILES[$i]))
            $errors[] = "No File Submitted";
        if (isset($_FILES[$i]['name']) && $_FILES[$i]['name'] != ""){
            //moves uploaded file to correct directory

            $explodedFile = explode("/", $_FILES[$i]['type']);
            $file_ext = strtolower($explodedFile[1]);
            $fileName = $_FILES[$i]['name'];
            if (move_uploaded_file($_FILES[$i]['tmp_name'], $target_path."/". $_FILES[$i]['name']) === FALSE)
                $errors[] = "Could not move uploaded file to ".$target_path." ".htmlentities($_FILES[$i]['name'])."<br/>\n";
        }

        if (sizeof($errors) != 0){
            foreach ($errors as $error){
                echo $error.'<br>';
                }
            }
        else{
            echo ("Successfully uploaded ").$_FILES[$i]['name']."<br>";
        }
    }
    else if (isset($_POST['type'])){
        $target_path = "../../files/";
        $upload_path = "../../files/"."/".$_FILES['file']['type'];
        $files = scandir($target_path);
        foreach ($files as $file) {
            if ($file == "." || $file == "..")
                continue;
        }
        if(file_exists($upload_path) == false){
            mkdir($upload_path, 0777, true);
        }
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            //moves uploaded file to correct directory
            $fileName = $_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path."/". $_FILES['file']['name']) === FALSE)
                echo $_FILES[$i]['name'].("Could not move uploaded file to ".$upload_path." ".htmlentities($_FILES['file']['name'])."<br/>\n");
        }
        else
            echo $_FILES[$i]['name'].("No File Submitted")."<br>";

        echo $_FILES[$i]['name'].("Success!")."<br>";
    }
}