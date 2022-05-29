<?php
    session_start();
    include_once '../../config/database.php';
    
    if(isset($_POST['login'])){
        $email = stripslashes($_REQUEST['email']);
        $password = stripslashes($_REQUEST['password']);

        $query = "SELECT id, first_name, last_name, password FROM Users WHERE email = '$email'";

        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count > 0){
            $id = $row['id'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $password2 = $row['password'];

            if(password_verify($password, $password2)){
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $firstname;
                $_SESSION['lastName'] = $lastname;
                $_SESSION['loggedin'] = true;

                header("Location: dashboard.php");
            }
            else if(isset($_SESSION["id"])){
                header("Location: dashboard.php");
            }

            else{
                echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }
        }
        else{
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
?>