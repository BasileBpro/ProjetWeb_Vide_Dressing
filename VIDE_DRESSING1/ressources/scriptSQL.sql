-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2019 at 10:35 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonjour`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces`
--

CREATE TABLE `acces` (
  `Code` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Telephone` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Adresse` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CodePostal` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Ville` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Mot de passe` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Autorisation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acces`
--

INSERT INTO `acces` (`Code`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `CodePostal`, `Ville`, `Mot de passe`, `Autorisation`) VALUES
('aaa', 'Admin', 'Admin', 'admin@hotmail.fr', '0605040302', '1 rue admin', '35000', 'Rennes', 'admin', 1),
('jdu', 'dupont', 'jean', 'jean.dupont@gmail.com', '0666666666', '4 allée des pruneliers', '35000', 'Rennes', 'azertyuiop', 0),
('tha', 'Halliday', 'Thibault', 'thiabult.hallyday@hotmail.fr', '0612345678', '20 rue de paris', '75000', 'Paris', 'bonjour', 0);

-- --------------------------------------------------------

--
-- Table structure for table `liste`
--

CREATE TABLE `liste` (
  `idLISTE` int(11) NOT NULL,
  `Statut` varchar(45) DEFAULT NULL,
  `Trigramme` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liste`
--

INSERT INTO `liste` (`idLISTE`, `Statut`, `Trigramme`) VALUES
(1, 'SOUMISE', 'jdu'),
(2, 'SOUMISE', 'tha');

-- --------------------------------------------------------

--
-- Table structure for table `vetement`
--

CREATE TABLE `vetement` (
  `CodeArticle` int(4) NOT NULL,
  `Taille` varchar(45) DEFAULT NULL,
  `Prix` float DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Statut` varchar(45) DEFAULT NULL,
  `LISTE_idLISTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vetement`
--

INSERT INTO `vetement` (`CodeArticle`, `Taille`, `Prix`, `Description`, `Statut`, `LISTE_idLISTE`) VALUES
(1, 'S', 20, 'Tee-shirt', 'SOUMIS', 1),
(2, 'XXL', 5, 'Short', 'SOUMIS', 1),
(3, '12 ans', 10, 'chaussures de sport', 'SOUMIS', 2),
(4, '34', 3, 'Chaussons', 'SOUMIS', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`idLISTE`);

--
-- Indexes for table `vetement`
--
ALTER TABLE `vetement`
  ADD PRIMARY KEY (`CodeArticle`),
  ADD KEY `fk_VETEMENT_LISTE_idx` (`LISTE_idLISTE`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vetement`
--
ALTER TABLE `vetement`
  ADD CONSTRAINT `fk_VETEMENT_LISTE` FOREIGN KEY (`LISTE_idLISTE`) REFERENCES `liste` (`idLISTE`) ON DELETE cascade ON UPDATE cascade;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
