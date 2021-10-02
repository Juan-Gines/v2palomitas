<?php
require_once "modelo/servicios/servicios.php";
require_once "panel/vistas/editaIdioma.php";
class Nuevo{
  private $consulta; 

  function __construct() {
    $this->consulta=new Servicios();    
  }

  function idioma(){         
    $_SESSION["id"]="es";    
    $saborEsp=$this->consulta->getSaborId();
    $saboresLista=$this->consulta->getListaSabores();
    $_SESSION["editar"]=false;     
    EditaIdioma::editaIdioma($saborEsp,$saboresLista);  
  }

  function sabor(){
    $_SESSION["id"]="es";    
    $idiomas=$this->consulta->getIdiomas();    
    $_SESSION["editar"]=false;     
    EditaSabor::editaSabor($idiomas->listado(),$idiomas->ids());    
  }

  function postIdioma(){
    $idiomas=$this->consulta->getIdiomas();
    $_SESSION["id"]="es";
    $saborEsp=$this->consulta->getSaborId();
    $saboresLista=$this->consulta->getListaSabores();
    if ($_SESSION["idrand"]==$_POST["idrand"]) {       
        if (!in_array($_POST["codigo"], $idiomas->ids())) {
            foreach ($_POST as $key => $value) {
                $_POST[$key]=(!empty($value))? ValidarInputs::input_test($value):"";
            }
            !empty($_POST["codigo"])?$recupera["codigo"]=$_POST["codigo"]:$recupera["er_codigo"]="*Campo vacio";
            !empty($_POST["idioma"])?$recupera["idioma"]=$_POST["idioma"]:$recupera["er_idioma"]="*Campo vacio";
            foreach ($saboresLista->listado() as $sab) {
                !empty($_POST["tit".$sab])?$recupera["tit".$sab]=$_POST["tit".$sab]:$recupera["er_tit".$sab]="*Campo vacio";
                !empty($_POST["ing".$sab])?$recupera["ing".$sab]=$_POST["ing".$sab]:$recupera["er_ing".$sab]="*Campo vacio";
                !empty($_POST["ale".$sab])?$recupera["ale".$sab]=$_POST["ale".$sab]:$recupera["er_ale".$sab]="*Campo vacio";
            }
            !empty($_POST["producto"])?$recupera["producto"]=$_POST["producto"]:$recupera["er_producto"]="*Campo vacio";
            !empty($_POST["valor1"])?$recupera["valor1"]=$_POST["valor1"]:$recupera["er_valor1"]="*Campo vacio";
            !empty($_POST["valor2"])?$recupera["valor2"]=$_POST["valor2"]:$recupera["er_valor2"]="*Campo vacio";
            !empty($_POST["grasas1"])?$recupera["grasas1"]=$_POST["grasas1"]:$recupera["er_grasas1"]="*Campo vacio";
            !empty($_POST["grasas2"])?$recupera["grasas2"]=$_POST["grasas2"]:$recupera["er_grasas2"]="*Campo vacio";
            !empty($_POST["grasas3"])?$recupera["grasas3"]=$_POST["grasas3"]:$recupera["er_grasas3"]="*Campo vacio";
            !empty($_POST["hidratos1"])?$recupera["hidratos1"]=$_POST["hidratos1"]:$recupera["er_hidratos1"]="*Campo vacio";
            !empty($_POST["hidratos2"])?$recupera["hidratos2"]=$_POST["hidratos2"]:$recupera["er_hidratos2"]="*Campo vacio";
            !empty($_POST["hidratos3"])?$recupera["hidratos3"]=$_POST["hidratos3"]:$recupera["er_hidratos3"]="*Campo vacio";
            !empty($_POST["proteinas"])?$recupera["proteinas"]=$_POST["proteinas"]:$recupera["er_proteinas"]="*Campo vacio";
            !empty($_POST["sal"])?$recupera["sal"]=$_POST["sal"]:$recupera["er_sal"]="*Campo vacio";
            !empty($_POST["ingredientes"])?$recupera["ingredientes"]=$_POST["ingredientes"]:$recupera["er_ingredientes"]="*Campo vacio";
            !empty($_POST["alergenos"])?$recupera["alergenos"]=$_POST["alergenos"]:$recupera["er_alergenos"]="*Campo vacio";
            !empty($_POST["selecciona"])?$recupera["selecciona"]=$_POST["selecciona"]:$recupera["er_selecciona"]="*Campo vacio";
            !empty($_POST["continuar"])?$recupera["continuar"]=$_POST["continuar"]:$recupera["er_continuar"]="*Campo vacio";
					  !empty($_POST["volver"])?$recupera["volver"]=$_POST["volver"]:$recupera["er_volver"]="*Campo vacio";
            $error=false;
            foreach ($recupera as $key=>$valor) {
                $key=substr($key, 0, 3);
                if ($key=="er_") {
                    $error=true;
                    break;
                }
            }
            if (!$error) {
                $resultado=$this->consulta->postIdioma($recupera);
                if ($resultado["result"]) {
                    header("Location:".$_SERVER["PHP_SELF"]);
                    exit;
                }
            }
        }
    }
    if(!isset($recupera)){
      EditaIdioma::editaIdioma($saborEsp,$saboresLista);
    }else{
        EditaIdioma::editaIdioma($saborEsp, $saboresLista, [], $recupera);
    }
  }

