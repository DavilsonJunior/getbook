<?php
class notFoundController extends controller {

  // public function __construct() {
  //   parent::__construct();
  // }

  public function index() {
    $data = [];

    $this->loadTemplate('404', $data);
  }
}