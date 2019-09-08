-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Wrz 2019, 12:23
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
-- Baza danych: `isk`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawcy`
--

CREATE TABLE `dostawcy` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `adres` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawcy_produkty`
--

CREATE TABLE `dostawcy_produkty` (
  `id_dostawcy` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `czas_dostawy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `id_ojca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `id_ojca`) VALUES
(1, 'Laptopy', NULL),
(2, 'Komputery stacjonarne', NULL),
(3, 'Podzespoły komputerowe', NULL),
(4, 'Urządzenia peryferyjne', NULL),
(6, 'Oprogramowanie', NULL),
(7, 'Procesory', 3),
(16, 'Karty graficzne', 3),
(17, 'Płyty główne', 3),
(18, 'Pamięć RAM', 3),
(19, 'Dyski twarde', 3),
(20, 'Zasilacze', 3),
(23, 'Monitory', 4),
(24, 'Myszki', 4),
(25, 'Klawiatury', 4),
(26, 'Głośniki', 4),
(27, 'Drukarki', 4),
(28, 'Słuchawki', 4),
(29, 'Systemy operacyjne', 6),
(30, 'Programy biurowe', 6),
(31, 'Programy antywirusowe', 6),
(32, 'Laptopy / Ultrabooki', 1),
(33, '2w1', 1),
(34, 'Stacjonarne', 2),
(35, 'All-in-one', 2),
(36, 'Mini PC i NUC', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `funkcja` text COLLATE utf8_polish_ci NOT NULL,
  `domyslny_adres` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry`
--

CREATE TABLE `parametry` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry`
--

INSERT INTO `parametry` (`id`, `nazwa`, `id_kategorii`) VALUES
(4, 'Procesor', 32),
(5, 'Pamięć RAM', 32),
(6, 'Dysk', 32),
(7, 'Typ ekranu', 32),
(8, 'Przekątna ekranu', 32),
(9, 'Rozdzielczość ekranu', 32),
(10, 'Karta graficzna', 32),
(11, 'Kamera internetowa', 32),
(12, 'Rodzaje wejść / wyjść', 32),
(13, 'Bateria', 32),
(14, 'Zainstalowany system operacyjny', 32),
(15, 'Wysokość', 32),
(16, 'Szerokość', 32),
(17, 'Głębokość', 32),
(18, 'Waga', 32),
(19, 'Gwarancja', 32),
(20, 'Dodatkowe informacje', 32),
(22, 'Procesor', 33),
(23, 'Pamięć RAM', 33),
(24, 'Dysk', 33),
(25, 'Typ ekranu', 33),
(26, 'Przekątna ekranu', 33),
(27, 'Rozdzielczość ekranu', 33),
(28, 'Karta graficzna', 33),
(29, 'Kamera internetowa', 33),
(30, 'Rodzaje wejść / wyjść', 33),
(31, 'Bateria', 33),
(32, 'Zainstalowany system operacyjny', 33),
(33, 'Wysokość', 33),
(34, 'Szerokość', 33),
(35, 'Głębokość', 33),
(36, 'Waga', 33),
(37, 'Gwarancja', 33),
(38, 'Dodatkowe informacje', 33),
(40, 'Procesor', 34),
(41, 'Chipset', 34),
(42, 'Pamięć RAM', 34),
(43, 'Dysk', 34),
(44, 'Karta graficzna', 34),
(45, 'Rodzaje wejść / wyjść', 34),
(46, 'Porty wewnętrzne (wolne)', 34),
(47, 'Zasilacz', 34),
(48, 'Zainstalowany system operacyjny', 34),
(49, 'Wysokość', 34),
(50, 'Szerokość', 34),
(51, 'Głębokość', 34),
(52, 'Waga', 34),
(53, 'Dodatkowe informacje', 34),
(54, 'Dołączone akcesoria', 34),
(55, 'Gwarancja', 34),
(57, 'Procesor', 35),
(58, 'Pamięć RAM', 35),
(59, 'Dysk', 35),
(60, 'Typ ekranu', 35),
(61, 'Przekątna ekranu', 35),
(62, 'Rozdzielczość ekranu', 35),
(63, 'Karta graficzna', 35),
(64, 'Kamera internetowa', 35),
(65, 'Rodzaje wejść / wyjść', 35),
(66, 'Zasilacz', 35),
(67, 'Zainstalowany system operacyjny', 35),
(68, 'Wysokość', 35),
(69, 'Szerokość', 35),
(70, 'Głębokość', 35),
(71, 'Waga', 35),
(72, 'Dodatkowe informacje', 35),
(73, 'Dołączone akcesoria', 35),
(74, 'Gwarancja', 35),
(76, 'Procesor', 36),
(77, 'Pamięć RAM', 36),
(78, 'Dysk', 36),
(79, 'Karta graficzna', 36),
(80, 'Rodzaje wejść / wyjść', 36),
(81, 'Porty wewnętrzne (wolne)', 36),
(82, 'Zasilacz', 36),
(83, 'Zainstalowany system operacyjny', 36),
(84, 'Wysokość', 36),
(85, 'Szerokość', 36),
(86, 'Głębokość', 36),
(87, 'Waga', 36),
(88, 'Dodatkowe informacje', 36),
(89, 'Dołączone akcesoria', 36),
(90, 'Gwarancja', 36),
(92, 'Rodzina', 7),
(93, 'Model', 7),
(94, 'Gniazdo (socket)', 7),
(95, 'Taktowanie rdzenia', 7),
(96, 'Liczba rdzeni fizycznych', 7),
(97, 'Liczba wątków', 7),
(98, 'Pamięć podręczna', 7),
(99, 'Zintegrowany układ graficzny', 7),
(100, 'Rodzaj obsługiwanej pamięci', 7),
(101, 'Technologia produkcji procesora', 7),
(102, 'Pobór mocy (TDP)', 7),
(103, 'Gwarancja', 7),
(105, 'Układ graficzny', 16),
(106, 'Rodzaj złącza', 16),
(107, 'Pamięć', 16),
(108, 'Rodzaj pamięci', 16),
(109, 'Szyna pamięci', 16),
(110, 'Taktowanie pamięci', 16),
(111, 'Taktowanie rdzenia', 16),
(112, 'Typ chłodzenia', 16),
(113, 'Rodzaje wyjść', 16),
(114, 'Szerokość', 16),
(115, 'Wysokość', 16),
(116, 'Gwarancja', 16),
(118, 'Obsługiwane rodziny procesorów', 17),
(119, 'Gniazdo procesora', 17),
(120, 'Chipset', 17),
(121, 'Typ obsługiwanej pamięci', 17),
(122, 'Typ obsługiwanej pamięci OC', 17),
(123, 'Ilość banków pamięci', 17),
(124, 'Wewnętrzne złącza', 17),
(125, 'Zewnętrzne złącza', 17),
(126, 'Szerokość', 17),
(127, 'Wysokość', 17),
(128, 'Gwarancja', 17),
(130, 'Rodzaj pamięci', 18),
(131, 'Pojemność całkowita', 18),
(132, 'Taktowanie', 18),
(133, 'Napięcie', 18),
(134, 'Gwarancja', 18),
(136, 'Rodzaj', 19),
(137, 'Pojemność', 19),
(138, 'Format', 19),
(139, 'Interfejs', 19),
(140, 'Prędkość odczytu (maksymalna)', 19),
(141, 'Prędkość zapisu (maksymalna)', 19),
(142, 'Wysokość', 19),
(143, 'Szerokość', 19),
(144, 'Głębokość', 19),
(145, 'Gwarancja', 19),
(147, 'Moc maksymalna', 20),
(148, 'Standard', 20),
(149, 'Złącza', 20),
(150, 'Sprawność', 20),
(151, 'Certyfikat', 20),
(152, 'Średnica wentylatora', 20),
(153, 'Wysokość', 20),
(154, 'Szerokość', 20),
(155, 'Głębokość', 20),
(156, 'Gwarancja', 20),
(158, 'Przekątna ekranu', 23),
(159, 'Powłoka matrycy', 23),
(160, 'Rodzaj matrycy', 23),
(161, 'Rozdzielczość ekranu', 23),
(162, 'Format ekranu', 23),
(163, 'Częstotliwość odświeżania ekranu', 23),
(164, 'Rodzaje wejść / wyjść', 23),
(165, 'Wysokość', 23),
(166, 'Szerokość', 23),
(167, 'Głębokość', 23),
(168, 'Dodatkowe informacje', 23),
(169, 'Dołączone akcesoria', 23),
(170, 'Gwarancja', 23),
(172, 'Typ', 24),
(173, 'Łączność', 24),
(174, 'Sensor', 24),
(175, 'Rozdzielczość', 24),
(176, 'Liczba przycisków', 24),
(177, 'Interfejs', 24),
(178, 'Długość przewodu', 24),
(179, 'Długość', 24),
(180, 'Szerokość', 24),
(181, 'Wysokość', 24),
(182, 'Gwarancja', 24),
(184, 'Typ', 25),
(185, 'Łączność', 25),
(186, 'Interfejs', 25),
(187, 'Liczba klawiszy', 25),
(188, 'Podświetlenie klawiszy', 25),
(189, 'Długość przewodu', 25),
(190, 'Dodatkowe informacje', 25),
(191, 'Długość', 25),
(192, 'Szerokość', 25),
(193, 'Wysokość', 25),
(194, 'Gwarancja', 25),
(196, 'Rodzaj zestawu', 26),
(197, 'Moc głośników', 26),
(198, 'Moc subwoofera', 26),
(199, 'Waga', 26),
(200, 'Gwarancja', 26),
(202, 'Technologia druku', 27),
(203, 'Obsługiwane formaty papieru', 27),
(204, 'Podajnik papieru', 27),
(205, 'Szybkość druku w mono', 27),
(206, 'Waga', 27),
(207, 'Głębokość', 27),
(208, 'Szerokość', 27),
(209, 'Wysokość', 27),
(210, 'Gwarancja', 27),
(212, 'Konstrukcja', 28),
(213, 'Średnica membrany', 28),
(214, 'Pasmo przenoszenia', 28),
(215, 'Czułość', 28),
(216, 'Wbudowany mikrofon', 28),
(217, 'Złącze', 28),
(218, 'Dodatkowe informacje', 28),
(219, 'Długość kabla', 28),
(220, 'Waga', 28),
(221, 'Gwarancja', 28),
(223, 'Wersja', 29),
(224, 'Architektura', 29),
(225, 'Licencja', 29),
(226, 'Liczba użytkowników', 29),
(227, 'Liczba stanowisk', 29),
(228, 'Wersja językowa', 29),
(229, 'Nośnik', 29),
(231, 'Rodzina', 31),
(232, 'Wersja produktu', 31),
(233, 'Licencja', 31),
(234, 'Liczba użytkowników', 31),
(235, 'Liczba stanowisk', 31),
(236, 'Okres licencji', 31),
(237, 'Wersja językowa', 31),
(238, 'Platforma', 31),
(240, 'Wersja', 30),
(241, 'Okres licencji', 30),
(242, 'Wersja językowa', 30),
(243, 'Liczba stanowisk', 30),
(244, 'Typ nośnika', 30),
(245, 'Platforma', 30);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry_produkty`
--

CREATE TABLE `parametry_produkty` (
  `id_parametru` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `wartość` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty_pasujace`
--

CREATE TABLE `produkty_pasujace` (
  `id_produktu_1` int(11) NOT NULL,
  `id_produktu_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty_zestawy`
--

CREATE TABLE `produkty_zestawy` (
  `id_zestawu` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pr_bez_nr_seryjnego`
--

CREATE TABLE `pr_bez_nr_seryjnego` (
  `id_produktu` int(11) NOT NULL,
  `ilosc_w_magazynie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pr_bez_nr_seryjnego_zamowienia`
--

CREATE TABLE `pr_bez_nr_seryjnego_zamowienia` (
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pr_nr_seryjny`
--

CREATE TABLE `pr_nr_seryjny` (
  `nr_seryjny` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `id_zamowienia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reklamacje`
--

CREATE TABLE `reklamacje` (
  `id` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu_bez_seryjnego` int(11) DEFAULT NULL,
  `nr_seryjny` int(11) DEFAULT NULL,
  `powod` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `data` date NOT NULL,
  `adres_dostawy` longtext COLLATE utf8_polish_ci NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zestawy`
--

CREATE TABLE `zestawy` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zwroty`
--

CREATE TABLE `zwroty` (
  `id` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu_bez_seryjnego` int(11) DEFAULT NULL,
  `nr_seryjny` int(11) DEFAULT NULL,
  `powod` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dostawcy`
--
ALTER TABLE `dostawcy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dostawcy_produkty`
--
ALTER TABLE `dostawcy_produkty`
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_dostawcy` (`id_dostawcy`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ojca` (`id_ojca`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `parametry`
--
ALTER TABLE `parametry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `parametry_produkty`
--
ALTER TABLE `parametry_produkty`
  ADD KEY `id_parametru` (`id_parametru`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `produkty_pasujace`
--
ALTER TABLE `produkty_pasujace`
  ADD KEY `id_produktu_1` (`id_produktu_1`),
  ADD KEY `id_produktu_2` (`id_produktu_2`);

--
-- Indeksy dla tabeli `produkty_zestawy`
--
ALTER TABLE `produkty_zestawy`
  ADD KEY `id_zestawu` (`id_zestawu`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `pr_bez_nr_seryjnego`
--
ALTER TABLE `pr_bez_nr_seryjnego`
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `pr_bez_nr_seryjnego_zamowienia`
--
ALTER TABLE `pr_bez_nr_seryjnego_zamowienia`
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_zamowienia` (`id_zamowienia`);

--
-- Indeksy dla tabeli `pr_nr_seryjny`
--
ALTER TABLE `pr_nr_seryjny`
  ADD UNIQUE KEY `nr_seryjny` (`nr_seryjny`),
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_zamowienia` (`id_zamowienia`);

--
-- Indeksy dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zamowienia` (`id_zamowienia`),
  ADD KEY `id_produktu` (`id_produktu_bez_seryjnego`),
  ADD KEY `nr_seryjny` (`nr_seryjny`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `zestawy`
--
ALTER TABLE `zestawy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zwroty`
--
ALTER TABLE `zwroty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zamowienia` (`id_zamowienia`),
  ADD KEY `id_produktu` (`id_produktu_bez_seryjnego`),
  ADD KEY `nr_seryjny` (`nr_seryjny`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dostawcy`
--
ALTER TABLE `dostawcy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `parametry`
--
ALTER TABLE `parametry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zestawy`
--
ALTER TABLE `zestawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zwroty`
--
ALTER TABLE `zwroty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dostawcy_produkty`
--
ALTER TABLE `dostawcy_produkty`
  ADD CONSTRAINT `dostawcy_produkty_ibfk_1` FOREIGN KEY (`id_dostawcy`) REFERENCES `dostawcy` (`id`),
  ADD CONSTRAINT `dostawcy_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Ograniczenia dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `kategorie_ibfk_1` FOREIGN KEY (`id_ojca`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `parametry`
--
ALTER TABLE `parametry`
  ADD CONSTRAINT `parametry_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `parametry_produkty`
--
ALTER TABLE `parametry_produkty`
  ADD CONSTRAINT `parametry_produkty_ibfk_1` FOREIGN KEY (`id_parametru`) REFERENCES `parametry` (`id`),
  ADD CONSTRAINT `parametry_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`);

--
-- Ograniczenia dla tabeli `produkty_pasujace`
--
ALTER TABLE `produkty_pasujace`
  ADD CONSTRAINT `produkty_pasujace_ibfk_1` FOREIGN KEY (`id_produktu_1`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `produkty_pasujace_ibfk_2` FOREIGN KEY (`id_produktu_2`) REFERENCES `produkty` (`id`);

--
-- Ograniczenia dla tabeli `produkty_zestawy`
--
ALTER TABLE `produkty_zestawy`
  ADD CONSTRAINT `produkty_zestawy_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `produkty_zestawy_ibfk_2` FOREIGN KEY (`id_zestawu`) REFERENCES `zestawy` (`id`);

--
-- Ograniczenia dla tabeli `pr_bez_nr_seryjnego`
--
ALTER TABLE `pr_bez_nr_seryjnego`
  ADD CONSTRAINT `pr_bez_nr_seryjnego_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Ograniczenia dla tabeli `pr_bez_nr_seryjnego_zamowienia`
--
ALTER TABLE `pr_bez_nr_seryjnego_zamowienia`
  ADD CONSTRAINT `pr_bez_nr_seryjnego_zamowienia_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `pr_bez_nr_seryjnego_zamowienia_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `pr_bez_nr_seryjnego` (`id_produktu`);

--
-- Ograniczenia dla tabeli `pr_nr_seryjny`
--
ALTER TABLE `pr_nr_seryjny`
  ADD CONSTRAINT `pr_nr_seryjny_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `pr_nr_seryjny_ibfk_2` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `pr_nr_seryjny_ibfk_3` FOREIGN KEY (`nr_seryjny`) REFERENCES `reklamacje` (`nr_seryjny`);

--
-- Ograniczenia dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD CONSTRAINT `reklamacje_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `reklamacje_ibfk_2` FOREIGN KEY (`id_produktu_bez_seryjnego`) REFERENCES `pr_bez_nr_seryjnego_zamowienia` (`id_produktu`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`);

--
-- Ograniczenia dla tabeli `zwroty`
--
ALTER TABLE `zwroty`
  ADD CONSTRAINT `zwroty_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `zwroty_ibfk_2` FOREIGN KEY (`nr_seryjny`) REFERENCES `pr_nr_seryjny` (`nr_seryjny`),
  ADD CONSTRAINT `zwroty_ibfk_3` FOREIGN KEY (`id_produktu_bez_seryjnego`) REFERENCES `pr_bez_nr_seryjnego_zamowienia` (`id_produktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
