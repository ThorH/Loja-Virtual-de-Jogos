-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2017 às 01:42
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`jogoID`, `jogoName`, `jogoCategory`, `jogoDescription`, `jogoPrice`, `jogoImage`) VALUES
(1, 'Dark Souls III', 'First Person Shooter', 'DARK SOULS™ continua a ultrapassar seus próprios limites em um ambicioso novo capítulo da série que definiu um gênero e que é aclamada pela crítica. Prepare-se para abraçar a escuridão!', '159.00', NULL),
(2, 'The Witcher® 3: Wild Hunt', 'Adventure RPG', 'Jogue como um caçador de recompensas exilado em busca da criança da profecia em um mundo de fantasia aberto, problemático e moralmente indiferente.', '80.00', NULL),
(3, 'The Elder Scrolls V: Skyrim', 'Adventure RPG', 'The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios. Skyrim reimagines and revolutionizes the open-world fantasy epic, bringing to life a complete virtual world open for you to explore any way you choose.', '40.00', NULL),
(4, 'Tabletop Simulator', 'Simulador', 'Tabletop Simulator is the only simulator where you can let your aggression out by flipping the table! There are no rules to follow: just you, a physics sandbox, and your friends. Make your own games and play how YOU want! Unlimited gaming possibilities!', '36.00', NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`jogoID`);

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
  MODIFY `jogoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
