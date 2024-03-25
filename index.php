<?php

$section = $_GET['section'] ?? $_POST['section'] ?? 'home-page';
$action = $_GET['action'] ?? $_POST['action'] ?? 'show';


if ($section == 'home-page') {
  require_once("./controller/homePage.php");
} else if ($section == 'contact-page') {
  require_once("./controller/contactPage.php");
} else if ($section == 'about-us') {
  require_once("./controller/aboutUsPage.php");
} else {
  require_once("./controller/homePage.php");
}
