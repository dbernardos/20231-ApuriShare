CREATE DATABASE apurishare;
USE apurishare;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `resposta` (
  `codigo` int NOT NULL,
  `resposta` TEXT NOT NULL,
  `resposta_par` TEXT NOT NULL,
  `situacao` enum('individual','pares') NOT NULL DEFAULT 'individual',
  `fk_sala` int DEFAULT NULL,
  `fk_usuario` varchar(100) DEFAULT NULL,
  `fk_usuario_par` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `sala` (
  `chaveAcesso` int(6) NOT NULL,
  `atividade` TEXT NOT NULL,
  `observacao` TEXT DEFAULT NULL,
  `arquivo` varchar(1000) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `qntUsers` int(3) NOT NULL,
  `fk_situacao` int(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sala_usuario` (
  `id_sala_usuario` int(6) NOT NULL,
  `fk_sala` int(6) NOT NULL,
  `fk_usuario` varchar(100) NOT NULL,
  `tipoUsuario` enum('criador','participante') NOT NULL DEFAULT 'participante'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `situacao` (
  `idSituacao` int(6) NOT NULL,
  `statusSituacao` varchar(100) NOT NULL,
  `descricaoSituacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuario` (
  `nickname` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `resposta`
  ADD PRIMARY KEY (`codigo`);


ALTER TABLE `sala`
  ADD PRIMARY KEY (`chaveAcesso`);


ALTER TABLE `sala_usuario`
  ADD PRIMARY KEY (`id_sala_usuario`);


ALTER TABLE `situacao`
  ADD PRIMARY KEY (`idSituacao`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nickname`);


ALTER TABLE `resposta`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `sala`
  MODIFY `chaveAcesso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;


ALTER TABLE `sala_usuario`
  MODIFY `id_sala_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;


ALTER TABLE `resposta`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`),
  ADD CONSTRAINT `fk_sala` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`);


ALTER TABLE `sala`
  ADD CONSTRAINT `const_sala_situacao` FOREIGN KEY (`fk_situacao`) REFERENCES `situacao` (`idSituacao`);


ALTER TABLE `sala_usuario`
  ADD CONSTRAINT `sala_usuario_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`chaveAcesso`),
  ADD CONSTRAINT `sala_usuario_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`nickname`);
COMMIT;

-- POPULACAO DO BANCO
INSERT INTO `situacao` (`idSituacao`, `statusSituacao`, `descricaoSituacao`) VALUES
(1, 'Sala Criada', 'Iniciar Atividade Individual'),
(2, 'Atividade Individual', 'Iniciar Atividade em Pares'),
(3, 'Atividade em Pares', 'Compartilhar Atividades'),
(4, 'Compartilhar Atividades', 'Finalizar Atividade'),
(5, 'Finalizada', 'o/');

INSERT INTO `usuario` VALUES ('ana','Ana de Souza','123'),
('bertila','Bertila de Souza','123'),
('betania','Betania de Souza','123'),
('bianca','Bianca de Souza','123'),
('italo.ramos','Italo Ramos','6598'),
('jao','Joao de Souza','123'),
('joana','Joana de Souza','123'),
('maria','Maria de Souza','123'),
('mauricio','Mauricio de Souza','123'),
('portuga.2004','Rafael Portugal','2004'),
('larap02', 'Lara Pereira', '2020'),
('belly.90', 'Isabelly Santos', '1323'),
('raque.lis','Raquel da Silva','1020');


