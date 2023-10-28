CREATE DATABASE grupo2_librerias;
USE grupo2_librerias;

CREATE TABLE cuentaUsuario (
direccionMail varchar(60),
contrasenia varchar(30)not null,
nombrePersona varchar(30) not null,
apellidoPersona varchar(30) not null,
telefono varchar (20) not null,
PRIMARY KEY (direccionMail)
);

CREATE TABLE eventos (
id bigint AUTO_INCREMENT,
title varchar (60),
descripcion varchar(200),
start datetime,
end datetime,
textColor varchar(9),
backgroundColor varchar(9),
PRIMARY KEY (id)
);

INSERT INTO cuentaUsuario (direccionMail, contrasenia, nombrePersona, apellidoPersona, telefono)VALUES
('admin@mail.com', 'admin', 'administrador', 'administrador', '123456789');