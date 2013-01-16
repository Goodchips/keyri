-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 14 Janvier 2013 à 22:10
-- Version du serveur: 5.0.86-community-nt
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `keyri`
--

-- --------------------------------------------------------

--
-- Structure de la table `portal`
--

CREATE TABLE IF NOT EXISTS `portal` (
  `id` int(10) unsigned zerofill NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `country` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `portal_has_user`
--

CREATE TABLE IF NOT EXISTS `portal_has_user` (
  `id_portal` int(11) NOT NULL COMMENT 'portal.id',
  `id_user` int(11) NOT NULL COMMENT 'user.id',
  `keys` tinyint(4) default NULL,
  `grade` tinyint(4) default NULL,
  PRIMARY KEY  (`id_portal`,`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned zerofill NOT NULL auto_increment,
  `nickname` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nickname` (`nickname`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
