<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database= "minispectrum_db";  
    
    // Create connection
    $db = mysqli_connect($servername, $username, $password, $database) or die ("could not connect to mysql"); ;
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>