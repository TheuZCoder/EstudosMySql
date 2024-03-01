-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cliente (
id_cliente INT NOT NULL PRIMARY KEY,
nome_cliente VARCHAR(100) NOT NULL,
endereço_cliente VARCHAR(100) NOT NULL,
telefone_cliente NUMERIC(11) NOT NULL,
email_cliente VARCHAR(100) NOT NULL
);

CREATE TABLE Produto (
id_produto INT NOT NULL PRIMARY KEY,
nome_produto VARCHAR(100),
descrição_produto VARCHAR(255),
preço_produto MONEY NOT NULL,
estoque_produto INT
);

CREATE TABLE Pedido (
id_pedido INT NOT NULL PRIMARY KEY,
data_pedido DATE
);

CREATE TABLE Item (
id_item INT NOT NULL PRIMARY KEY,
quantidade_item INT NOT NULL,
preço_item MONEY NOT NULL
);

CREATE TABLE ClienteProduto (
id_clienteProduto INT NOT NULL PRIMARY KEY,
id_pedido INT NOT NULL,
id_cliente INT NOT NULL,
FOREIGN KEY(id_pedido) REFERENCES Pedido (id_pedido),
FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente)
);

CREATE TABLE ProdutoPedido (
id_produtoPedido INT NOT NULL PRIMARY KEY,
id_produto INT NOT NULL,
id_pedido INT NOT NULL,
FOREIGN KEY(id_produto) REFERENCES Produto (id_produto),
FOREIGN KEY(id_pedido) REFERENCES Pedido (id_pedido)
);

