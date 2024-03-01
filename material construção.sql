-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cliente (
id_cliente SERIAL INT NOT NULL PRIMARY KEY,
nome_cliente VARCHAR(100) NOT NULL,
endereço_cliente VARCHAR(100) NOT NULL,
telefone_cliente INT(11),
email_cliente VARCHAR(100) NOT NULL
)

CREATE TABLE Produto (
id_produto SERIAL INT NOT NULL PRIMARY KEY,
nome_produto VARCHAR(100) NOT NULL,
descrição_produto VARCHAR(255) NOT NULL,
preço_produto MONEY NOT NULL,
estoque_produto INT NOT NULL,
)

CREATE TABLE Pedido (
id_pedido SERIAL INT NOT NULL PRIMARY KEY,
data_pedido DATE NOT NULL,
)

CREATE TABLE Item (
id_item SERIAL INT NOT NULL PRIMARY KEY,
quantidade_item INT NOT NULL,
preço_item MONEY NOT NULL,
)

CREATE TABLE ClienteProduto (
id_clienteProduto SERIAL INT NOT NULL PRIMARY KEY,
id_pedido INT NOT NULL,
id_cliente INT NOT NULL),
FOREIGN KEY(id_pedido) REFERENCES Pedido (id_pedido),
FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente)
)

CREATE TABLE ProdutoPedido (
id_produtoPedido SERIAL INT NOT NULL PRIMARY KEY,
id_produto INT NOT NULL,
id_pedido INT NOT NULL),
FOREIGN KEY(id_produto) REFERENCES Produto (id_produto),
FOREIGN KEY(id_pedido) REFERENCES Pedido (id_pedido)
)


SELECT * FROM cliente
SELECT * FROM Produto
SELECT * FROM pedido
SELECT * FROM item
SELECT * FROM clienteproduto
SELECT * FROM produtopedido

