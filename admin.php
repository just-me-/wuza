<?php

// get config file
$config = parse_ini_file('conf/config.ini', TRUE);

// check for ssl
if($_SERVER['HTTPS'] != "on" && $config['ssl'] == 1){
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $redirect");
}

// incude classes
include('classes/quote.php');
include('classes/controller.php');
include('classes/model.php');
include('classes/view.php');

session_start();

// $_SESSION, $_GET and $_POST - no $_COOKIE but config values
$request = array_merge($_SESSION, $_GET, $_POST, $config);

// create controller
$controller = new Controller($request);

echo $controller->display_admin();

?>