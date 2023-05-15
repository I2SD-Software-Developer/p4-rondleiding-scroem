-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 mei 2023 om 11:31
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanmelding`
--

CREATE TABLE `aanmelding` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tijd` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aanmelding`
--

INSERT INTO `aanmelding` (`id`, `naam`, `email`, `tijd`) VALUES
(17, 'bryan asanovic', 'bryan@gmail.com', '9-15'),
(18, 'lars heubach', 'lars@gmail.com', '9-15');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
