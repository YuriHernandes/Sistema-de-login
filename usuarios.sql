-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 28/05/2024 às 12:17
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulario-yuri`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `nome_usuario`, `email`, `telefone`, `senha`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `data_cadastro`) VALUES
(20, 'julio correia', 'julio.correia', 'julio.correia@gmail.com', '123456709', 'teste', '06413110', 'Rua Serra Dourada', 'Jardim Esperança', 'Barueri', 'SP', '2024-05-27 20:41:41'),
(21, 'yago hernandes', 'yago.hernandes', 'yago@gmail.com', '123456789', 'rosemeire', '06413110', 'Rua Serra Dourada', 'Jardim Esperança', 'Barueri', 'SP', '2024-05-27 20:54:09'),
(22, 'Yuri Hernandes', 'yuri.hernandes', 'yurinandes@outlook.com', '11930092185', 'rosemeire', '06413110', 'Rua Serra Dourada', 'Jardim Esperança', 'Barueri', 'SP', '2024-05-28 00:36:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
