-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 16. 12:02
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `oye5kg`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejegyzesek`
--

CREATE TABLE `bejegyzesek` (
  `ID` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `Text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `bejegyzesek`
--

INSERT INTO `bejegyzesek` (`ID`, `fname`, `Text`) VALUES
(18, 'blogger', 'bejegyzes 1'),
(19, 'blogger', 'bejegyzes 2'),
(20, 'blogger', 'bejegyzes 3'),
(21, 'blogger', 'bejegyzes 3');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
