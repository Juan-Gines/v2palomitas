<?php
class SaboresId{
  private $sabores;  

  function __construct($lista){
    $this->sabores=$lista;    
  }

  function listado(){
    return $this->sabores;
  }
  
}