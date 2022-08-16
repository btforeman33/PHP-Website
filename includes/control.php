<?php
$page = $_REQUEST['page'] ?? "null";
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
switch ($page) {
    case 'files':
        include 'content.php';
        break;

    case 'upload':
        include 'upload.php';
        break;

    case 'emulator':
        include 'emulators.php';
        break;

    default:
        echo "Click Files Tab at the top to begin uploading.";
        break;
}