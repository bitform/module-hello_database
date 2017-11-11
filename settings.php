<?php

require_once("../../global/library.php");

use FormTools\Modules;

$module = Modules::initModulePage("admin");
$L = $module->getLangStrings();

if (isset($_POST["update"])) {
    $setting = isset($_POST["demo_setting"]) ? $_POST["demo_setting"] : "";
    $info = array("demo_setting" => $setting);

    $module->setSettings($info);

    $g_success = true;
    $g_message = $L["notify_setting_updated"];
}

$page_vars = array(
    "demo_setting" => $module->getSettings("demo_setting")
);

$module->displayPage("templates/settings.tpl", $page_vars);
