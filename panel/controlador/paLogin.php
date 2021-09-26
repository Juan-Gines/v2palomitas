<?php 
require_once "panel/vistas/login.php";
require_once "modelo/servicios/servicios.php";
require_once "libreria/ValidarInputs.php";
class PaLogin{
  private $consulta;  

  function __construct() {
    $this->consulta=new Servicios();    
  }
  function login(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $_SESSION["user"]=ValidarInputs::input_test($_POST["user"]);
      $_SESSION["pass"]=ValidarInputs::input_test($_POST["pass"]);
      $respuesta=$this->consulta->getUser();      
      if($respuesta["login"]){
        $_SESSION["login"]=true;
        $_SESSION["errLogin"]=false;
        header("Location:{$_SERVER["PHP_SELF"]}");
        exit;
      }else{
        $_SESSION["errLogin"]="*Usuario invalido";
      }
    }
    Login::log();
  }
}