-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2023 às 21:36
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apurishare`
--

CREATE DATABASE apurishare;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `codigo` int(6) NOT NULL,
  `respostaThink` varchar(1000) NOT NULL,
  `respostaPair` varchar(1000) NOT NULL,
  `sala_idsala` int(6) NOT NULL,
  `Usuario_nickname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `idsala` int(6) NOT NULL,
  `atividade` varchar(1000) NOT NULL,
  `assunto` varchar(45) NOT NULL,
  `comentario` varchar(1000) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `criador` varchar(100) NOT NULL,
  `tempoPair` time DEFAULT NULL,
  `tempoThink` time DEFAULT NULL,
  `enderecoImagem` varchar(100) NOT NULL,
  `QuantidadeMaximaUsuarios` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nickname` varchar(100) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nickname`, `nome`, `email`, `senha`) VALUES
('raquelis', 'Raquel', 'raquel.s29@aluno.ifsc.edu.br', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `sala_idsala` (`sala_idsala`),
  ADD KEY `Usuario_nickname` (`Usuario_nickname`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idsala`),
  ADD KEY `criador` (`criador`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `idsala` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`sala_idsala`) REFERENCES `sala` (`idsala`),
  ADD CONSTRAINT `atividade_ibfk_2` FOREIGN KEY (`Usuario_nickname`) REFERENCES `usuario` (`nickname`);

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`criador`) REFERENCES `usuario` (`nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
