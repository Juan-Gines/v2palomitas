<?php
require_once "modelo/cabeceras.php";
require_once "modelo/idiomas.php";
require_once "modelo/listaSabores.php";
require_once "modelo/saboresId.php";
require_once "modelo/titulos.php";
require_once "modelo/valores.php";
require_once "libreria/ValidarInputs.php";
require_once "vistas/vistaTabla.php";
class Tabla{
  
  private $consulta;

  function __construct() {
    $this->consulta=new Servicios();
  }

  function tablaIngredientes(){
    $sabores=$this->consulta->getListaSabores();
    $sabor=ValidarInputs::input_test($_POST["sabor"]);    
    foreach ($sabores->listado() as $sab) {
      if ($sab==$sabor) {
        $_SESSION["sabor"]=$sabor;
        break;
      }
    }if(!$_SESSION["sabor"]){
      session_destroy();
      header("Location:{$_SERVER["PHP_SELF"]}");
      exit;
    }else{
      $titulos=$this->consulta->getTitulos();
      $cabeceras=$this->consulta->getCabeceras();
      $valores=$this->consulta->getValores();      
      $tabla=VistaTabla::tablaIngredientes($_SESSION["id"],$titulos,$cabeceras,$valores);
      return $tabla;
    }
  }
}