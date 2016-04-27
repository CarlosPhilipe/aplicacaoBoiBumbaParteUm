-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/04/2016 às 14:23
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `event_cow`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `apresentacao`
--

CREATE TABLE IF NOT EXISTS `apresentacao` (
  `idapresentacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  PRIMARY KEY (`idapresentacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `idelemento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` text,
  `tipo_idtipo` int(11) NOT NULL,
  PRIMARY KEY (`idelemento`),
  KEY `fk_elemento_tipo_idx` (`tipo_idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Fazendo dump de dados para tabela `elemento`
--

INSERT INTO `elemento` (`idelemento`, `nome`, `tempo`, `descricao`, `tipo_idtipo`) VALUES
(10, ' SENTIMENTO CAPRICHOSO', 275, ' Chegada Apresentador/Posic. Marujada/Bailados', 1),
(11, ' SENSIBILIDADE', 127, ' (David Assayag)Acústico  Entrada Marujada e Bailado', 1),
(12, ' CHAMADA DO BOI', 183, ' Entrada dos Modulos', 1),
(13, ' CHEGADA DO MEU BOI', 124, ' Inicio Marujada/Posic. Modulos', 1),
(14, ' TRILHA', 148, ' Texto Tema Exaltação Folclórica', 1),
(15, ' ASA BRANCA,BOI DA LUA',30, ' David Pout-Pourri', 1),
(16, ' VIVA A CULTURA POPULAR', 242, ' Inic. Exaltação/Apar. Boi Caprichoso', 1),
(17, ' RUFAR DO MEU TAMBOR', 56, ' Evolução do Boi/Aparição da Sinhazinha', 1),
(18, ' ROSTINHO DE ANJO', 131, ' Evolução da Sinhazinha/Amo/Pai Francisco/Catirina e Gazumbá', 1),
(19, ' 1º VERSO AMO', 294, ' Rock Cid ', 1),
(20, ' VIVA A CULTURA POPULAR', 60, ' Toada Letra e Musica/Aparição Sinhazinha', 1),
(21, ' 2º VERSO AMO', 299, ' Sinhazinha/Boi,Pai Francisco,Catirina e Gazumbá/Apar. Porta Estandarte', 1),
(22, ' BALANÇO POPULAR', 218, ' Evolução da Porta Estandarte/Posic. Vaqueirada', 1),
(23, ' VAQUEIROS DA FLORESTA 2x', 51, ' Evolução da Vaqueirada', 1),
(24, ' UNIVERSO DE AMOR  ', 72, ' Montagem Fig. Tipica', 1),
(25, ' 3º VERSO AMO', 189, ' Alusão ao tema da noite/Montagem Fig. Tipica', 1),
(26, ' SENSIBILIDADE (David Assayag)', 139, ' Prep. Inicio Fig. Tipica', 1),
(27, ' TRILHA', 275, ' Texto Figura Tipica Farinheiro', 1),
(28, ' FARINHADA um de dois', 94, ' Evolução da Fig. Típica/Aparição da Rainha', 1),
(29, ' FILHOS DA MUNDURUKÂNIA', 65, ' Evolução da Rainha', 1),
(30, ' TRILHA', 106, ' Texto Lenda', 1),
(31, ' EU SOU A LENDA um de dois', 16, ' Execução da Lenda /Aparição da Cunhã', 1),
(32, ' CRIATURA DE TUPÃ', 101, ' Evolução da Cunhã/Saida da Lenda', 1),
(33, ' GARRA DE MARUJEIRO', 89, ' Galera/Davi Lev. Toada/Saida da Lenda/Posic. Tribos', 1),
(34, ' TRILHA', 298, ' Texto/Celebração Indígena', 1),
(35, ' MAWACA', 288, ' Celebração Indígena', 1),
(36, ' MÄI MARAKÄ', 155, ' Upuracê Tribal', 1),
(37, ' LUZ DA COMULHÃO ', 228, ' Pajé e Tuxauas/Mont. Ritual', 1),
(38, ' BALANÇO POPULAR', 268, ' Galera/Mont. Ritual', 1),
(39, ' 5º VERSO AMO', 105, ' Oxente/Mont. Ritual', 1),
(40, ' VIVA A CULTURA POPULAR', 195, ' Galera/Mont. Ritual', 1),
(41, ' TRILHA', 32, ' Texto Ritual', 1),
(42, ' MÄI MARAKÄ um de dois', 35, ' Evolução do Ritual/Cênica da Cunhã/Aparição do Pajé', 1),
(43, ' NIRVANA XAMÂNICO', 234, ' Evolução do Pajé/saída do Ritual', 1),
(44, ' A COR DO MEU PAÍS', 196, ' Galera/Saída do Ritual', 1),
(45, ' 6º VERSO AMO', 88, ' Desafio Amo Contrário(um aparte deputado)Posic. Tribo Coreografada', 1),
(46, ' TRILHA', 73, ' Texto upuraçê', 1),
(47, ' MISTICA XINGUANA', 250, ' Tribo Coreografada/Pajé', 1),
(48, ' SENTIMENTO CAPRICHOSO', 223, ' Saida do Modulo/Galera', 1),
(49, ' VIVA A CULTURA POPULAR', 111, ' Encerramento', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461236122);

-- --------------------------------------------------------

--
-- Estrutura para tabela `parte`
--

CREATE TABLE IF NOT EXISTS `parte` (
  `idparte` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idparte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parte_compoem_roteiro`
--

CREATE TABLE IF NOT EXISTS `parte_compoem_roteiro` (
  `parte_idparte` int(11) NOT NULL,
  `roteiro_idroteiro` int(11) NOT NULL,
  PRIMARY KEY (`parte_idparte`,`roteiro_idroteiro`),
  KEY `fk_parte_has_roteiro_roteiro1_idx` (`roteiro_idroteiro`),
  KEY `fk_parte_has_roteiro_parte1_idx` (`parte_idparte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parte_contem_elemento`
--

CREATE TABLE IF NOT EXISTS `parte_contem_elemento` (
  `elemento_idelemento` int(11) NOT NULL,
  `parte_idparte` int(11) NOT NULL,
  `ocorreu` binary(1) DEFAULT NULL,
  PRIMARY KEY (`elemento_idelemento`,`parte_idparte`),
  KEY `fk_elemento_has_parte_parte1_idx` (`parte_idparte`),
  KEY `fk_elemento_has_parte_elemento1_idx` (`elemento_idelemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `roteiro`
--

CREATE TABLE IF NOT EXISTS `roteiro` (
  `idroteiro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `apresentacao_idapresentacao` int(11) NOT NULL,
  PRIMARY KEY (`idroteiro`),
  KEY `fk_roteiro_apresentacao1_idx` (`apresentacao_idapresentacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
(1, 'Música'),
(2, 'Trilha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id`, `username`, `nome`, `sexo`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`, `endereco`, `complemento`, `instituicao`, `data_nasc`, `email`, `grupoacesso`, `cpf`, `tipo`) VALUES
(16, '201032', 'carlos philipe mendes bahia', '0', 'xg6I_LrtWiIHyQmS3_mSzIMFy_-BG9-5', '$2y$13$oJNvsY/slghrD6uTp/qO8uQJ0ohELFSCFc7sOErXt4sALE2qUo3dK', '', '10', '10', '1452973046', '1452973046', '', '', '', NULL, 'carlosphbahia@gmail.com', 'gestor', '', NULL),
(17, 'user', '', '', 'WiOo97NfQ0aoL35hfx8bysFdXxOjF72B', '$2y$13$UHgERuin0Ku5Cs4HYzo1T.EYxG0BigfXjntjc7P2jH8F/Fe9LClea', '', '10', '10', '1461350111', '1461350111', NULL, NULL, NULL, NULL, 'user@yii.com.hue.br', NULL, 'gestor', NULL),
(18, 'marioacjr', '', '', 'B5B_dl3eo7jAi8lzOxkoFZL4AqfX-e5H', '$2y$13$Ex8uYDWHuqS6Le13r.SgEuuPbO6yphFjDX1X7mQI5SkuNjCcoIRIi', '', '10', '10', '1461236194', '1461236194', NULL, NULL, NULL, NULL, 'marioacjr@gmail.com', NULL, 'gestor', NULL);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `fk_elemento_tipo` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `parte_compoem_roteiro`
--
ALTER TABLE `parte_compoem_roteiro`
  ADD CONSTRAINT `fk_parte_has_roteiro_parte1` FOREIGN KEY (`parte_idparte`) REFERENCES `parte` (`idparte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parte_has_roteiro_roteiro1` FOREIGN KEY (`roteiro_idroteiro`) REFERENCES `roteiro` (`idroteiro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `parte_contem_elemento`
--
ALTER TABLE `parte_contem_elemento`
  ADD CONSTRAINT `fk_elemento_has_parte_elemento1` FOREIGN KEY (`elemento_idelemento`) REFERENCES `elemento` (`idelemento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_elemento_has_parte_parte1` FOREIGN KEY (`parte_idparte`) REFERENCES `parte` (`idparte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `roteiro`
--
ALTER TABLE `roteiro`
  ADD CONSTRAINT `fk_roteiro_apresentacao1` FOREIGN KEY (`apresentacao_idapresentacao`) REFERENCES `apresentacao` (`idapresentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
