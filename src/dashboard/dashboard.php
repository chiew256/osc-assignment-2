<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Dashboard</title>
<?php endblock() ?>

<?php startblock('content') ?>

<div class="card mb-4">
    <div class="card-body">
        <h1 class="card-title">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title">All Subjects</h2>
        <hr>
        <div class="card">
            <ul class="list-group list-group-flush">
                <?php
                foreach ($subjectArr as $idx => $subject) {
                    $subjectStr = $subject["subject_id"] . " " . $subject["subject_name"];
                    
                    echo '<li class="fw-bold list-group-item d-flex justify-content-between">';
                    echo $subjectStr;
                    echo '<a href="#" class="btn btn-primary">Go</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php endblock() ?>