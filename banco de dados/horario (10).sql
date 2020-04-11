-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2020 às 03:14
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(5) UNSIGNED NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disc` int(5) UNSIGNED NOT NULL,
  `nome_d` varchar(200) DEFAULT NULL,
  `base` varchar(200) DEFAULT NULL,
  `semestre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disc`, `nome_d`, `base`, `semestre`) VALUES
(1, 'Redes de computadores', 'Base Técnica', 2),
(5, 'Física', 'Base Técnica', 1),
(11, 'Matemática', 'Base Comum', 3),
(12, 'quimica', 'Base Comum', 3),
(13, 'Português', 'Base Comum', 3),
(14, 'Introdução a robotica', 'Base Técnica', 2),
(15, 'redação', 'Base Comum', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_has_turma`
--

CREATE TABLE `disciplina_has_turma` (
  `disciplina_id_disc` int(5) UNSIGNED NOT NULL,
  `turma_id_turma` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina_has_turma`
--

INSERT INTO `disciplina_has_turma` (`disciplina_id_disc`, `turma_id_turma`) VALUES
(1, 1),
(5, 2),
(11, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(5) NOT NULL,
  `sala1` varchar(200) DEFAULT NULL,
  `sala2` varchar(200) DEFAULT NULL,
  `sala3` varchar(200) DEFAULT NULL,
  `sala4` varchar(200) DEFAULT NULL,
  `sala5` varchar(200) DEFAULT NULL,
  `sala6` varchar(200) DEFAULT NULL,
  `sala7` varchar(200) DEFAULT NULL,
  `sala8` varchar(200) DEFAULT NULL,
  `sala9` varchar(200) DEFAULT NULL,
  `sala10` varchar(200) DEFAULT NULL,
  `sala11` varchar(200) DEFAULT NULL,
  `sala12` varchar(200) DEFAULT NULL,
  `sala13` varchar(200) DEFAULT NULL,
  `dia` int(3) NOT NULL,
  `aula` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `sala1`, `sala2`, `sala3`, `sala4`, `sala5`, `sala6`, `sala7`, `sala8`, `sala9`, `sala10`, `sala11`, `sala12`, `sala13`, `dia`, `aula`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2),
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 3),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 4),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 5),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 6),
(7, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 7),
(8, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 8),
(9, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 9),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 10),
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(12, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 2),
(13, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 3),
(14, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 4),
(15, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 5),
(16, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 6),
(17, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 7),
(18, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 8),
(19, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 9),
(20, '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 10),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 5),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 6),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 7),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 8),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 9),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 10),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 5),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 6),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 7),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 8),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 9),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 10),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 2),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 4),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 6),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 7),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 8),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 9),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 10),
(51, '', ' ', '', '', '', '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_prof` int(5) UNSIGNED NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `carga_h` varchar(9) DEFAULT NULL,
  `base` int(1) UNSIGNED DEFAULT NULL,
  `dias_off` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_prof`, `nome`, `carga_h`, `base`, `dias_off`) VALUES
(22, 'Marcos', '40', 1, 'nenhuma'),
(24, 'Estevão', '40', 1, 'nenhuma'),
(25, 'laércio', '40', 2, 'quinta'),
(27, 'gessica', '40', 1, 'nenhuma'),
(28, 'gessica', '40', 1, 'nenhuma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores_has_disciplina`
--

CREATE TABLE `professores_has_disciplina` (
  `professores_id_prof` int(5) UNSIGNED NOT NULL,
  `disciplina_id_disc` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores_has_disciplina`
--

INSERT INTO `professores_has_disciplina` (`professores_id_prof`, `disciplina_id_disc`) VALUES
(22, 1),
(24, 1),
(25, 12),
(27, 15),
(28, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores_has_turma`
--

CREATE TABLE `professores_has_turma` (
  `professores_id_prof` int(5) UNSIGNED NOT NULL,
  `turma_id_turma` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores_has_turma`
--

INSERT INTO `professores_has_turma` (`professores_id_prof`, `turma_id_turma`) VALUES
(22, 1),
(24, 2),
(25, 2),
(28, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(5) UNSIGNED NOT NULL,
  `curso` varchar(200) DEFAULT NULL,
  `ano` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `curso`, `ano`) VALUES
(1, 'Redes de computadores', '3'),
(2, 'Redes de computadores', '1'),
(9, 'finanças', '2'),
(10, 'Enfermagem', '1'),
(11, 'informática', '1'),
(12, 'administração', '1'),
(13, 'informática', '2'),
(14, 'agropecuária', '2'),
(15, 'Enfermagem', '2'),
(16, 'informática', '3'),
(17, 'Enfermagem', '3'),
(18, 'segurança do trabalho', '3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disc`);

--
-- Índices para tabela `disciplina_has_turma`
--
ALTER TABLE `disciplina_has_turma`
  ADD PRIMARY KEY (`disciplina_id_disc`,`turma_id_turma`),
  ADD KEY `disciplina_has_turma_FKIndex1` (`disciplina_id_disc`),
  ADD KEY `disciplina_has_turma_FKIndex2` (`turma_id_turma`);

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`);

--
-- Índices para tabela `professores_has_disciplina`
--
ALTER TABLE `professores_has_disciplina`
  ADD PRIMARY KEY (`professores_id_prof`,`disciplina_id_disc`),
  ADD KEY `professores_has_disciplina_FKIndex1` (`professores_id_prof`),
  ADD KEY `professores_has_disciplina_FKIndex2` (`disciplina_id_disc`);

--
-- Índices para tabela `professores_has_turma`
--
ALTER TABLE `professores_has_turma`
  ADD PRIMARY KEY (`professores_id_prof`,`turma_id_turma`),
  ADD KEY `professores_has_turma_FKIndex1` (`professores_id_prof`),
  ADD KEY `professores_has_turma_FKIndex2` (`turma_id_turma`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disc` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `disciplina_has_turma`
--
ALTER TABLE `disciplina_has_turma`
  ADD CONSTRAINT `disciplina_has_turma_ibfk_1` FOREIGN KEY (`disciplina_id_disc`) REFERENCES `disciplina` (`id_disc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `disciplina_has_turma_ibfk_2` FOREIGN KEY (`turma_id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professores_has_disciplina`
--
ALTER TABLE `professores_has_disciplina`
  ADD CONSTRAINT `professores_has_disciplina_ibfk_1` FOREIGN KEY (`professores_id_prof`) REFERENCES `professores` (`id_prof`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `professores_has_disciplina_ibfk_2` FOREIGN KEY (`disciplina_id_disc`) REFERENCES `disciplina` (`id_disc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professores_has_turma`
--
ALTER TABLE `professores_has_turma`
  ADD CONSTRAINT `professores_has_turma_ibfk_1` FOREIGN KEY (`professores_id_prof`) REFERENCES `professores` (`id_prof`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `professores_has_turma_ibfk_2` FOREIGN KEY (`turma_id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
