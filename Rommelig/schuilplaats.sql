-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 nov 2025 om 23:47
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
(8, '2025-10-26', 'Tineke van der Leeden', 'Strijdt op je knieën', 'uploads/audio/2025-10-26.mp3'),
(9, '2025-11-02', 'Medhat Mouri', 'Waarom ben je hier?', 'uploads/audio/2025-11-02.mp3'),
(12, '2025-11-16', 'Jaime Quevedo Klein Haneveld', 'Doopdienst, verhoogde slang', 'uploads/audio/2025-11-16.mp3');

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
(7, '2025-11-30', '10:00 - 10:30 Kidspraise | 1ste advent', '10:30:00', 'Anton Oelermans', 'Tineke van der Leeden'),
(13, '2025-12-07', 'Avondmaal | 2de advent', '10:00:00', 'Willem-Peter', 'Rienkje'),
(14, '2025-12-14', '3de advent', '10:00:00', 'Rienkje', 'Willem-Peter');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(3, 70643023142901224, 'Joah Admin', '$2y$10$p3ZBM0DYQSFrVeKn0XnDE.i0rQPYr8PfRwt9TfoEdbbFdnHewrO.K', '2025-11-02 16:30:01');

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
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `sermons`
--
ALTER TABLE `sermons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
