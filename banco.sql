
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

INSERT INTO itens(nome, preco, imagem) VALUES ("mouse", 799.99, "https://media.discordapp.net/attachments/778791407782985771/1246508881954209842/gpro.png?ex=665ca55c&is=665b53dc&hm=e27f4683fee6cee0213bde32c405af49cb76c9d3d2bf8fcd19bf768d36035040&=&format=webp&quality=lossless");
INSERT INTO itens(nome, preco, imagem) VALUES ("teclado", 513.00, "https://media.discordapp.net/attachments/778791407782985771/1246508882239557762/teclado.png?ex=665ca55c&is=665b53dc&hm=5571a50f8524846e8a0336b1f7a082350e81e87b840cd5d687626356a3100ec9&=&format=webp&quality=lossless&width=738&height=671");
INSERT INTO itens(nome, preco, imagem) VALUES ("headset", 1200.00, "https://media.discordapp.net/attachments/778791407782985771/1246508882822697000/headset.png?ex=665ca55c&is=665b53dc&hm=5851a097a8eb5eb6d35aee518ba0896183c51c968e91a4a947f9e71025c47683&=&format=webp&quality=lossless");
INSERT INTO itens(nome, preco, imagem) VALUES ("mousepad", 199.90, "https://img.terabyteshop.com.br/produto/g/mousepad-gamer-logitech-g240-cloth-943-000093_69477.png");