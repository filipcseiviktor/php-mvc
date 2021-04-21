-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 21. 11:35
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `myproject`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `advertisements`
--

INSERT INTO `advertisements` (`id`, `userid`, `title`) VALUES
(6, 3, 'Franklite antique ceiling and wall lights'),
(7, 3, 'Astro Mashiko 500 wall light'),
(8, 3, 'TV wall mounting'),
(9, 3, 'UP & Cover Garage Door'),
(10, 3, 'Chandelier 3 sets'),
(11, 4, 'Viking electric hybrid bike'),
(12, 4, 'WALT DISNEY DVD'),
(13, 4, 'Carrera blast bicycle'),
(14, 4, 'Hybrid Pushchair'),
(15, 4, 'Givenchy Gym bag'),
(16, 5, 'Trek Mountain Bike'),
(17, 5, 'vintage Large Walnut Wood Table'),
(18, 5, 'Fishing equipment'),
(19, 5, '2x Pionerr CDJ 1000mk3'),
(20, 5, 'Viking electric hybrid bike'),
(21, 5, 'PS4 COD GAMES'),
(22, 5, 'Reduced small wooden side table'),
(23, 6, 'Very Lightweight aluminium wheelchair'),
(24, 6, 'Veron Large corner sofa'),
(25, 6, 'New Chain Bi Coloured Plastic chain'),
(26, 6, 'Solid wood kitchen dresser'),
(27, 6, 'Unit wooden'),
(28, 6, 'PS4 COD GAMES'),
(29, 6, 'Boat project'),
(30, 2, 'Pionerr XDJ 700 DJ Deck'),
(31, 2, 'Scrap metal wanted free collection'),
(32, 2, 'Set of five copper saucepans'),
(33, 2, 'Rose gold iPhone 7'),
(34, 2, 'High end gaming PC'),
(35, 2, 'Antique book'),
(36, 1, 'Samsung Blu-Ray player'),
(37, 1, 'Hisense 65 inch 4k ultra smart HD TV'),
(38, 1, 'Top Model Book'),
(39, 1, 'Baby Bjorn Bouncer'),
(40, 1, 'Marvel Avengers character guide'),
(41, 1, 'Sony PlayStation 5 Bundle'),
(43, 8, 'fdfd   fd     fdf d  ');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'William'),
(2, 'John'),
(3, 'James'),
(4, 'Harper'),
(5, 'Evelyn'),
(6, 'Jackson'),
(8, 'dsfs f');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
