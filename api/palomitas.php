<?php
header('Content-Type:application/json; charset=utf-8');
include_once 'gestion.php';

switch($_SERVER["REQUEST_METHOD"]){
  case 'GET':
    if(isset($_GET["lista"])){
      $resultado=Gestion::getIdiomas();
    }elseif(isset($_GET["cabeceras"])){
      $resultado=Gestion::getCabezeras();
    }elseif(isset($_GET["titulos"])){
      $resultado=Gestion::getTitulos();
    }elseif(isset($_GET["valores"])){
      $resultado=Gestion::getValores();
    }elseif(isset($_GET["sabores"])){
      $resultado=Gestion::getSaboresId();
    }elseif(isset($_GET["listasabores"])){
      $resultado=Gestion::getListaSabores();
    }
}
if(!empty($resultado)){
  echo $resultado;
}