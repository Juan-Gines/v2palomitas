<?php
require_once "modelo/titulos.php";
class EditaSabor{
  
  static function editaSabor($idiomas,$ids,$datos=[],$recupera=[]){    
    Cabecera::head();
    $idrand=mt_rand();
    $_SESSION["idrand"]=$idrand;
    if(!empty($datos)){
      $titulos=$datos["titulos"];      
      $valores=$datos["valores"];      
    }        
    ?>
      <main class=" flex-column">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <h4>Rellena los campos:</h4><br>
            <label for="titSabor" class="etiqueta">Sabor</label>
            <input type="text" name="titSabor" id="titSabor" value="<?= (!empty($datos))?$titulos[0]->titulo():""?><?= (isset($recupera["titSabor"]))?$recupera["titSabor"]:""?>"><output class="text-danger"><?= (isset($recupera["er_titSabor"]))?$recupera["er_titSabor"]:""?></output><br>
            <label for="codigo" class="etiqueta">Código sabor(ej:saborDulce)</label>
            <input type="text" name="codigo" id="codigo" value="<?= (!empty($datos))?$datos["sabor"]:""?><?= (isset($recupera["codigo"]))?$recupera["codigo"]:""?>"><output class="text-danger"><?= (isset($recupera["er_codigo"]))?$recupera["er_codigo"]:""?></output><br>
            <?php
            for($i=0;$i<count($idiomas);$i++){
              $titulo=(isset($titulos[$i]))?$titulos[$i]:"";              
            ?>  
            <h4><?= $idiomas[$i]?></h4>
            <label for="tit<?=$ids[$i]?>" class="etiqueta">Título</label>
            <input type="text" name="tit<?=$ids[$i]?>" id="tit<?=$ids[$i]?>" value="<?= (!empty($datos))?$titulo->titulo():""?><?= (isset($recupera["tit".$ids[$i]]))?$recupera["tit".$ids[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_tit".$ids[$i]]))?$recupera["er_tit".$ids[$i]]:""?></output><br>
            <label for="ing<?=$ids[$i]?>" class="etiqueta">Ingredientes</label>
            <input type="text" name="ing<?=$ids[$i]?>" id="ing<?=$ids[$i]?>" value="<?= (!empty($datos))?$titulo->ingredientes():""?><?= (isset($recupera["ing".$ids[$i]]))?$recupera["ing".$ids[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_ing".$ids[$i]]))?$recupera["er_ing".$ids[$i]]:""?></output><br>
            <label for="ale<?=$ids[$i]?>" class="etiqueta">Alérgenos</label>
            <input type="text" name="ale<?=$ids[$i]?>" id="ale<?=$ids[$i]?>" value="<?= (!empty($datos))?$titulo->alergenos():""?><?= (isset($recupera["ale".$ids[$i]]))?$recupera["ale".$ids[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_ale".$ids[$i]]))?$recupera["er_ale".$ids[$i]]:""?></output><br>
            <?php
            }
            ?>
            <h4>Inserta los valores del sabor:</h4><br>
            <label for="producto" class="etiqueta">PRODUCTO</label>
            <input type="text" name="producto" id="producto" value="<?= (!empty($datos))?$valores->producto():""?><?= (isset($recupera["producto"]))?$recupera["producto"]:""?>"><output class="text-danger"><?= (isset($recupera["er_producto"]))?$recupera["er_producto"]:""?></output><br>
            <label for="valorkj1" class="etiqueta">Valor energético (kJ) 100gr</label>
            <input type="text" name="valorkj1" id="valorkj1" value="<?= (!empty($datos))?$valores->valorkj1():""?><?= (isset($recupera["valorkj1"]))?$recupera["valorkj1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valorkj1"]))?$recupera["er_valorkj1"]:""?></output><br>
            <label for="valorkj2" class="etiqueta">Valor energético  (KJ) 32gr</label>
            <input type="text" name="valorkj2" id="valorkj2" value="<?= (!empty($datos))?$valores->valorkj2():""?><?= (isset($recupera["valorkj2"]))?$recupera["valorkj2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valorkj2"]))?$recupera["er_valorkj2"]:""?></output><br>
            <label for="valorkcal1" class="etiqueta">Valor energético (kcal) 100gr</label>
            <input type="text" name="valorkcal1" id="valorkcal1" value="<?= (!empty($datos))?$valores->valorkcal1():""?><?= (isset($recupera["valorkcal1"]))?$recupera["valorkcal1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valorkcal1"]))?$recupera["er_valorkcal1"]:""?></output><br>
            <label for="valorkcal2" class="etiqueta">Valor energético (kcal) 32gr</label>
            <input type="text" name="valorkcal2" id="valorkcal2" value="<?= (!empty($datos))?$valores->valorkcal2():""?><?= (isset($recupera["valorkcal2"]))?$recupera["valorkcal2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valorkcal2"]))?$recupera["er_valorkcal2"]:""?></output><br>
            <label for="grasas1" class="etiqueta">Grasas (g) 100g</label>
            <input type="text" name="grasas1" id="grasas1"  value="<?= (!empty($datos))?$valores->grasas1():""?><?= (isset($recupera["grasas1"]))?$recupera["grasas1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_grasas1"]))?$recupera["er_grasas1"]:""?></output><br>
            <label for="grasas2" class="etiqueta">Grasas (g) 32g</label>
            <input type="text" name="grasas2" id="grasas2" value="<?= (!empty($datos))?$valores->grasas2():""?><?= (isset($recupera["grasas2"]))?$recupera["grasas2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_grasas2"]))?$recupera["er_grasas2"]:""?></output><br>
            <label for="saturadas1" class="etiqueta">Saturadas  (g) 100g</label>
            <input type="text" name="saturadas1" id="saturadas1" value="<?= (!empty($datos))?$valores->saturadas1():""?><?= (isset($recupera["saturadas1"]))?$recupera["saturadas1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_saturadas1"]))?$recupera["er_saturadas1"]:""?></output><br>
            <label for="saturadas2" class="etiqueta">Saturadas  (g) 32g</label>
            <input type="text" name="saturadas2" id="saturadas2" value="<?= (!empty($datos))?$valores->saturadas2():""?><?= (isset($recupera["saturadas2"]))?$recupera["saturadas2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_saturadas2"]))?$recupera["er_saturadas2"]:""?></output><br>
            <label for="hidratos1" class="etiqueta">Hidratos 100g</label>
            <input type="text" name="hidratos1" id="hidratos1" value="<?= (!empty($datos))?$valores->hidratos1():""?><?= (isset($recupera["hidratos1"]))?$recupera["hidratos1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_hidratos1"]))?$recupera["er_hidratos1"]:""?></output><br>
            <label for="hidratos2" class="etiqueta">Hidratos 32g</label>
            <input type="text" name="hidratos2" id="hidratos2" value="<?= (!empty($datos))?$valores->hidratos2():""?><?= (isset($recupera["hidratos2"]))?$recupera["hidratos2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_hidratos2"]))?$recupera["er_hidratos2"]:""?></output><br>
            <label for="azucar1" class="etiqueta">Azucar (g) 100g</label>
            <input type="text" name="azucar1" id="azucar1" value="<?= (!empty($datos))?$valores->azucar1():""?><?= (isset($recupera["azucar1"]))?$recupera["azucar1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_azucar1"]))?$recupera["er_azucar1"]:""?></output><br>
            <label for="azucar2" class="etiqueta">Azucar (g) 32g</label>
            <input type="text" name="azucar2" id="azucar2" value="<?= (!empty($datos))?$valores->azucar2():""?><?= (isset($recupera["azucar2"]))?$recupera["azucar2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_azucar2"]))?$recupera["er_azucar2"]:""?></output><br>
            <label for="proteina1" class="etiqueta">Proteina 100g</label>
            <input type="text" name="proteina1" id="proteina1" value="<?= (!empty($datos))?$valores->proteina1():""?><?= (isset($recupera["proteina1"]))?$recupera["proteina1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_proteina1"]))?$recupera["er_proteina1"]:""?></output><br>
            <label for="proteina2" class="etiqueta">Proteina 32g</label>
            <input type="text" name="proteina2" id="proteina2" value="<?= (!empty($datos))?$valores->proteina2():""?><?= (isset($recupera["proteina2"]))?$recupera["proteina2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_proteina2"]))?$recupera["er_proteina2"]:""?></output><br>
            <label for="sal1" class="etiqueta">sal 100gr</label>
            <input type="text" name="sal1" id="sal1" value="<?= (!empty($datos))?$valores->sal1():""?><?= (isset($recupera["sal1"]))?$recupera["sal1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_sal1"]))?$recupera["er_sal1"]:""?></output><br>
            <label for="sal2" class="etiqueta">sal 32gr</label>
            <input type="text" name="sal2" id="sal2" value="<?= (!empty($datos))?$valores->sal2():""?><?= (isset($recupera["sal2"]))?$recupera["sal2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_sal2"]))?$recupera["er_sal2"]:""?></output><br>           
            <input type="hidden" name="idrand" id="idrand" value="<?=$idrand?>">
            <?php
            if ($_SESSION["editar"]) {
            ?>
              <button class="btn align-content-lg-between btn-primary m-3" name="editaSabor">Edita</button>
            <?php
            }else{
            ?>
              <button class="btn align-content-lg-between btn-primary m-3" name="nuevoSabor">Nuevo SABOR</button>
            <?php
            }
            ?>
        </form>       
    </main>
    <?php
    Pie::footer();
  }
}