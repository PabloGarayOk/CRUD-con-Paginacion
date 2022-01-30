<?php

	/* 
	* conexion.php
	* Description: Conecta con la BBDD.
	* Version: 1.0
	* Author: 2021 - Pablo Garay
	* https://github.com/PabloGarayOk/CRUD-con-Paginacion.git
	*/

	try{
		
		$base=new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$base->exec("SET CHARACTER SET utf8");

	}catch(Exception $e){

		die('Error' . $e->getMessage());

		echo "Linea del error" . $e->getLine();

	}

?>