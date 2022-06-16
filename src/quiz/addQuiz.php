<?php 

include 'database.php'; 
session_start();
include 'src\auth\me.php'; 

?>

<?php
    if(isset($_POST['submit'])){

        $quiz_id = $_POST['quiz_id'];
        $quiz_name = $_POST['quiz_name'];
        $total_question = $_POST['total_question'];

        // Question query
        $query = "INSERT INTO quiz_list (quiz_id, quiz_name, total_question)
                    VALUES('$quiz_id', '$quiz_name', '$total_question')";

        // Run Query
        $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);

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
        $results = $mysqli -> query($query) or die ($mysqli->error.__LINE__);

        // Get rows
        $total = $results -> num_rows;

        $next = $total + 1;


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
                <input type="number" name="quiz_id" value="<?php echo $next; ?>">
            </p>

            <p>

                <label>Quiz Name</label>
                <input type="text" name="quiz_name">
                
            </p>
            <p>

                <label>Total Question</label>
                <input type="number" name="total_question">

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

