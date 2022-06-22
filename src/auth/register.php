<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="auth.css"/>
</head>
<body>
    <?php
        include_once '../config/database.php';

        if(isset($_POST['register'])){
            $email = stripslashes($_REQUEST['email']);
            $type = stripslashes($_REQUEST['type']);
            $name = stripslashes($_REQUEST['name']);
            $gender = stripslashes($_REQUEST['gender']);
            $password = stripslashes($_REQUEST['password']);
            $password_confirmation = stripslashes($_REQUEST['password_confirmation']);
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // additional info
            $name = stripslashes($_REQUEST['name']);
            $gender = stripslashes($_REQUEST['gender']);
            $dob = date('Y-m-d', strtotime($_REQUEST['birthday']));

            $checkQuery = "SELECT * FROM user WHERE email = '$email'";
            $duplicate = mysqli_query($db, $checkQuery);
            if ($password != $password_confirmation) {  
                echo "<div class='form'>
                    <h3>Password are not match</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
            }
            else if (mysqli_num_rows($duplicate) > 0) {
                echo "<div class='form'>
                    <h3>Email registered.</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
            } 
            
            else {
                $insertUserTableQuery = "INSERT INTO user (email, type, password) VALUES
                ('$email', '$type', '$password_hash')";

                $insertStudentTableQuery = "INSERT INTO student (name, gender, dob, email) VALUES
                ('$name', '$gender', '$dob', '$email')";

                $insertLecturerTableQuery = "INSERT INTO lecturer (name, gender, dob, email) VALUES
                ('$name', '$gender', '$dob', '$email')";
                
                if(mysqli_query($db, $insertUserTableQuery)){
                    if($type == 'student') {
                        if(mysqli_query($db, $insertStudentTableQuery)){
                            echo "<div class='form'>
                            <h3>You are registered successfully.</h3><br/>
                            <p class='link'>Click here to <a href='login.php'>Login</a></p>
                            </div>";
                        }
                        else{
                            echo "<div class='form'>
                            <h3>Required fields are missing.</h3><br/>
                            <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                            </div>";
                        }
                    }
                    else if($type == 'lecturer'){
                        if(mysqli_query($db, $insertLecturerTableQuery)){
                            echo "<div class='form'>
                            <h3>You are registered successfully.</h3><br/>
                            <p class='link'>Click here to <a href='login.php'>Login</a></p>
                            </div>";
                        }
                        else{
                            echo "<div class='form'>
                            <h3>Required fields are missing.</h3><br/>
                            <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                            </div>";
                        }
                    }
                }
                else{
                    echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                    </div>";
                }
            }
        } else {
            ?>
                <form class="form" action="" method="post">
                    <h1 class="login-title">Registration</h1>
                    <input type="text" class="login-input" name="name" placeholder="Name" required>
                    <input type="text" class="login-input" name="email" placeholder="Email" required>
                    <input type="password" class="login-input" name="password" placeholder="Password" required>
                    <input type="password" class="login-input" name="password_confirmation" placeholder="Password Confirmation" required>
                    <div class="select-type">
                        <label for="cars" class="type-option">User type:</label>
                        <select id="type" name="type" required>
                            <option value="student">Student</option>
                            <option value="lecturer">Lecturer</option>
                        </select>
                    </div>
                    <div class="select-type">
                        <label for="cars" class="type-option">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="select-type">
                        <label for="birthday" class="type-option">Birthday:</label>
                        <input class="login-input" type="date" id="birthday" name="birthday" required>
                    </div>
                    <input type="submit" name="register" value="Register" class="login-button">
                    <p class="link"><a href="login.php">Click to Login</a></p>
                </form>
            <?php
                }
        ?>
</body>


