-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2016 at 05:02 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `event_cow`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elemento`
--

INSERT INTO `elemento` (`idelemento`, `nome`, `tempo`, `descricao`, `tipo_idtipo`) VALUES
(1, 'novo', 12, 'aqui é novo mesmo', 1),
(6, 'Elemento criado', 15, 'aqui é novo elemento criado', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`idelemento`),
  ADD KEY `fk_elemento_tipo_idx` (`tipo_idtipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elemento`
--
ALTER TABLE `elemento`
  MODIFY `idelemento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `fk_elemento_tipo` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
