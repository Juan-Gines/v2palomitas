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
    }elseif(isset($_GET["login"])){
      $resultado=Gestion::getLogin();
    }
    break;
  case 'PUT':
    if(isset($_GET["idioma"])){      
      $resultado=Gestion::putIdioma();
    }
    if(isset($_GET["sabor"])){            
      $resultado=Gestion::putSabor();
    }
    break;
  case 'POST':
    if(isset($_GET["idioma"])){      
      $resultado=Gestion::postIdioma();
    }
    if(isset($_GET["sabor"])){      
      $resultado=Gestion::postSabor();
    }
    break;
}
if(!empty($resultado)){
  echo $resultado;
}