-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2016 às 20:47
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_cow`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apresentacao`
--

CREATE TABLE `apresentacao` (
  `idapresentacao` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `aberta` binary(1) DEFAULT NULL,
  `data_hora_inicio_execucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apresentacao`
--

INSERT INTO `apresentacao` (`idapresentacao`, `nome`, `data_hora_inicio`, `data_hora_fim`, `aberta`, `data_hora_inicio_execucao`) VALUES
(1, 'Boi Bumbá em Parintins', '2016-06-24 20:00:00', '2016-06-24 22:30:00', 0x31, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `elemento`
--

CREATE TABLE `elemento` (
  `idelemento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` text,
  `ocorreu` binary(1) DEFAULT NULL,
  `posicao` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `parte_idparte` int(11) NOT NULL,
  `tipo_idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `elemento`
--

INSERT INTO `elemento` (`idelemento`, `nome`, `tempo`, `descricao`, `ocorreu`, `posicao`, `data_hora_inicio`, `data_hora_fim`, `parte_idparte`, `tipo_idtipo`) VALUES
(2, 'Cantoria', 720, NULL, 0x00, '2', NULL, NULL, 1, 1),
(3, 'Trilha', 82, NULL, 0x00, '1', NULL, NULL, 1, 1),
(4, 'canto novo', 200, NULL, NULL, NULL, NULL, NULL, 2, 1),
(5, 'anhanguera', 300, 'akjfa', NULL, NULL, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461236122);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parte`
--

CREATE TABLE `parte` (
  `idparte` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `apresentacao_idapresentacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parte`
--

INSERT INTO `parte` (`idparte`, `nome`, `apresentacao_idapresentacao`) VALUES
(1, 'Parte 1', 1),
(2, 'Parte 2', 1),
(3, 'Parte 3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
(1, 'Música'),
(2, 'Trilha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '10',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '10',
  `created_at` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instituicao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupoacesso` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `nome`, `sexo`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`, `endereco`, `complemento`, `instituicao`, `data_nasc`, `email`, `grupoacesso`, `cpf`, `tipo`) VALUES
(16, '201032', 'carlos philipe mendes bahia', '0', 'xg6I_LrtWiIHyQmS3_mSzIMFy_-BG9-5', '$2y$13$oJNvsY/slghrD6uTp/qO8uQJ0ohELFSCFc7sOErXt4sALE2qUo3dK', '', '10', '10', '1452973046', '1452973046', '', '', '', NULL, 'carlosphbahia@gmail.com', 'gestor', '', NULL),
(17, 'user', '', '', 'WiOo97NfQ0aoL35hfx8bysFdXxOjF72B', '$2y$13$UHgERuin0Ku5Cs4HYzo1T.EYxG0BigfXjntjc7P2jH8F/Fe9LClea', '', '10', '10', '1461350111', '1461350111', '', '', '', NULL, 'user@yii.com.hue.br', 'gestor', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apresentacao`
--
ALTER TABLE `apresentacao`
  ADD PRIMARY KEY (`idapresentacao`);

--
-- Indexes for table `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`idelemento`),
  ADD KEY `fk_elemento_tipo_idx` (`tipo_idtipo`),
  ADD KEY `fk_elemento_parte1_idx` (`parte_idparte`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`idparte`),
  ADD KEY `fk_parte_apresentacao1_idx` (`apresentacao_idapresentacao`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apresentacao`
--
ALTER TABLE `apresentacao`
  MODIFY `idapresentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `elemento`
--
ALTER TABLE `elemento`
  MODIFY `idelemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `parte`
--
ALTER TABLE `parte`
  MODIFY `idparte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `fk_elemento_parte1` FOREIGN KEY (`parte_idparte`) REFERENCES `parte` (`idparte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_elemento_tipo` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `parte`
--
ALTER TABLE `parte`
  ADD CONSTRAINT `fk_parte_apresentacao1` FOREIGN KEY (`apresentacao_idapresentacao`) REFERENCES `apresentacao` (`idapresentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
