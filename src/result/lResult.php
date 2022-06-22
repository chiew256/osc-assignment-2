<?php include '../template.php' ?>

<?php startblock('head') ?>
<link rel="stylesheet" href="../style.css">
<title>Result</title>
<?php endblock() ?>

<?php startblock('content') ?>

<?php

//marks.php

include('../auth/me.php');

include('header.php');

?>

<!-- Page Heading -->
<div class="card-header">
    <div class="row">
        <div class="col col-sm-6">
            <h3>Result Management</h3>
        </div>
        <!-- style -->
        <div class="col col-sm-6 text-right">
            <a href="../dashboard/dashboard.php" class="btn btn-warning btn-sm">Back</a>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h4 class="m-0 font-weight-bold text-primary">Result List</h4>
            </div>
            <div class="col" align="right">
                <form method="POST" action="add.php">
                    <input type="submit" name="add_result" id="add_result" class="btn btn-success btn-circle btn-sm" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="result_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "
                            SELECT * FROM result_srms
                            INNER JOIN student 
                            ON student.student_id = result_srms.student_id
                            ";

                    $result = mysqli_query($db, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            $result_percentage = $row['result_percentage'];

                            echo "<tr>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $result_percentage . "</td>";
                            echo "<td> <a href='edit.php?id=" . $row['result_id'] . "'>Edit</a> <a href='delete.php?id=" . $row['result_id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php endblock() ?>