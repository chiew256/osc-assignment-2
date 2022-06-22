<?php

// delete.php

include('../auth/me.php');

include('header.php');

$id = $_GET['id'];

$query = "
        DELETE FROM marks_srms
        WHERE result_id = $id";

$marks = mysqli_query($db, $query);

$query2 = "DELETE FROM result_srms WHERE result_id = $id"; 

if (mysqli_query($db, $query2)) {
    mysqli_close($db);
    header('Location: lResult.php');
    exit;
} 
else {
    echo "Error deleting record";
}
?>