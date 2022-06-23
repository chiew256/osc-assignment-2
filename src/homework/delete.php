
<?php
include_once("../auth/me.php");
extract($_REQUEST);

$sql=mysqli_query($db,"select * from upload where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");

mysqli_query($db,"delete from upload where id='$del'");

header("Location: homework.php");

?>