<?php

/**
 * Start the session to store variables
 */
session_start();


/**
 * @define directories
 */
define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

include ROOT_PATH . "src/template.php";
include ROOT_PATH . "src/controller.php";
include ROOT_PATH . "src/DBConnection.php";
include ROOT_PATH . "model/Page.php";
include ROOT_PATH . "src/Entity.php";
include ROOT_PATH . "src/Route.php";

/**
 * Initialize the database connection
 */
$dbInstance = DBConnection::getInstance();
$dbInstance->connect('localhost', 'cms_db', 'root', '');
$connection = $dbInstance->getConnection();
var_dump($connection);
/**
 * @param $section define which page should be shown
 * @param $action define which type of action should be done
 */
// $section = $_GET['section'] ?? $_POST['section'] ?? 'home-page';
$action = $_GET['seo_name'] ?? $_POST['seo_name'] ?? 'home';

$route = new Route($connection);
$route->findBy('pretty_url', $action);

$action = $route->action != '' ? $route->action : 'default';

$moduleName = ucfirst($route->module) . 'Controller';

var_dump($moduleName);

include(ROOT_PATH . "controller/" . $moduleName . "php");
$controller = new $moduleName($route->entity_id);
$controller->runAction($action);

/**
 * @param $section = 'contact-page', execute the else-if block
 */
// if ($section == 'contact-page') {
//   require_once(ROOT_PATH . "controller/contactPage.php");
//   $contactController = new ContactController();
//   $contactController->runAction($action);
// }

// /**
//  * @param $section = 'about-us', execute the else-if block
//  */

// else if ($section == 'about-us') {
//   require_once(ROOT_PATH . "controller/aboutUsPage.php");
//   $aboutCrontroller = new AboutController();
//   $aboutCrontroller->runAction($action);
// }

// /**
//  * Default condition block, include home-page
//  *
//  * @param $section = 'home-page', execute the else-if block
//  */
// else {
//   require_once(ROOT_PATH . "controller/homePage.php");
//   $homeController = new HomeController();
//   $homeController->runAction($action);
// }
