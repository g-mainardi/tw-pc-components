-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 25, 2022 alle 14:40
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hd_progetto`
--
CREATE DATABASE IF NOT EXISTS `hd_progetto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hd_progetto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE IF NOT EXISTS `articolo` (
  `ID_Articolo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `descrizione` text NOT NULL,
  `anteprima` text NOT NULL,
  `img` text NOT NULL,
  `prezzo` float NOT NULL,
  `marca` text NOT NULL,
  `quantità` int(11) NOT NULL,
  `venditore` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipologia` enum('NVidia','AMD','Intel') DEFAULT NULL,
  PRIMARY KEY (`ID_Articolo`),
  KEY `venditore` (`venditore`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE IF NOT EXISTS `carrello` (
  `ID_Carrello` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Articolo` int(11) NOT NULL,
  `quantità` int(11) NOT NULL,
  PRIMARY KEY (`ID_Carrello`),
  KEY `ID_Cliente` (`ID_Cliente`,`ID_Articolo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `nome_esposizione` text NOT NULL,
  `descrizione` text NOT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE IF NOT EXISTS `notifica` (
  `ID_Notifica` int(11) NOT NULL AUTO_INCREMENT,
  `utente` int(11) NOT NULL,
  `ordine` int(11) DEFAULT NULL,
  `titolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `stato` enum('read','not read','not read on screen') NOT NULL DEFAULT 'not read on screen',
  PRIMARY KEY (`ID_Notifica`),
  KEY `utente` (`utente`,`ordine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE IF NOT EXISTS `ordine` (
  `ID_Ordine` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Articolo` int(11) NOT NULL,
  `stato` enum('loading','shipped','delivered') DEFAULT 'loading',
  PRIMARY KEY (`ID_Ordine`),
  KEY `ID_Carrello` (`ID_Articolo`),
  KEY `ID_Cliente` (`ID_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `ID_Utente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `Tipo` text NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`ID_Utente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
