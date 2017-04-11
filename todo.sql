-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2017, 23:13
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
`id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
`id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `labels`
--

INSERT INTO `labels` (`id`, `name`) VALUES
(1, 'Very important'),
(2, 'Definitelly must do that'),
(3, 'Better to do that'),
(4, 'Nice when done'),
(5, 'Not important');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
`id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lang`
--

INSERT INTO `lang` (`id`, `name`) VALUES
(1, 'english'),
(2, 'polish');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id`, `name`, `user_id`, `color_id`) VALUES
(2, '55555', 1, 1),
(3, 'Szybkie', 1, 1),
(4, 'tt3125312', 1, 1),
(5, '156116', 1, 1),
(6, 'damian', 4, 1),
(7, '521251', 5, 1),
(8, 'Magik', 6, 1),
(9, 'Oddaj projekt', 7, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `started_projects`
--

CREATE TABLE IF NOT EXISTS `started_projects` (
`id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `color_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `started_projects`
--

INSERT INTO `started_projects` (`id`, `name`, `color_id`) VALUES
(1, 'fast', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `project_id` int(11) DEFAULT NULL,
  `deadline` date NOT NULL,
  `label_id` int(11) DEFAULT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `project_id`, `deadline`, `label_id`, `done`) VALUES
(38, 'Zrób dump''a bazy!', 7, 9, '2017-04-11', 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
`id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `themes`
--

INSERT INTO `themes` (`id`, `name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `registered` date NOT NULL,
  `last_seen` date NOT NULL,
  `theme_id` int(11) NOT NULL DEFAULT '1',
  `points` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`, `email`, `registered`, `last_seen`, `theme_id`, `points`, `lang_id`) VALUES
(7, 'damian', 'damian urbanski', 'fe0b714aaecbd5c8961994c655d18a0d', '412@wp.pl', '2017-04-11', '2017-04-11', 1, 0, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `started_projects`
--
ALTER TABLE `started_projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `colors`
--
ALTER TABLE `colors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `labels`
--
ALTER TABLE `labels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `lang`
--
ALTER TABLE `lang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `started_projects`
--
ALTER TABLE `started_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT dla tabeli `themes`
--
ALTER TABLE `themes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
