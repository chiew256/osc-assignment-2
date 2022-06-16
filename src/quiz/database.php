<!-- DB connection file -->
<!-- Include this file in every file that use db -->

<?php

// Create connection credentials
$db_host = 'localhost';
$db_name = 'quiz';
$db_user = 'root';
$db_pass = ''; 
// No password

// Create mysqli object
// Procedural or OO

// OO $mysqli->error
// Procedural
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Error Handler
if($mysqli -> connect_error){
    printf("Connect Failed: %s\n", $mysqli -> connect_error);
    exit();
}
?>