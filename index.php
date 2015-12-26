<?php

// build css if there is a newer less version
require "classes/less/lessc.inc.php";
$less = new lessc;
try {
  $less->checkedCompile("css/less/wuza.less", "css/wuza.css");
} catch (exception $e) {
   echo "fatal error: " . $e->getMessage();
}

// incude classes
include('classes/controller.php');
include('classes/model.php');
include('classes/view.php');

// get config file
$config = parse_ini_file('conf/config.ini');

// $_GET and $_POST - no $_COOKIE but config values
$request = array_merge($_GET, $_POST, $config);
$controller = new Controller($request);
echo $controller->display();

?>