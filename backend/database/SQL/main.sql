--create database e_commercer

drop schema public;
create schema usuario;
create schema comercio;
create schema produto;
create schema pedido;
create schema avaliacao;

-- Esquema de usuários (Adm e Cliente)
create table usuario.cliente(
	id serial not null primary key,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14),
	telefone char (11)
);

create table usuario.adm(
	id serial not null primary key,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14),
	telefone char (11)
);

create table usuario.endereco (
	id serial not null primary key,
	id_cliente integer,
	logradouro varchar(40) not null,
	numero integer,
	bairro varchar(20) not null,
	cep numeric (8,0),
	nome_cidade varchar (32),
	nome_estado varchar (16),
	foreign key(id_cliente) references usuario.cliente(id)
);


-- Esquema de comércio (Loja e o Vendedor)
create table comercio.vendedor(
	id serial not null primary key,
	nome varchar (40) not null,
	email varchar (40) not null,
	senha varchar (40) not null,
	cpf char (11) not null,
	cnpj char (14),
	telefone char (11) not null,
	id_endereco integer,
	foreign key(id_endereco) references usuario.endereco(id)
);

create table comercio.loja(
	id serial not null primary key,
	nome varchar (40) not null,
	descricao varchar (300) not null,
	id_vendedor integer,
	id_avaliacao integer,
	foreign key(id_vendedor) references comercio.vendedor(id)
); -- O restante das chaves estrangeiras estão no final


-- Esquema do produto (Categoria e Produto)
create table produto.categoria(
	id serial not null primary key,
	nome varchar (40) not null,
	descricao varchar (300) not null,
	sub_categ varchar (40) not null
);

create table produto.produto(
	id serial not null primary key,
	nome varchar (40) not null,
	id_categoria integer,
	valor numeric (7,2) not null,
	descricao varchar (300),
	peso numeric (5,2),
	tamanho varchar(4),
	cor varchar (30),
	id_loja integer,
	id_catg integer,
	id_avaliacao integer,
	foreign key(id_catg) references produto.categoria(id)
);-- O restante das chaves estrangeiras estão no final


--Esquema de pedido (Carrinho, Pedido e Item do Carrinho)
create table pedido.item_carrinho(
	id serial primary key not null,
	id_produto integer,
	tamanho varchar(4),
	cor varchar (30),
	quantidade integer not null
); -- As chaves estrangeiras estão no final

create table pedido.carrinho(
	id serial not null primary key,
	id_cliente integer,
	id_item integer,
	foreign key(id_item) references pedido.item_carrinho(id),
	foreign key(id_cliente) references usuario.cliente(id)
);

create table pedido.pedido(
	id serial not null primary key,
	id_carrinho integer,
	data date,
	status varchar (25),
	foreign key(id_carrinho) references pedido.carrinho(id)
);

create table pedido.pagamento(
	id serial not null primary key,
	tipo varchar (25),
	status varchar (25),
	id_pedido integer,
	foreign key(id_pedido) references pedido.pedido(id)
);


-- Esquema avaliacão (Loja e Produto)
create table avaliacao.avaliacao_loja(
	id serial not null primary key,
	data date,
	quant_estrela integer,
	comentario varchar (300),
	id_loja integer,
	id_pedido integer,
	foreign key(id_loja) references comercio.loja(id),
	foreign key (id_pedido) references pedido.pedido(id)
);

create table avaliacao.avaliacao_produto(
	id serial not null primary key,
	data date,
	quant_estrela integer,
	comentario varchar (300),
	id_produto integer,
	id_pedido integer,
	foreign key(id_produto) references produto.produto(id),
	foreign key(id_pedido) references pedido.pedido(id)
);


-- Cahves estrangeiras que so podem ser adicionasa depois (Regras do pgamin 4)
alter table comercio.loja
add foreign key(id_avaliacao) references avaliacao.avaliacao_loja(id);

alter table produto.produto
add foreign key(id_loja) references comercio.loja(id),
add foreign key(id_avaliacao) references avaliacao.avaliacao_produto(id);

alter table pedido.item_carrinho
add foreign key(id_produto) references produto.produto(id);