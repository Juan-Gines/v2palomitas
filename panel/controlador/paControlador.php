<?php
session_start();
require_once "panel/controlador/paInicio.php";
if(!$_SESSION["paLogin"]){
  $log->login();
}