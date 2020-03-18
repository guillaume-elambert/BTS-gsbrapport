-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  db5000215145.hosting-data.io
-- Généré le :  Lun 20 Janvier 2020 à 13:12
-- Version du serveur :  5.7.28-log
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsbRapport_lietard_elambert`
--

CREATE DATABASE IF NOT EXISTS `gsbRapport_lietard_elambert`;

-- --------------------------------------------------------

--
-- Structure de la table `gsbRapport_lietard_elambert`.`ACTIVITE_COMPL`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`ACTIVITE_COMPL` (
  `AC_NUM` int(11) NOT NULL,
  `AC_DATE` datetime DEFAULT NULL,
  `AC_LIEU` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `AC_THEME` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `AC_MOTIF` varchar(50) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `COLLABORATEUR`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`COLLABORATEUR` (
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `COL_NOM` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `COL_PRENOM` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `COL_RUE` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `COL_CP` varchar(5) COLLATE latin1_bin DEFAULT NULL,
  `COL_VILLE` varchar(30) COLLATE latin1_bin DEFAULT NULL,
  `COL_DATEEMBAUCHE` datetime DEFAULT NULL,
  `REG_CODE` varchar(2) COLLATE latin1_bin DEFAULT NULL,
  `ID_TYPE` int(11) DEFAULT NULL,
  `PSEUDO` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `MDP` varchar(255) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `COLLABORATEUR`
--

INSERT INTO `gsbRapport_lietard_elambert`.`COLLABORATEUR` (`COL_MATRICULE`, `COL_NOM`, `COL_PRENOM`, `COL_RUE`, `COL_CP`, `COL_VILLE`, `COL_DATEEMBAUCHE`, `REG_CODE`, `ID_TYPE`, `PSEUDO`, `MDP`) VALUES
('a131', 'Villechalane', 'Louis', '8 cours Lafontaine', '29000', 'BREST', '1992-12-11 00:00:00', 'IF', 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('a17', 'Andre', 'David', '1 r Aimon de Chissée', '38100', 'GRENOBLE', '1991-08-26 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('a55', 'Bedos', 'Christian', '1 r Bénédictins', '65000', 'TARBES', '1987-07-17 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('a93', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '1999-01-02 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('admin', 'admin', 'admin', NULL, NULL, NULL, '2020-01-15 00:00:00', NULL, 2, NULL, '$2y$10$gbxp0WS25WW7i8A/x3Wt0u.sbDFr8jh81ZVXDK44eT33IFygUhHue'),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', '1996-03-11 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b16', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', '1997-03-21 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '1999-01-31 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '1994-07-03 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', '2000-08-02 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b34', 'Cadic', 'Eric', '123 r Caponière', '41000', 'BLOIS', '1993-12-06 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b4', 'Charoze', 'Catherine', '100 pl Géants', '33000', 'BORDEAUX', '1997-09-25 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b50', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', '13000', 'MARSEILLE', '1998-01-18 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', '1995-10-21 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('c14', 'Daburon', 'François', '13 r Champs Elysées', '6000', 'NICE', '1989-02-01 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '1992-05-05 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('c54', 'Debelle', 'Michel', '181 r Caponière', '88000', 'EPINAL', '1991-04-09 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '1991-12-05 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '1997-11-18 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e22', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', '54000', 'NANCY', '1989-03-24 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '1993-05-17 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e39', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', '75000', 'PARIS', '1988-04-26 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '1996-02-19 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e5', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '1990-11-27 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('e52', 'Eynde', 'Valérie', '3 r Henri Moissan', '76000', 'ROUEN', '1991-10-31 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '1993-06-08 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('f39', 'Frémont', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '1997-02-15 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('f4', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '1994-05-03 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '1996-01-18 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', '1999-03-27 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', '1985-10-02 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '1996-01-13 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('h13', 'Guindon', 'François', '44 r Picotière', '19000', 'TULLE', '1993-05-08 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '1998-04-26 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '1993-08-26 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', '8000', 'SEDAN', '1992-11-01 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('j45', 'Labouré-Morel', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '1998-02-25 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('j50', 'Landré', 'Philippe', '4 av Gén Laperrine', '59000', 'LILLE', '1992-12-16 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '1998-06-18 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '1996-11-21 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('k53', 'Le', 'Noël', '4 av Beauvert', '68000', 'MULHOUSE', '1983-03-23 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('l14', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '1995-02-02 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '1995-06-05 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '1997-01-24 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', '1996-02-27 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('m35', 'Lejard', 'Agnès', '4 r Anthoard', '82000', 'MONTAUBAN', '1987-10-06 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', '1990-10-13 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('n42', 'Letessier', 'Stéphane', '5 chem Capuche', '27000', 'EVREUX', '1996-03-06 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('n58', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', '45000', 'ORLEANS', '1992-08-30 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', '1994-12-19 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('o26', 'Mancini', 'Anne', '5 r D\'Agier', '48000', 'MENDE', '1995-01-05 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p32', 'Marcouiller', 'Gérard', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '1992-12-24 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', '61000', 'FLERS', '1992-12-14 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p41', 'Montecot', 'Françoise', '6 r Paul Valéry', '17000', 'SAINTES', '1998-07-27 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '1994-12-12 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', '1977-10-03 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p6', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', 'PAU', '1997-03-30 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p7', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '1990-03-01 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('p8', 'Perrier', 'Maître', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '1991-06-23 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', '1997-09-06 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', '1984-07-29 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('r58', 'Quiquandon', 'Joël', '7 r Ernest Renan', '29000', 'QUIMPER', '1990-06-30 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', '1995-11-14 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', '1992-09-25 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('swiss', 'swiss', 'bourdin', NULL, NULL, NULL, '2003-06-18 00:00:00', 'IF', 2, NULL, '$2y$10$41tjP0yAZnnbcI.O7eIcPODRGeU1N1uYo5JVvJ8hUYR/8SkgpL28G'),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', '1995-03-09 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', '1997-08-29 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('t55', 'Tréhet', 'Alain', '7D chem Barral', '12000', 'RODEZ', '1994-11-29 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe'),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', '1991-03-29 00:00:00', NULL, 1, NULL, '$2y$10$oN2LphTsOxL2xq9m5nndieoXaMBHdamKnLdHGWwXBIFgGLKV9VZHe');

-- --------------------------------------------------------

--
-- Structure de la table `COMPOSANT`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`COMPOSANT` (
  `CMP_CODE` varchar(4) COLLATE latin1_bin NOT NULL,
  `CMP_LIBELLE` varchar(25) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `CONSTITUER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`CONSTITUER` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE latin1_bin NOT NULL,
  `CMP_CODE` varchar(4) COLLATE latin1_bin NOT NULL,
  `CST_QTE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `DOSAGE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`DOSAGE` (
  `DOS_CODE` varchar(10) COLLATE latin1_bin NOT NULL,
  `DOS_QUANTITE` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `DOS_UNITE` varchar(10) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `FAMILLE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`FAMILLE` (
  `FAM_CODE` varchar(3) COLLATE latin1_bin NOT NULL,
  `FAM_LIBELLE` varchar(80) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `FAMILLE`
--

INSERT INTO `gsbRapport_lietard_elambert`.`FAMILLE` (`FAM_CODE`, `FAM_LIBELLE`) VALUES
('AA', 'Antalgiques en association'),
('AAA', 'Antalgiques antipyrétiques en association'),
('AAC', 'Antidépresseur d\'action centrale'),
('AAH', 'Antivertigineux antihistaminique H1'),
('ABA', 'Antibiotique antituberculeux'),
('ABC', 'Antibiotique antiacnéique local'),
('ABP', 'Antibiotique de la famille des béta-lactamines (pénicilline A)'),
('AFC', 'Antibiotique de la famille des cyclines'),
('AFM', 'Antibiotique de la famille des macrolides'),
('AH', 'Antihistaminique H1 local'),
('AIM', 'Antidépresseur imipraminique (tricyclique)'),
('AIN', 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'),
('ALO', 'Antibiotique local (ORL)'),
('ANS', 'Antidépresseur IMAO non sélectif'),
('AO', 'Antibiotique ophtalmique'),
('AP', 'Antipsychotique normothymique'),
('AUM', 'Antibiotique urinaire minute'),
('CRT', 'Corticoïde, antibiotique et antifongique à  usage local'),
('HYP', 'Hypnotique antihistaminique'),
('PSA', 'Psychostimulant, antiasthénique');

-- --------------------------------------------------------

--
-- Structure de la table `FICHE_FRAIS`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`FICHE_FRAIS` (
  `FF_MOIS` varchar(20) COLLATE latin1_bin NOT NULL,
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `FF_NBHorsClassif` int(11) DEFAULT NULL,
  `FF_MontantHorsClassif` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `FORMULER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`FORMULER` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE latin1_bin NOT NULL,
  `PRE_CODE` varchar(2) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `INCLURE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`INCLURE` (
  `FF_MOIS` varchar(20) COLLATE latin1_bin NOT NULL,
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `TF_CODE` int(11) NOT NULL,
  `INC_QTE` int(11) DEFAULT NULL,
  `INC_MONTANT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `INTERAGIR`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`INTERAGIR` (
  `MED_PERTURBATEUR` varchar(10) COLLATE latin1_bin NOT NULL,
  `MED_MED_PERTURBE` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `INVITER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`INVITER` (
  `AC_NUM` int(11) NOT NULL,
  `PRA_NUM` smallint(6) NOT NULL,
  `SPECIALISTEON` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `MEDICAMENT`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`MEDICAMENT` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE latin1_bin NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `FAM_CODE` varchar(3) COLLATE latin1_bin NOT NULL,
  `MED_COMPOSITION` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `MED_EFFETS` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `MED_CONTREINDIC` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `MED_PRIXECHANTILLON` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `MEDICAMENT`
--

INSERT INTO `gsbRapport_lietard_elambert`.`MEDICAMENT` (`MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `FAM_CODE`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`) VALUES
('3MYC7', 'TRIMYCINE', 'CRT', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', NULL),
('ADIMOL9', 'ADIMOL', 'ABP', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines ou aux céphalosporines.', NULL),
('AMOPIL7', 'AMOPIL', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL),
('AMOX45', 'AMOXAR', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', NULL),
('AMOXIG12', 'AMOXI Gé', 'ABP', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', NULL),
('APATOUX22', 'APATOUX Vitamine C', 'ALO', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', NULL),
('BACTIG10', 'BACTIGEL', 'ABC', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l\'acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', NULL),
('BACTIV13', 'BACTIVIL', 'AFM', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('BITALV', 'BIVALIC', 'AAA', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', NULL),
('CARTION6', 'CARTION', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d\'ulcère gastroduodénal, maladies graves du foie.', NULL),
('CLAZER6', 'CLAZER', 'AFM', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicaments.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('DEPRIL9', 'DEPRAMIL', 'AIM', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques.', NULL),
('DIMIRTAM6', 'DIMIRTAM', 'AAC', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d\'allergie à  l\'un des constituants.', NULL),
('DOLRIL7', 'DOLORIL', 'AAA', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d\'allergie au paracétamol ou aux salicylates.', NULL),
('DORNOM8', 'NORMADOR', 'HYP', 'Doxylamine', 'Ce médicament est utilisé pour traiter l\'insomnie chez l\'adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l\'enfant de moins de 15 ans.', NULL),
('EQUILARX6', 'EQUILAR', 'AAH', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d\'allergie au produit, en cas de glaucome ou de rétention urinaire.', NULL),
('EVILR7', 'EVEILLOR', 'PSA', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL),
('INSXT5', 'INSECTIL', 'AH', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', NULL),
('JOVAI8', 'JOVENIL', 'AFM', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', NULL),
('LIDOXY23', 'LIDOXYTRACINE', 'AFC', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants. Il ne doit pas être associé aux rétinoïdes.', NULL),
('LITHOR12', 'LITHORINE', 'AP', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d\'insuffisance rénale, ou si vous avez un régime sans sel.', NULL),
('PARMOL16', 'PARMOCODEINE', 'AA', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, chez l\'enfant de moins de 15 Kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', NULL),
('PHYSOI8', 'PHYSICOR', 'PSA', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', NULL),
('PIRIZ8', 'PIRIZAN', 'ABA', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d\'autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'insuffisance rénale ou hépatique, d\'hyperuricémie ou de porphyrie.', NULL),
('POMDI20', 'POMADINE', 'AO', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques appliqués localement.', NULL),
('TROXT21', 'TROXADET', 'AIN', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d\'allergie au produit.', NULL),
('TXISOL22', 'TOUXISOL Vitamine C', 'ALO', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants et chez l\'enfant de moins de 6 ans.', NULL),
('URIEG6', 'URIREGUL', 'AUM', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à  l\'un des constituants et d\'insuffisance rénale.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `OFFRIR`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`OFFRIR` (
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `VIS_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(10) COLLATE latin1_bin NOT NULL,
  `OFF_QTE` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `OFFRIR`
--

INSERT INTO `gsbRapport_lietard_elambert`.`OFFRIR` (`COL_MATRICULE`, `VIS_NUM`, `MED_DEPOTLEGAL`, `OFF_QTE`) VALUES
('a131', 9, 'BACTIV13', 1),
('a131', 9, 'DOLRIL7', 9),
('a131', 10, 'ADIMOL9', 7),
('a131', 10, 'BITALV', 1),
('a131', 10, 'EVILR7', 1),
('a131', 10, 'INSXT5', 1),
('a17', 4, '3MYC7', 3),
('a17', 4, 'AMOX45', 12),
('swiss', 10, 'ADIMOL9', 2),
('swiss', 11, 'ADIMOL9', 10),
('swiss', 12, 'ADIMOL9', 9),
('swiss', 12, 'URIEG6', 1),
('swiss', 15, 'ADIMOL9', 1),
('swiss', 15, 'AMOXIG12', 1),
('swiss', 15, 'BITALV', 1),
('swiss', 15, 'CARTION6', 1),
('swiss', 15, 'DOLRIL7', 1),
('swiss', 15, 'DORNOM8', 1),
('swiss', 15, 'EQUILARX6', 1),
('swiss', 15, 'INSXT5', 1),
('swiss', 15, 'TROXT21', 1),
('swiss', 15, 'URIEG6', 1),
('swiss', 18, '3MYC7', 1),
('swiss', 18, 'CARTION6', 1),
('swiss', 18, 'PARMOL16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `POSSEDER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`POSSEDER` (
  `PRA_NUM` smallint(6) NOT NULL,
  `SPE_CODE` varchar(5) COLLATE latin1_bin NOT NULL,
  `POS_DIPLOME` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `POS_COEFPRESCRIPTION` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `PRATICIEN`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`PRATICIEN` (
  `PRA_NUM` smallint(6) NOT NULL,
  `PRA_NOM` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `PRA_PRENOM` varchar(30) COLLATE latin1_bin DEFAULT NULL,
  `PRA_RUE` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `PRA_CP` varchar(5) COLLATE latin1_bin DEFAULT NULL,
  `PRA_VILLE` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `PRA_COEFNOTORIETE` float DEFAULT NULL,
  `COEFFCONFIANCE` float DEFAULT NULL,
  `TYP_CODE` varchar(3) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `PRATICIEN`
--

INSERT INTO `gsbRapport_lietard_elambert`.`PRATICIEN` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_RUE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `COEFFCONFIANCE`, `TYP_CODE`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', '85000', 'LA ROCHE SUR YON', 290.03, NULL, 'MH'),
(2, 'Gosselin', 'Albert', '13 r Devon', '41000', 'BLOIS', 307.49, NULL, 'MV'),
(3, 'Delahaye', 'André', '36 av 6 Juin', '25000', 'BESANCON', 185.79, NULL, 'PS'),
(4, 'Leroux', 'André', '47 av Robert Schuman', '60000', 'BEAUVAIS', 172.04, NULL, 'PH'),
(5, 'Desmoulins', 'Anne', '31 r St Jean', '30000', 'NIMES', 94.75, NULL, 'PO'),
(6, 'Mouel', 'Anne', '27 r Auvergne', '80000', 'AMIENS', 45.2, NULL, 'MH'),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '29000', 'MORLAIX', 20.07, NULL, 'MV'),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', '68000', 'MULHOUSE', 396.52, NULL, 'PS'),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', '34000', 'MONTPELLIER', 395.66, NULL, 'PH'),
(10, 'Lerat', 'Bernard', '31 r St Jean', '59000', 'LILLE', 257.79, NULL, 'PO'),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', '67000', 'STRASBOURG', 450.96, NULL, 'MH'),
(12, 'Boscher', 'Bruno', '94 r Falaise', '10000', 'TROYES', 356.14, NULL, 'MV'),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', '75000', 'PARIS', 379.57, NULL, 'PS'),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', '45000', 'ORLEANS', 114.56, NULL, 'PH'),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', '6000', 'NICE', 222.06, NULL, 'PO'),
(16, 'Rossa', 'Claire', '14 av Thiès', '6000', 'NICE', 529.78, NULL, 'MH'),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', '11000', 'NARBONNE', 458.82, NULL, 'MV'),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', '35000', 'RENNES', 213.4, NULL, 'PS'),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', '44000', 'NANTES', 175.89, NULL, 'PH'),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', '87000', 'LIMOGES', 151.36, NULL, 'PO'),
(21, 'Houchard', 'Eliane', '9 r Demolombe', '49100', 'ANGERS', 436.96, NULL, 'MH'),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', '29000', 'QUIMPER', 281.17, NULL, 'MV'),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', '35000', 'RENNES', 315.6, NULL, 'PS'),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', '41000', 'BLOIS', 40.72, NULL, 'PH'),
(25, 'Desprez', 'Eric', '9 r Vaucelles', '33000', 'BORDEAUX', 406.85, NULL, 'PO'),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', '19000', 'TULLE', 441.87, NULL, 'MH'),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', '55000', 'VERDUN', 573.63, NULL, 'MV'),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', '56000', 'VANNES', 326.4, NULL, 'PS'),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', '70000', 'VESOUL', 506.06, NULL, 'PH'),
(30, 'Marie', 'Frédérique', '172 r Caponière', '70000', 'VESOUL', 313.31, NULL, 'PO'),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', '75000', 'PARIS', 366.82, NULL, 'MH'),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', '86000', 'POITIERS', 265.58, NULL, 'MV'),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', '64000', 'PAU', 184.97, NULL, 'PS'),
(34, 'Blanchais', 'Guy', '30 r Authie', '8000', 'SEDAN', 502.48, NULL, 'PH'),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', '62000', 'ARRAS', 7.39, NULL, 'PO'),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', '76000', 'ROUEN', 77.1, NULL, 'MH'),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', '38100', 'VIENNE', 92.62, NULL, 'MV'),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', '69000', 'LYON', 120.1, NULL, 'PS'),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', '71000', 'CHALON SUR SAONE', 13.73, NULL, 'PH'),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', '28000', 'CHARTRES', 550.69, NULL, 'PO'),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', '2000', 'LAON', 5.59, NULL, 'MH'),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', '14000', 'CAEN', 396.58, NULL, 'MV'),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', '18000', 'BOURGES', 340.35, NULL, 'PS'),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', '29000', 'BREST', 71.76, NULL, 'PH'),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', '79000', 'NIORT', 451.61, NULL, 'PO'),
(46, 'Riou', 'Line', '43 bd Gén Vanier', '77000', 'MARNE LA VALLEE', 193.25, NULL, 'MH'),
(47, 'Chubilleau', 'Louis', '46 r Eglise', '17000', 'SAINTES', 202.07, NULL, 'MV'),
(48, 'Lebrun', 'Lucette', '178 r Auge', '54000', 'NANCY', 410.41, NULL, 'PS'),
(49, 'Goessens', 'Marc', '6 av 6 Juin', '39000', 'DOLE', 548.57, NULL, 'PH'),
(50, 'Laforge', 'Marc', '5 résid Prairie', '50000', 'SAINT LO', 265.05, NULL, 'PO'),
(51, 'Millereau', 'Marc', '36 av 6 Juin', '72000', 'LA FERTE BERNARD', 430.42, NULL, 'MH'),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', '21000', 'DIJON', 281.05, NULL, 'MV'),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', '94000', 'BOISSY SAINT LEGER', 356.23, NULL, 'PS'),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', '52000', 'CHAUMONT', 107, NULL, 'PH'),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', '86000', 'CHATELLEREAULT', 369.94, NULL, 'PO'),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', '15000', 'AURRILLAC', 290.75, NULL, 'MH'),
(57, 'Robert', 'Pascal', '31 r St Jean', '93000', 'BOBIGNY', 162.41, NULL, 'MV'),
(58, 'Jean', 'Pascale', '114 r Authie', '49100', 'SAUMUR', 375.52, NULL, 'PS'),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', '13000', 'MARSEILLE', 478.01, NULL, 'PH'),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', '54000', 'NANCY', 239.66, NULL, 'PO'),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', '37000', 'TOURS', 599.06, NULL, 'MH'),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', '74000', 'ANNECY', 458.42, NULL, 'MV'),
(63, 'Boireaux', 'Philippe', '14 av Thiès', '10000', 'CHALON EN CHAMPAGNE', 454.48, NULL, 'PS'),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', '12000', 'RODEZ', 164.16, NULL, 'PH'),
(65, 'Duhamel', 'Philippe', '114 r Authie', '34000', 'MONTPELLIER', 98.62, NULL, 'PO'),
(66, 'Grigy', 'Philippe', '15 r Mélingue', '44000', 'CLISSON', 285.1, NULL, 'MH'),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', '81000', 'ALBI', 486.3, NULL, 'MV'),
(68, 'Lozier', 'Philippe', '8 r Gaillon', '31000', 'TOULOUSE', 48.4, NULL, 'PS'),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', '23000', 'MONTLUCON', 253.75, NULL, 'PH'),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', '40000', 'MONT DE MARSAN', 426.19, NULL, 'PO'),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', '57000', 'METZ', 118.7, NULL, 'MH'),
(72, 'Née', 'Pierre', '39 av 6 Juin', '82000', 'MONTAUBAN', 72.54, NULL, 'MV'),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', '48000', 'MENDE', 352.31, NULL, 'PS'),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', '13000', 'MARSEILLE', 552.19, NULL, 'PH'),
(75, 'Mabire', 'Roland', '11 r Boutiques', '67000', 'STRASBOURG', 422.39, NULL, 'PO'),
(76, 'Leroy', 'Soazig', '45 r Boutiques', '61000', 'ALENCON', 570.67, NULL, 'MH'),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', '46000', 'FIGEAC', 28.85, NULL, 'MV'),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', '27000', 'DREUX', 292.01, NULL, 'PS'),
(79, 'Rault', 'Sylvie', '15 bd Richemond', '2000', 'SOISSON', 526.6, NULL, 'PH'),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', '88000', 'EPINAL', 425.24, NULL, 'PO'),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', '7000', 'PRIVAS', 451.31, NULL, 'MH'),
(82, 'Bayard', 'Thierry', '92 r Falaise', '42000', 'SAINT ETIENNE', 271.71, NULL, 'MV'),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', '38100', 'GRENOBLE', 406.1, NULL, 'PS'),
(84, 'Bobichon', 'Tristan', '219 r Caponière', '9000', 'FOIX', 218.36, NULL, 'PH'),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', '33000', 'LIBOURNE', 265.61, NULL, 'PO'),
(86, 'Laurent', 'Younès', '34 r Demolombe', '53000', 'MAYENNE', 496.1, NULL, 'MH');

