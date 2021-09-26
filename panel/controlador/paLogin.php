<?php 
require_once "panel/vistas/login.php";
require_once "modelo/servicios/servicios.php";
require_once "libreria/ValidarInputs.php";
class PaLogin{
  private $consulta;
  private $user;

  function __construct() {
    $this->consulta=new Servicios();
    $this->user="";
  }
  function login(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $_SESSION["user"]=ValidarInputs::input_test($_POST["user"]);
      $_SESSION["pass"]=ValidarInputs::input_test($_POST["pass"]);
      $respuesta=$this->consulta->getUser();      
      if($respuesta["login"]){
        $_SESSION["login"]=true;
        $_SESSION["errLogin"]=false;
      }else{
        $_SESSION["errLogin"]="*Usuario invalido";
      }
    }
    Login::log();
  }
}