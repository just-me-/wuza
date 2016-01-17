<?php

// incude classes
include('classes/controller.php');
include('classes/model.php');
include('classes/view.php');

// get config file
$config = parse_ini_file('conf/config.ini', TRUE);

session_start();

// $_SESSION, $_GET and $_POST - no $_COOKIE but config values
$request = array_merge($_SESSION, $_GET, $_POST, $config);

call_user_func("do_".$request['action'], $request);


/**
* calles via js on page load
* set session flag to know that js is activated
*/
function do_setJS($request){
  $_SESSION['js'] = $request['js'];
}

?>