-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2018 às 20:06
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newpsicosys`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `CLI_COD` int(11) NOT NULL,
  `CLI_NOME` varchar(100) DEFAULT NULL,
  `CLI_STATUS` varchar(3) DEFAULT NULL,
  `CLI_CPF` varchar(50) NOT NULL,
  `CLI_DATA_NASC` date NOT NULL,
  `CLI_ENDERECO` varchar(200) DEFAULT NULL,
  `CLI_CEP` varchar(20) DEFAULT NULL,
  `CLI_CONTATO_FONE1` varchar(50) DEFAULT NULL,
  `CLI_FONE1` varchar(50) DEFAULT NULL,
  `CLI_CONTATO_CEL1` varchar(50) DEFAULT NULL,
  `CLI_CEL1` varchar(50) DEFAULT NULL,
  `CLI_CONTATO_FONE2` varchar(50) DEFAULT NULL,
  `CLI_FONE2` varchar(50) DEFAULT NULL,
  `CLI_CONTATO_CEL2` varchar(50) DEFAULT NULL,
  `CLI_CEL2` varchar(50) DEFAULT NULL,
  `CLI_EMAIL` varchar(100) DEFAULT NULL,
  `CLI_COD_CID` varchar(20) DEFAULT NULL,
  `CLI_LIBERACAO` varchar(20) DEFAULT NULL,
  `CLI_CONVENIO` int(11) DEFAULT NULL,
  `CLI_OBS` varchar(500) DEFAULT NULL,
  `CLI_TIPO` varchar(20) DEFAULT NULL,
  `CLI_RESP` varchar(100) DEFAULT NULL,
  `CLI_DATA_CADASTRO` date NOT NULL,
  `CLI_PERIODO` varchar(20) DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clientes`
--

