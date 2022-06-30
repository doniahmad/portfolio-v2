<?php

$api_url = "http://localhost/portfolio-v2/api";

$setting_url = $api_url . "/setting.php";
$skill_url = $api_url . "/skill.php";
$project_url = $api_url . "/project.php";

$data_setting = json_decode(file_get_contents($setting_url), true);
$data_skills = json_decode(file_get_contents($skill_url), true);
$data_projects = json_decode(file_get_contents($project_url), true);

function get_project($path, $id)
{
    global $api_url;

    $url = $api_url . $path . "?id=" . $id;

    return json_decode(file_get_contents($url), true);
}
