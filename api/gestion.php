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
                    $pos=strpos($saborid[$posArray+1], "=");
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

		//función que controla si estas logueado
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

		//funcíon que modifica el idioma
		public static function putIdioma(){			
			$strJson=file_get_contents('php://input');
			$data=json_decode($strJson,true);			
			$_GET["user"]=$data["user"];
			$_GET["pass"]=$data["pass"];
			$paso=Gestion::getLogin();
			$paso=json_decode($paso,true);
			if ($paso["login"]) {
				$idiomas=Gestion::getIdiomas();
				$idiomas=json_decode($idiomas,true);
				$sabores=Gestion::getListaSabores();
				$sabores=json_decode($sabores,true);
				$pos=array_search($data["idVieja"],$idiomas["id"]);
				$idiomas["idiomas"][$pos]=$data["idioma"];
				$idiomas["id"][$pos]=$data["codigo"];								
				$string="";
				for($i=0;$i<count($idiomas["id"]);$i++){
					if($i==count($idiomas["id"])-1){
						$string.=$idiomas["idiomas"][$i]."=".$idiomas["id"][$i].";";
					}else{
						$string.=$idiomas["idiomas"][$i]."=".$idiomas["id"][$i].";\r\n";
					}
				}				
				file_put_contents('../data/idioma/lista.csv',$string);
				$string="producto={$data["producto"]};\r\n".
					"Valor energético  (kJ)={$data["valor1"]};\r\n".
					"Valor energético  (Kcal)={$data["valor2"]};\r\n".
					"Grasas (g)={$data["grasas1"]};\r\n".
					"de las cuales:={$data["grasas2"]};\r\n".
					"Saturadas  (g):={$data["grasas3"]};\r\n".
					"Hidratos de carbono:={$data["hidratos1"]};\r\n".
					"de los cuales:={$data["hidratos2"]};\r\n".
					"Azúcares (g):={$data["hidratos3"]};\r\n".
					"Proteinas (g):={$data["proteinas"]};\r\n".
					"Sal (g): ={$data["sal"]};\r\n".
					"Ingredientes={$data["ingredientes"]};\r\n".
					"Alérgenos={$data["alergenos"]};\r\n".
					"Seleccione el sabor={$data["selecciona"]};\r\n".
					"Continuar={$data["continuar"]};\r\n".
					"Volver={$data["volver"]};";
				file_put_contents('../data/idioma/'.$data["codigo"].'.csv',$string);
				
				foreach($sabores as $sab){
					$saborid=file_get_contents("../data/sabores/".$sab.".csv");
					$saborid=explode(";\r\n", $saborid);
					$saborid[count($saborid)-1]=trim($saborid[count($saborid)-1], ";");
					$posArray=array_search("<".$data["idVieja"].">", $saborid);
					$saborid[$posArray]="<".$data["codigo"].">";
					$saborid[$posArray+1]="Título=".$data["tit".$sab];
					$saborid[$posArray+2]="Ingredientes=".$data["ing".$sab];
					$saborid[$posArray+3]="Alérgenos=".$data["ale".$sab];
					$string=implode(";\r\n",$saborid);
					$string=rtrim($string,";\r\n").";";					
					file_put_contents('../data/sabores/'.$sab.'.csv',$string);					
				}
				$resultado=["result"=>true];
				$listaJson=json_encode($resultado);
				return $listaJson;				
			}else{
				$resultado=["result"=>false];
				$listaJson=json_encode($resultado);
				return $listaJson;
			}			 
		}
		
		public static function postIdioma(){
				$strJson=file_get_contents('php://input');
				$data=json_decode($strJson,true);			
				$_GET["user"]=$data["user"];
				$_GET["pass"]=$data["pass"];
				$paso=Gestion::getLogin();
				$paso=json_decode($paso,true);
				if ($paso["login"]) {
					$idiomas=Gestion::getIdiomas();
					$idiomas=json_decode($idiomas,true);
					$sabores=Gestion::getListaSabores();
					$sabores=json_decode($sabores,true);
					$enlace=fopen("../data/idioma/lista.csv", "a");
					fwrite($enlace,"\r\n{$data["idioma"]}={$data["codigo"]};");
					fclose($enlace);
					$string="producto={$data["producto"]};\r\n".
						"Valor energético  (kJ)={$data["valor1"]};\r\n".
						"Valor energético  (Kcal)={$data["valor2"]});\r\n".
						"Grasas (g)={$data["grasas1"]};\r\n".
						"de las cuales:={$data["grasas2"]};\r\n".
						"Saturadas  (g):={$data["grasas3"]};\r\n".
						"Hidratos de carbono:={$data["hidratos1"]};\r\n".
						"de los cuales:={$data["hidratos2"]};\r\n".
						"Azúcares (g):={$data["hidratos3"]};\r\n".
						"Proteinas (g):={$data["proteinas"]};\r\n".
						"Sal (g): ={$data["sal"]};\r\n".
						"Ingredientes={$data["ingredientes"]};\r\n".
						"Alérgenos={$data["alergenos"]};\r\n".
						"Seleccione el sabor={$data["selecciona"]};\r\n".
						"Continuar={$data["continuar"]};\r\n".
						"Volver={$data["volver"]};";
					file_put_contents('../data/idioma/'.$data["codigo"].'.csv',$string);
					$string="";
					foreach($sabores as $sab){
						$string="\r\n<".$data["codigo"].">;\r\n".
							"Título=".$data["tit".$sab].";\r\n".
							"Ingredientes=".$data["ing".$sab].";\r\n".
							"Alérgenos=".$data["ale".$sab].";";					
						$enlace=fopen('../data/sabores/'.$sab.'.csv', "a");
						fwrite($enlace,$string);
						fclose($enlace);					
					}
				$resultado=["result"=>true];
				$listaJson=json_encode($resultado);
				return $listaJson;				
			}
				$resultado=["result"=>false];
				$listaJson=json_encode($resultado);
				return $listaJson;			
		}

				//funcíon que modifica el sabor
		public static function putSabor(){			
			$strJson=file_get_contents('php://input');
			$data=json_decode($strJson,true);			
			$_GET["user"]=$data["user"];
			$_GET["pass"]=$data["pass"];
			$paso=Gestion::getLogin();
			$paso=json_decode($paso,true);
			if ($paso["login"]) {
				$idiomas=Gestion::getIdiomas();
				$idiomas=json_decode($idiomas,true);
				$sabores=Gestion::getListaSabores();
				$sabores=json_decode($sabores,true);
				$pos=array_search($data["saborViejo"],$sabores);
				$sabores[$pos]=$data["codigo"];												
				$string="";
				for($i=0;$i<count($sabores);$i++){
					if($i==count($sabores)-1){
						$string.=$sabores[$i].";";
					}else{
						$string.=$sabores[$i].";\r\n";
					}
				}				
				file_put_contents('../data/sabores/listasab.csv',$string);
				$string="producto={$data["producto"]};\r\n".
					"Valor energético  (kJ)100={$data["valorkj1"]};\r\n".
					"Valor energético  (kJ)32={$data["valorkj2"]};\r\n".
					"Valor energético  (kcal)100={$data["valorkcal1"]};\r\n".
					"Valor energético  (kcal)32={$data["valorkcal2"]};\r\n".
					"Grasas (g)100={$data["grasas1"]};\r\n".
					"Grasas (g)32={$data["grasas2"]};\r\n".
					"Saturadas  (g)100={$data["saturadas1"]};\r\n".
					"Saturadas  (g)32={$data["saturadas2"]};\r\n".
					"Hidratos de carbono:100={$data["hidratos1"]};\r\n".
					"Hidratos de carbono:32={$data["hidratos2"]};\r\n".					
					"Azúcares (g):100={$data["azucar1"]};\r\n".
					"Azúcares (g):32={$data["azucar2"]};\r\n".
					"Proteinas (g):100={$data["proteina1"]};\r\n".
					"Proteinas (g):32={$data["proteina2"]};\r\n".
					"Sal (g):100 ={$data["sal1"]};\r\n".
					"Sal (g):32 ={$data["sal2"]};";					
				file_put_contents('../data/valores/val'.ucfirst($data["codigo"]).'.csv',$string);				
				
				$saborid=file_get_contents("../data/sabores/".$data["saborViejo"].".csv");
				$saborid=explode(";\r\n", $saborid);
				$saborid[count($saborid)-1]=trim($saborid[count($saborid)-1], ";");	
				$j=0;				
				for ($i=0;$i<count($saborid);$i+=4) {
						$saborid[$i]="<".$idiomas["id"][$j].">";
						$saborid[$i+1]="Título=".$data["tit".$idiomas["id"][$j]];
						$saborid[$i+2]="Ingredientes=".$data["ing".$idiomas["id"][$j]];
						$saborid[$i+3]="Alérgenos=".$data["ale".$idiomas["id"][$j]];
						$j++;
				}
				$string=implode(";\r\n",$saborid);
				$string=rtrim($string,";\r\n").";";					
				file_put_contents('../data/sabores/'.$data["codigo"].'.csv',$string);					
				
				$resultado=["result"=>true];
				$listaJson=json_encode($resultado);
				return $listaJson;				
			}else{
				$resultado=["result"=>false];
				$listaJson=json_encode($resultado);
				return $listaJson;
			}			 
		}

			//funcion que crea un nuevo sabor
		public static function postSabor(){
				$strJson=file_get_contents('php://input');
				$data=json_decode($strJson,true);			
				$_GET["user"]=$data["user"];
				$_GET["pass"]=$data["pass"];
				$paso=Gestion::getLogin();
				$paso=json_decode($paso,true);
				if ($paso["login"]) {
					$idiomas=Gestion::getIdiomas();
					$idiomas=json_decode($idiomas,true);
					$sabores=Gestion::getListaSabores();
					$sabores=json_decode($sabores,true);
					$enlace=fopen("../data/sabores/listasab.csv", "a");
					fwrite($enlace,"\r\n{$data["codigo"]};");
					fclose($enlace);
					$string="producto={$data["producto"]};\r\n".
					"Valor energético  (kJ)100={$data["valorkj1"]};\r\n".
					"Valor energético  (kJ)32={$data["valorkj2"]};\r\n".
					"Valor energético  (kcal)100={$data["valorkcal1"]};\r\n".
					"Valor energético  (kcal)32={$data["valorkcal2"]};\r\n".
					"Grasas (g)100={$data["grasas1"]};\r\n".
					"Grasas (g)32={$data["grasas2"]};\r\n".
					"Saturadas  (g)100={$data["saturadas1"]};\r\n".
					"Saturadas  (g)32={$data["saturadas2"]};\r\n".
					"Hidratos de carbono:100={$data["hidratos1"]};\r\n".
					"Hidratos de carbono:32={$data["hidratos2"]};\r\n".					
					"Azúcares (g):100={$data["azucar1"]};\r\n".
					"Azúcares (g):32={$data["azucar2"]};\r\n".
					"Proteinas (g):100={$data["proteina1"]};\r\n".
					"Proteinas (g):32={$data["proteina2"]};\r\n".
					"Sal (g):100 ={$data["sal1"]};\r\n".
					"Sal (g):32 ={$data["sal2"]};";					
					file_put_contents('../data/valores/val'.ucfirst($data["codigo"]).'.csv',$string);

					$j=0;				
				for ($i=0;$i<count($idiomas["id"])*4;$i+=4) {
						$saborid[$i]="<".$idiomas["id"][$j].">";
						$saborid[$i+1]="Título=".$data["tit".$idiomas["id"][$j]];
						$saborid[$i+2]="Ingredientes=".$data["ing".$idiomas["id"][$j]];
						$saborid[$i+3]="Alérgenos=".$data["ale".$idiomas["id"][$j]];
						$j++;
				}
				$string=implode(";\r\n",$saborid);
				$string=rtrim($string,";\r\n").";";					
				file_put_contents('../data/sabores/'.$data["codigo"].'.csv',$string);
					
				$resultado=["result"=>true];
				$listaJson=json_encode($resultado);
				return $listaJson;				
			}
				$resultado=["result"=>false];
				$listaJson=json_encode($resultado);
				return $listaJson;			
		}

		public static function deleteIdioma(){
			if (isset($_GET["user"])&&isset($_GET["pass"])&&isset($_GET["idioma"])) {
				$_GET["user"]=ValidarInputs::input_test($_GET["user"]);
				$_GET["pass"]=ValidarInputs::input_test($_GET["pass"]);
				$id=ValidarInputs::input_test($_GET["idioma"]);
				$paso=Gestion::getLogin();
				$paso=json_decode($paso,true);
				if ($paso["login"]) {
					unlink("../data/idioma/{$id}.csv");

					$idiomas=Gestion::getIdiomas();
					$idiomas=json_decode($idiomas,true);
					$sabores=Gestion::getListaSabores();
					$sabores=json_decode($sabores,true);
					$pos=array_search($id,$idiomas["id"]);
					unset($idiomas["idiomas"][$pos]);
					unset($idiomas["id"][$pos]);														
					$string="";
					foreach($idiomas["idiomas"] as $key=>$idioma){								
						$string.=$idioma."=".$idiomas["id"][$key].";\r\n";
					}							
					$string=rtrim($string,";\r\n").";";
					file_put_contents("../data/idioma/lista.csv",$string);

					foreach($sabores as $sab){
						$saborid=file_get_contents("../data/sabores/".$sab.".csv");
						$saborid=explode(";\r\n", $saborid);
						$saborid[count($saborid)-1]=trim($saborid[count($saborid)-1], ";");
						$posArray=array_search("<".$id.">", $saborid);
						unset($saborid[$posArray]);
						unset($saborid[$posArray+1]);
						unset($saborid[$posArray+2]);
						unset($saborid[$posArray+3]);
						$string=implode(";\r\n",$saborid);
						$string=rtrim($string,";\r\n").";";					
						file_put_contents('../data/sabores/'.$sab.'.csv',$string);					
					}
					$resultado=["result"=>true];
					$listaJson=json_encode($resultado);
					return $listaJson;				
				}else{
					$resultado=["result"=>false];
					$listaJson=json_encode($resultado);
					return $listaJson;
				}			
			}
		}
		

		public static function deleteSabor(){
			if (isset($_GET["user"])&&isset($_GET["pass"])&&isset($_GET["sabor"])) {
				$_GET["user"]=ValidarInputs::input_test($_GET["user"]);
				$_GET["pass"]=ValidarInputs::input_test($_GET["pass"]);
				$sabor=ValidarInputs::input_test($_GET["sabor"]);
				$paso=Gestion::getLogin();
				$paso=json_decode($paso,true);
				if ($paso["login"]) {
					unlink("../data/sabores/{$sabor}.csv");
					unlink("../data/valores/val".ucfirst($sabor).".csv");
					
					$sabores=Gestion::getListaSabores();
					$sabores=json_decode($sabores,true);

					$pos=array_search($sabor,$sabores);
					unset($sabores[$pos]);
					$string=implode(";\r\n",$sabores);
					$string=rtrim($string,";\r\n").";";					
					file_put_contents('../data/sabores/listasab.csv',$string);

					$resultado=["result"=>true];
					$listaJson=json_encode($resultado);
					return $listaJson;
				}else{
					$resultado=["result"=>false];
					$listaJson=json_encode($resultado);
					return $listaJson;
				}
			}
		}
}


      
