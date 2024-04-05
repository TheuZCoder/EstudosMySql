CREATE TABLE Produto (
    id_pizza SERIAL PRIMARY KEY,
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
    id_atendente SERIAL,
    nome_atendente VARCHAR(255),
    cargo_atendente VARCHAR(255),
    telefone_atendente VARCHAR(15),
    
    PRIMARY KEY(id_atendente)
);

CREATE TABLE Clientes(
    id_cliente SERIAL,
    endereco_cliente VARCHAR(255),
    telefone_cliente VARCHAR(15),
    email_cliente VARCHAR(255),
    nome_cliente VARCHAR(255),
    PRIMARY KEY(id_cliente)
);

CREATE INDEX idx_id_atendente ON AtendenteClientes (id_atendente);
CREATE INDEX idx_id_cliente ON AtendenteClientes (id_cliente);

CREATE TABLE cliente_pedido (
    id_cliente SERIAL,
    id_pedido SERIAL,
    id_atendente SERIAL,
    FOREIGN KEY(id_cliente, id_atendente) REFERENCES AtendenteClientes(id_cliente, id_atendente),
    FOREIGN KEY(id_pedido) REFERENCES Pedidos(id_pedido)
);

CREATE INDEX idx_id_cliente_pedido ON cliente_pedido (id_cliente, id_atendente, id_pedido);