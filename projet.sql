-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 déc. 2020 à 14:51
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
-- Base de données :  `projet`
--

DROP DATABASE IF EXISTS `maison_econome`;
CREATE DATABASE `maison_econome`;
USE `maison_econome`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `Id_Adresse` int(11) NOT NULL AUTO_INCREMENT,
  `numMaison` int(11) DEFAULT NULL,
  `rue` varchar(30) DEFAULT NULL,
  `Id_Ville` int(11) NOT NULL,
  PRIMARY KEY (`Id_Adresse`),
  KEY `Id_Ville` (`Id_Ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appareil`
--

DROP TABLE IF EXISTS `appareil`;
CREATE TABLE IF NOT EXISTS `appareil` (
  `Id_Appareil` int(11) NOT NULL AUTO_INCREMENT,
  `lieuAppareil` varchar(30) NOT NULL,
  `libelleAppareil` varchar(30) DEFAULT NULL,
  `videoAppareil` varchar(30) DEFAULT NULL,
  `descriptionAppareil` varchar(50) DEFAULT NULL,
  `Id_Piece` int(11) NOT NULL,
  `Id_Type_Appareil` int(11) NOT NULL,
  PRIMARY KEY (`Id_Appareil`),
  KEY `Id_Piece` (`Id_Piece`),
  KEY `Id_Type_Appareil` (`Id_Type_Appareil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `Id_Appartement` int(11) NOT NULL AUTO_INCREMENT,
  `degreSecuriteAppartement` varchar(30) DEFAULT NULL,
  `libelleAppartement` varchar(30) DEFAULT NULL,
  `Id_Type_Appartement` int(11) NOT NULL,
  `Id_Maison` int(11) NOT NULL,
  PRIMARY KEY (`Id_Appartement`),
  KEY `Id_Type_Appartement` (`Id_Type_Appartement`),
  KEY `Id_Maison` (`Id_Maison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consoappareil`
--

DROP TABLE IF EXISTS `consoappareil`;
CREATE TABLE IF NOT EXISTS `consoappareil` (
  `Id_Appareil` int(11) NOT NULL,
  `Id_Matiere` int(11) NOT NULL,
  `consommation` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Appareil`,`Id_Matiere`),
  KEY `Id_Matiere` (`Id_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `Id_Departement` int(11) NOT NULL AUTO_INCREMENT,
  `nomDepartement` varchar(30) DEFAULT NULL,
  `Id_Region` int(11) NOT NULL,
  PRIMARY KEY (`Id_Departement`),
  KEY `Id_Region` (`Id_Region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `doit_contenir`
--

DROP TABLE IF EXISTS `doit_contenir`;
CREATE TABLE IF NOT EXISTS `doit_contenir` (
  `Id_Type_Piece` int(11) NOT NULL,
  `Id_Type_Appartement` int(11) NOT NULL,
  PRIMARY KEY (`Id_Type_Piece`,`Id_Type_Appartement`),
  KEY `Id_Type_Appartement` (`Id_Type_Appartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dteutilisation`
--

DROP TABLE IF EXISTS `dteutilisation`;
CREATE TABLE IF NOT EXISTS `dteutilisation` (
  `Id_Appareil` int(11) NOT NULL,
  `DteDbtUtilisation` datetime NOT NULL,
  `DteFinUtilisation` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_Appareil`,`DteDbtUtilisation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emissionappareil`
--

DROP TABLE IF EXISTS `emissionappareil`;
CREATE TABLE IF NOT EXISTS `emissionappareil` (
  `Id_Appareil` int(11) NOT NULL,
  `Id_Matiere` int(11) NOT NULL,
  `emission` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Appareil`,`Id_Matiere`),
  KEY `Id_Matiere` (`Id_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `Id_Appartement` int(11) NOT NULL,
  `dateDebutLocation` date NOT NULL,
  `dateFinLocation` date DEFAULT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Appartement`,`dateDebutLocation`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `Id_Maison` int(11) NOT NULL AUTO_INCREMENT,
  `nomMaison` varchar(30) DEFAULT NULL,
  `degreIsolation` int(11) DEFAULT NULL,
  `evaluationBase` varchar(30) DEFAULT NULL,
  `Id_Adresse` int(11) NOT NULL,
  PRIMARY KEY (`Id_Maison`),
  KEY `Id_Adresse` (`Id_Adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `Id_Matiere` int(11) NOT NULL AUTO_INCREMENT,
  `valMin` int(11) DEFAULT NULL,
  `valMax` int(11) DEFAULT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `valCrit` int(11) DEFAULT NULL,
  `valIdeale` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `Id_Piece` int(11) NOT NULL AUTO_INCREMENT,
  `libellePiece` varchar(30) DEFAULT NULL,
  `Id_Type_Piece` int(11) NOT NULL,
  `Id_Appartement` int(11) NOT NULL,
  PRIMARY KEY (`Id_Piece`),
  KEY `Id_Type_Piece` (`Id_Type_Piece`),
  KEY `Id_Appartement` (`Id_Appartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `Id_Maison` int(11) NOT NULL,
  `dateDebutPropriete` date NOT NULL,
  `dateFinPropriete` date DEFAULT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Maison`,`dateDebutPropriete`),
  KEY `Id_Utilisateur` (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `Id_Region` int(11) NOT NULL AUTO_INCREMENT,
  `nomRegion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_Region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

DROP TABLE IF EXISTS `ressources`;
CREATE TABLE IF NOT EXISTS `ressources` (
  `Id_Matiere` int(11) NOT NULL,
  PRIMARY KEY (`Id_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `substance`
--

DROP TABLE IF EXISTS `substance`;
CREATE TABLE IF NOT EXISTS `substance` (
  `Id_Matiere` int(11) NOT NULL,
  PRIMARY KEY (`Id_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_appareil`
--

DROP TABLE IF EXISTS `type_appareil`;
CREATE TABLE IF NOT EXISTS `type_appareil` (
  `Id_Type_Appareil` int(11) NOT NULL AUTO_INCREMENT,
  `nomTypeAppareil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_Type_Appareil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_appartement`
--

DROP TABLE IF EXISTS `type_appartement`;
CREATE TABLE IF NOT EXISTS `type_appartement` (
  `Id_Type_Appartement` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_appartement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Type_Appartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_piece`
--

DROP TABLE IF EXISTS `type_piece`;
CREATE TABLE IF NOT EXISTS `type_piece` (
  `Id_Type_Piece` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_piece` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Type_Piece`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(30) NOT NULL,
  `emailUtilisateur` varchar(50) DEFAULT NULL,
  `telUtilisateur` int(11) DEFAULT NULL,
  `prenomUtilisateur` varchar(30) NOT NULL,
  `ageUtilisateur` int(11) NOT NULL,
  `dateCreationCompte` date DEFAULT NULL,
  `etatCompte` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `Id_Ville` int(11) NOT NULL AUTO_INCREMENT,
  `code_postal` varchar(50) DEFAULT NULL,
  `nom_ville` varchar(50) NOT NULL,
  `Id_Departement` int(11) NOT NULL,
  PRIMARY KEY (`Id_Ville`),
  KEY `Id_Departement` (`Id_Departement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`Id_Ville`) REFERENCES `ville` (`Id_Ville`);

--
-- Contraintes pour la table `appareil`
--
ALTER TABLE `appareil`
  ADD CONSTRAINT `appareil_ibfk_1` FOREIGN KEY (`Id_Piece`) REFERENCES `piece` (`Id_Piece`),
  ADD CONSTRAINT `appareil_ibfk_2` FOREIGN KEY (`Id_Type_Appareil`) REFERENCES `type_appareil` (`Id_Type_Appareil`);

--
-- Contraintes pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `appartement_ibfk_1` FOREIGN KEY (`Id_Type_Appartement`) REFERENCES `type_appartement` (`Id_Type_Appartement`),
  ADD CONSTRAINT `appartement_ibfk_2` FOREIGN KEY (`Id_Maison`) REFERENCES `maison` (`Id_Maison`);

--
-- Contraintes pour la table `consoappareil`
--
ALTER TABLE `consoappareil`
  ADD CONSTRAINT `consoappareil_ibfk_1` FOREIGN KEY (`Id_Appareil`) REFERENCES `appareil` (`Id_Appareil`),
  ADD CONSTRAINT `consoappareil_ibfk_2` FOREIGN KEY (`Id_Matiere`) REFERENCES `ressources` (`Id_Matiere`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`Id_Region`) REFERENCES `region` (`Id_Region`);

--
-- Contraintes pour la table `doit_contenir`
--
ALTER TABLE `doit_contenir`
  ADD CONSTRAINT `doit_contenir_ibfk_1` FOREIGN KEY (`Id_Type_Piece`) REFERENCES `type_piece` (`Id_Type_Piece`),
  ADD CONSTRAINT `doit_contenir_ibfk_2` FOREIGN KEY (`Id_Type_Appartement`) REFERENCES `type_appartement` (`Id_Type_Appartement`);

--
-- Contraintes pour la table `dteutilisation`
--
ALTER TABLE `dteutilisation`
  ADD CONSTRAINT `dteutilisation_ibfk_1` FOREIGN KEY (`Id_Appareil`) REFERENCES `appareil` (`Id_Appareil`);

--
-- Contraintes pour la table `emissionappareil`
--
ALTER TABLE `emissionappareil`
  ADD CONSTRAINT `emissionappareil_ibfk_1` FOREIGN KEY (`Id_Appareil`) REFERENCES `appareil` (`Id_Appareil`),
  ADD CONSTRAINT `emissionappareil_ibfk_2` FOREIGN KEY (`Id_Matiere`) REFERENCES `substance` (`Id_Matiere`);

--
-- Contraintes pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD CONSTRAINT `locataire_ibfk_1` FOREIGN KEY (`Id_Appartement`) REFERENCES `appartement` (`Id_Appartement`),
  ADD CONSTRAINT `locataire_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `maison_ibfk_1` FOREIGN KEY (`Id_Adresse`) REFERENCES `adresse` (`Id_Adresse`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`Id_Type_Piece`) REFERENCES `type_piece` (`Id_Type_Piece`),
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`Id_Appartement`) REFERENCES `appartement` (`Id_Appartement`);

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`Id_Maison`) REFERENCES `maison` (`Id_Maison`),
  ADD CONSTRAINT `proprietaire_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_ibfk_1` FOREIGN KEY (`Id_Matiere`) REFERENCES `matiere` (`Id_Matiere`);

--
-- Contraintes pour la table `substance`
--
ALTER TABLE `substance`
  ADD CONSTRAINT `substance_ibfk_1` FOREIGN KEY (`Id_Matiere`) REFERENCES `matiere` (`Id_Matiere`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`Id_Departement`) REFERENCES `departement` (`Id_Departement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
