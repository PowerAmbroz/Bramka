-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Kwi 2016, 23:26
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
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `ID_kontakt` int(11) NOT NULL,
  `ID_Wykladowcy` int(11) NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `Grupa` text COLLATE utf8_polish_ci NOT NULL,
  `Telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kontakty`
--

INSERT INTO `kontakty` (`ID_kontakt`, `ID_Wykladowcy`, `Imie`, `Nazwisko`, `Grupa`, `Telefon`) VALUES
(364, 2, 'PaweÅ‚', 'Anders', '115NCI', 999111888),
(375, 1, 'zzz', 'zzz', '123', 111111111),
(376, 1, 'aaa', 'aaa', '111', 222222222),
(377, 1, 'ooo', 'ooo', 'ooo', 656565),
(378, 1, 'bbb', 'bbb', 'bbb', 123234525),
(379, 1, 'qqq', 'qqq', 'qqq', 445544333),
(380, 1, 'sss', 'sss', 'sss', 445544333),
(381, 1, 'eee', 'eee', 'eee', 445544333),
(382, 1, 'sbs', 'sss', 'sss', 666778980),
(383, 1, 'Jacek', 'Placek', '123NCI', 666999888),
(386, 1, 'eee', 'eee', 'eee', 445544333),
(387, 1, 'sbs', 'sss', 'sss', 666778980),
(388, 1, 'Mariusz', 'Rogalek', '123NCI', 123456789),
(389, 1, 'Simi', 'Relot', '67', 777888777),
(390, 1, 'Andrzej', 'Gural', '123NCI', 444444444);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`ID_kontakt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `ID_kontakt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
