<?php require_once 'ti.php' ?>
<?php
include_once("../auth/me.php");

$id = $_SESSION["id"];
$nameQuery = "SELECT name FROM " . $_SESSION["type"] . " WHERE " . $_SESSION["type"] . "_id" . " = " . $id . ";";
$nameObj = mysqli_query($db, $nameQuery);
$name = mysqli_fetch_array($nameObj, MYSQLI_ASSOC)["name"];

$subjectQuery = "SELECT * FROM subject_srms";
$subjectObj = mysqli_query($db, $subjectQuery);
$subjectArr = mysqli_fetch_all($subjectObj, MYSQLI_ASSOC);

if ($_SESSION['type'] == "student") {
    $resultUrl = "../result/sResult.php";
} else {
    $resultUrl = "../result/lResult.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <?php startblock("head") ?>
    <?php endblock() ?>
</head>

<body>
    <div class="sidebar d-flex flex-column flex-shrink-0 py-3 text-white bg-dark" id="mySidebar">
        <a href="javascript:void(0)" onclick="closeNav()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-x ms-4" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="../dashboard/dashboard.php" class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app pe-none me-2" viewBox="0 0 16 16">
                        <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <button class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app pe-none me-2" viewBox="0 0 16 16">
                        <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                    </svg>
                    My Subjects
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="pb-1 list-unstyled">
                        <?php
                        foreach ($subjectArr as $idx => $subject) {
                            $subjectStr = $subject["subject_id"] . " " . $subject["subject_name"];
                            $subjectId = $subject["subject_id"];
                            echo "<li><a href='../dashboard/subject.php?subject_id=$subjectId' class='px-4 nav-link text-white'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-book-half pe-none me-2' viewBox='0 0 16 16'>
                                <path d='M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z' />
                            </svg>";
                            echo $subjectStr;
                            echo '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href=<?php echo $resultUrl; ?> class="nav-link text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app pe-none me-2" viewBox="0 0 16 16">
                        <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                    </svg>
                    Result
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <div class="d-flex flex-column min-vh-100" id="main">

        <header class="p-3 mb-3 border-bottom navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <div>
                    <button class="openbtn bg-dark" type="button" onclick="openNav()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#"><strong>MINI SPECTRUM</strong></a>
                </div>

                <div class="d-flex flex-wrap">
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle " id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $name; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle ms-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark" style=" left:auto; " aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="../dashboard/dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="../profile/profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href=<?php echo $resultUrl; ?>>Result</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="m-4">
            <?php startblock("content") ?>
            <?php endblock() ?>
        </main>

        <footer class="mt-auto text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">MINI SPECTRUM is &copy; Group 11 of WIE2001, session 2021/2022</p>
                <p class="mb-0">New to MINI SPECTRUM? <a href="">Visit the dashboard</a>.</p>
            </div>
        </footer>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <!-- Bootstrap's JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>