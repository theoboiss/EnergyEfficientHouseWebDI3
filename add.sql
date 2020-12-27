USE `maison_econome`;

INSERT INTO `region` (nomRegion) VALUES ("Bretagne");
INSERT INTO `region` (nomRegion) VALUES ("Centre Val de Loire");
INSERT INTO `region` (nomRegion) VALUES ("Grand Est");
INSERT INTO `region` (nomRegion) VALUES ("Occitanie");

INSERT INTO `departement` (nomDepartement, Id_Region) VALUES ("Finistere", 1);
INSERT INTO `departement` (nomDepartement, Id_Region) VALUES ("Indre et Loire", 2);
INSERT INTO `departement` (nomDepartement, Id_Region) VALUES ("Ardennes", 3);
INSERT INTO `departement` (nomDepartement, Id_Region) VALUES ("Hérault", 2);

INSERT INTO `ville` (code_postal, nom_ville, Id_Departement) VALUES (29200, "Brest", 1);
INSERT INTO `ville` (code_postal, nom_ville, Id_Departement) VALUES (37000, "Tours", 2);
INSERT INTO `ville` (code_postal, nom_ville, Id_Departement) VALUES (08501, "Charleville mezieres", 3);
INSERT INTO `ville` (code_postal, nom_ville, Id_Departement) VALUES (37100, "Montpellier", 2);

INSERT INTO `adresse` (numMaison, rue, Id_Ville) VALUES (69, "Rue Bobo", 1);
INSERT INTO `adresse` (numMaison, rue, Id_Ville) VALUES (14, "Rue des Perruches", 2);
INSERT INTO `adresse` (numMaison, rue, Id_Ville) VALUES (4, "Rue des pirates", 3);
INSERT INTO `adresse` (numMaison, rue, Id_Ville) VALUES (25, "Rue des Minimes", 2);

INSERT INTO `maison` (nomMaison, degreIsolation, evaluationBase, Id_Adresse) VALUES ("La Petite Maison Dans La Prairie", 15, 5, 1);
INSERT INTO `maison` (nomMaison, degreIsolation, evaluationBase, Id_Adresse) VALUES ("Ma maison de campagne", 25, 67, 2);
INSERT INTO `maison` (nomMaison, degreIsolation, evaluationBase, Id_Adresse) VALUES ("The haunted House", 80, 80, 3);
INSERT INTO `maison` (nomMaison, degreIsolation, evaluationBase, Id_Adresse) VALUES ("Le gymnase imaginaire", 85, 50, 2);

INSERT INTO `type_appartement` (libelle_type_appartement) VALUES ("T2");
INSERT INTO `type_appartement` (libelle_type_appartement) VALUES ("T3");
INSERT INTO `type_appartement` (libelle_type_appartement) VALUES ("T4");
INSERT INTO `type_appartement` (libelle_type_appartement) VALUES ("ERP"); -- etablissement recevant du public

INSERT INTO `appartement` (degreSecuriteAppartement, libelleAppartement, Id_Maison, Id_Type_Appartement) VALUES (40, "Porte 404", 1, 1);
INSERT INTO `appartement` (degreSecuriteAppartement, libelleAppartement, Id_Maison, Id_Type_Appartement) VALUES (60, "Les hirondelles", 2, 2);
INSERT INTO `appartement` (degreSecuriteAppartement, libelleAppartement, Id_Maison, Id_Type_Appartement) VALUES (40, "Coffre fort", 3, 2);
INSERT INTO `appartement` (degreSecuriteAppartement, libelleAppartement, Id_Maison, Id_Type_Appartement) VALUES (95, "Gymnase", 2, 2);

INSERT INTO `type_piece` (libelle_type_piece) VALUES ("Salle d'eau");
INSERT INTO `type_piece` (libelle_type_piece) VALUES ("Chambre");
INSERT INTO `type_piece` (libelle_type_piece) VALUES ("Salle de jeu");
INSERT INTO `type_piece` (libelle_type_piece) VALUES ("Salle de sport");

