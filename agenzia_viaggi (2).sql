-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 16, 2024 alle 09:54
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenzia_viaggi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `codice_fiscale` varchar(16) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `via` varchar(50) DEFAULT NULL,
  `numero_civico` int(11) DEFAULT NULL,
  `citta` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `numero_telefono` varchar(12) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`codice_fiscale`, `nome`, `cognome`, `via`, `numero_civico`, `citta`, `provincia`, `numero_telefono`, `email`, `password`) VALUES
('111111111111', 'mozza', 'mozza', 'mozz', 22, 'mozza', 'mozza', '333444444444', 'mozza@mozza.it', '$2y$10$sXR0xlH2aEnwpDYEthIbceu3UvAS.btDsYTQpMij.GhgrOfT36q4e'),
('CF12345678901234', 'Mario', 'Rossi', 'Via Roma', 10, 'Roma', 'RM', '3331234567', 'mario@email.com', '$2y$10$QGmZ6WKUxYGyEYRHgMOrTerAMCx56/ZEqM/eeLy2kMD5Q9RZwDsWy'),
('CF23456789012345', 'Anna', 'Russo', 'Viale Kennedy', 5, 'Palermo', 'PA', '3332345678', 'anna@email.com', '$2y$10$QGmZ6WKUxYGyEYRHgMOrTerAMCx56/ZEqM/eeLy2kMD5Q9RZwDsWy'),
('CF45678901234567', 'Luigi', 'Verdi', 'Corso Italia', 15, 'Napoli', 'NA', '3335678901', 'luigi@email.com', '$2y$10$QGmZ6WKUxYGyEYRHgMOrTerAMCx56/ZEqM/eeLy2kMD5Q9RZwDsWy'),
('CF78901234567890', 'Paolo', 'Ferrari', 'Piazza Garibaldi', 30, 'Torino', 'TO', '3336789012', 'paolo@email.com', '$2y$10$QGmZ6WKUxYGyEYRHgMOrTerAMCx56/ZEqM/eeLy2kMD5Q9RZwDsWy'),
('CF98765432109876', 'Giulia', 'Bianchi', 'Via Verdi', 20, 'Milano', 'MI', '3337654321', 'giulia@email.com', '$2y$10$QGmZ6WKUxYGyEYRHgMOrTerAMCx56/ZEqM/eeLy2kMD5Q9RZwDsWy');

-- --------------------------------------------------------

--
-- Struttura della tabella `destinazioni`
--

CREATE TABLE `destinazioni` (
  `id_viaggio` int(11) NOT NULL,
  `destinazione` varchar(50) NOT NULL,
  `mezzo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `destinazioni`
--

INSERT INTO `destinazioni` (`id_viaggio`, `destinazione`, `mezzo`) VALUES
(1, 'Londra', 'Treno'),
(1, 'Parigi', 'Aereo'),
(2, 'Los Angeles', 'Nave'),
(2, 'New York', 'Aereo'),
(3, 'Tokyo', 'Aereo');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id_prenotazione` int(11) NOT NULL,
  `data_partenza` date DEFAULT NULL,
  `data_ritorno` date DEFAULT NULL,
  `cliente` varchar(16) DEFAULT NULL,
  `viaggio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id_prenotazione`, `data_partenza`, `data_ritorno`, `cliente`, `viaggio`) VALUES
(1, '2024-05-15', '2024-05-20', 'CF12345678901234', 1),
(2, '2024-06-10', '2024-06-20', 'CF98765432109876', 2),
(3, '2024-07-05', '2024-07-15', 'CF45678901234567', 3),
(4, '2024-08-20', '2024-08-30', 'CF23456789012345', 1),
(5, '2024-09-15', '2024-09-25', 'CF78901234567890', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `id_viaggio` int(11) NOT NULL,
  `partenza` varchar(60) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `tipo_sistemazione` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`id_viaggio`, `partenza`, `costo`, `tipo_sistemazione`) VALUES
(1, 'Roma', 500, 'Hotel'),
(2, 'Milano', 800, 'Appartamento'),
(3, 'Napoli', 600, 'Hotel'),
(4, 'Palermo', 700, 'Appartamento'),
(5, 'Torino', 550, 'Hotel');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codice_fiscale`);

--
-- Indici per le tabelle `destinazioni`
--
ALTER TABLE `destinazioni`
  ADD PRIMARY KEY (`id_viaggio`,`destinazione`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id_prenotazione`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `viaggio` (`viaggio`);

--
-- Indici per le tabelle `viaggio`
--
ALTER TABLE `viaggio`
  ADD PRIMARY KEY (`id_viaggio`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `viaggio`
--
ALTER TABLE `viaggio`
  MODIFY `id_viaggio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `destinazioni`
--
ALTER TABLE `destinazioni`
  ADD CONSTRAINT `destinazione` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggio` (`id_viaggio`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`codice_fiscale`),
  ADD CONSTRAINT `viaggio` FOREIGN KEY (`viaggio`) REFERENCES `viaggio` (`id_viaggio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
