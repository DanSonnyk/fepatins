-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/06/2023 às 15:47
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atletas`
--

CREATE TABLE `atletas` (
  `atl_cod` int(11) NOT NULL,
  `atl_foto` varchar(40) DEFAULT NULL,
  `atl_nome` varchar(20) DEFAULT NULL,
  `atl_cidade` varchar(20) DEFAULT NULL,
  `atl_patro` varchar(20) DEFAULT NULL,
  `atl_points` decimal(10,0) DEFAULT NULL,
  `atl_desc` varchar(255) DEFAULT NULL,
  `atl_sexo` varchar(10) NOT NULL,
  `atl_categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `evt_cod` int(11) NOT NULL,
  `evt_logo` varchar(40) DEFAULT NULL,
  `evt_nome` varchar(20) DEFAULT NULL,
  `evt_data` date DEFAULT NULL,
  `evt_data_create` date DEFAULT NULL,
  `evt_local` varchar(30) DEFAULT NULL,
  `evt_classe` int(11) DEFAULT NULL,
  `evt_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos_has_atletas`
--

CREATE TABLE `eventos_has_atletas` (
  `eventos_evt_cod` int(11) NOT NULL,
  `atletas_atL_cod` int(11) NOT NULL,
  `atL_position` decimal(10,0) DEFAULT NULL,
  `atL_point_here` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `organizador`
--

CREATE TABLE `organizador` (
  `org_cod` int(11) NOT NULL,
  `org_nome` varchar(20) DEFAULT NULL,
  `org_email` varchar(50) DEFAULT NULL,
  `org_cpf` int(14) DEFAULT NULL,
  `org_pass` tinytext DEFAULT NULL,
  `org_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `count` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `visitas`
--

INSERT INTO `visitas` (`id`, `date`, `count`) VALUES
(NULL, '2023-06-04 23:26:16', ''),
(NULL, '2023-06-04 23:30:05', ''),
(NULL, '2023-06-04 23:30:39', ''),
(NULL, '2023-06-04 23:31:25', ''),
(NULL, '2023-06-04 23:31:51', ''),
(NULL, '2023-06-04 23:58:30', ''),
(NULL, '2023-06-05 00:09:55', ''),
(NULL, '2023-06-05 00:44:35', ''),
(NULL, '2023-06-05 00:44:41', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`atl_cod`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evt_cod`);

--
-- Índices de tabela `eventos_has_atletas`
--
ALTER TABLE `eventos_has_atletas`
  ADD PRIMARY KEY (`eventos_evt_cod`,`atletas_atL_cod`),
  ADD KEY `eventos_has_atletas_FKindex1` (`eventos_evt_cod`),
  ADD KEY `eventos_has_atletas_FIndex2` (`atletas_atL_cod`);

--
-- Índices de tabela `organizador`
--
ALTER TABLE `organizador`
  ADD PRIMARY KEY (`org_cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atletas`
--
ALTER TABLE `atletas`
  MODIFY `atl_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evt_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `organizador`
--
ALTER TABLE `organizador`
  MODIFY `org_cod` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
