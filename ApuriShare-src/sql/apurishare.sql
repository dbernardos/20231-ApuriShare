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
  `codigo` int(6) NOT NULL AUTO_INCREMENT, /*o código de acesso da sala deve ter de 1-6 dígitos*/
  `respostaThink` TEXT NOT NULL, /*resposta que o usuário dá sozinho*/
  `respostaPair` TEXT NOT NULL, /*resposta que o usuário dá em dupla*/
  `fk_sala` int(6) DEFAULT NULL,
  `fk_usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`),
  FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT,
  `atividade` TEXT NOT NULL,
  `observacao` TEXT DEFAULT NULL,
  `arquivo` varchar(100) DEFAULT NULL, /*???????????*/
  `nome` varchar(50) NOT NULL,
  `qntUsers` int(3) NOT NULL, /*e se for par????? ein?????*/
  `fk_situacao` int(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`chaveAcesso`),
  FOREIGN KEY (`fk_situacao`) REFERENCES `situacao` (`idSituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `arquivo`, `nome`, `qntUsers`, `fk_situacao`) VALUES
(46, 'Onde se localiza Machu Piccho?', 'Peru', NULL, 'Geografia', 4, 5),
(47, 'Que país tem o formato de uma bota?', 'Itália', NULL, 'Geografia', 2, 5),
(48, 'Quanto tempo a Terra demora para dar uma volta completa em torno dela mesma?', 'Aproximadamente 24 horas.', NULL, 'Ciências', 4, 1),
(49, 'A que temperatura a água ferve?', '100°', NULL, 'Física', 6, 5),
(50, 'Qual o maior planeta do sistema solar?', 'Júpiter', NULL, 'Astronomia', 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_usuario`
--

CREATE TABLE `sala_usuario` (
  `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT,
  `fk_sala` int(6) NOT NULL,
  `fk_usuario` varchar(100) NOT NULL,
  `tipoUsuario` enum('criador','participante') NOT NULL DEFAULT 'participante',
  PRIMARY KEY (`id_sala_usuario`),
  FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `idSituacao` int(6) NOT NULL,
  `statusSituacao` varchar(100) NOT NULL,
  `descricaoSituacao` varchar(200) NOT NULL,
  PRIMARY KEY (`idSituacao`)
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
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nickname`, `nome`, `senha`) VALUES
('belly.90', 'Isabelly Santos', '1323'),
('italo.ramos', 'Italo Ramos', '6598'),
('larap02', 'Lara Pereira', '2020'),
('portuga.2004', 'Rafael Portugal', '2004'),
('raque.lis', 'Raquel da Silva', '1020'),
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

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
