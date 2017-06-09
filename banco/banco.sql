create table usuarios (
	userID int primary key AUTO_INCREMENT,
	userName varchar(100) not null,
	userEmail varchar(100) not null,
	userPassword varchar(100) not null,
	unique(userName)
);

create table jogos (
	jogoID int primary key AUTO_INCREMENT,
	jogoName varchar(100) not null,
	jogoCategory varchar(100) not null,
	jogoDescription varchar(100) not null,
	jogoPrice decimal(10,2) not null,
	jogoImage varchar(100)
);