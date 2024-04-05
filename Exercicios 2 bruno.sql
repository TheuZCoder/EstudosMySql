-- Criação da Tabela Fornecedor
CREATE TABLE Fornecedor (
    Fcodigo INT PRIMARY KEY,
    Fnome VARCHAR(255),
    Status VARCHAR(255) DEFAULT 'Ativo',
    Cidade VARCHAR(255)
);

-- Criação da Tabela Peça
CREATE TABLE Peca (
    Pcodigo INT PRIMARY KEY,
    Pnome VARCHAR(255) NOT NULL,
    Cor VARCHAR(255) NOT NULL,
    Peso DECIMAL(10, 2) NOT NULL,
    Cidade VARCHAR(255) NOT NULL
);

-- Criação da Tabela Instituicao
CREATE TABLE Instituicao (
    Icodigo INT PRIMARY KEY,
    nome VARCHAR(255)
);

-- Criação da Tabela Projeto
CREATE TABLE Projeto (
    PRcod INT PRIMARY KEY,
    PRnome VARCHAR(255),
    Cidade VARCHAR(255),
    Icod INT, -- Alteração feita aqui
    FOREIGN KEY (Icod) REFERENCES Instituicao(Icodigo)
);

-- Criação da Tabela Fornecimento
CREATE TABLE Fornecimento (
    Fcod INT,
    Pcod INT,
    PRcod INT,
    Quantidade INT,
    PRIMARY KEY (Fcod, Pcod, PRcod),
    FOREIGN KEY (Fcod) REFERENCES Fornecedor(Fcodigo),
    FOREIGN KEY (Pcod) REFERENCES Peca(Pcodigo),
    FOREIGN KEY (PRcod) REFERENCES Projeto(PRcod)
);

-- Adiciona índice à coluna Fcodigo na tabela Fornecedor
CREATE INDEX idx_Fornecedor_Fcodigo ON Fornecedor(Fcodigo);

-- Adiciona índice à coluna Pcodigo na tabela Peca
CREATE INDEX idx_Peca_Pcodigo ON Peca(Pcodigo);

-- Adiciona índice à coluna Icodigo na tabela Instituicao
CREATE INDEX idx_Instituicao_Icodigo ON Instituicao(Icodigo);

-- Adiciona índice à coluna PRcod na tabela Projeto
CREATE INDEX idx_Projeto_PRcod ON Projeto(PRcod);

-- Adiciona índice às colunas Fcod, Pcod e PRcod na tabela Fornecimento
CREATE INDEX idx_Fornecimento_codigos ON Fornecimento(Fcod, Pcod, PRcod);
