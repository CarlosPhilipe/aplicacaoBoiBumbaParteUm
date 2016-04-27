-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2016 at 11:51 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `event_cow`
--

-- --------------------------------------------------------

--
-- Table structure for table `apresentacao`
--

CREATE TABLE `apresentacao` (
  `idapresentacao` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `elemento`
--

CREATE TABLE `elemento` (
  `idelemento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` text,
  `tipo_idtipo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elemento`
--

INSERT INTO `elemento` (`idelemento`, `nome`, `tempo`, `descricao`, `tipo_idtipo`) VALUES
(10, ' SENTIMENTO CAPRICHOSO', NULL, ' Chegada Apresentador/Posic. Marujada/Bailados', 1),
(11, ' SENSIBILIDADE', NULL, ' (David Assayag)Acústico  Entrada Marujada e Bailado', 1),
(12, ' CHAMADA DO BOI', NULL, ' Entrada dos Modulos', 1),
(13, ' CHEGADA DO MEU BOI', NULL, ' Inicio Marujada/Posic. Modulos', 1),
(14, ' TRILHA', NULL, ' Texto Tema Exaltação Folclórica', 1),
(15, ' ASA BRANCA,BOI DA LUA', NULL, ' David Pout-Pourri', 1),
(16, ' VIVA A CULTURA POPULAR', NULL, ' Inic. Exaltação/Apar. Boi Caprichoso', 1),
(17, ' RUFAR DO MEU TAMBOR', NULL, ' Evolução do Boi/Aparição da Sinhazinha', 1),
(18, ' ROSTINHO DE ANJO', NULL, ' Evolução da Sinhazinha/Amo/Pai Francisco/Catirina e Gazumbá', 1),
(19, ' 1º VERSO AMO', NULL, ' Rock Cid ', 1),
(20, ' VIVA A CULTURA POPULAR', NULL, ' Toada Letra e Musica/Aparição Sinhazinha', 1),
(21, ' 2º VERSO AMO', NULL, ' Sinhazinha/Boi,Pai Francisco,Catirina e Gazumbá/Apar. Porta Estandarte', 1),
(22, ' BALANÇO POPULAR', NULL, ' Evolução da Porta Estandarte/Posic. Vaqueirada', 1),
(23, ' VAQUEIROS DA FLORESTA 2x', NULL, ' Evolução da Vaqueirada', 1),
(24, ' UNIVERSO DE AMOR  ', NULL, ' Montagem Fig. Tipica', 1),
(25, ' 3º VERSO AMO', NULL, ' Alusão ao tema da noite/Montagem Fig. Tipica', 1),
(26, ' SENSIBILIDADE (David Assayag)', NULL, ' Prep. Inicio Fig. Tipica', 1),
(27, ' TRILHA', NULL, ' Texto Figura Tipica Farinheiro', 1),
(28, ' FARINHADA um de dois', NULL, ' Evolução da Fig. Típica/Aparição da Rainha', 1),
(29, ' FILHOS DA MUNDURUKÂNIA', NULL, ' Evolução da Rainha', 1),
(30, ' TRILHA', NULL, ' Texto Lenda', 1),
(31, ' EU SOU A LENDA um de dois', NULL, ' Execução da Lenda /Aparição da Cunhã', 1),
(32, ' CRIATURA DE TUPÃ', NULL, ' Evolução da Cunhã/Saida da Lenda', 1),
(33, ' GARRA DE MARUJEIRO', NULL, ' Galera/Davi Lev. Toada/Saida da Lenda/Posic. Tribos', 1),
(34, ' TRILHA', NULL, ' Texto/Celebração Indígena', 1),
(35, ' MAWACA', NULL, ' Celebração Indígena', 1),
(36, ' MÄI MARAKÄ', NULL, ' Upuracê Tribal', 1),
(37, ' LUZ DA COMULHÃO ', NULL, ' Pajé e Tuxauas/Mont. Ritual', 1),
(38, ' BALANÇO POPULAR', NULL, ' Galera/Mont. Ritual', 1),
(39, ' 5º VERSO AMO', NULL, ' Oxente/Mont. Ritual', 1),
(40, ' VIVA A CULTURA POPULAR', NULL, ' Galera/Mont. Ritual', 1),
(41, ' TRILHA', NULL, ' Texto Ritual', 1),
(42, ' MÄI MARAKÄ um de dois', NULL, ' Evolução do Ritual/Cênica da Cunhã/Aparição do Pajé', 1),
(43, ' NIRVANA XAMÂNICO', NULL, ' Evolução do Pajé/saída do Ritual', 1),
(44, ' A COR DO MEU PAÍS', NULL, ' Galera/Saída do Ritual', 1),
(45, ' 6º VERSO AMO', NULL, ' Desafio Amo Contrário(um aparte deputado)Posic. Tribo Coreografada', 1),
(46, ' TRILHA', NULL, ' Texto upuraçê', 1),
(47, ' MISTICA XINGUANA', NULL, ' Tribo Coreografada/Pajé', 1),
(48, ' SENTIMENTO CAPRICHOSO', NULL, ' Saida do Modulo/Galera', 1),
(49, ' VIVA A CULTURA POPULAR', NULL, ' Encerramento', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parte`
--

CREATE TABLE `parte` (
  `idparte` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parte`
--

INSERT INTO `parte` (`idparte`, `nome`) VALUES
(86, 'Parte 1');

-- --------------------------------------------------------

--
-- Table structure for table `parte_compoem_roteiro`
--

CREATE TABLE `parte_compoem_roteiro` (
  `parte_idparte` int(11) NOT NULL,
  `roteiro_idroteiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parte_contem_elemento`
--

CREATE TABLE `parte_contem_elemento` (
  `elemento_idelemento` int(11) NOT NULL,
  `parte_idparte` int(11) NOT NULL,
  `ocorreu` binary(1) DEFAULT NULL,
  `posicao` int(11) NOT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parte_contem_elemento`
--

INSERT INTO `parte_contem_elemento` (`elemento_idelemento`, `parte_idparte`, `ocorreu`, `posicao`, `data_hora_inicio`, `data_hora_fim`) VALUES
(19, 86, 0x31, 0, NULL, NULL),
(21, 86, 0x31, 0, NULL, NULL),
(25, 86, 0x31, 0, NULL, NULL),
(49, 86, 0x31, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roteiro`
--

CREATE TABLE `roteiro` (
  `idroteiro` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `apresentacao_idapresentacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`idtipo`, `nome`) VALUES
(1, 'Música'),
(2, 'Trilha');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nome`, `sexo`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`, `endereco`, `complemento`, `instituicao`, `data_nasc`, `email`, `grupoacesso`, `cpf`, `tipo`) VALUES
(16, '201032', 'carlos philipe mendes bahia', '0', 'xg6I_LrtWiIHyQmS3_mSzIMFy_-BG9-5', '$2y$13$oJNvsY/slghrD6uTp/qO8uQJ0ohELFSCFc7sOErXt4sALE2qUo3dK', '', '10', '10', '1452973046', '1452973046', '', '', '', NULL, 'carlosphbahia@gmail.com', 'gestor', '', NULL);

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
  ADD KEY `fk_elemento_tipo_idx` (`tipo_idtipo`);

--
-- Indexes for table `parte`
--
ALTER TABLE `parte`
  ADD PRIMARY KEY (`idparte`);

--
-- Indexes for table `parte_compoem_roteiro`
--
ALTER TABLE `parte_compoem_roteiro`
  ADD PRIMARY KEY (`parte_idparte`,`roteiro_idroteiro`),
  ADD KEY `fk_parte_has_roteiro_roteiro1_idx` (`roteiro_idroteiro`),
  ADD KEY `fk_parte_has_roteiro_parte1_idx` (`parte_idparte`);

--
-- Indexes for table `parte_contem_elemento`
--
ALTER TABLE `parte_contem_elemento`
  ADD PRIMARY KEY (`elemento_idelemento`,`parte_idparte`),
  ADD KEY `fk_elemento_has_parte_parte1_idx` (`parte_idparte`),
  ADD KEY `fk_elemento_has_parte_elemento1_idx` (`elemento_idelemento`);

--
-- Indexes for table `roteiro`
--
ALTER TABLE `roteiro`
  ADD PRIMARY KEY (`idroteiro`),
  ADD KEY `fk_roteiro_apresentacao1_idx` (`apresentacao_idapresentacao`);

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
  MODIFY `idapresentacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `elemento`
--
ALTER TABLE `elemento`
  MODIFY `idelemento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `parte`
--
ALTER TABLE `parte`
  MODIFY `idparte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `roteiro`
--
ALTER TABLE `roteiro`
  MODIFY `idroteiro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `fk_elemento_tipo` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parte_compoem_roteiro`
--
ALTER TABLE `parte_compoem_roteiro`
  ADD CONSTRAINT `fk_parte_has_roteiro_parte1` FOREIGN KEY (`parte_idparte`) REFERENCES `parte` (`idparte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parte_has_roteiro_roteiro1` FOREIGN KEY (`roteiro_idroteiro`) REFERENCES `roteiro` (`idroteiro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parte_contem_elemento`
--
ALTER TABLE `parte_contem_elemento`
  ADD CONSTRAINT `fk_elemento_has_parte_elemento1` FOREIGN KEY (`elemento_idelemento`) REFERENCES `elemento` (`idelemento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_elemento_has_parte_parte1` FOREIGN KEY (`parte_idparte`) REFERENCES `parte` (`idparte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roteiro`
--
ALTER TABLE `roteiro`
  ADD CONSTRAINT `fk_roteiro_apresentacao1` FOREIGN KEY (`apresentacao_idapresentacao`) REFERENCES `apresentacao` (`idapresentacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
