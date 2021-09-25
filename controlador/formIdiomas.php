<?php
require_once "modelo/servicios/servicios.php";
require_once "vistas/vistaIdioma.php";
class FormIdiomas{
  private $consulta;

  function __construct() {
    $this->consulta=new Servicios();
  }
  function form(){
    $idiomas=$this->consulta->getIdiomas();    
    $form=VistaIdioma::formIdiomas($idiomas);
    return $form;
  }
}