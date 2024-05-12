-- Esquema endereço
create table endereco.estado(  
	id SERIAL PRIMARY KEY,
	nome varchar(20) not null,
	sigla char(2) not null
);

create table endereco.cidade(
	id SERIAL PRIMARY KEY,
	nome varchar (20) not null,
	cep char(8),
	id_uf integer,
	foreign key(id_uf) references endereco.estado(id)
);

create table endereco.endereco (
	id SERIAL PRIMARY KEY,
	logradouro varchar(40) not null,
	numero integer not null,
	bairro varchar(20) not null,
	cep char(8),
	id_cidade integer,
	foreign key(id_cidade) references endereco.cidade(id) 
);

-- Esquema usuário
create table usuario.cliente(
	id SERIAL PRIMARY KEY,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14),
	telefone char (11),
	id_endereco integer,
	foreign key(id_endereco) references endereco.endereco(id)
);

create table usuario.adm(
	id SERIAL PRIMARY KEY,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14),
	telefone char (11)
);

-- Esquema comércio (loja e o vendedor)
create table comercio.vendedor(
	id SERIAL PRIMARY KEY,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14) not null,
	telefone char (11) not null,
	id_endereco integer,
	foreign key(id_endereco) references endereco.endereco(id)
);

create table comercio.loja(
	id SERIAL PRIMARY KEY,
	nome varchar (40) not null,
	descricao varchar (300) not null,
	id_vendedor integer,
	id_avaliacao integer,
	foreign key(id_vendedor) references comercio.vendedor(id)
); -- O restante das chaves estrangeiras estão no final

