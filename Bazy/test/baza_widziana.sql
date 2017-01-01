-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Mar 2016, 19:09
-- Wersja serwera: 10.0.17-MariaDB
-- Wersja PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_widziana`
--

CREATE TABLE `baza_widziana` (
  `ID_Bazy` int(11) NOT NULL,
  `ID_wykładowcy` int(11) NOT NULL,
  `ID_studenci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_widziana`
--

INSERT INTO `baza_widziana` (`ID_Bazy`, `ID_wykładowcy`, `ID_studenci`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `baza_widziana`
--
ALTER TABLE `baza_widziana`
  ADD PRIMARY KEY (`ID_Bazy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `baza_widziana`
--
ALTER TABLE `baza_widziana`
  MODIFY `ID_Bazy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
