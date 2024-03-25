<?php

require("src/Controller.php");
class ContactController extends Controller
{

  function defaultAction()
  {
    require("view/contact-page.html");
  }
  /**
   * @function showPageAction includes views on condition
   */
  function showPageAction($action)
  {
    if ($action == 'show') {
      require("view/contact-page.html");
    } else if ($action == 'submit') {
      require("view/contact-us-thank-you.html");
    } else {
      echo $action;
    }
  }
}
