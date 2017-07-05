CREATE TABLE republica(
	nome VARCHAR(100),
	cidade VARCHAR(100) NOT NULL,
	rua VARCHAR(100) NOT NULL,
	bairro VARCHAR(100) NOT NULL,
	numerovagas INTEGER NOT NULL,
	contato VARCHAR(20) NOT NULL,
	gerente VARCHAR(100) NOT NULL,
	PRIMARY KEY(nome)
);

CREATE TABLE usuario(
	nome VARCHAR(100) NOT NULL,
	foto VARCHAR(100) NOT NULL,
	nascimento VARCHAR(15) NOT NULL,
	username VARCHAR(50) UNIQUE,
	email VARCHAR(100),
	senha VARCHAR(50) NOT NULL,
	cidadeAtual VARCHAR(50) NOT NULL,
	sexo VARCHAR(10) NOT NULL,
	telefone VARCHAR(20) NOT NULL,
	tipo VARCHAR(20),
	nomerepublica VARCHAR(100),
	FOREIGN KEY(nomerepublica) REFERENCES republica(nome),
	PRIMARY KEY(email)
);

ALTER TABLE republica ADD CONSTRAINT fk_gerente FOREIGN KEY (gerente) REFERENCES usuario(email);

CREATE TABLE aviso(
	id SERIAL,
	titulo VARCHAR(100) NOT NULL,
	texto VARCHAR(100) NOT NULL,
	autor VARCHAR(100),
	nomerepublica VARCHAR(100) NOT NULL,
	FOREIGN KEY(autor) REFERENCES usuario(email),
	FOREIGN KEY(nomerepublica) REFERENCES republica(nome),
	PRIMARY KEY(id)
);
CREATE TABLE produto(
	id SERIAL,
	nome VARCHAR(100) NOT NULL,
	descricao VARCHAR(100) NOT NULL,
	quantidade INTEGER NOT NULL,
	nomerepublica VARCHAR(100) NOT NULL,
	FOREIGN KEY(nomerepublica) REFERENCES republica(nome),
	PRIMARY KEY(id)
);
CREATE TABLE despesa(
	id SERIAL,
	titulo VARCHAR(100) NOT NULL,
	valor REAL NOT NULL,
	dataVencimento VARCHAR(15) NOT NULL,
	nomerepublica VARCHAR(100) NOT NULL,
	FOREIGN KEY(nomerepublica) REFERENCES republica(nome),
	PRIMARY KEY(id)
);
CREATE TABLE tarefa(
	id SERIAL,
	dia VARCHAR(15) NOT NULL,
	descricao VARCHAR(100) NOT NULL,
	responsavel VARCHAR(100) NOT NULL,
	nomerepublica VARCHAR(100) NOT NULL,
	FOREIGN KEY(responsavel) REFERENCES usuario(email),
	FOREIGN KEY(nomerepublica) REFERENCES republica(nome),
	PRIMARY KEY(id)
);
