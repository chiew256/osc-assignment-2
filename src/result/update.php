<?php

// update.php

include('../auth/me.php');

if (isset($_POST['edit'])) {
    $total = 0;
    $count = 0;
    $name = $_POST['name'];

    $query = "
            SELECT * FROM student
            INNER JOIN result_srms
            ON result_srms.student_id = student.student_id
            WHERE name = '$name'
            ";

    $student = mysqli_query($db, $query);
    if (mysqli_num_rows($student) > 0) {
        while ($row = mysqli_fetch_assoc($student)) {
            $result_id = $row['result_id'];

            $query2 = "
                    SELECT * FROM marks_srms
                    WHERE result_id = $result_id
                    ";

            $mark = mysqli_query($db, $query2);

            if (mysqli_num_rows($mark) > 0) {
                foreach ($_POST['marks'] as $subject_id => $marks) {
                    $marks = $marks;
                    $total += $marks;
                    $count++;

                    $query3 = "
                            UPDATE marks_srms
                            SET marks = $marks
                            WHERE result_id = $result_id
                            AND subject_id = $subject_id
                            ";

                    $result = mysqli_query($db, $query3);
                }
            }
        }
        $percentage = $total / $count;
        
        $query4 = "
                UPDATE result_srms
                SET result_percentage = $percentage
                WHERE result_id = $result_id
                ";

        $final = mysqli_query($db, $query4);
        if ($final) {
            mysqli_close($db);
            header('Location: lResult.php');
            exit;
        } else {
            echo "Error updating record";
        }
    }
}
