-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Ago-2023 às 22:59
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `codigo` int(6) NOT NULL,
  `respostaThink` varchar(1000) NOT NULL,
  `respostaPair` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL,
  `atividade` varchar(1000) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `nome`, `qntUsers`, `tempoThink`, `tempoPair`) VALUES
(1, 'java e javascript sao iguais?', 'nao', 'java', 12, '00:00:02', '00:00:02'),
(7, 'dsgdfgb', 'sdvv', 'rgdv', 3, '00:02:00', '00:02:00'),
(8, 'hdxh', 'hdxhdxhrt', 'frbhrsd', 6, '00:02:00', '00:02:00'),
(9, 'dddd', 'dddd', 'rgdv', 2, '04:04:00', '04:04:00'),
(10, 'atividade teste', 'comentario teste', 'SalaTeste', 2, '03:08:00', '01:08:00'),
(11, 'atividade teste', 'comentario teste', 'SalaTeste', 2, '03:08:00', '01:08:00'),
(18, '4*2', '8', 'matematica', 4, '00:02:00', '00:02:00'),
(19, 'plantas', 'musgos', 'biologia', 3, '00:02:00', '00:02:00'),
(28, 'plnatas', 'pinheiro', 'biologia', 4, '00:02:00', '00:02:00'),
(29, 'plnatas', 'pinheiro', 'biologia', 4, '00:02:00', '00:02:00'),
(30, 'primeira guerra', 'importante', 'historia', 4, '00:02:00', '00:02:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_usuario`
--

CREATE TABLE `sala_usuario` (
  `id_sala_usuario` int(6) NOT NULL,
  `fk_sala` int(6) NOT NULL,
  `fk_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala_usuario`
--

INSERT INTO `sala_usuario` (`id_sala_usuario`, `fk_sala`, `fk_usuario`) VALUES
(1, 18, 'raque.lis'),
(2, 1, 'raque.lis'),
(3, 10, 'italo.ramos'),
(11, 28, 'italo.ramos'),
(12, 29, 'italo.ramos'),
(13, 30, 'italo.ramos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nickname` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nickname`, `nome`, `senha`) VALUES
('italo.ramos', 'Italo Ramos', '6598'),
('portuga.2004', 'Rafael Portugal', '2004'),
('raque.lis', 'Raquel da Silva', '1020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`chaveAcesso`);

--
-- Índices para tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  ADD PRIMARY KEY (`id_sala_usuario`),
  ADD KEY `fk_sala` (`fk_sala`),
  ADD KEY `fk_usuario` (`fk_usuario`);

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
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  MODIFY `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  ADD CONSTRAINT `sala_usuario_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  ADD CONSTRAINT `sala_usuario_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
