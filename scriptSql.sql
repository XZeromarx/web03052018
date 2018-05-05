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
