<?php
require_once "modelo/servicios/servicios.php";
require_once "panel/vistas/editaIdioma.php";
class Editar{
  private $consulta;  

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function idioma(){
    if(isset($_GET["id"])&&is_numeric($_GET["id"])){            
      $idiomas=$this->consulta->getIdiomas();            
      if(key_exists($_GET["id"],$idiomas->ids())){
        $_SESSION["id"]="es";
        $saborEsp=$this->consulta->getSaborId();
        $datos["id"]=$_SESSION["id"]=$idiomas->ids()[$_GET["id"]];
        $datos["idioma"]=$idiomas->listado()[$_GET["id"]];

        $saboresLista=$this->consulta->getListaSabores();
        
        foreach ($saboresLista->listado() as $sabor) {
          $_SESSION["sabor"]=$sabor;
          $datos["titulos"][]=$this->consulta->getTitulos();
        }
        $datos["cabeceras"]=$this->consulta->getCabeceras();
        
      }
      EditaIdioma::editaIdioma($saborEsp,$saboresLista,$datos);
    }else{
      header("Location:{$_SERVER["PHP_SELF"]}");
      exit;
    }
  }

  function sabor(){
    $saboresId=$this->consulta->getSaborId();
    
  }
}