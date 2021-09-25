<?php
    session_start();    
    if ($_SERVER["REQUEST_METHOD"]=="POST"&&$_SESSION["id"]==$_POST["id"]){
        if(isset($_POST["entra"])){            
            
            $enlace=fopen("idioma/lista.csv", "a");
            fwrite($enlace,"\r\n{$_POST["campo1"]}={$_POST["campo2"]};");
            fclose($enlace);
            
            $enlace=fopen("idioma/{$_POST["campo2"]}.csv", "w");
            fwrite($enlace,"PRODUCTO={$_POST["campo21"]};\r\nValor energético  (kJ)={$_POST["campo22"]};\r\nValor energético  (Kcal)={$_POST["campo23"]};\r\n
            Grasas (g)={$_POST["campo24"]};\r\nde las cuales:={$_POST["campo25"]};\r\nSaturadas  (g):={$_POST["campo26"]};\r\nHidratos de carbono:={$_POST["campo27"]};\r\n
            de los cuales:={$_POST["campo28"]};\r\nAzúcares (g):={$_POST["campo29"]};\r\nProteinas (g):={$_POST["campo30"]};\r\nSal (g):={$_POST["campo31"]};\r\n
            Ingredientes={$_POST["campo32"]};\r\nAlérgenos={$_POST["campo33"]};");
            fclose($enlace);            
            
            $sab=file_get_contents("sabores/listasab.csv");
            $sab=explode(";\r\n",$sab);
            $sab[count($sab)-1]=trim($sab[count($sab)-1],";"); 
            $sabcuenta=0;
            for($i=3;$i<=(count($sab)*3);$i+=3){
                $enlace=fopen("sabores/".$sab[$sabcuenta].".csv", "a");                
                fwrite($enlace,"\r\n<{$_POST["campo2"]}>;\r\nTítulo=".$_POST["campo".($i+1)].";\r\nIngredientes={$_POST["campo4"]};\r\n
                Alérgenos=".$_POST["campo".($i+2)].";");
                fclose($enlace);
                $sabcuenta++;
            }                      
        }
    }
    $id=rand();
    $_SESSION["id"]=$id; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Salt eco</title>
</head>
<body>
    <header>
        <img src="img/tam.png" alt="Logo TAM">
    </header>
    <main class=" flex-column">
        <form method="POST">
            <label for="campo" id="campo">Rellena los campos:</label><br>
            <label for="campo1">Idioma</label><input type="text" name="campo1" id="campo1"><br>
            <label for="campo2">Idioma abreviado 2 letras</label><input type="text" name="campo2" id="campo2"><br>
            <label for="campo3">Titulo Salado eco</label><input type="text" name="campo3" id="campo3"><br>
            <label for="campo4">ingredientes</label><input type="text" name="campo4" id="campo4"><br>
            <label for="campo5">alergenos</label><input type="text" name="campo5" id="campo5"><br>
            <label for="campo6">Titulo salado dx</label><input type="text" name="campo6" id="campo6"><br>
            <label for="campo7">ingredientes</label><input type="text" name="campo7" id="campo7"><br>
            <label for="campo8">alergenos</label><input type="text" name="campo8" id="campo8"><br>
            <label for="campo9">titulo super salado dx</label><input type="text" name="campo9" id="campo9"><br>
            <label for="campo10">ingredientes</label><input type="text" name="campo10" id="campo10"><br>
            <label for="campo11">alergenos</label><input type="text" name="campo11" id="campo11"><br>
            <label for="campo12">titulo dulce vainilla</label><input type="text" name="campo12" id="campo12"><br>
            <label for="campo13">ingredientes</label><input type="text" name="campo13" id="campo13"><br>
            <label for="campo14">alergenos</label><input type="text" name="campo14" id="campo14"><br>
            <label for="campo15">titulo dulce caramelo</label><input type="text" name="campo15" id="campo15"><br>
            <label for="campo16">ingredientes</label><input type="text" name="campo16" id="campo16"><br>
            <label for="campo17">alergenos</label><input type="text" name="campo17" id="campo17"><br>
            <label for="campo18">titulo dulce doble caramelo</label><input type="text" name="campo18" id="campo18"><br>
            <label for="campo19">ingredientes</label><input type="text" name="campo19" id="campo19"><br>
            <label for="campo20">alergenos</label><input type="text" name="campo20" id="campo20"><br>
            <label for="campo21">PRODUCTO</label><input type="text" name="campo21" id="campo21"><br>
            <label for="campo22">Valor energético  (kJ)</label><input type="text" name="campo22" id="campo22"><br>
            <label for="campo23">Valor energético  (Kcal)</label><input type="text" name="campo23" id="campo23"><br>
            <label for="campo24">Grasas (g)</label><input type="text" name="campo24" id="campo24"><br>
            <label for="campo25">de las cuales:</label><input type="text" name="campo25" id="campo25"><br>
            <label for="campo26">Saturadas  (g):</label><input type="text" name="campo26" id="campo26"><br>
            <label for="campo27">Hidratos de carbono:</label><input type="text" name="campo27" id="campo27"><br>
            <label for="campo28">de los cuales:</label><input type="text" name="campo28" id="campo28"><br>
            <label for="campo29">Azúcares (g):</label><input type="text" name="campo29" id="campo29"><br>
            <label for="campo30">Proteinas (g):</label><input type="text" name="campo30" id="campo30"><br>
            <label for="campo31">Sal (g):</label><input type="text" name="campo31" id="campo31"><br>
            <label for="campo32">Ingredientes</label><input type="text" name="campo32" id="campo32"><br>
            <label for="campo33">Alérgenos</label><input type="text" name="campo33" id="campo33"><br>
            <input type="hidden" name="id" id="id" value="<?= $id?>">                        
            <button name="entra">Submit</button>
        </form>       
    </main>
    <footer>
        <details>
            <summary>TAM - Tecnologías Aplicadas del Maiz</summary>
				<address>info@airpopcorn.com</address>
        </details>
    </footer>
</body>
</html>