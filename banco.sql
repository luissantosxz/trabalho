
CREATE DATABASE IF NOT EXISTS banco;


USE banco;


CREATE TABLE IF NOT EXISTS usuario (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    cep VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tarefas(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    objetivo VARCHAR(255) NOT NULL,
    idUsuario INTEGER NOT NULL,
    foreign KEY (idUsuario) references usuario(id),
    concluido BOOLEAN
);
