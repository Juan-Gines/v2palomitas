<?php
require_once "modelo/idiomas.php";
require_once "modelo/cabeceras.php";
require_once "modelo/titulos.php";
require_once "modelo/valores.php";
require_once "modelo/saboresId.php";
require_once "modelo/listaSabores.php";
require_once "libreria/Contexto.php";
class Servicios{
  private $cabeceras;
  private $titulos;
  private $idiomas;
  private $saboresId;
  private $valores;
  private $listaSabores;  
  private $url="http://localhost/cursophp/palomitas/v2palomitas/api/palomitas.php";

  function getIdiomas(){        
    $resultado=file_get_contents($this->url."?lista");
    $result=json_decode($resultado,true);
    $this->idiomas=new Idiomas($result);
    return $this->idiomas;
  }

  function getListaSabores(){    
    $resultado=file_get_contents($this->url."?listasabores");
    $result=json_decode($resultado,true);
    $this->listaSabores=new ListaSabores($result);
    return $this->listaSabores;
  }
  
  function getSaborId(){
    $resultado=file_get_contents($this->url."?sabores&id=".$_SESSION["id"]);
    $result=json_decode($resultado,true);
    $this->saboresId=new SaboresId($result);
    return $this->saboresId;
  }

  function getCabeceras(){
    $resultado=file_get_contents($this->url."?cabeceras&id=".$_SESSION["id"]);
    $result=json_decode($resultado,true);
    $this->cabeceras=new Cabeceras($result);
    return $this->cabeceras;
  }

  function getTitulos(){    
    $resultado=file_get_contents($this->url."?titulos&id=".$_SESSION["id"]."&sabor=".$_SESSION["sabor"]);
    $result=json_decode($resultado,true);    
    $this->titulos=new Titulos($result);
    return $this->titulos;
  }

  function getValores(){
    $resultado=file_get_contents($this->url."?valores&sabor=".$_SESSION["sabor"]);
    $result=json_decode($resultado,true);
    $this->valores=new Valores($result);
    return $this->valores;
  }

  function getUser(){
    $resultado=file_get_contents($this->url."?login&user=".$_SESSION["user"]."&pass=".$_SESSION["pass"]);
    $result=json_decode($resultado,true);    
    return $result;
  }

  function putIdioma($recupera){
    $recupera["user"]=$_SESSION["user"];
    $recupera["pass"]=$_SESSION["pass"];
    $recupera["idVieja"]=$_SESSION["id"];    
    $contexto=Contexto::contexto('put',$recupera);
    $resultado=file_get_contents($this->url."?idioma",false,$contexto);    
    $result=json_decode($resultado,true);    
    return $result;
  }

  function postIdioma($recupera){    
    $recupera["user"]=$_SESSION["user"];
    $recupera["pass"]=$_SESSION["pass"];    
    $contexto=Contexto::contexto('post',$recupera);
    $resultado=file_get_contents($this->url."?idioma",false,$contexto);   
    $result=json_decode($resultado,true);    
    return $result;
  }

  function putSabor($recupera){
    $recupera["user"]=$_SESSION["user"];
    $recupera["pass"]=$_SESSION["pass"];
    $recupera["saborViejo"]=$_SESSION["sabor"];    
    $contexto=Contexto::contexto('put',$recupera);
    $resultado=file_get_contents($this->url."?sabor",false,$contexto);    
    $result=json_decode($resultado,true);    
    return $result;
  }
}