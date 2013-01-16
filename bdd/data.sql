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

 INSERT INTO `keyri`.`user` (`id`, `nickname`, `email`, `password`, `level`, `status`) 
		VALUES 	(NULL, 'Goodchips', 'ahbouju@gmail.com', MD5('pepito'), 'admin', 'on'), 
			(NULL, 'Badbilou', 'badbilou5986@yahoo.fr', MD5('chipo'), 'user', 'on');


 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000001, 'Général Faidherbe', '147 Boulevard de la liberté', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000002, 'Statue Louis Pasteur', '148 Rue de Solférino', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000003, 'Statue dAuguste Angellier', '24 Rue Jean Bart', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000004, 'Beffroi et phare de la mairie', '1 Rue Jean Bart', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000005, 'Henri Ghesquière', '110 Rue Léon Gambetta', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000006, 'La Gare Saint Sauveur', '7 Rue Camille Guérin', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000007, 'Musée des Beaux Arts', '10 Rue de Gauthier de Châtillon', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000008, 'Théatre Sébastopol', '157 Rue de Solférino', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000009, 'Palais des Beaux Arts', 'Place de la République', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000010, 'République', 'République Beaux Arts', 'LILLE', '59000', 'FRANCE');

