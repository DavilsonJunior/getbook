<?php
class controller {

  protected $db;

  public function __construct() {
    global $config;
  }

  public function loadView($viewName, $viewData = []) {
    //extract($viewData);
    include 'views/pages/'.$viewName.'.php';
  }

  public function loadTemplate($viewName, $viewData = []) {
    include 'views/pages/template.php';
  }

  public function loadViewInTemplate($viewName, $viewData) {
    //extract($viewData);
    include 'views/pages/'.$viewName.'.php';
  }
}