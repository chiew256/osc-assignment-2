<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Profile</title>
<?php endblock() ?>

<?php startblock('content') ?>

<div class="card mb-4">
  <div class="card-body">
    <div class="d-flex pb-3">
      <img src="https://www.w3schools.com/bootstrap4/paris.jpg" class="rounded-circle img-thumbnail img-fluid p-1" style="max-width: 180px; width:180px;height:180px" alt="User photo" />
      <h1 class="card-title ps-4 my-auto">Hong Jia Herng</h1>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h2 class="card-title">User Details</h2>
      <div><a href="./editProfile.php" class="btn btn-primary">Edit Details</a></div>
    </div>
    <hr>
    <div class="container-sm ms-0 p-0">
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Student ID</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Name</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Gender</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Date of Birth</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Email</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Type</span>
        <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
      </div>

    </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <h2 class="card-title">Course details</h2>
    <hr>
    <div class="container-sm ms-0 p-0">
      <ul class="list-group">
        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">WIA2001 Database</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">WIA2002 Operating Systems</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">WIA2003 Algorithms</a>
      </ul>

    </div>

  </div>
</div>

<?php endblock() ?>