# Prueba PHP

Prueba de php y mysql, hecha por Juan Camilo Paez Ariza, perteneciente al curso M3.
Este proyecto tiene como finalidad crear API'S con el uso del lenguaje de programacion PHP.

## Script MySQL

Se deja el script usado para la creacion de la base de datos en MySQL.

```mysql
CREATE DATABASE campuslands;

USE campuslands;

CREATE TABLE pais (idPais INT AUTO_INCREMENT, nombrePais VARCHAR(70),PRIMARY KEY(idPais));

CREATE TABLE departamento (idDep INT AUTO_INCREMENT, nombreDep VARCHAR(50), 
idPais INT, PRIMARY KEY (idDep), FOREIGN KEY(idPais) REFERENCES pais(idPais));

CREATE TABLE region (idReg INT AUTO_INCREMENT, nombreReg VARCHAR(60), 
idDep INT, PRIMARY KEY (idReg), FOREIGN KEY (idDep) REFERENCES departamento(idDep));

CREATE TABLE campers (idCamper INT AUTO_INCREMENT, nombreCamper VARCHAR(50),apellidoCamper VARCHAR(50),fechaNac DATE, 
idReg INT, PRIMARY KEY (idCamper), FOREIGN KEY (idReg) REFERENCES region(idReg));
```

## Usage

```

```

## C

Pull

## Errores
* En la primera tabla "pais", se encontro que "nombrePais" estaba como tipo INT, se corrige al ponerlo como VARCHAT(70), con esto arreglando el problema.

* En la imagen de la base de datos se indica que en la ultima tabla el "idCamper" esta en VARCHAR, lo cual es un error, por lo tanto se cambia en el script y se coloca INT, arreglando el problema.

## Fotos

