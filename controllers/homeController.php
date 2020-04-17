<?php
class homeController extends controller {

  public function index() {
    $data = [];
    
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    
    if($email && $password) {
      $u = new Usuario();

      $conn = $u->getConnection();      

      $dao = new UsuarioDaoMysql($conn);

      $u->setEmail($email);
      $u->setPassword($password);

      if($dao->login($u)) {
        $usuario = $dao->findByEmail($email);
        //$_SESSION['logado'] = $usuario['id'];
        $this->loadtemplate('home', $data);
      } else {
        $this->loadtemplate('login', $data);
      }
    }

    $this->loadTemplate('home', $data);
  }
}