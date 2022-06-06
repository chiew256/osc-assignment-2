<?php 
    session_start();
    include_once '../../config/database.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
?>