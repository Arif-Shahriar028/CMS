<?php

// require("src/Controller.php");
class ContactController extends Controller
{

  /**
   * @method runBeforeAction() check the contact form submission
   * check the session value 'has_submitted_form'
   * if session value == 1 then already submitted and return true
   * else return false
   */
  function runBeforeAction()
  {
    if ($_SESSION['has_submitted_form'] ?? 0 == 1) {
      $dbInstance = DBConnection::getInstance();
      $connection = $dbInstance->getConnection();
      $page = new Page($connection);
      $page->findById(4);
      $variables['page'] = $page;

      $template = new Template('default');
      $template->view('static-page', $variables);
      return true;
    }
    return false;
  }

  /**
   * @method defaultAction includes the default contact-us page
   */
  function defaultAction()
  {
    $dbInstance = DBConnection::getInstance();
    $connection = $dbInstance->getConnection();
    $page = new Page($connection);
    $page->findById(2);
    $variables['page'] = $page;

    $template = new Template('default');
    $template->view('contact/contact-page', $variables);
  }


  /**
   * @method submitContactFormAction() take the form submission and show thank-you page
   */
  function submitContactFormAction()
  {
    $dbInstance = DBConnection::getInstance();
    $connection = $dbInstance->getConnection();
    $page = new Page($connection);
    $page->findById(5);
    $variables['page'] = $page;

    $template = new Template('default');
    $template->view('static-page', $variables);

    $_SESSION['has_submitted_form'] = 1;
  }
}
