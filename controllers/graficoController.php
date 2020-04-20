<?php
class graficoController extends controller {
  function index() {
    $data = [];

    SELECT votos.votos, votos.titulo FROM votos ORDER BY votos DESC LIMIT 5

    $this->loadTemplate('grafico', $data);
  }
  
}