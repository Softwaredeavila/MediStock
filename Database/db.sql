create database if not exists citas;

use citas;

CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
nombre_completo VARCHAR(100) NOT NULL
);

CREATE TABLE citas (
id INT AUTO_INCREMENT PRIMARY KEY,
usuario_id INT,
medico VARCHAR(100) NOT NULL,
fecha DATE NOT NULL,
hora TIME NOT NULL,
FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

INSERT INTO  usuarios ( usuario, password, nombre_completo)
VALUES ('admin', 'admin123', 'Jesus De Avila');

