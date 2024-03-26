<?php

class AboutController extends Controller
{

  function defaultAction()
  {
    echo "about controller";
    $variables['title'] = 'About Us';
    $variables['content'] = 'We are the developers';
    $template = new Template('default');
    $template->view('static-page', $variables);
  }
}
