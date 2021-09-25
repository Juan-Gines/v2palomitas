<?php
class Titulos{
  private $titulo;
  private $ingredientes;
  private $alergenos;

  function __construct($lista) {
    $this->titulo=$lista[0];
    $this->ingredientes=$lista[1];
    $this->alergenos=$lista[2];
  }

  function titulo(){
    return $this->titulo;
  }

  function ingredientes(){
    return $this->ingredientes;
  }

  function alergenos(){
    return $this->alergenos;
  }
}