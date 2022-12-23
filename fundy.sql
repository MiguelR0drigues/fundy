-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Dez-2022 às 17:07
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fundy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL COMMENT 'project id',
  `title` varchar(500) NOT NULL COMMENT 'project title',
  `description` varchar(9999) NOT NULL COMMENT 'project description',
  `mainImg` varchar(999) DEFAULT NULL COMMENT 'path to main img',
  `images` varchar(999) DEFAULT NULL COMMENT 'path to folder w/ other imgs',
  `ownerId` bigint(20) NOT NULL COMMENT 'id of the user that owns the project',
  `amountNeeded` bigint(20) DEFAULT NULL COMMENT 'if money needed, amount of money needed',
  `consultancyNeeded` varchar(600) DEFAULT NULL COMMENT 'if consultancy needed, type of consultancy needed',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'created at'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `mainImg`, `images`, `ownerId`, `amountNeeded`, `consultancyNeeded`, `createdAt`) VALUES
(1, 'Project 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 1, 10000, NULL, '2022-12-22 15:24:22'),
(2, 'Project 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 2, 15000, NULL, '2022-12-22 15:24:22'),
(3, 'Project 3 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 3, 20000, NULL, '2022-12-22 15:24:22'),
(4, 'Project 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 4, 100000, NULL, '2022-12-22 15:24:22'),
(5, 'Project 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 1, 10000, NULL, '2022-12-22 15:25:05'),
(6, 'Project 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 2, 15000, NULL, '2022-12-22 15:25:06'),
(7, 'Project 7 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 3, 20000, NULL, '2022-12-22 15:25:06'),
(8, 'Project 8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', NULL, NULL, 4, 100000, NULL, '2022-12-22 15:25:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_investor`
--

CREATE TABLE `project_investor` (
  `idProject` bigint(20) NOT NULL COMMENT 'project id',
  `idUser` bigint(11) NOT NULL COMMENT ' investor id',
  `givenAmount` bigint(20) DEFAULT NULL COMMENT 'if money given, amount of money given',
  `givenConsultancy` varchar(900) DEFAULT NULL COMMENT 'if consultancy needed, type of consultancy given'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'userId',
  `name` varchar(150) NOT NULL COMMENT 'First and last name',
  `email` varchar(150) NOT NULL COMMENT 'user email',
  `pfp` varchar(9999) DEFAULT 'default.png' COMMENT 'profile picture',
  `type` tinyint(1) NOT NULL COMMENT 'Só aceita 0(Ent) e 1 (BA)',
  `isVerified` tinyint(1) NOT NULL COMMENT 'Só aceita 0(nao) e 1(sim)',
  `password` varchar(500) NOT NULL COMMENT 'user password',
  `token` varchar(10) NOT NULL COMMENT 'validation token',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'when was the account created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user data';

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pfp`, `type`, `isVerified`, `password`, `token`, `createdAt`) VALUES
(1, 'Miguel', 'miguel@miguel.com', '1.jpg', 1, 0, 'miguel', '12345', '2022-12-22 15:14:58'),
(2, 'telmo', 'telmo@telmo.com', 'default.png', 0, 0, 'telmo', '12345', '2022-12-22 15:14:58'),
(3, 'rocha', 'rocha@rocha.com', 'default.png', 0, 0, 'rocha', '12345', '2022-12-22 15:14:58'),
(4, 'alex', 'alex@alex.com', 'default.png', 1, 0, 'alex', '12345', '2022-12-22 15:14:58'),
(5, 'tiago', 'tiago@tiago.com', 'default.png', 1, 0, 'tiago', '12345', '2022-12-22 15:14:58'),
(6, 'marcelo', 'marcelo@marcelo.com', 'default.png', 0, 0, 'marcelo', '12345', '2022-12-22 15:14:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_project`
--

CREATE TABLE `user_project` (
  `idUser` bigint(20) NOT NULL COMMENT 'userId',
  `idProject` bigint(20) NOT NULL COMMENT 'projectId'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`ownerId`) USING BTREE;

--
-- Índices para tabela `project_investor`
--
ALTER TABLE `project_investor`
  ADD KEY `idProject` (`idProject`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_project`
--
ALTER TABLE `user_project`
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProject` (`idProject`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'project id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'userId', AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `FK` FOREIGN KEY (`ownerId`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `project_investor`
--
ALTER TABLE `project_investor`
  ADD CONSTRAINT `project_investor_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_investor_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `user_project`
--
ALTER TABLE `user_project`
  ADD CONSTRAINT `user_project_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_project_ibfk_2` FOREIGN KEY (`idProject`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
