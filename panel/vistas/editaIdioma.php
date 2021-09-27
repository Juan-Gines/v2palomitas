<?php
require_once "modelo/titulos.php";
class EditaIdioma{
  
  static function editaIdioma($saborEsp,$listaSabores,$datos=[],){    
    Cabecera::head();
    if(!empty($datos)){
      $titulos=$datos["titulos"];      
      $cabeceras=$datos["cabeceras"];
    }    
    ?>
      <main class=" flex-column">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <h4>Rellena los campos:</h4><br>
            <label for="idioma" class="etiqueta">Idioma</label>
            <input type="text" name="idioma" id="idioma" value="<?= (!empty($datos))?$datos["idioma"]:""?>"><br>
            <label for="codigo" class="etiqueta">Código idioma iso(2 letras)</label>
            <input type="text" name="codigo" minlength="2" maxlength="2" id="codigo" value="<?= (!empty($datos))?$datos["id"]:""?>"><br>
            <?php
            for($i=0;$i<count($saborEsp->listado());$i++){
              $titulo=(isset($titulos[$i]))?$titulos[$i]:"";              
            ?>  
            <h4><?= $saborEsp->listado()[$i]?></h4>
            <label for="tit<?=$listaSabores->listado()[$i]?>" class="etiqueta">Título</label>
            <input type="text" name="tit<?=$listaSabores->listado()[$i]?>" id="tit<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->titulo():""?>"><br>
            <label for="ing<?=$listaSabores->listado()[$i]?>" class="etiqueta">Ingredientes</label>
            <input type="text" name="ing<?=$listaSabores->listado()[$i]?>" id="ing<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->ingredientes():""?>"><br>
            <label for="ale<?=$listaSabores->listado()[$i]?>" class="etiqueta">Alérgenos</label>
            <input type="text" name="ale<?=$listaSabores->listado()[$i]?>" id="ale<?=$listaSabores->listado()[$i]?>" value="<?= (!empty($datos))?$titulo->alergenos():""?>"><br>
            <?php
            }
            ?>
            <h4>Traduce literalmente al nuevo idioma:</h4><br>
            <label for="producto" class="etiqueta">PRODUCTO</label>
            <input type="text" name="producto" id="producto" value="<?= (!empty($datos))?$cabeceras->producto():""?>"><br>
            <label for="valor1" class="etiqueta">Valor energético  (kJ)</label>
            <input type="text" name="valor1" id="valor1" value="<?= (!empty($datos))?$cabeceras->valor1():""?>"><br>
            <label for="valor2" class="etiqueta">Valor energético  (Kcal)</label>
            <input type="text" name="valor2" id="valor2" value="<?= (!empty($datos))?$cabeceras->valor2():""?>"><br>
            <label for="grasas1" class="etiqueta">Grasas (g)</label>
            <input type="text" name="grasas1" id="grasas1"  value="<?= (!empty($datos))?$cabeceras->grasas1():""?>"><br>
            <label for="grasas2" class="etiqueta">de las cuales:</label>
            <input type="text" name="grasas2" id="grasas2" value="<?= (!empty($datos))?$cabeceras->grasas2():""?>"><br>
            <label for="grasas3" class="etiqueta">Saturadas  (g):</label>
            <input type="text" name="grasas3" id="grasas3" value="<?= (!empty($datos))?$cabeceras->grasas3():""?>"><br>
            <label for="hidratos1" class="etiqueta">Hidratos de carbono:</label>
            <input type="text" name="hidratos1" id="hidratos1" value="<?= (!empty($datos))?$cabeceras->hidratos1():""?>"><br>
            <label for="hidratos2" class="etiqueta">de los cuales:</label>
            <input type="text" name="hidratos2" id="hidratos2" value="<?= (!empty($datos))?$cabeceras->hidratos2():""?>"><br>
            <label for="hidratos3" class="etiqueta">Azúcares (g):</label>
            <input type="text" name="hidratos3" id="hidratos3" value="<?= (!empty($datos))?$cabeceras->hidratos3():""?>"><br>
            <label for="proteinas" class="etiqueta">Proteinas (g):</label>
            <input type="text" name="proteinas" id="proteinas" value="<?= (!empty($datos))?$cabeceras->proteinas():""?>"><br>
            <label for="sal" class="etiqueta">Sal (g):</label>
            <input type="text" name="sal" id="sal" value="<?= (!empty($datos))?$cabeceras->sal():""?>"><br>
            <label for="ingredientes" class="etiqueta">Ingredientes</label>
            <input type="text" name="ingredientes" id="ingredientes" value="<?= (!empty($datos))?$cabeceras->ingredientes():""?>"><br>
            <label for="alergenos" class="etiqueta">Alérgenos</label>
            <input type="text" name="alergenos" id="alergenos" value="<?= (!empty($datos))?$cabeceras->alergenos():""?>"><br>
            <?php
            if (!empty($datos)) {
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