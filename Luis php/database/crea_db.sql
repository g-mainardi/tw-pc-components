-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 27, 2021 alle 18:28
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

CREATE DATABASE IF NOT EXISTS `hd_progetto` DEFAULT CHARACTER SET utf8 ;
USE `hd_progetto` ;

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE IF NOT EXISTS `articolo` (
  `ID_Articolo` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descrizione` text NOT NULL,
  `img` text NOT NULL,
  `prezzo` float NOT NULL,
  `marca` text NOT NULL,
  `quantità` int(11) NOT NULL,
  `venditore` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipologia` enum('NVidia','AMD','Intel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE IF NOT EXISTS `carrello` (
  `ID_Carrello` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Articolo` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE IF NOT EXISTS `ordine` (
  `ID_Cliente` int(11) NOT NULL,
  `ID_Carrello` int(11) NOT NULL,
  `stato` enum('in esecuzione','spedito','consegnato') NOT NULL DEFAULT 'in esecuzione'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `ID_Utente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `Tipo` text NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`ID_Articolo`),
  ADD KEY `venditore` (`venditore`),
  ADD KEY `categoria` (`categoria`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`ID_Carrello`),
  ADD KEY `ID_Cliente` (`ID_Cliente`,`ID_Articolo`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD KEY `ID_Carrello` (`ID_Carrello`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID_Utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articolo`
--
ALTER TABLE `articolo`
  MODIFY `ID_Articolo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;