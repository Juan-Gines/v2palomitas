<?php
require_once "panel/controlador/paLogin.php";
if(!isset($_SESSION["paLogin"])){
  $_SESSION["paLogin"]=false;
  $_SESSION["paIdioma"]=false;
  $_SESSION["paSabor"]=false;
  $_SESSION["user"]=false;
  $_SESSION["pass"]=false;  
}
$log=new PaLogin();