    public function postSabor()
    {			      
      $idiomas=$this->consulta->getIdiomas();
      if ($_SESSION["idrand"]==$_POST["idrand"]) {				                   
          foreach ($_POST as $key => $value) {
              $_POST[$key]=(!empty($value))? ValidarInputs::input_test($value):"";
          }
          !empty($_POST["codigo"])?$recupera["codigo"]=$_POST["codigo"]:$recupera["er_codigo"]="*Campo vacio";
          !empty($_POST["titSabor"])?$recupera["titSabor"]=$_POST["titSabor"]:$recupera["er_titSabor"]="*Campo vacio";
          foreach ($idiomas->ids() as $id) {
              !empty($_POST["tit".$id])?$recupera["tit".$id]=$_POST["tit".$id]:$recupera["er_tit".$id]="*Campo vacio";
              !empty($_POST["ing".$id])?$recupera["ing".$id]=$_POST["ing".$id]:$recupera["er_ing".$id]="*Campo vacio";
              !empty($_POST["ale".$id])?$recupera["ale".$id]=$_POST["ale".$id]:$recupera["er_ale".$id]="*Campo vacio";
          }
          !empty($_POST["producto"])?$recupera["producto"]=$_POST["producto"]:$recupera["er_producto"]="*Campo vacio";
          !empty($_POST["valorkj1"])?$recupera["valorkj1"]=$_POST["valorkj1"]:$recupera["er_valorkj1"]="*Campo vacio";
          !empty($_POST["valorkj2"])?$recupera["valorkj2"]=$_POST["valorkj2"]:$recupera["er_valorkj2"]="*Campo vacio";
          !empty($_POST["valorkcal1"])?$recupera["valorkcal1"]=$_POST["valorkcal1"]:$recupera["er_valorkcal1"]="*Campo vacio";
          !empty($_POST["valorkcal2"])?$recupera["valorkcal2"]=$_POST["valorkcal2"]:$recupera["er_valorkcal2"]="*Campo vacio";
          !empty($_POST["grasas1"])?$recupera["grasas1"]=$_POST["grasas1"]:$recupera["er_grasas1"]="*Campo vacio";
          !empty($_POST["grasas2"])?$recupera["grasas2"]=$_POST["grasas2"]:$recupera["er_grasas2"]="*Campo vacio";
          !empty($_POST["saturadas1"])?$recupera["saturadas1"]=$_POST["saturadas1"]:$recupera["er_saturadas1"]="*Campo vacio";
          !empty($_POST["saturadas2"])?$recupera["saturadas2"]=$_POST["saturadas2"]:$recupera["er_saturadas2"]="*Campo vacio";
          !empty($_POST["hidratos1"])?$recupera["hidratos1"]=$_POST["hidratos1"]:$recupera["er_hidratos1"]="*Campo vacio";
          !empty($_POST["hidratos2"])?$recupera["hidratos2"]=$_POST["hidratos2"]:$recupera["er_hidratos2"]="*Campo vacio";
          !empty($_POST["azucar1"])?$recupera["azucar1"]=$_POST["azucar1"]:$recupera["er_azucar1"]="*Campo vacio";
          !empty($_POST["azucar2"])?$recupera["azucar2"]=$_POST["azucar2"]:$recupera["er_azucar2"]="*Campo vacio";
          !empty($_POST["proteina1"])?$recupera["proteina1"]=$_POST["proteina1"]:$recupera["er_proteina1"]="*Campo vacio";
          !empty($_POST["proteina2"])?$recupera["proteina2"]=$_POST["proteina2"]:$recupera["er_proteina2"]="*Campo vacio";
          !empty($_POST["sal1"])?$recupera["sal1"]=$_POST["sal1"]:$recupera["er_sal1"]="*Campo vacio";
          !empty($_POST["sal2"])?$recupera["sal2"]=$_POST["sal2"]:$recupera["er_sal2"]="*Campo vacio";          
          $error=false;
          foreach ($recupera as $key=>$valor) {
              $key=substr($key,0, 3);
              if ($key=="er_") {
                  $error=true;
                  break;
              }
          }					
          if (!$error) {						
              $resultado=$this->consulta->postSabor($recupera);              
              if($resultado["result"]){
								$_SESSION["editar"]=false;
                header("Location:".$_SERVER["PHP_SELF"]);
                exit;
              }
          }
      }
      if(!isset($recupera)){
        EditaSabor::editaSabor($idiomas->listado(),$idiomas->ids());
      }else{				
          EditaSabor::editaSabor($idiomas->listado(), $idiomas->ids(), [], $recupera);
      }              
    }
}