<?php
require_once "vistas/plantilla/cabecera.php";
require_once "vistas/plantilla/pie.php";
require_once "modelo/titulos.php";
require_once "modelo/cabeceras.php";
require_once "modelo/valores.php";
class VistaTabla{
  
  static function tablaIngredientes($idioma,$titulo,$cabecera,$valores){
    
    Cabecera::head($idioma);
    ?>
      <main class="container-sm mb-5" style="max-width: 800px;">        
        <div class="table-responsive-sm mb-3">        
          <table class="table table-striped align-middle ">                                        
            <thead class="table-dark align-middle">
              <tr>
                <th scope="col" class="h4"><?=$titulo->titulo()?></th>
                <th scope="col">100gr</th>
                <th scope="col">32gr</th>
              </tr>
            </thead>
            <tbody>    
              <tr>
                  <td class="fw-bold"><?=$cabecera->producto()?></td>
                  <td><?=$valores->producto()?></td>
                  <td><?=$valores->producto()?></td>
              </tr>
              <tr>
                  <td class="fw-bold"><?=$cabecera->valor1()?></td>
                  <td><?=$valores->valorkj1()?></td>
                  <td><?=$valores->valorkj2()?></td>
              </tr>
              <tr>
                  <td class="fw-bold"><?=$cabecera->valor2()?></td>
                  <td><?=$valores->valorkcal1()?></td>
                  <td><?=$valores->valorkcal2()?></td>
              </tr>
              <tr>
                  <td class="fw-bold border-bottom-0" ><?=$cabecera->grasas1()?></td>
                  <td class="border-bottom-0"><?=$valores->grasas1()?></td>
                  <td class="border-bottom-0"><?=$valores->grasas2()?></td>
              </tr>
              <tr>
                  <td  class="border-bottom-0 ps-3" colspan="3"><?=$cabecera->grasas2()?></td>                        
              </tr>
              <tr>
                  <td class="fw-bold text-center"><?=$cabecera->grasas3()?></td>
                  <td><?=$valores->saturadas1()?></td>
                  <td><?=$valores->saturadas2()?></td>
              </tr>
              <tr>
                  <td class="fw-bold border-bottom-0"><?=$cabecera->hidratos1()?></td>
                  <td class="border-bottom-0"><?=$valores->hidratos1()?></td>
                  <td class="border-bottom-0"><?=$valores->hidratos2()?></td>
              </tr>
              <tr>
                  <td class="border-bottom-0 ps-3" colspan="3"><?=$cabecera->hidratos2()?></td>                        
              </tr>
              <tr>
                  <td class="fw-bold text-center"><?=$cabecera->hidratos3()?></td>
                  <td><?=$valores->azucar1()?></td>
                  <td><?=$valores->azucar2()?></td>
              </tr>
              <tr>
                  <td class="fw-bold"><?=$cabecera->proteinas()?></td>
                  <td><?=$valores->proteina1()?></td>
                  <td><?=$valores->proteina2()?></td>
              </tr>
              <tr>
                  <td class="fw-bold"><?=$cabecera->sal()?></td>
                  <td><?=$valores->sal1()?></td>
                  <td><?=$valores->sal2()?></td>
              </tr>
            </tbody>
          </table>
        </div>        
        <section>
          <article>
            <label for="ing" class="fw-bold"><?=$cabecera->ingredientes()?></label>
            <p id="ing" class="ps-3"><?=$titulo->ingredientes()?></p>
          </article>
          <article>
            <label for="ale" class="fw-bold"><?=$cabecera->alergenos()?></label>
            <p id="ale" class="ps-3"><?=$titulo->alergenos()?></p>
          </article>
        </section>
        <a href="<?=$_SERVER["PHP_SELF"]?>"><button class="btn align-content-lg-between btn-primary m-3"><?=$cabecera->volver()?></button></a>   
    </main>
    <?php
    Pie::footer();
  }
}