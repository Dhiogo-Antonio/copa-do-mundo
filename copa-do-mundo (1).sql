-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/02/2026 às 12:46
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `copa-do-mundo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `selecao_id` int(11) NOT NULL,
  `pontos` int(11) DEFAULT 0,
  `jogos` int(11) DEFAULT 0,
  `vitorias` int(11) DEFAULT 0,
  `empates` int(11) DEFAULT 0,
  `derrotas` int(11) DEFAULT 0,
  `gols_pro` int(11) DEFAULT 0,
  `gols_contra` int(11) DEFAULT 0,
  `saldo_gols` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`) VALUES
(7, '1'),
(8, '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `selecao_casa_id` int(11) NOT NULL,
  `selecao_fora_id` int(11) NOT NULL,
  `gols_casa` int(11) DEFAULT 0,
  `gols_fora` int(11) DEFAULT 0,
  `data_jogo` datetime DEFAULT NULL,
  `status` enum('agendado','finalizado') DEFAULT 'agendado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id`, `grupo_id`, `selecao_casa_id`, `selecao_fora_id`, `gols_casa`, `gols_fora`, `data_jogo`, `status`) VALUES
(1, 7, 64, 65, 0, 0, '1901-02-23 07:53:00', 'agendado'),
(2, 8, 64, 64, 4, 4, '2026-02-13 08:59:00', 'finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `selecoes`
--

CREATE TABLE `selecoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `continente` varchar(50) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `pontos` int(11) DEFAULT 0,
  `vitorias` int(11) DEFAULT 0,
  `empates` int(11) DEFAULT 0,
  `derrotas` int(11) DEFAULT 0,
  `gols_marcados` int(11) DEFAULT 0,
  `gols_sofridos` int(11) DEFAULT 0,
  `saldo_gols` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `selecoes`
--

INSERT INTO `selecoes` (`id`, `nome`, `continente`, `grupo_id`, `pontos`, `vitorias`, `empates`, `derrotas`, `gols_marcados`, `gols_sofridos`, `saldo_gols`) VALUES
(64, 'Brasil', 'América do Sul', 7, 0, 0, 0, 0, 0, 0, 0),
(65, 'Brasil', 'América do Sul', 7, 0, 0, 0, 0, 0, 0, 0),
(66, 'Brasil', 'América do Sul', 8, 0, 0, 0, 0, 0, 0, 0),
(67, 'Brasil', 'América do Sul', 8, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `selecao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `idade`, `email`, `senha`, `cargo`, `selecao_id`) VALUES
(3, 'dhiogo', 16, 'dhiogo@gmail', '1234', 'Jogador', 65),
(7, 'Gabriel Machado', 17, 'gabriel@gmail', '1234', 'Jogador', 66);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo_id` (`grupo_id`,`selecao_id`),
  ADD KEY `selecao_id` (`selecao_id`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `selecao_casa_id` (`selecao_casa_id`),
  ADD KEY `selecao_fora_id` (`selecao_fora_id`);

--
-- Índices de tabela `selecoes`
--
ALTER TABLE `selecoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `selecao_id` (`selecao_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `selecoes`
--
ALTER TABLE `selecoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `classificacao_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classificacao_ibfk_2` FOREIGN KEY (`selecao_id`) REFERENCES `selecoes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jogos_ibfk_2` FOREIGN KEY (`selecao_casa_id`) REFERENCES `selecoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jogos_ibfk_3` FOREIGN KEY (`selecao_fora_id`) REFERENCES `selecoes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `selecoes`
--
ALTER TABLE `selecoes`
  ADD CONSTRAINT `selecoes_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`selecao_id`) REFERENCES `selecoes` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
