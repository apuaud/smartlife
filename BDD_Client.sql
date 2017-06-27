
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 24 Juin 2017 à 13:34
-- Version du serveur: 10.1.22-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u111859621_slife`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE IF NOT EXISTS `capteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_appareil` int(11) NOT NULL,
  `numeroSerie` varchar(20) NOT NULL,
  `etatActuel` varchar(255) NOT NULL,
  `id_piece` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` varchar(6) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `superficie` int(11) NOT NULL,
  `nombreHabitants` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `etage` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Structure de la table `statistique`
--

CREATE TABLE IF NOT EXISTS `statistique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `id_capteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Structure de la table `type_appareil`
--

CREATE TABLE IF NOT EXISTS `type_appareil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `numeroModele` varchar(255) NOT NULL,
  `type_input` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `pseudo` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `cle` varchar(255) NOT NULL,
  `id_comptePrincipal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `pseudo`, `email`, `password`, `type`, `cle`, `id_comptePrincipal`) VALUES
(1, 'admin', 'admin', 'admin', 'adrien@puaud.eu', '45be4a4927e7a64c14d87658ac7619ac2351a2de', 2, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_logement`
--

CREATE TABLE IF NOT EXISTS `users_logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
