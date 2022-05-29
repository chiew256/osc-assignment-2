<?php 
    session_start();
    include_once '../../config/database.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        http_response_code(200);
        echo json_encode(array(
            "message" => "Welcome to the member's area, " . $_SESSION['email'] . "!",
            "loggedin" => true,
            "testing" => session_id(),
            "user" => array(
                "id" => $_SESSION['id'],
                "firstName" => $_SESSION['firstName'],
                "lastName" => $_SESSION['lastName'],
                "email" => $_SESSION['email'],
                "type" => $_SESSION['type'],
            )
        ));
    } else {
        echo "<div class='form'>
                  <h3>Please login first.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
    }
?>