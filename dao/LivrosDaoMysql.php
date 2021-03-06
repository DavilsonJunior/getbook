<?php
class LivrosDaoMysql implements LivrosDao {
  private $db;

  public function __construct($driver) {
    $this->db = $driver;
  }

  public function create(Livros $l) {
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

    $sql = $this->db->query("SELECT 
    livros.id, 
    livros.titulo, 
    livros.autor, 
    livros.paginas, 
    livros.descricao, 
    livros.url,
    votos.votos
    FROM livros INNER JOIN votos ON (votos.id_livro = livros.id) ORDER BY id DESC");
    if($sql->rowCount() > 0) {
      $data = $sql->fetchAll();
      
      foreach($data as $item) {
        $l = new Livros();
        $l->setId($item['id']);
        $l->setTitulo($item['titulo']);
        $l->setAutor($item['autor']);
        $l->setPaginas($item['paginas']);
        $l->setDescricao($item['descricao']);
        $l->setUrl($item['url']);
        $l->setVotos($item['votos']);

        $array[] = $l;
      }
    }

    return $array;
  }
  public function findById($id){
    $array = [];
    $sql = "SELECT
    L.id, 
    L.titulo, 
    L.autor, 
    L.paginas, 
    L.descricao, 
    L.url,
    V.votos FROM livros L INNER JOIN votos V ON (V.id_livro = L.id) WHERE L.id = :id ";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $item = $sql->fetch();

      $l = new Livros();

      $l->setId($item['id']);
      $l->setAutor($item['autor']);
      $l->setPaginas($item['paginas']);
      $l->setDescricao($item['descricao']);
      $l->setUrl($item['url']);
      $l->setTitulo($item['titulo']);
      $l->setVotos($item['votos']);
      $array[] = $l;
    }

    return $array;
  }
  public function findByTitulo($busca){
    $array = [];
    if($busca !== "") {
      $busca = "%{$busca}%";
      $sql = "SELECT 
      L.id, 
      L.titulo, 
      L.autor, 
      L.paginas, 
      L.descricao, 
      L.url,
      V.votos FROM livros L INNER JOIN votos V ON (V.id_livro = L.id)";
      if($busca !== '') {
        $sql .= " WHERE L.titulo LIKE :busca OR L.autor LIKE :busca";
      }
        $sql = $this->db->prepare($sql);
      if($busca !== '') {
        $sql->bindValue(":busca", $busca);
      }

      //var_dump($sql);
      
      $sql->execute();

      if($sql->rowCount() > 0) {
        $data = $sql->fetchAll();
        
        foreach($data as $item) {
          $l = new Livros();
          $l->setId($item['id']);
          $l->setTitulo($item['titulo']);
          $l->setAutor($item['autor']);
          $l->setPaginas($item['paginas']);
          $l->setDescricao($item['descricao']);
          $l->setUrl($item['url']);
          $l->setVotos($item['votos']);

          $array[] = $l;
      }    
    }
  }
  return $array;
}

  public function update(Livros $l){
    $sql = "UPDATE livros SET titulo = :titulo, autor = :autor, paginas = :paginas, descricao = :descricao, url = :url WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":titulo", $l->getTitulo());
    $sql->bindValue(":autor", $l->getAutor());
    $sql->bindValue(":paginas", $l->getPaginas());
    $sql->bindValue(":descricao", $l->getDescricao());
    $sql->bindValue(":url", $l->getUrl());
    $sql->bindValue(":id", $l->getId());
    $sql->execute();

    return true;
  }
  public function delete($id){
    $sql = $this->db->prepare("DELETE FROM livros WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    $sql = $this->db->prepare("DELETE FROM votos WHERE id_livro = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    return true;
  }
}