

CREATE TABLE `colaborador` (
  `CPF` varchar(11) NOT NULL,
  `RG` int(7) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `UNIDADE` varchar(50) NOT NULL,
  `NASC` int(11) NOT NULL,
  `PFP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaborador`
--


-- --------------------------------------------------------


CREATE TABLE `reviews` (
  `USERPFP` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMENTARIO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESTRELAS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `NOME` varchar(100) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `COD` int(11) NOT NULL,
  `ID` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidade`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `senha`) VALUES
(2147483647, 'admin', '12345');

-- --------------------------------------------------------

