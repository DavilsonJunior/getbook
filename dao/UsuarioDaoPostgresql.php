<?php
class UsuarioDaoPostgresql implements UsuarioDao {

  private $db;

  public function __construct($driver) {
    $this->db = $driver;
  }

  public function create(Usuario $u) {
    $sql = pg_query($this->db, "INSERT INTO getbook.usuarios (nome, email, password, tipo) values('DavilsonJunior', 'juca@gmail.com', '1234', 'Admin', '198.162.0.1')");
    

      // $result = pg_query($db, "SELECT * FROM getbook.usuarios");
      // var_dump(pg_fetch_all($result));
  }
  public function findAll(){}
  public function findById($id){}
  public function update(Usuario $u){}
  public function delete($id){}
}