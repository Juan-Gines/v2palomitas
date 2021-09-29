<?php
class Cabeceras{
  private $producto;
  private $valor1;
  private $valor2;
  private $grasas1;
  private $grasas2;
  private $grasas3;
  private $hidratos1;
  private $hidratos2;
  private $hidratos3;
  private $proteinas;
  private $sal;
  private $ingredientes;
  private $alergenos;
  private $selecciona;
  private $continuar;
  private $volver;

  function __construct($lista) {
    $this->producto=$lista[0];
    $this->valor1=$lista[1];
    $this->valor2=$lista[2];
    $this->grasas1=$lista[3];
    $this->grasas2=$lista[4];
    $this->grasas3=$lista[5];
    $this->hidratos1=$lista[6];
    $this->hidratos2=$lista[7];
    $this->hidratos3=$lista[8];
    $this->proteinas=$lista[9];
    $this->sal=$lista[10];
    $this->ingredientes=$lista[11];
    $this->alergenos=$lista[12];
    $this->selecciona=$lista[13];
    $this->continuar=$lista[14];
    $this->volver=$lista[15];
  }

  function producto(){
    return $this->producto;
  }

  function valor1(){
    return $this->valor1;
  }

  function valor2(){
    return $this->valor2;
  }

  function grasas1(){
    return $this->grasas1;
  }

  function grasas2(){
    return $this->grasas2;
  }

  function grasas3(){
    return $this->grasas3;
  }

  function hidratos1(){
    return $this->hidratos1;
  }

  function hidratos2(){
    return $this->hidratos2;
  }

  function hidratos3(){
    return $this->hidratos3;
  }

  function proteinas(){
    return $this->proteinas;
  }

  function sal(){
    return $this->sal;
  }

  function ingredientes(){
    return $this->ingredientes;
  }

  function alergenos(){
    return $this->alergenos;
  }

  function selecciona(){
    return $this->selecciona;
  }

  function continuar(){
    return $this->continuar;
  }

  function volver(){
    return $this->volver;
  }
}