-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 juin 2023 à 14:34
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `autoecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `N_CLIENT` int(11) NOT NULL,
  `NOM_CLIENT` char(30) DEFAULT NULL,
  `PRENOM_CLIENT` char(30) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `ADRESSE_CLIENT` char(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `MOT_DE_PASSE` char(100) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`N_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `MAIL`, `ADRESSE_CLIENT`, `DATE_DE_NAISSANCE`, `TEL`, `DATE_INSCRIPTION`, `MOT_DE_PASSE`, `ROLE`) VALUES
(1, 'test', 'test', '', 'test', '2023-02-01', 707070707, '2023-02-01', '$2a$12$N8yVQixf4F71DANJ6XDjZOsCYzWI9a74OSEc.u6HxP4dRpLZdOfvG', NULL),
(2, 'test2', 'test2', '', 'test2', '2023-02-02', 606060606, '2023-02-02', 'test2', NULL),
(4, 'test3', 'test3', '', 'test3', '2023-02-03', 808080808, '2023-02-03', '$2y$10$vlBUk76/.BdFMiexivHR0OE3WL9/3IKj1H2TJXW/qj0pbH9Mqhuou', 'utilisateur'),
(6, 'toto', NULL, 'toto@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$x8tyM5HOWiu36we7cl36g.FWlURaSCy4HRVE6KpahODlrpPVEq8ya', NULL),
(7, 'titi', NULL, 'titi@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$K7MKrQxfh9ZlwWf9EF4M1eUI1y9FPijESr6.UCaNXPMQo2HEZvRaS', NULL),
(8, 'titi2', NULL, 'titi2@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$RxTi20tWQtdLLNiAzF3yWex7pIlaf5VTxmrX7awbGXG/uvVEdyfYu', NULL),
(9, 'azer', NULL, 'greyfullbuster111@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$6cf8j5.xbtIhOCRjFwbSA.ToP5Uidi0uh/8TRgK4tIFq7Sm7EyaWK', 'utilisateur'),
(11, 'ltest1', NULL, 'lt@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$xYkmMcJ70GYLsVbbN3qBE.SE5EZQCg45MbppdOKnF5pnb0wpTkWyy', 'administrateur'),
(12, 'ltest2', NULL, 'ltest2@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$SPciprFwIvlS80sVmOfCvut0EUG4MOVSkOIckCt7sYlbmoMs9hCLK', 'administrateur'),
(13, 'xxxt', NULL, 'xxxt@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$.QaMv.p9dGownAVcNJiN0e7QelPrKRueHe11c4NIJQRrX7Sypdox.', 'administrateur'),
(14, 'boubaker', NULL, 'boubaker@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$w80UD3z.ixNIwtsZPnvKsecrqOOabZuR2kvb4/J7.mEpE/It8SoiK', 'utilisateur'),
(15, 'Joueid', 'Boubaker', 'boubakeeer@gmail.com', '88 avenue de paris', '2023-06-16', 766515539, '2023-06-02', '$2y$10$SdF1ZGSZI/RcmAQSo0OWpuE1ehdWPWSSpcGG12V0rBQwTgL/8SaMS', 'utilisateur'),
(16, 'Joueid', 'Boubaker', 'boubakerdd@gmail.fr', '88 avenue de paris', '2023-06-11', 766515539, '2023-06-02', '$2y$10$/35.MJj8ChSoOnGOgaRggOkFfrUjtDBW96l9DNhAlxoQaP2aARSRG', 'utilisateur'),
(17, 'Joueid', 'Boubaker', 'bouba@gmail.com', '88 avenue de tokyo', '2023-06-10', 766515000, '2023-06-02', '$2y$10$KCNUPdTR42a06cfIwhPXoOlz4gXJbMAexLpBEJTajHUxB3a67uqn.', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `DEGRE` char(30) NOT NULL,
  `NOM` char(50) DEFAULT NULL,
  `ADRESSE` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `N_CLIENT` int(11) NOT NULL,
  `DEGRE` char(30) NOT NULL,
  `NIVEAU_ETUDE` char(20) DEFAULT NULL,
  `REDUCTION` char(3) DEFAULT NULL,
  `NOM_CLIENT` char(30) DEFAULT NULL,
  `PRENOM_CLIENT` char(30) DEFAULT NULL,
  `ADRESSE_CLIENT` char(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `MODE_FACTURATION` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lecon`
--

CREATE TABLE `lecon` (
  `N_LECON` int(11) NOT NULL,
  `NOM_LECON` char(50) DEFAULT NULL,
  `TARIF` int(20) DEFAULT NULL,
  `TYPE_BOITE` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `lecon`
--

INSERT INTO `lecon` (`N_LECON`, `NOM_LECON`, `TARIF`, `TYPE_BOITE`) VALUES
(0, 'PERMIS_B', 500, 'MANUELLE'),
(1, 'PERMIS_A', 799, 'AUTOMATIQUE'),
(11, 'PERMIS_A2', 50, 'MANUELLE'),
(5, 'PERMIS_B2', 70, 'MANUELLE');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `CODE_MODELE` int(11) NOT NULL,
  `NOM_MODELE` char(50) DEFAULT NULL,
  `ANNEE_MODELE` date DEFAULT NULL,
  `TYPE_DE_CONSO` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`CODE_MODELE`, `NOM_MODELE`, `ANNEE_MODELE`, `TYPE_DE_CONSO`) VALUES
(0, 'RENAULT', '1993-04-13', 'DIESEL'),
(1, 'PEUJEOT', '1995-04-12', 'ESSENCE'),
(2, 'TESLA', '2007-04-11', 'ELEC');

-- --------------------------------------------------------

--
-- Structure de la table `moniteur`
--

CREATE TABLE `moniteur` (
  `N_MONITEUR` int(11) NOT NULL,
  `NOM_MONTEUR` char(30) DEFAULT NULL,
  `DATE_EMBAUCHE` date DEFAULT NULL,
  `PRENOM` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `moniteur`
--

INSERT INTO `moniteur` (`N_MONITEUR`, `NOM_MONTEUR`, `DATE_EMBAUCHE`, `PRENOM`) VALUES
(0, 'DUBOIS', '2021-07-23', 'Sophie'),
(1, 'LAURENT', '2019-04-12', 'Martin'),
(2, 'BENAIT', '2019-04-12', 'Abdel'),
(3, 'ANDERSON', '2015-06-12', 'Elliot');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `N_LECON` int(11) NOT NULL,
  `N_CLIENT` int(11) NOT NULL,
  `N_MONITEUR` int(11) NOT NULL,
  `CODE_MODELE` int(11) NOT NULL,
  `DATE_HEURE_DEBUT` datetime DEFAULT NULL,
  `DATE_HEURE_FIN` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`N_LECON`, `N_CLIENT`, `N_MONITEUR`, `CODE_MODELE`, `DATE_HEURE_DEBUT`, `DATE_HEURE_FIN`) VALUES
(0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 2, 1, 1, '2023-05-28 06:21:00', '2023-05-28 08:21:00'),
(11, 6, 1, 0, '2023-05-05 18:30:00', '2023-05-05 19:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `N_CLIENT` int(11) NOT NULL,
  `NOM_ENTREPRISE` char(32) DEFAULT NULL,
  `NOM_CLIENT` char(30) DEFAULT NULL,
  `PRENOM_CLIENT` char(30) DEFAULT NULL,
  `ADRESSE_CLIENT` char(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `MODE_FACTURATION` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ultiliser`
--

CREATE TABLE `ultiliser` (
  `N_LECON` int(11) NOT NULL,
  `N_VEHICULE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ultiliser`
--

INSERT INTO `ultiliser` (`N_LECON`, `N_VEHICULE`) VALUES
(0, 8),
(1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `N_VEHICULE` int(11) NOT NULL,
  `CODE_MODELE` int(11) NOT NULL,
  `N_IMMATRICULATION` char(20) DEFAULT NULL,
  `DATE_ACHAT` date DEFAULT NULL,
  `NB_KM_INITIAL` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`N_VEHICULE`, `CODE_MODELE`, `N_IMMATRICULATION`, `DATE_ACHAT`, `NB_KM_INITIAL`) VALUES
(7, 1, 'CC3_EM6', '1999-04-13', 150000),
(5, 1, 'TE3_TES', '2007-04-12', 7825),
(8, 2, 'CC3_EM8', '2007-04-12', 8825);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`N_CLIENT`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`DEGRE`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`N_CLIENT`),
  ADD KEY `I_FK_ETUDIANT_ETABLISSEMENT` (`DEGRE`);

--
-- Index pour la table `lecon`
--
ALTER TABLE `lecon`
  ADD PRIMARY KEY (`N_LECON`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`CODE_MODELE`);

--
-- Index pour la table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`N_MONITEUR`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`N_LECON`,`N_CLIENT`,`N_MONITEUR`,`CODE_MODELE`),
  ADD KEY `I_FK_PLANNING_CLIENT` (`N_CLIENT`),
  ADD KEY `I_FK_PLANNING_MONITEUR` (`N_MONITEUR`),
  ADD KEY `I_FK_PLANNING_MODELE` (`CODE_MODELE`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`N_CLIENT`);

--
-- Index pour la table `ultiliser`
--
ALTER TABLE `ultiliser`
  ADD PRIMARY KEY (`N_LECON`,`N_VEHICULE`),
  ADD KEY `I_FK_ULTILISER_VEHICULE` (`N_VEHICULE`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`N_VEHICULE`),
  ADD KEY `I_FK_VEHICULE_MODELE` (`CODE_MODELE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `N_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
