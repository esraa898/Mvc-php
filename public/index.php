<?php
namespace PHPMVC;

use PHPMVC\lib\FrontController;
use PHPMVC\lib\language;
use PHPMVC\lib\template;

session_start();

if(!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}

require_once '..'.DS .'app'.DS.'config'. DS.'config.php';
require_once APP_PATH.DS .'lib'.DS.'autoload.php';
if(!isset($_SESSION['lang'] )){
 $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;   
}

$template_parts = require_once '..'.DS .'app'.DS.'config'. DS.'templateconfig.php';
$template= new Template($template_parts);
$language = new language;
 $frontcontroller = new FrontController($template,$language);
 $frontcontroller->dispatch();


