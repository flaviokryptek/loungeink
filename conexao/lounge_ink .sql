-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2020 at 11:52 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lounge_ink`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nome`) VALUES
(1, 'Todas'),
(7, 'Flor'),
(12, 'Animais'),
(13, 'CoraÃ§Ã£o'),
(14, 'Frases');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `nome`, `imagem`, `descricao`) VALUES
(15, 'Slide 1', '09128c5197bbd2a9a3d70c738f4a4c6d.png', 'Slide 1'),
(16, 'Slide 2', '52d1bf1715306835f5a0de1dc279b0dc.png', 'Slide 2'),
(17, 'teste', 'a7bc056ddfbb652df997f585f0a3926c.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `titulo`, `texto`, `imagem`) VALUES
(1, 'PRIMEIRA TATUAGEM', 'Quer fazer sua primeira tatuagem, mas estÃ¡ com duvidas? nÃ£o se preocupe, nosso time de especialistas estÃ¡ preparado para lhe ajudar com as mais valiosas dicas para escolher a melhor tatuagem para vocÃª.', 'a04d3f79fecda20ada19b54386be1fb5.jpeg'),
(2, 'O LUGAR PERFEITO', 'A Tattooaria Lounge Ink Ã© um dos estÃºdios de tatuagem mais exclusivos em TangarÃ¡ da Serra. O clima confortÃ¡vel e relaxante, combinado com o nosso excepcional atendimento ao cliente nos coloca acima da mÃ©dia dos estÃºdios de tattoo.', 'aefa3d6db7f520a60c89200499705382.jpeg'),
(3, 'LOUNGE', 'NÃ³s contamos com uma Ã¡rea especial para receber nossos clientes, quem vier em nosso salÃ£o, pode relaxar e desfrutar de uma boa musica e apreciar uma bebida enquanto a guarda o nosso atendimento.', '96f2c2f1f199e4040300d173affaf0d8.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `nome` int(50) DEFAULT NULL,
  `album` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeria`
--

INSERT INTO `galeria` (`id`, `nome`, `album`, `foto`) VALUES
(189, NULL, 'Flor', 'c55860df20a2ecb5d23580a69d6c5b2b.jpg'),
(190, NULL, 'Flor', 'e3aead767604c4eb60f1f7ac795db593.jpg'),
(191, NULL, 'Flor', '7b17c9d9cfc45163e438fe58f1383392.jpg'),
(192, NULL, 'Flor', '6807efb4e54972b0ab81c4f2c7503968.jpg'),
(193, NULL, 'Animais', 'abb01f079ad6dcc2fade5e5d9a2add9b.jpg'),
(194, NULL, 'Animais', '0a5215280c331484f43d658d33a75f85.jpg'),
(195, NULL, 'Animais', 'b5862ff48289c15bd317650399a463b4.jpg'),
(196, NULL, 'Animais', 'e60cbea71876bb705a33f00a6ad27523.jpg'),
(197, NULL, 'CoraÃ§Ã£o', 'ad723f9f3c4c39294a50cbb3352b5320.jpg'),
(198, NULL, 'CoraÃ§Ã£o', 'ce29e57e961149e27593a931b28aab46.jpg'),
(200, NULL, 'CoraÃ§Ã£o', '10108378c9c2cab60529cf79f8468ca1.jpg'),
(201, NULL, 'CoraÃ§Ã£o', '1c3f7050910e3ef26e04264ee5809ea3.jpg'),
(202, NULL, 'Frases', '398fea862b4454d014ce9dbcd91e4f49.jpg'),
(203, NULL, 'Frases', '1031a5101632c6f78df8b584d8e85db7.jpg'),
(204, NULL, 'Frases', '0722caaddcde32f5a5194fb2f0900bb1.jpg'),
(205, NULL, 'Frases', 'f390faec6f8144931f0b92813263cb4b.jpg'),
(216, NULL, 'Animais', '98276fbee9b43d3e80c304d7f992e36c.jpg'),
(217, NULL, 'Animais', '3fa947a37fea04a8393bb91ad999a527.jpg'),
(218, NULL, 'Animais', '7f0cd010aaa99e3b7daf6664ca462ce1.jpg'),
(219, NULL, 'Animais', '85f37474c033d82a752e6fdb880a7ef9.jpg'),
(220, NULL, 'Animais', 'd9752fc3f7582632420858b14f92099f.jpg'),
(221, NULL, 'Flor', '38792f7b81dfbd84a83a945c70eff982.jpg'),
(222, NULL, 'Flor', '29ab2790ee666d4fdf4a5239084da945.jpg'),
(223, NULL, 'Flor', '9f911f0bbb33a504ef23d69937719e0b.jpg'),
(224, NULL, 'Flor', '4930df653a60c8fc348289ff2a1fc223.jpg'),
(225, NULL, 'Flor', 'f81d6ede287ee699929dba8d05d6e462.jpg'),
(226, NULL, 'CoraÃ§Ã£o', '7cc6d2310c2c7eb1a9c639840a78b778.jpg'),
(227, NULL, 'CoraÃ§Ã£o', '8e74d77fc9db49bdd40f56d961a875f9.jpg'),
(228, NULL, 'CoraÃ§Ã£o', '16e7d91c24a6d218e76c09b8718209c7.jpg'),
(229, NULL, 'CoraÃ§Ã£o', 'a184e901dab55d7a3609b5aed2299d0c.jpg'),
(232, NULL, 'CoraÃ§Ã£o', '6c19cc71aff3716f5e3721c5eac89119.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `nome`, `link`, `imagem`) VALUES
(1, 'Patrocinador 1', 'http://192.168.1.8/loungeink/', '0415fd5a0cc8013fb47659ef7509ea84.jpeg'),
(2, 'Patrocinador 2', 'http://192.168.1.8/loungeink/', 'e9ba9c631ad573ed29aa53f610482db7.jpeg'),
(3, 'Patrocinador 3', 'http://192.168.1.8/loungeink/', '80113cf79c7f12a4d34e6e1d01f8656f.jpeg'),
(4, 'Patrocinador 4', 'http://192.168.1.8/loungeink/', '73a958da760e683184b9694fd4cc7ad8.jpeg'),
(5, 'Patrocinador 5', 'http://192.168.1.8/loungeink/', '99e0121dfdec8962bfa42006bc168dd7.jpeg'),
(6, 'Patrocinador 6', 'http://192.168.1.8/loungeink/', '6cfb8f93073d52063551007672636d1b.jpeg'),
(7, 'Patrocinador 7', 'http://192.168.1.8/loungeink/', 'b7b35d3d48f408cccd2ee38e6343e7ba.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(11, 'Administrador', 'administrador', '$2y$10$TSabg2c6wYbT./.a6YY4AexQ0i3LatyiDkJFHYD4bCRLcV6q8LsAq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
