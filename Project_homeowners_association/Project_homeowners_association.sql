-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 18. Mrz 2018 um 21:51
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Project_homeowners_association`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dragana`
--

CREATE TABLE `dragana` (
  `hause_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `hausnumber` int(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `dragana`
--

INSERT INTO `dragana` (`hause_id`, `image`, `address`, `hausnumber`, `size`) VALUES
(1, 'https://cdn.houseplans.com/product/o2d2ui14afb1sov3cnslpummre/w1024.jpg?v=15', 'Wiener Strasse', 123, '180 m2'),
(2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgA1h2JI8EBjH3yr9tCMREPDYsqbyluKlc23B5ishk65UVhcN9fQ', 'Prager Strasse', 1, '175 m2'),
(3, 'https://images.adsttc.com/media/images/59a4/c624/b22e/389d/3e00/02a3/newsletter/MHA.JR_201708_038.jpg?1503970808', 'Münchener Strasse', 345, '220 m2'),
(4, 'http://www.porterdavis.com.au/~/media/homes/waldorf%20l/facades/beaumaris.jpg?w=380&h=253&crop=1', 'Zürcher Strasse', 234, '240 m2'),
(5, 'http://www.whitneymcnally.com/wp-content/uploads/2018/02/house-design-architects-best-25-house-architecture-ideas-on-pinterest-architecture-beach-interior-designs.jpg', 'Pariser Strasse', 21, '130 m2'),
(6, 'https://cdn.vox-cdn.com/thumbor/vxsMZpQ3E1hhPwh_s_raemp3QR4=/0x34:4256x2162/fit-in/1200x600/cdn.vox-cdn.com/uploads/chorus_asset/file/10058511/Flex_House_Exterior_6_13_17.jpg', 'Madrider Strasse', 98, '105 m2'),
(7, 'http://eistplus.com/images/Chic-Rich-Houses-with-Pool.jpg', 'Londoner Strasse', 1, '240 m2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `grundbuch`
--

CREATE TABLE `grundbuch` (
  `id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `hausnumber` int(100) NOT NULL,
  `size` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `grundbuch`
--

INSERT INTO `grundbuch` (`id`, `address`, `hausnumber`, `size`) VALUES
(1, 'ramprstorfergasse', 21, 105),
(2, 'ramperstorfergasse', 22, 110),
(3, 'ramperstorfergasse', 23, 112),
(4, 'herzgasse79', 38, 62),
(5, 'herzgasse79', 39, 60),
(6, 'herzgasse79', 40, 52);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `house`
--

CREATE TABLE `house` (
  `hause_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `fk_grund_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `house`
--

INSERT INTO `house` (`hause_id`, `image`, `fk_grund_id`) VALUES
(1, 'https://i.ytimg.com/vi/Xx6t0gmQ_Tw/maxresdefault.jpg', 1),
(2, 'https://upload.wikimedia.org/wikipedia/commons/9/96/Vasskertentrance.jpg', 2),
(3, 'https://cdn.trendir.com/wp-content/uploads/2016/06/Modern-house-in-Auckland-New-Zealand.jpg', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `image` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `number-of-rel` int(55) NOT NULL,
  `can-vot` int(1) NOT NULL,
  `fk_house_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `owners`
--

INSERT INTO `owners` (`id`, `name`, `lastname`, `image`, `birthdate`, `phone`, `address`, `type`, `number-of-rel`, `can-vot`, `fk_house_id`) VALUES
(1, 'John', 'Doe', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '1987-01-03', 688960011, 'rampers-12', '', 5, 1, 1),
(2, 'Man2', 'Muster2', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-01', 123456, 'rampers-22', '', 2, 1, 2),
(3, 'Man3', 'Muster3', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-02', 1234568, 'rampers-23', '', 3, 1, 3),
(4, 'Man4', 'Muster4', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-03', 12345698, 'herzgasse-38', '', 4, 1, 4),
(5, 'Man5', 'Muster5', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-05', 2156489, 'herzgasse-39', '', 5, 1, 5),
(6, 'Man6', 'Muster6', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-08', 12345687, 'herzgasse-40', '', 6, 1, 6),
(7, 'Man7', 'Muster7', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-09', 987456, 'bla-25', '', 7, 1, 7),
(8, 'Man8', 'Muster8', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-14', 546123, 'bla-22', '', 8, 1, 8),
(9, 'Man9', 'Muster9', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-07', 3548985, 'esmagasse-55', '', 9, 1, 9),
(10, 'Man10', 'Muster10', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-29', 369258, 'esmagasse-78', '', 10, 1, 10),
(11, 'Man11', 'Muster11', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-28', 147852, 'mahtabgasse-12', '', 11, 1, 11),
(12, 'Man12', 'Muster12', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-28', 852123, 'mahtabgasse-65', '', 12, 1, 12),
(13, 'Man13', 'Muster13', 'http://iphone-tricks.de/files/2017/02/selfies-spiegeln-4.jpg', '2018-03-31', 3691598, 'mahtabgasse-21', '', 13, 1, 13);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `active` int(1) NOT NULL,
  `likes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `renters`
--

CREATE TABLE `renters` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(55) NOT NULL,
  `address` varchar(200) NOT NULL,
  `can-vot` int(1) NOT NULL,
  `can-propose` int(1) NOT NULL,
  `can-comment` int(1) NOT NULL,
  `can-see-nach` int(1) NOT NULL,
  `fk_hause_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `renters`
--

INSERT INTO `renters` (`id`, `name`, `lastname`, `birthdate`, `phone`, `address`, `can-vot`, `can-propose`, `can-comment`, `can-see-nach`, `fk_hause_id`) VALUES
(0, 'maxima', 'maxima', '1983-06-18', 2555728, 'Maxima Strasse 123, Wien', 1, 1, 1, 1, 1),
(1, 'maxim', 'max', '1989-02-06', 68896325, 'ramperstorfergasse', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `usertype`) VALUES
(1, 'esmat', 'admin@admin.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', ''),
(2, 'DRAGAN', 'DRAGAN@DRAGAN.COM', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1'),
(3, 'DRAGANA', 'DRAGANA@DRAGANA.COM', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `grundbuch`
--
ALTER TABLE `grundbuch`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`hause_id`),
  ADD KEY `fk_grund_id` (`fk_grund_id`);

--
-- Indizes für die Tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_posts_id` (`fk_posts_id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `likes_id` (`likes_id`);

--
-- Indizes für die Tabelle `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hause_id` (`fk_hause_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`fk_grund_id`) REFERENCES `grundbuch` (`id`),
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`fk_grund_id`) REFERENCES `grundbuch` (`id`);

--
-- Constraints der Tabelle `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`fk_posts_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints der Tabelle `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`likes_id`) REFERENCES `likes` (`likes_id`);

--
-- Constraints der Tabelle `renters`
--
ALTER TABLE `renters`
  ADD CONSTRAINT `renters_ibfk_1` FOREIGN KEY (`fk_hause_id`) REFERENCES `house` (`hause_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
