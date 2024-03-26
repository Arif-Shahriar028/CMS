<?php

session_start();

include "src/template.php";
include "src/controller.php";

$section = $_GET['section'] ?? $_POST['section'] ?? 'home-page';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

/**
 * @param $section = 'contact-page', execute the else-if block
 */
if ($section == 'contact-page') {
  require_once("./controller/contactPage.php");
  $contactController = new ContactController();
  $contactController->runAction($action);
}

/**
 * @param $section = 'about-us', execute the else-if block
 */

else if ($section == 'about-us') {
  require_once("./controller/aboutUsPage.php");
  $aboutCrontroller = new AboutController();
  $aboutCrontroller->runAction($action);
}

/**
 * Default condition block, include home-page
 *
 * @param $section = 'home-page', execute the else-if block
 */
else {
  require_once("./controller/homePage.php");
  $homeController = new HomeController();
  $homeController->runAction($action);
}
