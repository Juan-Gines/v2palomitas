<?php
require_once "panel/controlador/paLogin.php";
require_once "panel/controlador/paPanel.php";
require_once "panel/controlador/editar.php";
require_once "panel/controlador/nuevo.php";
require_once "panel/controlador/borrar.php";
if(!isset($_SESSION["login"])){
  $_SESSION["login"]=false;
  $_SESSION["editar"]=false;
  //$_SESSION["paSabor"]=false;
  $_SESSION["id"]=false;
  $_SESSION["sabor"]=false;
  $_SESSION["user"]=false;
  $_SESSION["pass"]=false;  
}
$panel=new PaPanel();
$log=new PaLogin();
$edit=new Editar();
$new=new Nuevo();
$delete=new Borrar();