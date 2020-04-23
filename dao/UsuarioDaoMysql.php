<?php
class UsuarioDaoMysql implements UsuarioDao {
  private $db;

  public function __construct($driver) {
    $this->db = $driver;
  }

  public function create(Usuario $u) {
    $sql = "INSERT INTO usuarios (nome, email, password, tipo, ip) VALUES('Davilson Junior', 'davi@gmail.com', '12345', '', '192.168.0.1')";
    $sql = $this->db->query($sql);
  }
  public function findAll(){
    $dados = [];
    $sql = $this->db->query("SELECT * FROM usuarios");
    if($sql->rowCount() > 0) {
      $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $dados;
    }

    return $dados;
  }
  public function findById($id){
    $dados = [];
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $dados = $sql->fetch();
      return $dados;
    }

    return $dados;
  }
  public function findByEmail($email){
    $array = [];
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $dados = $sql->fetch();
      $array['id'] = $dados['id'];
    }

    return $array;
  }

  public function login(Usuario $u) {
    $sql = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":email", $u->getEmail());
    $sql->bindValue(":password", $u->getPassword());
    $sql->execute();

    if($sql->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function update(Usuario $u){
    $sql = "UPDATE livros SET nome = :nome, email = :email, password = :password, tipo = :tipo";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":nome", $u->getNome());
    $sql->bindValue(":email", $u->getEmail());
    $sql->bindValue(":password", $u->getPassword());
    $sql->bindValue(":tipo", $u->getTipo());
    $sql->execute();

    return true;
  }
  public function delete($id){
    $sql = $this->db->prepare("DELETE FROM livros WHERE id = :id");
    $sql->bindValue("id", $id);
    $sql->execute();

    return true;
  }
}