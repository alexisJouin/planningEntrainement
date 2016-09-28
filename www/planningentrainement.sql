-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Septembre 2016 à 21:36
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `planningentrainement`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `derby_name` varchar(100) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table du coach, le créateur du groupe';

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `descriptif` varchar(1000) NOT NULL,
  `photo` longblob NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `id_admin`, `nom`, `email`, `adresse`, `descriptif`, `photo`, `date_creation`) VALUES
(1, 0, ' Alexis Jouin Groupe', ' alexis.jouin@live.fr ', '38 rue du Leughenaer', 'salut \nc cool \n d\ndsqd\nqsd', 0x5b6f626a6563742046696c655d, '2016-09-19 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL COMMENT 'Identifiant du groupe',
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` tinyint(1) NOT NULL COMMENT '0=>homme/1=>femme',
  `email` varchar(100) NOT NULL,
  `photo` longblob NOT NULL,
  `derby_name` varchar(100) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '0' COMMENT '0:membre/1:admin/2/superAdmin'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Table des joueurs';

--
-- Contenu de la table `player`
--

INSERT INTO `player` (`id`, `id_groupe`, `nom`, `prenom`, `sexe`, `email`, `photo`, `derby_name`, `mdp`, `privilege`) VALUES
(1, 0, ' Jouin', ' Alexis', 0, 'alexis.jouin@live.fr', '', 'Le Ténébreux', 'aj100695', 0),
(3, 0, 'toto', 'toto', 0, 'toto@toto.fr', '', 'toto', 'toto', 0),
(6, 0, 'Jouin', 'Alexis', 0, 'alexis.jouin@live.fr', 0x4172726179, 'tata', 'tata', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
