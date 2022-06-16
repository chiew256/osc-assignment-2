<?php 
    include '../auth/me.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        if($_SESSION['type'] == "Student"){

    ?>
        <a href="index.php" class="start">Take a Quiz</a>

    <?php
        }else{       
    ?>
    <a href="addQuiz.php" class="start">Add a Quiz</a>
    <a href="manageQuiz.php" class="start">Manage Quiz</a>
    <?php
        }
    ?>
</body>
</html>