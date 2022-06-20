<!-- Background process to eval the answer -->

<?php 
include '../auth/me.php';
?>


<?php 
    // check to see if score is set_error_handler

    if(!isset($_SESSION['score'])){

        $_SESSION['score'] = 0;
    }

    if($_POST['submit']){

        $number = $_SESSION['question_id'];
        $selected_choice = $_POST['choice'];

        /**
         * Get total questions
         */
        $query = "SELECT * FROM questions WHERE quiz_id =".$_SESSION['quiz_id'];

        // Get result
        $results = $mysqli -> query($query) or die ($mysqli->error.__LINE__);

        // Get rows
        $total = $results -> num_rows;

        /**
         * Get correct choice 
         */
        $query = "SELECT * FROM choices 
                    WHERE question_number = $number AND is_correct = 1";

        // Get result
        $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

        // Get row
        $row = $result->fetch_assoc();

        // Set correct choice
        $correct_choice = $row['choice_id'];

        // Compare
        if($correct_choice == $selected_choice){
            // Answer is correct

           $_SESSION['score']++;
        
        }

        $_SESSION['question_id']++;


        // Go to next location
        if($_SESSION['display_num'] == $total){
            header("Location: final.php");
            exit();
        }else{
            $_SESSION['display_num']++;

            header("Location: question.php");
        }

        // print_r($_POST);
        // echo "$number<br>";
        // echo $selected_choice;

    }

?>