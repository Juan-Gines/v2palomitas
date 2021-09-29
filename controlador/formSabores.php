<?php
require_once "modelo/servicios/servicios.php";
require_once "vistas/vistaSabor.php";
require_once "libreria/ValidarInputs.php";
class FormSabores{
  private $consulta;

  function __construct() {
    $this->consulta=new Servicios();
  }
  function form(){
    if (!$_SESSION["id"]) {
        $idiomas=$this->consulta->getIdiomas();
        $id=ValidarInputs::input_test($_POST["lang"]);
        foreach ($idiomas->ids() as $ok) {
            if ($ok==$id) {
                $_SESSION["id"]=$id;
                break;
            }
        }
    }
    if(!$_SESSION["id"]){
      session_destroy();
      header("Location:{$_SERVER["PHP_SELF"]}");
      exit;
    }else{
      $sabor=$this->consulta->getSaborId();
      $cabeceras=$this->consulta->getCabeceras();
      $listaSabores=$this->consulta->getListaSabores();      
      $form=VistaSabor::formSabores($sabor,$cabeceras,$listaSabores);
      return $form;
    }           
    
  }
}