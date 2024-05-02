<div id="uploadbox">
    <button id="uploadbutton" style="float:right" onclick="uploadMenu();"><b>X</b></button>
    <p>Upload a file to the website, if you are connected through web.bforeman.net, max upload size is 100MB
        <br>
        Current location is <?php echo $dirDisplay;?>
    </p>
    <br>
    <input type="file" id="uploadFile" multiple>
    <button onclick="uploadFileProgressHandler();">Upload</button>
    <div id="status"></div>
    <div id="output1"></div>
</div>