<?php
class Livros extends model {

  private $id;
  private $titulo;
  private $autor;
  private $paginas;
  private $descricao;
  private $url;
  private $votos;

  public function getConnection() {
    return $this->db;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = trim($id);
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function setTitulo($titulo) {
    $this->titulo = ucwords(trim($titulo));
  }

  public function getAutor() {
    return $this->autor;
  }

  public function setAutor($autor) {
    $this->autor = ucwords(trim($autor));
  }

  public function getPaginas() {
    return $this->paginas;
  }

  public function setPaginas($paginas) {
    $this->paginas = $paginas;
  }

  public function getDescricao() {
    return $this->descricao;
  }

  public function setDescricao($descricao) {
    $this->descricao = trim($descricao);
  }

  public function getUrl() {
    return $this->url;
  }

  public function setUrl($url) {
    $this->url = strtolower(trim($url));
  }

  public function getVotos() {
    return $this->votos;
  }

  public function setVotos($votos) {
    $this->votos = $votos;
  }
}

interface LivrosDao {
  public function create(Livros $l);
  public function findAll();
  public function findById($id);
  public function findByTitulo($email);
  public function update(Livros $l);
  public function delete($id);
}