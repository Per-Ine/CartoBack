-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 04 Avril 2013 à 11:18
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cartographie`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role_admin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `login_admin`, `password_admin`, `role_admin`) VALUES
(1, 'benoit', 'benoit', 'admin'),
(2, 'karine', 'karine', 'admin'),
(3, 'manu', 'manu', 'admin'),
(4, 'arsenal', 'arsenal', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
  `id_batiment` int(11) NOT NULL AUTO_INCREMENT,
  `nom_batiment` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `nbr_etage_batiment` int(11) NOT NULL,
  PRIMARY KEY (`id_batiment`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom_batiment`, `nbr_etage_batiment`) VALUES
(1, 'Arsenal', 4),
(2, 'Manufacture des Tabacs', 4),
(3, 'Anciennes Facultés', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `id_couleur` int(11) NOT NULL,
  `nom_categorie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre_categorie` int(11) NOT NULL,
  `id_admin` int(3) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `fk_a_la_couleur` (`id_couleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `id_couleur`, `nom_categorie`, `ordre_categorie`, `id_admin`) VALUES
(1, 3, 'Securite', 1, 1),
(2, 2, 'Handicap', 2, 2),
(3, 4, 'Loisirs', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_couleur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id_couleur`, `nom_couleur`) VALUES
(1, 'blue_middle'),
(2, 'orange'),
(3, 'red'),
(4, 'blue_pale'),
(5, 'blue'),
(6, 'vine'),
(7, 'yellow'),
(8, 'green'),
(9, 'pink'),
(10, 'purple'),
(11, 'brown'),
(12, 'grey');

-- --------------------------------------------------------

--
-- Structure de la table `marqueurs`
--

CREATE TABLE IF NOT EXISTS `marqueurs` (
  `id_marqueur` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(11) NOT NULL,
  `nom_marqueur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_marqueur_x` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_marqueur_y` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `desc_marqueur` text COLLATE utf8_unicode_ci NOT NULL,
  `etage_marqueur` int(11) NOT NULL,
  PRIMARY KEY (`id_marqueur`),
  KEY `fk_est_compose` (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=88 ;

--
-- Contenu de la table `marqueurs`
--

INSERT INTO `marqueurs` (`id_marqueur`, `id_service`, `nom_marqueur`, `position_marqueur_x`, `position_marqueur_y`, `desc_marqueur`, `etage_marqueur`) VALUES
(50, 55, 'zerezrez', '43.60662358886063', '1.4369022846221922', '<p>sdfdsfdsfdssdfazerfzefze</p>', 0),
(51, 55, 'zrezrezrezrezrez', '43.60722954174095', '1.4367198944091797', '<p>zerzesdcvbsdfds</p>', 0),
(52, 55, 'sdfdsfdsfdfdaeazeaz', '43.606196310724116', '1.434488296508789', '<p>aeazeazqdsdsfdsfdsf</p>', 1),
(87, 122, 'sdfds', '4444444444444444', '44444444444444444', '', 0),
(43, 53, 'toto4', '43.605073720067395', '1.4322674274444578', '<p>toto4</p>', 0),
(63, 77, 'Benoit', '43.60649929007942', '1.4366340637207031', '', 0),
(42, 53, 'toto3', '43.60569522613373', '1.4312750101089478', '<p>toto3</p>', 0),
(41, 53, 'toto2', '43.60522521276291', '1.431537866592407', '<p>toto2</p>', 0),
(40, 53, 'toto1', '43.60535728300667', '1.4312911033630369', '<p>toto1</p>', 0),
(84, 122, 'gege', '43.60707416978945', '1.4366984367370605', '<h1>Titre max Contenu pour la popup</h1>\r\n<h2>titre 2 pour contenu popup</h2>\r\n<h3>&nbsp;titre 3 pour contenu popup</h3>\r\n<h4>titre 4 pour popup</h4>\r\n<h5>titre 5 pour popup</h5>\r\n<p>du contenu dans un paragraphe qui doit etre assez long pour prendre plusieurs lignes dans la popup, du coup je raconte n''importe quoi !</p>\r\n<p>Encore une autre paragraphe dans la popup, je suis con, j''aurais du utiliser le lorem impsum !</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>liste 1</li>\r\n<li>liste 2</li>\r\n</ul>\r\n<hr />\r\n<p>&nbsp;<img src="http://www.origin-jantes.com/344-1053-thickbox/4-bagues-de-centrage-666-571.jpg" alt="" width="600" height="600" /></p>', 0),
(57, 55, 'ererere', '43.605163061959615', '1.4320635795593262', '<p>zerezrze</p>', 2),
(86, 122, 'entree', '43.60675565603427', '1.4370739459991455', '', 0),
(72, 78, 'Test', '43.607541', '1.436387', 'test', 0),
(85, 78, 'test', '43.60573795443988', '1.4312481880187988', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE IF NOT EXISTS `propose` (
  `id_batiment` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_batiment`,`id_categorie`),
  KEY `fk_propose` (`id_categorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `propose`
--

INSERT INTO `propose` (`id_batiment`, `id_categorie`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_batiment` int(2) NOT NULL,
  PRIMARY KEY (`id_service`),
  KEY `fk_contient` (`id_categorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=123 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id_service`, `id_categorie`, `nom_service`, `id_batiment`) VALUES
(55, 3, 'Extincteuru Manu', 2),
(53, 5, 'service 1 manu', 2),
(78, 1, 'Extincteurs Manu', 2),
(122, 1, 'lol', 1);