INSERT INTO `tab_clientes` (`CLI_COD`, `CLI_NOME`, `CLI_STATUS`, `CLI_CPF`, `CLI_DATA_NASC`, `CLI_ENDERECO`, `CLI_CEP`, `CLI_CONTATO_FONE1`, `CLI_FONE1`, `CLI_CONTATO_CEL1`, `CLI_CEL1`, `CLI_CONTATO_FONE2`, `CLI_FONE2`, `CLI_CONTATO_CEL2`, `CLI_CEL2`, `CLI_EMAIL`, `CLI_COD_CID`, `CLI_LIBERACAO`, `CLI_CONVENIO`, `CLI_OBS`, `CLI_TIPO`, `CLI_RESP`, `CLI_DATA_CADASTRO`, `CLI_PERIODO`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(33, 'KASSIANA BARBOSA DO NASCIMENTO', 'on', '314.223.883-28', '2000-10-06', 'JOANA RONCAGLIO BERTOLDI', '81.490-468', '', '', 'MÃ£E', '(41) 99959-5565', '', '', '', '', 'KASSIANABARBOSA@GMAIL.COM', '124567', '123E4567', 6, '', 'Crianca', '', '0000-00-00', 'Manha', '2018-12-06 02:22:25', 'LUCAS', '2018-12-06 15:42:02', 'LUCAS'),
(34, 'JOSE PEDRO LUIZ', 'ON', '887.245.382-80', '1986-02-10', 'RUA PEDRO FABREGAS 123', '86.543-333', '', '', 'JOSE PEDRO', '(41) 98765-4345', '', '', '', '', 'JOSEPEDRO@HOTMAIL.COM', '', '45545454', 7, '', 'IDOSO', '', '2018-12-06', 'NOITE', '2018-12-06 15:21:15', 'LUCAS', '0000-00-00 00:00:00', ''),
(35, 'CLAUDIO LIMA SANTOS', 'ON', '880.460.778-52', '1975-09-05', 'JOANA RONCAGLIO BERTOLDI', '81.490-468', '', '', 'MÃ£E', '(41) 99959-5565', '', '', '', '', 'CLAUDIO1345@GMAIL.COM', '', '12213', 6, '', 'ADULTO', '', '2018-12-06', 'TARDE', '2018-12-06 15:33:32', 'LUCAS', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_convenios`
--

CREATE TABLE `tab_convenios` (
  `CONV_COD` int(11) NOT NULL,
  `CONV_STATUS` varchar(3) NOT NULL,
  `CONV_NOME` varchar(100) NOT NULL,
  `CONV_CNPJ` varchar(50) NOT NULL,
  `CONV_ENDERECO` varchar(200) NOT NULL,
  `CONV_CEP` varchar(20) DEFAULT NULL,
  `CONV_FONE` varchar(50) DEFAULT NULL,
  `CONV_CONTATO_FONE` varchar(50) DEFAULT NULL,
  `CONV_CEL` varchar(50) DEFAULT NULL,
  `CONV_CONTATO_CEL` varchar(50) DEFAULT NULL,
  `CONV_CONTATO` varchar(100) DEFAULT NULL,
  `CONV_EMAIL` varchar(100) DEFAULT NULL,
  `CONV_SITE` varchar(100) DEFAULT NULL,
  `CONV_OBS` varchar(500) DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_convenios`
--

INSERT INTO `tab_convenios` (`CONV_COD`, `CONV_STATUS`, `CONV_NOME`, `CONV_CNPJ`, `CONV_ENDERECO`, `CONV_CEP`, `CONV_FONE`, `CONV_CONTATO_FONE`, `CONV_CEL`, `CONV_CONTATO_CEL`, `CONV_CONTATO`, `CONV_EMAIL`, `CONV_SITE`, `CONV_OBS`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(6, 'ON', 'PARTICULAR', '15.995.831/0001-18', '', '', '(11) 2325-6554', 'RECEPÃ§Ã£O', '', '', NULL, 'PARTICULAR@PSICOSYS.COM', '', '', '2018-12-06 02:23:04', 'LUCAS', '0000-00-00 00:00:00', ''),
(7, 'ON', 'UNIMED', '86.236.019/0001-57', 'ALFERES POLI 1254', '', '(41) 3556-7889', 'RECEPÃ§Ã£O', '', '', NULL, 'ATENDIMENTO@UNIMED.COM.BR', 'UNIMED.COM.BR', '', '2018-12-06 02:24:12', 'LUCAS', '0000-00-00 00:00:00', ''),
(8, 'ON', 'CLINIPAM', '87.494.167/0001-34', 'JOÃ£O NEGRÃ£O 2124', '', '(41) 3898-7654', 'RECEPÃ§Ã£O', '', '', NULL, 'ATENDIMENTO@CLINIPAM.COM.BR', 'CLINIPAM.COM.BR', '', '2018-12-06 02:24:59', 'LUCAS', '0000-00-00 00:00:00', ''),
(9, 'ON', 'PSICOCENTRO', '78.784.511/5515-15', 'JOANA RONCAGLIO', '81.490-468', '(41) 3455-5656', 'RECEPÃ§Ã£O', '', '', NULL, 'PSICODENTRO@PSICOSYS.COM', 'PSICOCENTRO.COM.BR', '', '2018-12-06 02:27:07', 'LUCAS', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_eventos`
--

CREATE TABLE `tab_eventos` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `PROF_ID` int(11) NOT NULL,
  `CLI_ID` int(11) NOT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL,
  `STATUS` varchar(1) NOT NULL,
  `ID_TPCONSULTA` int(11) NOT NULL,
  `SALA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_eventos`
--

INSERT INTO `tab_eventos` (`ID`, `title`, `start`, `end`, `PROF_ID`, `CLI_ID`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`, `STATUS`, `ID_TPCONSULTA`, `SALA_ID`) VALUES
(3, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-06 09:00:00', '2018-12-06 09:30:00', 16, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(4, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-06 14:00:00', '2018-12-06 14:30:00', 16, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(5, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-07 09:00:00', '2018-12-07 09:30:00', 16, 33, NULL, NULL, NULL, NULL, 'A', 1, 1),
(6, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-06 15:00:00', '2018-12-06 15:30:00', 16, 33, NULL, NULL, NULL, NULL, 'D', 1, 1),
(7, 'JOSE PEDRO LUIZ', '2018-12-06 16:00:00', '2018-12-06 17:00:00', 16, 34, NULL, NULL, NULL, NULL, 'A', 2, 2),
(8, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-05 09:00:00', '2018-12-05 09:30:00', 16, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(9, 'CLAUDIO LIMA SANTOS', '2018-12-04 14:00:00', '2018-12-04 14:30:00', 17, 35, NULL, NULL, NULL, NULL, 'C', 1, 1),
(10, 'JOSE PEDRO LUIZ', '2018-12-03 09:00:00', '2018-12-03 09:30:00', 16, 34, NULL, NULL, NULL, NULL, 'C', 1, 1),
(11, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-12-02 15:00:00', '2018-12-02 15:30:00', 17, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(12, 'CLAUDIO LIMA SANTOS', '2018-12-01 16:00:00', '2018-12-01 17:00:00', 16, 35, NULL, NULL, NULL, NULL, 'C', 2, 2),
(13, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-11-05 09:00:00', '2018-11-05 09:30:00', 16, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(14, 'CLAUDIO LIMA SANTOS', '2018-11-04 14:00:00', '2018-11-04 14:30:00', 17, 35, NULL, NULL, NULL, NULL, 'C', 1, 1),
(15, 'JOSE PEDRO LUIZ', '2018-11-03 09:00:00', '2018-11-03 09:30:00', 16, 34, NULL, NULL, NULL, NULL, 'C', 1, 1),
(16, 'KASSIANA BARBOSA DO NASCIMENTO', '2018-11-02 15:00:00', '2018-11-02 15:30:00', 17, 33, NULL, NULL, NULL, NULL, 'C', 1, 1),
(17, 'CLAUDIO LIMA SANTOS', '2018-11-01 16:00:00', '2018-11-01 17:00:00', 16, 35, NULL, NULL, NULL, NULL, 'C', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_profissionais`
--

CREATE TABLE `tab_profissionais` (
  `PROF_COD` int(11) NOT NULL,
  `PROF_NOME` varchar(100) NOT NULL,
  `PROF_STATUS` varchar(3) NOT NULL,
  `PROF_ESPECIALIDADE` varchar(100) DEFAULT NULL,
  `PROF_TIPO_CRIANCA` varchar(1) DEFAULT NULL,
  `PROF_TIPO_ADOLESCENTE` varchar(1) DEFAULT NULL,
  `PROF_TIPO_ADULTO` varchar(1) DEFAULT NULL,
  `PROF_TIPO_IDOSO` varchar(1) DEFAULT NULL,
  `PROF_CNPJ_CPF` varchar(50) NOT NULL,
  `PROF_CONSELHO` varchar(100) DEFAULT NULL,
  `PROF_DATA_NASC` date NOT NULL,
  `PROF_ENDERECO` varchar(200) NOT NULL,
  `PROF_CEP` varchar(20) DEFAULT NULL,
  `PROF_FONE1` varchar(50) DEFAULT NULL,
  `PROF_CEL1` varchar(50) DEFAULT NULL,
  `PROF_EMAIL` varchar(100) DEFAULT NULL,
  `PROF_CONVENIO` int(11) DEFAULT NULL,
  `PROF_OBS` varchar(500) DEFAULT NULL,
  `PROF_FONE2` varchar(50) DEFAULT NULL,
  `PROF_CEL2` varchar(50) DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_profissionais`
--

INSERT INTO `tab_profissionais` (`PROF_COD`, `PROF_NOME`, `PROF_STATUS`, `PROF_ESPECIALIDADE`, `PROF_TIPO_CRIANCA`, `PROF_TIPO_ADOLESCENTE`, `PROF_TIPO_ADULTO`, `PROF_TIPO_IDOSO`, `PROF_CNPJ_CPF`, `PROF_CONSELHO`, `PROF_DATA_NASC`, `PROF_ENDERECO`, `PROF_CEP`, `PROF_FONE1`, `PROF_CEL1`, `PROF_EMAIL`, `PROF_CONVENIO`, `PROF_OBS`, `PROF_FONE2`, `PROF_CEL2`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(16, 'TIAGO SILVA', 'on', 'PSIQUIATRA', 'C', NULL, NULL, NULL, '581.142.495-79', 'CRM', '1992-10-03', 'JOAO BETTEGA 1123', '81.490-468', '(41) 3448-7847', '(41) 98765-6776', 'LUCAS.MS.ELO84@GMAIL.COM', 6, '', '', '', '2018-12-06 02:30:46', 'LUCAS', '2018-12-06 15:54:14', 'LUCAS'),
(17, 'LUIZ CLAUDIO LISBOA', 'ON', 'PSICOLOGO', 'A', NULL, NULL, NULL, '448.561.888-95', 'CRM', '1970-12-01', 'JOAO NEGRÃ£O 123', '87.856-556', '', '(41) 98765-4343', 'LUIZ@PSICOSYS.COM.BR', 9, '', '', '', '2018-12-06 15:36:13', 'LUCAS', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_prontuarios`
--

CREATE TABLE `tab_prontuarios` (
  `PRON_ID` int(11) NOT NULL,
  `PRON_PROFISSIONAL` varchar(50) NOT NULL,
  `PRON_IDPROF` int(11) NOT NULL,
  `PRON_CLIENTE` int(11) NOT NULL,
  `PRON_DESC` varchar(5000) DEFAULT NULL,
  `PRON_DATAHORA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_prontuarios`
--

INSERT INTO `tab_prontuarios` (`PRON_ID`, `PRON_PROFISSIONAL`, `PRON_IDPROF`, `PRON_CLIENTE`, `PRON_DESC`, `PRON_DATAHORA`) VALUES
(1, 'LUCAS', 1, 34, 'PACIENTE APRESENTOU MELHORA NA ULTIMA SESSÃ£O, SENDO ASSIM FOI DIMINUÃ­DO A DE REMÃ©DIOS. ', '2018-12-06 15:50:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_salas`
--

CREATE TABLE `tab_salas` (
  `SALA_COD` int(11) NOT NULL,
  `SALA_DESC` varchar(50) DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_salas`
--

INSERT INTO `tab_salas` (`SALA_COD`, `SALA_DESC`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(1, 'SALA 13', '2018-12-06 02:25:42', 'LUCAS', '0000-00-00 00:00:00', ''),
(2, 'SALA 14', '2018-12-06 02:25:48', 'LUCAS', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_tpconsulta`
--

CREATE TABLE `tab_tpconsulta` (
  `CONS_COD` int(11) NOT NULL,
  `CONS_DESC` varchar(50) NOT NULL,
  `CONS_VALOR` decimal(10,2) NOT NULL,
  `CONS_TEMPO` float DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_tpconsulta`
--

INSERT INTO `tab_tpconsulta` (`CONS_COD`, `CONS_DESC`, `CONS_VALOR`, `CONS_TEMPO`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(1, '30 MIN.', '50.00', 30, NULL, NULL, NULL, NULL),
(2, '1 HORA', '90.00', 60, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `USU_COD` int(11) NOT NULL,
  `USU_NOME` varchar(100) DEFAULT NULL,
  `USU_EMAIL` varchar(100) NOT NULL,
  `USU_SENHA` varchar(100) NOT NULL,
  `USU_STATUS` varchar(3) DEFAULT NULL,
  `USU_TIPO` varchar(20) DEFAULT NULL,
  `CRIADO_EM` datetime DEFAULT NULL,
  `USUARIO_CRI` varchar(50) DEFAULT NULL,
  `ALTERADO_EM` datetime DEFAULT NULL,
  `USUARIO_ALT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`USU_COD`, `USU_NOME`, `USU_EMAIL`, `USU_SENHA`, `USU_STATUS`, `USU_TIPO`, `CRIADO_EM`, `USUARIO_CRI`, `ALTERADO_EM`, `USUARIO_ALT`) VALUES
(1, 'LUCAS', 'LUCAS@PSICOSYS.COM.BR', '1234', 'ON', 'SISTEMA', '2018-12-06 01:34:41', 'ADMIN', '0000-00-00 00:00:00', ''),
(2, 'TIAGO', 'TIAGO@PSICOSYS.COM.BR', '1234', 'ON', 'SISTEMA', '2018-12-06 15:43:48', 'LUCAS', '0000-00-00 00:00:00', ''),
(3, 'ADEMIR', 'ADEMIR@PSICOSY.COM.BR', '1234', 'ON', 'ADMINISTRATIVO', '2018-12-06 15:45:25', 'LUCAS', '0000-00-00 00:00:00', ''),
(4, 'LUIZ', 'LUIZ@psicosys.COM.BR', '1234', 'on', 'Administrativo', '2018-12-06 15:46:50', 'LUCAS', '2018-12-06 15:49:01', 'LUCAS'),
(5, 'TIAGOS', 'TIAGOS@PSICOSYS.COM.BR', '1234', 'ON', 'PSIQUIATRA', '2018-12-06 15:48:12', 'LUCAS', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  ADD PRIMARY KEY (`CLI_COD`);

--
-- Indexes for table `tab_convenios`
--
ALTER TABLE `tab_convenios`
  ADD PRIMARY KEY (`CONV_COD`);

--
-- Indexes for table `tab_eventos`
--
ALTER TABLE `tab_eventos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_cli` (`CLI_ID`),
  ADD KEY `fk_prof` (`PROF_ID`),
  ADD KEY `fk_tpconsulta` (`ID_TPCONSULTA`);

--
-- Indexes for table `tab_profissionais`
--
ALTER TABLE `tab_profissionais`
  ADD PRIMARY KEY (`PROF_COD`);

--
-- Indexes for table `tab_prontuarios`
--
ALTER TABLE `tab_prontuarios`
  ADD PRIMARY KEY (`PRON_ID`),
  ADD KEY `fk_pron_cli` (`PRON_CLIENTE`);

--
-- Indexes for table `tab_salas`
--
ALTER TABLE `tab_salas`
  ADD PRIMARY KEY (`SALA_COD`);

--
-- Indexes for table `tab_tpconsulta`
--
ALTER TABLE `tab_tpconsulta`
  ADD PRIMARY KEY (`CONS_COD`);

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`USU_COD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  MODIFY `CLI_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tab_convenios`
--
ALTER TABLE `tab_convenios`
  MODIFY `CONV_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tab_eventos`
--
ALTER TABLE `tab_eventos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tab_profissionais`
--
ALTER TABLE `tab_profissionais`
  MODIFY `PROF_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tab_prontuarios`
--
ALTER TABLE `tab_prontuarios`
  MODIFY `PRON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_salas`
--
ALTER TABLE `tab_salas`
  MODIFY `SALA_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_tpconsulta`
--
ALTER TABLE `tab_tpconsulta`
  MODIFY `CONS_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `USU_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_prontuarios`
--
ALTER TABLE `tab_prontuarios`
  ADD CONSTRAINT `fk_pron_cli` FOREIGN KEY (`PRON_CLIENTE`) REFERENCES `tab_clientes` (`CLI_COD`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
