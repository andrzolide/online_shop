-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2019 at 01:00 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finish`
--

-- --------------------------------------------------------

--
-- Table structure for table `dostawcy`
--

CREATE TABLE `dostawcy` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `adres` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dostawcy_produkty`
--

CREATE TABLE `dostawcy_produkty` (
  `id_dostawcy` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `czas_dostawy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `id_ojca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategorie`
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
-- Table structure for table `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `funkcja` text COLLATE utf8_polish_ci NOT NULL,
  `domyslny_adres` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `email`, `funkcja`, `domyslny_adres`) VALUES
(1, 'Adam', 'Nowak', 'a_nowak', 'haslo', 'a_nowak@wp.pl', 'klient', ''),
(2, 'Piotr', 'Kowalski', 'kowalsky', 'qwerty', 'p_kow@wp.pl', 'klient', 'lubelska 5/5, Warszawa 22-500'),
(3, 'Mateusz', 'Kot', 'mati', 'magazyn', 'mkmkmk@o2.pl', 'magazynier', 'woronicza 6/44, Kraków 34-213'),
(4, 'Szymon', 'Kasprzak', 'szymekk', 'asdfghjkl', 'szkas@gmail.com', 'klient', ''),
(5, 'Daniel', 'Andrzej', 'da1998', 'has1234', 'daniel@wp.pl', 'klient', ''),
(7, 'Jan', 'Kowal', 'jan_kowal_a', 'jkjkjkjkjk', 'jk222@wp.pl', 'magazynier', '');

-- --------------------------------------------------------

--
-- Table structure for table `parametry`
--

CREATE TABLE `parametry` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `parametry`
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
(130, 'Rodzaj pamięci', 18),
(131, 'Pojemność całkowita', 18),
(132, 'Taktowanie', 18),
(133, 'Napięcie', 18),
(136, 'Rodzaj', 19),
(137, 'Pojemność', 19),
(138, 'Format', 19),
(139, 'Interfejs', 19),
(140, 'Prędkość odczytu (maksymalna)', 19),
(141, 'Prędkość zapisu (maksymalna)', 19),
(142, 'Wysokość', 19),
(143, 'Szerokość', 19),
(144, 'Głębokość', 19),
(147, 'Moc maksymalna', 20),
(148, 'Standard', 20),
(149, 'Złącza', 20),
(150, 'Sprawność', 20),
(151, 'Certyfikat', 20),
(152, 'Średnica wentylatora', 20),
(153, 'Wysokość', 20),
(154, 'Szerokość', 20),
(155, 'Głębokość', 20),
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
(196, 'Rodzaj zestawu', 26),
(197, 'Moc głośników', 26),
(198, 'Moc subwoofera', 26),
(199, 'Waga', 26),
(202, 'Technologia druku', 27),
(203, 'Obsługiwane formaty papieru', 27),
(204, 'Podajnik papieru', 27),
(205, 'Szybkość druku w mono', 27),
(206, 'Waga', 27),
(207, 'Głębokość', 27),
(208, 'Szerokość', 27),
(209, 'Wysokość', 27),
(212, 'Konstrukcja', 28),
(213, 'Średnica membrany', 28),
(214, 'Pasmo przenoszenia', 28),
(215, 'Czułość', 28),
(216, 'Wbudowany mikrofon', 28),
(217, 'Złącze', 28),
(218, 'Dodatkowe informacje', 28),
(219, 'Długość kabla', 28),
(220, 'Waga', 28),
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
-- Table structure for table `parametry_produkty`
--

