<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Quiz</title>
<link rel="stylesheet" href="css/style.css">
<?php endblock() ?>

<?php startblock('content') ?>

<?php

$subject_id = $_GET['subject_id'];
$quiz_id = $_GET['quiz_id'];
// set question number
// $number = (int) $_GET['n'];

/**
 * 
 * Get Total Question Number
 */

$query = "SELECT * FROM questions WHERE quiz_id = " . $_SESSION['quiz_id'];

// Get Results
$result =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;
$total = $result->num_rows;


/**
 * Set Question
 */
$query = "SELECT * FROM questions WHERE question_number = " . $_SESSION['question_id'];

// Get result from query
// pass error & line number
$result =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

// associate array with requested data
$question = $result->fetch_assoc();

/**
 * Set Choices
 */
$query = "SELECT * FROM choices WHERE question_number =" . $_SESSION['question_id'];

// Get result from query
// pass error & line number
$choices =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

if (!isset($_SESSION['display_num'])) {
    $_SESSION['display_num'] = 1;
}



?>
<header>
    <div class="container">
        <h1>PHP Quizzer</h1>
    </div>
</header>

<main>
    <div class="container">
        <div class="current">Question <?php echo $_SESSION['display_num']; ?> of <?php echo $total ?></div>

        <p class="question">
            <?php
            echo $question['text'];
            ?>
        </p>
        
        <form method="post" action=<?php echo "process.php?subject_id=$subject_id&quiz_id=$quiz_id"; ?>>

            <ul class="choices">

                <?php
                while ($row = $choices->fetch_assoc()) :
                ?>

                    <li><input name="choice" type="radio" value="<?php echo $row['choice_id'] ?>"><?php echo $row['choice'] ?></li>

                <?php
                endwhile;
                ?>

            </ul>
            <input type="submit" name="submit" value="Submit">


            <a href="index.php" class="home">End Quiz</a>
            <!-- <input type="hidden" name="number" value="<?php echo $number; ?>"/> -->

        </form>

    </div>
</main>
<?php endblock() ?>