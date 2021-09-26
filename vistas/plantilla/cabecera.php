<?php
class Cabecera{
  
  static function head($id="es"){
    ?>
      <!DOCTYPE html>
      <html lang="<?=$id?>">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TAM - ingredientes</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">
        <link rel="stylesheet" href="css/style.css">
      </head>
      <body>
        <header class="text-center mb-5">
          <img src="imagenes/tam.png" alt="Logo TAM">
        </header>     
    <?php    
  }
}