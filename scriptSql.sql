CREATE DATABASE bd_web; -- drop database bd_web;
                        -- USE mysql;

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

SELECT * FROM etiqueta

WHERE
INNER JOIN persona_etiqueta.id_persona = persona.id
INNER JOIN persona_etiqueta.id_etiqueta = etiqueta.id; 



DELIMITER $$
CREATE PROCEDURE agregar_personas( 
    IN _nombreEntrante VARCHAR(100),                               
    IN _nom_etiquetaEntrante VARCHAR(100) ) --DROP PROCEDURE agregar_personas;
   BEGIN

    
    DECLARE _existeNombrePersona BIT DEFAULT 0;
    DECLARE _existeNombreEtiqueta BIT DEFAULT 0;
    DECLARE _fkPersona INT;
    DECLARE _fkEtiqueta INT;

    SET _existeNombrePersona = (SELECT COUNT(*) FROM persona WHERE nombre = _nombreEntrante);
    SET _existeNombreEtiqueta = (SELECT COUNT(*) FROM etiqueta WHERE nombre = _nom_etiquetaEntrante);

    IF _existeNombrePersona = 0 THEN

        INSERT INTO persona VALUES(NULL,_nombreEntrante);
    END IF;
    SET _fkPersona =(SELECT id FROM persona WHERE nombre = _nombreEntrante);
    

    

    IF _existeNombreEtiqueta = 0 THEN 

        INSERT INTO etiqueta VALUES(NULL,_nom_etiquetaEntrante);
    
    END IF;

    SET _fkEtiqueta = (SELECT id FROM etiqueta WHERE nombre = _nom_etiquetaEntrante);


    INSERT INTO persona_etiqueta VALUES (NULL,_fkPersona,_fkEtiqueta); -- afuera


   END $$
   DELIMITER;





CALL agregar_personas ('asd','nombre');
CALL agregar_personas ('maecelo','lendo');
CALL agregar_personas ('marcelo','asdasd');