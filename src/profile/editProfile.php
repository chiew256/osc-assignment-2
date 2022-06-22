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
        <li class="breadcrumb-item"><a href="../profile/profile.php">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>

      </ol>
    </nav>
  </div>
</div>

<div class="card mb-4">
  <div class="card-body">
    <h2 class="card-title">Edit Profile</h2>
    <hr>
    <form action="" method="post">
      <div class="container-sm ms-0 p-0">
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Student ID</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Name</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Gender</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Date of Birth</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Email</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Type</span>
          <input type="text" value="abc" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="mb-3 text-end">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="./profile.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>

  </div>
</div>
</div>

<?php endblock() ?>