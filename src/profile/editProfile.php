<?php include '../template.php' ?>

<?php startblock('head') ?>
<title>Profile</title>
<?php endblock() ?>

<?php startblock('content') ?>

<?php
$id = $_SESSION["id"];
$userQuery = "SELECT * FROM " . $_SESSION["type"] . " WHERE " . $_SESSION["type"] . "_id" . " = " . $id . ";";
$userObj = mysqli_query($db, $userQuery);
$userInfo = mysqli_fetch_array($userObj, MYSQLI_ASSOC);

if (isset($_POST['update'])) {
  $updateQuery = "UPDATE " . $_SESSION['type'] . " SET name = '" . $_POST['name']
  . "', gender = '" . $_POST['gender']
  . "', dob = '" . $_POST['dob']
  . "'WHERE " . $_SESSION['type'] . "_id = " . $_POST['id'];


  $updateObj = mysqli_query($db, $updateQuery);
  if ($updateObj) {
    echo "Update Successfully";
    header("Location: ../profile/profile.php");
  } else {
    echo "Update Failed";
    header("Location: ../profile/profile.php");
  }
}
?>

  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex pb-3">
        <img src="https://www.w3schools.com/bootstrap4/paris.jpg" class="rounded-circle img-thumbnail img-fluid p-1" style="max-width: 180px; width:180px;height:180px" alt="User photo" />
        <h1 class="card-title ps-4 my-auto"><?php echo $name; ?></h1>
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
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="container-sm ms-0 p-0">
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default"><?php echo ucfirst($_SESSION['type']) . " ID" ?></span>
            <input name="id" type="text" value="<?php echo $userInfo[$_SESSION['type'] . '_id'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Name</span>
            <input name="name" type="text" value="<?php echo $userInfo['name'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text bg-dark text-white" for="inputGroupSelect01">Gender</label>
            <select name="gender" class="form-select" id="inputGroupSelect01">
              <?php
              if ($userInfo['gender'] == "Male") {
                echo "<option selected='selected' value='Male'>Male</option>";
                echo "<option value='Female'>Female</option>";
              } else {
                echo "<option value='Male'>Male</option>";
                echo "<option selected='selected' value='Female'>Female</option>";
              }
              ?>
            </select>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Date of Birth</span>
            <input name="dob" type="date" value="<?php echo $userInfo['dob'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Email</span>
            <input name="email" type="text" value="<?php echo $userInfo['email'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-white" id="inputGroup-sizing-default">Type</span>
            <input name="type" type="text" value="<?php echo $_SESSION['type'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
          </div>
          <div class="mb-3 text-end">
            <input type="submit" class="btn btn-primary" value="Update" name="update">
            <a href="./profile.php" class="btn btn-danger">Cancel</a>
          </div>
      </form>
    </div>
  </div>
  </div>

<?php endblock() ?>