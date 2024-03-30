<?php

// require("src/Controller.php");
class HomeController extends Controller
{

  /**
   * @method deafultAction return the default home page
   */
  function defaultAction()
  {
    $dbInstance = DBConnection::getInstance();
    $connection = $dbInstance->getConnection();
    $page = new Page($connection);
    $page->findBy('id', 1);
    $variables['page'] = $page;

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
