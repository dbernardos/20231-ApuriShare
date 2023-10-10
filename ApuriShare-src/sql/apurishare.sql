-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Set-2023 às 21:23
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
  `codigo` int(6) NOT NULL, /*o código de acesso da sala deve ter de 1-6 dígitos*/
  `respostaThink` varchar(100000) NOT NULL, /*resposta que o usuário da sozinho*/
  `respostaPair` varchar(100000) NOT NULL, /*resposta que o usuário da em dupla*/
  `fk_sala` int(6) DEFAULT NULL,
  `fk_usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL,
  `atividade` varchar(100000) NOT NULL,
  `observacao` varchar(100000) DEFAULT NULL,
  `arquivo` varchar(100) DEFAULT NULL, /*???????????*/
  `nome` varchar(50) NOT NULL,
  `qntUsers` int(3) NOT NULL, /*e se for par????? ein?????*/
  `fk_situacao` int(6) NOT NULL DEFAULT 1
  
  /*`tempoThink` time DEFAULT NULL,
  `tempoPair` time DEFAULT NULL,
  `horaInicioThink` time DEFAULT NULL,
  `horaInicioPair` time DEFAULT NULL*/
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `arquivo`, `nome`, `qntUsers`, `fk_situacao`/*, `tempoThink`, `tempoPair`, `horaInicioThink`, `horaInicioPair`*/) VALUES
(46, 'Onde se localiza Machu Piccho?', 'Peru', NULL, 'Geografia', 4, 5 /*, '00:01:00', '00:01:00', '18:57:48', '19:00:09'*/),
(47, 'Que paÃ­s tem o formato de uma bota?', 'ItÃ¡lia', NULL, 'Geografia', 2, 5 /*, '00:01:00', '00:01:00', '19:29:02', '19:29:31'*/),
(48, 'Quanto tempo a Terra demora para dar uma volta completa em torno dela mesma?', 'Aproximadamente 24 horas.', NULL, 'CiÃªncias', 4, 1 /*, '00:01:00', '00:01:00', NULL, NULL*/),
(49, 'A que temperatura a Ã¡gua ferve?', '100Â°', NULL, 'FÃ­sica', 6, 5, '00:01:00' /*, '00:01:00', '19:58:18', '19:59:16'*/),
(50, 'Qual o maior planeta do sistema solar?', 'JÃºpiter', NULL, 'Astronomia', 5, 3 /*, '00:02:00', '00:02:00', '21:09:34', '21:09:53'*/);

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
(5, 'Finalizada', '');

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

INSERT INTO `usuario` (`nickname`, `nome`, `senha`) VALUES
('jao', 'Joao de Souza', '123'),
('maria', 'Maria de Souza', '123'),
('joana', 'Joana de Souza', '123'),
('bertila', 'Bertila de Souza', '123'),
('betania', 'Betania de Souza', '123'),
('mauricio', 'Mauricio de Souza', '123'),
('bianca', 'Bianca de Souza', '123'),
('ana', 'Ana de Souza', '123');

INSERT INTO `sala_usuario`(`fk_sala`, `fk_usuario`, `tipoUsuario`) VALUES 
('39','maria','participante'),
('39','joana','participante'),
('39','bertila','participante'),
('39','betania','participante'),
('39','mauricio','participante'),
('39','bianca','participante');

INSERT INTO `sala_usuario`(`fk_sala`, `fk_usuario`, `tipoUsuario`) VALUES 
('38','maria','participante'),
('38','joana','participante'),
('38','bertila','participante'),
('38','betania','participante'),
('38','mauricio','participante'),
('38','bianca','participante');

INSERT INTO `sala_usuario`(`fk_sala`, `fk_usuario`, `tipoUsuario`) VALUES 
('37','maria','participante'),
('37','joana','participante'),
('37','bertila','participante'),
('37','betania','participante'),
('37','mauricio','participante'),
('37','bianca','participante');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`codigo`),
  /*ADD KEY `fk_sala` (`fk_sala`),
  ADD KEY `fk_coluna_fk` (`fk_usuario`);*/

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`chaveAcesso`),
  /*ADD KEY `const_sala_situacao` (`fk_situacao`);*/

--
-- Índices para tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  ADD PRIMARY KEY (`id_sala_usuario`),
  /*ADD KEY `fk_sala` (`fk_sala`),
  ADD KEY `fk_usuario` (`fk_usuario`);*/

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
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `sala_usuario`
--
ALTER TABLE `sala_usuario`
  MODIFY `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_coluna_fk` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`),
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
