<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Change Password</title>
    <link rel="stylesheet" href="auth.css"/>
</head>
<body>
    <?php 
        require('../config/database.php');
        session_start();
        
        if(isset($_POST['changepassword'])){
            $email = $_SESSION['email'];
            $new_password = stripslashes($_REQUEST['new_password']);
            $new_password_confirmation = stripslashes($_REQUEST['new_password_confirmation']);
            $password_hash = password_hash($new_password, PASSWORD_BCRYPT);

            $updateQuery = "UPDATE Users 
            SET password = '$password_hash'
            WHERE email = '$email'";
            if ($new_password != $new_password_confirmation) {  
                echo "<div class='form'>
                    <h3>New Password are not match</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
            }

            else if(mysqli_query($db, $updateQuery)){
                echo "<div class='form'>
                <h3>You change password successfully.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a></p>
                </div>";
            }
            
            else{
                echo "<div class='form'>
                    <h3>Change password failed.</h3><br/>
                    <p class='link'>Click here to <a href='changepassowrd.php'>Change Password</a> again.</p>
                    </div>";
            } 
        } else {
    ?>
            <form class="form" action="" method="post">
                <h1 class="login-title">Change Password</h1>
                <input type="password" class="login-input" name="new_password" placeholder="New Password">
                <input type="password" class="login-input" name="new_password_confirmation" placeholder="New Password Confirmation">
                <input type="submit" name="changepassword" value="Register" class="login-button">
                <p class="link"><a href="login.php">Click to Login</a></p>
            </form>
        <?php
            }
        ?>
</body>

