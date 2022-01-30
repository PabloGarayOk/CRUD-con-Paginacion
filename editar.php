<!doctype html>
 <!--  
  * editar.php
  * Description: Actuliza registros.
  * Version: 1.0
  * Author: 2021 - Pablo Garay
  * https://github.com/PabloGarayOk/CRUD-con-Paginacion.git
  -->
<html>
  <head>
  <meta charset="utf-8">
  <title>CRUD - UPDATE</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
  </head>

  <body>

    <h1>ACTUALIZAR</h1>

    <?php
      
      include("conexion.php");

      if(!isset($_POST['bot_actualizar'])){

        $id=$_GET['Id'];
        $nom=$_GET['Nom'];
        $ape=$_GET['Ape'];
        $dir=$_GET['Dir'];
      
      }else{

        $id=$_POST['id'];
        $nom=$_POST['nom'];
        $ape=$_POST['ape'];
        $dir=$_POST['dir'];

        $sql="UPDATE datos_usuarios SET Nombre=:miNom, Apellido=:miApe, Direccion=:miDir WHERE Id=:miId";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, "miApe"=>$ape, "miDir"=>$dir));

        header("location:index.php"); 
      }

    ?>

    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
      <table width="25%" border="0" align="center">
        <tr>
          <td></td>
          <td><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
        </tr>
        <tr>
          <td>Nombre</td>
          <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $nom?>"></td>
        </tr>
        <tr>
          <td>Apellido</td>
          <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="<?php echo $ape?>"></td>
        </tr>
        <tr>
          <td>Dirección</td>
          <td><label for="dir"></label>
          <input type="text" name="dir" id="dir" value="<?php echo $dir?>"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </body>
</html>