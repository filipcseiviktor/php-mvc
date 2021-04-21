<?php


require_once 'app/config/Database.php';
require_once 'app/core/App.php';
require_once 'app/core/Controller.php';

// Autoloading the model when its instantiated
require_once 'vendor/autoload.php';


/**
 * To get the Root folder's name
 * e.g '/project/public/'
 */
$fullPath = $_SERVER['REQUEST_URI'];

/**
 *  trim the '/' character from the left side 
 *  e.g '/project/...' to 'project/...'
 *  then explode the string into an array from '/' characters
 *  array[0] == project ,  array[1] = public 
 */
$explodeFullPath = explode('/', ltrim($fullPath, '/'));

//To get only the "project" folder name;
$actualRootDir = (string) $explodeFullPath[0];

/**
 * Define constants to use the urls dinamically 
 * e.g [YOUR_HOST]/[YOUR_ROOT_FOLDER]/files
 */
define("ROOT_FOLDER_NAME", $actualRootDir);
define("HOST", $_SERVER["HTTP_HOST"]); // e.g localhost