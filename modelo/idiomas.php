<?php
class Idiomas{
  private $idiomas;
  private $id;

  function __construct($lista){
    $this->id=$lista["id"];
    $this->idiomas=$lista["idiomas"];
  }

  function listado(){
    return $this->idiomas;
  }
  function ids(){
    return $this->id;
  }
}