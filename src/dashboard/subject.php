<?php include '../template.php' ?>

<?php
$subjectId = $_GET["subject_id"];
$subjectNameObj = mysqli_query($db, "SELECT * FROM subject_srms WHERE subject_id = " . $subjectId . ";");
$subjectNameArr = mysqli_fetch_array($subjectNameObj, MYSQLI_ASSOC);
$subjectNameStr = $subjectNameArr["subject_id"] . " " . $subjectNameArr["subject_name"];

// Read quiz
$quizListObj = mysqli_query($db, "SELECT * FROM quiz_list WHERE subject_id = " . $subjectId . ";");
$quizListArr = mysqli_fetch_all($quizListObj, MYSQLI_ASSOC);

// Read homework
$homeworkObj = mysqli_query($db, "SELECT * FROM homework WHERE subject_id = " . $subjectId . ";");
$homeworkArr = mysqli_fetch_all($homeworkObj, MYSQLI_ASSOC);

?>

<?php startblock('head') ?>
<title><?php echo $subjectNameStr; ?></title>
<?php endblock() ?>

<?php startblock('content') ?>

<div class="card mb-4">
    <div class="card-body">
        <h1 class="card-title"><?php echo $subjectNameStr; ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">My Subjects</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $subjectNameStr; ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h2 class="card-title">Quiz</h2>
            <?php
            if ($_SESSION["type"] == "lecturer") {
            ?>
            <a class="btn btn-primary" href=<?php echo "../quiz/addQuiz.php?subject_id=$subjectId" ?> role="button">Add Quiz</a>
            <?php
            }
            ?>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($quizListArr as $idx => $quizInfo) {
                    $quizId = $quizInfo['quiz_id'];
                    $quizName = $quizInfo['quiz_name'];
                    $numQues = $quizInfo['total_question'];
                    echo "<div class='col-lg-4 col-md-6 col-xs-12 card'>
                            <div class='card-body'>
                                <h5 class='card-title'>$quizName</h5>
                                <p class='card-text'>There are a total of $numQues questions.</p>
                            </div>
                            <div class='card-body'>
                                <a href='../quiz/quiz.php?subject_id=$subjectId&quiz_id=$quizId' class='card-link'>Go</a>
                            </div>
                        </div>";
                }
                ?>

            </div>

        </div>

    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h2 class="card-title">Homework</h2>
            <?php
            if ($_SESSION["type"] == "lecturer") {
            ?>
            <a class="btn btn-primary" href="#" role="button">Add Homework</a>
            <?php
            }
            ?>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($homeworkArr as $idx => $homeworkInfo) {

                    $homeworkId = $homeworkInfo['homework_id'];

                    echo "<div class='col-lg-4 col-md-6 col-xs-12 card'>
                            <div class='card-body'>
                                <h5 class='card-title'>Homework $homeworkId</h5>
                                <p class='card-text'>Please attempt the homework.</p>
                            </div>
                            <div class='card-body'>
                                <a href='#' class='card-link'>Go</a>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php endblock() ?>