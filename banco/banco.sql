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
    evento varchar(10) not null,
    oldJogoName varchar(100),
    oldJogoCategory varchar(100),
    oldJogoDescription varchar(100),
    oldJogoPrice decimal(10,2),
    oldJogoImage varchar(100),
    newJogoName varchar(100),
    newJogoCategory varchar(100),
    newJogoDescription varchar(100),
    newJogoPrice decimal(10,2),
    newJogoImage varchar(100)
);

create table usuarios_log (
	logID int primary key AUTO_INCREMENT,
	logData datetime not null DEFAULT NOW(),
	evento varchar(10) not null,
	oldUserName varchar(100),
	oldUserEmail varchar(100),
	oldUserPassword varchar(100),
	newUserName varchar(100),
	newUserEmail varchar(100),
	newUserPassword varchar(100)
);

CREATE VIEW view_jogos AS
SELECT *
FROM jogos;

DELIMITER $$

CREATE PROCEDURE insert_jogo(IN jogoName varchar(100), IN jogoCategory varchar(100), IN jogoDescription varchar(100), IN jogoPrice decimal(10,2), IN jogoImage varchar(100))
BEGIN
	INSERT INTO jogos(jogoName, jogoCategory, jogoDescription, jogoPrice, jogoImage)
	VALUES (jogoName, jogoCategory, jogoDescription, jogoPrice, jogoImage);
END $$
DELIMITER ;