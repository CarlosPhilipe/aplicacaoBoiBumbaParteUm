-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Maio-2016 às 21:44
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
  `data_hora_inicio_execucao` datetime DEFAULT NULL,
  `status_execucao` int(1) NOT NULL DEFAULT '0',
  `data_hora_termino_execucao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apresentacao`
--

INSERT INTO `apresentacao` (`idapresentacao`, `nome`, `data_hora_inicio`, `data_hora_fim`, `aberta`, `data_hora_inicio_execucao`, `status_execucao`, `data_hora_termino_execucao`) VALUES
(1, 'Boi Bumbá em Parintins - Primeira noite', '2016-06-24 20:00:00', '2016-06-24 22:10:00', 0x31, '2016-05-06 20:21:12', 0, '2016-05-06 20:35:07'),
(2, 'Boi Bumbá em Parintins - Segunda noite', '2016-06-24 20:00:00', '2016-06-24 22:30:00', 0x30, '2016-05-05 21:51:51', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `elemento`
--

CREATE TABLE `elemento` (
  `idelemento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` text,
  `status` char(1) DEFAULT NULL,
  `posicao` varchar(45) DEFAULT NULL,
  `data_hora_inicio` datetime DEFAULT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `parte_idparte` int(11) NOT NULL,
  `tipo_idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `elemento`
--

INSERT INTO `elemento` (`idelemento`, `nome`, `tempo`, `descricao`, `status`, `posicao`, `data_hora_inicio`, `data_hora_fim`, `parte_idparte`, `tipo_idtipo`) VALUES
(1, 'Cantoria', 5, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', '2', NULL, NULL, 1, 1),
(2, 'Trilha', 82, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', '1', NULL, NULL, 1, 1),
(3, 'Canto Novo', 200, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', NULL, NULL, NULL, 2, 1),
(4, 'Anhanguera', 5, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', NULL, NULL, NULL, 3, 1),
(5, 'Canto Inicial', 300, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', NULL, NULL, NULL, 4, 1),
(6, 'Vida Terra', 480, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', NULL, NULL, NULL, 4, 1),
(7, 'Abre Boca', 280, 'Lorem Ipsum é simplesmente uma simulação de texto ', 'a', NULL, NULL, NULL, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(10) UNSIGNED NOT NULL,
  `apresentacao` int(11) DEFAULT NULL,
  `parte` int(11) DEFAULT NULL,
  `elemento` int(11) DEFAULT NULL,
  `tempo_consumido` int(11) DEFAULT NULL,
  `data_hora_termino_execucao` datetime DEFAULT NULL,
  `diferenca` int(11) DEFAULT NULL,
  `user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `apresentacao`, `parte`, `elemento`, `tempo_consumido`, `data_hora_termino_execucao`, `diferenca`, `user`) VALUES
(94, 1, 2, 3, 2, '2016-05-06 07:09:07', -198, 0),
(95, 1, 3, 4, 1, '2016-05-06 07:09:08', -299, 0),
(96, 1, 2, 3, 198, '2016-05-06 07:12:26', -2, 0),
(97, 1, 3, 4, 1, '2016-05-06 07:12:27', -299, 0),
(98, 1, 3, 4, 36, '2016-05-06 07:13:03', -264, 0),
(99, 1, 2, 3, 2, '2016-05-06 07:13:05', -198, 0),
(100, 1, 3, 4, 16, '2016-05-06 07:13:21', -284, 0),
(101, 1, 2, 3, 1, '2016-05-06 07:13:22', -199, 0),
(102, 1, 3, 4, 363, '2016-05-06 07:19:25', 63, 0),
(103, 1, 3, 4, 2, '2016-05-06 07:19:27', -298, 0),
(104, 1, 3, 4, 89, '2016-05-06 07:20:56', -211, 0),
(105, 1, 2, 3, 1, '2016-05-06 07:20:57', -199, 0),
(106, 1, 1, 2, 1, '2016-05-06 07:20:58', -81, 0),
(107, 1, 3, 4, 31, '2016-05-06 07:21:29', -269, 0),
(108, 1, 3, 4, 47, '2016-05-06 07:22:16', -253, 0),
(109, 1, 3, 4, 187, '2016-05-06 07:25:23', -113, 0),
(110, 1, 3, 4, 50, '2016-05-06 07:26:13', -250, 0),
(111, 1, 3, 4, 283, '2016-05-06 07:30:56', -17, 0),
(112, 1, 3, 4, 25, '2016-05-06 07:31:21', -275, 0),
(113, 1, 3, 4, 62, '2016-05-06 07:32:23', -238, 0),
(114, 1, 3, 4, 120, '2016-05-06 07:34:23', -180, 0),
(115, 1, 3, 4, 13, '2016-05-06 07:34:36', -287, 0),
(116, 1, 3, 4, 29, '2016-05-06 07:35:05', -271, 0),
(117, 1, 3, 4, 39, '2016-05-06 07:35:44', -261, 0),
(118, 1, 3, 4, 590, '2016-05-06 07:45:34', 290, 0),
(119, 1, 3, 4, 61, '2016-05-06 07:46:35', -239, 0),
(120, 1, 3, 4, 140, '2016-05-06 07:48:55', -160, 0),
(121, 1, 3, 4, 79, '2016-05-06 07:50:14', -221, 0),
(122, 1, 3, 4, 84, '2016-05-06 07:51:38', -216, 0),
(123, 1, 3, 4, 74, '2016-05-06 07:52:52', -226, 0),
(124, 1, 3, 4, 246, '2016-05-06 07:56:58', -54, 0),
(125, 1, 3, 4, 62, '2016-05-06 07:58:00', -238, 0),
(126, 1, 3, 4, 76, '2016-05-06 07:59:16', -224, 0),
(127, 1, 3, 4, 4, '2016-05-06 07:59:20', -296, 0),
(128, 1, 3, 4, 47, '2016-05-06 08:00:07', -253, 0),
(129, 1, 3, 4, 4, '2016-05-06 08:00:11', -296, 0),
(130, 1, 2, 3, 2, '2016-05-06 08:00:13', -198, 0),
(131, 1, 2, 3, 7, '2016-05-06 08:00:20', -193, 0),
(132, 1, 3, 4, 33, '2016-05-06 08:00:53', -267, 0),
(133, 1, 3, 4, 3, '2016-05-06 08:00:56', -297, 0),
(134, 1, 3, 4, 1, '2016-05-06 08:00:57', -299, 0),
(135, 1, 2, 3, 1, '2016-05-06 08:00:58', -199, 0),
(136, 1, 1, 2, 1, '2016-05-06 08:00:59', -81, 0),
(137, 1, 1, 1, 1, '2016-05-06 08:01:00', -719, 0),
(138, 1, 1, 1, -2964, '2016-05-06 08:06:17', -3684, 0),
(139, 1, 3, 4, -149, '2016-05-06 08:09:51', -449, 0),
(140, 1, 2, 3, 4, '2016-05-06 08:09:55', -196, 0),
(141, 1, 3, 4, -5, '2016-05-06 08:13:30', -305, 0),
(142, 1, 2, 3, 2, '2016-05-06 08:13:32', -198, 0),
(143, 1, 1, 2, 2, '2016-05-06 08:13:34', -80, 0),
(144, 1, 3, 4, 10, '2016-05-06 08:13:44', -290, 0),
(145, 1, 3, 4, 1, '2016-05-06 08:13:45', -299, 0),
(146, 1, 3, 4, 0, '2016-05-06 08:13:45', -300, 0),
(147, 1, 3, 4, 0, '2016-05-06 08:13:45', -300, 0),
(148, 1, 3, 4, 0, '2016-05-06 08:13:45', -300, 0),
(149, 1, 3, 4, 70, '2016-05-06 08:14:55', 230, 0),
(150, 1, 3, 4, -82, '2016-05-06 08:15:01', 382, 0),
(151, 1, 3, 4, 1, '2016-05-06 08:15:02', 299, 0),
(152, 1, 3, 4, 0, '2016-05-06 08:15:02', 300, 0),
(153, 1, 3, 4, 1, '2016-05-06 08:15:03', 299, 0),
(154, 1, 3, 4, 0, '2016-05-06 08:15:03', 300, 0),
(155, 1, 3, 4, 11, '2016-05-06 08:15:14', 289, 0),
(156, 1, 3, 4, 0, '2016-05-06 08:15:14', 300, 0),
(157, 1, 3, 4, 0, '2016-05-06 08:15:14', 300, 0),
(158, 1, 3, 4, 0, '2016-05-06 08:15:14', 300, 0),
(159, 1, 3, 4, 0, '2016-05-06 08:15:14', 300, 0),
(160, 1, 3, 4, 0, '2016-05-06 08:15:14', 300, 0),
(161, 1, 3, 4, 70, '2016-05-06 08:16:24', 230, 0),
(162, 1, 3, 4, 0, '2016-05-06 08:16:24', 300, 0),
(163, 1, 3, 4, 0, '2016-05-06 08:16:24', 300, 0),
(164, 1, 3, 4, 0, '2016-05-06 08:16:24', 300, 0),
(165, 1, 3, 4, 0, '2016-05-06 08:16:24', 300, 0),
(166, 1, 3, 4, 1, '2016-05-06 08:16:25', 299, 0),
(167, 1, 3, 4, 445, '2016-05-06 08:23:50', -145, 0),
(168, 1, 3, 4, 96, '2016-05-06 08:25:26', 204, 0),
(169, 1, 3, 4, 1, '2016-05-06 08:25:27', 299, 0),
(170, 1, 3, 4, 1, '2016-05-06 08:25:28', 299, 0),
(171, 1, 3, 4, 0, '2016-05-06 08:25:28', 300, 0),
(172, 1, 3, 4, 0, '2016-05-06 08:25:28', 300, 0),
(173, 1, 3, 4, 0, '2016-05-06 08:25:28', 300, 0),
(174, 1, 3, 4, 1, '2016-05-06 08:25:29', 299, 0),
(175, 1, 1, 2, 179, '2016-05-06 08:28:28', -97, 0),
(176, 1, 2, 3, 86, '2016-05-06 08:29:54', 114, 0),
(177, 1, 2, 3, 1, '2016-05-06 08:29:55', 199, 0),
(178, 1, 2, 3, 1, '2016-05-06 08:29:56', 199, 0),
(179, 1, 2, 3, 0, '2016-05-06 08:29:56', 200, 0),
(180, 1, 2, 3, 0, '2016-05-06 08:29:56', 200, 0),
(181, 1, 1, 2, -806, '2016-05-06 08:31:36', 888, 0),
(182, 1, 1, 2, 1, '2016-05-06 08:33:49', 81, 0),
(183, 1, 1, 1, -88, '2016-05-06 08:35:31', -93, 0),
(184, 1, 1, 1, 3, '2016-05-06 08:35:34', -2, 0),
(185, 1, 1, 1, 221, '2016-05-06 08:39:15', 216, 0),
(186, 1, 1, 1, 2, '2016-05-06 08:39:17', -3, 0),
(187, 1, 1, 1, 9, '2016-05-06 08:39:26', 4, 0),
(188, 1, 1, 1, 0, '2016-05-06 08:39:26', -5, 0),
(189, 1, 1, 1, 0, '2016-05-06 08:39:26', -5, 0),
(190, 1, 1, 1, 12, '2016-05-06 08:39:38', 7, 0),
(191, 1, 3, 4, -250, '2016-05-06 08:40:17', -255, 0),
(192, 1, 3, 4, 3, '2016-05-06 08:40:20', -2, 0),
(193, 1, 3, 4, 4, '2016-05-06 08:40:24', -1, 0),
(194, 1, 3, 4, 8, '2016-05-06 08:40:32', 3, 0),
(195, 1, 3, 4, 90, '2016-05-06 08:42:02', 85, 0),
(196, 1, 3, 4, 3, '2016-05-06 08:42:05', -2, 0),
(197, 1, 3, 4, 1, '2016-05-06 08:42:06', -4, 0),
(198, 1, 3, 4, 3, '2016-05-06 08:42:09', -2, 0),
(199, 1, 3, 4, 1, '2016-05-06 08:42:10', -4, 0),
(200, 1, 3, 4, 0, '2016-05-06 08:42:10', -5, 0),
(201, 1, 3, 4, -108, '2016-05-06 08:42:34', -113, 0),
(202, 1, 3, 4, 3, '2016-05-06 08:42:37', -2, 0),
(203, 1, 3, 4, 8, '2016-05-06 08:43:28', 3, 0),
(204, 1, 3, 4, 14, '2016-05-06 08:43:34', 9, 0),
(205, 1, 3, 4, 15, '2016-05-06 08:43:35', 10, 0),
(206, 1, 3, 4, 20, '2016-05-06 08:43:40', 15, 0),
(207, 1, 3, 4, 27, '2016-05-06 08:43:47', 22, 0),
(208, 1, 3, 4, -88, '2016-05-06 08:45:42', -93, 0),
(209, 1, 3, 4, 4, '2016-05-06 08:45:46', -1, 0),
(210, 1, 3, 4, 0, '2016-05-06 08:45:46', -5, 0),
(211, 1, 3, 4, 10, '2016-05-06 08:45:56', 5, 0),
(212, 1, 3, 4, -13, '2016-05-06 08:47:06', -18, 0),
(213, 1, 3, 4, 3, '2016-05-06 08:47:09', -2, 0),
(214, 1, 3, 4, -10, '2016-05-06 08:47:56', -15, 0),
(215, 1, 3, 4, 13, '2016-05-06 08:48:09', 8, 0),
(216, 1, 1, 1, -13, '2016-05-06 08:48:30', -18, 0),
(217, 1, 3, 4, 5, '2016-05-06 08:48:35', 0, 0),
(218, 1, 3, 4, -11, '2016-05-06 08:49:54', -16, 0),
(219, 1, 3, 4, 22, '2016-05-06 08:50:05', 17, 0),
(220, 1, 3, 4, -15, '2016-05-06 08:51:15', -20, 0),
(221, 1, 3, 4, 14, '2016-05-06 08:51:29', 9, 0),
(222, 1, 3, 4, 15237, '2016-05-06 13:05:26', 15232, 0),
(223, 1, 3, 4, 3, '2016-05-06 13:05:29', -2, 0),
(224, 1, 3, 4, 6, '2016-05-06 13:05:35', 1, 0),
(225, 1, 3, 4, 3, '2016-05-06 13:05:38', -2, 0),
(226, 1, 3, 4, 0, '2016-05-06 13:05:38', -5, 0),
(227, 1, 3, 4, 7, '2016-05-06 13:05:45', 2, 0),
(228, 1, 3, 4, 0, '2016-05-06 13:05:45', -5, 0),
(229, 1, 3, 4, 0, '2016-05-06 13:05:45', -5, 0),
(230, 1, 3, 4, 13, '2016-05-06 13:05:58', 8, 0),
(231, 1, 3, 4, 17, '2016-05-06 13:06:15', 12, 0),
(232, 1, 3, 4, -15291, '2016-05-06 13:08:16', -15296, 0),
(233, 1, 3, 4, 3, '2016-05-06 13:08:19', -2, 0),
(234, 1, 1, 1, -1, '2016-05-06 13:21:50', -6, 2),
(235, 1, 1, 2, 3, '2016-05-06 13:21:53', -79, 2),
(236, 1, 1, 2, 3, '2016-05-06 13:21:56', -79, 2),
(237, 1, 2, 3, 3, '2016-05-06 13:21:59', -197, 2),
(238, 1, 3, 4, -17, '2016-05-06 13:22:22', -22, 2),
(239, 1, 3, 4, 9, '2016-05-06 13:22:31', 4, 2),
(240, 1, 3, 4, 3, '2016-05-06 13:22:34', -2, 2),
(241, 1, 2, 3, 7, '2016-05-06 13:22:41', -193, 2),
(242, 1, 2, 3, 20, '2016-05-06 13:23:01', -180, 2),
(243, 1, 2, 3, 4, '2016-05-06 13:23:05', -196, 2),
(244, 1, 3, 4, 84, '2016-05-06 13:24:29', 79, 2),
(245, 1, 3, 4, 94, '2016-05-06 13:26:03', 89, 2),
(246, 1, 3, 4, 2, '2016-05-06 13:26:05', -3, 2),
(247, 1, 3, 4, 24, '2016-05-06 13:26:29', 19, 2),
(248, 1, 3, 4, 13, '2016-05-06 13:26:42', 8, 2),
(249, 1, 3, 4, 1, '2016-05-06 13:26:43', -4, 2),
(250, 1, 3, 4, 22, '2016-05-06 13:27:05', 17, 2),
(251, 1, 3, 4, 81, '2016-05-06 13:28:26', 76, 2),
(252, 1, 3, 4, 9, '2016-05-06 13:28:35', 4, 2),
(253, 1, 3, 4, -374, '2016-05-06 13:28:51', -379, 2),
(254, 1, 3, 4, -1, '2016-05-06 13:29:28', -6, 2),
(255, 1, 3, 4, 7, '2016-05-06 13:29:35', 2, 2),
(256, 1, 3, 4, 7, '2016-05-06 13:29:42', 2, 2),
(257, 1, 3, 4, 3, '2016-05-06 13:29:45', -2, 2),
(258, 1, 3, 4, 56, '2016-05-06 13:30:41', 51, 2),
(259, 1, 1, 1, -74, '2016-05-06 13:31:00', -79, 2),
(260, 1, 3, 4, 3, '2016-05-06 13:31:03', -2, 2),
(261, 1, 3, 4, 88, '2016-05-06 13:32:31', 83, 2),
(262, 1, 3, 4, 1, '2016-05-06 13:32:32', -4, 2),
(263, 1, 2, 3, 5, '2016-05-06 13:32:37', -195, 2),
(264, 1, 1, 1, -98, '2016-05-06 13:43:00', -103, 2),
(265, 1, 1, 2, 1, '2016-05-06 13:43:01', -81, 2),
(266, 1, 2, 3, 0, '2016-05-06 13:43:01', -200, 2),
(267, 1, 3, 4, 3, '2016-05-06 15:02:21', -2, 2),
(268, 1, 2, 3, 8, '2016-05-06 15:02:29', -192, 2),
(269, 1, 1, 2, 3, '2016-05-06 15:02:32', -79, 2),
(270, 1, 3, 4, 8419, '2016-05-06 17:22:51', 8414, 2),
(271, 1, 2, 3, 4, '2016-05-06 17:22:55', -196, 2),
(272, 1, 1, 1, -8435, '2016-05-06 20:18:08', -8440, 2),
(273, 1, 1, 2, 1, '2016-05-06 20:18:09', -81, 2),
(274, 1, 2, 3, 1, '2016-05-06 20:18:10', -199, 2),
(275, 1, 3, 4, 1, '2016-05-06 20:18:11', -4, 2),
(276, 1, 2, 3, 8, '2016-05-06 20:18:19', -192, 2),
(277, 1, 3, 4, 15, '2016-05-06 20:18:34', 10, 2),
(278, 1, 3, 4, 1, '2016-05-06 20:18:35', -4, 2),
(279, 1, 2, 3, 3, '2016-05-06 20:18:38', -197, 2),
(280, 1, 1, 2, 1, '2016-05-06 20:18:39', -81, 2),
(281, 1, 2, 3, 1, '2016-05-06 20:18:40', -199, 2),
(282, 1, 3, 4, 1, '2016-05-06 20:18:41', -4, 2),
(283, 1, 1, 1, -26, '2016-05-06 20:21:23', -31, 2),
(284, 1, 1, 2, 13, '2016-05-06 20:21:36', -69, 2),
(285, 1, 2, 3, 8, '2016-05-06 20:21:44', -192, 2),
(286, 1, 3, 4, 8, '2016-05-06 20:21:52', 3, 2),
(287, 1, 3, 4, 4565, '2016-05-06 21:37:57', 4560, 2),
(288, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(289, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(290, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(291, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(292, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(293, 1, 3, 4, 0, '2016-05-06 21:37:57', -5, 2),
(294, 1, 3, 4, 1, '2016-05-06 21:37:58', -4, 2),
(295, 1, 3, 4, 0, '2016-05-06 21:37:58', -5, 2);

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
(3, 'Parte 3', 1),
(4, 'Parte 1', 2),
(5, 'Parte 2', 2);

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
(1, '201032', 'carlos philipe mendes bahia', '0', 'xg6I_LrtWiIHyQmS3_mSzIMFy_-BG9-5', '$2y$13$oJNvsY/slghrD6uTp/qO8uQJ0ohELFSCFc7sOErXt4sALE2qUo3dK', '', '10', '10', '1452973046', '1452973046', '', '', '', NULL, 'carlosphbahia@gmail.com', 'gestor', '', NULL),
(2, 'user', '', '', 'WiOo97NfQ0aoL35hfx8bysFdXxOjF72B', '$2y$13$UHgERuin0Ku5Cs4HYzo1T.EYxG0BigfXjntjc7P2jH8F/Fe9LClea', '', '10', '10', '1461350111', '1461350111', '', '', '', NULL, 'user@yii.com.hue.br', 'gestor', '', NULL);

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
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idapresentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `elemento`
--
ALTER TABLE `elemento`
  MODIFY `idelemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `parte`
--
ALTER TABLE `parte`
  MODIFY `idparte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
