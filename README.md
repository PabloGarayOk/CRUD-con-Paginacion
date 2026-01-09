# PHP CRUD with Pagination (Procedural)

This project is a basic **CRUD (Create, Read, Update, Delete)** application developed in **plain PHP (procedural)** with **MySQL**, including **pagination**.

It demonstrates core backend concepts such as database connections, SQL operations, and pagination logic without using any framework or MVC architecture.

## Features

- Create, read, update and delete records
- Pagination of results
- MySQL database integration
- Clean separation of responsibilities using individual PHP files
- Simple and easy-to-understand structure

## Database Structure

The project uses a simple table with the following fields:

- `Id`
- `Nombre`
- `Apellido`
- `Direccion`

### SQL Setup

```sql
-- Create database
CREATE DATABASE pruebas;

-- Create table
CREATE TABLE datos_usuarios (
  Id INT AUTO_INCREMENT,
  Nombre VARCHAR(20),
  Apellido VARCHAR(20),
  Direccion VARCHAR(30),
  PRIMARY KEY (Id)
);
```

## Project Structure

- index.php – Main interface and data listing / Create records
- conexion.php – Database connection
- editar.php – Update records
- borrar.php – Delete records
- hoja.css/ – Stylesheet

## Notes

This project is not deployed online
A more advanced version using MVC and OOP is available in a separate repository
This repository focuses on demonstrating PHP fundamentals and SQL handling

## Author

Pablo Garay  
[Personal website](https://pablogaray.com.ar)
