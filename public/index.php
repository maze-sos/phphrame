<?php 

session_start();

/**  Valid PHP Version? **/
$minPHPV = '8.0';
if (phpversion() < $minPHPV)
{
	die("Your PHP version must be {$minPHPV} or higher to run this app. Your current version is " . phpversion());
}

/**  Path to this file **/
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App;
$app->loadController();
