<?php 

include '../auth/me.php';

?>


<?php


    $total_question = $_SESSION['total_question'];  
    $quiz_id = $_SESSION['quiz_id'];

?>

<!-- Admin page, add question to db through browser -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>

    <script>
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>

    <script>
        function addInputs(elm) {
            var result = document.querySelector('#');
            result.innerHTML = '';
            for (var i = 0; i < parseInt(elm.value); i++) {
                var wrapper = document.createElement('div');
                wrapper.innerHTML = '<input type="text" placeholder="textfield ' + i + '" />';
                result.appendChild(wrapper);
            }
            }
    </script>
    
</head>
<body>
    

    <header>
        <div class = "container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>

    <main>
        <div class="container">

        
       

        <?php


        ?>
        


        <?php

            if(isset($_POST['submit'])){
                        
                for($i = 0; $i <$total_question; $i++){

                    // echo $i.'<br>';
                    /**
                     * Get total questions
                     */
                    $query = "SELECT * FROM questions";

                    // Get result
                    $results =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

                    // Get rows
                    $total = $results -> num_rows;

                    $next = $total + 1;


                    /**
                     * Get total choices
                     */
                    $query = "SELECT * FROM choices";

                    // Get result
                    $results =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

                    // Get rows
                    $totalChoice = $results -> num_rows;

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
                    $insert_row = mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

                    // Validate insert
                    if($insert_row){
                        foreach($choices as $choice => $value){
                            if($value != ''){
                                if($correct_choice == $choice){
                                    $is_correct = 1;
                                }else{
                                    $is_correct = 0;
                                }

                                //Choice query
                                $query = "INSERT INTO choices  (choice_id, question_number, is_correct, choice)
                                            VALUES('$nextChoice','$next', '$is_correct', '$value')";

                                // Run Query
                                $insert_row =  mysqli_query($db, $query) or die("Error in query : $query .".mysql_error());;

                                // Validate insert
                                if($insert_row){
                                    $nextChoice ++;
                                    continue;
                                }else{
                                    die('Error: ('.$mysqli->errno. ')'. $mysqli->error);
                                }

                            }
                           
                        }
                        echo 'Question has been added<br>';
                    }

                }
                
                // if(isset($msg)){
                //     // message from query section above
                //     echo '<p>'.$msg.'</p>';
                // }

            }else{

                        for($i = 1; $i <= $total_question; $i++){
            
                            echo "Add Question ". $i;
                        
                 ?>
            
                <form method="post" action="addQuestion.php">
    
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

    <footer>
        <div class="container">
            Copyright &copy; 2022, PHP Quizzer
        </div>
    </footer>
</body>
</html>