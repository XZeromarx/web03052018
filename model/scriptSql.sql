CREATE DATABASE bd_web; -- DROP DATABASE bd_web;
                        

USE bd_web; -- USE mysql;


CREATE TABLE persona( --DROP TABLE persona;
id INT AUTO_INCREMENT,
nombre VARCHAR (100),
PRIMARY KEY (id)
); -- SELECT * FROM persona


CREATE TABLE etiqueta( -- DROP TABLE etiqueta;
id INT AUTO_INCREMENT,
nombre VARCHAR(100),
PRIMARY KEY (id)
); -- SELECT * FROM etiqueta;

CREATE TABLE persona_etiqueta( -- DROP TABLE persona_etiqueta;
id INT AUTO_INCREMENT,
id_persona INT,
id_etiqueta INT,
FOREIGN KEY(id_persona) REFERENCES persona (id),
FOREIGN KEY (id_etiqueta) REFERENCES etiqueta (id),
PRIMARY KEY (id)
); -- SELECT * FROM persona_etiqueta;



-- PROCEDIMIENTO QUE AGREGA PERSONAS Y ETIQUETAS
-- si no existe la persona registrada, se crea, sino, solo se rescata el id y se le asignan más etiquetas
-- o mismo con las etiquetas
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
-- PROCEDIMIENTO QUE AGREGA PERSONAS Y ETIQUETAS


-- CONCATENACION DE ETIQUETAS(trae todas las etiquetas juntas en relacion a X nombre)
SELECT GROUP_CONCAT(e.nombre SEPARATOR ',') AS 'etiquetas'
FROM persona_etiqueta pe
INNER JOIN persona p ON p.id = pe.id_persona
INNER JOIN etiqueta e ON e.id = pe.id_etiqueta
WHERE
p.id = 'x' AND
e.id = pe.id_etiqueta;
-- CONCATENACION DE ETIQUETAS


-- llamada al procedimiento para agregar personas
CALL agregar_personas ('nombre','etiqueta');
-- llamada al procedimiento para agregar personas

