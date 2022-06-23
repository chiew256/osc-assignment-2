<?php

// final.php

include('../auth/me.php');

if (isset($_POST['add'])) {

    $total = 0;
    $count = 0;
    $student_id = $_POST['student_id'];

    $query = "
            SELECT * FROM student
            WHERE student_id = '$student_id'
            ";

    $student = mysqli_query($db, $query);
    if (mysqli_num_rows($student) > 0) {
        while ($row = mysqli_fetch_assoc($student)) {
            $result_percentage = '0.00';

            $query2 = "
                    INSERT INTO result_srms
                    (student_id, result_percentage)
                    VALUES ($student_id, $result_percentage)
                    ";

            $insert = mysqli_query($db, $query2);

            $query3 = "
                    SELECT * FROM result_srms
                    WHERE student_id = $student_id
                    ";

            $result = mysqli_query($db, $query3);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $result_id = $row['result_id'];

                    $query4 = "
                            SELECT * FROM marks_srms
                            WHERE result_id = $result_id
                            ";

                    $mark = mysqli_query($db, $query4);

                    foreach ($_POST['marks'] as $subject_id => $marks) {
                        $marks = $marks;
                        $total += $marks;
                        $count++;

                        $query5 = "
                                INSERT INTO marks_srms
                                (result_id, subject_id, marks)
                                VALUES ($result_id, $subject_id, $marks)
                                ";

                        $update = mysqli_query($db, $query5);
                    }
                }
                $percentage = $total / $count;

                $query6 = "
                        UPDATE result_srms
                        SET result_percentage = $percentage
                        WHERE result_id = $result_id
                        ";

                $final = mysqli_query($db, $query6);
                if ($final) {
                    mysqli_close($db);
                    header('Location: lResult.php');
                    exit;
                } else {
                    echo "Error updating record";
                }
            }
        }
    }
}
