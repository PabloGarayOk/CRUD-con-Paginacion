<!doctype html>
  <!--  
  * index.php
  * Description: Muestra y permite ingresar registros.
  * Version: 1.0
  * Author: 2021 - Pablo Garay
  * https://github.com/PabloGarayOk/CRUD-con-Paginacion.git
  -->
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="hoja.css">
  </head>

  <body>

    <?php

      include("conexion.php");

      //---------------------------------Paginacion---------------------------------//

      $reg_por_pag = 3;

      if (isset($_GET['pag_selec'])) {
            
        if ($_GET['pag_selec']==1) {
          
          header("location:index.php");

        }else{

          $pag_actual=$_GET['pag_selec'];

        }

      }else{

        $pag_actual = 1;

      }

      $sql_total="SELECT * FROM datos_usuarios";

      $resultado=$base->prepare($sql_total);

      $resultado->execute(array());

      $num_filas=$resultado->rowCount();

      $num_paginas=ceil($num_filas/$reg_por_pag);

      $empezar_desde=($pag_actual-1) * $reg_por_pag;

      //----------------------------------------------------------------------------//

      $registros=$base->query("SELECT * FROM datos_usuarios LIMIT $empezar_desde, $reg_por_pag")->fetchAll(PDO::FETCH_OBJ);

      if (isset($_POST['create'])){

        $nombre = $_POST['Nom'];

        $apellido = $_POST['Ape'];

        $direccion = $_POST['Dir'];

        $sql = "INSERT INTO datos_usuarios (NOMBRE, APELLIDO, DIRECCION) VALUES (:nom, :ape, :dir)";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

      }
    
    ?>
    
    <h1>CRUD con Paginacion</h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <table width="50%" border="0" align="center">
        <tr>
          <td class="primera_fila">Id</td>
          <td class="primera_fila">Nombre</td>
          <td class="primera_fila">Apellido</td>
          <td class="primera_fila">Dirección</td>
          <td class="sin">&nbsp;</td>
          <td class="sin">&nbsp;</td>
          <td class="sin">&nbsp;</td>
        </tr>

        <!--Formulario para insertar registros-->
        <tr>
          <td></td>
          <td><input type='text' name='Nom' size='10' class='centrado'></td>
          <td><input type='text' name='Ape' size='10' class='centrado'></td>
          <td><input type='text' name='Dir' size='10' class='centrado'></td>
          <td class='bot'><input type='submit' name='create' id='create' value='Insertar'></td>
        </tr> 

        <!--Vista de registros-->
        <?php

          foreach ($registros as $personas):
          
        ?>		
       	<tr>
          <td><?php echo $personas->Id?></td>
          <td><?php echo $personas->Nombre?></td>
          <td><?php echo $personas->Apellido?></td>
          <td><?php echo $personas->Direccion?></td> 
          <td class="bot"><a href="borrar.php?Id=<?php echo $personas->Id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
          <td class='bot'><a href="editar.php?Id=<?php echo $personas->Id?> & Nom=<?php echo $personas->Nombre?> & Ape=<?php echo $personas->Apellido?> & Dir=<?php echo $personas->Direccion?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
        </tr>

        <?php

          endforeach;
          
        ?>

        <!----------------------------------Paginacion----------------------------------->
        <tr>
          <td colspan="4">
            <?php

              $ant = $pag_actual - 1;
              $sig = $pag_actual + 1;

              if ($pag_actual > 1){
      
                echo "<a href='?pag_selec=$ant'> Anterior </a>&nbsp;&nbsp;&nbsp;";

              }

              for($i=1; $i<=$num_paginas; $i++){ 

                echo "<a href='?pag_selec=$i'>$i</a>  "; 

              }

              if ($pag_actual < $num_paginas) { 
          
                echo "&nbsp;&nbsp;&nbsp;<a href='?pag_selec=$sig'> Siguiente </a>";
              }

            ?>
          </td>
        </tr>
        <!---------------------------------Fin Paginacion--------------------------------->

      </table>
    </form>

  </body>
</html>