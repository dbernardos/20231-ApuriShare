-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Set-2023 às 19:59
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
  `respostaPair` varchar(1000) NOT NULL,
  `fk_sala` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`codigo`, `respostaThink`, `respostaPair`, `fk_sala`) VALUES
(2, 'deddddd', '', NULL),
(3, 'apurishare', 'apurishare', NULL),
(4, '16 anos', '16 anos', 41),
(5, '18 anos', '18 anos', 42),
(6, '16 anos', '16 anos', 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL,
  `atividade` varchar(1000) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `fk_situacao` int(6) NOT NULL DEFAULT 1,
  `tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL,
  `horaInicioThink` time DEFAULT NULL,
  `horaInicioPair` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `arquivo`, `nome`, `qntUsers`, `fk_situacao`, `tempoThink`, `tempoPair`, `horaInicioThink`, `horaInicioPair`) VALUES
(1, 'java e javascript sao iguais?', 'nao', NULL, 'Programação Java', 12, 1, '00:05:00', '00:05:00', NULL, NULL),
(7, 'Fale o que você sabe sobre SQL', 'sdvv', NULL, 'Banco de Dados', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(8, 'hdxh', 'hdxhdxhrt', NULL, 'Programação C', 6, 1, '00:05:00', '00:05:00', NULL, NULL),
(9, 'dddd', 'dddd', NULL, 'Filosofia', 2, 1, '04:04:00', '04:04:00', NULL, NULL),
(10, 'atividade teste', 'comentario teste', NULL, 'Programação C', 2, 1, '00:05:00', '00:05:00', NULL, NULL),
(11, 'atividade teste', 'comentario teste', NULL, 'Programação C', 2, 1, '00:05:00', '00:05:00', NULL, NULL),
(18, 'Resolver a equação do sengundo grau: 4x2+3x+1', 'equação', NULL, 'Matematica', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(19, 'plantas', 'musgos', NULL, 'Biologia', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(28, 'plnatas', 'pinheiro', NULL, 'Biologia', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(29, 'plnatas', 'fotossíntese', NULL, 'Biologia', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(30, 'primeira guerra', 'importante', NULL, 'Historia', 4, 1, '00:05:00', '00:05:00', NULL, NULL),
(31, 'sss', 'sss', NULL, 'Empreendedorismo', 4, 1, '12:22:00', '12:22:00', NULL, NULL),
(32, 'ddd', 'dd', NULL, 'Meio Ambiente', 4, 1, '12:12:00', '12:21:00', NULL, NULL),
(33, 'ddd', 'dd', NULL, 'Comunicação Oral', 4, 1, '12:12:00', '12:21:00', NULL, NULL),
(34, 'ddd', 'dd', NULL, 'Programação Mobile', 4, 3, '12:12:00', '12:21:00', NULL, NULL),
(35, 'ddd', 'dd', NULL, 'Web 1', 4, 3, '12:12:00', '12:21:00', NULL, NULL),
(36, 'eee', 'eee', NULL, 'Web 2', 6, 3, '02:02:00', '02:02:00', '07:11:48', '07:11:50'),
(37, 'eee', 'eee', NULL, 'Estrutura de Dados', 6, 3, '02:02:00', '02:02:00', '00:00:00', '07:14:19'),
(38, 'Você está desenvolvendo um programa de controle de acesso a um sistema. O programa solicita ao usuário que insira seu nome de usuário e senha. Você deve implementar a lógica para verificar se o usuário tem permissão de acesso.\r\n\r\nExistem três níveis de acesso:\r\n\r\nNível 1: Acesso total.\r\nNível 2: Acesso parcial.\r\nNível 3: Sem acesso.\r\nVocê deve seguir as seguintes regras para determinar o nível de acesso:\r\n\r\nSe o nome de usuário for \"admin\" e a senha for \"admin123\", o usuário tem acesso total (Nível 1).\r\nSe o nome de usuário for \"gerente\" e a senha for \"gerente123\", o usuário tem acesso parcial (Nível 2).\r\nPara qualquer outro nome de usuário e senha, o acesso é negado (Nível 3).\r\nImplemente o código em C que solicita o nome de usuário e a senha ao usuário e, em seguida, utiliza estruturas if-else para determinar o nível de acesso com base nas regras acima. Em seguida, exiba uma mensagem adequada ao nível de acesso obtido.\r\n\r\nLembre-se de validar tanto o nome de usuário quanto a senha an', 'Não vai ser fácil!!!', NULL, 'Programação C', 10, 1, '00:20:00', '00:20:00', NULL, NULL),
(39, 'nome do seu sistema', 'nome', NULL, 'Projeto integrador', 5, 3, '00:02:00', '00:02:00', '18:41:08', '18:41:14'),
(40, 'dsgbg', 'gshrhd', NULL, 'Projeto integrador', 2, 2, '00:02:00', '00:03:00', '18:43:25', NULL),
(41, 'apurishare', 'blabla', NULL, 'Projeto integrador', 7, 3, '00:02:00', '00:02:00', '18:49:27', '18:50:52'),
(42, 'quantos anos vc tem', 'sua idade', NULL, 'idade', 4, 2, '00:02:00', '00:02:00', '19:38:04', NULL),
(43, '1 ou 2', '2', NULL, 'Teste', 4, 3, '00:05:00', '00:02:00', '19:47:31', '19:49:14');

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
(11, 28, 'italo.ramos', 'criador'),
(12, 29, 'italo.ramos', 'criador'),
(13, 30, 'italo.ramos', 'criador'),
(15, 32, 'italo.ramos', 'criador'),
(16, 33, 'italo.ramos', 'criador'),
(17, 34, 'italo.ramos', 'criador'),
(18, 35, 'italo.ramos', 'criador'),
(19, 36, 'italo.ramos', 'criador'),
(20, 37, 'italo.ramos', 'criador'),
(21, 38, 'italo.ramos', 'criador'),
(22, 39, 'belly.90', 'criador'),
(23, 40, 'italo.ramos', 'criador'),
(24, 41, 'belly.90', 'criador'),
(25, 42, 'belly.90', 'criador'),
(26, 43, 'larap02', 'criador');

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
(4, 'Compartilhar Atividades', 'Finalizar Atividade');

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
('belly.90', 'Isabelly Santos', '1323'),
('italo.ramos', 'Italo Ramos', '6598'),
('larap02', 'Lara Pereira', '2020'),
('portuga.2004', 'Rafael Portugal', '2004'),
('raque.lis', 'Raquel da Silva', '1020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codigo`),
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
  ADD KEY `fk_sala` (`fk_sala`),
  ADD KEY `fk_usuario` (`fk_usuario`);

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
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  MODIFY `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_sala` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`);

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
