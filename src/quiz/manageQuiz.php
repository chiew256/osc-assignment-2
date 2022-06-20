<?php 

include '../auth/me.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
</head>
<body>
    
<?php
        $query = "SELECT * FROM quiz_list";
        $results = mysqli_query($db, $query);

        
        if(isset($_GET['delete'])){
            $quiz_id = $_GET['quiz_list'];
        
            $query = "DELETE FROM quiz_list WHERE quiz_id = '$quiz_id'";

            $results = mysqli_query($db, $query) or die("Error in query : $query".mysql_error());

            if($results){
                echo "Quiz is deleted.";
            }
        }else{
            if(isset($_GET['edit'])){
                $quiz_id = $_GET['quiz_list'];

                header("Location: editQuestion.php?quiz=$quiz_id");
            }
        }
        
    ?>


    <!-- Form to get Quiz wanted to edit -->
    <form action="" method="GET">

        <br><br>
        <label for="quiz">Select a Quiz: </label>

        <select name="quiz_list">
            <?php

                while($quiz = mysqli_fetch_array($results, MYSQLI_ASSOC)):;
            ?>

                    <option value="<?php echo $quiz['quiz_id']; ?>"><?php echo  $quiz['quiz_name']; ?></option>
        <?php
                endwhile;
        ?>
        </select>

        <!-- <input type="submit" value="Edit" name="edit"> -->
        <input type="submit" value="Delete" name="delete">
        <a href="dashboard.php" class="start">Cancel</a>
       
    </form>
</body>
</html>