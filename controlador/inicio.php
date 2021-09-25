<?php
require_once "controlador/formIdiomas.php";
require_once "controlador/formSabores.php";
require_once "controlador/tabla.php";
if(!isset($_SESSION["id"])){
  $_SESSION["id"]=false;
  $_SESSION["sabor"]=false;
}
$formIdiomas=new FormIdiomas();
$formSabores=new FormSabores();
$tabla=new Tabla();
