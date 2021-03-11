CREATE DATABASE anexo5_proof;
use anexo5_proof;

CREATE TABLE estado(
    id int primary key not null auto_increment,
    nombre VARCHAR(50)
);

CREATE TABLE documento(
	
        id int primary key not null auto_increment,
        dni_trabajador VARCHAR(8),
        nombre_trabajador VARCHAR(100),
        cargo_trabajador VARCHAR(200),
        dni_supervisor VARCHAR(8),
        nombre_supervisor VARCHAR (200),
        url_firma_trabajador VARCHAR(200),
        url_firma_supervisor VARCHAR(200),
        fecha_documento TIMESTAMP,
        fecha_contrato TIMESTAMP,
        url_pdf VARCHAR(200),
        id_estado int,
		FOREIGN KEY(id_estado) REFERENCES estado(id)

);

CREATE TABLE documento_detalle(
	
    id int primary key not null auto_increment,
    fecha timestamp,
    id_documento int,
	FOREIGN KEY(id_documento) REFERENCES documento(id)
);



INSERT INTO estado (nombre) values ('entrada'),('espera'),('listo');
