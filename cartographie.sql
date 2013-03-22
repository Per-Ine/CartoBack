-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 21 Mars 2013 à 17:35
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `login_admin`, `password_admin`, `role_admin`) VALUES
(1, 'benoit', 'benoit', 'admin'),
(2, 'karine', 'karine', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
  `id_batiment` int(11) NOT NULL AUTO_INCREMENT,
  `nom_batiment` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `nbr_etage_batiment` int(11) NOT NULL,
  PRIMARY KEY (`id_batiment`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom_batiment`, `nbr_etage_batiment`) VALUES
(1, 'Arsenal', 4),
(2, 'Manufacture des Tabacs', 4);

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
  `id_batiment` int(2) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `fk_a_la_couleur` (`id_couleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `id_couleur`, `nom_categorie`, `ordre_categorie`, `id_admin`, `id_batiment`) VALUES
(1, 3, 'Securite', 1, 1, 1),
(2, 2, 'Handicap', 2, 2, 1),
(3, 3, 'Securite', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_couleur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id_couleur`, `nom_couleur`) VALUES
(1, 'blue_middle'),
(2, 'orange'),
(3, 'red');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Contenu de la table `marqueurs`
--

INSERT INTO `marqueurs` (`id_marqueur`, `id_service`, `nom_marqueur`, `position_marqueur_x`, `position_marqueur_y`, `desc_marqueur`, `etage_marqueur`) VALUES
(1, 1, 'Extincteur 1', '43.607541', '1.436110', 'Extincteur 1 arsenal', 1),
(2, 1, 'Extincteur 2', '43.607378', '1.436258', 'Extincteur 2 arsenal', 1),
(3, 1, 'Extincteur etage RDC ', '43.607243', '1.436693', 'Extincteur Arsenal RDC pour test dans etages', 0),
(4, 1, 'Extincteur etage RDC 2', '43.607185', '1.436456', 'Exctincteur Arsenal etage RDC 2  ', 0),
(5, 2, 'Sortie de secours RDC', '43.6072683846661', '1.4367413520812988', 'Sortie de secours RDC', 0),
(6, 2, 'Sortie de secours Etage 1', '43.607548', '1.436399', 'Si tu sors par la fenetre du 1er etage, t''es mort \r\n<h2> TEST DE HTML </h2>\r\n<p>Coucou</p>\r\n', 1),
(7, 3, 'Rampe acces 1', '43.607243', '1.436256', 'Rampe d''acces', 0),
(8, 3, 'Rampe acces 2', '43.607178', '1.436679', 'Rampe d''acces 2 etage 0', 0),
(9, 1, 'Extincteur arsenal sud etage 0 ', '43.606503', '1.437202', 'Extincteur arsenal sud etage 0 ', 0),
(14, 1, 'exitincteur 14', '43.60687218565255', '1.4367091655731201', 'test', 0),
(15, 1, 'toto', '43.60642160321073', '1.4373850822448728', 'dfsdsfsdfsdfsdf', 0),
(16, 2, 'sortie de secours 2', '43.6073383018682', '1.4364516735076904', '', 0),
(19, 1, 'test etage 1 ajout back-offc', '43.60675565603427', '1.437111496925354', 'Desc bidon', 1),
(20, 2, 'Test', '43.60680226790866', '1.436988115310669', 'DSSdqd', 1),
(28, 2, 'test benoit tinymce', '43.60682557383232', '1.4368486404418945', '<h1>jjkljlkjl</h1>', 0),
(22, 1, 'toto', '43.60663135752594', '1.4360439777374265', 'totofab', 1),
(29, 2, 'toto', '43.60722177315291', '1.436913013458252', '<h1>toto</h1>\r\n<p>wdfdsfdsfds</p>', 1),
(30, 2, 'dsqfsf', '43.60706834333347', '1.437060534954071', '<p>wdsdfsdsdf</p>', 0),
(31, 2, 'toto', '43.607718960764956', '1.4355289936065674', '<h1>sdfsfdssdfsfsdfds</h1>', 0);

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
  `numero_service` int(11) NOT NULL,
  `nom_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_service`),
  KEY `fk_contient` (`id_categorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id_service`, `id_categorie`, `numero_service`, `nom_service`) VALUES
(2, 1, 1, 'Sorties de secours'),
(1, 1, 0, 'Extincteurs'),
(3, 2, 2, 'Rampe d''accès');
