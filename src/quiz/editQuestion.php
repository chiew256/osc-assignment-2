<?php 

include '../auth/me.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table{
            border-style: solid;
            border-width: 2px;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        th, td{
            border-style: solid;
            border-width: 2px;
            border-collapse: collapse;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        input, select{
            display: block;
            margin: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <?php
        if(isset($_REQUEST['quiz'])){
            $quiz_id = $_REQUEST['quiz'];

            // Get quiz name
            $query = "SELECT quiz_name FROM quiz_list WHERE quiz_id = '$quiz_id'";

            $results = mysqli_query($db, $query) or die("Error in query : $query".mysql_error());

            $row = $results -> fetch_assoc();
            $quiz_name = $row['quiz_name'];
            echo "You are editing ". $quiz_name;

            // Get questions of this quiz
            $query = "SELECT * FROM questions WHERE quiz_id = '$quiz_id'";

            $results = mysqli_query($db, $query) or die("Error in query : $query".mysql_error());

    ?>

        <form action="">

            
            <?php
            if(mysqli_num_rows($results) > 0){
                while($row = mysqli_fetch_row($results)){
                    
                    // get choices
                    $question_number = $row[0];
                    
                    $query = "SELECT * FROM choices WHERE question_number = '$question_number'";
                    
                    $c_result = mysqli_query($db, $query) or die("Error in query : $query".mysql_error());
                    
                    $choices = array();
                    $i = 1;
                    while($c_row = mysqli_fetch_row($c_result)){
                        // print_r($c_row);
                        // echo '<br>';
                        
                        $choices[$i] = $c_row[3];
                        $i++;
                    }
                    // print_r($choices);

                    echo $row[0];
                    
                    ?>

                
                    <input type="text" name="text" value="<?php echo $row[1];?>" size="50">
                    
                       
                    <?php
                    echo "Choices:<br>";
                        foreach($choices as $key => $value){
                            
                           echo "<input type='text' name='choice[]' value=' $value'  size='50'>";
                            
                        }
                    ?>                       
        
                </form>
                    
    <?php
                }
            }else{
                echo "No question found for this quiz. Please delete this quiz and add again";
            }
        }
    ?>

</body>
</html>