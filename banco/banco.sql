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
	jogoDescription varchar(1000) not null,
	jogoPrice decimal(10,2) not null,
	jogoImage varchar(100)
);

create table jogos_log (
    logID int primary key AUTO_INCREMENT,
    logData datetime not null DEFAULT NOW(),
    oldJogoName varchar(100) not null,
    oldJogoCategory varchar(100) not null,
    oldJogoDescription varchar(100) not null
    oldJogoPrice decimal(10,2) not null,
    oldJogoImage varchar(100),
    newJogoName varchar(100) not null,
    newJogoCategory varchar(100) not null,
    newJogoDescription varchar(100) not null,
    newJogoPrice decimal(10,2) not null,
    newJogoImage varchar(100)
);

create table usuarios_log (
	logID int primary key AUTO_INCREMENT,
	logData datetime not null DEFAULT NOW(),
	oldUserName varchar(100) not null,
	oldUserEmail varchar(100) not null,
	oldUserPassword varchar(100) not null,
	newUserName varchar(100) not null,
	newUserEmail varchar(100) not null,
	newUserPassword varchar(100) not null
);