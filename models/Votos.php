<?php
class Livros extends model {

  private $id;
  private $titulo;
  private $autor;
  private $votos;
  private $ip;
  private $id_livro;

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

  public function getVotos() {
    return $this->votos;
  }

  public function setVotos($votos) {
    $this->votos = $votos;
  }

  public function getIp() {
    return $this->ip;
  }

  public function setIp($ip) {
    $this->ip = trim($ip);
  }

  public function getIdLivro() {
    return $this->id_livro;
  }

  public function setIdLivro($id_livro) {
    $this->id_livro = $id_livro;
  }
}

interface LivrosDao {
  public function create(Votos $l);
  public function findAll();
  public function findById($id);
  public function findByTitulo($titulo);
  public function update(Votos $l);
  public function delete($id);
}