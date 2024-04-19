CREATE TABLE Produto (
    id_pizza SERIAL PRIMARY KEY,
    image_pizza VARCHAR(255),
    nome_pizza VARCHAR(255),
    descricao_pizza VARCHAR(255),
    preco_pizza DECIMAL(10, 2)
);

CREATE INDEX idx_id_pizza ON Produto (id_pizza);

CREATE TABLE Pedidos (
    id_pedido SERIAL PRIMARY KEY,
    data_pedido DATE,
    status_pedido VARCHAR(255),
    nome_pedido VARCHAR(255)
);

CREATE INDEX idx_id_pedido ON Pedidos (id_pedido);

CREATE TABLE Atendente (
    id_atendente SERIAL PRIMARY KEY,
    nome_atendente VARCHAR(255),
    cargo_atendente VARCHAR(255),
    telefone_atendente VARCHAR(15),
    senha_atendente VARCHAR(255)
);

CREATE INDEX idx_id_atendente ON Atendente (id_atendente);

CREATE TABLE Clientes (
    id_cliente SERIAL PRIMARY KEY,
    nome_cliente VARCHAR(255),
    email_cliente VARCHAR(255),
    endereco_cliente VARCHAR(255),
    telefone_cliente VARCHAR(15),
    senha_cliente VARCHAR(255)
);

CREATE INDEX idx_id_clientes ON Clientes (id_cliente);

CREATE TABLE Pedido_Produto (
    id_pedido SERIAL,
    id_produto SERIAL,
    quantidade INT DEFAULT 1,
    FOREIGN KEY (id_pedido) REFERENCES Pedidos (id_pedido),
    FOREIGN KEY (id_produto) REFERENCES Produto (id_pizza),
    PRIMARY KEY (id_pedido, id_produto)
);

CREATE INDEX idx_id_pedido_produto ON Pedido_Produto (id_pedido, id_produto);
