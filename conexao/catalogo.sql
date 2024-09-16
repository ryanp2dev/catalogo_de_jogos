--BANCO DE DADOS: catalogo

CREATE TABLE jogos(
    id serial not null,
    nome varchar(50) not null,
    categoria varchar(50) not null,
    classificacao varchar(50) not null,
    ano int not null,
    valor numeric(10,2) not null,
    primary key (id)
);

