-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2022 às 04:14
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `budogs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `status`) VALUES
(11, 'combos', 1),
(12, 'combinados', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nome`, `quantidade`, `status`) VALUES
(1, 'cebola', '10', 0),
(2, 'macarrao', '20', 0),
(3, 'pao', '5', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `bebida` varchar(10) NOT NULL DEFAULT '0',
  `batata` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `ingredientes`, `status`, `img`, `tipo`, `valor`, `bebida`, `batata`) VALUES
(7, 'Queijo Simples', 'Pão; Carne; Mussarela; Alface; Tomate', 1, 'dist/img/combinados/1646096579.png', 'combinados', '30,00', '2,00', '4,00'),
(8, 'Queijo Simples', 'Pão, Carne, Mussarela, Alface, Tomate', 1, 'dist/img/combinados/1646096616.png', 'combinados', '30,00', '0', '0'),
(9, 'Queijo Simples', 'Pão, Carne, Mussarela, Alface, Tomate', 1, 'dist/img/combinados/1646096681.png', 'combinados', '30,00', '0', '0'),
(10, 'Triato', 'Pão, Carne, Mussarela, Ovo, Bacon', 1, 'dist/img/combinados/1646096763.png', 'combinados', '20,00', '0', '0'),
(11, 'Trivial', 'Pão, Carne, Mussarela, Ovo, Alface, Tomate', 1, 'dist/img/combinados/1646096807.png', 'combinados', '35,00', '0', '0'),
(12, 'Guloso', 'Pão, Carne, Mussarela, Apresuntado, Bacon, Alface', 1, 'dist/img/combinados/1646096867.png', 'combinados', '40,00', '0', '0'),
(13, 'Fantastico', 'Pão, Carne, Mussarela, Salsicha,  Apresuntado, Bacon, Ovo', 1, 'dist/img/combinados/1646096994.png', 'combinados', '45,00', '0', '0'),
(14, 'Calabresa', 'asdfasdf', 1, 'dist/img/combos/1646097350.png', 'combos', '20,00', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
