<?php

class AboutController extends Controller
{

  function defaultAction()
  {
    $dbInstance = DBConnection::getInstance();
    $connection = $dbInstance->getConnection();
    $page = new Page($connection);
    $page->findById(3);
    $variables['page'] = $page;

    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
