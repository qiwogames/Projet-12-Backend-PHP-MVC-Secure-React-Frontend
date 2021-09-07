-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 29 août 2021 à 10:37
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEns` varchar(250) NOT NULL,
  `prenomEns` varchar(250) NOT NULL,
  `nomMatiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nomMatiere` (`nomMatiere`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nomEns`, `prenomEns`, `nomMatiere`) VALUES
(1, 'FILO', 'Robert', 9),
(2, 'MATEUX', 'Lucie', 1),
(3, 'SCIENCENAT', 'Tom', 2),
(4, 'BECBENZEN', 'Alice', 3),
(5, 'FOOT', 'Jean', 4),
(6, 'ALGO', 'Jeanne', 5),
(7, 'POINTCOM', 'Albert', 6),
(8, 'PLANCOMPTABLE', 'Laure', 7),
(9, 'VOLTAIRE', 'Cyril', 8),
(10, 'WAROL', 'Crystelle', 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`nomMatiere`) REFERENCES `matieres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
