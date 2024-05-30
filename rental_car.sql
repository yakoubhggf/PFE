-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 mai 2024 à 08:05
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rental_car`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `IdAdmin` int(11) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `motDePasse` varchar(25) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`IdAdmin`, `login`, `motDePasse`) VALUES
(1, 'yakoubhamdane48@gmail.com', 'yakoub23');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(255) NOT NULL,
  `nom` text CHARACTER SET utf8mb4 NOT NULL,
  `prenom` text CHARACTER SET utf8mb4 NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `adressEmail` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `motDePass` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `numeroDeTelphone` int(10) NOT NULL,
  `Vill` text CHARACTER SET utf8mb4 NOT NULL,
  `rue` text CHARACTER SET utf8mb4 NOT NULL,
  `codepostal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `idContrat` int(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `statutContrat` text CHARACTER SET utf8mb4 NOT NULL,
  `dateDepartEffective` date DEFAULT NULL,
  `DateRetourEffective` date DEFAULT NULL,
  `idReservation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` varchar(255) NOT NULL,
  `dateDeDepart` date NOT NULL,
  `dateDeRetour` date NOT NULL,
  `statut` enum('confirmee','annullee') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'confirmee',
  `idClient` int(255) NOT NULL,
  `idVoiture` int(255) NOT NULL,
  `heure_de_prise_en_charge` varchar(4) NOT NULL,
  `heure_de_depot` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idVoiture` int(255) NOT NULL,
  `numeroSequence` varchar(7) CHARACTER SET utf8mb4 NOT NULL,
  `marque` text CHARACTER SET utf8mb4 NOT NULL,
  `type` enum('touristique','poids lourd ','commercial','transport') CHARACTER SET utf8mb4 NOT NULL,
  `anne` year(4) NOT NULL,
  `codeWilaya` int(2) NOT NULL,
  `etat` varchar(25) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'disponible',
  `prix` double NOT NULL,
  `transsmission` text NOT NULL,
  `fuel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idVoiture`, `numeroSequence`, `marque`, `type`, `anne`, `codeWilaya`, `etat`, `prix`, `transsmission`, `fuel`) VALUES
(4, 'BC456DE', 'Peugeot Rifter', 'commercial', 2016, 23, 'disponible', 300, 'manuel', 'electrique'),
(5, 'FG321HI', 'Renault Grand Kangoo', 'commercial', 2015, 31, 'disponible', 250, 'auto', 'hybrid'),
(6, 'JK654LM', 'Peugeot', 'touristique', 2017, 19, 'disponible', 275, 'manuel', 'carosil'),
(8, 'RS012TU', 'Renault Fluence', 'touristique', 2018, 23, 'disponible', 450, 'auto', 'electrique'),
(9, 'VW345XY', 'Nissan Evalia', 'touristique', 2018, 16, 'disponible', 375, 'manuel', 'hybrid'),
(10, 'YZ678AB', 'Land Rover Discovery', 'transport', 2017, 25, 'disponible', 800, 'auto', 'carosil'),
(11, 'CD901EF', 'KIA Sorento', 'transport', 2019, 31, 'disponible', 750, 'manuel', 'hybrid'),
(14, 'XY789ZB', 'NISSAN Patrol', 'commercial', 2014, 16, 'disponible', 150, 'auto', 'carosil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`IdAdmin`),
  ADD UNIQUE KEY `UNIQUE` (`login`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `UNIQUE` (`adressEmail`),
  ADD KEY `adressEmail` (`adressEmail`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`idContrat`),
  ADD KEY `fk_contrat_reservation` (`idReservation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `fk_reservation_client` (`idClient`),
  ADD KEY `fk_reservation_voiture` (`idVoiture`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idVoiture`),
  ADD UNIQUE KEY `numeroSequence` (`numeroSequence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `idContrat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idVoiture` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `fk_contrat_reservation` FOREIGN KEY (`idReservation`) REFERENCES `reservation` (`idReservation`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`idVoiture`) REFERENCES `voiture` (`idVoiture`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
