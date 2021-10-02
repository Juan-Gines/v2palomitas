<?php
class Borrar{
  private $consulta;  

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function idioma(){
    if (isset($_GET["id"])&&is_numeric($_GET["id"])) {
        $idiomas=$this->consulta->getIdiomas();
        if (key_exists($_GET["id"], $idiomas->ids())) {
          $_SESSION["id"]=$idiomas->ids()[$_GET["id"]];
          $resultado=$this->consulta->borraIdioma();
          if($resultado["result"]){
            header("Location:{$_SERVER["PHP_SELF"]}");
            exit;
          }
        }
    }
    
  }

  function sabor(){
    if (isset($_GET["id"])&&is_numeric($_GET["id"])) {
        $sabores=$this->consulta->getListaSabores();
        if (key_exists($_GET["id"], $sabores->listado())) {
          $_SESSION["sabor"]=$sabores->listado()[$_GET["id"]];
          $resultado=$this->consulta->borraSabor();
          if($resultado["result"]){
            header("Location:{$_SERVER["PHP_SELF"]}");
            exit;
          }
        }
    }
  }
}