INSERT INTO `piece` (libellePiece, Id_Type_Piece, Id_Appartement) VALUES ("Salle de bain des enfants", 1, 1);
INSERT INTO `piece` (libellePiece, Id_Type_Piece, Id_Appartement) VALUES ("Chambre des ados", 2, 2);
INSERT INTO `piece` (libellePiece, Id_Type_Piece, Id_Appartement) VALUES ("Salle de jeux des enfants", 3, 3);
INSERT INTO `piece` (libellePiece, Id_Type_Piece, Id_Appartement) VALUES ("Salle de musculation", 2, 2);

-- Ressources
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 10, "electricite", "Energie electrique", 9, 5);
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 10, "eau", "Eau", 10, 8);
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 10, "lumiere", "Lumiere", 6, 5);
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 20, "essence", "Hydrocarbure", 15, 5);

INSERT INTO `ressources` (Id_Matiere) VALUES (1);
INSERT INTO `ressources` (Id_Matiere) VALUES (2);
INSERT INTO `ressources` (Id_Matiere) VALUES (3);
INSERT INTO `ressources` (Id_Matiere) VALUES (4);

INSERT INTO `type_appareil` (nomTypeAppareil) VALUES ("Chauffage");
INSERT INTO `type_appareil` (nomTypeAppareil) VALUES ("Chauffe eau");
INSERT INTO `type_appareil` (nomTypeAppareil) VALUES ("Veilleuse");
INSERT INTO `type_appareil` (nomTypeAppareil) VALUES ("Eclairage");

INSERT INTO `appareil` (lieuAppareil, libelleAppareil, videoAppareil, Id_Piece, Id_Type_Appareil) VALUES ("Pret de la fenetre", "Radiateur electrique", NULL, 1, 1);
INSERT INTO `appareil` (lieuAppareil, libelleAppareil, videoAppareil, Id_Piece, Id_Type_Appareil) VALUES ("Dans le coin face à la porte", "Chauffe eau", NULL, 2, 2);
INSERT INTO `appareil` (lieuAppareil, libelleAppareil, videoAppareil, Id_Piece, Id_Type_Appareil) VALUES ("A cote de la porte", "Veilleuse verte", NULL, 3, 3);
INSERT INTO `appareil` (lieuAppareil, libelleAppareil, videoAppareil, Id_Piece, Id_Type_Appareil) VALUES ("Au plafond", "Plafonnier", NULL, 4, 4);

INSERT INTO `consoAppareil` (consommation, Id_Appareil, Id_Matiere) VALUES (6, 1, 1);
INSERT INTO `consoAppareil` (consommation, Id_Appareil, Id_Matiere) VALUES (4, 2, 1);
INSERT INTO `consoAppareil` (consommation, Id_Appareil, Id_Matiere) VALUES (1, 3, 1);
INSERT INTO `consoAppareil` (consommation, Id_Appareil, Id_Matiere) VALUES (3, 4, 1);

-- Substances
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 10, "chaleur", "Chaleur", 9, 5);
INSERT INTO `matiere` (valMin, valMax, libelle, description, valCrit, valIdeale) VALUES (0, 10, "CO2", "Gaz a effet de serre", 4, 0);

INSERT INTO `substance` (Id_Matiere) VALUES (5); -- a incrementer à chaque nouvelle ressources (il faudra faire un trigger)
INSERT INTO `substance` (Id_Matiere) VALUES (6);

INSERT INTO `emissionAppareil` (emission, Id_Appareil, Id_Matiere) VALUES (5, 1, 5); -- a incrementer à chaque nouvelle ressources (il faudra faire un trigger)
INSERT INTO `emissionAppareil` (emission, Id_Appareil, Id_Matiere) VALUES (2, 2, 5);
INSERT INTO `emissionAppareil` (emission, Id_Appareil, Id_Matiere) VALUES (5, 3, 5);
INSERT INTO `emissionAppareil` (emission, Id_Appareil, Id_Matiere) VALUES (1, 4, 5);

