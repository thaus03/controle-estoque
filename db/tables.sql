ALTER DATABASE `ESTOQUE` CHARSET = Latin1 COLLATE = latin1_swedish_ci;
ALTER DATABASE `ESTOQUE` CHARSET = UTF8 COLLATE = utf8_general_ci;

CREATE TABLE Produto (
    Codigo int(6) zerofill PRIMARY KEY,
    Descricao   varchar(100) not null,
    Conteudo    varchar(20),
    Preco_cat   decimal(13,2),
    Preco_desc  decimal(13,2),
    Pontos      int
);

CREATE TABLE Franquias(
    id int PRIMARY KEY auto_increment,
    Franquia    varchar(30) not null,
    Endereco    varchar(50) 
);

CREATE TABLE Estoque(
    id int PRIMARY KEY auto_increment,
    Codigo int(6) zerofill,
    Responsavel varchar(50),
    Pedido int,
    Dt_faturamento date,
    Franquia int,
    Comprante varchar(30),
    FOREIGN KEY (Codigo) REFERENCES Produto(Codigo),
    FOREIGN KEY (Franquia) REFERENCES Franquias(id)
);


INSERT INTO Produto values (000652,"Black Creme De Barbear","85g",23.60,14.16,7);
INSERT INTO Produto values (000653,"Black Gel Após Barba","100g",21.50,12.90,6);
INSERT INTO Produto values (045015,"Lattitude Aerosol Trekking 48h","150ml/90G",29.90,14.95,7);
INSERT INTO Produto values (045016,"Lattitude Aerosol High Speed 48h","150ml/90G",29.90,14.95,7);
INSERT INTO Produto values (000357,"Bronze Express Loção Bloqueadora Fps 40","120g",69.00,34.50,22);
INSERT INTO Produto values (000100,"Hino´s Holy Óleo para Cabelo","140 ml",32.30,16.15,10),(000111,"iLeg Óleo Em Gel Líquido","100 ml",75.00,37.50,23);


Select Codigo, Descricao, Conteudo, Concat('R$ ',format(Preco_cat,2,'de_DE')) as Preco_cat, Concat('R$ ',format(Preco_desc,2,'de_DE')) as Preco_desc, Pontos From Produto;


insert INTO Franquias(Franquia,Endereco) values ("Méier",NULL);
insert INTO Franquias(Franquia,Endereco) values ("Centro - Uruguaiana",NULL);
insert INTO Franquias(Franquia,Endereco) values ("Largo do Machado",NULL);
insert INTO Franquias(Franquia,Endereco) values ("Recreio dos Bandeirantes",NULL);
insert INTO Franquias(Franquia,Endereco) values ("São Conrado",NULL);

select e.* from Estoque e inner join Produto P on e.Codigo = P.Codigo
where P.Descricao like '%%';

SELECT e.Codigo,P.Descricao as Produto,e.Responsavel,e.Pedido, DATE_FORMAT(e.Dt_faturamento, "%d-%m-%Y") as Dt_faturamento,F.Franquia, e.Comprante,P.Preco_cat, P.Preco_desc, P.Pontos from Estoque e 
INNER JOIN (Produto P, Franquias F) ON (e.Codigo = P.Codigo AND e.Franquia = F.id)
where P.Descricao like '%Bronze%';

drop view vw_estoque;
CREATE VIEW vw_estoque AS SELECT e.Codigo,P.Descricao as Produto,e.Responsavel,e.Pedido, DATE_FORMAT(e.Dt_faturamento, "%d-%m-%Y") as Dt_faturamento,F.Franquia, e.Comprante,P.Preco_cat as PCat, P.Preco_desc as PComp, P.Pontos from Estoque e 
INNER JOIN (Produto P, Franquias F) ON (e.Codigo = P.Codigo AND e.Franquia = F.id);


/* CREATE DATABASE ESTOQUE;
use ESTOQUE;
CREATE TABLE produto (
id int auto_increment primary key,
nome varchar(255),
preco decimal(10,2));

insert into produto values (null,"Pocophone",2000);
select * from produto; */