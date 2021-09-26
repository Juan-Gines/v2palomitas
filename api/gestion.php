<?php
header('Content-Type:application/json; charset=utf-8');
require_once "../libreria/ValidarInputs.php";
class Gestion
{
    //Función que devuelve el formulario de idiomas
    //Los recoge de un csv
    public static function getIdiomas()
    {
        $idiomas=file_get_contents("../data/idioma/lista.csv");
        $idiomas=explode(";\r\n", $idiomas);
        $idiomas[count($idiomas)-1]=trim($idiomas[count($idiomas)-1], ";");
        foreach ($idiomas as $id) {
            $pos=strpos($id, "=");
            $idio[]=substr($id, 0, $pos);
            $abr[]=substr($id, $pos+1);
        }
        $formIdioma=["idiomas"=>$idio,"id"=>$abr];
        $listaJson=json_encode($formIdioma);
        return $listaJson;
    }

    //Función que devuelve el formulario de sabores
    //Los recoge de un csv

    public static function getListaSabores()
    {
        $sabor=file_get_contents("../data/sabores/listasab.csv");
        $sabor=explode(";\r\n", $sabor);
        $sabor[count($sabor)-1]=trim($sabor[count($sabor)-1], "; ");
        $listaJson=json_encode($sabor);
        return $listaJson;
    }
    //Función que devuelve el formulario de sabores
    //Los recoge de un csv

    public static function getSaboresId()
    {
        if (isset($_GET["id"])) {
            $_GET["id"]=ValidarInputs::input_test($_GET["id"]);
            if (self::validar($_GET["id"])) {
                $sabor=file_get_contents("../data/sabores/listasab.csv");
                $sabor=explode(";\r\n", $sabor);
                $sabor[count($sabor)-1]=trim($sabor[count($sabor)-1], ";");
                foreach ($sabor as $sab) {
                    $saborid=file_get_contents("../data/sabores/".$sab.".csv");
                    $saborid=explode(";\r\n", $saborid);
                    $saborid[count($saborid)-1]=trim($saborid[count($saborid)-1], ";");
                    $posArray=array_search("<".$_GET["id"].">", $saborid);
                    $pos=strpos($saborid[$posArray+1], "-");
                    $result=substr($saborid[$posArray+1], $pos+1);
                    $resultado[]=$result;
                }
                $listaJson=json_encode($resultado);
                return $listaJson;
            }
        }
    }

    //Funcion validar idiomas o sabores

    public static function validar($id="", $sab="")
    {
        $valido=false;
        if (!empty($id)) {
            $idiomas=self::getIdiomas();
            $idiomas=json_decode($idiomas, true);
            foreach ($idiomas["id"] as $idioma) {
                if ($idioma==$id) {
                    $valido=true;
                    break;
                }
            }
        }
        if (!empty($sab)) {
            $sabor=self::getListaSabores();
            $sabor=json_decode($sabor, true);
            foreach ($sabor as $s) {
                if ($sab==$s) {
                    $valido=true;
                    break;
                }
            }
        }
        return $valido;
    }

    //Funcion que saca las cabeceras, los titulos y los valores
    //que van a ir en la tabla final a mostrar

    //necesita el tag del idioma, devuelve la lista cabeceras
    public static function getCabezeras()
    {
        if (isset($_GET["id"])) {
            $_GET["id"]=ValidarInputs::input_test($_GET["id"]);
            if (self::validar($_GET["id"])) {
                $tablaid=file_get_contents("../data/idioma/".$_GET["id"].".csv");
                $tablaid=explode(";\r\n", $tablaid);
                $tablaid[count($tablaid)-1]=trim($tablaid[count($tablaid)-1], ";");
                foreach ($tablaid as $ti) {
                    $pos=strpos($ti, "=");
                    $tabcap[]=substr($ti, $pos+1);
                }
                $listaJson=json_encode($tabcap);
                return $listaJson;
            }
        }
    }

    //necesita el tag del idioma y el nombre del sabor, devuelve la lista titulos
    public static function getTitulos()
    {
        if (isset($_GET["id"])&&isset($_GET["sabor"])) {
            $_GET["id"]=ValidarInputs::input_test($_GET["id"]);
            $_GET["sabor"]=ValidarInputs::input_test($_GET["sabor"]);
            if (self::validar($_GET["id"])&&self::validar("", $_GET["sabor"])) {
                $saborid=file_get_contents("../data/sabores/".$_GET["sabor"].".csv");
                $saborid=explode(";\r\n", $saborid);
                $saborid[count($saborid)-1]=trim($saborid[count($saborid)-1], ";");
                $posArray=array_search("<".$_GET["id"].">", $saborid);
                for ($i=$posArray+1;$i<$posArray+4;$i++) {
                    $pos=strpos($saborid[$i], "=");
                    $titulos[]=substr($saborid[$i], $pos+1);
                }
                $listaJson=json_encode($titulos);
                return $listaJson;
            }
        }
    }

    //necesita el nombre del sabor, devuelve la lista valores
    public static function getValores()
    {
        if (isset($_GET["sabor"])) {
            $_GET["sabor"]=ValidarInputs::input_test($_GET["sabor"]);
            if (self::validar("", $_GET["sabor"])) {
                $saborval=file_get_contents("../data/valores/val".ucfirst($_GET["sabor"]).".csv");
                $saborval=explode(";\r\n", $saborval);
                $saborval[count($saborval)-1]=trim($saborval[count($saborval)-1], ";");
                foreach ($saborval as $val) {
                    $pos=strpos($val, "=");
                    $valores[]=substr($val, $pos+1);
                }
                $listaJson=json_encode($valores);
                return $listaJson;
            }
        }
    }

    public static function getLogin(){
      if (isset($_GET["user"])&&isset($_GET["pass"])){
        $_GET["user"]=ValidarInputs::input_test($_GET["user"]);
        $_GET["pass"]=ValidarInputs::input_test($_GET["pass"]);
        $usuarios=file_get_contents("../data/usuarios/users.csv");
        $usuarios=explode(";\r\n", $usuarios);
        $usuarios[count($usuarios)-1]=trim($usuarios[count($usuarios)-1], ";");
        foreach ($usuarios as $val) {
          $pos=strpos($val, "=");
          $user=substr($val,0,$pos);
          $pass=substr($val, $pos+1);
          if($user==$_GET["user"]&&password_verify($_GET["pass"],$pass)){
            $login=["login"=>true];
            $listaJson=json_encode($login);
            return $listaJson;
          }
        }
      }
      $login=["login"=>false];
      $listaJson=json_encode($login);
      return $listaJson;
    }
}

      
