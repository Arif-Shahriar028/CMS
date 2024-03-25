<?php

$section = $_GET['section'];
if ($section == 'home-page') {
  require_once("./controller/homePage.php");
} else if ($section == 'contact-page') {
  require_once("./controller/contactPage.php");
} else {
  require_once("./controller/homePage.php");
}
