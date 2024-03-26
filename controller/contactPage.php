<?php

// require("src/Controller.php");
class ContactController extends Controller
{


  function defaultAction()
  {
    $variables['inputOneLabel'] = 'Your Message';
    $variables['inputTwoLabel'] = 'You Email';
    $variables['buttonText'] = 'Submit';
    $template = new Template('default');
    $template->view('contact/contact-page', $variables);
  }


  function runBeforeAction()
  {
    if ($_SESSION['has_submitted_form'] ?? 0 == 1) {
      $variables['title'] = 'Already Submitted';
      $variables['content'] = 'You already submitted a message to us. We will try to reach you as soon as possible!';
      $template = new Template('default');
      $template->view('static-page', $variables);
      return true;
    }
    return false;
  }

  function submitContactFormAction()
  {
    $variables['title'] = 'Thank You Contacting Us!';
    $variables['content'] = 'We will try to reach you as soon as possible!';
    $template = new Template('default');
    $template->view('static-page', $variables);
    $_SESSION['has_submitted_form'] = 1;
  }


  /**
   * @method showPageAction includes views on condition
   */
  // function showPageAction($action)
  // {
  //   if ($action == 'show') {
  //     require("view/contact-page.html");
  //   } else if ($action == 'submit') {
  //     require("view/contact-us-thank-you.html");
  //   } else {
  //     echo $action;
  //   }
  // }
}
