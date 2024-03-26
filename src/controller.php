<?php

class Controller
{
  function runAction($actionName)
  {

    if (method_exists($this, 'runBeforeAction')) {
      $result = $this->runBeforeAction();
      if ($result) {
        return;
      }
    }

    $actionName .= 'Action';

    if (method_exists($this, $actionName)) {
      $this->$actionName();
    } else {
      // var_dump($actionName);
      require_once("view/status-pages/404.html");
    }
  }
}