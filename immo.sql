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
-- Base de données :  `taxi be corportation
--

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

CREATE TABLE habitation (
  idHabitation SERIAL primary key,
  nom varchar(15) DEFAULT NULL,
  type varchar(10) DEFAULT NULL,
  nbChambre int DEFAULT NULL,
  photoface varchar(10) DEFAULT NULL,
  loyer decimal(10,2) DEFAULT NULL,
  quartier varchar(15) DEFAULT NULL,
  description text DEFAULT NULL
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

INSERT INTO utilisateur (nomUser, email, mdp, numTel, sudo) VALUES
('Boss', 'boss@yahoo.com', 'Rbnb', '034 99 999 99', 1),
('Jean', 'jean@gmail.com', '12345', '034 00 000 00', 0),
('Jeanne', 'jean@gmail.com', '54321', '034 00 000 01', 0),
('Bob', 'bob@gmail.com', 'stone', '034 00 000 02', 0),
('Micheal', 'mike@jaimail.com', 'basketball', '034 00 000 03', 0),
('Robert', 'robert@hotmail.com', 'picnic', '034 00 000 04', 0),
('4646popo', 'popo4646@gmail.com', 'ok', '034 00 000 05', 0),
('Tendry', 'tendry@gmail.com', 'TATA_BE', '034 00 000 06', 0);

INSERT INTO habitation (nom, type, nbChambre, photoface, loyer, quartier, description) VALUES
('Dioses', 'villa', 4, 'Diosas.jpg', 10000, 'chai po', 'Belle villa'),
('Booboo', 'maison', 4, 'Booboo.jpg', 8000, 'Maliboo', 'Belle maison'),
('Joshua', 'studio', 4, 'Josh.jpg', 4575.25, 'Brooklyn', 'Beau studio');

INSERT INTO reservation (idUser, idHabitation, arrivee, depart) VALUES
(8, 1, '2022-12-16', '2022-12-23'),
(7, 2, '2022-12-22', '2022-12-30'),
(4, 3, '2022-12-17', '2023-1-30');

