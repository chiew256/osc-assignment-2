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

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-sm-6">
				<h3>Result</h3>
			</div>
			<!-- style -->
			<div class="col col-sm-6 text-right">
				<a href="../dashboard/dashboard.php" class="btn btn-warning btn-sm">Back</a>
			</div>
		</div>
	</div>
	<div class="card-body">

		<?php
		$download_button = '';

		$id = $_SESSION['id'];

		$query = "
			SELECT * FROM student
			WHERE student_id = '$id'
			";

		$student = mysqli_query($db, $query);
		if (mysqli_num_rows($student) > 0) {
			while ($row = mysqli_fetch_array($student, MYSQLI_ASSOC)) {
				$student_id = $row['student_id'];
				$name = $row['name'];
				$email = $row['email'];
				$Date_of_Birth = $row['dob'];
				$gender = $row['gender'];

				echo '
				<p><b>Student id - </b>' . $student_id . '</p>
				<p><b>Student Name - </b>' . $name . '</p>
				<p><b>Email - </b>' . $email . '</p>
				<p><b>Date of Birth - </b>' . $Date_of_Birth . '</p>
				<p><b>Gender - </b>' . $gender . '</p>						
				';
			}
		}

		$query = "
			SELECT * FROM result_srms
			WHERE student_id = '$id'
			";

		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$result_id = $row['result_id'];
				$result_percentage = $row['result_percentage'];
			}

			if ($result_percentage != NULL) {
				echo '
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Subject</th>
						<th>Obtain Mark</th>
					</tr>
			';

				$query = "
			SELECT subject_srms.subject_name, marks_srms.marks 
			FROM marks_srms 
			INNER JOIN subject_srms 
			ON subject_srms.subject_id = marks_srms.subject_id 
			WHERE marks_srms.result_id = '$result_id'
			";

				$subject = mysqli_query($db, $query);

				$count = 0;
				$total = 0;

				if (mysqli_num_rows($subject) > 0) {
					while ($row = mysqli_fetch_array($subject, MYSQLI_ASSOC)) {
						$subject_name = $row['subject_name'];
						$marks = $row['marks'];

						$count++;
						echo '
						<tr>
							<td>' . $count . '</td>
							<td>' . $subject_name . '</td>
							<td>' . $marks . '</td>
						</tr>
					';
						$total += $marks;
					}
				}

				echo '
					<tr>
						<td colspan="2" align="right"><b>Total</b></td>
						<td>' . $total . '</td>
					</tr>
					<tr>
						<td colspan="2" align="right"><b>Percentage</b></td>
						<td>' . $result_percentage . '%</td>
					</tr>
				</table>
			</div>
			';
			} else {
				echo '<h4 align="center">No Result Found</h4>';
			}
		} else {
			echo '
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Subject</th>
						<th>Obtain Mark</th>
					</tr>
				</table>
			</div>
			';
			echo '<h4 align="center">No Result Found</h4>';
		}

		?>

	</div>
</div>
<br />
<br />
<br />
<?php

?>

<?php endblock() ?>