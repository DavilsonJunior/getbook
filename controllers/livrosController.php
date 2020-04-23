<?php
class livrosController extends controller {
  function index() {
    $data = [];

    $l = new Livros();
    $conn = $l->getConnection();

    $dao = new LivrosDaoMysql($conn);

    $data = $dao->findAll();

    $this->loadTemplate('livros', $data);
  }

  function pesquisa() {
    $data = [];

    $pesquisa = filter_input(INPUT_POST, 'pesquisa');

    if($pesquisa) {
    $l = new Livros();
    $conn = $l->getConnection();

    $dao = new LivrosDaoMysql($conn);

    $data = $dao->findByTitulo($pesquisa);

    $this->loadTemplate('livros', $data);
  } else {
    $this->loadTemplate('livros', $data);
  } 
}

  function adicionar() {
    $data = [];

    $titulo = filter_input(INPUT_POST, 'titulo');
    $autor = filter_input(INPUT_POST, 'autor');
    $paginas = filter_input(INPUT_POST, 'paginas');
    $descricao = filter_input(INPUT_POST, 'descricao');

    if($titulo && $autor && $paginas && $descricao) {
      if(isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
        $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

        //$file = $_FILES['arquivo'];

        if(in_array($_FILES['arquivo']['type'], $permitidos)) {
          $nome = md5(time().rand(0, 999)).'.jpg';

          $l = new Livros();
          $conn = $l->getConnection();

          $dao = new LivrosDaoMysql($conn);

          $l->setTitulo($titulo);
          $l->setAutor($autor);
          $l->setPaginas($paginas);
          $l->setDescricao($descricao);
          $l->setUrl($nome);

          $data = $dao->create($l);

          if($data) {
            move_uploaded_file($_FILES['arquivo']['tmp_name'], 'upload/'.$nome);
          }

          echo '<div class="alert alert-success" role="alert">
          Livro adicionado com sucesso!
        </div>';
          
        }
        

        
      }
    } else {

    $this->loadTemplate('adicionar-livros', $data);
    }
  }

  function editar($id) {
    $data = [];

    $l = new livros();
    $conn = $l->getConnection();

    $dao = new LivrosDaoMysql($conn);

    $data = $dao->findById($id);    

    $titulo = filter_input(INPUT_POST, 'titulo');
    $autor = filter_input(INPUT_POST, 'autor');
    $paginas = filter_input(INPUT_POST, 'paginas');
    $descricao = filter_input(INPUT_POST, 'descricao');

    if($titulo && $autor  &&  $paginas  && $descricao) {
      if(isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
      
        
        $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

        //$file = $_FILES['arquivo'];
        $nome = '';
        if(in_array($_FILES['arquivo']['type'], $permitidos)) {
          $nome = md5(time().rand(0, 999)).'.jpg';        
        }

        $l = new Livros();
        $conn = $l->getConnection();

        $dao = new LivrosDaoMysql($conn);

        $l->setId($id);
        $l->setTitulo($titulo);
        $l->setAutor($autor);
        $l->setPaginas($paginas);
        $l->setDescricao($descricao);
        $l->setUrl($nome);

        $data = $dao->update($l);

        if(isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) { 
          if($data) {
            move_uploaded_file($_FILES['arquivo']['tmp_name'], 'upload/'.$nome);
          }
        }

        echo '<div class="alert alert-success" role="alert">
          Livro atualizado com sucesso!
        </div>';
      }

        
    } else {

    $this->loadTemplate('editar-livros', $data);
    }
  }

  function deletar($id) {
    $data = [];

    $l = new Livros();
    $conn = $l->getConnection();

    $dao = new LivrosDaoMysql($conn);

    $dao->delete($id);

    $data = $dao->findAll();

    $this->loadTemplate('livros', $data);
  }

  function detalhes($id) {
    $data = [];

    $l = new Livros();
    $conn = $l->getConnection();
  
    $dao = new LivrosDaoMysql($conn);
  
    $data = $dao->findById($id);
  
    $this->loadTemplate('detalhes', $data);
      
  }

  function votar($id) {
    $data = [];

    $v = new Votos();
    $conn = $v->getConnection();
  
    $dao = new VotosDaoMysql($conn);
  
    $data = $dao->update($id);
  
    $caminho = BASE_URL."livros/detalhes/".$id;
    header("Location: " . $caminho);
      
  }
}