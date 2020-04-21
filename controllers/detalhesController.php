<?php
class detalhesController extends controller {
  function index() {
    $data = [];

    $l = new Livros();
    $conn = $l->getConnection();

    $dao = new LivrosDaoMysql($conn);

    $data = $dao->findAll();

    $this->loadTemplate('detalhes', $data);
  }

}