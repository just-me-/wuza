<?php

// get config file
$config = parse_ini_file('conf/config.ini', TRUE);

// check for ssl
if($_SERVER['HTTPS'] != "on" && $config['ssl'] == 1){
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $redirect");
}

// build css if there is a newer less version
require "classes/less/lessc.inc.php";
$less = new lessc;
$less->setFormatter("compressed");
try {
  $less->checkedCompile("css/less/wuza.less", "css/wuza.css");
} catch (exception $e) {
   echo '<div class="text-danger bg-danger small-padding">fatal error: ' . $e->getMessage() . '</div>';
}

// allow GZIP Compression
ob_start("ob_gzhandler");
session_start();

// incude classes
include('classes/controller.php');
include('classes/model.php');
include('classes/view.php');
include('classes/uri.php');

// $_SESSION, $_GET and $_POST - no $_COOKIE but config values
$request = array_merge($_SESSION, $_GET, $_POST, $config);

// add values from fancy url
$url=new URI("wuza");
$request["view"] = $url->shouldShow404("view") ? "404" : strtolower($url->getVar("view"));

// allowed url slash vars - but prefer get params if there are some
foreach(array('file') as $vari) {
    $request[$vari] = $name ?: $url->getVar($vari);
}

// create controller
$controller = new Controller($request);

echo $controller->display();

$controller->update_session();

?>