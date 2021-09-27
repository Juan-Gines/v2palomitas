<?php
require_once "modelo/servicios/servicios.php";
require_once "panel/vistas/editaIdioma.php";
class Nuevo{
  private $consulta; 

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function idioma(){         
    $_SESSION["id"]="es";
    $saborEsp=$this->consulta->getSaborId();
    $saboresLista=$this->consulta->getListaSabores();     
    EditaIdioma::editaIdioma($saborEsp,$saboresLista);  
  }

  function sabor(){
    $saboresId=$this->consulta->getSaborId();
    
  }
}