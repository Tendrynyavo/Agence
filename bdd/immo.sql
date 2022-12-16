-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 18 Mai 2022 à 06:55
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Agence immobilière`
--

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE type (
  idType SERIAL primary key,
  nom varchar(15) DEFAULT NULL
); 

--
-- Structure de la table `habitation`
--

CREATE TABLE habitation (
  idHabitation SERIAL primary key,
  nom varchar(20) DEFAULT NULL,
  idType int DEFAULT NULL,
  nbChambre int DEFAULT NULL,
  photoface varchar(30) DEFAULT NULL,
  loyer decimal(10,2) DEFAULT NULL,
  quartier varchar(15) DEFAULT NULL,
  description text DEFAULT NULL,
  FOREIGN KEY (idType) REFERENCES type(idType)
); 

--
-- Contenu de la table `photo`
--

CREATE TABLE photo (
  idPhoto SERIAL primary key,
  idHabitation int DEFAULT NULL,
  nom varchar(10) DEFAULT NULL,
  FOREIGN KEY (idHabitation) REFERENCES habitation(idHabitation)
);

--0
-- Contenu de la table `user`
--

CREATE TABLE utilisateur (
  idUser SERIAL primary key,
  nomUser varchar(10) DEFAULT NULL,
  email varchar(30) DEFAULT NULL,
  mdp varchar(10) DEFAULT NULL,
  numTel varchar(15) DEFAULT NULL,
  sudo int DEFAULT NULL
);

--
-- Contenu de la table `reservation`
--

CREATE TABLE reservation (
  idReserv SERIAL primary key,
  idUser int DEFAULT NULL,
  idHabitation int DEFAULT NULL,
  arrivee date DEFAULT NULL,
  depart date DEFAULT NULL,
  FOREIGN KEY (idUser) REFERENCES utilisateur(idUser),
  FOREIGN KEY (idHabitation) REFERENCES habitation(idHabitation)
);

CREATE VIEW dispo AS
  SELECT * FROM habitation WHERE idHabitation not in (SELECT idHabitation FROM reservation);

INSERT INTO utilisateur (nomUser, email, mdp, numTel, sudo) VALUES
('Boss', 'boss@yahoo.com', 'Rbnb', '034 99 999 99', 1),
('Jean', 'jean@gmail.com', '12345', '034 00 000 00', 0),
('Jeanne', 'jean@gmail.com', '54321', '034 00 000 01', 0),
('Bob', 'bob@gmail.com', 'stone', '034 00 000 02', 0),
('Micheal', 'mike@jaimail.com', 'basketball', '034 00 000 03', 0),
('Robert', 'robert@hotmail.com', 'picnic', '034 00 000 04', 0),
('4646popo', 'popo4646@gmail.com', 'ok', '034 00 000 05', 1),
('Tendry', 'tendry@gmail.com', 'TATA_BE', '034 00 000 06', 1);

INSERT INTO type (nom) VALUES
('appartement'),
('maison'),
('studio');

INSERT INTO habitation (nom, idType, nbChambre, photoface, loyer, quartier, description) VALUES
('Centurion', 2, 1, 'Centurion/ext.png', 180, 'South Africa', '2 voyageurs, 1 lit, salle de bain et 1 toilette'),
('Kigali', 1, 3, 'Kigali/ext.png', 150, 'South Africa', '3 voyageurs, 3 lits, grand jardin, salle de bain et 1 toilette'),
('Nairobi', 1, 4, 'Nairobi/ext.png', 175.25, 'Nigeria', '5 voyageurs, 5 lits, piscine, salle de bain et toilette'),
('Chez Helene', 1, 4, 'Chez Helene/ext.png', 64, 'Nigeria', '4 voyageurs, 1 chambre, 3 lits, 1 salle de bain'),
('Stellenbosh', 3, 3, 'Stellenbosh/ext.png', 80, 'South Africa', '3 voyageurs, 3 lits, grand jardin, salle de bain et 1 toilette');

INSERT INTO reservation (idUser, idHabitation, arrivee, depart) VALUES
(8, 1, '2022-12-16', '2022-12-23'),
(7, 2, '2022-12-22', '2022-12-30'),
(4, 3, '2022-12-17', '2023-1-30');

INSERT INTO photo (idHabitation, nom) VALUES
(1, 'bath.png'),
(1, 'bed.png'),
(1, 'rest.png'),
(2, 'bath.png'),
(2, 'bed.png'),
(2, 'rest.png'),
(3, 'bath.png'),
(3, 'bed.png'),
(3, 'rest.png'),
(4, 'bath.png'),
(4, 'bed.png'),
(4, 'rest.png'),
(5, 'bath.png'),
(5, 'bed.png'),
(5, 'rest.png');


