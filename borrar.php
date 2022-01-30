<?php

	/* 
	* borrar.php
	* Description: Elimina registros.
	* Version: 1.0
	* Author: 2021 - Pablo Garay
	* https://github.com/PabloGarayOk/CRUD-con-Paginacion.git
	*/

	include("conexion.php");

	$id = htmlentities(addslashes($_GET['Id']));

	$sql_borrar = "DELETE from datos_usuarios WHERE Id= :miId"; 

	$resultado=$base->prepare($sql_borrar); 

	$resultado->execute(array(":miId"=>$id));

	header("location:index.php");

?>


