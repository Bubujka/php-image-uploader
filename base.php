<?php 
header('Content-Type: text/html; charset=utf-8');
session_start();
date_default_timezone_set('Europe/Moscow');
ini_set('display_errors','on');

define('BASE_DIRECTORY',dirname(__FILE__));
define('HTTP_HOST',$_SERVER['HTTP_HOST']);

function exception_handler($exception) {
  ob_end_clean();
  echo bu::view('error',array('message'=>$exception->getMessage()));
}

set_exception_handler('exception_handler');
require('bu.php');
