<?php 
    session_start();
    include_once '../config/database.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // change file location
        // header("Location: ../quiz/index.php");
        // exit();
    } else {
        header("Location: ../auth/login.php");
        exit();
    }
?>