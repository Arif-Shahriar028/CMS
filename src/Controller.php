<?php

class Controller
{
  function runAction($actionName)
  {
    $actionName .= 'Action';
    if (method_exists($this, $actionName)) {
      $this->$actionName();
    } else {
      require_once("view/status-pages/404.html");
    }
  }
}
