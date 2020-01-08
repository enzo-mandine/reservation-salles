-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 jan. 2020 à 17:49
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--
CREATE DATABASE IF NOT EXISTS `reservationsalles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservationsalles`;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'test res 1', 'res 1\r\nCoactique aliquotiens nostri pedites ad eos persequendos scandere clivos sublimes etiam si lapsantibus plantis fruticeta prensando vel dumos ad vertices venerint summos, inter arta tamen et invia nullas acies explicare permissi nec firmare nisu valido gressus: hoste discursatore rupium abscisa volvente, ruinis ponderum inmanium consternuntur, aut ex necessitate ultima fortiter dimicante, superati periculose per prona discedunt.', '2020-01-07 08:00:00', '2020-01-07 09:00:00', 1),
(2, 'test res 2', 'res 2', '2020-01-08 08:00:00', '2020-01-08 09:00:00', 1),
(3, 'test res 3', 'res 3', '2020-01-09 08:00:00', '2020-01-09 09:00:00', 1),
(5, 'zerfghjkl', 'gfhg', '2020-01-10 11:00:00', '2020-01-10 12:00:00', 2),
(6, 'kkkk', 'gfdtfhgvj', '2020-01-07 10:48:00', '2020-01-07 11:00:00', 2),
(9, 'caca', 'caca', '2020-01-10 08:00:00', '2020-01-10 09:00:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT 'name = id.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `image`) VALUES
(1, 'admin', 'admin', ''),
(2, 'Enzo', '$2y$10$T7RHDI3nytLklPANiNe8D.R/VaraMOr.mIKW8HJzJCDoM4TOAbvku', ''),
(5, 'eti', '$2y$10$RMWyoU9JDo.5ybp/vTUpGusDYuWsrL5G1H4l0cFx0Ixy7nfMefgtC', ''),
(6, 'avatar', '$2y$10$hYrOgEpGTffbhEYp5qONgOFhXFN7P.BJpOznicGhjzEsnFwTVmACa', ''),
(7, 'marceau', '$2y$10$HHxX/rS5nMLqiFDPHMxbOOpU0Rn.GevQkcQhxG4jxsoCRDOIMUK9e', '0.png'),
(10, 'caca', '$2y$10$V.Ob0XQ4ojuUt5Qe2H.MXOujdqxT2Og.sJJDIgjOislcOGF9mj5ca', 'ProfilPics/10.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
