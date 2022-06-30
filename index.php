<?php
include("config.php");

$api_url = "http://localhost/portfolio-v2/api";

$setting_url = $api_url . "/setting.php";
$skill_url = $api_url . "/skill.php";
$project_url = $api_url . "/project.php";

$data_setting = json_decode(file_get_contents($setting_url), true);
$data_skills = json_decode(file_get_contents($skill_url), true);
$data_projects = json_decode(file_get_contents($project_url), true);
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

    <div id="home">
        <?php
        // header 
        require_once  __DIR__ . "/components/header.php";

        // rigth side 
        require_once __DIR__ . "/components/right-side.php";

        // left side
        require_once __DIR__ . "/components/left-side.php";

        // Content 

        require_once __DIR__ . "/contents/hero.php";
        require_once __DIR__ . "/contents/about.php";
        require_once __DIR__ . "/contents/project.php";
        require_once __DIR__ . "/contents/contact.php";

        // Footer 
        require_once __DIR__ . "/components/footer.php";
        ?>
    </div>
    <script type="text/javascript" src="script.js">
    </script>
</body>

</html>