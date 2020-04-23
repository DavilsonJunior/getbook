<?php
session_start();
unset($_SESSION['logado']);
if(!isset($_SESSION['logado'])) {
  header("Location: home");
}
