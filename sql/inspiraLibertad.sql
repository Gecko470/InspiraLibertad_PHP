
CREATE DATABASE InspiraLibertad;

USE InspiraLibertad;

CREATE TABLE Usuarios(

  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE VARCHAR (100) NOT NULL,
  EMAIL VARCHAR (40) NOT NULL,
  TELEFONO VARCHAR(20) NOT NULL,
  USUARIO VARCHAR(30) NOT NULL,
  PASS VARCHAR(100) NOT NULL,
  TOKEN VARCHAR(100),
  FECHA TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(ID)

);

CREATE TABLE Mensajes(

  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE VARCHAR (100) NOT NULL,
  EMAIL VARCHAR (40) NOT NULL,
  MENSAJE VARCHAR(300) NOT NULL,
  FECHA TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(ID)

);

CREATE TABLE Productos(

  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE VARCHAR(50) NOT NULL,
  PRECIO FLOAT NOT NULL,
  VIDEO VARCHAR(100) NOT NULL,
  PRIMARY KEY(ID)

);

CREATE TABLE Compras(

  ID INT NOT NULL AUTO_INCREMENT,
  PRODUCTOID INT NOT NULL,
  USUARIOID INT NOT NULL,
  FECHA TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(ID),
  FOREIGN KEY(PRODUCTOID) REFERENCES Productos(ID),
  FOREIGN KEY(USUARIOID) REFERENCES Usuarios(ID)

);