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
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000011, 'Statue du Ptit Quinquin', '', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000012, 'Eglise Saint-Maurice', '', 'LILLE', '59000', 'FRANCE');
 INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000013, 'Bosses de Briques', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`) 
		VALUES(0000000014, 'Passement de Nathalie Eleme', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000015, 'UFO, ross lovergrouve', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000016, 'Angels-Demon.Parade', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000017, 'La place du Général de Gaulle', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000018, 'Grand Place de Lille', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000019, 'Vue depuis la place du Général de Gaulle', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000020, 'Grand Place : Colonne', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000021, 'Cour intérieur de la', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000022, 'Vieille Bourse', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000023, 'Beffroi de la chambre', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000024, 'Opera de Lille', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000025, 'Léon Trulin statue', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000026, 'hôtel Casino Barrière', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000027, 'Arlequin', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000028, 'Giant Flowers Statue in front', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000029, 'Tour du Crédit Lyonnais', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000030, 'Gare Lille Europe', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000031, 'Piniata Geante', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000032, 'Beffroi de lHotel de Ville', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000033, 'Fresque Murale Geante', '', 'LILLE', '59000', 'FRANCE');
INSERT INTO `portal` (`id`, `name`, `address`, `city`, `zip`, `country`)
		VALUES(0000000034, 'La Citadelle', '', 'LILLE', '59000', 'FRANCE');
