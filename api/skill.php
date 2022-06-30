<?php

require_once "../controllers/SkillController.php";
$skill = new SkillController();
$request_method = $_SERVER['REQUEST_METHOD'];
switch ($request_method) {
    case 'GET':
        $skill->get_skills();
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $skill->update_skill($id);
        } else {
            $skill->insert_skill();
        }
        break;
    case 'DELETE':
        $id = intval($_GET["id"]);
        $skill->delete_skill($id);
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
