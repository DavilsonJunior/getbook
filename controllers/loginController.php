<?php
class loginController extends controller {
  
  public function index() {
    $data = [];

    if(isset($_SESSION['logado'])) {
       header("Location: home");
     } 

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
  
         $_SESSION['logado'] = $usuario['id'];
  
         echo 'certo';
       } else {
         echo 'errado';
       }
     } else {
         $this->loadtemplate('login', $data);
     }
        
   }
}