--Execute no phpMyAdmin

CREATE DATABASE cadastro_nis;
USE cadastro_nis;
CREATE TABLE usuarios(
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    NIS VARCHAR(11) NOT NULL
);

