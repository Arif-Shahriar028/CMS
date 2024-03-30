<?php

// require("src/Controller.php");
class PageController extends Controller
{
  private $id;

  function __construct($id)
  {
    $this->id = $id;
  }

  /**
   * @method deafultAction return the default home page
   */
  function defaultAction()
  {
    $dbInstance = DBConnection::getInstance();
    $connection = $dbInstance->getConnection();
    $page = new Page($connection);
    $page->findBy('id', $this->id);
    $variables['page'] = $page;

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
