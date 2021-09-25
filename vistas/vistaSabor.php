<?php
require_once "vistas/plantilla/cabecera.php";
require_once "vistas/plantilla/pie.php";
require_once "modelo/saboresId.php";
require_once "modelo/cabeceras.php";
require_once "modelo/listaSabores.php";
class VistaSabor{
  
  static function formSabores($idioma,$saboresId,$cabecera,$listaSabores){
    
    Cabecera::head($idioma);
    ?>
      <main class=" flex-column">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
          <label for="sabor" class="etiqueta" id="sabor"><?=$cabecera->selecciona() ?>:</label><br>
      <?php
          for ($i=0;$i<count($listaSabores->listado());$i++){
            ?>
            <input type="radio" name="sabor" id="<?=$listaSabores->listado()[$i]?>" value="<?=$listaSabores->listado()[$i]?>" <?=($i==0)?"checked":""?> >
            <label for="<?=$listaSabores->listado()[$i]?>"><?=$saboresId->listado()[$i]?></label><br>
            <?php
          }
      ?>            
            <button class="btn align-content-lg-between btn-primary m-3" name="elige">Continuar</button>
          </form>
      </main>
      <?php
    Pie::footer();
  }
}