
CREATE DATABASE IF NOT EXISTS `laravelapi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `laravelapi`;

CREATE TABLE `cliente` (
  `id` tinyint(4) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pastel`
--

CREATE TABLE `pastel` (
  `id` tinyint(4) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastel`
--

INSERT INTO `pastel` (`id`, `nome`, `preco`, `foto`, `deleted_at`) VALUES
(5, 'Pastel de Feira', '10', NULL, NULL),
(6, 'Pastel Brasileiro', '12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `idCliente` tinyint(4) NOT NULL DEFAULT '0',
  `idPastel` tinyint(4) NOT NULL DEFAULT '0',
  `dataCriacao` date NOT NULL,
  `id` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastel`
--
ALTER TABLE `pastel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pedido_cliente` (`idCliente`),
  ADD KEY `FK_pedido_pastel` (`idPastel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pastel`
--
ALTER TABLE `pastel`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_pedido_pastel` FOREIGN KEY (`idPastel`) REFERENCES `pastel` (`id`);


