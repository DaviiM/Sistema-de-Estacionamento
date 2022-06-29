-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 05:09
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdestacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `tipoCliente` varchar(15) DEFAULT NULL,
  `docIdentificadorCliente` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codCliente`, `nomeCliente`, `tipoCliente`, `docIdentificadorCliente`) VALUES
(1, 'Davi', 'Físico', '1234567'),
(5, 'Teste', 'Jurídico', '453t');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcontrato`
--

CREATE TABLE `tbcontrato` (
  `codContrato` int(11) NOT NULL,
  `numVagas` int(11) DEFAULT NULL,
  `tipoPagamento` varchar(10) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `codCliente` int(11) DEFAULT NULL,
  `nomeConvenio` varchar(50) DEFAULT NULL,
  `eventoContrato` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcontrato`
--

INSERT INTO `tbcontrato` (`codContrato`, `numVagas`, `tipoPagamento`, `dataInicio`, `dataFinal`, `codCliente`, `nomeConvenio`, `eventoContrato`) VALUES
(1, 2, 'Vista', '2022-06-27', '2022-06-28', 1, 'as', 'sa'),
(3, 2431, 'Parcelado', '2022-06-06', '2022-07-04', 5, 'dsaads', 'gfdgsr');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- Índices para tabela `tbcontrato`
--
ALTER TABLE `tbcontrato`
  ADD PRIMARY KEY (`codContrato`),
  ADD KEY `codCliente` (`codCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbcontrato`
--
ALTER TABLE `tbcontrato`
  MODIFY `codContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcontrato`
--
ALTER TABLE `tbcontrato`
  ADD CONSTRAINT `tbcontrato_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `tbcliente` (`codCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
