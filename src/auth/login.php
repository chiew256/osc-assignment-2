<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="auth.css"/>
</head>
<body>
    <?php
        require('../config/database.php');
        session_start();
        
        if(isset($_POST['login'])){
            $email = stripslashes($_REQUEST['email']);
            $password = stripslashes($_REQUEST['password']);

            $query = "SELECT password, type FROM user WHERE email = '$email'";

            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count > 0){
                $type = $row['type'];
                $password2 = $row['password'];

                if(password_verify($password, $password2)){
                    $id = 999;
                    if($type == 'student'){
                        $queryStudentTable = "SELECT student_id FROM student WHERE email = '$email'";
                        $studentResult = mysqli_query($db, $queryStudentTable);
                        $studentRow = mysqli_fetch_array($studentResult,MYSQLI_ASSOC);
                        $id = $studentRow['student_id'];
                    }
                    else if($type == 'lecturer'){
                        $queryLecturerTable = "SELECT lecturer_id FROM lecturer WHERE email = '$email'";
                        $lecturerResult = mysqli_query($db, $queryLecturerTable);
                        $lecturerRow = mysqli_fetch_array($lecturerResult,MYSQLI_ASSOC);
                        $id = $lecturerRow['lecturer_id'];
                    }
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['type'] = $type;
                    $_SESSION['loggedin'] = true;

                    // change file location
                    header("Location: ../quiz/index.php");
                } else{
                    echo "<div class='form'>
                    <h3>Incorrect Email/password.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
                }
            } else{
                echo "<div class='form'>
                    <h3>Incorrect Email/password.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                    </div>";
            }
        } else {
    ?>
                <form class="form" method="post" name="login">
                    <h1 class="login-title">Login</h1>
                    <input type="text" class="login-input" name="email" placeholder="Email" autofocus="true"/>
                    <input type="password" class="login-input" name="password" placeholder="Password"/>
                    <input type="submit" value="Login" name="login" class="login-button"/>
                    <p class="link"><a href="register.php">New Registration</a></p>
              </form>
            <?php
                }
            ?>
    
</body>

