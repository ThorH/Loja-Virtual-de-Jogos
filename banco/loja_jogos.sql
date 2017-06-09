-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2017 às 23:27
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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

CREATE TABLE `jogos` (
  `jogoID` int(11) NOT NULL,
  `jogoName` varchar(100) NOT NULL,
  `jogoCategory` varchar(100) NOT NULL,
  `jogoDescription` varchar(1000) NOT NULL,
  `jogoPrice` decimal(10,2) NOT NULL,
  `jogoImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`jogoID`, `jogoName`, `jogoCategory`, `jogoDescription`, `jogoPrice`, `jogoImage`) VALUES
(1, 'Dark Souls III', 'First Person Shooter', 'DARK SOULSâ„¢ continua a ultrapassar seus prÃ³prios limites em um ambicioso novo capÃ­tulo da sÃ©rie que definiu um gÃªnero e que Ã© aclamada pela crÃ­tica. Prepare-se para abraÃ§ar a escuridÃ£o!', '159.00', NULL),
(2, 'The WitcherÂ® 3: Wild Hunt', 'Adventure RPG', 'Jogue como um caÃ§ador de recompensas exilado em busca da crianÃ§a da profecia em um mundo de fantasia aberto, problemÃ¡tico e moralmente indiferente.', '80.00', NULL),
(3, 'The Elder Scrolls V: Skyrim', 'Adventure RPG', 'The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios. Skyrim reimagines and revolutionizes the open-world fantasy epic, bringing to life a complete virtual world open for you to explore any way you choose.', '40.00', NULL),
(4, 'Tabletop Simulator', 'Simulador', 'Tabletop Simulator is the only simulator where you can let your aggression out by flipping the table! There are no rules to follow: just you, a physics sandbox, and your friends. Make your own games and play how YOU want! Unlimited gaming possibilities!', '36.00', NULL);

--
-- Acionadores `jogos`
--
DELIMITER $$
CREATE TRIGGER `delete_jogos` BEFORE DELETE ON `jogos` FOR EACH ROW INSERT INTO log (Evento, Descricao) Values ("Deletado", concat("Jogo ",old.jogoName))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_jogos` AFTER INSERT ON `jogos` FOR EACH ROW INSERT INTO log (Evento, Descricao) Values ("Inserido", concat("Jogo ", new.jogoName))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `Data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Evento` varchar(10) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `idLog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`Data`, `Evento`, `Descricao`, `idLog`) VALUES
('2017-06-09 18:04:15', 'Inserido', 'Final Fantasy XIV', 1),
('2017-06-09 18:09:34', 'Deletado', 'Final Fantasy XIV', 2),
('2017-06-09 18:24:00', 'Deletado', 'Usuario Joao', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TRIGGER `delete_usuarios` BEFORE DELETE ON `usuarios` FOR EACH ROW INSERT INTO log (Evento, Descricao) Values ("Deletado", concat("Usuario ", old.userNAME))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_usuarios` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO log (Evento, Descricao) Values ("Inserido",concat("Usuario ",new.userName))
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`jogoID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `jogoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
