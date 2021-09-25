<?php
require_once "vistas/plantilla/cabecera.php";
require_once "vistas/plantilla/pie.php";
require_once "modelo/idiomas.php";
class VistaIdioma{
  
  static function formIdiomas($idiomas){
    
    Cabecera::head();
    ?>
      <main class=" flex-column">
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
          <label for="lang" id="lang">Elija su idioma:</label><br>
      <?php
          for ($i=0;$i<count($idiomas->listado());$i++){
            ?>
            <input type="radio" name="lang" id="<?=$idiomas->ids()[$i]?>" value="<?=$idiomas->ids()[$i]?>" <?=($i==0)?"checked":""?> >
            <label for="<?=$idiomas->ids()[$i]?>"><?=$idiomas->listado()[$i]?></label><br>
            <?php
          }
      ?>            
            <button class="btn align-content-lg-between btn-primary m-3" name="idioma">Continuar</button>
          </form>
      </main>
      <?php
    Pie::footer();
  }
}