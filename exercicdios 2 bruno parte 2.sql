-- Criação da Tabela Fornecedor
CREATE TABLE Fornecedor (
    Fcod INT PRIMARY KEY,
    Fnome VARCHAR(255),
    Status VARCHAR(255) DEFAULT 'Ativo',
    Fone VARCHAR(20),
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da Tabela Cidade
CREATE TABLE Cidade (
    Ccod INT PRIMARY KEY,
    Cnome VARCHAR(255),
    uf VARCHAR(2)
);

-- Criação da Tabela Peça
CREATE TABLE Peca (
    Pcod INT PRIMARY KEY,
    Pnome VARCHAR(255) NOT NULL,
    Cor VARCHAR(255) NOT NULL,
    Peso DECIMAL(10, 2) NOT NULL,
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da Tabela Projeto
CREATE TABLE Projeto (
    PRcod INT PRIMARY KEY,
    PRnome VARCHAR(255),
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da Tabela Fornecimento
CREATE TABLE Fornecimento (
    Fcod INT,
    Pcod INT,
    PRcod INT,
    Quantidade INT,
    PRIMARY KEY (Fcod, Pcod, PRcod),
    FOREIGN KEY (Fcod) REFERENCES Fornecedor(Fcod),
    FOREIGN KEY (Pcod) REFERENCES Peca(Pcod),
    FOREIGN KEY (PRcod) REFERENCES Projeto(PRcod)
);

-- Adiciona índice à coluna Ccod na tabela Fornecedor
CREATE INDEX idx_Fornecedor_Ccod ON Fornecedor(Ccod);

-- Adiciona índice à coluna Ccod na tabela Peca
CREATE INDEX idx_Peca_Ccod ON Peca(Ccod);

-- Adiciona índice à coluna Ccod na tabela Projeto
CREATE INDEX idx_Projeto_Ccod ON Projeto(Ccod);

-- Adiciona índice às colunas Fcod, Pcod e PRcod na tabela Fornecimento
CREATE INDEX idx_Fornecimento_codigos ON Fornecimento(Fcod, Pcod, PRcod);
