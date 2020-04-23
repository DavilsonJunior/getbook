<?php
class VotosDaoMysql implements VotosDao {
  private $db;

  public function __construct($driver) {
    $this->db = $driver;
  }

  public function create(Votos $v) {
    $sql = "INSERT INTO livros 
    (titulo, autor, paginas, descricao, url) VALUES
    (:titulo, :autor, :paginas, :descricao, :url)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":titulo", $l->getTitulo());
    $sql->bindValue(":autor", $l->getAutor());
    $sql->bindValue(":paginas", $l->getPaginas());
    $sql->bindValue(":descricao", $l->getDescricao());
    $sql->bindValue(":url", $l->getUrl());
    $sql->execute();

    $sql = "INSERT INTO votos 
    (titulo, autor, votos, ip, id_livro) VALUES
    (:titulo, :autor, 0, '192.168.0.1', :id_livro)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":titulo", $l->getTitulo());
    $sql->bindValue(":autor", $l->getAutor());
    $sql->bindValue(":id_livro", $this->db->lastInsertId());
    $sql->execute();

    return true;    
  }
  public function findAll(){
    $array = [];

    $sql = $this->db->query("SELECT votos.votos, votos.titulo FROM votos ORDER BY votos DESC LIMIT 5");

    if($sql->rowCount() > 0) {
      $data = $sql->fetchAll();
      $titulo = [];
      $votos = [];
      
      foreach($data as $item) {
        $titulo[] = $item['titulo'];
        $votos[] = $item['votos'];
      }
    }
    $array = array('titulo' => $titulo, 'votos' => $votos);

    return $array;
  }
  public function findById($id){
    $array = [];
    $sql = "SELECT * FROM livros WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $dado = $sql->fetch();

      $l = new Livros();

      $l->setId($dado['id']);
      $l->setAutor($dado['autor']);
      $l->setPaginas($dado['paginas']);
      $l->setDescricao($dado['descricao']);
      $l->setUrl($dado['url']);
      $l->setTitulo($dado['titulo']);
      $array[] = $l;
    }

    return $array;
  }
  public function findByTitulo($titulo){
    $dados = [];
    $sql = "SELECT * FROM usuarios WHERE titulo = :titulo";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":titulo", $titulo);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $dados = $sql->fetch();
      return $dados;
    }

    return $dados;
  }

  public function update($id){
    $sql = $this->db->prepare("SELECT * FROM votos WHERE id_livro = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $dado = $sql->fetch(); 
      $dado = $dado['votos'] + 1;

    $sql = "UPDATE votos SET votos = :votos WHERE id_livro = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":votos", $dado);
    $sql->bindValue(":id", $id);
    $sql->execute();

    return true;
    } else {
      return false;
    }
  }
  public function delete($id){
    $sql = $this->db->prepare("DELETE FROM livros WHERE id = :id");
    $sql->bindValue("id", $id);
    $sql->execute();

    return true;
  }
}