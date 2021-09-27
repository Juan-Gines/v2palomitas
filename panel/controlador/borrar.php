<?php
class Borrar{
  private $consulta;  

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function idioma(){
    $idiomas=$this->consulta->getIdiomas();
  }

  function sabor(){
    $saboresLista=$this->consulta->getListaSabores();
  }
}