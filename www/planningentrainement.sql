-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET lc_time_names = 'fr_FR';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `planningentrainement`
--

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) NOT NULL,
  `id_planning` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `date` date NOT NULL,
  `horraire_debut` time NOT NULL,
  `horraire_fin` time NOT NULL,
  `lieu` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL COMMENT 'Identifiant du groupe',
  `statut_in_groupe` int(11) NOT NULL COMMENT '1 =>en Attente / 2 => Accepté',
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` tinyint(1) NOT NULL COMMENT '0=>homme/1=>femme',
  `email` varchar(100) NOT NULL,
  `photo` longblob NOT NULL,
  `derby_name` varchar(100) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '0' COMMENT '0:membre/1:admin/2/superAdmin'
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Table des joueurs';


-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_entrainement` int(11) NOT NULL,
  `statut` int(3) NOT NULL COMMENT '0 : no / 1: pas sur / 2 : yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Index pour les tables exportées
--

--
-- Index pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oneTeamTrainer` (`id_groupe`,`date`,`horraire_debut`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_groupe_index` (`id_groupe`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indexUniquePlayer` (`id_player`,`id_groupe`,`id_entrainement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `entrainement` ADD `etat` INT NOT NULL DEFAULT '1' COMMENT '1 : normal / 0 : annulé / 2 : match' AFTER `lieu`;
  
  
--
-- Déclencheurs `groupe`
--
DELIMITER $$
CREATE TRIGGER `superAdmin` AFTER INSERT ON `groupe` FOR EACH ROW UPDATE player SET privilege = 2, id_groupe = NEW.id, statut_in_groupe = 2 WHERE id = NEW.id_admin
$$
DELIMITER ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
