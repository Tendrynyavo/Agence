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
  type varchar(10) DEFAULT NULL,
  nbChambre int DEFAULT NULL,
  photoface varchar(10) DEFAULT NULL,
  loyer decimal(10,2) DEFAULT NULL,
  quartier varchar(15) DEFAULT NULL,
  description text DEFAULT NULL,
  dispo int DEFAULT NULL  
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

--
-- Contenu de la table `user`
--

CREATE TABLE utilisateur (
  idUser SERIAL primary key,
  nom varchar(10) DEFAULT NULL,
  prenom varchar(10) DEFAULT NULL,
  email varchar(10) DEFAULT NULL,
  mdp varchar(10) DEFAULT NULL,
  numTel varchar(10) DEFAULT NULL,
  sudo int DEFAULT NULL
);