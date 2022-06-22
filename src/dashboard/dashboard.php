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
                <li class="fw-bold list-group-item d-flex justify-content-between">
                    WIA2001 Database
                    <a href="#" class="btn btn-primary">Go</a>
                </li>
                <li class="fw-bold list-group-item d-flex justify-content-between">
                    WIA2002 Operating Systems
                    <a href="#" class="btn btn-primary">Go</a>
                </li>
                <li class="fw-bold list-group-item d-flex justify-content-between">
                    WIA2003 Algorithms
                    <a href="#" class="btn btn-primary">Go</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php endblock() ?>