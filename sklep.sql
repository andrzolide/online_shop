-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Wrz 2019, 02:36
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `id_ojca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `id_ojca`) VALUES
(1, 'kategorie', 1),
(4, 'laptopy', 1),
(5, 'komputery', 1),
(6, 'telefony', 1),
(7, 'tablety', 1),
(8, 'DELL', 4),
(9, 'LENOVO', 4),
(10, 'HP', 4),
(11, 'ASUS', 4),
(12, 'SAMSUNG', 6),
(13, 'XIAOMI', 6),
(14, 'APPLE', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `cena` float NOT NULL,
  `nazwa` text NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `cena`, `nazwa`, `id_kategorii`) VALUES
(1, 899, 'Xiaomi Redmi Note 7', 13),
(2, 3350, 'HP OMEN 15,7 4GB SSD', 10),
(3, 4099, 'LENOVO thinkpad 8GB SSD', 9),
(4, 5300, 'HP OMEN 17 16GB I7', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `drewno` int(11) NOT NULL,
  `kamien` int(11) NOT NULL,
  `zboze` int(11) NOT NULL,
  `dnipremium` int(11) NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `drewno`, `kamien`, `zboze`, `dnipremium`, `adres`) VALUES
(1, 'adam', 'qwerty', 'adam@gmail.com', 213, 5675, 342, 0, 'andrzeja boboli 8'),
(2, 'marek', 'asdfg', 'marek@gmail.com', 324, 1123, 4325, 15, ''),
(3, 'anna', 'zxcvb', 'anna@gmail.com', 4536, 17, 120, 25, ''),
(4, 'andrzej', 'asdfg', 'andrzej@gmail.com', 5465, 132, 189, 0, ''),
(5, 'justyna', 'yuiop', 'justyna@gmail.com', 245, 890, 554, 0, ''),
(6, 'kasia', 'hjkkl', 'kasia@gmail.com', 267, 980, 109, 12, ''),
(7, 'beata', 'fgthj', 'beata@gmail.com', 565, 356, 447, 77, ''),
(8, 'jakub', 'ertyu', 'jakub@gmail.com', 2467, 557, 876, 0, ''),
(9, 'janusz', 'cvbnm', 'janusz@gmail.com', 65, 456, 2467, 0, ''),
(10, 'roman', 'dfghj', 'roman@gmail.com', 97, 226, 245, 23, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `data` date NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_klienta`, `data`, `adres`) VALUES
(1, 1, '2019-09-07', ''),
(2, 1, '2019-09-07', 'adam'),
(3, 1, '2019-09-07', 'adam'),
(4, 1, '2019-09-07', 'adam'),
(5, 1, '2019-09-07', 'adam');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ojca` (`id_ojca`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `kategorie_ibfk_1` FOREIGN KEY (`id_ojca`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
