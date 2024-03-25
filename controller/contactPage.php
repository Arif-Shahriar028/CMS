<?php

if ($action == 'show') {
  require("view/contact-page.html");
} else if ($action == 'submit') {
  require("view/contact-us-thank-you.html");
} else {
  echo $action;
}
