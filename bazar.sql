-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 10:28 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `status` enum('dostępny','niedostępny') DEFAULT 'dostępny',
  `user_id` int(11) DEFAULT NULL,
  `data_dodania` datetime DEFAULT current_timestamp(),
  `zdjecie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `cena`, `status`, `user_id`, `data_dodania`, `zdjecie`) VALUES
(1, 'Laptop Dell', 'Laptop do pracy biurowej', 3500.00, 'dostępny', 1, '2026-04-15 17:56:44', 'https://upload.cdn.baselinker.com/products/1002042/acd999498d8f4b6bc523b8af3b531a37.jpg'),
(2, 'Telefon Samsung', 'Smartfon z dobrym aparatem', 2200.00, 'dostępny', 2, '2026-04-15 17:56:44', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQiHu6B2f9iPifGkpSRaKcyDMZ2pZRI8iAZBZw49WTKg7EIBXsvnx2VIXACafKgzFrdClI3mgF1_knEmA_sYPsy_eq_5cUXEITAbPsU-2s9vN3hNOxltZ2upN3Pp8Fhsf7T-9TFx3v1&usqp=CAc'),
(3, 'Słuchawki Sony', 'Bezprzewodowe słuchawki', 500.00, 'dostępny', 1, '2026-04-15 17:56:44', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToXVsQkpLbPlc4WX57iAkYO0o8UIQb8wFb0g&s'),
(4, 'Monitor LG', 'Monitor 24 cale', 800.00, 'niedostępny', 3, '2026-04-15 17:56:44', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTSYrBAaaMRIVwWNzGTIjnQCvvXzCIU2POKElyrLqhvBERycoASeSM-D5DhcAsJZio-MIgkr9UClN7rAdf_qgqzcgy1IZCxf-jOV9Xkg5Z4Nnmvi0wkNYn_yXUnZhRA525xGERSLYn3xg&usqp=CAc'),
(23, 'Kompas', 'Kompasuje', 670.00, 'niedostępny', 13, '2026-04-15 22:05:19', 'https://img.freepik.com/darmowe-wektory/klasyczna-ilustracja-wektorowa-kompasu-z-metalicznym-wykonczeniem_1308-182114.jpg?semt=ais_hybrid&w=740&q=80');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `avatar`) VALUES
(1, 'jan123', 'haslo123', 'jan@gmail.com', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'),
(2, 'ania456', 'haslo456', 'ania@gmail.com', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'),
(3, 'marek789', 'haslo789', 'marek@gmail.com', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'),
(13, 'Alan', '$2y$10$JGyvg./oL67SJqAGBYUt5.DNH27soRo.9XPjNv4CuTQY6GxjWAppy', 'przykladowy_mail@przyklad.pl', 'https://i.pinimg.com/736x/51/5a/2e/515a2e67455fb87529bf28a442a19388.jpg'),
(16, 'Piotrek', '$2y$10$c4VFRoiZXVPCyun2gZB8t.MOU.wK8vGhv1O/N.c2QSSYcE8B05xGG', 'przykladowy_mail1@przyklad.pl', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'),
(17, 'kuba1234', '$2y$10$aDE3Iq.jR5QHA/Z1T6CdjuuCH/IY22iu1BZhzFikHQxuhf8tNtMme', 'email@1234.pl', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'),
(18, 'Tomek', '$2y$10$kpXflzlwlO9VH31fJy5AbuLsyZTlSDBXSnVzMquYmuYp/ubWxW5ki', 'aaaa@int.pl', 'https://i.pinimg.com/736x/4b/e7/39/4be739f047c056ec53b3f4d6ab0eb6fa.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `id` int(11) NOT NULL,
  `produkt_id` int(11) DEFAULT NULL,
  `kupujacy_id` int(11) DEFAULT NULL,
  `data_zakupu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakupy`
--

INSERT INTO `zakupy` (`id`, `produkt_id`, `kupujacy_id`, `data_zakupu`) VALUES
(1, 1, 2, '2026-04-15 17:56:50'),
(2, 2, 1, '2026-04-15 17:56:50'),
(3, 3, 3, '2026-04-15 17:56:50'),
(4, 1, 3, '2026-04-15 17:56:50');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produkt_id` (`produkt_id`),
  ADD KEY `kupujacy_id` (`kupujacy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`produkt_id`) REFERENCES `produkty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`kupujacy_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
