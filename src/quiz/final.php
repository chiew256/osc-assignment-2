<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Quiz</title>
<link rel="stylesheet" href="css/style.css">
<?php endblock() ?>

<?php
/**
 * 
 * Get Total Mark ID
 */
$subject_id = $_GET['subject_id'];
$quiz_id = $_GET['quiz_id'];

$query = "SELECT * FROM quiz_marks";

// Get result
$results =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

// Get rows
$total = $results->num_rows;
?>

<?php startblock('content') ?>
<header>
    <div class="container">
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

        // mark query
        $query = "INSERT INTO quiz_marks (quiz_mark_id, quiz_id, quiz_mark, student_id)
                    VALUES($total + 1, $quiz_id, $score, 1)";

        // Run Query
        $insert_row =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

        ?>

        <a href=<?php echo "quiz.php?subject_id=$subject_id&quiz_id=$quiz_id" ?> class="start">Take the quiz again.</a>
        <a href=<?php echo "../dashboard/subject.php?subject_id=$subject_id" ?> class="start">Exit</a>

    </div>
</main>
<?php endblock() ?>