-- --------------------------------------------------------

--
-- Structure de la table `PRESCRIRE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`PRESCRIRE` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE latin1_bin NOT NULL,
  `TIN_CODE` varchar(5) COLLATE latin1_bin NOT NULL,
  `DOS_CODE` varchar(10) COLLATE latin1_bin NOT NULL,
  `PRE_POSOLOGIE` varchar(40) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `PRESENTATION`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`PRESENTATION` (
  `PRE_CODE` varchar(2) COLLATE latin1_bin NOT NULL,
  `PRE_LIBELLE` varchar(20) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `REALISER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`REALISER` (
  `AC_NUM` int(11) NOT NULL,
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `REA_MTTFRAIS` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `REGION`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`REGION` (
  `REG_CODE` varchar(2) COLLATE latin1_bin NOT NULL,
  `SEC_CODE` varchar(1) COLLATE latin1_bin NOT NULL,
  `REG_NOM` varchar(50) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `REGION`
--

INSERT INTO `gsbRapport_lietard_elambert`.`REGION` (`REG_CODE`, `SEC_CODE`, `REG_NOM`) VALUES
('AL', 'E', 'Alsace Lorraine'),
('AQ', 'S', 'Aquitaine'),
('AU', 'P', 'Auvergne'),
('BG', 'O', 'Bretagne'),
('BN', 'O', 'Basse Normandie'),
('BO', 'E', 'Bourgogne'),
('CA', 'N', 'Champagne Ardennes'),
('CE', 'P', 'Centre'),
('FC', 'E', 'Franche Comté'),
('HN', 'N', 'Haute Normandie'),
('IF', 'P', 'Ile de France'),
('LG', 'S', 'Languedoc'),
('LI', 'P', 'Limousin'),
('MP', 'S', 'Midi Pyrénée'),
('NP', 'N', 'Nord Pas de Calais'),
('PA', 'S', 'Provence Alpes Cote d\'Azur'),
('PC', 'O', 'Poitou Charente'),
('PI', 'N', 'Picardie'),
('PL', 'O', 'Pays de Loire'),
('RA', 'E', 'Rhone Alpes'),
('RO', 'S', 'Roussilon'),
('VD', 'O', 'Vendée');

-- --------------------------------------------------------

--
-- Structure de la table `SECTEUR`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`SECTEUR` (
  `SEC_CODE` varchar(1) COLLATE latin1_bin NOT NULL,
  `SEC_LIBELLE` varchar(15) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `SECTEUR`
--

INSERT INTO `gsbRapport_lietard_elambert`.`SECTEUR` (`SEC_CODE`, `SEC_LIBELLE`) VALUES
('E', 'Est'),
('N', 'Nord'),
('O', 'Ouest'),
('P', 'Paris centre'),
('S', 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `SPECIALITE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`SPECIALITE` (
  `SPE_CODE` varchar(5) COLLATE latin1_bin NOT NULL,
  `SPE_LIBELLE` varchar(150) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `SPECIALITE`
--

INSERT INTO `gsbRapport_lietard_elambert`.`SPECIALITE` (`SPE_CODE`, `SPE_LIBELLE`) VALUES
('ACP', 'anatomie et cytologie pathologiques'),
('AMV', 'angéiologie, médecine vasculaire'),
('ARC', 'anesthésiologie et réanimation chirurgicale'),
('BM', 'biologie médicale'),
('CAC', 'cardiologie et affections cardio-vasculaires'),
('CCT', 'chirurgie cardio-vasculaire et thoracique'),
('CG', 'chirurgie générale'),
('CMF', 'chirurgie maxillo-faciale'),
('COM', 'cancérologie, oncologie médicale'),
('COT', 'chirurgie orthopédique et traumatologie'),
('CPR', 'chirurgie plastique reconstructrice et esthétique'),
('CU', 'chirurgie urologique'),
('CV', 'chirurgie vasculaire'),
('DN', 'diabétologie-nutrition, nutrition'),
('DV', 'dermatologie et vénéréologie'),
('EM', 'endocrinologie et métabolismes'),
('ETD', 'évaluation et traitement de la douleur'),
('GEH', 'gastro-entérologie et hépatologie (appareil digestif)'),
('GMO', 'gynécologie médicale, obstétrique'),
('GO', 'gynécologie-obstétrique'),
('HEM', 'maladies du sang (hématologie)'),
('MBS', 'médecine et biologie du sport'),
('MDT', 'médecine du travail'),
('MMO', 'médecine manuelle - ostéopathie'),
('MN', 'médecine nucléaire'),
('MPR', 'médecine physique et de réadaptation'),
('MTR', 'médecine tropicale, pathologie infectieuse et tropicale'),
('NEP', 'néphrologie'),
('NRC', 'neurochirurgie'),
('NRL', 'neurologie'),
('ODM', 'orthopédie dento maxillo-faciale'),
('OPH', 'ophtalmologie'),
('ORL', 'oto-rhino-laryngologie'),
('PEA', 'psychiatrie de l\'enfant et de l\'adolescent'),
('PME', 'pédiatrie maladies des enfants'),
('PNM', 'pneumologie'),
('PSC', 'psychiatrie'),
('RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
('RDT', 'radiothérapie (oncologie option radiothérapie)'),
('RGM', 'reproduction et gynécologie médicale'),
('RHU', 'rhumatologie'),
('STO', 'stomatologie'),
('SXL', 'sexologie'),
('TXA', 'toxicomanie et alcoologie');

-- --------------------------------------------------------

--
-- Structure de la table `Switchboard Items`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`Switchboard Items` (
  `SwitchboardID` int(11) NOT NULL,
  `ItemNumber` smallint(6) NOT NULL,
  `ItemText` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `Command` smallint(6) DEFAULT NULL,
  `Argument` varchar(255) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `Switchboard Items`
--

INSERT INTO `gsbRapport_lietard_elambert`.`Switchboard Items` (`SwitchboardID`, `ItemNumber`, `ItemText`, `Command`, `Argument`) VALUES
(1, 0, 'Gestion des comptes rendus', NULL, 'Par défaut'),
(1, 1, 'Comptes-Rendus', 3, 'VISITE'),
(1, 2, 'Visiteurs', 3, 'F_VISITEUR'),
(1, 3, 'Praticiens', 3, 'F_PRATICIEN'),
(1, 4, 'Medicaments', 3, 'F_MEDICAMENT'),
(1, 5, 'Quitter', 8, 'quitter');

-- --------------------------------------------------------

--
-- Structure de la table `TRAVAILLER`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TRAVAILLER` (
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `JJMMAA` datetime NOT NULL,
  `REG_CODE` varchar(2) COLLATE latin1_bin NOT NULL,
  `TRA_ROLE` varchar(11) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `TRAVAILLER`
--

INSERT INTO `gsbRapport_lietard_elambert`.`TRAVAILLER` (`COL_MATRICULE`, `JJMMAA`, `REG_CODE`, `TRA_ROLE`) VALUES
('p49', '1977-10-03 00:00:00', 'CE', 'Visiteur'),
('k53', '1983-03-23 00:00:00', 'CA', 'Visiteur'),
('r24', '1984-07-29 00:00:00', 'BN', 'Visiteur'),
('g53', '1985-10-02 00:00:00', 'BG', 'Visiteur'),
('a55', '1987-07-17 00:00:00', 'MP', 'Visiteur'),
('m35', '1987-10-06 00:00:00', 'MP', 'Visiteur'),
('e39', '1988-04-26 00:00:00', 'IF', 'Visiteur'),
('c14', '1989-02-01 00:00:00', 'PA', 'Visiteur'),
('e22', '1989-03-24 00:00:00', 'AL', 'Visiteur'),
('p7', '1990-03-01 00:00:00', 'RO', 'Visiteur'),
('r58', '1990-06-30 00:00:00', 'BG', 'Visiteur'),
('m45', '1990-10-13 00:00:00', 'AL', 'Visiteur'),
('e5', '1990-11-27 00:00:00', 'MP', 'Visiteur'),
('t60', '1991-03-29 00:00:00', 'CE', 'Visiteur'),
('c54', '1991-04-09 00:00:00', 'AL', 'Visiteur'),
('p8', '1991-06-23 00:00:00', 'BO', 'Visiteur'),
('a17', '1991-08-26 00:00:00', 'RA', 'Visiteur'),
('e52', '1991-10-31 00:00:00', 'HN', 'Visiteur'),
('d13', '1991-12-05 00:00:00', 'PL', 'Visiteur'),
('k53', '1992-04-03 00:00:00', 'AL', 'Délégué'),
('c3', '1992-05-05 00:00:00', 'CA', 'Visiteur'),
('n58', '1992-08-30 00:00:00', 'CE', 'Visiteur'),
('s21', '1992-09-25 00:00:00', 'LI', 'Visiteur'),
('h40', '1992-11-01 00:00:00', 'CA', 'Visiteur'),
('a131', '1992-12-11 00:00:00', 'BN', 'Visiteur'),
('p40', '1992-12-14 00:00:00', 'BN', 'Délégué'),
('j50', '1992-12-16 00:00:00', 'NP', 'Visiteur'),
('p32', '1992-12-24 00:00:00', 'IF', 'Visiteur'),
('h13', '1993-05-08 00:00:00', 'LI', 'Visiteur'),
('e24', '1993-05-17 00:00:00', 'AL', 'Délégué'),
('f21', '1993-06-08 00:00:00', 'RA', 'Visiteur'),
('h35', '1993-08-26 00:00:00', 'AU', 'Visiteur'),
('b34', '1993-12-06 00:00:00', 'CE', 'Délégué'),
('f4', '1994-05-03 00:00:00', 'MP', 'Visiteur'),
('b25', '1994-07-03 00:00:00', 'PL', 'Visiteur'),
('t55', '1994-11-29 00:00:00', 'MP', 'Visiteur'),
('p42', '1994-12-12 00:00:00', 'PI', 'Visiteur'),
('n59', '1994-12-19 00:00:00', 'PI', 'Visiteur'),
('o26', '1995-01-05 00:00:00', 'LG', 'Visiteur'),
('l14', '1995-02-02 00:00:00', 'PL', 'Visiteur'),
('t43', '1995-03-09 00:00:00', 'BO', 'Visiteur'),
('a55', '1995-05-19 00:00:00', 'RO', 'Visiteur'),
('l23', '1995-06-05 00:00:00', 'PC', 'Visiteur'),
('b59', '1995-10-21 00:00:00', 'RA', 'Visiteur'),
('s10', '1995-11-14 00:00:00', 'FC', 'Visiteur'),
('e5', '1995-11-27 00:00:00', 'MP', 'Délégué'),
('g7', '1996-01-13 00:00:00', 'LI', 'Visiteur'),
('g19', '1996-01-18 00:00:00', 'IF', 'Visiteur'),
('e49', '1996-02-19 00:00:00', 'MP', 'Visiteur'),
('l56', '1996-02-27 00:00:00', 'FC', 'Visiteur'),
('n42', '1996-03-06 00:00:00', 'HN', 'Visiteur'),
('b13', '1996-03-11 00:00:00', 'AL', 'Visiteur'),
('a131', '1996-05-27 00:00:00', 'BG', 'Visiteur'),
('k4', '1996-11-21 00:00:00', 'LG', 'Visiteur'),
('l46', '1997-01-24 00:00:00', 'PL', 'Visiteur'),
('c14', '1997-02-01 00:00:00', 'PA', 'Délégué'),
('f39', '1997-02-15 00:00:00', 'RA', 'Visiteur'),
('b16', '1997-03-21 00:00:00', 'BG', 'Visiteur'),
('p6', '1997-03-30 00:00:00', 'AQ', 'Visiteur'),
('t47', '1997-08-29 00:00:00', 'PI', 'Visiteur'),
('q17', '1997-09-06 00:00:00', 'BN', 'Visiteur'),
('a17', '1997-09-19 00:00:00', 'RA', 'Délégué'),
('b4', '1997-09-25 00:00:00', 'AQ', 'Visiteur'),
('d51', '1997-11-18 00:00:00', 'FC', 'Délégué'),
('b50', '1998-01-18 00:00:00', 'PA', 'Visiteur'),
('j45', '1998-02-25 00:00:00', 'CA', 'Responsable'),
('h30', '1998-04-26 00:00:00', 'IF', 'Visiteur'),
('r24', '1998-05-25 00:00:00', 'BN', 'Responsable'),
('j8', '1998-06-18 00:00:00', 'IF', 'Responsable'),
('p41', '1998-07-27 00:00:00', 'PC', 'Visiteur'),
('a93', '1999-01-02 00:00:00', 'PC', 'Visiteur'),
('b19', '1999-01-31 00:00:00', 'PL', 'Visiteur'),
('g30', '1999-03-27 00:00:00', 'PI', 'Délégué'),
('m45', '1999-04-08 00:00:00', 'AL', 'Délégué'),
('b34', '1999-06-18 00:00:00', 'CE', 'Responsable'),
('p40', '1999-07-17 00:00:00', 'BN', 'Responsable'),
('a55', '1999-08-21 00:00:00', 'RO', 'Délégué'),
('b25', '2000-01-01 00:00:00', 'PL', 'Délégué'),
('e24', '2000-02-29 00:00:00', 'AL', 'Responsable'),
('b28', '2000-08-02 00:00:00', 'LG', 'Visiteur'),
('g30', '2000-10-31 00:00:00', 'PI', 'Responsable'),
('e5', '2000-11-27 00:00:00', 'AQ', 'Responsable'),
('c14', '2001-03-03 00:00:00', 'PA', 'Responsable'),
('d51', '2002-03-20 00:00:00', 'FC', 'Responsable');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_COLLABORATEUR`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TYPE_COLLABORATEUR` (
  `ID_TYPE` int(11) NOT NULL DEFAULT '1',
  `LIB_TYPE` varchar(80) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `TYPE_COLLABORATEUR`
--

INSERT INTO `gsbRapport_lietard_elambert`.`TYPE_COLLABORATEUR` (`ID_TYPE`, `LIB_TYPE`) VALUES
(1, 'Collaborateur'),
(2, 'Délégué');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_FRAIS`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TYPE_FRAIS` (
  `TF_CODE` int(11) NOT NULL,
  `TF_LIB` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `TF_FORFAIT` varchar(30) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_INDIVIDU`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TYPE_INDIVIDU` (
  `TIN_CODE` varchar(5) COLLATE latin1_bin NOT NULL,
  `TIN_LIBELLE` varchar(50) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_MOTIF`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TYPE_MOTIF` (
  `ID_MOTIF` int(11) NOT NULL,
  `LIB_MOTIF` varchar(100) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `TYPE_MOTIF`
--

INSERT INTO `gsbRapport_lietard_elambert`.`TYPE_MOTIF` (`ID_MOTIF`, `LIB_MOTIF`) VALUES
(1, 'Actualisation annuelle'),
(2, 'Rapport Annuel'),
(3, 'Baisse activité');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_PRATICIEN`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`TYPE_PRATICIEN` (
  `TYP_CODE` varchar(3) COLLATE latin1_bin NOT NULL,
  `TYP_LIBELLE` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `TYP_LIEU` varchar(35) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `TYPE_PRATICIEN`
--

INSERT INTO `gsbRapport_lietard_elambert`.`TYPE_PRATICIEN` (`TYP_CODE`, `TYP_LIBELLE`, `TYP_LIEU`) VALUES
('MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
('MV', 'Médecine de Ville', 'Cabinet'),
('PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
('PO', 'Pharmacien Officine', 'Pharmacie'),
('PS', 'Personnel de santé', 'Centre paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `VISITE`
--

CREATE TABLE `gsbRapport_lietard_elambert`.`VISITE` (
  `COL_MATRICULE` varchar(10) COLLATE latin1_bin NOT NULL,
  `VIS_NUM` int(11) NOT NULL,
  `PRA_NUM` smallint(6) NOT NULL,
  `REMPLACANTS` smallint(6) DEFAULT NULL,
  `VIS_DATE` datetime DEFAULT NULL,
  `VIS_BILAN` varchar(1000) COLLATE latin1_bin DEFAULT NULL,
  `VIS_DATESAISIE` datetime DEFAULT NULL,
  `ETAT_RAPPORT` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `CONSULTE` tinyint(1) NOT NULL DEFAULT '0',
  `ID_MOTIF` int(11) DEFAULT NULL,
  `AUTRE_MOTIF` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `MED_PRESENTE1` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `MED_PRESENTE2` varchar(10) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `VISITE`
--

INSERT INTO `gsbRapport_lietard_elambert`.`VISITE` (`COL_MATRICULE`, `VIS_NUM`, `PRA_NUM`, `REMPLACANTS`, `VIS_DATE`, `VIS_BILAN`, `VIS_DATESAISIE`, `ETAT_RAPPORT`, `CONSULTE`, `ID_MOTIF`, `AUTRE_MOTIF`, `MED_PRESENTE1`, `MED_PRESENTE2`) VALUES
('a131', 3, 23, 14, '2002-04-18 00:00:00', 'Médecin curieux, à recontacer en décembre pour réunion', NULL, 'brouillon', 0, 1, NULL, NULL, NULL),
('a131', 7, 41, NULL, '2020-01-14 00:00:00', 'RAS Changement de tel : 05 89 89 89 89', '2020-01-15 16:24:18', 'finalisé', 0, 1, NULL, NULL, NULL),
('a131', 8, 41, NULL, '2020-01-16 00:00:00', 'a', '2020-01-16 12:12:57', 'brouillon', 0, 1, NULL, NULL, NULL),
('a131', 9, 41, NULL, '2020-01-16 00:00:00', 'test', '2020-01-16 12:15:55', 'brouillon', 0, 1, NULL, NULL, NULL),
('a131', 10, 84, 53, '2020-01-18 00:00:00', 'fghgfgvhfvh', '2020-01-18 13:43:53', 'brouillon', 0, 1, NULL, 'APATOUX22', 'ADIMOL9'),
('a17', 4, 4, NULL, '2003-05-21 00:00:00', 'Changement de direction, redéfinition de la politique médicamenteuse, recours au générique', NULL, 'brouillon', 0, 1, NULL, NULL, NULL),
('swiss', 1, 1, NULL, '2019-12-04 00:00:00', 'test', '2019-12-11 00:00:00', 'brouillon', 0, 1, NULL, NULL, NULL),
('swiss', 2, 1, NULL, '2019-12-04 00:00:00', 'test2', '2020-01-10 17:05:48', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 3, 1, NULL, '2019-11-07 00:00:00', 'ggggg', '2019-12-11 00:00:00', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 4, 1, NULL, '2019-12-11 00:00:00', 'hhhhhh', '2019-12-11 00:00:00', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 5, 41, 42, '2019-12-11 00:00:00', 'a', '2019-12-11 00:00:00', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 6, 41, 41, '2019-12-11 00:00:00', 'a', '2019-12-11 00:00:00', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 7, 41, 47, '2019-12-11 00:00:00', 'lllllllllllllllllllllllllllllllllllllllllllllllllllll', '2019-12-11 20:02:38', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 8, 82, 17, '2020-01-10 00:00:00', 'Ceci est le bilan de ma visite', '2020-01-10 12:39:42', 'finalisé', 0, 2, NULL, 'APATOUX22', NULL),
('swiss', 9, 82, 17, '2020-01-10 00:00:00', 'Ceci est le bilan de ma visite', '2020-01-10 13:03:45', 'finalisé', 0, 2, NULL, 'APATOUX22', 'LIDOXY23'),
('swiss', 10, 82, 17, '2020-01-10 00:00:00', 'Ceci est le bilan de ma visite', '2020-01-10 13:07:16', 'finalisé', 0, 2, NULL, 'APATOUX22', 'LIDOXY23'),
('swiss', 11, 41, NULL, '2020-01-10 00:00:00', 'a', '2020-01-10 14:52:24', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 12, 41, NULL, '2020-01-10 00:00:00', 'b', '2020-01-10 14:54:25', 'finalisé', 0, 3, NULL, NULL, NULL),
('swiss', 13, 41, NULL, '2020-01-11 00:00:00', '', '2020-01-11 16:07:57', 'finalisé', 0, 1, NULL, NULL, NULL),
('swiss', 14, 41, NULL, '2020-01-11 00:00:00', '', '2020-01-11 16:13:40', 'brouillon', 0, 1, NULL, 'CARTION6', 'CLAZER6'),
('swiss', 15, 15, 43, '2020-01-13 00:00:00', 'Ceci est le bilan de ma visite :\r\n\r\nQuid enim tam absurdum quam delectari multis inanimis rebus, ut honore, ut gloria, ut aedificio, ut vestitu cultuque corporis, animante virtute praedito, eo qui vel amare vel, ut ita dicam, redamare possit, non admodum delectari? Nihil est enim remuneratione benevolentiae, nihil vicissitudine studiorum officiorumque iucundius.\r\n\r\nDum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.\r\n\r\n\r\n\r\nTest de caractères spéciaux : = +  ù £ $ ¤ § µ * ~ # [ ] ` ] ² { } ^ ê \' \" / \\ // \\\\ _ - @ &', '2020-01-16 11:27:28', 'brouillon', 0, NULL, 'Ceci est le motif de ma visite', 'BACTIG10', 'EVILR7'),
('swiss', 16, 41, NULL, '2020-01-13 00:00:00', 'aaaaa', '2020-01-13 11:58:01', 'finalisé', 1, 1, NULL, NULL, NULL),
('swiss', 17, 41, NULL, '2020-01-13 00:00:00', 'a', '2020-01-15 09:30:30', 'brouillon', 0, 1, NULL, 'ADIMOL9', 'AMOPIL7'),
('swiss', 18, 41, NULL, '2020-01-13 00:00:00', 'a', '2020-01-16 11:27:03', 'brouillon', 0, 1, NULL, 'TROXT21', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ACTIVITE_COMPL`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`ACTIVITE_COMPL`
  ADD PRIMARY KEY (`AC_NUM`);

--
-- Index pour la table `COLLABORATEUR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`COLLABORATEUR`
  ADD PRIMARY KEY (`COL_MATRICULE`),
  ADD KEY `ID_TYPE` (`ID_TYPE`),
  ADD KEY `COLLABORATEUR_ibfk_2` (`REG_CODE`);

--
-- Index pour la table `COMPOSANT`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`COMPOSANT`
  ADD PRIMARY KEY (`CMP_CODE`);

--
-- Index pour la table `CONSTITUER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`CONSTITUER`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`CMP_CODE`),
  ADD KEY `CMP_CODE` (`CMP_CODE`);

--
-- Index pour la table `DOSAGE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`DOSAGE`
  ADD PRIMARY KEY (`DOS_CODE`);

--
-- Index pour la table `FAMILLE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`FAMILLE`
  ADD PRIMARY KEY (`FAM_CODE`);

--
-- Index pour la table `FICHE_FRAIS`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`FICHE_FRAIS`
  ADD PRIMARY KEY (`FF_MOIS`,`COL_MATRICULE`),
  ADD KEY `COL_MATRICULE` (`COL_MATRICULE`);

--
-- Index pour la table `FORMULER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`FORMULER`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`PRE_CODE`),
  ADD KEY `PRE_CODE` (`PRE_CODE`);

--
-- Index pour la table `INCLURE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INCLURE`
  ADD PRIMARY KEY (`FF_MOIS`,`COL_MATRICULE`,`TF_CODE`),
  ADD KEY `TF_CODE` (`TF_CODE`);

--
-- Index pour la table `INTERAGIR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INTERAGIR`
  ADD PRIMARY KEY (`MED_PERTURBATEUR`,`MED_MED_PERTURBE`),
  ADD KEY `MED_MED_PERTURBE` (`MED_MED_PERTURBE`);

--
-- Index pour la table `INVITER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INVITER`
  ADD PRIMARY KEY (`AC_NUM`,`PRA_NUM`),
  ADD KEY `PRA_NUM` (`PRA_NUM`);

--
-- Index pour la table `MEDICAMENT`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`MEDICAMENT`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`),
  ADD KEY `FAM_CODE` (`FAM_CODE`);

--
-- Index pour la table `OFFRIR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`OFFRIR`
  ADD PRIMARY KEY (`COL_MATRICULE`,`VIS_NUM`,`MED_DEPOTLEGAL`),
  ADD KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`);

--
-- Index pour la table `POSSEDER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`POSSEDER`
  ADD PRIMARY KEY (`PRA_NUM`,`SPE_CODE`),
  ADD KEY `SPE_CODE` (`SPE_CODE`);

--
-- Index pour la table `PRATICIEN`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`PRATICIEN`
  ADD PRIMARY KEY (`PRA_NUM`),
  ADD KEY `TYP_CODE` (`TYP_CODE`);

--
-- Index pour la table `PRESCRIRE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`PRESCRIRE`
  ADD PRIMARY KEY (`MED_DEPOTLEGAL`,`TIN_CODE`,`DOS_CODE`),
  ADD KEY `TIN_CODE` (`TIN_CODE`),
  ADD KEY `DOS_CODE` (`DOS_CODE`);

--
-- Index pour la table `PRESENTATION`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`PRESENTATION`
  ADD PRIMARY KEY (`PRE_CODE`);

--
-- Index pour la table `REALISER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`REALISER`
  ADD PRIMARY KEY (`AC_NUM`,`COL_MATRICULE`),
  ADD KEY `COL_MATRICULE` (`COL_MATRICULE`);

--
-- Index pour la table `REGION`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`REGION`
  ADD PRIMARY KEY (`REG_CODE`),
  ADD KEY `SEC_CODE` (`SEC_CODE`);

--
-- Index pour la table `SECTEUR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`SECTEUR`
  ADD PRIMARY KEY (`SEC_CODE`);

--
-- Index pour la table `SPECIALITE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`SPECIALITE`
  ADD PRIMARY KEY (`SPE_CODE`);

--
-- Index pour la table `Switchboard Items`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`Switchboard Items`
  ADD PRIMARY KEY (`SwitchboardID`,`ItemNumber`);

--
-- Index pour la table `TRAVAILLER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TRAVAILLER`
  ADD PRIMARY KEY (`JJMMAA`,`COL_MATRICULE`,`REG_CODE`),
  ADD KEY `REG_CODE` (`REG_CODE`),
  ADD KEY `COL_MATRICULE` (`COL_MATRICULE`);

--
-- Index pour la table `TYPE_COLLABORATEUR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TYPE_COLLABORATEUR`
  ADD PRIMARY KEY (`ID_TYPE`);

--
-- Index pour la table `TYPE_FRAIS`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TYPE_FRAIS`
  ADD PRIMARY KEY (`TF_CODE`);

--
-- Index pour la table `TYPE_INDIVIDU`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TYPE_INDIVIDU`
  ADD PRIMARY KEY (`TIN_CODE`);

--
-- Index pour la table `TYPE_MOTIF`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TYPE_MOTIF`
  ADD PRIMARY KEY (`ID_MOTIF`);

--
-- Index pour la table `TYPE_PRATICIEN`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TYPE_PRATICIEN`
  ADD PRIMARY KEY (`TYP_CODE`);

--
-- Index pour la table `VISITE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`VISITE`
  ADD PRIMARY KEY (`COL_MATRICULE`,`VIS_NUM`),
  ADD KEY `MED_PRESENTE1` (`MED_PRESENTE1`),
  ADD KEY `MED_PRESENTE2` (`MED_PRESENTE2`),
  ADD KEY `ID_MOTIF` (`ID_MOTIF`),
  ADD KEY `PRA_NUM` (`PRA_NUM`),
  ADD KEY `REMPLACANTS` (`REMPLACANTS`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ACTIVITE_COMPL`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`ACTIVITE_COMPL`
  MODIFY `AC_NUM` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `COLLABORATEUR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`COLLABORATEUR`
  ADD CONSTRAINT `COLLABORATEUR_ibfk_1` FOREIGN KEY (`ID_TYPE`) REFERENCES `TYPE_COLLABORATEUR` (`ID_TYPE`),
  ADD CONSTRAINT `COLLABORATEUR_ibfk_2` FOREIGN KEY (`REG_CODE`) REFERENCES `REGION` (`REG_CODE`);

--
-- Contraintes pour la table `CONSTITUER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`CONSTITUER`
  ADD CONSTRAINT `CONSTITUER_ibfk_1` FOREIGN KEY (`CMP_CODE`) REFERENCES `COMPOSANT` (`CMP_CODE`),
  ADD CONSTRAINT `CONSTITUER_ibfk_2` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `FICHE_FRAIS`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`FICHE_FRAIS`
  ADD CONSTRAINT `FICHE_FRAIS_ibfk_1` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `COLLABORATEUR` (`COL_MATRICULE`);

--
-- Contraintes pour la table `FORMULER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`FORMULER`
  ADD CONSTRAINT `FORMULER_ibfk_1` FOREIGN KEY (`PRE_CODE`) REFERENCES `PRESENTATION` (`PRE_CODE`),
  ADD CONSTRAINT `FORMULER_ibfk_2` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `INCLURE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INCLURE`
  ADD CONSTRAINT `INCLURE_ibfk_1` FOREIGN KEY (`FF_MOIS`,`COL_MATRICULE`) REFERENCES `FICHE_FRAIS` (`FF_MOIS`, `COL_MATRICULE`),
  ADD CONSTRAINT `INCLURE_ibfk_2` FOREIGN KEY (`TF_CODE`) REFERENCES `TYPE_FRAIS` (`TF_CODE`);

--
-- Contraintes pour la table `INTERAGIR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INTERAGIR`
  ADD CONSTRAINT `INTERAGIR_ibfk_1` FOREIGN KEY (`MED_PERTURBATEUR`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `INTERAGIR_ibfk_2` FOREIGN KEY (`MED_MED_PERTURBE`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `INVITER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`INVITER`
  ADD CONSTRAINT `INVITER_ibfk_1` FOREIGN KEY (`AC_NUM`) REFERENCES `ACTIVITE_COMPL` (`AC_NUM`),
  ADD CONSTRAINT `INVITER_ibfk_2` FOREIGN KEY (`PRA_NUM`) REFERENCES `PRATICIEN` (`PRA_NUM`);

--
-- Contraintes pour la table `MEDICAMENT`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`MEDICAMENT`
  ADD CONSTRAINT `MEDICAMENT_ibfk_1` FOREIGN KEY (`FAM_CODE`) REFERENCES `FAMILLE` (`FAM_CODE`);

--
-- Contraintes pour la table `OFFRIR`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`OFFRIR`
  ADD CONSTRAINT `OFFRIR_ibfk_1` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `OFFRIR_ibfk_2` FOREIGN KEY (`COL_MATRICULE`,`VIS_NUM`) REFERENCES `VISITE` (`COL_MATRICULE`, `VIS_NUM`);

--
-- Contraintes pour la table `POSSEDER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`POSSEDER`
  ADD CONSTRAINT `POSSEDER_ibfk_1` FOREIGN KEY (`SPE_CODE`) REFERENCES `SPECIALITE` (`SPE_CODE`),
  ADD CONSTRAINT `POSSEDER_ibfk_2` FOREIGN KEY (`PRA_NUM`) REFERENCES `PRATICIEN` (`PRA_NUM`);

--
-- Contraintes pour la table `PRATICIEN`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`PRATICIEN`
  ADD CONSTRAINT `PRATICIEN_ibfk_1` FOREIGN KEY (`TYP_CODE`) REFERENCES `TYPE_PRATICIEN` (`TYP_CODE`);

--
-- Contraintes pour la table `PRESCRIRE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`PRESCRIRE`
  ADD CONSTRAINT `PRESCRIRE_ibfk_1` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `PRESCRIRE_ibfk_2` FOREIGN KEY (`TIN_CODE`) REFERENCES `TYPE_INDIVIDU` (`TIN_CODE`),
  ADD CONSTRAINT `PRESCRIRE_ibfk_3` FOREIGN KEY (`DOS_CODE`) REFERENCES `DOSAGE` (`DOS_CODE`);

--
-- Contraintes pour la table `REALISER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`REALISER`
  ADD CONSTRAINT `REALISER_ibfk_1` FOREIGN KEY (`AC_NUM`) REFERENCES `ACTIVITE_COMPL` (`AC_NUM`),
  ADD CONSTRAINT `REALISER_ibfk_2` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `COLLABORATEUR` (`COL_MATRICULE`);

--
-- Contraintes pour la table `REGION`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`REGION`
  ADD CONSTRAINT `REGION_ibfk_1` FOREIGN KEY (`SEC_CODE`) REFERENCES `SECTEUR` (`SEC_CODE`);

--
-- Contraintes pour la table `TRAVAILLER`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`TRAVAILLER`
  ADD CONSTRAINT `TRAVAILLER_ibfk_1` FOREIGN KEY (`REG_CODE`) REFERENCES `REGION` (`REG_CODE`),
  ADD CONSTRAINT `TRAVAILLER_ibfk_2` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `COLLABORATEUR` (`COL_MATRICULE`);

--
-- Contraintes pour la table `VISITE`
--
ALTER TABLE `gsbRapport_lietard_elambert`.`VISITE`
  ADD CONSTRAINT `VISITE_ibfk_1` FOREIGN KEY (`MED_PRESENTE1`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `VISITE_ibfk_2` FOREIGN KEY (`MED_PRESENTE2`) REFERENCES `MEDICAMENT` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `VISITE_ibfk_3` FOREIGN KEY (`ID_MOTIF`) REFERENCES `TYPE_MOTIF` (`ID_MOTIF`),
  ADD CONSTRAINT `VISITE_ibfk_4` FOREIGN KEY (`PRA_NUM`) REFERENCES `PRATICIEN` (`PRA_NUM`),
  ADD CONSTRAINT `VISITE_ibfk_5` FOREIGN KEY (`REMPLACANTS`) REFERENCES `PRATICIEN` (`PRA_NUM`),
  ADD CONSTRAINT `VISITE_ibfk_6` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `COLLABORATEUR` (`COL_MATRICULE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
