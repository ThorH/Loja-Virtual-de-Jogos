-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2017 às 01:50
-- Versão do servidor: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_jogos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE IF NOT EXISTS `jogos` (
  `jogoID` int(11) NOT NULL,
  `jogoName` varchar(100) NOT NULL,
  `jogoCategory` varchar(100) NOT NULL,
  `jogoDescription` varchar(1000) NOT NULL,
  `jogoPrice` decimal(10,2) NOT NULL,
  `jogoImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`jogoID`, `jogoName`, `jogoCategory`, `jogoDescription`, `jogoPrice`, `jogoImage`) VALUES
(1, 'Dark Souls III', 'First Person Shooter', 'DARK SOULS™ continua a ultrapassar seus próprios limites em um ambicioso novo capítulo da série que definiu um gênero e que é aclamada pela crítica. Prepare-se para abraçar a escuridão!', '159.00', 'images/jogos/DarkSoulsIII.jpg'),
(2, 'The Witcher® 3: Wild Hunt', 'Adventure RPG', 'Jogue como um caçador de recompensas exilado em busca da criança da profecia em um mundo de fantasia aberto, problemático e moralmente indiferente.', '80.00', 'images/jogos/TheWitcher3.jpg'),
(3, 'The Elder Scrolls V: Skyrim', 'Adventure RPG', 'The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios. Skyrim reimagines and revolutionizes the open-world fantasy epic, bringing to life a complete virtual world open for you to explore any way you choose.', '40.00', 'images/jogos/Skyrim.jpg'),
(4, 'Tabletop Simulator', 'Simulador', 'Tabletop Simulator is the only simulator where you can let your aggression out by flipping the table! There are no rules to follow: just you, a physics sandbox, and your friends. Make your own games and play how YOU want! Unlimited gaming possibilities!', '36.00', 'images/jogos/TabletopSimulator.jpg'),
(5, 'Fallout: New Vegas', 'Adventure RPG', 'Welcome to Vegas. New Vegas. Enjoy your stay!', '20.00', 'images/jogos/FalloutNewVegas.jpg'),
(6, 'Chivalry: Medieval Warfare', 'Adventure RPG', 'Besiege castles and raid villages in Chivalry: Medieval Warfare, a fast-paced medieval first person slasher with a focus on multiplayer battles.', '45.00', 'images/jogos/ChivalryMedievalWarfare.jpg'),
(7, 'Final Fantasy XIV Online', 'Adventure RPG', 'FINAL FANTASY® XIV: A Realm Reborn™ is a massively multiplayer online role-playing game (MMORPG) for Windows® PC, PlayStation®3 and PlayStation®4 that invites you to explore the realm of Eorzea with friends from around the world.', '50.00', 'images/jogos/FinalFantasyXIVOnline.jpg'),
(8, 'Counter Strike Global Offensive', 'First Person Shooter', 'Counter-Strike: Global Offensive (CS: GO) expandirá na jogabilidade de ação baseada em equipes na qual foi pioneiro quando foi lançado há 12 anos. CS: GO contém novos mapas, personagens e armas, além de conter versões atualizadas de conteúdos do CS clássico (como de_dust).', '25.00', 'images/jogos/CounterStrikeGlobalOffensive.jpg'),
(9, 'Garry''s Mod', 'Simulador', 'Garry''s Mod is a physics sandbox. There aren''t any predefined aims or goals. We give you the tools and leave you to play.', '20.00', 'images/jogos/GarrysMod.jpg'),
(10, 'Full Throttle Remastered', 'Adventure RPG', 'Lançado pela LucasArts em 1995, Full Throttle é uma aventura gráfica clássica do lendário Tim Schafer. O jogo conta a história de Ben Throttle, o líder brigão da gangue de motoqueiros Polecats, que se vê metido em uma história de motos, massacres e morte.', '28.00', 'images/jogos/FullThrottleRemastered.jpg'),
(11, 'Grand Theft Auto V', 'Simulador', 'Um malandro de rua, um ladrão de bancos aposentado e um psicopata aterrorizante devem realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', '100.00', 'images/jogos/GrandTheftAutoV.jpg'),
(12, 'Mount & Blade: Warband', 'Simulador', 'In a land torn asunder by incessant warfare, it is time to assemble your own band of hardened warriors and enter the fray. Lead your men into battle, expand your realm, and claim the ultimate prize: the throne of Calradia!', '30.00', 'images/jogos/MountAndBladeWarband.jpg');

--
-- Acionadores `jogos`
--
DELIMITER $$
CREATE TRIGGER `delete_jogos` BEFORE DELETE ON `jogos`
 FOR EACH ROW INSERT INTO jogos_log (evento, oldJogoName, oldJogoCategory, oldJogoDescription, oldJogoPrice, oldJogoImage) Values ("Deletado", old.jogoName, old.jogoCategory, old.jogoDescription, old.jogoPrice, old.jogoImage)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jogos` AFTER INSERT ON `jogos`
 FOR EACH ROW INSERT INTO jogos_log (evento, newJogoName, newJogoCategory, newJogoDescription, newJogoPrice, newJogoImage) Values ("Inserido", new.jogoName, new.jogoCategory, new.jogoDescription, new.jogoPrice, new.jogoImage)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_jogos` BEFORE UPDATE ON `jogos`
 FOR EACH ROW insert into jogos_log(evento, oldJogoName, oldJogoCategory, oldJogoDescription, oldJogoPrice, oldJogoImage, newJogoName, newJogoCategory, newJogoDescription, newJogoPrice, newJogoImage) values ("Update", old.jogoName, old.jogoCategory, old.jogoDescription, old.jogoPrice, old.jogoImage, new.jogoName, new.jogoCategory, new.jogoDescription, new.jogoPrice, new.jogoImage)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos_log`
--

CREATE TABLE IF NOT EXISTS `jogos_log` (
  `logID` int(11) NOT NULL,
  `logData` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evento` varchar(15) DEFAULT NULL,
  `oldJogoName` varchar(100) DEFAULT NULL,
  `oldJogoCategory` varchar(100) DEFAULT NULL,
  `oldJogoDescription` varchar(1000) DEFAULT NULL,
  `oldJogoPrice` decimal(10,2) DEFAULT NULL,
  `oldJogoImage` varchar(100) DEFAULT NULL,
  `newJogoName` varchar(100) DEFAULT NULL,
  `newJogoCategory` varchar(100) DEFAULT NULL,
  `newJogoDescription` varchar(1000) DEFAULT NULL,
  `newJogoPrice` decimal(10,2) DEFAULT NULL,
  `newJogoImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos_log`
--

INSERT INTO `jogos_log` (`logID`, `logData`, `evento`, `oldJogoName`, `oldJogoCategory`, `oldJogoDescription`, `oldJogoPrice`, `oldJogoImage`, `newJogoName`, `newJogoCategory`, `newJogoDescription`, `newJogoPrice`, `newJogoImage`) VALUES
(1, '2017-06-12 11:45:46', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Final Fantasy XIV Online', 'Adventure RPG', 'FINAL FANTASY® XIV: A Realm Reborn™ is a massively multiplayer online role-playing game (MMORPG) for Windows® PC, PlayStation®3 and PlayStation®4 that invites you to explore the realm of Eorzea with friends from around the world.', '50.00', 'images/jogos/FinalFantasyXIVOnline.jpg'),
(2, '2017-06-12 11:49:24', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Counter Strike Global Offensive', 'First Person Shooter', 'Counter-Strike: Global Offensive (CS: GO) expandirá na jogabilidade de ação baseada em equipes na qual foi pioneiro quando foi lançado há 12 anos. CS: GO contém novos mapas, personagens e armas, além de conter versões atualizadas de conteúdos do CS clássico (como de_dust).', '25.00', 'images/jogos/CounterStrikeGlobalOffensive.jpg'),
(3, '2017-06-12 19:16:01', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Garry''s Mod', 'Simulador', 'Garry''s Mod is a physics sandbox. There aren''t any predefined aims or goals. We give you the tools and leave you to play.', '20.00', 'images/jogos/GarrysMod.jpg'),
(4, '2017-06-12 19:17:23', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Full Throttle Remastered', 'Adventure RPG', 'Lançado pela LucasArts em 1995, Full Throttle é uma aventura gráfica clássica do lendário Tim Schafer. O jogo conta a história de Ben Throttle, o líder brigão da gangue de motoqueiros Polecats, que se vê metido em uma história de motos, massacres e morte.', '28.00', 'images/jogos/FullThrottleRemastered.jpg'),
(5, '2017-06-12 19:18:12', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Grand Theft Auto V', 'Simulador', 'Um malandro de rua, um ladrão de bancos aposentado e um psicopata aterrorizante devem realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', '100.00', NULL),
(6, '2017-06-12 19:18:19', 'Update', 'Grand Theft Auto V', 'Simulador', 'Um malandro de rua, um ladrão de bancos aposentado e um psicopata aterrorizante devem realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', '100.00', NULL, 'Grand Theft Auto V', 'Simulador', 'Um malandro de rua, um ladrão de bancos aposentado e um psicopata aterrorizante devem realizar uma série de golpes ousados para sobreviver em uma cidade implacável onde não podem confiar em ninguém, nem mesmo um no outro.', '100.00', 'images/jogos/GrandTheftAutoV.jpg'),
(7, '2017-06-12 19:19:46', 'Inserido', NULL, NULL, NULL, NULL, NULL, 'Mount & Blade: Warband', 'Simulador', 'In a land torn asunder by incessant warfare, it is time to assemble your own band of hardened warriors and enter the fray. Lead your men into battle, expand your realm, and claim the ultimate prize: the throne of Calradia!', '30.00', 'images/jogos/MountAndBladeWarband.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Evento` varchar(10) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `idLog` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`Data`, `Evento`, `Descricao`, `idLog`) VALUES
('2017-06-09 18:04:15', 'Inserido', 'Final Fantasy XIV', 1),
('2017-06-09 18:09:34', 'Deletado', 'Final Fantasy XIV', 2),
('2017-06-09 18:24:00', 'Deletado', 'Usuario Joao', 3),
('2017-06-11 22:42:30', 'Inserido', 'Jogo Fallout: New Vegas', 5),
('2017-06-11 22:44:31', 'Inserido', 'Jogo Chivalry: Medieval Warfare', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`userID`, `userName`, `userEmail`, `userPassword`) VALUES
(1, 'Victor', 'victor@victor.com', 'victor'),
(2, 'Gustavo', 'gustavo@gustavo.com', 'gustavo'),
(3, 'Maico', 'maico@maico.com', 'maico'),
(4, 'Thor', 'thor@thor.com', 'thor');

--
-- Acionadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `delete_usuarios` BEFORE DELETE ON `usuarios`
 FOR EACH ROW insert into usuarios_log(evento, oldUserName, oldUserEmail, oldUserPassword) values ("Deletado", old.userName, old.userEmail, old.userPassword)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_usuarios` AFTER INSERT ON `usuarios`
 FOR EACH ROW insert into usuarios_log(evento, newUserName, newUserEmail, newUserPassword) values ("Inserido", new.userName, new.userEmail, new.userPassword)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_usuario` BEFORE UPDATE ON `usuarios`
 FOR EACH ROW insert into usuarios_log(evento, oldUserName, oldUserEmail, oldUserPassword, newUserName, newUserEmail, newUserPassword) values ("Update", old.userName, old.userEmail, old.userPassword, new.userName, new.userEmail, new.userPassword)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_log`
--

CREATE TABLE IF NOT EXISTS `usuarios_log` (
  `logID` int(11) NOT NULL,
  `logData` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evento` varchar(15) NOT NULL,
  `oldUserName` varchar(100) NOT NULL,
  `oldUserEmail` varchar(100) NOT NULL,
  `oldUserPassword` varchar(100) NOT NULL,
  `newUserName` varchar(100) NOT NULL,
  `newUserEmail` varchar(100) NOT NULL,
  `newUserPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`jogoID`);

--
-- Indexes for table `jogos_log`
--
ALTER TABLE `jogos_log`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `usuarios_log`
--
ALTER TABLE `usuarios_log`
  ADD PRIMARY KEY (`logID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `jogoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jogos_log`
--
ALTER TABLE `jogos_log`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios_log`
--
ALTER TABLE `usuarios_log`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
