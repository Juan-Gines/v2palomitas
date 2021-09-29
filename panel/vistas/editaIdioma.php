<?php
require_once "modelo/titulos.php";
class EditaIdioma{
  
  static function editaIdioma($saborEsp,$listaSabores,$datos=[],$recupera=[]){    
    Cabecera::head();
    $idrand=mt_rand();
    $_SESSION["idrand"]=$idrand;
    if(!empty($datos)){
      $titulos=$datos["titulos"];      
      $cabeceras=$datos["cabeceras"];      
    }    
    ?>
      <main class=" flex-column">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <h4>Rellena los campos:</h4><br>
            <label for="idioma" class="etiqueta">Idioma</label>
            <input type="text" name="idioma" id="idioma" value="<?= (!empty($datos))?$datos["idioma"]:""?><?= (isset($recupera["idioma"]))?$recupera["idioma"]:""?>"><output class="text-danger"><?= (isset($recupera["er_idioma"]))?$recupera["er_idioma"]:""?></output><br>
            <label for="codigo" class="etiqueta">Código idioma iso(2 letras)</label>
            <input type="text" name="codigo" minlength="2" maxlength="2" id="codigo" value="<?= (!empty($datos))?$datos["id"]:""?><?= (isset($recupera["codigo"]))?$recupera["codigo"]:""?>"><output class="text-danger"><?= (isset($recupera["er_codigo"]))?$recupera["er_codigo"]:""?></output><br>
            <?php
            for($i=0;$i<count($saborEsp->listado());$i++){
              $titulo=(isset($titulos[$i]))?$titulos[$i]:"";              
            ?>  
            <h4><?= $saborEsp->listado()[$i]?></h4>
            <label for="tit<?=$listaSabores->listado()[$i]?>" class="etiqueta">Título</label>
            <input type="text" name="tit<?=$listaSabores->listado()[$i]?>" id="tit<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->titulo():""?><?= (isset($recupera["tit".$listaSabores->listado()[$i]]))?$recupera["tit".$listaSabores->listado()[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_tit".$listaSabores->listado()[$i]]))?$recupera["er_tit".$listaSabores->listado()[$i]]:""?></output><br>
            <label for="ing<?=$listaSabores->listado()[$i]?>" class="etiqueta">Ingredientes</label>
            <input type="text" name="ing<?=$listaSabores->listado()[$i]?>" id="ing<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->ingredientes():""?><?= (isset($recupera["ing".$listaSabores->listado()[$i]]))?$recupera["ing".$listaSabores->listado()[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_ing".$listaSabores->listado()[$i]]))?$recupera["er_ing".$listaSabores->listado()[$i]]:""?></output><br>
            <label for="ale<?=$listaSabores->listado()[$i]?>" class="etiqueta">Alérgenos</label>
            <input type="text" name="ale<?=$listaSabores->listado()[$i]?>" id="ale<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->alergenos():""?><?= (isset($recupera["ale".$listaSabores->listado()[$i]]))?$recupera["ale".$listaSabores->listado()[$i]]:""?>"><output class="text-danger"><?= (isset($recupera["er_ale".$listaSabores->listado()[$i]]))?$recupera["er_ale".$listaSabores->listado()[$i]]:""?></output><br>
            <?php
            }
            ?>
            <h4>Traduce literalmente al nuevo idioma:</h4><br>
            <label for="producto" class="etiqueta">PRODUCTO</label>
            <input type="text" name="producto" id="producto" value="<?= (!empty($datos))?$cabeceras->producto():""?><?= (isset($recupera["producto"]))?$recupera["producto"]:""?>"><output class="text-danger"><?= (isset($recupera["er_producto"]))?$recupera["er_producto"]:""?></output><br>
            <label for="valor1" class="etiqueta">Valor energético  (kJ)</label>
            <input type="text" name="valor1" id="valor1" value="<?= (!empty($datos))?$cabeceras->valor1():""?><?= (isset($recupera["valor1"]))?$recupera["valor1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valor1"]))?$recupera["er_valor1"]:""?></output><br>
            <label for="valor2" class="etiqueta">Valor energético  (Kcal)</label>
            <input type="text" name="valor2" id="valor2" value="<?= (!empty($datos))?$cabeceras->valor2():""?><?= (isset($recupera["valor2"]))?$recupera["valor2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_valor2"]))?$recupera["er_valor2"]:""?></output><br>
            <label for="grasas1" class="etiqueta">Grasas (g)</label>
            <input type="text" name="grasas1" id="grasas1"  value="<?= (!empty($datos))?$cabeceras->grasas1():""?><?= (isset($recupera["grasas1"]))?$recupera["grasas1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_grasas1"]))?$recupera["er_grasas1"]:""?></output><br>
            <label for="grasas2" class="etiqueta">de las cuales:</label>
            <input type="text" name="grasas2" id="grasas2" value="<?= (!empty($datos))?$cabeceras->grasas2():""?><?= (isset($recupera["grasas2"]))?$recupera["grasas2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_grasas2"]))?$recupera["er_grasas2"]:""?></output><br>
            <label for="grasas3" class="etiqueta">Saturadas  (g):</label>
            <input type="text" name="grasas3" id="grasas3" value="<?= (!empty($datos))?$cabeceras->grasas3():""?><?= (isset($recupera["grasas3"]))?$recupera["grasas3"]:""?>"><output class="text-danger"><?= (isset($recupera["er_grasas3"]))?$recupera["er_grasas3"]:""?></output><br>
            <label for="hidratos1" class="etiqueta">Hidratos de carbono:</label>
            <input type="text" name="hidratos1" id="hidratos1" value="<?= (!empty($datos))?$cabeceras->hidratos1():""?><?= (isset($recupera["hidratos1"]))?$recupera["hidratos1"]:""?>"><output class="text-danger"><?= (isset($recupera["er_hidratos1"]))?$recupera["er_hidratos1"]:""?></output><br>
            <label for="hidratos2" class="etiqueta">de los cuales:</label>
            <input type="text" name="hidratos2" id="hidratos2" value="<?= (!empty($datos))?$cabeceras->hidratos2():""?><?= (isset($recupera["hidratos2"]))?$recupera["hidratos2"]:""?>"><output class="text-danger"><?= (isset($recupera["er_hidratos2"]))?$recupera["er_hidratos2"]:""?></output><br>
            <label for="hidratos3" class="etiqueta">Azúcares (g):</label>
            <input type="text" name="hidratos3" id="hidratos3" value="<?= (!empty($datos))?$cabeceras->hidratos3():""?><?= (isset($recupera["hidratos3"]))?$recupera["hidratos3"]:""?>"><output class="text-danger"><?= (isset($recupera["er_hidratos3"]))?$recupera["er_hidratos3"]:""?></output><br>
            <label for="proteinas" class="etiqueta">Proteinas (g):</label>
            <input type="text" name="proteinas" id="proteinas" value="<?= (!empty($datos))?$cabeceras->proteinas():""?><?= (isset($recupera["proteinas"]))?$recupera["proteinas"]:""?>"><output class="text-danger"><?= (isset($recupera["er_proteinas"]))?$recupera["er_proteinas"]:""?></output><br>
            <label for="sal" class="etiqueta">Sal (g):</label>
            <input type="text" name="sal" id="sal" value="<?= (!empty($datos))?$cabeceras->sal():""?><?= (isset($recupera["sal"]))?$recupera["sal"]:""?>"><output class="text-danger"><?= (isset($recupera["er_sal"]))?$recupera["er_sal"]:""?></output><br>
            <label for="ingredientes" class="etiqueta">Ingredientes</label>
            <input type="text" name="ingredientes" id="ingredientes" value="<?= (!empty($datos))?$cabeceras->ingredientes():""?><?= (isset($recupera["ingredientes"]))?$recupera["ingredientes"]:""?>"><output class="text-danger"><?= (isset($recupera["er_ingredientes"]))?$recupera["er_ingredientes"]:""?></output><br>
            <label for="alergenos" class="etiqueta">Alérgenos</label>
            <input type="text" name="alergenos" id="alergenos" value="<?= (!empty($datos))?$cabeceras->alergenos():""?><?= (isset($recupera["alergenos"]))?$recupera["alergenos"]:""?>"><output class="text-danger"><?= (isset($recupera["er_alergenos"]))?$recupera["er_alergenos"]:""?></output><br>
            <label for="selecciona" class="etiqueta">Selecciona el sabor</label>
            <input type="text" name="selecciona" id="selecciona" value="<?= (!empty($datos))?$cabeceras->selecciona():""?><?= (isset($recupera["selecciona"]))?$recupera["selecciona"]:""?>"><output class="text-danger"><?= (isset($recupera["er_selecciona"]))?$recupera["er_selecciona"]:""?></output><br>
            <label for="continuar" class="etiqueta">Continuar</label>
            <input type="text" name="continuar" id="continuar" value="<?= (!empty($datos))?$cabeceras->continuar():""?><?= (isset($recupera["continuar"]))?$recupera["continuar"]:""?>"><output class="text-danger"><?= (isset($recupera["er_continuar"]))?$recupera["er_continuar"]:""?></output><br>
            <label for="volver" class="etiqueta">Volver</label>
            <input type="text" name="volver" id="volver" value="<?= (!empty($datos))?$cabeceras->volver():""?><?= (isset($recupera["volver"]))?$recupera["volver"]:""?>"><output class="text-danger"><?= (isset($recupera["er_volver"]))?$recupera["er_volver"]:""?></output><br>
            <input type="hidden" name="idrand" id="idrand" value="<?=$idrand?>">
            <?php
            if ($_SESSION["editar"]) {
            ?>
              <button class="btn align-content-lg-between btn-primary m-3" name="editaIdioma">Edita</button>
            <?php
            }else{
            ?>
              <button class="btn align-content-lg-between btn-primary m-3" name="nuevoIdioma">Nuevo idioma</button>
            <?php
            }
            ?>
        </form>       
    </main>
    <?php
    Pie::footer();
  }
}