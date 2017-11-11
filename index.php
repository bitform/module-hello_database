<?php

require_once("../../global/library.php");

use FormTools\Modules;
$module = Modules::initModulePage("admin");

$random_numbers = $module->getRandNums();

$page_vars = array(
    "random_numbers" => implode(", ", $random_numbers)
);

$module->displayPage("templates/index.tpl", $page_vars);
