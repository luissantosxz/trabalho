
CREATE DATABASE IF NOT EXISTS banco;


USE banco;
DROP TABLE IF EXISTS itensCarrinho;
DROP TABLE IF EXISTS itens;

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


CREATE TABLE IF NOT EXISTS itens(
        id INTEGER AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        preco FLOAT NOT NULL,
        imagem VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS itensCarrinho(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    idItem INTEGER NOT NULL,
    quantidade INTEGER NOT NULL,
    foreign KEY (idItem) references itens(id),
    idUsuario INTEGER NOT NULL,
    foreign KEY (idUsuario) references usuario(id)
);

INSERT INTO itens(nome, preco, imagem) VALUES ("mouse", 799.99, "https://www.logitechstore.com.br/media/catalog/product/cache/1/image/634x545/9df78eab33525d08d6e5fb8d27136e95/h/i/high_resolution_png-pro_x_superlight_wireless_gaming_mouse_fob_white.png");
INSERT INTO itens(nome, preco, imagem) VALUES ("teclado", 513.00, "https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/pro-x-keyboard/pro-x-keyboard-gallery-2.png?v=1");
INSERT INTO itens(nome, preco, imagem) VALUES ("headset", 1200.00, "https://resource.logitech.com/content/dam/gaming/en/products/pro-wireless/pro-wireless-headset-gallery-1.png");
INSERT INTO itens(nome, preco, imagem) VALUES ("mousepad", 199.90, "https://resource.logitechg.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/gaming/en/products/g740-large-cloth-mouse-pad/galley/g740-gallery-1.png?v=1");