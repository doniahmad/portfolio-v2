<?php

require_once "../controllers/ProjectController.php";
$project = new ProjectController();
$request_method = $_SERVER['REQUEST_METHOD'];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $project->get_project($id);
        } else {
            $project->get_projects();
        }
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $project->update_project($id);
        } else {
            $project->insert_project();
        }
        break;
    case 'DELETE':
        $id = intval($_GET["id"]);
        $project->delete_project($id);
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
