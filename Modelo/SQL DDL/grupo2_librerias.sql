CREATE DATABASE grupo2_librerias;
USE grupo2_librerias;

CREATE TABLE cuentaUsuario (
direccionMail varchar (60),
contrasenia varchar(30)not null,
nombrePersona varchar(30) not null,
apellidoPersona varchar(30) not null,
telefono varchar (20) not null,
PRIMARY KEY (direccionMail)
);

INSERT INTO cuentaUsuario (direccionMail, contrasenia, nombrePersona, apellidoPersona, telefono)VALUES
('admin@mail.com', 'admin', 'administrador', 'administrador', '123456789');