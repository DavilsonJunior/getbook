<?php
session_start();
require 'vendor/autoload.php';
require 'config.php';

spl_autoload_register(function($class){
  if(file_exists('controllers/'.$class.'.php')) {
    require 'controllers/'.$class.'.php';
  } elseif(file_exists('models/'.$class.'.php')) {
    require 'models/'.$class.'.php';
  } elseif(file_exists('core/'.$class.'.php')) {
    require 'core/'.$class.'.php';
  } elseif(file_exists('dao/'.$class.'.php')) {
    require 'dao/'.$class.'.php';
  }
});

$core = new Core();
$core->run();