<style>
    table{
        width: 100%;
        height:25px;
    }
    table:hover{
        background-color: #E8F0FE;
        color: #5C67D2;
    }
    .temp{
        position: relative;
        width: 100%;
        height:100%;
        z-index: 1;
        display: none;
        border-style: solid;
    }
    p{
        margin:auto;
    }
</style>
<script>
    function DirInto(something){
        var formData = {
                'change' : something
            };
        $.ajax({
            url: "includes/content.php",
            type: "POST",
            data: formData,
            success: function(result){$("#DynamicContent").html(result);},
            error: function(result){$("#DynamicContent").html("Error!");}
        });
    }
    function showFile(something){
        var temp = document.getElementsByClassName("temp");
        temp[0].setAttribute("display","block");
    }
    function fileGrab(something,type){
        if(type == 'download'){
            $.ajax({
                url: "includes/grabber.php",
                type: "POST",
                success: function(result){
                    window.location = "includes/grabber.php?type=".concat(type).concat("&file=").concat(something);
                        
                },
                error: function(result){$("#output").html("Error!");}
            });
        }
        if(type == 'delete'){
            const uri = "includes/grabber.php?type=".concat(type).concat("&file=").concat(encodeURIComponent(something));
            $.ajax({
                url: uri,
                type: "POST",
                success: function(result){
                    $("#output").html(result);
                    var item = document.getElementById(something);
                    item.remove();
                        
                },
                error: function(result){$("#output").html("Error!");}
            });
        }
    }
    function folderDelete(something,type){
        const uri = "includes/grabber.php?type=delete&folder=".concat(encodeURIComponent(something));
        $.ajax({
            url: uri,
            type: "POST",
            success: function(result){
                $("#output").html(result);
                var item = document.getElementById(something);
                item.remove();
                    
            },
            error: function(result){$("#output").html("Error!");}
        });
    }

</script>



<!-- Moved from Upload.php -->
<script>
    function uploadFile(){
        var totalfiles = document.getElementById('uploadFile').files.length;
        $("#output1").html("");
        for(var i = 0; i < totalfiles; i++){
            var formData = new FormData();
            formData.append('uploadFile', $('#uploadFile')[0].files[i]);
            const name = [];
            name[name.length] = $('#uploadFile')[0].files[i].name;
            var counter = 0;
            formData.append("submit",true);
            $.ajax({
                url: "includes/uploadFile.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType:false,
                beforeSend: function(){$('#status').html("Uploading file(s)...");},
                success: function(result){
                    $("#output1").html($("#output1").html()+"<br>"+result);
                    counter++;
                    var total = (counter / totalfiles)*100;
                    $('.bar2').css('width',total+"%");
                    $('.percent').html(total+"%");
                    },
                error: function(result){$("#output1").html("Error!");}
            });
        }
        
    }
</script>
<p>Upload a file to the website:</p>
<br>
<input type="file" id="uploadFile" multiple>
<button onclick="uploadFile();">Upload</button>
<br><br>
<div id="output"></div>

<!-- end -->
<div class="progress">
    <div class="bar" style="height : 5px; background-color:black">
        <div class="bar2" style="height:5px;width:0%;background-color : yellow"></div>
    </div>
    <div class="percent">0%</div >
</div>

<div id="status"></div>


<!--<div style="whitespace:nowrap;overflow:hidden">---------------------------------------------------------------------------------------------------------------------------------------</div>
-->
<div class="temp"></div>
<?php
function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    return $size;
} 

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($pageWasRefreshed){
    echo "<script>ajaxNavigation();</script>";
    die();
}

@session_start();
$change = $_POST['change'] ?? "";
$_SESSION['change'] = $change;
$dir = "../../files".$change;
$dirDisplay = "";
$_SESSION['dir'] = $dir;
try
{
    echo "<br>";
    if (@$handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if($entry == "."){
                continue;
            }
            try{
                @$test = opendir($dir."/".$entry);
                if($test == null)
                    throw new Exception("L");
                if($entry == ".."){
                    $temp = explode("/",$change);
                    unset($temp[count($temp)-1]);
                    $change2 = implode("/",$temp);
                    echo "\n<table id=\"$entry\" onclick='DirInto(\"$change2\")'><td";
                }else{
                    echo "\n<table id=\"$entry\"><td onclick='return DirInto(\"$change"."/"."$entry\")'";
                }
                echo " style='width:90%'>📁$entry</td>";
                /*
                if($entry != ".."){
                    echo "<td><button onclick='return folderDelete(\"$entry\")' style=\"float:right;\">Delete</button></td>";
                }
                */
                echo "</table>";
                
            }
            catch (Exception $e)
            {
                //here is where to change stuff attached to files <button onclick='return fileGrab(\"$entry\",\"delete\")' style=\"float:right;\">Delete</button>
                echo "\n<table id=\"$entry\"> 
                            <td style='width:90%' onclick='return showFile(\"$entry\");'>🗎$entry 
                            <button onclick='return fileGrab(\"$entry\",\"download\")' style=\"float:right;\">Download</button>
                            
                            </td>
                        </table>";
            }
        }
        closedir($handle);
    }
    else{
        include("content.php");
    }
}
catch(Error $e){
    echo "No files to be found!";
}
    
?>
<div id="output1"></div>