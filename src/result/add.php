<?php include '../template.php' ?>

<?php startblock('head') ?>
<link rel="stylesheet" href="../style.css">
<title>Result</title>
<?php endblock() ?>

<?php startblock('content') ?>

<?php

// add.php

include('../auth/me.php');

include('header.php');

$query = "
        SELECT * FROM student 
        LEFT JOIN result_srms
        ON result_srms.student_id=student.student_id
        WHERE result_srms.student_id IS NULL";

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
                                        while ($row = mysqli_fetch_assoc($student)) 
                                        {
                                            $name = $row['name'];
                                            echo '
                                            <option value="'.$row['student_id'].'">'.$name.'</option?
                                            ';
                                            echo '<br>';
                                        }
                                        ?>
                                        <input type="hidden" name="name" id="name" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-maxlength="175" data-parsley-trigger="keyup" value="<?php echo $name ?>" />
                                        <?php
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