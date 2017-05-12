-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 12 Maj 2017, 17:58
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.18-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `oopLogin`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `persmissions` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `persmissions`) VALUES
(1, 'Standard user', ''),
(2, 'Admin', '{\r\n\"admin\": 1\r\n\"moderator\": 1\r\n}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(16, 'Mateusz', 'edcb67d3bca503f12752ab741d3cbe058bc8ddb6acecb10e8ec97b55e46fba54', 'ÒñKlxØÝ¢‚´Ë</(‘_^y\ZõjYF¾tp°$H¿', 'Mateusz Wilczak', '2017-04-11 12:11:49', 2),
(17, 'Mateusz1', '75e7f6c8c9a934f739b8ce93ab3f9111e6de8429fed218aad6b99042afc56256', '58ecac304890f', 'mateusz', '2017-04-11 12:13:04', 1),
(18, 'Mateusz2', 'cf2eb46e9884975b0d5c2383780495a21ed2eb3ed74264828153d8a870b09a07', '58edeb83cd043', 'Mateusz ', '2017-04-12 10:55:31', 1),
(19, 'Mateusz3', '55c976edb97952964fe1e7484b798177ee2a4ca5669b03b5cc7770488541e64a', '$Oè*3Xjì¹T’f3œLÐæ³·ö‹,Œ}€ùë', 'Mateusz Wilczak', '2017-04-20 15:56:07', 1),
(20, 'Mateusz4', 'c12d953fc9b10e54b4e8141e773dec65adaae008e20bf674aa7a3d33c8aa4dd6', 'íœŽäÛv¨Ê$}ÑÝ-:2<ªvƒ!_Aš¹Of ', 'Mateusz Wilczak', '2017-04-20 16:16:38', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
