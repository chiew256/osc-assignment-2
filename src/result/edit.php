<?php include '../template.php' ?>

<?php startblock('head') ?>
<link rel="stylesheet" href="../style.css">
<title>Result</title>
<?php endblock() ?>

<?php startblock('content') ?>

<?php

// edit.php

include('../auth/me.php');

include('header.php');

$id = $_GET['id'];

$query = "
        SELECT * FROM subject_srms
        INNER JOIN marks_srms
        ON marks_srms.subject_id = subject_srms.subject_id
        INNER JOIN result_srms
        ON result_srms.result_id = marks_srms.result_id
        INNER JOIN student
        ON student.student_id = result_srms.student_id
        WHERE result_srms.result_id = '$id'
        ";

$arr = array();
$subject = mysqli_query($db, $query);
if (mysqli_num_rows($subject) > 0) {
    while ($row = mysqli_fetch_assoc($subject)) {
        array_push($arr, $row);
    }
}

?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Result Data</h1>
<form method="POST" action="update.php">
    <div class="row">
        <div class="col-md-6"><span id="message"></span>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <?php
                                if (mysqli_num_rows($subject) > 0) {
                                    for ($x = 0; $x < sizeof($arr); $x++) {
                                        $name = $arr[$x]['name'];
                                    }

                                ?>
                                    <label>Student Name : <?php echo $name ?></label>
                                    <input type="hidden" name="name" id="name" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-maxlength="175" data-parsley-trigger="keyup" value="<?php echo $name ?>" />
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                if (mysqli_num_rows($subject) > 0) {
                                    for ($x = 0; $x < sizeof($arr); $x++) {
                                        $subject_name[$x] = $arr[$x]['subject_name'];
                                        $marks[$x] = $arr[$x]['marks'];
                                        $subject_id[$x] = $arr[$x]['subject_id'];
                                ?>
                                        <label><?php echo $subject_name[$x] ?></label>
                                        <input type="text" name="marks[<?php echo $subject_id[$x] ?>]" id="marks" class="form-control" required data-parsley-maxlength="12" data-parsley-type="integer" data-parsley-trigger="keyup" value="<?php echo $marks[$x] ?>" />
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="edit" value="Edit">
                </div>
            </div>
</form>

<?php endblock() ?>