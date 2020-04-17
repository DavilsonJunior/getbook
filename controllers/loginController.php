<?php
class loginController extends controller {
  
  public function index() {
    $data = [];
    
    $this->loadTemplate('login', $data);

    // if($_SESSION['logado']) {
    //   $usuario = $dao->findById($_SESSION['logado']);
    //   $this->loadTemplate('home', $data);
    // } else {

    //     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //     $password = filter_input(INPUT_POST, 'password');
        
    //     if($email && $password) {

    //       $u = new Usuario();
    //       $conn = $u->getConnection();

    //       $u->setEmail($email);
    //       $u->setPassword($password);

    //       $dao = new UsuarioDaoMysql($conn);

    //       if($dao->login($u)) {
    //         $usuario = $dao->findByEmail($email);

    //         $_SESSION['logado'] = $usuario['id'];

    //         $this->loadtemplate('home', $data);
    //       } else {
    //         $this->loadtemplate('login', $data);
    //       }
    //     } else {
    //       $this->loadtemplate('login', $data);
    //     }
      
    //   }
  }
}