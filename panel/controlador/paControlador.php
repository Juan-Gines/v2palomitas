<?php
session_start();
require_once "panel/controlador/paInicio.php";

if(!$_SESSION["login"]){
  $log->login();
}elseif($_SESSION["login"]){
  $panel->panel();
}