INSERT INTO `utilisateur` (nomUser, emailUtilisateur, mdpUtilisateur, telUtilisateur, prenomUtilisateur, ageUtilisateur, dateCreationCompte, etatCompte) VALUES ("Bernou", "bernardu29@gmail.com", "1234", "0250674560", "Bernard", 47, '2019-12-22', "actif");
INSERT INTO `utilisateur` (nomUser, emailUtilisateur, mdpUtilisateur, telUtilisateur, prenomUtilisateur, ageUtilisateur, dateCreationCompte, etatCompte) VALUES ("Sa37", "SabrinaG@gmail.com", "motdepasse", "0250558760", "Sabrina", 39, '2020-12-23', "actif");
INSERT INTO `utilisateur` (nomUser, emailUtilisateur, mdpUtilisateur, telUtilisateur, prenomUtilisateur, ageUtilisateur, dateCreationCompte, etatCompte) VALUES ("Antoine", "Antoine@gmail.com", "01/01/1990", "0250274560", "Antoine", 24, '2018-05-22', "inactif");
INSERT INTO `utilisateur` (nomUser, emailUtilisateur, mdpUtilisateur, telUtilisateur, prenomUtilisateur, ageUtilisateur, dateCreationCompte, etatCompte) VALUES ("Boulu", "hugoboss37@gmail.com", "", "0610118218", "Hugo", 25, '2019-09-15', "inactif");

INSERT INTO `doit_contenir` (Id_Type_Piece, Id_Type_Appartement) VALUES (1, 1);
INSERT INTO `doit_contenir` (Id_Type_Piece, Id_Type_Appartement) VALUES (2, 2);
INSERT INTO `doit_contenir` (Id_Type_Piece, Id_Type_Appartement) VALUES (3, 3);
INSERT INTO `doit_contenir` (Id_Type_Piece, Id_Type_Appartement) VALUES (4, 4);

INSERT INTO `dteutilisation` (dteDbtUtilisation,dteFinUtilisation, Id_Appareil) VALUES ('2020-01-01 07-32-50', '2020-01-04 19-40-31', 1);
INSERT INTO `dteutilisation` (dteDbtUtilisation,dteFinUtilisation, Id_Appareil) VALUES ('2020-01-01', '2020-11-31', 2);
INSERT INTO `dteutilisation` (dteDbtUtilisation,dteFinUtilisation, Id_Appareil) VALUES ('2020-01-05', '2020-01-06', 3);
INSERT INTO `dteutilisation` (dteDbtUtilisation,dteFinUtilisation, Id_Appareil) VALUES ('2020-01-07 07-41-02', '2020-01-13 14-22-08', 4);

INSERT INTO `locataire` (dateDebutLocation,dateFinLocation, Id_Appartement, Id_Utilisateur) VALUES ('1995-03-12', '2019-05-30', 1, 1);
INSERT INTO `locataire` (dateDebutLocation,dateFinLocation, Id_Appartement, Id_Utilisateur) VALUES ('2020-02-01', '2020-10-31', 2, 2);
INSERT INTO `locataire` (dateDebutLocation,dateFinLocation, Id_Appartement, Id_Utilisateur) VALUES ('2020-01-01', '2020-02-31', 3, 3);
INSERT INTO `locataire` (dateDebutLocation,dateFinLocation, Id_Appartement, Id_Utilisateur) VALUES ('2019-06-20', '2020-01-25', 1, 4);

INSERT INTO `proprietaire` (dateDebutPropriete,dateFinPropriete, Id_Maison, Id_Utilisateur) VALUES ('2016-01-01', NULL, 1, 1);
INSERT INTO `proprietaire` (dateDebutPropriete,dateFinPropriete, Id_Maison, Id_Utilisateur) VALUES ('2020-01-01', '2020-12-31', 2, 2);
INSERT INTO `proprietaire` (dateDebutPropriete,dateFinPropriete, Id_Maison, Id_Utilisateur) VALUES ('2015-01-01', '2020-12-31', 3, 3);
INSERT INTO `proprietaire` (dateDebutPropriete,dateFinPropriete, Id_Maison, Id_Utilisateur) VALUES ('1995-03-12', '2006-07-30', 1, 4);


/*
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

*/