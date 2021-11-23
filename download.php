<?php
if(isset($_POST['file_surat'])){
    $file = $_POST['file_surat'];
    // Add a file type check here for security purposes so that nobody can-
    // download PHP files or other sensitive files from your server by spoofing this script
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('mystery_folder/'.$file);
    exit();
}
?>

<!-- <?php

// if (isset($_GET['file_surat'])) {
//     $file = $_GET['file_surat'];
//     if (file_exists($file) && is_readable($file) && preg_match('/\.pdf$/',$file)) {
//      header('Content-Type: application/pdf');
//      header("Content-Disposition: attachment; filename=\"$file\"");
//      readfile($file);
//      }
//     }
?> -->
