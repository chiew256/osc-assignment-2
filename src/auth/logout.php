<?php 
    session_start();
    include_once '../../config/database.php';
  
    unset($_SESSION["id"]);
    unset($_SESSION["email"]);
    unset($_SESSION["type"]);
    unset($_SESSION["loggedin"]);
    unset($_SESSION["firstName"]);
    unset($_SESSION["lastName"]);
    session_destroy();
    session_unset();

    header("Location: login.php");
?>