CREATE TABLE `parametry_produkty` (
  `id_parametru` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `wartosc` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `parametry_produkty`
--

INSERT INTO `parametry_produkty` (`id_parametru`, `id_produktu`, `wartosc`) VALUES
(172, 1, 'Dla graczy'),
(173, 1, 'Przewodowa'),
(174, 1, 'Optyczny'),
(175, 1, '7200 dpi'),
(176, 1, '6'),
(177, 1, 'USB'),
(178, 1, '2 m'),
(179, 1, '121 mm'),
(180, 1, '58 mm'),
(181, 1, '38 mm'),
(172, 2, 'Klasyczna'),
(173, 2, 'Bezprzewodowa'),
(174, 2, 'Optyczny'),
(175, 2, '1000 dpi'),
(176, 2, '3'),
(177, 2, 'USB'),
(177, 2, '2,4 GHz'),
(178, 2, 'brak'),
(179, 2, '99 mm'),
(180, 2, '60 mm'),
(181, 2, '39 mm'),
(172, 3, 'Klasyczna'),
(173, 3, 'Bezprzewodowa'),
(174, 3, 'Optyczny'),
(175, 3, '1600 dpi'),
(176, 3, '3'),
(177, 3, '2,4 GHz'),
(178, 3, 'brak'),
(179, 3, '90 mm'),
(180, 3, '70 mm'),
(181, 3, '38 mm'),
(184, 4, 'Klasyczna'),
(185, 4, 'Przewodowa'),
(186, 4, 'USB'),
(187, 4, '90'),
(188, 4, 'nie'),
(189, 4, '1,5 m'),
(190, 4, 'Odporność na zachlapanie'),
(191, 4, '450 mm'),
(192, 4, '155 mm'),
(193, 4, '23 mm'),
(184, 5, 'Dla graczy'),
(185, 5, 'Przewodowa'),
(186, 5, 'USB'),
(187, 5, '87'),
(188, 5, 'Wielokolorowe'),
(189, 5, '1,8 m'),
(190, 5, 'Klawiatura mechaniczna'),
(191, 5, '430 mm'),
(192, 5, '155 mm'),
(193, 5, '23 mm'),
(4, 6, 'Intel Core i5-8250U (4 rdzenie, od 1.6 GHz do 3.4 GHz, 6MB cache)'),
(5, 6, '8 GB (SO-DIMM DDR4, 2133MHz)'),
(6, 6, 'HDD SATA 5400 obr. 1000 GB'),
(7, 6, 'Matowy, LED'),
(8, 6, '15,6\"'),
(9, 6, '1920 x 1080 (FullHD)'),
(10, 6, 'Intel UHD Graphics 620'),
(11, 6, '1.0 Mpix'),
(12, 6, 'USB 3.1 Gen. 1 (USB 3.0) - 2 szt.'),
(12, 6, 'HDMI - 1 szt.'),
(12, 6, 'RJ-45 (LAN) - 1 szt.'),
(13, 6, '2-komorowa, 3968 mAh, Li-Ion'),
(14, 6, 'Microsoft Windows 10 Home PL (wersja 64-bitowa)'),
(15, 6, '22,9 mm'),
(16, 6, '378 mm'),
(17, 6, '260 mm'),
(18, 6, '2,20 kg (z baterią)'),
(20, 6, 'Wielodotykowy, intuicyjny touchpad'),
(4, 7, 'AMD Ryzen 5 2500U (4 rdzenie, od 2.0 GHz do 3.6 GHz, 4 MB cache)'),
(5, 7, '8 GB (SO-DIMM DDR4, 2666MHz)'),
(6, 7, 'SSD M.2 256 GB'),
(7, 7, 'Matowy, LED'),
(8, 7, '15,6\"'),
(9, 7, '1920 x 1080 (FullHD)'),
(10, 7, 'AMD Radeon Vega 8'),
(11, 7, '0.3 Mpix'),
(12, 7, 'USB 3.1 Gen. 1 (USB 3.0) - 3 szt.'),
(12, 7, 'HDMI - 1 szt.'),
(12, 7, 'RJ-45 (LAN) - 1 szt.'),
(13, 7, '2-komorowa, 4810 mAh, Li-Ion'),
(14, 7, 'Microsoft Windows 10 Home PL (wersja 64-bitowa)'),
(15, 7, '25,9 mm'),
(16, 7, '388 mm'),
(17, 7, '260 mm'),
(18, 7, '1,96 kg (z baterią)'),
(20, 7, 'Wielodotykowy, intuicyjny touchpad'),
(92, 8, 'AMD Ryzen'),
(93, 8, 'Ryzen 5 2600'),
(94, 8, 'Socket AM4'),
(95, 8, '3.4 GHz (3.9 GHz w trybie turbo)'),
(96, 8, '6 rdzeni'),
(97, 8, '12 wÄ…tkÃ³w'),
(98, 8, '19 MB'),
(99, 8, 'Brak'),
(100, 8, 'DDR4-2933 (PC4-23466)'),
(101, 8, '12 nm'),
(102, 8, '65 W'),
(92, 9, 'Intel Core i5'),
(93, 9, 'i5-9400F'),
(94, 9, 'Socket 1151'),
(95, 9, '2.9 GHz (4.1 GHz w trybie turbo)'),
(96, 9, '6 rdzeni'),
(97, 9, '6 wÄ…tkÃ³w'),
(98, 9, '9 MB'),
(99, 9, 'Brak'),
(100, 9, 'DDR4-2666 (PC4-21333)'),
(101, 9, '14 nm'),
(102, 9, '65 W'),
(92, 10, 'Intel Core i9'),
(93, 10, 'i9-9900K'),
(94, 10, 'Socket 1151'),
(95, 10, '3.6 GHz (5.0 GHz w trybie turbo)'),
(96, 10, '8 rdzeni'),
(97, 10, '16 wÄ…tkÃ³w'),
(98, 10, '16 MB'),
(99, 10, 'Intel UHD Graphics 630'),
(100, 10, 'DDR4-2666 (PC4-21333)'),
(101, 10, '14 nm'),
(102, 10, '95 W'),
(105, 11, 'GeForce RTX 2060'),
(106, 11, 'PCI-E x16 3.0'),
(107, 11, '6 GB'),
(108, 11, 'GDDR6'),
(109, 11, '192-bit'),
(110, 11, '14000 MHz'),
(111, 11, '1395 MHz (1785 MHz w trybie Boost)'),
(112, 11, 'Aktywne'),
(113, 11, 'HDMI - 2 szt.'),
(114, 11, '242 mm'),
(115, 11, '130 mm'),
(105, 12, 'Radeon RX 570'),
(106, 12, 'PCI-E x16 3.0'),
(107, 12, '4 GB'),
(108, 12, 'GDDR5'),
(109, 12, '256-bit'),
(110, 12, '7000 MHz'),
(111, 12, '1268 MHz'),
(112, 12, 'Aktywne'),
(113, 12, 'HDMI - 2 szt.'),
(114, 12, '242 mm'),
(115, 12, '130 mm'),
(105, 13, 'GeForce GTX 1660 Ti'),
(106, 13, 'PCI-E x16 3.0'),
(107, 13, '6 GB'),
(108, 13, 'GDDR6'),
(109, 13, '192-bit'),
(110, 13, '12000 MHz'),
(111, 13, '1800 MHz'),
(112, 13, 'Aktywne'),
(113, 13, 'HDMI - 2 szt.'),
(114, 13, '242 mm'),
(115, 13, '130 mm'),
(118, 14, 'Intel Core i9'),
(119, 14, 'Socket 1151 (Intel Core 8 i 9 gen.)'),
(120, 14, 'Intel Z390'),
(121, 14, 'DDR4-2666 MHz'),
(122, 14, 'DDR4-4266 MHz'),
(123, 14, '4 x DIMM'),
(124, 14, 'SATA III (6 Gb/s) - 6 szt.'),
(125, 14, 'RJ45 (LAN) - 1 szt.'),
(126, 14, '225 mm'),
(127, 14, '305 mm'),
(118, 15, 'AMD Ryzen'),
(119, 15, 'Socket AM4'),
(120, 15, 'AMD X570'),
(121, 15, 'DDR4-3200 MHz'),
(122, 15, 'DDR4-4400 MHz'),
(123, 15, '4 x DIMM'),
(124, 15, 'SATA III (6 Gb/s) - 6 szt.'),
(125, 15, 'HDMI - 1 szt.'),
(126, 15, '243 mm'),
(127, 15, '305 mm'),
(130, 16, 'DDR4'),
(131, 16, '16 GB (1x16 GB)'),
(132, 16, '3000 MHz (PC4-24000)'),
(133, 16, '1,2 V'),
(130, 17, 'DDR4'),
(131, 17, '8 GB (2x4 GB)'),
(132, 17, '3000 MHz (PC4-24000)'),
(133, 17, '1,35 V'),
(130, 18, 'DDR3 SODIMM'),
(131, 18, '8 GB (1x8 GB)'),
(132, 18, '1600 MHz (PC3-12800)'),
(133, 18, '1,35 V'),
(136, 19, 'SSD wewnÄ™trzny'),
(137, 19, '500 GB'),
(138, 19, '2.5\"'),
(139, 19, 'SATA III (6.0 Gb/s) - 1 szt.'),
(140, 19, '560 MB/s'),
(141, 19, '510 MB/s'),
(142, 19, '255 mm'),
(143, 19, '230 mm'),
(144, 19, '50 mm'),
(136, 20, 'SSD wewnÄ™trzny'),
(137, 20, '250 GB'),
(138, 20, '2.5\"'),
(139, 20, 'SATA III (6.0 Gb/s) - 1 szt.'),
(140, 20, '560 MB/s'),
(141, 20, '510 MB/s'),
(142, 20, '255 mm'),
(143, 20, '230 mm'),
(144, 20, '50 mm'),
(136, 21, 'HDD wewnÄ™trzny'),
(137, 21, '1000 GB'),
(138, 21, '3.5\"'),
(139, 21, 'SATA III (6.0 Gb/s) - 1 szt.'),
(140, 21, '160 MB/s'),
(141, 21, '110 MB/s'),
(142, 21, '26,1 mm'),
(143, 21, '101,6 mm'),
(144, 21, '147 mm'),
(147, 22, '500 W'),
(148, 22, 'ATX'),
(149, 22, 'CPU 4+4 (8) pin - 1 szt.'),
(150, 22, '87% przy 230V oraz 20-100% obciÄ…Å¼eniu.'),
(151, 22, '80 PLUS Bronze'),
(152, 22, '120 mm'),
(153, 22, '86 mm'),
(154, 22, '150 mm'),
(155, 22, '160 mm'),
(147, 23, '600 W'),
(148, 23, 'ATX'),
(149, 23, 'CPU 4+4 (8) pin - 1 szt.'),
(150, 23, '86-89% przy 230V oraz 20-100% obciÄ…Å¼eniu.'),
(151, 23, '80 PLUS Bronze'),
(152, 23, '120 mm'),
(153, 23, '86 mm'),
(154, 23, '150 mm'),
(155, 23, '140 mm'),
(147, 24, '550 W'),
(148, 24, 'ATX'),
(149, 24, 'CPU 4+4 (8) pin - 1 szt.'),
(150, 24, '90-92% przy 230V oraz 20-100% obciÄ…Å¼eniu.'),
(151, 24, '80 PLUS Gold'),
(152, 24, '120 mm'),
(153, 24, '86 mm'),
(154, 24, '150 mm'),
(155, 24, '140 mm'),
(158, 25, '23,8\"'),
(159, 25, 'Matowa'),
(160, 25, 'LED, IPS'),
(161, 25, '1920 x 1080 (FullHD)'),
(162, 25, '16:9'),
(163, 25, '75 Hz'),
(164, 25, 'HDMI - 2 szt.'),
(165, 25, '412 mm'),
(166, 25, '540 mm'),
(167, 25, '240 mm'),
(168, 25, 'Regulacja kÄ…ta pochylenia (Tilt)'),
(169, 25, 'Kabel VGA'),
(158, 26, '23,8\"'),
(159, 26, 'Matowa'),
(160, 26, 'LED, IPS'),
(161, 26, '1920 x 1080 (FullHD)'),
(162, 26, '16:9'),
(163, 26, '60 Hz'),
(164, 26, 'HDMI - 2 szt.'),
(165, 26, '412 mm'),
(166, 26, '540 mm'),
(167, 26, '240 mm'),
(168, 26, 'Regulacja kÄ…ta pochylenia (Tilt)'),
(169, 26, 'Kabel VGA'),
(158, 27, '24\"'),
(159, 27, 'Matowa'),
(160, 27, 'LED, TN'),
(161, 27, '1920 x 1080 (FullHD)'),
(162, 27, '16:9'),
(163, 27, '144 Hz'),
(164, 27, 'HDMI - 2 szt.'),
(165, 27, '412 mm'),
(166, 27, '540 mm'),
(167, 27, '240 mm'),
(168, 27, 'Regulacja kÄ…ta pochylenia (Tilt)'),
(169, 27, 'Kabel VGA'),
(172, 28, 'Klasyczna'),
(173, 28, 'Przewodowa'),
(174, 28, 'Optyczny'),
(175, 28, '1000 dpi'),
(176, 28, '3'),
(177, 28, '1'),
(178, 28, '1,8 m'),
(179, 28, '220 mm'),
(180, 28, '120 mm'),
(181, 28, '50 mm'),
(172, 29, 'Dla graczy'),
(173, 29, 'Przewodowa'),
(174, 29, 'Optyczny'),
(175, 29, '16000 dpi'),
(176, 29, '7'),
(177, 29, 'USB'),
(178, 29, '2,1 m'),
(179, 29, '127 mm'),
(180, 29, '70 mm'),
(181, 29, '44 mm'),
(172, 30, 'Multimedialna'),
(173, 30, 'Bezprzewodowa'),
(174, 30, 'Optyczny'),
(175, 30, '1600 dpi'),
(176, 30, '5'),
(177, 30, '2,4 GHz'),
(178, 30, 'brak'),
(179, 30, '127 mm'),
(180, 30, '120 mm'),
(181, 30, '44 mm'),
(184, 31, 'Mechaniczna'),
(185, 31, 'Przewodowa'),
(186, 31, 'USB'),
(187, 31, '104'),
(188, 31, 'Tak'),
(189, 31, '2 m'),
(190, 31, 'Niski profil klawiszy'),
(191, 31, '300 mm'),
(192, 31, '400 mm'),
(193, 31, '29 mm'),
(184, 32, 'Klasyczna'),
(185, 32, 'Przewodowa'),
(186, 32, 'USB'),
(187, 32, '104'),
(188, 32, 'Nie'),
(189, 32, '2 m'),
(190, 32, 'OdpornoÅ›Ä‡ na zachlapanie'),
(191, 32, '435 mm'),
(192, 32, '145 mm'),
(193, 32, '28 mm'),
(196, 33, '2.0'),
(197, 33, '10 W'),
(198, 33, 'brak'),
(199, 33, '1,0 kg'),
(196, 34, '2.1'),
(197, 34, '8 W'),
(198, 34, '24 W'),
(199, 34, '3,2 kg'),
(202, 35, 'Laserowa, monochromatyczna'),
(203, 35, 'Papier zwykÅ‚y'),
(204, 35, '150 arkuszy'),
(205, 35, '18 str./min'),
(206, 35, '3,8 kg'),
(207, 35, '189 mm'),
(208, 35, '346 mm'),
(209, 35, '159 mm'),
(202, 36, 'Laserowa, monochromatyczna'),
(203, 36, 'Papier zwykÅ‚y'),
(204, 36, '150 arkuszy'),
(205, 36, '18 str./min'),
(206, 36, '3,8 kg'),
(207, 36, '189 mm'),
(208, 36, '346 mm'),
(209, 36, '159 mm'),
(212, 37, 'Nauszne pÃ³Å‚otwarte'),
(213, 37, '32 mm'),
(214, 37, '20 ~ 20000 Hz'),
(215, 37, '105 dB'),
(216, 37, 'Tak'),
(217, 37, 'Minijack 3,5 mm - 1 szt.'),
(218, 37, 'Ruchomy mikrofon'),
(219, 37, '1,3 m'),
(220, 37, '245 g'),
(212, 38, 'Douszne'),
(213, 38, 'brak'),
(214, 38, 'brak informacji'),
(215, 38, 'brak informacji'),
(216, 38, 'Tak'),
(217, 38, 'brak'),
(218, 38, 'ModuÅ‚ Bluetooth'),
(219, 38, 'brak'),
(220, 38, '4 g (jedna sÅ‚uchawka)'),
(212, 39, 'Nauszne zamkniÄ™te'),
(213, 39, '40 mm'),
(214, 39, 'brak informacji'),
(215, 39, 'brak informacji'),
(216, 39, 'Tak'),
(217, 39, 'Minijack 3,5 mm - 1 szt.'),
(218, 39, 'Ruchomy mikrofon'),
(219, 39, '1,3 m'),
(220, 39, '245 g'),
(223, 40, 'Windows 10 Home'),
(224, 40, '64-bitowa'),
(225, 40, 'OEM'),
(226, 40, '1'),
(227, 40, '1'),
(228, 40, 'Polska'),
(229, 40, 'DVD'),
(223, 41, 'Windows 10 Pro'),
(224, 41, '64-bitowa'),
(225, 41, 'OEM'),
(226, 41, '1'),
(227, 41, '1'),
(228, 41, 'Polska'),
(229, 41, 'DVD'),
(240, 42, 'Office 365 Personal'),
(241, 42, '12 miesiÄ™cy'),
(242, 42, 'Polska'),
(243, 42, '1'),
(244, 42, 'Licencja z kluczem aktywacyjnym'),
(245, 42, 'Windows'),
(240, 43, 'Office 365 Home Premium'),
(241, 43, '12 miesiÄ™cy'),
(242, 43, 'Polska'),
(243, 43, '1'),
(244, 43, 'Licencja z kluczem aktywacyjnym'),
(245, 43, 'Windows'),
(231, 44, 'Norton Security'),
(232, 44, 'Wersja fizyczna'),
(233, 44, 'Nowa'),
(234, 44, '1'),
(235, 44, '1'),
(236, 44, '12 miesiÄ™cy'),
(237, 44, 'Polska'),
(238, 44, 'Windows'),
(231, 45, 'Kaspersky Anti-â€‹Virus'),
(232, 45, 'Wersja fizyczna'),
(233, 45, 'Nowa'),
(234, 45, '1'),
(235, 45, '1'),
(236, 45, '12 miesiÄ™cy'),
(237, 45, 'Polska'),
(238, 45, 'Windows'),
(4, 46, 'Intel Core i7-9750H (6 rdzeni, od 2.60 GHz do 4.50 GHz, 12 MB cache)'),
(5, 46, '16 GB (SO-DIMM DDR4, 2666MHz)'),
(6, 46, 'Dysk SSD M.2 PCIe 256 GB'),
(7, 46, 'Matowy, LED'),
(8, 46, '15,6\"'),
(9, 46, '1920 x 1080 (FullHD)'),
(10, 46, 'NVIDIA GeForce GTX 1660Ti'),
(11, 46, '1.0 Mpix'),
(12, 46, 'USB 3.1 Gen. 1 (USB 3.0) - 2 szt.'),
(13, 46, '6-komorowa, 4730 mAh, Li-Ion'),
(14, 46, 'Microsoft Windows 10 Home PL (wersja 64-bitowa)'),
(15, 46, '29,5 mm'),
(16, 46, '383 mm'),
(17, 46, '260 mm'),
(18, 46, '2,30 kg (z bateriÄ…)'),
(20, 46, 'PodÅ›wietlana klawiatura'),
(22, 47, 'Intel Pentium Gold 4415Y (2 rdzenie, 1.60 GHz, 2 MB cache)'),
(23, 47, '8 GB (SO-DIMM DDR3, 1600 MHz)'),
(24, 47, 'Dysk SSD M.2 128 GB'),
(25, 47, 'BÅ‚yszczÄ…cy, LED, dotykowy'),
(26, 47, '10\"'),
(27, 47, '1800 x 1200'),
(28, 47, 'Intel HD Graphics 615'),
(29, 47, '5.0 Mpix'),
(30, 47, 'USB Typu-C - 1 szt.'),
(31, 47, '3-komorowa, 4335 mAh, Li-Polymer'),
(32, 47, 'Microsoft Windows 10 w trybie S (wersja 64-bitowa)'),
(33, 47, '8,3 mm'),
(34, 47, '245 mm'),
(35, 47, '175 mm'),
(36, 47, '1 kg'),
(38, 47, 'Corning Gorilla Glass 3'),
(22, 48, 'Intel Core i5-8265U (4 rdzenie, od 1.6 GHz do 3.9 GHz, 6 MB cache)'),
(23, 48, '8 GB (SO-DIMM DDR3, 2133 MHz)'),
(24, 48, 'Dysk SSD M.2 PCIe 256 GB'),
(25, 48, 'BÅ‚yszczÄ…cy, LED, IPS, dotykowy'),
(26, 48, '13,3\"'),
(27, 48, '1920 x 1080 (FullHD)'),
(28, 48, 'Intel UHD Graphics 620'),
(29, 48, '1.0 Mpix'),
(30, 48, 'USB Typu-C - 1 szt.'),
(31, 48, '3-komorowa, 4335 mAh, Li-Polymer'),
(32, 48, 'Microsoft Windows 10 w trybie S (wersja 64-bitowa)'),
(33, 48, '8,3 mm'),
(34, 48, '245 mm'),
(35, 48, '175 mm'),
(36, 48, '1,28 kg (z bateriÄ…)'),
(38, 48, 'Aluminiowa obudowa'),
(40, 49, 'Intel Core i5-9400F (6 rdzeni, od 2.90 GHz do 4.10 GHz, 9 MB cache)'),
(41, 49, 'Intel B360'),
(42, 49, '16 GB (DIMM DDR4, 2666 MHz)'),
(43, 49, 'Dysk SSD M.2 240 GB'),
(44, 49, 'NVIDIA GeForce GTX 1660'),
(45, 49, 'USB 2.0 - 4 szt.'),
(46, 49, 'PCI-e x16 - 1 szt.'),
(47, 49, '500 W'),
(48, 49, 'Microsoft Windows 10 Home PL (wersja 64-bitowa)'),
(49, 49, '465 mm'),
(50, 49, '210 mm'),
(51, 49, '470 mm'),
(52, 49, '4 kg'),
(53, 49, 'Partycja recovery (opcja przywrÃ³cenia systemu z dysku)'),
(54, 49, 'Kabel zasilajÄ…cy'),
(40, 50, 'Intel Core i3-8100 (4 rdzenie, 3.60 GHz, 6 MB cache)'),
(41, 50, 'Intel B360'),
(42, 50, '8 GB (DIMM DDR4, 2400 MHz)'),
(43, 50, 'Dysk SSD M.2 240 GB'),
(44, 50, 'Intel UHD Graphics 630'),
(45, 50, 'USB 2.0 - 4 szt.'),
(46, 50, 'PCI-e x16 - 1 szt.'),
(47, 50, '500 W'),
(48, 50, 'Microsoft Windows 10 Pro PL (wersja 64-bitowa)'),
(49, 50, '465 mm'),
(50, 50, '210 mm'),
(51, 50, '470 mm'),
(52, 50, '5,1 kg'),
(53, 50, 'MoÅ¼liwoÅ›Ä‡ zabezpieczenia linkÄ… (port Kensington Lock)'),
(54, 50, 'Kabel zasilajÄ…cy'),
(57, 51, 'Intel Core i5-7400T (4 rdzenie, od 2.40 GHz do 3.0 GHz, 6 MB cache)'),
(58, 51, '8 GB (DIMM DDR4, 2400 MHz)'),
(59, 51, 'Dysk SSD M.2 256 GB'),
(60, 51, 'BÅ‚yszczÄ…cy, Dotykowy, LED, IPS'),
(61, 51, '23,8\"'),
(62, 51, '1920 x 1080 (FullHD)'),
(63, 51, 'Intel HD Graphics 620'),
(64, 51, '2.0 Mpix'),
(65, 51, 'USB 2.0 - 1 szt.'),
(66, 51, '90 W'),
(67, 51, 'Microsoft Windows 10 Home PL (wersja 64-bitowa)'),
(68, 51, '448 mm'),
(69, 51, '571 mm'),
(70, 51, '212 mm'),
(71, 51, '7,2 kg'),
(72, 51, 'MoÅ¼liwoÅ›Ä‡ zabezpieczenia linkÄ… (port Kensington Lock)'),
(73, 51, 'Zasilacz'),
(76, 52, 'Intel Core i5-8259U (4 rdzenie, od 2.30 GHz do 3.80 GHz, 6 MB cache)'),
(77, 52, '32 GB'),
(78, 52, 'MoÅ¼liwoÅ›Ä‡ montaÅ¼u dodatkowego dysku M.2 PCIe/SATA'),
(79, 52, 'Intel Iris Plus Graphics 655'),
(80, 52, 'USB 3.1 Gen. 2 - 2 szt.'),
(81, 52, 'KieszeÅ„ wewnÄ™trzna 2,5\" - 1 szt.'),
(82, 52, '90 W'),
(83, 52, 'Brak systemu'),
(84, 52, '51 mm'),
(85, 52, '117 mm'),
(86, 52, '112 mm'),
(87, 52, '0,58 kg'),
(88, 52, 'MoÅ¼liwoÅ›Ä‡ montaÅ¼u na Å›cianie - VESA 75 x 75 mm'),
(89, 52, 'Zasilacz'),
(76, 53, 'Intel Core i3-8109U (2 rdzenie, od 3.00 GHz do 3.60 GHz, 4 MB cache)'),
(77, 53, '32 GB'),
(78, 53, 'MoÅ¼liwoÅ›Ä‡ montaÅ¼u dodatkowego dysku M.2 PCIe/SATA'),
(79, 53, 'Intel Iris Plus Graphics 655'),
(80, 53, 'USB 3.1 Gen. 2 - 2 szt.'),
(81, 53, 'KieszeÅ„ wewnÄ™trzna 2,5\" - 1 szt.'),
(82, 53, '90 W'),
(83, 53, 'Brak systemu'),
(84, 53, '51 mm'),
(85, 53, '117 mm'),
(86, 53, '112 mm'),
(87, 53, '0,58 kg'),
(88, 53, 'MoÅ¼liwoÅ›Ä‡ montaÅ¼u na Å›cianie - VESA 75 x 75 mm'),
(89, 53, 'Zasilacz');

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `id_kategorii`) VALUES
(1, 'SteelSeries Rival 110', 139, 24),
(2, 'Logitech M185 niebieska', 59.99, 24),
(3, 'SHIRU Smart Mouse', 29.99, 24),
(4, 'Logitech K120 Keyboard czarna USB', 55, 25),
(5, 'SPC Gear GK530 Tournament Kailh Brown RGB', 199, 25),
(6, 'Lenovo Ideapad 330-15 i5-8250U/8GB/1TB/Win10', 2099, 32),
(7, 'Acer Aspire 3 Ryzen 5 2500U/8GB/256/Win10', 2149, 32),
(8, 'AMD Ryzen 5 2600', 589, 7),
(9, 'Intel i5-9400F', 669, 7),
(10, 'Intel i9-9900K', 2399, 7),
(11, 'ASUS GeForce RTX 2060 DUAL EVO OC 6GB GDDR6', 1659, 16),
(12, 'MSI Radeon RX 570 ARMOR OC 4GB GDDR5', 669, 16),
(13, 'Gigabyte GeForce GTX 1660 Ti OC 6GB GDDR6', 1279, 16),
(14, 'Gigabyte Z390 GAMING X', 599, 17),
(15, 'MSI MPG X570 GAMING PLUS', 739, 17),
(16, 'HyperX 16GB 3000MHz HyperX Predator CL15', 380, 18),
(17, 'Patriot 8GB 3000MHz Viper 4 CL16 (2x4GB)', 219, 18),
(18, 'GOODRAM 8GB 1600MHz 1.35V CL11', 139, 18),
(19, 'Crucial 500GB 2,5\" SATA SSD MX500', 299, 19),
(20, 'Crucial 250GB 2,5\" SATA SSD MX500', 199, 19),
(21, 'Toshiba P300 1TB 7200obr. 64MB OEM', 175, 19),
(22, 'SilentiumPC Vero L2 500W 80 Plus Bronze', 189, 20),
(23, 'be quiet! System Power 9 600W 80 Plus Bronze', 269, 20),
(24, 'Seasonic Focus Plus 550W 80 Plus Gold ', 389, 20),
(25, 'Acer Nitro VG240YBMIIX czarny', 559, 23),
(26, 'HP 24W', 399, 23),
(27, 'BenQ ZOWIE XL2411P czarny', 859, 23),
(28, 'Dell MS116 optyczna czarna USB', 39, 24),
(29, 'Razer DeathAdder Elite', 249, 24),
(30, 'ASUS WT465 (biaÅ‚a)', 59, 24),
(31, 'Corsair K70 Rapidfire MK.2 (Cherry MX Low Profile Speed)', 559, 25),
(32, 'SHIRU Klawiatura przewodowa', 29, 25),
(33, 'Logitech 2.0 Z200 czarne', 119, 26),
(34, 'Logitech 2.1 Z333', 199, 26),
(35, 'HP LaserJet Pro M15w', 259, 27),
(36, 'Brother HL-L2352DW', 409, 27),
(37, 'Razer Kraken Essential', 190, 28),
(38, 'Apple AirPods 2019', 730, 28),
(39, 'Jabra Move czerwony', 199, 28),
(40, 'Microsoft Windows 10 Home PL 64bit OEM DVD', 499, 29),
(41, 'Microsoft Windows 10 PRO PL 64bit OEM DVD ', 629, 29),
(42, 'Microsoft Office 365 Personal', 299, 30),
(43, 'Microsoft Office 365 Home ', 399, 30),
(44, 'Symantec Norton Antivirus Basic 1st. (12m.)', 59, 31),
(45, 'Kaspersky Anti-Virus 1st. (12m.)', 55, 31),
(46, 'MSI GL63 i7-9750H/16GB/256/Win10X GTX1660Ti 120Hz ', 5399, 32),
(47, 'Microsoft Surface Go 4415Y/8GB/128GB/W10S + 128GB', 2589, 33),
(48, 'ASUS ZenBook Flip UX362FA i5-8265U/8GB/256/W10 Blue', 3699, 33),
(49, 'x-kom G4M3R 500 i5-9400F/16GB/240/W10X/GTX1660', 4000, 34),
(50, 'Dell Vostro 3670 i3-8100/8GB/240/10Pro ', 2199, 34),
(51, 'Acer Aspire Z24 i5-7400T/8GB/256/DVD/W10 Touch', 2799, 35),
(52, 'Intel NUC i5-8259U 2.5\"SATA M.2 BOX', 1749, 36),
(53, 'Intel NUC i3-8109U M.2 BOX', 1239, 36);

