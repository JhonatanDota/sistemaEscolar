-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2021 às 18:50
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaescola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` int(4) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_bin NOT NULL,
  `datanascimento` date NOT NULL,
  `cidade` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `bairro` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `rua` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `numero` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `complemento` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamodificacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `idturma` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrados`
--

CREATE TABLE `cadastrados` (
  `id` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `turma` int(4) NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `qtvagas` int(5) NOT NULL,
  `professor` varchar(200) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `idturma` (`idturma`);

--
-- Índices para tabela `cadastrados`
--
ALTER TABLE `cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `matricula` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cadastrados`
--
ALTER TABLE `cadastrados`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `turma` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--

TRUNCATE TABLE aluno;
TRUNCATE TABLE turma;


ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`idturma`) REFERENCES `turma` (`turma`);
COMMIT;

INSERT INTO `turma` (`turma`, `descricao`, `qtvagas`, `professor`) VALUES
(0, 'Sem Turma', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
