<?php
class Usuario extends model {

  private $id;
  private $nome;
  private $email;
  private $password;
  private $tipo;
  private $ip;

  public function getConnection() {
    return $this->db;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = trim($id);
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = ucwords(trim($nome));
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = strtolower(trim($email));
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = trim($password);
  }

  public function getTipo() {
    return $this->tipo;
  }

  public function setTipo($tipo) {
    $this->tipo = ucwords(trim($tipo));
  }

  public function getIp() {
    return $this->tipo;
  }

  public function setIp($ip) {
    $this->ip = trim($ip);
  }
}

interface UsuarioDao {
  public function create(Usuario $u);
  public function findAll();
  public function findById($id);
  public function findByEmail($email);
  public function login(Usuario $u);
  public function update(Usuario $u);
  public function delete($id);
}