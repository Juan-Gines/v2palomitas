<?php
session_start();
require_once "panel/controlador/paInicio.php";

if(!$_SESSION["login"]){
  $log->login();
}elseif(isset($_GET["action"])){
  switch($_GET["action"]){
    case 1:      
      $edit->idioma();
      break;
    case 2:

      break;
    case 3:
      $new->idioma();
      break;
    case 4:

      break;
    case 5:

      break;
    case 6:

      break;
  }
}elseif($_SESSION["login"]){
  $panel->panel();
}