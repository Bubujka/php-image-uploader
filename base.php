<?php 
header('Content-Type: text/html; charset=utf-8');
session_start();
date_default_timezone_set('Europe/Moscow');
ini_set('display_errors','on');

define('BASE_DIRECTORY',dirname(__FILE__));
define('UPLOAD_PATH',dirname(__FILE__).'/img');
define('SMALL_IMAGE_PATH',dirname(__FILE__).'/small');
define('HTTP_HOST',$_SERVER['HTTP_HOST']);

define('SITE_NAME','Simple image hosting');

require('bu.php');
