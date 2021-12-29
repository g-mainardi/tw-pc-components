-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 29, 2021 alle 13:52
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
-- --------------------------------------------------------

CREATE DATABASE hd_progetto

--
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
  `ID_Articolo` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descrizione` text NOT NULL,
  `anteprima` text NOT NULL,
  `img` text NOT NULL,
  `prezzo` float NOT NULL,
  `marca` text NOT NULL,
  `quantità` int(11) NOT NULL,
  `venditore` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipologia` enum('NVidia','AMD','Intel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`ID_Articolo`, `nome`, `descrizione`, `anteprima`, `img`, `prezzo`, `marca`, `quantità`, `venditore`, `categoria`, `tipologia`) VALUES
(1, 'RTX 3080', '', '', 'rtx3080.png', 1700, 'Gigabyte', 6, 1, 2, 'NVidia'),
(2, 'RTX 3070', '', '', 'rtx3070.png', 1100, 'Asus', 6, 11, 2, 'NVidia'),
(3, 'RTX 3060', '', '', 'rtx3060.png', 860, 'Gigabyte', 6, 1, 2, 'NVidia'),
(4, 'RTX 2080 super', '', '', 'rtx2080super.png', 800, 'MSI', 6, 9, 2, 'NVidia'),
(5, 'RTX 2070 super', '', '', 'rtx2070super.png', 760, 'Asus', 6, 11, 2, 'NVidia'),
(6, 'RTX 2060 super', '', '', 'rtx2060super.png', 700, 'MSI', 6, 9, 2, 'NVidia'),
(7, 'Radeon RX 6900 XT', '', '', 'rx6900.png', 1500, 'MSI', 6, 9, 2, 'AMD'),
(8, 'Radeon RX 6800 XT', '', '', 'rx6800.png', 1300, 'MSI', 6, 9, 2, 'AMD'),
(9, 'Radeon RX 6700 XT', '', '', 'rx6700.png', 900, 'Gigabyte', 6, 1, 2, 'AMD'),
(10, 'Radeon RX 6600 XT', '', '', 'rx6600.png', 650, 'Asus', 6, 11, 2, 'AMD'),
(11, 'Radeon RX 5700 XT', '', '', 'rx5700.png', 900, 'Gigabyte', 6, 1, 2, 'AMD'),
(12, 'Radeon RX 5600 XT', '', '', 'rx5600.png', 600, 'Asus', 6, 11, 2, 'AMD'),
(13, 'VENGEANCE 2x8 3600mhz', '', '', 'vengeance2x83600.png', 85, 'Corsair', 6, 4, 4, NULL),
(14, 'VENGEANCE 2x16 3600mhz', '', '', 'vengeance2x163600.png', 140, 'Corsair', 6, 4, 4, NULL),
(15, 'Ballistix 2x8 3200mhz', '', '', 'ballistix2x83200.png', 80, 'Crucial', 6, 5, 4, NULL),
(16, 'Ballistix 2x8 3600mhz', '', '', 'ballistix2x83600.png', 90, 'Crucial', 6, 5, 4, NULL),
(17, 'Core i7-11700K', '', '', 'i711700k.png', 330, 'Intel', 6, 3, 5, NULL),
(18, 'Core i5-12600K', '', '', 'i512600K.png', 350, 'Intel', 6, 3, 5, NULL),
(19, 'Core i9-12900K', '', '', 'i912900K.png', 700, 'Intel', 6, 3, 5, NULL),
(20, 'Core i9-11900K', '', '', 'i911900K.png', 500, 'Intel', 6, 3, 5, NULL),
(21, 'Core i5-11400', '', '', 'i511400.png', 200, 'Intel', 6, 3, 5, NULL),
(22, 'Ryzen 5 5600X', '', '', 'ryzen55600x.png', 320, 'AMD', 6, 2, 5, NULL),
(23, 'Ryzen 9 5950X', '', '', 'ryzen95950x.png', 750, 'AMD', 6, 2, 5, NULL),
(24, 'Ryzen 9 5900X', '', '', 'ryzen95900x.png', 520, 'AMD', 6, 2, 5, NULL),
(25, 'Ryzen 3 3300X', '', '', 'ryzen33300x.png', 280, 'AMD', 6, 2, 5, NULL),
(26, 'Ryzen 7 3700X', '', '', 'ryzen73700x.png', 320, 'AMD', 6, 2, 5, NULL),
(27, 'MasterLiquid ML240L V2', '', '', 'masterliquidML240LV2.png', 65, 'Cooler Master', 6, 6, 7, NULL),
(28, 'MasterLiquid ML360', '', '', 'masterliquidML360.png', 130, 'Cooler Master', 6, 6, 7, NULL),
(29, 'MasterLiquid 240', '', '', 'mastermiquid240.png', 70, 'Cooler Master', 6, 6, 7, NULL),
(30, 'NH-D15S', '', '', 'nhd15s.png', 90, 'Noctua', 6, 7, 7, NULL),
(31, 'NH-D15', '', '', 'nhd15.png', 100, 'Noctua', 6, 7, 7, NULL),
(32, 'NH-U12S', '', '', 'nhu12s.png', 70, 'Noctua', 6, 7, 7, NULL),
(33, 'Carbide Series SPEC-DELTA', '', '', 'carbidespecdelta.png', 80, 'Corsair', 6, 4, 6, NULL),
(34, 'iCUE 220T RGB Airflow', '', '', 'icue220tRGB.png', 110, 'Corsair', 6, 4, 6, NULL),
(35, 'iCUE 5000X RGB', '', '', 'icue5000xRGB.png', 200, 'Corsair', 6, 4, 6, NULL),
(36, 'MasterCase H500M', '', '', 'mastercaseh500m.png', 200, 'Cooler Master', 6, 6, 6, NULL),
(37, 'MasterBox MB511', '', '', 'masterboxmb511.png', 88, 'Cooler Master', 6, 6, 6, NULL),
(38, 'MasterBox Lite 5', '', '', 'masterboxlite5.png', 100, 'Cooler Master', 6, 6, 6, NULL),
(39, 'RM750x', '', '', 'rm700x.png', 150, 'Corsair', 6, 4, 3, NULL),
(40, 'CX450', '', '', 'cx450.png', 62, 'Corsair', 6, 4, 3, NULL),
(41, 'SE 530W', '', '', 'se530w.png', 55, 'Thermaltake', 6, 8, 3, NULL),
(42, 'BX1 RGB 750W', '', '', 'bx1RGB750w.png', 110, 'Thermaltake', 6, 8, 3, NULL),
(43, 'v750 gold 750W', '', '', 'v750gold.png', 115, 'Cooler Master', 6, 6, 3, NULL),
(44, 'MWE 700 700W', '', '', 'mwe700.png', 55, '', 6, 6, 3, NULL),
(45, 'Z690 Aorus Pro', '', '', 'z690aorus.png', 340, 'Gigabyte', 6, 1, 1, 'Intel'),
(46, 'ROG Maximus XIII Hero', '', '', 'rogmaximus.png', 362, 'Asus', 6, 11, 1, 'Intel'),
(47, 'Z590 Aorus Tachyon', '', '', 'z590aorus.png', 200, 'Gigabyte', 6, 1, 1, 'Intel'),
(48, 'Z490 Taichi', '', '', 'z490taichi.png', 420, 'ASRock', 6, 10, 1, 'Intel'),
(49, 'X299X Designare 10G', '', '', 'x299xdesignare', 640, '', 6, 1, 1, 'Intel'),
(50, 'ROG Strix B550-F', '', '', 'rogstrixb550.png', 200, 'Asus', 6, 11, 1, 'AMD'),
(51, 'X570 Aorus Ultra', '', '', 'x570aorus.png', 320, 'Gigabyte', 6, 1, 1, 'AMD'),
(52, 'X570 Gaming Plus', '', '', 'x570gaming.png', 180, 'MSI', 6, 9, 1, 'AMD'),
(53, 'X570-I Aorus', '', '', 'x570iaorus.png', 300, 'Gugabyte', 6, 1, 1, 'AMD'),
(54, 'TRX40 Taichi', '', '', 'trx40taichi.png', 620, 'ASRock', 6, 10, 1, 'AMD');

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `ID_Carrello` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Articolo` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `nome`) VALUES
(1, 'Motherboard'),
(2, 'GPU'),
(3, 'PSU'),
(4, 'RAM'),
(5, 'CPU'),
(6, 'Case'),
(7, 'Cooler');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `ID_Cliente` int(11) NOT NULL,
  `ID_Carrello` int(11) NOT NULL,
  `stato` enum('in esecuzione','spedito','consegnato') NOT NULL DEFAULT 'in esecuzione'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID_Utente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `Tipo` text NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID_Utente`, `nome`, `username`, `password`, `Tipo`) VALUES
(1, 'Gigabyte', 'gigabyte@venditore.com', 'gigabyte2022', 'venditore'),
(2, 'AMD', 'amd@venditore.com', 'amd2022', 'venditore'),
(3, 'Intel', 'intel@venditore.com', 'intel2022', 'venditore'),
(4, 'Corsair', 'corsair@venditore.com', 'corsair2022', 'venditore'),
(5, 'Crucial', 'crucial@venditore.com', 'crucial2022', 'venditore'),
(6, 'Cooler Master', 'coolermaster@venditore.com', 'coolermaster2022', 'venditore'),
(7, 'Noctua', 'noctua@venditore.com', 'noctua2022', 'venditore'),
(8, 'Thermaltake', 'thermaltake@venditore.com', 'thermaltake2022', 'venditore'),
(9, 'MSI', 'msi@venditore.com', 'msi2022', 'venditore'),
(10, 'ASRock', 'asrock@venditore.com', 'asrock2022', 'venditore'),
(11, 'Asus', 'asus@venditore.com', 'asus2022', 'venditore');

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
  MODIFY `ID_Articolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
