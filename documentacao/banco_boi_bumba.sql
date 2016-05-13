-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2016 às 11:11
-- Versão do servidor: 5.5.44
-- versão do PHP: 5.4.45-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `event_cow`
--
CREATE DATABASE IF NOT EXISTS `event_cow` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `event_cow`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apresentacao`
--

CREATE TABLE IF NOT EXISTS `apresentacao` (
  `idapresentacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `aberta` binary(1) DEFAULT NULL,
  `data_hora_inicio_execucao` datetime DEFAULT NULL,
  `status_execucao` int(1) NOT NULL DEFAULT '0',
  `data_hora_termino_execucao` datetime DEFAULT NULL,
  PRIMARY KEY (`idapresentacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `idelemento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` text,
  `status` char(1) DEFAULT NULL,
  `posicao` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `parte_idparte` int(11) NOT NULL,
  `tipo_idtipo` int(11) NOT NULL,
  `item_iditem` int(11) DEFAULT NULL,
  PRIMARY KEY (`idelemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apresentacao` int(11) DEFAULT NULL,
  `parte` int(11) DEFAULT NULL,
  `elemento` int(11) DEFAULT NULL,
  `tempo_consumido` int(11) DEFAULT NULL,
  `data_hora_termino_execucao` datetime DEFAULT NULL,
  `diferenca` int(11) DEFAULT NULL,
  `user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `imagem` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`iditem`, `nome`, `descricao`, `imagem`) VALUES
(3, 'Sinhazinha da Fazenda', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'http://s2.glbimg.com/VDeH18vWZ-7XFTCujDARFqg-e60=/620x465/s.glbimg.com/jo/g1/f/original/2013/07/01/galeria18_sinhazinha.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
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

CREATE TABLE IF NOT EXISTS `parte` (
  `idparte` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `apresentacao_idapresentacao` int(11) NOT NULL,
  PRIMARY KEY (`idparte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
(1, 'Música'),
(2, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tipo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `nome`, `sexo`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`, `endereco`, `complemento`, `instituicao`, `data_nasc`, `email`, `grupoacesso`, `cpf`, `tipo`) VALUES
(1, 'presidente', '', '', 'i8ERUzT-B3pJZJuHemVgaAcWR6rKqEFo', '$2y$13$AmM9rDAoCUzgJEZlAwfRpuklIha3W1.ZicjM7h5LoBGONt464QJpy', '', '10', '10', '1462914311', '1462914311', NULL, NULL, NULL, NULL, 'presidente@ifestival.com.br', 'presidente', NULL, NULL),
(2, 'cronometrista', '', '', 'KDrN6uPK4BbhfAS34p3GccAwpKVtwmDY', '$2y$13$P4.a57xJwy0OMK2V9a8lp.VB5lrKGcTfY2MyodXJmAQOVv0GwyYwi', '', '10', '10', '1462914350', '1462914350', NULL, NULL, NULL, NULL, 'cronometrista@ifestival.com.br', 'cronometrista', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
