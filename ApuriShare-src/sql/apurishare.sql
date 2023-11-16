-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2023 às 22:01
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
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `codigo` int(6) NOT NULL,
  `resposta` text NOT NULL,
  `resposta_par` text NOT NULL,
  `situacao` enum('individual','pares') NOT NULL DEFAULT 'individual',
  `fk_sala` int(11) DEFAULT NULL,
  `fk_usuario` varchar(100) DEFAULT NULL,
  `fk_usuario_par` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`codigo`, `resposta`, `resposta_par`, `situacao`, `fk_sala`, `fk_usuario`, `fk_usuario_par`) VALUES
(18, 'm vn b', '', 'individual', 51, 'portuga.2004', ''),
(19, 'efg', '', 'individual', 51, 'raque.lis', ''),
(20, 'kkg', ' mvbvhj', 'pares', 51, 'raque.lis', 'portuga.2004'),
(21, '', '', 'pares', 54, 'belly.90', 'raque.lis'),
(22, '', '', 'pares', 54, 'italo.ramos', 'portuga.2004'),
(23, 'rtjy', '', 'individual', 56, 'Fulano123', ''),
(24, 'htrehtreer', '', 'individual', 56, 'rafa.vic', ''),
(25, 'wshgrf', 'dfhthr', 'pares', 56, 'rafa.vic', 'Fulano123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL,
  `atividade` text NOT NULL,
  `observacao` text DEFAULT NULL,
  `arquivo` varchar(1000) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `fk_situacao` int(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `arquivo`, `nome`, `qntUsers`, `fk_situacao`) VALUES
(1, 'java e javascript sao iguais?', 'nao', NULL, 'Programação Java', 12, 1),
(7, 'Fale o que você sabe sobre SQL', 'insert, update, delete', NULL, 'Banco de Dados', 4, 1),
(8, 'Você está desenvolvendo um programa de controle de acesso a um sistema. O programa solicita ao usuário que insira seu nome de usuário e senha. Você deve implementar a lógica para verificar se o usuário tem permissão de acesso.\r\n\r\nExistem três níveis de acesso:\r\n\r\nNível 1: Acesso total.\r\nNível 2: Acesso parcial.\r\nNível 3: Sem acesso.\r\nVocê deve seguir as seguintes regras para determinar o nível de acesso:\r\n\r\nSe o nome de usuário for \"admin\" e a senha for \"admin123\", o usuário tem acesso total (Nível 1).\r\nSe o nome de usuário for \"gerente\" e a senha for \"gerente123\", o usuário tem acesso parcial (Nível 2).\r\nPara qualquer outro nome de usuário e senha, o acesso é negado (Nível 3).\r\nImplemente o código em C que solicita o nome de usuário e a senha ao usuário e, em seguida, utiliza estruturas if-else para determinar o nível de acesso com base nas regras acima. Em seguida, exiba uma mensagem adequada ao nível de acesso obtido.\r\n\r\nLembre-se de validar tanto o nome de usuário quanto a senha an', 'Não vai ser fácil!!!', NULL, 'Programação C', 10, 3),
(9, 'O que você sabe?', 'só sei que nada sei', NULL, 'Filosofia', 2, 1),
(10, 'atividade teste', 'comentario teste', NULL, 'Programação C', 2, 1),
(11, 'atividade teste', 'comentario teste', NULL, 'Programação C', 2, 1),
(18, 'Resolver a equação do sengundo grau: 4x2+3x+1', 'equação', NULL, 'Matematica', 4, 1),
(19, 'Quais são as plantas verdes?', 'musgos', NULL, 'Biologia', 4, 1),
(35, 'Onde se localiza Machu Piccho?', 'Peru', NULL, 'Geografia', 4, 1),
(36, 'Que paí­s tem o formato de uma bota?', 'Itália', NULL, 'Geografia', 2, 1),
(37, 'Quanto tempo a Terra demora para dar uma volta completa em torno dela mesma?', 'Aproximadamente 24 horas.', NULL, 'Ciências', 4, 1),
(38, 'A que temperatura a água ferve?', '100°C', NULL, 'Fí­sica', 6, 1),
(39, 'Qual o maior planeta do sistema solar?', 'Júpiter', NULL, 'Astronomia', 5, 1),
(51, 'erghrth', 'dfht', NULL, 'tjyrtf', 2, 4),
(52, 'afcAWG', 'SDVREFG', NULL, 'fgbndfx', 2, 2),
(53, 'asfergf', 'gdsweg', NULL, 'egrseg', 2, 2),
(54, 'erher', 'hjt', NULL, 'ergre', 2, 3),
(55, 'dfhnrthj', 'fgn', NULL, 'rbergth', 2, 2),
(56, 'erger', 'ergre', NULL, 'ergrt', 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_usuario`
--

CREATE TABLE `sala_usuario` (
  `id_sala_usuario` int(6) NOT NULL,
  `fk_sala` int(6) NOT NULL,
  `fk_usuario` varchar(100) NOT NULL,
  `tipoUsuario` enum('criador','participante') NOT NULL DEFAULT 'participante'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala_usuario`
--

INSERT INTO `sala_usuario` (`id_sala_usuario`, `fk_sala`, `fk_usuario`, `tipoUsuario`) VALUES
(1, 1, 'raque.lis', 'criador'),
(2, 11, 'raque.lis', 'criador'),
(3, 10, 'italo.ramos', 'criador'),
(4, 7, 'raque.lis', 'criador'),
(5, 8, 'raque.lis', 'criador'),
(6, 9, 'raque.lis', 'criador'),
(7, 18, 'raque.lis', 'criador'),
(8, 19, 'raque.lis', 'criador'),
(18, 35, 'italo.ramos', 'criador'),
(19, 36, 'italo.ramos', 'criador'),
(20, 37, 'italo.ramos', 'criador'),
(21, 38, 'italo.ramos', 'criador'),
(22, 39, 'italo.ramos', 'criador'),
(24, 1, 'maria', 'participante'),
(25, 1, 'joana', 'participante'),
(26, 1, 'bertila', 'participante'),
(27, 1, 'betania', 'participante'),
(28, 1, 'mauricio', 'participante'),
(29, 1, 'bianca', 'participante'),
(30, 39, 'maria', 'participante'),
(31, 39, 'joana', 'participante'),
(32, 39, 'bertila', 'participante'),
(33, 39, 'betania', 'participante'),
(34, 39, 'mauricio', 'participante'),
(35, 39, 'bianca', 'participante'),
(36, 38, 'maria', 'participante'),
(37, 38, 'joana', 'participante'),
(38, 38, 'bertila', 'participante'),
(39, 38, 'betania', 'participante'),
(40, 38, 'mauricio', 'participante'),
(41, 38, 'bianca', 'participante'),
(42, 37, 'maria', 'participante'),
(43, 37, 'joana', 'participante'),
(44, 37, 'bertila', 'participante'),
(45, 37, 'betania', 'participante'),
(46, 37, 'mauricio', 'participante'),
(47, 37, 'bianca', 'participante'),
(63, 51, 'belly.90', 'criador'),
(64, 51, 'raque.lis', 'participante'),
(65, 51, 'portuga.2004', 'participante'),
(67, 52, 'belly.90', 'criador'),
(68, 52, 'raque.lis', 'participante'),
(69, 52, 'italo.ramos', 'participante'),
(70, 52, 'portuga.2004', 'participante'),
(71, 52, 'belly.90', 'participante'),
(72, 53, 'raque.lis', 'criador'),
(73, 53, 'raque.lis', 'participante'),
(74, 53, 'belly.90', 'participante'),
(75, 53, 'portuga.2004', 'participante'),
(76, 53, 'italo.ramos', 'participante'),
(77, 54, 'raque.lis', 'criador'),
(78, 54, 'italo.ramos', 'participante'),
(79, 54, 'portuga.2004', 'participante'),
(80, 54, 'belly.90', 'participante'),
(81, 54, 'raque.lis', 'participante'),
(82, 55, 'raque.lis', 'criador'),
(83, 55, 'italo.ramos', 'participante'),
(84, 55, 'portuga.2004', 'participante'),
(85, 55, 'belly.90', 'participante'),
(86, 55, 'raque.lis', 'participante'),
(87, 56, 'lore23', 'criador'),
(88, 56, 'rafa.vic', 'participante'),
(89, 56, 'Fulano123', 'participante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `idSituacao` int(6) NOT NULL,
  `statusSituacao` varchar(100) NOT NULL,
  `descricaoSituacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`idSituacao`, `statusSituacao`, `descricaoSituacao`) VALUES
(1, 'Sala Criada', 'Iniciar Atividade Individual'),
(2, 'Atividade Individual', 'Iniciar Atividade em Pares'),
(3, 'Atividade em Pares', 'Compartilhar Atividades'),
(4, 'Compartilhar Atividades', 'Finalizar Atividade'),
(5, 'Finalizada', 'o/');

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
('belly.90', 'Isabelly Santos', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('bertila', 'Bertila de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('betania', 'Betania de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('bianca', 'Bianca de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('Fulano123', 'Fulano Beltrano', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('italo.ramos', 'Italo Ramos', '6598$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('joana', 'Joana de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('larap02', 'Lara Pereira', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('lore23', 'Lorena', '$2y$10$f2ufLUvhMawjRHMRzxSgzOzZkzHqXnLpmR32EBGzjU9nbpMwxx0ce'),
('maria', 'Maria de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('mauricio', 'Mauricio de Souza', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('portuga.2004', 'Rafael Portugal', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi'),
('rafa.vic', 'Rafaela Vitoria', '$2y$10$ZtWaarG2qAD1ZH2PlzBkX.sTbLe.oVKaFmHwBg0b/BJXKF/1HPM/m'),
('raque.lis', 'Raquel da Silva', '$2y$10$z5a65AIwTq81aFVsH7FUi.a7NRsvPcG2Lfx8EQsFHclOUl82tCSxi');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`chaveAcesso`),
  ADD KEY `const_sala_situacao` (`fk_situacao`);

--
-- Índices para tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  ADD PRIMARY KEY (`id_sala_usuario`),
  ADD KEY `sala_usuario_ibfk_1` (`fk_sala`),
  ADD KEY `sala_usuario_ibfk_2` (`fk_usuario`);

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`idSituacao`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  MODIFY `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `fk_sala` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`);

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `const_sala_situacao` FOREIGN KEY (`fk_situacao`) REFERENCES `situacao` (`idSituacao`);

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
