-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2023 às 05:29
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
-- Banco de dados: `tabela`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `uuid` char(36) NOT NULL,
  `permissao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `id_usuario`, `uuid`, `permissao`) VALUES
(1, 1, 'bd61e043-3363-4fc7-aeb3-92e05af887e5', 'login'),
(2, 1, 'bd61e043-3363-4fc7-aeb3-92e05af887e5', 'usuario_add'),
(3, 1, 'bd61e043-3363-4fc7-aeb3-92e05af887e5', 'usuario_editar'),
(4, 1, 'bd61e043-3363-4fc7-aeb3-92e05af887e5', 'usuario_deletar'),
(5, 2, '19d2be14-7f5e-4bfa-afc7-8c1142039a02', 'login'),
(6, 2, '19d2be14-7f5e-4bfa-afc7-8c1142039a02', 'usuario_add'),
(7, 4, '32ae9ae0-fdf9-4208-922b-828ea13f606a', 'login'),
(8, 4, '32ae9ae0-fdf9-4208-922b-828ea13f606a', 'usuario_add'),
(9, 4, '32ae9ae0-fdf9-4208-922b-828ea13f606a', 'usuario_editar'),
(10, 5, 'b3402bcb-9411-43d3-90e9-669e698ce071', 'login'),
(11, 5, 'b3402bcb-9411-43d3-90e9-669e698ce071', 'usuario_add'),
(12, 5, 'b3402bcb-9411-43d3-90e9-669e698ce071', 'usuario_editar'),
(13, 5, 'b3402bcb-9411-43d3-90e9-669e698ce071', 'usuario_deletar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_atualizacao` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `uuid`, `nome`, `cpf`, `email`, `senha`, `data_criacao`, `data_atualizacao`, `status`) VALUES
(1, 'bd61e043-3363-4fc7-aeb3-92e05af887e5', 'Francisco Alex', 81770473025, 'fr.alex.ferreira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-08-02 00:08:39', '2023-08-02 00:08:39', 1),
(2, '19d2be14-7f5e-4bfa-afc7-8c1142039a02', 'Fulano', 93933873037, 'fulano@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-08-03 00:13:31', '2023-08-03 00:13:31', 1),
(3, '3be8a080-e27c-42a4-9319-95003f7ecf0b', 'Ciclano', 25009743086, 'ciclano@gmail.com', '4516011882d7d313f9ab71e63c863497', '2023-08-03 00:14:19', '2023-08-03 00:14:19', 1),
(4, '32ae9ae0-fdf9-4208-922b-828ea13f606a', 'Beltrano', 31018753079, 'beltrano@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-08-03 00:16:08', '2023-08-03 00:16:08', 1),
(5, 'b3402bcb-9411-43d3-90e9-669e698ce071', 'Amanda', 52223491014, 'amanda@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2023-08-03 00:17:29', '2023-08-03 00:17:29', 1),
(6, '9c1ff80d-a614-4820-8faf-b965b410383f', 'Benício', 36598853044, 'benicio@yahoo.com', 'ac44bcf3237d23be6a458f386af33506', '2023-08-03 00:18:17', '2023-08-03 00:18:17', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
