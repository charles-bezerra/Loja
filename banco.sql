drop database netInfo;


create database netInfo;
use netInfo;
create table Imagens(
		PES_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nome varchar(25) not null,
    descricao varchar(200) not null,
		tamanho varchar(15) not null,
    tipo_imagem varchar(25) not null,
    PES_IMG longblob
);
create table Tecnico(
		cod int primary key,
    nome varchar(100) unique not null,
		setor varchar(50) not null
);
create table Pessoa(
		cpf varchar(20) primary key,
		senha varchar(50) unique not null,
		admin varchar(10) not null,
		nome varchar(100) unique not null,
		telefone varchar(25) not null,
		email varchar(150) not null,
		idade int not null
);

select * from Manutencao_Agendada;

create table Manutencao_Agendada(
		cod int auto_increment,
    codCliente varchar(20),
		data_ varchar(10) not null,
		rua varchar(50) not null,
		bairro varchar(50) not null,
		numero varchar(10) not null,
		setor varchar(20) not null,
		cidade varchar(40) not null,
    primary key(cod),
    foreign key(codCliente) references Pessoa(cpf)
);
create table Visita(
		codManu int,
		codTec int,
		feito varchar(20) not null,
    data_ varchar(10) not null,
		orcamento varchar(25) not null,
		primary key (codManu, codTec),
		foreign key(codManu) references  Manutencao_Agendada(cod),
		foreign key(codTec) references Tecnico(cod)
);


delimiter |
create procedure add_pessoa(cpf varchar(24), senha varchar(50),admin varchar(10),nome varchar(100), telefone varchar(25), email varchar(150), idade int)
BEGIN
			insert into Pessoa
			values(cpf,senha, admin,nome,telefone,email,idade);
END;
|
delimiter |
create procedure rm_manutencao(codigo int)
BEGIN
			delete from Manutencao_Agendada
    	where cod = codigo;
END;
|

delimiter |
create procedure add_visita(codM int, codT int, f varchar(20), d varchar(10), o varchar(25))
BEGIN
			insert into Visita values (codM,codT,f,d,o);
END;
|

insert into Tecnico values(2017110,'MONTEIRO','SISTEMAS');
insert into Tecnico values(2017111,'ANTONIO','ELETRÔNICA LOPTOPS');
insert into Tecnico values(2017112,'JARBAS','IMPRESSORAS');

select * from Tecnico;

insert into Pessoa values('017.626.944-15', '12345678', 'True', "Admin Sistema", '999560759','charlesbezerra@gmail.com',18);
use netInfo;
insert into Visita values(3,2017110,'weqreqwfff','10000','2187219')
select * from Visita;
select p.nome,p.cpf,m.data_,m.cod,m.bairro,m.rua,m.numero from Manutencao_Agendada as m, Pessoa as p, Visita as v where m.codCliente = '111.111.111-11' and p.cpf = '111.111.111-11';
select * from Pessoa;
select * from Manutencao_Agendada;
use netInfo;
insert into Pessoa values('111.111.111-11','junior','False',"Charles", '99999999','charlesbezerra@hotmail.com', 19);
insert into Manutencao_Agendada values(2,"111.111.111-11","02","das vasolras",'vital',"860","redes","Caico");
