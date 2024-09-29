DROP DATABASE IF EXISTS amigo_secreto;

CREATE DATABASE amigo_secreto
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

USE amigo_secreto;

CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pessoas (nome, email)
VALUES
('10 - João da Silva',    '10-joao@email.com'),
('10 - Maria Souza',      '10-maria@email.com'),
('10 - Pedro Santos',     '10-pedro@email.com'),
('10 - Ana Oliveira',     '10-ana@email.com'),
('10 - Carlos Pereira',   '10-carlos@email.com'),
('10 - Zeca Albuquerque', '10-zeca@email.com'),
('20 - João da Silva',    '20-joao@email.com'),
('20 - Maria Souza',      '20-maria@email.com'),
('20 - Pedro Santos',     '20-pedro@email.com'),
('20 - Ana Oliveira',     '20-ana@email.com'),
('20 - Carlos Pereira',   '20-carlos@email.com'),
('20 - Zeca Albuquerque', '20-zeca@email.com'),
('30 - João da Silva',    '30-joao@email.com'),
('30 - Maria Souza',      '30-maria@email.com'),
('30 - Pedro Santos',     '30-pedro@email.com'),
('30 - Ana Oliveira',     '30-ana@email.com'),
('30 - Carlos Pereira',   '30-carlos@email.com'),
('30 - Zeca Albuquerque', '30-zeca@email.com'),
('40 - João da Silva',    '40-joao@email.com'),
('40 - Maria Souza',      '40-maria@email.com'),
('40 - Pedro Santos',     '40-pedro@email.com'),
('40 - Ana Oliveira',     '40-ana@email.com'),
('40 - Carlos Pereira',   '40-carlos@email.com'),
('40 - Zeca Albuquerque', '40-zeca@email.com'),
('50 - João da Silva',    '50-joao@email.com'),
('50 - Maria Souza',      '50-maria@email.com'),
('50 - Pedro Santos',     '50-pedro@email.com'),
('50 - Ana Oliveira',     '50-ana@email.com'),
('50 - Carlos Pereira',   '50-carlos@email.com'),
('50 - Zeca Albuquerque', '50-zeca@email.com');

SELECT * FROM pessoas;