-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2023 at 09:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `N_CLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CLIENT` char(30) DEFAULT NULL,
  `PRENOM_CLIENT` char(30) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `ADRESSE_CLIENT` char(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `MDP` char(100) DEFAULT NULL,
  `MODE_FACTURATION` char(30) DEFAULT NULL,
  PRIMARY KEY (`N_CLIENT`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`N_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `MAIL`, `ADRESSE_CLIENT`, `DATE_DE_NAISSANCE`, `TEL`, `DATE_INSCRIPTION`, `MDP`, `MODE_FACTURATION`) VALUES
(1, 'test', 'test', '', 'test', '2023-02-01', 707070707, '2023-02-01', '$2a$12$N8yVQixf4F71DANJ6XDjZOsCYzWI9a74OSEc.u6HxP4dRpLZdOfvG', 'test'),
(2, 'test2', 'test2', '', 'test2', '2023-02-02', 606060606, '2023-02-02', 'test2', NULL),
(4, 'test3', 'test3', '', 'test3', '2023-02-03', 808080808, '2023-02-03', '$2y$10$vlBUk76/.BdFMiexivHR0OE3WL9/3IKj1H2TJXW/qj0pbH9Mqhuou', 'test3'),
(6, 'toto', NULL, 'toto@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$x8tyM5HOWiu36we7cl36g.FWlURaSCy4HRVE6KpahODlrpPVEq8ya', NULL),
(7, 'titi', NULL, 'titi@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$K7MKrQxfh9ZlwWf9EF4M1eUI1y9FPijESr6.UCaNXPMQo2HEZvRaS', NULL),
(8, 'titi2', NULL, 'titi2@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$RxTi20tWQtdLLNiAzF3yWex7pIlaf5VTxmrX7awbGXG/uvVEdyfYu', NULL),
(9, 'azer', NULL, 'greyfullbuster111@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$6cf8j5.xbtIhOCRjFwbSA.ToP5Uidi0uh/8TRgK4tIFq7Sm7EyaWK', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `DEGRE` char(30) NOT NULL,
  `NOM` char(50) DEFAULT NULL,
  `ADRESSE` char(50) DEFAULT NULL,
  PRIMARY KEY (`DEGRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
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
  `MODE_FACTURATION` char(30) DEFAULT NULL,
  PRIMARY KEY (`N_CLIENT`),
  KEY `I_FK_ETUDIANT_ETABLISSEMENT` (`DEGRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `ID_EXAM` int(11) NOT NULL,
  `CODE_TYPE` int(11) NOT NULL,
  PRIMARY KEY (`ID_EXAM`),
  KEY `I_FK_EXAM_TYPE_EXAM` (`CODE_TYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_code`
--

DROP TABLE IF EXISTS `exam_code`;
CREATE TABLE IF NOT EXISTS `exam_code` (
  `ID_EXAM` int(11) NOT NULL,
  `N_CLIENT` int(11) NOT NULL,
  `DATE_C` date DEFAULT NULL,
  `HEURE_C` time DEFAULT NULL,
  `RESULTAT_C` char(15) DEFAULT NULL,
  PRIMARY KEY (`ID_EXAM`,`N_CLIENT`),
  KEY `I_FK_EXAM_CODE_EXAM` (`ID_EXAM`),
  KEY `I_FK_EXAM_CODE_CLIENT` (`N_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_permis`
--

DROP TABLE IF EXISTS `exam_permis`;
CREATE TABLE IF NOT EXISTS `exam_permis` (
  `N_CLIENT` int(11) NOT NULL,
  `ID_EXAM` int(11) NOT NULL,
  `DATE_P` date DEFAULT NULL,
  `HEURE_P` time DEFAULT NULL,
  `RESULTAT_P` char(15) DEFAULT NULL,
  PRIMARY KEY (`N_CLIENT`,`ID_EXAM`),
  KEY `I_FK_EXAM_PERMIS_CLIENT` (`N_CLIENT`),
  KEY `I_FK_EXAM_PERMIS_EXAM` (`ID_EXAM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `CODE_MODELE` int(11) NOT NULL,
  `NOM_MODELE` char(50) DEFAULT NULL,
  `ANNEE_MODELE` date DEFAULT NULL,
  `TYPE_DE_CONSO` char(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_MODELE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moniteur`
--

DROP TABLE IF EXISTS `moniteur`;
CREATE TABLE IF NOT EXISTS `moniteur` (
  `N_MONITEUR` int(11) NOT NULL,
  `NOM_MONTEUR` char(30) DEFAULT NULL,
  `DATE_EMBAUCHE` date DEFAULT NULL,
  PRIMARY KEY (`N_MONITEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `N_LECON` int(11) NOT NULL,
  `N_CLIENT` int(11) NOT NULL,
  `N_MONITEUR` int(11) NOT NULL,
  `CODE_MODELE` int(11) NOT NULL,
  `DATE_HEURE_DEBUT` datetime DEFAULT NULL,
  `DATE_HEURE_FIN` datetime DEFAULT NULL,
  PRIMARY KEY (`N_LECON`,`N_CLIENT`,`N_MONITEUR`,`CODE_MODELE`),
  KEY `I_FK_PLANNING_CLIENT` (`N_CLIENT`),
  KEY `I_FK_PLANNING_MONITEUR` (`N_MONITEUR`),
  KEY `I_FK_PLANNING_MODELE` (`CODE_MODELE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `N_CLIENT` int(11) NOT NULL,
  `NOM_ENTREPRISE` char(32) DEFAULT NULL,
  `NOM_CLIENT` char(30) DEFAULT NULL,
  `PRENOM_CLIENT` char(30) DEFAULT NULL,
  `ADRESSE_CLIENT` char(50) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `MODE_FACTURATION` char(30) DEFAULT NULL,
  PRIMARY KEY (`N_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_exam`
--

DROP TABLE IF EXISTS `type_exam`;
CREATE TABLE IF NOT EXISTS `type_exam` (
  `CODE_TYPE` int(11) NOT NULL,
  `LIBELLE_TYPE` char(40) DEFAULT NULL,
  PRIMARY KEY (`CODE_TYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ultiliser`
--

DROP TABLE IF EXISTS `ultiliser`;
CREATE TABLE IF NOT EXISTS `ultiliser` (
  `N_LECON` int(11) NOT NULL,
  `N_VEHICULE` int(11) NOT NULL,
  PRIMARY KEY (`N_LECON`,`N_VEHICULE`),
  KEY `I_FK_ULTILISER_VEHICULE` (`N_VEHICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `N_VEHICULE` int(11) NOT NULL,
  `CODE_MODELE` int(11) NOT NULL,
  `N_IMMATRICULATION` char(20) DEFAULT NULL,
  `DATE_ACHAT` date DEFAULT NULL,
  `NB_KM_INITIAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`N_VEHICULE`),
  KEY `I_FK_VEHICULE_MODELE` (`CODE_MODELE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
