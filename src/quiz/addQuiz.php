<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Quiz</title>
<link rel="stylesheet" href="css/style.css">
<?php endblock() ?>

<?php startblock('content') ?>

<?php

$subject_id = $_GET['subject_id'];
$quiz_id = $_GET['quiz_id'];

if (isset($_POST['submit'])) {

    $quiz_id = $_POST['quiz_id'];
    $quiz_name = $_POST['quiz_name'];
    $total_question = $_POST['total_question'];

    $query = "INSERT INTO quiz_list (quiz_id, quiz_name, total_question, subject_id)
                    VALUES('$quiz_id', '$quiz_name', '$total_question', '$subject_id')";

    // Run Query
    $insert_row = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());

    if ($insert_row) {
        $_SESSION['total_question'] = $total_question;
        $_SESSION['quiz_id'] = $quiz_id;
        header("Location: addQuestion.php?subject_id=$subject_id");
    }
}

/**
 * Get total quiz
 */
$query = "SELECT * FROM quiz_list";

// Get result
$results = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

// Get rows
$total = $results->num_rows;

$next = $total + 1;


$query = "SELECT * FROM subject_srms";
$subject_list = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;
// print_r($subject_list);


?>

<header>
    <div class="container">
        <h1>PHP Quizzer</h1>
    </div>
</header>

<main>
    <div class="container">


        <h2>Add a Quiz</h2>
        
        <form method="post" action=<?php echo "addQuiz.php?subject_id=$subject_id&quiz_id=$quiz_id" ?>>

            <p>

                <label>Quiz ID</label>
                <input type="number" name="quiz_id" value="<?php echo $next; ?>" required>
            </p>

            <p>

                <label>Quiz Name</label>
                <input type="text" name="quiz_name" required>

            </p>

            <p>

                <label>Total Question</label>
                <input type="number" name="total_question" required>

            </p>

            <p>
                <input name="submit" type="submit" value="Submit">

            </p>

        </form>
    </div>
</main>

<?php endblock() ?>