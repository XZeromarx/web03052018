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
id_persona INT,
id_etiqueta INT,
FOREIGN KEY(id_persona) REFERENCES persona (id),
FOREIGN KEY (id_etiqueta) REFERENCES etiqueta (id),
PRIMARY KEY (id)
);

SELECT * FROM etiqueta

WHERE
INNER JOIN persona_etiqueta.id_persona = persona.id
INNER JOIN persona_etiqueta.id_etiqueta = etiqueta.id; 

mostrar nombre de etiqueta donde el id de la persona sea  igual al id del registro

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


DELIMITER $$
CREATE PROCEDURE personaEtiqueta()
BEGIN
DECLARE _cantPersonas INT = (SELECT COUNT(*) FROM persona)

WHILE _cantPersonas > 0 DO

DECLARE _nombrePersona VARCHAR(100) = (SELECT nombre FROM persona WHERE id = _cantPersonas);

END WHILE



END $$
DELIMITER;


SELECT e.nombre  
FROM persona_etiqueta pe
INNER JOIN persona p ON p.id = pe.id_persona
INNER JOIN etiqueta e ON e.id = pe.id_etiqueta

WHERE
p.nombre = 'aasdsd' AND
e.id = pe.id_etiqueta;


CALL agregar_personas ('aasdsd','nombrffe');
CALL agregar_personas ('maecelo','asdaaasd');
CALL agregar_personas ('marcelo','123111111sd');