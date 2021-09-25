<?php
class Valores{
  private $producto;
  private $valorkj1;
  private $valorkcal1;
  private $grasas1;
  private $saturadas1;
  private $hidratos1;
  private $azucar1;
  private $proteina1;
  private $sal1;
  private $valorkj2;
  private $valorkcal2;
  private $grasas2;
  private $saturadas2;
  private $hidratos2;
  private $azucar2;
  private $proteina2;
  private $sal2;  
  
  

  function __construct($lista) {
    $this->producto=$lista[0];
    $this->valorkj1=$lista[1];
    $this->valorkj2=$lista[2];
    $this->valorkcal1=$lista[3];
    $this->valorkcal2=$lista[4];
    $this->grasas1=$lista[5];
    $this->grasas2=$lista[6];    
    $this->saturadas1=$lista[7];
    $this->saturadas2=$lista[8];
    $this->hidratos1=$lista[9];
    $this->hidratos2=$lista[10];
    $this->azucar1=$lista[11];
    $this->azucar2=$lista[12];
    $this->proteina1=$lista[13];
    $this->proteina2=$lista[14];    
    $this->sal1=$lista[15];    
    $this->sal2=$lista[16];    
  }

  function producto(){
    return $this->producto;
  }

  function valorkj1(){
    return $this->valorkj1;
  }

  function valorkcal1(){
    return $this->valorkcal1;
  }

  function grasas1(){
    return $this->grasas1;
  }

  function saturadas1(){
    return $this->saturadas1;
  }

  function hidratos1(){
    return $this->hidratos1;
  }

  function azucar1(){
    return $this->azucar1;
  }

  function proteina1(){
    return $this->proteina1;
  }

  function sal1(){
    return $this->sal1;
  }

  function valorkj2(){
    return $this->valorkj2;
  }

  function valorkcal2(){
    return $this->valorkcal2;
  }

  function grasas2(){
    return $this->grasas2;
  }

  function saturadas2(){
    return $this->saturadas2;
  }

  function hidratos2(){
    return $this->hidratos2;
  }

  function azucar2(){
    return $this->azucar2;
  }

  function proteina2(){
    return $this->proteina2;
  }

  function sal2(){
    return $this->sal2;
  }
}