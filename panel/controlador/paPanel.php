<?php 
require_once "panel/vistas/panel.php";
require_once "modelo/servicios/servicios.php";
require_once "libreria/ValidarInputs.php";
class PaPanel{
  private $consulta;  

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function panel(){
    $_SESSION["id"]="es";
    $idiomas=$this->consulta->getIdiomas();    
    $saboresId=$this->consulta->getSaborId();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      
      $respuesta=$this->consulta->getUser();      
      if($respuesta["login"]){
        $_SESSION["login"]=true;
        $_SESSION["errLogin"]=false;
      }else{
        $_SESSION["errLogin"]="*Usuario invalido";
      }
    }
    Panel::panelControl($idiomas,$saboresId);
  }
}