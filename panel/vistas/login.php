<?php
require_once "vistas/plantilla/cabecera.php";
require_once "vistas/plantilla/pie.php";
class Login{

  static function log(){
    Cabecera::head();
    ?>
    <main class=" flex-column">
      <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user" value="<?=(isset($_SESSION["user"]))? $_SESSION["user"]: "" ?>">
        <label for="pass">Password:</label>
        <input type="text" name="pass" id="pass">
        <button name="login">Login</button>
      </form>
      <output class="text-danger "><?=(isset($_SESSION["errLogin"]))? $_SESSION["errLogin"]: "" ?></output>
    </main>
    <?php
    Pie::footer();
  }
}