<?php

$section = $_GET['section'] ?? $_POST['section'] ?? 'home-page';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

/**
 * @param $section = 'home-page', execute the else-if block
 */
if ($section == 'home-page') {
  require_once("./controller/homePage.php");
}

/**
 * @param $section = 'contact-page', execute the else-if block
 */
else if ($section == 'contact-page') {
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
  $aboutCrontroller->showPageAction();
}

/**
 * Default condition block, include home-page
 */
else {
  require_once("./controller/homePage.php");
}
