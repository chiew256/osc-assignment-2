<?php include '../template.php' ?>

<?php startblock('head') ?>
<link rel="stylesheet" href="../style.css">
<!-- Custom fonts for this template-->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../vendor/parsley/parsley.css" />

<link rel="stylesheet" type="text/css" href="../vendor/bootstrap-select/bootstrap-select.min.css" />

<link rel="stylesheet" type="text/css" href="../vendor/datepicker/bootstrap-datepicker.css" />
<title>Result</title>
<?php endblock() ?>

<?php startblock('content') ?>

<?php

// add.php

$query = "
    SELECT student.student_id, student.name FROM student 
    LEFT JOIN result_srms
    ON result_srms.student_id=student.student_id
    WHERE result_srms.result_id IS NULL";

$student = mysqli_query($db, $query);

$query2 = "
        SELECT * FROM subject_srms
        ORDER BY subject_name
        ";

$subject = mysqli_query($db, $query2);

?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Result Data</h1>
<form method="POST" action="final.php">
    <div class="row">
        <div class="col-md-6"><span id="message"></span>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Student Name</label>
                                <select name="student_id" id="student_id" class="form-control" required>
                                <option value="">Select Student</option>
                                <?php
                                    if (mysqli_num_rows($student) > 0) 
                                    {
                                        $student_table = mysqli_fetch_all($student, MYSQLI_ASSOC);
                                        foreach ($student_table as $idx => $student_info) {
                                            $cur_name = $student_info['name'];
                                            $cur_student_id = $student_info['student_id'];
                                            echo "<option value='$cur_student_id'>$cur_name</option>";
                                            echo '<br>';
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <?php
                                if (mysqli_num_rows($subject) > 0) 
                                {
                                    while ($row = mysqli_fetch_assoc($subject)) 
                                    {
                                        $subject_name = $row['subject_name'];
                                        $subject_id = $row['subject_id'];
                                    ?>
                                        <label><?php echo $subject_name ?></label>
                                        <input type="text" name="marks[<?php echo $subject_id ?>]" id="marks" class="form-control" required data-parsley-maxlength="12" data-parsley-type="integer" data-parsley-trigger="keyup" />
                                    <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="add" value="Add">
                </div>
            </div>
</form>

<?php endblock() ?>