-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 okt 2025 om 19:13
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schuilplaats`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sermons`
--

CREATE TABLE `sermons` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `file` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `sermons`
--

INSERT INTO `sermons` (`id`, `date`, `name`, `title`, `file`) VALUES
(1, '2025-10-19', 'Paul Bos', 'ont-dekken', 'uploads/audio/2025-10-19.mp3'),
(2, '2025-10-12', 'Ben Schot', 'Er zijn geen verloren zaken', 'uploads/audio/2025-10-12.mp3'),
(3, '2025-10-05', 'Willem-Peter', 'Israël en de Gemeente', 'uploads/audio/2025-10-05.mp3'),
(4, '2025-09-28', 'Jaime Quevedo Klein Haneveld', 'Smetvrees', 'uploads/audio/2025-9-28.mp3'),
(5, '2025-09-21', 'Arie de Paauw', 'Hell is echt', 'uploads/audio/2025-9-21.mp3'),
(6, '2025-09-07', 'Jaime Quevedo Klein Haneveld', 'Genade', 'uploads/audio/2025-9-7.mp3'),
(8, '2025-10-26', 'Tineke van der Leeden', 'Strijdt op je knieën', 'uploads/audio/2025-10-26.mp3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `special_occasion` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `elder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `services`
--

INSERT INTO `services` (`id`, `date`, `special_occasion`, `time`, `speaker`, `elder`) VALUES
(1, '2025-10-19', '', '10:00:00', 'Paul Bos', 'Tineke'),
(2, '2025-10-26', '10:00 - 10:30 Kidspraise', '10:30:00', 'Tineke van der Leeden', 'Charles Petit'),
(3, '2025-11-02', '', '10:00:00', 'Medhat Mouri', 'Jaime Quevedo Klein Haneveld'),
(4, '2025-11-09', '', '10:00:00', 'Theo', 'Willem-Peter'),
(5, '2025-11-16', 'Doopdienst!', '10:00:00', 'Charles Petit', 'Rienkje'),
(6, '2025-11-23', '', '10:00:00', 'Jaime Quevedo Klein Haneveld', 'Arjan van der Giessen'),
(7, '2025-11-30', '10:00 - 10:30 Kidspraise | 1ste advent', '10:30:00', 'Anton Oelermans', 'Tineke van der Leeden');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `sermons`
--
ALTER TABLE `sermons`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `sermons`
--
ALTER TABLE `sermons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
