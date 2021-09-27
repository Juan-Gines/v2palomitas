<?php
require_once "vistas/plantilla/cabecera.php";
require_once "vistas/plantilla/pie.php";
class Panel{

  static function panelControl($idiomas,$saboresId){
    Cabecera::head();
    ?>
    <main class=" flex-row">              
      <div class="table-responsive-sm mb-3 min-form">        
        <table class="table table-striped align-middle ">                                        
          <thead class="table-dark align-middle">
            <tr>
              <th scope="col" class="h4">Idiomas</th>
              <th scope="col" class="text-der">Acciones</th>              
            </tr>
          </thead>
          <tbody>
            <?php
              for($i=0;$i<count($idiomas->listado());$i++){
                ?>
                <tr>
                  <td class="fw-bold"><?=$idiomas->listado()[$i]?></td>
                  <td class="text-der">                    
                    <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?id=".$i."&action=1")?>"><img class='icono' src='iconos/editar.png' title='editar' alt='editar'></a>
                    <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?action=2&id=".$i)?>"><img class='icono' src='iconos/borrar.png' title='borrar' alt='borrar'></a>
                  </td>                  
                </tr>
            <?php    
              }
            ?>            
          </tbody>
        </table>
        <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?action=3")?>"><button class="btn align-content-lg-between btn-primary m-3" type="button">Nuevo idioma</button></a>
      </div>
      <div class="table-responsive-sm mb-3 min-form">        
        <table class="table table-striped align-middle ">                                        
          <thead class="table-dark align-middle">
            <tr>
              <th scope="col" class="h4">Sabores</th>
              <th scope="col" class="text-der">Acciones</th>              
            </tr>
          </thead>
          <tbody>
            <?php
              for($i=0;$i<count($saboresId->listado());$i++){
                ?>
                <tr>
                  <td class="fw-bold"><?=$saboresId->listado()[$i]?></td>
                  <td class="text-der">                    
                    <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?id=".$i."&action=4")?>"><img class='icono' src='iconos/editar.png' title='editar' alt='editar'></a>
                    <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?action=5&id=".$i)?>"><img class='icono' src='iconos/borrar.png' title='borrar' alt='borrar'></a>
                  </td>                  
                </tr>
            <?php    
              }
            ?>            
          </tbody>
        </table>
        <a href="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?action=6")?>"><button class="btn align-content-lg-between btn-primary m-3" type="button">Nuevo sabor</button></a>
      </div>       
    </main>
    <?php
    Pie::footer();
  }
}