<?php
session_start();
require_once "inicio.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST["idioma"])){    
    $formSabores->form();
  }elseif(isset($_POST["elige"])){
    $tabla->tablaIngredientes();
  }
}else{  
  $formIdiomas->form();
}