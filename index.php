<?php

// build css if there is a newer less version
require "classes/less/lessc.inc.php";
$less = new lessc;
$less->setFormatter("compressed");
try {
  $less->checkedCompile("css/less/wuza.less", "css/wuza.css");
} catch (exception $e) {
   echo '<div class="text-danger bg-danger small-padding">fatal error: ' . $e->getMessage() . '</div>';
}

// incude classes
include('classes/controller.php');
include('classes/model.php');
include('classes/view.php');

// get config file
$config = parse_ini_file('conf/config.ini', TRUE);

session_start();

// $_SESSION, $_GET and $_POST - no $_COOKIE but config values
$request = array_merge($_SESSION, $_GET, $_POST, $config);
$controller = new Controller($request);

echo $controller->display();

$controller->update_session();

?>