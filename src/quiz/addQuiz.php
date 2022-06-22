<?php 


include '../auth/me.php';

?>

<?php
    if(isset($_POST['submit'])){

        $quiz_id = $_POST['quiz_id'];
        $quiz_name = $_POST['quiz_name'];
        $total_question = $_POST['total_question'];
        $subject_id = $_POST['subject_list'];
        echo $subject_id;
        

        // Question query
        $query = "INSERT INTO quiz_list (quiz_id, quiz_name, total_question, subject_id)
                    VALUES('$quiz_id', '$quiz_name', '$total_question', '$subject_id')";

        // Run Query
        $insert_row = mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());

        if($insert_row){
            $_SESSION['total_question'] = $total_question;
            $_SESSION['quiz_id'] = $quiz_id;
            header("Location: addQuestion.php");
        }

    }

     /**
         * Get total quiz
         */
        $query = "SELECT * FROM quiz_list";

        // Get result
        $results = mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

        // Get rows
        $total = $results -> num_rows;

        $next = $total + 1;


        $query = "SELECT * FROM subject_srms";
        $subject_list = mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;
        // print_r($subject_list);


?>

<!-- Admin page, add question to db through browser -->
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

        
        <h2>Add a Quiz</h2>

        <form method="post" action="addQuiz.php">

            <p>

                <label>Quiz ID</label>
                <input type="number" name="quiz_id" value="<?php echo $next; ?>" required>
            </p>

            <p>

                <label>Quiz Name</label>
                <input type="text" name="quiz_name" required>
                
            </p>

            <p>

            <label for="subject_list">Select a Subject: </label>

            <select name="subject_list">
                <?php

                    while($subject = mysqli_fetch_array($subject_list, MYSQLI_ASSOC)):;
                    print_r($subject);
                ?>
                
                        <option value="<?php echo $subject['subject_id']; ?>" required><?php echo  $subject['subject_name']; ?></option>
            <?php
                    endwhile;
            ?>
            </select>
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

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>

