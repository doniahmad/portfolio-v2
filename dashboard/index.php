<?php
include("../config.php");
include("../curl.php");
include("../getapi.php");
session_start();

$path = "/portfolio-v2/dashboard/index.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="/portfolio-v2/style.css">

    <!-- icon fontawesome -->
    <script src="https://kit.fontawesome.com/299d879c38.js" crossorigin="anonymous"></script>

    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Portfolio</title>
</head>

<body>

    <div id="dashboard">
        <?php if (!isset($_SESSION['username'])) : ?>
            <!-- Login -->
            <?php require_once  __DIR__ . "/content/login.php"; ?>
        <?php else : ?>
            <!-- Sidebar -->
            <?php
            require_once __DIR__ . "/components/sidebar.php";
            ?>
            <div id="dashboard-content">
                <?php
                $page = $_GET['page'];
                $request = $_SERVER["REQUEST_URI"];

                switch ($request) {
                    case $path:
                        header("Location:" . $path . "?page=project");
                        break;
                    case $path . '/':
                        header("Location:" . $path . "?page=project");
                        break;
                    default:
                        http_response_code(404);
                        break;
                }

                switch ($page) {
                    case 'project':
                        require_once __DIR__ . "/content/project.php";
                        break;

                    case 'setting':
                        require_once __DIR__ . "/content/setting.php";
                        break;

                    case 'skill':
                        require_once __DIR__ . "/content/skill.php";
                        break;

                    case 'add-project':
                        require_once __DIR__ . "/content/input-layout.php";
                        break;

                    case 'skill':
                        require_once __DIR__ . "/content/skill.php";
                        break;
                    case 'logout':
                        require_once __DIR__ . "/content/logout.php";
                        break;

                    default:
                        http_response_code(404);
                        break;
                }
                ?>
                <div style="height: 50px;"></div>
            </div>
        <?php endif; ?>
    </div>
    <script type="text/javascript" src="script.js">
    </script>
</body>

</html>