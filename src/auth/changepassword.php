<?php 
    session_start();
    include_once '../../config/database.php';

    if(isset($_POST['changepassword'])){
        $password = stripslashes($_REQUEST['password']);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $checkQuery = "SELECT * FROM Users WHERE email = 'admin@gmail.com'";
        $duplicate = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($duplicate) > 0) {
            $updateQuery = "UPDATE Users 
                            SET password = '$password_hash'
                            WHERE email = 'admin@gmail.com'";

            if(mysqli_query($db, $updateQuery)){
                echo "<div class='form'>
                  <h3>You change password successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
            }
            else{
                echo "<div class='form'>
                  <h3>Old password not valid.</h3><br/>
                  <p class='link'>Click here to <a href='changepassowrd.php'>Change Password</a> again.</p>
                  </div>";
            }
        }
        else{
            echo "<div class='form'>
                  <h3>User not valid.</h3><br/>
                  <p class='link'>Click here to <a href='changepassowrd.php'>Change Password</a> again.</p>
                  </div>";
        } 
    }
?>