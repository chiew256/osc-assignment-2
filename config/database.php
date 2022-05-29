<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database= "db_socar";  
    
    // Create connection
    $db = mysqli_connect($servername, $username, $password, $database) or die ("could not connect to mysql"); ;
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>