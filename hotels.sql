-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2022 at 02:18 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `chambre` int(11) NOT NULL,
  `reserver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `debut`, `fin`, `fullname`, `cin`, `telephone`, `email`, `chambre`, `reserver`) VALUES
(19, '2022-08-15', '2022-08-17', 'vvvvv', 'vvvv', 'vvvv', 'vvvv@gmail.com', 14, 5),
(20, '2022-08-17', '2022-08-30', 'www', 'wwwww', 'wwwww', 'vvvvvv@gmail.com', 17, 5),
(21, '2022-08-16', '2022-08-25', 'kgjgjg', 'hvhnvhnv', 'hvhvhvhv', 'tttt@gmail.com', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Single'),
(2, 'double');

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `nbr_place` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`id`, `number`, `nbr_place`, `hotel`, `categorie`, `image`) VALUES
(14, 235, 2, 24, 1, '237506055.jpg'),
(15, 955, 1, 24, 2, '1401012783.jpg'),
(16, 251, 2, 25, 1, '2089946203.jpg'),
(17, 758, 1, 25, 2, '524655038.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `phone`) VALUES
(1, 'test', 'test'),
(2, 'gggg', 'fff'),
(3, 'vvv', 'ffff'),
(4, 'sss', 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `ville` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `libelle`, `ville`, `adresse`, `telephone`, `image`) VALUES
(24, 'Splendide', 1, 'Rabat', '0537202020', '1641835894.jpg'),
(25, 'Gaulois', 1, 'Rabat', '0537303030', '1502258601.jpg'),
(26, 'Paris', 2, 'Centre', '0536363636', '1877199940.jpg'),
(27, 'SAADA', 3, 'SAADA', '0524151525', '1890428322.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'BOUTA REDA', 'reda19burn1997@gmail.com', 'Reclamation', 'hdjvbdfbvkjdbvkdifkv kjsdbvkdsvjbdsvnsd jdvksdfsdifnskjdfb jsdlisjdfbh,sdfjsd'),
(2, 'CHAIMAE BENKIRAN', 'chaimaebenkiran@gmail.com', 'Reclamation', 'Service Impeccable. Merci Pour Vos Services.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `permission` varchar(255) NOT NULL DEFAULT 'client',
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `CIN`, `Adresse`, `telephone`, `permission`, `email`, `pass`, `image`) VALUES
(3, 'youness', 'AB123', 'tanger', '05050505050', 'admin', 'admin@admin.com', '123456789', '33510930.png'),
(5, 'youness', 'ID99117', 'casa', '0505050505', 'client', 'Shima.200e@gmail.com', '123456789', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `libelle`) VALUES
(1, 'Rabat'),
(2, 'Tanger'),
(3, 'Fes'),
(4, 'Oujda'),
(5, 'Dakhla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dd` (`chambre`),
  ADD KEY `vvv` (`reserver`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bb` (`hotel`),
  ADD KEY `cc` (`categorie`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aa` (`ville`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `dd` FOREIGN KEY (`chambre`) REFERENCES `chambre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vvv` FOREIGN KEY (`reserver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `bb` FOREIGN KEY (`hotel`) REFERENCES `hotel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cc` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `aa` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
