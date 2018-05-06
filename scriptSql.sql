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

CREATE PROCEDURE agregar_personas @nombre varchar(100), @nom_etiqueta varchar(100);
as
begin
declare @id_persona int,
declare @id_etiqueta int,

set @id_persona=(select id from persona where nombre=@nombre);
set @id_etiqueta=(select id from etiqueta where nombre=@nom_etiqueta);

if @id_persona is null /*si no existe la persona la creo */
begin
insert into persona(nombre) values(@nombre);
set @id_persona=(select id from persona where nombre=@nombre);
end

if @id_etiqueta is null /*si no existe la etiquta la creo*/
begin
insert into etiqueta(nombre)values (@nom_etiqueta);
set @id_etiqueta=(select id from etiqueta where nombre=@nom_etiqueta);
end

insert into persona_etiqueta (id_persona,id_etiqueta) values (@id_persona,@id_etiqueta);

create view aniadir_personas as
select

p.nombre as 'Personas',
e.nombre as 'Etiqueta',
from persona p
inner join persona_etiqueta pe on p.id=pe.id_persona
inner join etiqueta e on pe.id_etiqueta=e.id
inner join persona p on pe.id_persona=p.id



end

exec agregar_personas ('yenifer','nombre');
exec agregar_personas ('maecelo','lendo');