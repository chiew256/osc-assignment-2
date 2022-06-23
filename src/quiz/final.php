<?php 
    include '../auth/me.php';
?>

<?php
/**
 * 
 * Get Total Mark ID
 */

$query = "SELECT * FROM quiz_marks";

// Get result
$results =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

// Get rows
$total = $results -> num_rows;
?>

<!-- Display the results -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>
<body>
    

    <header>
        <div class = "container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>

    <main>
        <div class="container">
           
            <h2>You're Done!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final Score: <?php echo $_SESSION['score']; ?></p>

            <?php

            $score = $_SESSION['score'];
            $quiz_id = $_SESSION['quiz_id'];
            $student_id = $_SESSION['id'];

            // mark query
            $query = "SELECT * FROM quiz_marks WHERE quiz_id = '$quiz_id' AND student_id = '$student_id'";
            $result =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;
            
            if(mysqli_num_rows($result) > 0){
                $query = "UPDATE quiz_marks SET quiz_mark = '$score' WHERE quiz_id = '$quiz_id' AND student_id = '$student_id'";
            }else{
                $query = "INSERT INTO quiz_marks (quiz_mark_id, quiz_id, quiz_mark, student_id)
                VALUES($total + 1, $quiz_id, $score, 1)";
            }


            // Run Query
            $insert_row =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

        ?>

            <a href="index.php" class="start">Take the quiz again.</a>
            <a href="dashboard.php" class="start">Exit</a>

        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>