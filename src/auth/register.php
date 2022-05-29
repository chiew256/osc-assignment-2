<?php
    include_once '../../config/database.php';

    if(isset($_POST['register'])){
        $firstName = stripslashes($_REQUEST['first_name']);
        $lastName = stripslashes($_REQUEST['last_name']);
        $email = stripslashes($_REQUEST['email']);
        $type = stripslashes($_REQUEST['type']);
        $password = stripslashes($_REQUEST['password']);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $checkQuery = "SELECT * FROM Users WHERE email = '$email'";
        $duplicate = mysqli_query($db, $checkQuery);
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<div class='form'>
                  <h3>Email registered.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        } 
        
        else {
            $insertQuery = "INSERT INTO Users (first_name, last_name, email, type, password) VALUES
            ('$firstName', '$lastName', '$email', '$type', '$password_hash')";
            
            if(mysqli_query($db, $insertQuery)){
                echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
            }
            else{
                echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
            }
        }
    }

/**
 * CREATE  TABLE IF NOT EXISTS `Users` (
  `id` INT  AUTO_INCREMENT ,
  `first_name` VARCHAR(150) NOT NULL ,
  `last_name` VARCHAR(150) NOT NULL ,
  `email` VARCHAR(255),
  `type` VARCHAR(255),
  `password` VARCHAR(255),
  PRIMARY KEY (`id`) ); 
*/    
?>
