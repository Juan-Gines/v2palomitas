<?php
header('Content-Type:application/json; charset=utf-8');
require_once "../libreria/ValidarInputs.php";
class Gestion{
      //Función que devuelve el formulario de idiomas
      //Los recoge de un csv
  static function getIdiomas(){
    $idiomas=file_get_contents("../data/idioma/lista.csv");
    $idiomas=explode(";\r\n",$idiomas);
    $idiomas[count($idiomas)-1]=trim($idiomas[count($idiomas)-1],";");
    foreach($idiomas as $id){
      $pos=strpos($id,"=");
      $idio[]=substr($id,0,$pos);
      $abr[]=substr($id,$pos+1);
    }
    $formIdioma=["idiomas"=>$idio,"id"=>$abr];
    $listaJson=json_encode($formIdioma);
    return $listaJson;
  }

  //Función que devuelve el formulario de sabores
  //Los recoge de un csv

  static function getListaSabores(){
    $sabor=file_get_contents("../data/sabores/listasab.csv");
    $sabor=explode(";\r\n", $sabor);
    $sabor[count($sabor)-1]=trim($sabor[count($sabor)-1], "; ");
    $listaJson=json_encode($sabor);
    return $listaJson;
  }
  //Función que devuelve el formulario de sabores
  //Los recoge de un csv

  static function getSaboresId(){
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

  static function validar($id="",$sab=""){
    $valido=false;
    if(!empty($id)){
      $idiomas=self::getIdiomas();
      $idiomas=json_decode($idiomas,true);
      foreach($idiomas["id"] as $idioma){
        if($idioma==$id){
          $valido=true;
          break;
        }
      }
    }
    if(!empty($sab)){
      $sabor=self::getListaSabores();
      $sabor=json_decode($sabor,true);
      foreach($sabor as $s){
        if($sab==$s){
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
  static function getCabezeras(){
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
  static function getTitulos(){
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
  static function getValores(){
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

      //Función que imprime la tabla rellenandola con las listas
      //titulos,cabeceras y valores.
  function rellena_tabla($tit,$cab,$val){
      ?>
          <main class="container-sm mb-5" style="max-width: 800px;">
              <div class="table-responsive-sm mb-3">
                  <table class="table table-striped align-middle ">
                      <thead class="table-dark align-middle">
                          <tr>
                              <th scope="col" class="h4"><?=$tit[0]?></th>
                              <th scope="col">100gr</th>
                              <th scope="col">32gr</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="fw-bold"><?=$cab[0]?></td>
                              <td><?=$val[0]?></td>
                              <td><?=$val[0]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold"><?=$cab[1]?></td>
                              <td><?=$val[1]?></td>
                              <td><?=$val[2]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold"><?=$cab[2]?></td>
                              <td><?=$val[3]?></td>
                              <td><?=$val[4]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold border-bottom-0" ><?=$cab[3]?></td>
                              <td class="border-bottom-0"><?=$val[5]?></td>
                              <td class="border-bottom-0"><?=$val[6]?></td>
                          </tr>
                          <tr>
                              <td  class="border-bottom-0 ps-3" colspan="3"><?=$cab[4]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold text-center"><?=$cab[5]?></td>
                              <td><?=$val[7]?></td>
                              <td><?=$val[8]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold border-bottom-0"><?=$cab[6]?></td>
                              <td class="border-bottom-0"><?=$val[9]?></td>
                              <td class="border-bottom-0"><?=$val[10]?></td>
                          </tr>
                          <tr>
                              <td class="border-bottom-0 ps-3" colspan="3"><?=$cab[7]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold text-center"><?=$cab[8]?></td>
                              <td><?=$val[11]?></td>
                              <td><?=$val[12]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold"><?=$cab[9]?></td>
                              <td><?=$val[13]?></td>
                              <td><?=$val[14]?></td>
                          </tr>
                          <tr>
                              <td class="fw-bold"><?=$cab[10]?></td>
                              <td><?=$val[15]?></td>
                              <td><?=$val[16]?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <section>
                  <article>
                      <label for="ing" class="fw-bold"><?=$cab[11]?></label>
                      <p id="ing" class="ps-3"><?=$tit[1]?></p>
                  </article>
                  <article>
                      <label for="ale" class="fw-bold"><?=$cab[12]?></label>
                      <p id="ale" class="ps-3"><?=$tit[2]?></p>
                  </article>
              </section>
          </main>
      <?php
  }

      //mensaje de error de la página
  /* $err=
      '<main class=" flex-column">
          <h4 class=" text-danger p-2">Error la url no está bien escrita, vuelva a leer el código qr gracias.</h4>
      </main>
      '; */
}