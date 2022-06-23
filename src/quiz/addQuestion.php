<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Quiz</title>
<link rel="stylesheet" href="css/style.css">
<?php endblock() ?>

<?php

$total_question = $_SESSION['total_question'];
$quiz_id = $_SESSION['quiz_id'];
$subject_id = $_GET['subject_id'];

?>

<?php startblock('content') ?>
<header>
    <div class="container">
        <h1>PHP Quizzer</h1>
    </div>
</header>

<main>
    <div class="container">

        <?php

        if (isset($_POST['submit'])) {

            for ($i = 0; $i < $total_question; $i++) {

                // echo $i.'<br>';
                /**
                 * Get total questions
                 */
                $query = "SELECT * FROM questions";

                // Get result
                $results =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

                // Get rows
                $total = $results->num_rows;

                $next = $total + 1;


                /**
                 * Get total choices
                 */
                $query = "SELECT * FROM choices";

                // Get result
                $results =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

                // Get rows
                $totalChoice = $results->num_rows;

                $nextChoice = $totalChoice + 1;

                // Get post variables
                $question_text = $_POST['question_text'][$i];
                $correct_choice = $_POST['correct_choice'][$i];

                // echo $question_text.'<br>';
                // echo $correct_choice.'<br>';

                // Choices array
                $choices = array();
                $choices[1] = $_POST['choice1'][$i];
                $choices[2] = $_POST['choice2'][$i];
                $choices[3] = $_POST['choice3'][$i];
                $choices[4] = $_POST['choice4'][$i];
                $choices[5] = $_POST['choice5'][$i];

                // echo $choices[1].'<br>';
                // echo $choices[2].'<br>';
                // echo $choices[3].'<br>';
                // echo $choices[4].'<br>';

                // Question query
                $query = "INSERT INTO questions (question_number, text, quiz_id)
                                VALUES('$next', '$question_text', '$quiz_id')";

                // Run Query
                $insert_row = mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

                // Validate insert
                if ($insert_row) {
                    foreach ($choices as $choice => $value) {
                        if ($value != '') {
                            if ($correct_choice == $choice) {
                                $is_correct = 1;
                            } else {
                                $is_correct = 0;
                            }

                            //Choice query
                            $query = "INSERT INTO choices  (choice_id, question_number, is_correct, choice)
                                            VALUES('$nextChoice','$next', '$is_correct', '$value')";

                            // Run Query
                            $insert_row =  mysqli_query($db, $query) or die("Error in query : $query ." . mysql_error());;

                            // Validate insert
                            if ($insert_row) {
                                $nextChoice++;
                                continue;
                            } else {
                                die('Error: (' . $mysqli->errno . ')' . $mysqli->error);
                            }
                        }
                    }
                    
                }
            }
            
            echo "<div class='alert alert-success' role='alert'>
                    All questions have been added!
                </div>";
            echo "<a class='btn btn-primary' href='../dashboard/subject.php?subject_id=$subject_id' role='button'>Back to Subject</a>";
            

        } else {

            for ($i = 1; $i <= $total_question; $i++) {

                echo "Add Question " . $i;

        ?>
                
                <form method="post" action=<?php echo "addQuestion.php?subject_id=$subject_id" ?>>

                    <!-- <p>
        
                        <label>Question Number</label>
                        <input type="number" name="question_number" value="<?php echo $next; ?>">
        
                    </p> -->

                    <p>

                        <label>Question text</label>
                        <input type="text" name="question_text[]" required>

                    </p>
                    <p>

                        <label>Choice #1</label>
                        <input type="text" name="choice1[]" required>

                    </p>
                    <p>

                        <label>Choice #2</label>
                        <input type="text" name="choice2[]" required>

                    </p>
                    <p>

                        <label>Choice #3</label>
                        <input type="text" name="choice3[]">

                    </p>
                    <p>

                        <label>Choice #4</label>
                        <input type="text" name="choice4[]">

                    </p>
                    <p>

                        <label>Choice #5</label>
                        <input type="text" name="choice5[]">

                    </p>
                    <p>

                        <label>Correct Choice Number</label>
                        <input type="number" name="correct_choice[]" required>

                    </p>

                <?php

            }
                ?>

                <p>

                    <input name="submit" type="submit" value="Submit">

                </p>
                </form>

            <?php
        }
            ?>

    </div>
</main>
<?php endblock() ?>