INSERT INTO `sala` (`chaveAcesso`, `atividade`, `observacao`, `arquivo`, `nome`, `qntUsers`, `fk_situacao`) VALUES
(1,'java e javascript sao iguais?','nao',NULL,'Programação Java',12,1),
(7,'Fale o que você sabe sobre SQL','insert, update, delete',NULL,'Banco de Dados',4,1),
(8,'Você está desenvolvendo um programa de controle de acesso a um sistema. O programa solicita ao usuário que insira seu nome de usuário e senha. Você deve implementar a lógica para verificar se o usuário tem permissão de acesso.\r\n\r\nExistem três níveis de acesso:\r\n\r\nNível 1: Acesso total.\r\nNível 2: Acesso parcial.\r\nNível 3: Sem acesso.\r\nVocê deve seguir as seguintes regras para determinar o nível de acesso:\r\n\r\nSe o nome de usuário for \"admin\" e a senha for \"admin123\", o usuário tem acesso total (Nível 1).\r\nSe o nome de usuário for \"gerente\" e a senha for \"gerente123\", o usuário tem acesso parcial (Nível 2).\r\nPara qualquer outro nome de usuário e senha, o acesso é negado (Nível 3).\r\nImplemente o código em C que solicita o nome de usuário e a senha ao usuário e, em seguida, utiliza estruturas if-else para determinar o nível de acesso com base nas regras acima. Em seguida, exiba uma mensagem adequada ao nível de acesso obtido.\r\n\r\nLembre-se de validar tanto o nome de usuário quanto a senha an','Não vai ser fácil!!!',NULL,'Programação C',10,3),
(9,'O que você sabe?','só sei que nada sei',NULL,'Filosofia',2,1),
(10,'atividade teste','comentario teste',NULL,'Programação C',2,1),
(11,'atividade teste','comentario teste',NULL,'Programação C',2,1),
(18,'Resolver a equação do sengundo grau: 4x2+3x+1','equação',NULL,'Matematica',4,1),
(19,'Quais são as plantas verdes?','musgos',NULL,'Biologia',4,1),
(35, 'Onde se localiza Machu Piccho?', 'Peru', NULL, 'Geografia', 4, 1),
(36, 'Que paí­s tem o formato de uma bota?', 'Itália', NULL, 'Geografia', 2, 1),
(37, 'Quanto tempo a Terra demora para dar uma volta completa em torno dela mesma?', 'Aproximadamente 24 horas.', NULL, 'Ciências', 4, 1),
(38, 'A que temperatura a água ferve?', '100°C', NULL, 'Fí­sica', 6, 1),
(39, 'Qual o maior planeta do sistema solar?', 'Júpiter', NULL, 'Astronomia', 5, 1);

INSERT INTO `sala_usuario` 
(id_sala_usuario, fk_sala, fk_usuario, tipoUsuario) VALUES 
(1,1,'raque.lis','criador'),
(2,11,'raque.lis','criador'),
(3,10,'italo.ramos','criador'),
(4,7,'raque.lis','criador'),
(5,8,'raque.lis','criador'),
(6,9,'raque.lis','criador'),
(7,18,'raque.lis','criador'),
(8,19,'raque.lis','criador'),
(18,35,'italo.ramos','criador'),
(19,36,'italo.ramos','criador'),
(20,37,'italo.ramos','criador'),
(21,38,'italo.ramos','criador'),
(22,39,'italo.ramos','criador'),
(24,1,'maria','participante'),
(25,1,'joana','participante'),
(26,1,'bertila','participante'),
(27,1,'betania','participante'),
(28,1,'mauricio','participante'),
(29,1,'bianca','participante'),
(30,39,'maria','participante'),
(31,39,'joana','participante'),
(32,39,'bertila','participante'),
(33,39,'betania','participante'),
(34,39,'mauricio','participante'),
(35,39,'bianca','participante'),
(36,38,'maria','participante'),
(37,38,'joana','participante'),
(38,38,'bertila','participante'),
(39,38,'betania','participante'),
(40,38,'mauricio','participante'),
(41,38,'bianca','participante'),
(42,37,'maria','participante'),
(43,37,'joana','participante'),
(44,37,'bertila','participante'),
(45,37,'betania','participante'),
(46,37,'mauricio','participante'),
(47,37,'bianca','participante');