-- --------------------------------------------------------

--
-- Table structure for table `produkty_pasujace`
--

CREATE TABLE `produkty_pasujace` (
  `id_produktu_1` int(11) NOT NULL,
  `id_produktu_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produkty_zestawy`
--

CREATE TABLE `produkty_zestawy` (
  `id_zestawu` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkty_zestawy`
--

INSERT INTO `produkty_zestawy` (`id_zestawu`, `id_produktu`) VALUES
(1, 40),
(1, 45),
(1, 42),
(2, 10),
(2, 11),
(2, 15),
(2, 16),
(2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `pr_bez_nr_seryjnego`
--

CREATE TABLE `pr_bez_nr_seryjnego` (
  `id_produktu` int(11) NOT NULL,
  `ilosc_w_magazynie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `pr_bez_nr_seryjnego`
--

INSERT INTO `pr_bez_nr_seryjnego` (`id_produktu`, `ilosc_w_magazynie`) VALUES
(1, 10),
(2, 22),
(3, 2),
(4, 12),
(5, 8),
(18, 6),
(16, 6),
(17, 2),
(28, 20),
(29, 14),
(30, 14),
(31, 14),
(32, 10),
(33, 4),
(34, 14),
(37, 4),
(39, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pr_bez_nr_seryjnego_zamowienia`
--

CREATE TABLE `pr_bez_nr_seryjnego_zamowienia` (
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pr_nr_seryjny`
--

CREATE TABLE `pr_nr_seryjny` (
  `nr_seryjny` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `id_zamowienia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `pr_nr_seryjny`
--

INSERT INTO `pr_nr_seryjny` (`nr_seryjny`, `id_produktu`, `id_zamowienia`) VALUES
(7795, 40, NULL),
(11225, 9, NULL),
(11265, 9, NULL),
(15225, 8, NULL),
(15525, 10, NULL),
(18000, 47, NULL),
(18995, 8, NULL),
(51235, 11, NULL),
(55435, 19, NULL),
(55595, 40, NULL),
(57780, 49, NULL),
(58875, 41, NULL),
(59995, 14, NULL),
(66525, 15, NULL),
(75335, 21, NULL),
(77525, 15, NULL),
(82275, 22, NULL),
(83275, 22, NULL),
(85234, 35, NULL),
(87775, 27, NULL),
(88885, 8, NULL),
(89995, 35, NULL),
(99765, 20, NULL),
(111145, 46, NULL),
(123225, 24, NULL),
(123455, 7, NULL),
(123555, 6, NULL),
(123556, 6, NULL),
(123557, 6, NULL),
(123558, 6, NULL),
(123570, 48, NULL),
(124455, 6, NULL),
(124555, 7, NULL),
(124665, 24, NULL),
(155555, 9, NULL),
(156325, 8, NULL),
(174315, 46, NULL),
(182680, 49, NULL),
(183990, 50, NULL),
(185499, 52, NULL),
(186344, 51, NULL),
(192870, 48, NULL),
(500075, 41, NULL),
(505575, 42, NULL),
(505775, 45, NULL),
(512225, 11, NULL),
(512335, 13, NULL),
(520005, 42, NULL),
(523475, 40, NULL),
(532255, 7, NULL),
(577775, 44, NULL),
(593375, 43, NULL),
(723535, 12, NULL),
(759935, 21, NULL),
(788525, 15, NULL),
(822720, 53, NULL),
(865575, 26, NULL),
(886665, 25, NULL),
(888885, 26, NULL),
(945905, 23, NULL),
(1354720, 53, NULL),
(1532345, 45, NULL),
(1568280, 49, NULL),
(1812680, 53, NULL),
(1854720, 50, NULL),
(1856660, 52, NULL),
(1882220, 51, NULL),
(18372340, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reklamacje`
--

CREATE TABLE `reklamacje` (
  `id` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu_bez_seryjnego` int(11) DEFAULT NULL,
  `nr_seryjny` int(11) DEFAULT NULL,
  `powod` text COLLATE utf8_polish_ci NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zamowienia`
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
-- Table structure for table `zestawy`
--

CREATE TABLE `zestawy` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `zestawy`
--

INSERT INTO `zestawy` (`id`, `nazwa`, `cena`) VALUES
(1, 'Zestaw oprogramowania', 750),
(2, 'Wiedzmin', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `zwroty`
--

CREATE TABLE `zwroty` (
  `id` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu_bez_seryjnego` int(11) DEFAULT NULL,
  `nr_seryjny` int(11) DEFAULT NULL,
  `powod` text COLLATE utf8_polish_ci NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dostawcy`
--
ALTER TABLE `dostawcy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dostawcy_produkty`
--
ALTER TABLE `dostawcy_produkty`
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_dostawcy` (`id_dostawcy`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ojca` (`id_ojca`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametry`
--
ALTER TABLE `parametry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `parametry_produkty`
--
ALTER TABLE `parametry_produkty`
  ADD KEY `id_parametru` (`id_parametru`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `produkty_pasujace`
--
ALTER TABLE `produkty_pasujace`
  ADD KEY `id_produktu_1` (`id_produktu_1`),
  ADD KEY `id_produktu_2` (`id_produktu_2`);

--
-- Indexes for table `produkty_zestawy`
--
ALTER TABLE `produkty_zestawy`
  ADD KEY `id_zestawu` (`id_zestawu`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indexes for table `pr_bez_nr_seryjnego`
--
ALTER TABLE `pr_bez_nr_seryjnego`
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indexes for table `pr_bez_nr_seryjnego_zamowienia`
--
ALTER TABLE `pr_bez_nr_seryjnego_zamowienia`
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_zamowienia` (`id_zamowienia`);

--
-- Indexes for table `pr_nr_seryjny`
--
ALTER TABLE `pr_nr_seryjny`
  ADD PRIMARY KEY (`nr_seryjny`) USING BTREE,
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_zamowienia` (`id_zamowienia`);

--
-- Indexes for table `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zamowienia` (`id_zamowienia`),
  ADD KEY `id_produktu` (`id_produktu_bez_seryjnego`),
  ADD KEY `nr_seryjny` (`nr_seryjny`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- Indexes for table `zestawy`
--
ALTER TABLE `zestawy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zwroty`
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
-- AUTO_INCREMENT for table `dostawcy`
--
ALTER TABLE `dostawcy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parametry`
--
ALTER TABLE `parametry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reklamacje`
--
ALTER TABLE `reklamacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zestawy`
--
ALTER TABLE `zestawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zwroty`
--
ALTER TABLE `zwroty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dostawcy_produkty`
--
ALTER TABLE `dostawcy_produkty`
  ADD CONSTRAINT `dostawcy_produkty_ibfk_1` FOREIGN KEY (`id_dostawcy`) REFERENCES `dostawcy` (`id`),
  ADD CONSTRAINT `dostawcy_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `kategorie_ibfk_1` FOREIGN KEY (`id_ojca`) REFERENCES `kategorie` (`id`);

--
-- Constraints for table `parametry`
--
ALTER TABLE `parametry`
  ADD CONSTRAINT `parametry_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`);

--
-- Constraints for table `parametry_produkty`
--
ALTER TABLE `parametry_produkty`
  ADD CONSTRAINT `parametry_produkty_ibfk_1` FOREIGN KEY (`id_parametru`) REFERENCES `parametry` (`id`),
  ADD CONSTRAINT `parametry_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id`);

--
-- Constraints for table `produkty_pasujace`
--
ALTER TABLE `produkty_pasujace`
  ADD CONSTRAINT `produkty_pasujace_ibfk_1` FOREIGN KEY (`id_produktu_1`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `produkty_pasujace_ibfk_2` FOREIGN KEY (`id_produktu_2`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `produkty_zestawy`
--
ALTER TABLE `produkty_zestawy`
  ADD CONSTRAINT `produkty_zestawy_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `produkty_zestawy_ibfk_2` FOREIGN KEY (`id_zestawu`) REFERENCES `zestawy` (`id`);

--
-- Constraints for table `pr_bez_nr_seryjnego`
--
ALTER TABLE `pr_bez_nr_seryjnego`
  ADD CONSTRAINT `pr_bez_nr_seryjnego_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `pr_bez_nr_seryjnego_zamowienia`
--
ALTER TABLE `pr_bez_nr_seryjnego_zamowienia`
  ADD CONSTRAINT `pr_bez_nr_seryjnego_zamowienia_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `pr_bez_nr_seryjnego_zamowienia_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `pr_bez_nr_seryjnego` (`id_produktu`);

--
-- Constraints for table `pr_nr_seryjny`
--
ALTER TABLE `pr_nr_seryjny`
  ADD CONSTRAINT `pr_nr_seryjny_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `pr_nr_seryjny_ibfk_2` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`);

--
-- Constraints for table `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD CONSTRAINT `reklamacje_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `reklamacje_ibfk_2` FOREIGN KEY (`id_produktu_bez_seryjnego`) REFERENCES `pr_bez_nr_seryjnego_zamowienia` (`id_produktu`),
  ADD CONSTRAINT `reklamacje_ibfk_3` FOREIGN KEY (`nr_seryjny`) REFERENCES `pr_nr_seryjny` (`nr_seryjny`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`);

--
-- Constraints for table `zwroty`
--
ALTER TABLE `zwroty`
  ADD CONSTRAINT `zwroty_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `zwroty_ibfk_3` FOREIGN KEY (`id_produktu_bez_seryjnego`) REFERENCES `pr_bez_nr_seryjnego_zamowienia` (`id_produktu`),
  ADD CONSTRAINT `zwroty_ibfk_4` FOREIGN KEY (`nr_seryjny`) REFERENCES `pr_nr_seryjny` (`nr_seryjny`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
