<?php
class graficoController extends controller {
  function index() {
    $data = [];

    $v = new Votos();
    $conn = $v->getConnection();

    $dao = new VotosDaoMysql($conn);

    $data = $dao->findAll();

    $this->loadTemplate('grafico', $data);
  }
  
}