<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Quiz</title>
<link rel="stylesheet" href="css/style.css">
<?php endblock() ?>

<?php startblock('content') ?>

<?php

unset($_SESSION['question_id']);
unset($_SESSION['display_num']);
unset($_SESSION['score']);

// get quiz_id for the student
// $query = "SELECT * FROM enroll WHERE student_id = " . $_SESSION['id'];
// $result = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());
// $row = $result->fetch_assoc();
// $subject_id = $row['subject_id'];

// $query = "SELECT * FROM quiz_list WHERE subject_id = '$subject_id'";
// $result =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;
// $row = $result->fetch_assoc();
// $quiz_id = $row['quiz_id'];

$subject_id = $_GET['subject_id'];
$quiz_id = $_GET['quiz_id'];

$query = "SELECT * FROM student WHERE student_id = " . $_SESSION['id'];
$result = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());
$row = $result->fetch_assoc();
$student_name = $row['name'];

if ($quiz_id == null) {
    echo "Relax. No Quiz for you.";
    header("Location = dashboard.php");
}
$_SESSION['quiz_id'] = $quiz_id;


// get quiz_name
$query = "SELECT quiz_name FROM quiz_list WHERE quiz_id = $quiz_id";
$result =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;
$row = $result->fetch_assoc();
$quiz_name = $row['quiz_name'];

/**
 * 
 * Get Total Question Number
 */
$query = "SELECT * FROM questions WHERE quiz_id = $quiz_id ORDER BY question_number";
$result =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;
$total = $result->num_rows;

// get question_id for the first question of this quiz
$row = $result->fetch_assoc();
$_SESSION['question_id'] = $row['question_number'][0];
// echo $_SESSION['question_id'];

?>

<header>
    <div class="container">
        <h1>PHP Quizzer</h1>
    </div>
</header>

<main>
    <div class="container">

        <!-- Page before starting the quiz -->
        <h3>Student Name: <?php echo $student_name; ?></h3>
        <h3>Student ID: <?php echo $_SESSION['id']; ?></h3>
        <h2><?php echo $quiz_name; ?></h2>
        <p>This is a multiple choice quiz to test your knowledge of PHP.</p>
        <ul>
            <li><strong>Number of Question:</strong><?php echo $total; ?></li>
            <li><strong>Type:</strong>Multiple Choice</li>
            <li><strong>Estimated Time:</strong><?php echo $total * .5 . " Minutes"; ?></li>
        </ul>
        <!-- Goes to question.php and the quesiton 1 -->
        <?php
        if ($_SESSION["type"] == "lecturer") {
        ?>
        <?php
        } else {
        ?>
        <a href=<?php echo "question.php?subject_id=$subject_id&quiz_id=$quiz_id" ?> class="start">Start Quiz</a>
        <?php
        }
        ?>
        


    </div>
</main>

<?php endblock() ?>