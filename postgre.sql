CREATE TABLE task (
    id SERIAL PRIMARY KEY,
    data_do_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    titulo_da_tarefa VARCHAR(255) NOT NULL,
    quem_vai_executar_a_tarefa VARCHAR(8000) NOT NULL,
    descricao_da_atividade VARCHAR(255) NOT NULL,
    prioridade VARCHAR(40) NOT NULL,
    Prazo_de_entrega VARCHAR(20) NOT NULL
);

ALTER TABLE clientes
ADD COLUMN id SERIAL PRIMARY KEY,
ADD COLUMN data_do_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN nome VARCHAR(255),
ADD COLUMN email VARCHAR(255),
ADD COLUMN telefone VARCHAR(20);

CREATE TABLE users (
    id SERIAL PRIMARY KEY, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(80) NOT NULL, data_do_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*
sudo -u postgres psql

SELECT datname FROM pg_database;

*/