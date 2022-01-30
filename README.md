# CRUD con Paginacion en php
Se crea una tabla simple con 4 campos (Id, Nombre, Apellido, Direccion) para ver como hace un CRUD con paginacion en php.

//Instrucciones SQL para crear la BBDD, la tabla y ver como funciona el CRUD.

//Creamos la BBDD:
   create database pruebas;

//Creamos la TABLA:
   CREATE TABLE datos_usuarios (Id int AUTO_INCREMENT, Nombre varchar(20), Apellido varchar(20), Direccion varchar(30), PRIMARY KEY (Id))
