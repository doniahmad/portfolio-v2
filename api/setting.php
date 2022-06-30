<?php

require_once "../controllers/SettingController.php";
$setting = new SettingController();
$request_method = $_SERVER['REQUEST_METHOD'];
switch ($request_method) {
    case 'GET':
        $setting->get_setting();
        break;

    case 'POST':
        $setting->update_setting();
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
