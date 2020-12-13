create schema uffinder;
use uffinder;

create table Usuarios(
id int primary key auto_increment,
isAdmin boolean not null DEFAULT 0,
email varchar(50) not null,
senha varchar(20) not null,
timestamp datetime not null,
active boolean not null DEFAULT 0);

create table Salas(
id int primary key auto_increment,
num int not null,
idTurma int not null,
idCampus int not null,
idPredio int not null,
idUsuario int not null);

create table Disciplinas(
id int primary key auto_increment,
cod varchar(10) not null,
nome varchar(100) not null,
UNIQUE (cod));

create table Turmas(
id int primary key auto_increment,
idDisc int not null,
cod varchar(3),
UNIQUE (idDisc, cod));

create table Campus(
id int primary key auto_increment,
nome varchar(20));

create table Predios(
id int primary key auto_increment,
nome varchar(40));

Alter table Salas add constraint 
foreign key(idUsuario) references Usuarios(id)
on delete cascade on update cascade;

Alter table Salas add constraint 
foreign key(idTurma) references Turmas(id)
on delete cascade on update cascade;

Alter table Salas add constraint 
foreign key(idCampus) references Campus(id)
on delete cascade on update cascade;

Alter table Salas add constraint 
foreign key(idPredio) references Predios(id)
on delete cascade on update cascade;

Alter table Turmas add constraint 
foreign key(idDisc) references Disciplinas(id)
on delete cascade on update cascade;
