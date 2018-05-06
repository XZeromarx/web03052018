CREATE DATABASE bd_web;

USE bd_web;


CREATE TABLE persona(
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
PRIMARY KEY (id)
);


CREATE TABLE etiqueta(
id INT AUTO_INCREMENT,
nombre VARCHAR(100),
PRIMARY KEY (id)
);

CREATE TABLE persona_etiqueta(
id INT AUTO_INCREMENT,
id_persona int,
id_etiqueta int,
foreign key (id_persona) REFERENCES persona (id),
foreign key (id_etiqueta) references etiqueta (id),
primary key (id)
);


DELIMITER $$
CREATE PROCEDURE agregar_personas IN @nombre varchar(100), IN @nom_etiqueta varchar(100) --DROP PROCEDURE agregar_personas;
AS
BEGIN
DECLARE @id_persona INT,
DECLARE @id_etiqueta INT,

SET @id_persona = (SELECT id FROM persona WHERE nombre = @nombre);
SET @id_etiqueta = (SELECT id FROM etiqueta WHERE nombre = @nom_etiqueta);

IF @id_persona == NULL THEN/*si no existe la persona la creo */
BEGIN
INSERT INTO persona(nombre) VALUES(@nombre);
SET @id_persona=(SELECT id FROM persona WHERE nombre=@nombre);
END IF;

IF @id_etiqueta == NULL THEN /*si no existe la etiquta la creo*/
BEGIN
INSERT INTO etiqueta(nombre)VALUES(@nom_etiqueta);
SET @id_etiqueta=(SELECT id FROM etiqueta WHERE nombre=@nom_etiqueta);
END IF;

INSERT INTO persona_etiqueta (id_persona,id_etiqueta) VALUES (@id_persona,@id_etiqueta);




END $$
DELIMITER

CALL agregar_personas ('yenifer','nombre');
CALL agregar_personas ('maecelo','lendo');