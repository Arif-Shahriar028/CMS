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
include ROOT_PATH . "src/Entity.php";
include ROOT_PATH . "model/Page.php";
include ROOT_PATH . "src/Route.php";


/**
 * Initialize the database connection
 */
$dbInstance = DBConnection::getInstance();
$dbInstance->connect('localhost', 'cms_db', 'root', '');
$connection = $dbInstance->getConnection();

$action = $_GET['seo_name'] ?? 'home';

$route = new Route($connection);
$route->findBy('pretty_url', $action);

$action = $route->action != '' ? $route->action : 'default';

$moduleName = ucfirst($route->module) . 'Controller';

if (file_exists(ROOT_PATH . "controller/" . $moduleName . ".php")) {
  include(ROOT_PATH . "controller/" . $moduleName . ".php");
  $controller = new $moduleName($route->entity_id);
  $controller->runAction($action);
}
