<?php
require 'environment.php';

global $config;
global $db;

$config = [];
if(ENVIRONMENT === 'development') {
  define("BASE_URL", "http://localhost/projetos_reais/getbook/");
  $config['dbname'] = 'getbook';
  $config['host'] = 'localhost';
  $config['dbuser'] = 'root';
  $config['dbpass'] = '';
} else {
  define("BASE_URL", "http://www.meusite.com.br");
  $config['dbname'] = 'getbook';
  $config['host'] = 'localhost';
  $config['dbuser'] = 'root';
  $config['dbpass'] = '';
}

switch(DATA_BASE) {
  case 'MySQL':
    $db = new PDO(
      "mysql:dbname=".$config['dbname'].";
       charset=utf8;
       host=".$config['host'],
       $config['dbuser'],
       $config['dbpass']
      );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    break;
  case 'PostgreSQL':
    $db = pg_connect(
      "host=127.0.0.1 port=5432 dbname=getbook user=postgres password=12345");
      // $result = pg_query($db, "INSERT INTO getbook.usuarios (nome, email, password, tipo) values('DavilsonJunior', 'juca@gmail.com', '1234', 'Admin')");
      // $result = pg_query($db, "SELECT * FROM getbook.usuarios");
      // var_dump(pg_fetch_all($result));
    break;
  default:
    echo 'Esse banco nao existe em nosso sistema';
    break;  
    
}
