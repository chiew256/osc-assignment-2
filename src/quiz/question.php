<?php

    include '../auth/me.php'; 

?>

<?php

    // set question number
   // $number = (int) $_GET['n'];

    /**
     * 
     * Get Total Question Number
     */

    $query = "SELECT * FROM questions WHERE quiz_id = ". $_SESSION['quiz_id'];

    // Get Results
    $result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);
    $total = $result->num_rows;
    

    /**
     * Set Question
     */
    $query = "SELECT * FROM questions WHERE question_number = ".$_SESSION['question_id'];

    // Get result from query
    // pass error & line number
    $result = $mysqli -> query($query) or die($mysqli-> error.__LINE__);

    // associate array with requested data
    $question = $result -> fetch_assoc();

    /**
     * Set Choices
     */
    $query = "SELECT * FROM choices WHERE question_number =". $_SESSION['question_id'];

    // Get result from query
    // pass error & line number
    $choices = $mysqli -> query($query) or die($mysqli-> error.__LINE__);

    if(!isset($_SESSION['display_num'])){
        $_SESSION['display_num'] = 1;
    }
       


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
            <div class="current">Question <?php echo $_SESSION['display_num']; ?> of <?php echo $total ?></div>

            <p class="question">
                <?php
                    echo $question['text'];
                ?>
            </p>

            <form method="post" action="process.php">

                <ul class="choices">

                <?php
                while($row = $choices->fetch_assoc()):
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

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>