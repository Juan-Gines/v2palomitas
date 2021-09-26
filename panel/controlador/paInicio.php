<?php
require_once "panel/controlador/paLogin.php";
require_once "panel/controlador/paPanel.php";
if(!isset($_SESSION["login"])){
  $_SESSION["login"]=false;
  $_SESSION["paIdioma"]=false;
  $_SESSION["paSabor"]=false;
  $_SESSION["id"]=false;
  $_SESSION["sabor"]=false;
  $_SESSION["user"]=false;
  $_SESSION["pass"]=false;  
}
$panel=new PaPanel();
$log=new PaLogin();