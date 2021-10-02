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
      $delete->idioma();
      break;
    case 3:
      $new->idioma();
      break;
    case 4:
      $edit->sabor();
      break;
    case 5:
      $delete->sabor();
      break;
    case 6:
      $new->sabor();
      break;
  }
}elseif($_SERVER["REQUEST_METHOD"]=="POST"){
  switch(true){
    case isset($_POST["editaIdioma"]):
      $edit->putIdioma();
      break;
    case isset($_POST["nuevoIdioma"]):
      $new->postIdioma();
      break;
    case isset($_POST["editaSabor"]):
      echo "entro aqui";
      $edit->putSabor();
      break;
    case isset($_POST["nuevoSabor"]):
      $new->postSabor();
      break;
  }

}elseif($_SESSION["login"]){
  $panel->panel();
}