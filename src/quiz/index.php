<?php
    include 'database.php';
    include '../auth/me.php';

    session_start();
    unset($_SESSION['question_id']);
    unset($_SESSION['display_num']);
    unset($_SESSION['score']);
?>

<?php


// get quiz_id for the student
$query = "SELECT * FROM student WHERE student_id = 1";
$result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
$row = $result -> fetch_assoc();
$quiz_id = $row['quiz_id'];
$_SESSION['quiz_id'] = $quiz_id;

// get quiz_name
$query = "SELECT quiz_name FROM quiz_list WHERE quiz_id = $quiz_id";
$result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
$row = $result -> fetch_assoc();
$quiz_name = $row['quiz_name'];

 /**
 * 
 * Get Total Question Number
 */
$query = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
$result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
$total = $result->num_rows;

// get question_id for the first question of this quiz
$row = $result -> fetch_assoc();
$_SESSION['question_id'] = $row['question_number'][0];
// echo $_SESSION['question_id'];

?>

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

        <!-- Page before starting the quiz -->
            <h2><?php echo $quiz_name; ?></h2>
            <p>This is a multiple choice quiz to test your knowledge of PHP.</p>
            <ul>
                <li><strong>Number of Question:</strong><?php echo $total; ?></li>
                <li><strong>Type:</strong>Multiple Choice</li>
                <li><strong>Estimated Time:</strong><?php echo $total * .5." Minutes"; ?></li>
            </ul>
            <!-- Goes to question.php and the quesiton 1 -->
            <a href="question.php" class="start">Start Quiz</a>
            <a href="addQuiz.php" class="start">Add Quiz</a>

        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>