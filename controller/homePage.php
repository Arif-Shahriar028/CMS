<?php

// require("src/Controller.php");
class HomeController extends Controller
{
  function defaultAction()
  {
    $variables['title'] = 'Home Page';
    $variables['content'] = 'You are on the home page. Welcome!';
    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
