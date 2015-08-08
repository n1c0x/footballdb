-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2013 um 10:02
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `fussball_uebungen`
--
-- CREATE DATABASE IF NOT EXISTS `fussball_uebungen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `fussball_uebungen`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufstellung`
--

CREATE TABLE IF NOT EXISTS `aufstellung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aufstellung` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `aufstellung`
--

INSERT INTO `aufstellung` (`id`, `aufstellung`) VALUES
(1, '4 - 4 - 2 Standard'),
(2, '4 - 4 - 2 Raute'),
(3, '4 - 2 - 3 - 1'),
(4, '4 - 3 - 3'),
(5, '4 - 1 - 3 - 2'),
(6, '4 - 4 - 1 - 1'),
(7, '4 - 1 - 4 - 1'),
(8, '4 - 3 - 2 - 1 Tannenbaum');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufstellung_position`
--

CREATE TABLE IF NOT EXISTS `aufstellung_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Daten für Tabelle `aufstellung_position`
--

INSERT INTO `aufstellung_position` (`id`, `position`) VALUES
(1, 'a1'),
(2, 'a2'),
(3, 'a3'),
(4, 'a4'),
(5, 'a5'),
(6, 'b1'),
(7, 'b2'),
(8, 'b3'),
(9, 'b4'),
(10, 'b5'),
(11, 'c1'),
(12, 'c2'),
(13, 'c3'),
(14, 'c4'),
(15, 'c5'),
(16, 'd1'),
(17, 'd2'),
(18, 'd3'),
(19, 'd4'),
(20, 'd5'),
(21, 'e1'),
(22, 'e2'),
(23, 'e3'),
(24, 'e4'),
(25, 'e5'),
(26, 'f1'),
(27, 'f2'),
(28, 'f3'),
(29, 'f4'),
(30, 'f5'),
(31, 'g1'),
(32, 'g2'),
(33, 'g3'),
(34, 'g4'),
(35, 'g5'),
(36, 'h1'),
(37, 'h2'),
(38, 'h3'),
(39, 'h4'),
(40, 'h5');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gruppierung`
--

CREATE TABLE IF NOT EXISTS `gruppierung` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `gruppierung`
--

INSERT INTO `gruppierung` (`ID`, `name`) VALUES
(1, 'Einstimmen/Aufw&auml;rmen'),
(2, 'Hauptteil'),
(3, 'Schlu&szlig;teil');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `id_training_id_spieler`
--

CREATE TABLE IF NOT EXISTS `id_training_id_spieler` (
  `id_join_training_spieler` int(11) NOT NULL AUTO_INCREMENT,
  `id_training` int(11) NOT NULL,
  `id_spieler` int(11) NOT NULL,
  PRIMARY KEY (`id_join_training_spieler`),
  KEY `id_training` (`id_training`),
  KEY `id_training_2` (`id_training`),
  KEY `id_training_3` (`id_training`),
  KEY `id_spieler` (`id_spieler`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `id_training_id_spieler`
--

INSERT INTO `id_training_id_spieler` (`id_join_training_spieler`, `id_training`, `id_spieler`) VALUES
(1, 1, 9),
(2, 1, 10),
(3, 1, 8),
(4, 2, 9),
(5, 2, 7),
(6, 2, 6),
(7, 2, 2),
(8, 3, 9),
(9, 3, 10),
(10, 3, 7),
(11, 3, 8),
(12, 3, 6),
(13, 3, 3),
(14, 3, 2),
(15, 4, 10),
(16, 4, 3),
(17, 5, 7),
(18, 5, 3),
(19, 5, 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `id_training_id_uebungen`
--

CREATE TABLE IF NOT EXISTS `id_training_id_uebungen` (
  `id_join_training_uebungen` int(11) NOT NULL AUTO_INCREMENT,
  `id_training` int(11) NOT NULL,
  `id_uebungen` int(11) NOT NULL,
  PRIMARY KEY (`id_join_training_uebungen`),
  KEY `id_training` (`id_training`),
  KEY `id_uebungen` (`id_uebungen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Daten für Tabelle `id_training_id_uebungen`
--

INSERT INTO `id_training_id_uebungen` (`id_join_training_uebungen`, `id_training`, `id_uebungen`) VALUES
(1, 1, 138),
(2, 1, 8),
(3, 1, 7),
(4, 2, 137),
(5, 2, 9),
(6, 2, 138),
(7, 2, 3),
(8, 3, 138),
(9, 3, 4),
(10, 4, 138),
(11, 4, 3),
(12, 5, 153),
(13, 5, 9),
(14, 5, 138);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ktab_aufstellung_position_sp`
--

CREATE TABLE IF NOT EXISTS `ktab_aufstellung_position_sp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aufstellung` int(11) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sp` (`id_sp`),
  KEY `id_position` (`id_position`),
  KEY `id_aufstellung` (`id_aufstellung`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Daten für Tabelle `ktab_aufstellung_position_sp`
--

INSERT INTO `ktab_aufstellung_position_sp` (`id`, `id_aufstellung`, `id_position`, `id_sp`) VALUES
(1, 1, 38, 1),
(2, 1, 31, 2),
(3, 1, 32, 3),
(4, 1, 34, 4),
(5, 1, 35, 5),
(6, 1, 16, 6),
(7, 1, 17, 7),
(8, 1, 19, 8),
(9, 1, 20, 9),
(10, 1, 2, 10),
(11, 1, 4, 11),
(12, 2, 38, 1),
(13, 2, 31, 2),
(14, 2, 32, 3),
(15, 2, 34, 4),
(16, 2, 35, 5),
(17, 2, 23, 6),
(18, 2, 16, 7),
(19, 2, 20, 8),
(20, 2, 13, 9),
(21, 2, 2, 10),
(22, 2, 4, 11),
(23, 3, 38, 1),
(24, 3, 31, 2),
(25, 3, 32, 3),
(26, 3, 34, 4),
(27, 3, 35, 5),
(28, 3, 22, 6),
(29, 3, 24, 7),
(30, 3, 11, 8),
(31, 3, 13, 9),
(32, 3, 15, 10),
(33, 3, 3, 11),
(34, 4, 38, 1),
(35, 4, 31, 2),
(36, 4, 32, 3),
(37, 4, 34, 4),
(38, 4, 35, 5),
(39, 4, 23, 6),
(40, 4, 17, 7),
(41, 4, 19, 8),
(42, 4, 6, 9),
(43, 4, 10, 10),
(44, 4, 3, 11),
(45, 5, 38, 1),
(46, 5, 31, 2),
(47, 5, 32, 3),
(48, 5, 34, 4),
(49, 5, 35, 5),
(50, 5, 23, 6),
(51, 5, 16, 7),
(52, 5, 18, 8),
(53, 5, 20, 9),
(54, 5, 8, 10),
(55, 5, 3, 11),
(56, 6, 38, 1),
(57, 6, 31, 2),
(58, 6, 32, 3),
(59, 6, 34, 4),
(60, 6, 35, 5),
(61, 6, 16, 6),
(62, 6, 17, 7),
(63, 6, 19, 8),
(64, 6, 20, 9),
(65, 6, 8, 10),
(66, 6, 3, 11),
(67, 7, 38, 1),
(68, 7, 31, 2),
(69, 7, 32, 3),
(70, 7, 34, 4),
(71, 7, 35, 5),
(72, 7, 23, 6),
(73, 7, 16, 7),
(74, 7, 17, 8),
(75, 7, 19, 9),
(76, 7, 20, 10),
(77, 7, 3, 11),
(78, 8, 38, 1),
(79, 8, 31, 2),
(80, 8, 32, 3),
(81, 8, 34, 4),
(82, 8, 35, 5),
(83, 8, 22, 6),
(84, 8, 23, 7),
(85, 8, 24, 8),
(86, 8, 12, 9),
(87, 8, 14, 10),
(88, 8, 3, 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ktab_id_spiel_id_spieler_position`
--

CREATE TABLE IF NOT EXISTS `ktab_id_spiel_id_spieler_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_spiel` int(11) NOT NULL,
  `id_spieler` int(11) NOT NULL,
  `position` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_spiel` (`id_spiel`),
  KEY `id_spieler` (`id_spieler`),
  KEY `position` (`position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=287 ;

--
-- Daten für Tabelle `ktab_id_spiel_id_spieler_position`
--

INSERT INTO `ktab_id_spiel_id_spieler_position` (`id`, `id_spiel`, `id_spieler`, `position`) VALUES
(1, 2, 9, 3),
(2, 2, 9, 11),
(3, 2, 9, 13),
(4, 2, 9, 15),
(5, 2, 9, 22),
(6, 2, 9, 24),
(7, 2, 9, 31),
(8, 2, 9, 32),
(9, 2, 9, 34),
(10, 2, 9, 35),
(11, 2, 9, 38),
(34, 28, 9, 2),
(35, 28, 0, 0),
(36, 28, 9, 0),
(37, 28, 9, 16),
(38, 28, 9, 17),
(39, 28, 0, 19),
(40, 28, 9, 31),
(41, 28, 9, 32),
(42, 28, 9, 34),
(43, 28, 9, 35),
(44, 28, 9, 38),
(276, 26, 9, 2),
(277, 26, 9, 4),
(278, 26, 9, 16),
(279, 26, 9, 17),
(280, 26, 9, 19),
(281, 26, 9, 20),
(282, 26, 9, 31),
(283, 26, 9, 32),
(284, 26, 9, 34),
(285, 26, 9, 35),
(286, 26, 9, 38);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `laenge`
--

CREATE TABLE IF NOT EXISTS `laenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laenge` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `laenge`
--

INSERT INTO `laenge` (`id`, `laenge`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '5 - 10'),
(17, '10 - 15'),
(18, '15 - 20'),
(19, '20 - 25');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `monat`
--

CREATE TABLE IF NOT EXISTS `monat` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Monat` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `monat`
--

INSERT INTO `monat` (`ID`, `Monat`) VALUES
(1, 'Januar'),
(2, 'Februar'),
(3, 'M&auml;rz'),
(4, 'April'),
(5, 'Mai'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'August'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Dezember');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Torwart'),
(2, 'Str&uuml;rmer'),
(3, 'Mittelfeld'),
(4, 'Verteidiger');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sp`
--

CREATE TABLE IF NOT EXISTS `sp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sp` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp` (`sp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `sp`
--

INSERT INTO `sp` (`id`, `sp`) VALUES
(1, 'sp1'),
(10, 'sp10'),
(11, 'sp11'),
(2, 'sp2'),
(3, 'sp3'),
(4, 'sp4'),
(5, 'sp5'),
(6, 'sp6'),
(7, 'sp7'),
(8, 'sp8'),
(9, 'sp9');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spielart`
--

CREATE TABLE IF NOT EXISTS `spielart` (
  `ID` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `spielart`
--

INSERT INTO `spielart` (`ID`, `name`) VALUES
(1, 'Ligaspiel'),
(2, 'Testspiel'),
(3, 'Pokalspiel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE IF NOT EXISTS `spiele` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `datum` int(11) NOT NULL,
  `spielbeginn` int(11) NOT NULL,
  `spielort` varchar(255) NOT NULL,
  `treffzeit` varchar(255) NOT NULL,
  `treffort` varchar(255) NOT NULL,
  `heim` varchar(255) NOT NULL,
  `gast` varchar(255) NOT NULL,
  `anmerkungen` varchar(255) DEFAULT NULL,
  `spielart` int(1) NOT NULL,
  `halbzeitergebnis` varchar(10) NOT NULL,
  `ergebnis_heim` int(10) DEFAULT NULL,
  `ergebnis_gast` int(10) DEFAULT NULL,
  `aufstellung` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `aufstellung` (`aufstellung`),
  KEY `spielart` (`spielart`,`aufstellung`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`ID`, `datum`, `spielbeginn`, `spielort`, `treffzeit`, `treffort`, `heim`, `gast`, `anmerkungen`, `spielart`, `halbzeitergebnis`, `ergebnis_heim`, `ergebnis_gast`, `aufstellung`) VALUES
(2, 0, 1374739200, 'dahoam', '1374732000', 'drauÃŸen', 'die', 'wir', 'GAAAAAAAAAAAAAAAAAAAAASSSSSSSSSSSSSSSSSSSSSSSSSS\r\nGEEEEEEEEEEEBBBBBBBBBBBBBBENNNNN\r\n\r\nund gewinnen!!!', 3, '3:0', 4, 4, 3),
(4, 1374703200, 1374739200, 'drinne', '1374732000', 'da', 'immer noch die anderen', 'EV Ã¼zÃ¼mÃ¼k sporting', '', 2, '1:1', 2, 1, 1),
(26, 0, 1374739200, 'StraÃŸburg', '1374732000', 'Illkirch', 'Illkirch', 'StraÃŸburg', 'Frankreich !!!', 1, '1:1', 1, 1, 1),
(27, 0, 1374739200, 'hier', '1374732000', 'dort', 'wir', 'die anderen', '', 1, '1:0', 1, 0, 1),
(28, 1174703250, 1374739200, 'dort', '1374732000', 'hier', 'die anderen', 'wir', '', 2, '', NULL, NULL, 1),
(29, 1380492000, 1380528000, 'hier', '1380520800', 'auch hier', 'wir', 'wir nicht', '', 1, '', NULL, NULL, 1),
(31, 0, 1374739200, 'Paris', '1374732000', 'MÃ¼nchen', 'Paris', 'MÃ¼nchen', '', 3, '', NULL, NULL, 1),
(32, 1374744200, 1374739200, 'mÃ¼nchen', '1374732000', 'bei uns', 'immernochunsere', 'immernochdie anderen', 'Wir mÃ¼ssen gewinnen o/', 1, '1:0', 2, 0, 1),
(33, 0, 1374739200, 'mÃ¼nchen', '1374732000', 'bei uns', 'immernochunsere', 'immernochdie anderen', 'Wir mÃ¼ssen gewinnen o/', 1, '1:0', 2, 0, 1),
(34, 0, 1374739200, 'mÃ¼nchen', '1374732000', 'bei uns', 'immernochunsere', 'immernochdie anderen', 'Wir mÃ¼ssen gewinnen o/', 1, '1:0', 2, 0, 1),
(35, 1374803200, 1374739200, 'dort', '1374732000', 'hier', 'die anderen', 'wir', '', 2, '', NULL, NULL, 1),
(37, 1374703200, 1374739200, 'MÃ¼nchen', '1374732000', 'MÃ¼nchen', 'MÃ¼nchen', 'Paris', '', 2, '', NULL, NULL, 1),
(52, 1374876000, 1374919200, 'Pasing', '1374917400', 'Bahnhof', 'Wir', 'Die anderen', '', 1, '', NULL, NULL, 1),
(53, 1380492000, 1380531600, 'hier', '1380524400', 'auch hier', 'wir', 'wir nicht', '', 1, '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spieler`
--

CREATE TABLE IF NOT EXISTS `spieler` (
  `SID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `vorname` varchar(20) NOT NULL,
  `strasse` varchar(20) NOT NULL,
  `hausnummer` varchar(10) NOT NULL,
  `PLZ` int(6) NOT NULL,
  `stadt` varchar(20) NOT NULL,
  `vorwahl_festnetz` varchar(6) NOT NULL,
  `telefon_nr` varchar(15) NOT NULL,
  `vorwahl_handy` varchar(6) NOT NULL,
  `handy_nr` varchar(10) NOT NULL,
  `pass_nr` varchar(10) NOT NULL,
  `id_position` int(2) NOT NULL,
  `staerken` varchar(50) NOT NULL,
  `schwaechen` varchar(50) NOT NULL,
  PRIMARY KEY (`SID`),
  KEY `id_position_2` (`id_position`),
  KEY `id_position_3` (`id_position`),
  KEY `id_position_4` (`id_position`),
  KEY `id_position` (`id_position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Daten für Tabelle `spieler`
--

INSERT INTO `spieler` (`SID`, `name`, `vorname`, `strasse`, `hausnummer`, `PLZ`, `stadt`, `vorwahl_festnetz`, `telefon_nr`, `vorwahl_handy`, `handy_nr`, `pass_nr`, `id_position`, `staerken`, `schwaechen`) VALUES
(9, 'DB', 'maria', 'DÃ¶rtenstr.', '25451', 123456, 'Testhausen', '0190', '6666666', '012514', '5165132168', '5419846253', 4, 'nix', 'all'),
(10, 'Metzger', 'Karl-Horst', 'Dritter Krater', 'rechts', 1, 'Mond', '65154', '6547654654798', '', '', '4-4', 4, 'alle', 'noch mehr'),
(7, 'Metzger', 'Michael', 'blihblahblup straÃŸe', '42', 81423, 'MÃ¼nchen', '0176', '6547654654798', '', '', '987654321', 1, 'alle', 'keine'),
(8, 'renardino', 'Nico', 'maria-eich-straÃŸe5', '717', 81243, 'MÃ¼nchen1', '0176', '64881370', '', '', '1234567', 3, 'keine1', 'alle1'),
(3, 'Metzger', 'Michael', 'blihblahblup straÃŸe', '42', 81423, 'MÃ¼nchen', '0176', '6547654654798', '', '', '987654321', 1, 'alle', 'keine'),
(2, 'Renard1', 'Nicolas1', 'maria-eich-straÃŸe5', '717', 81243, 'MÃ¼nchen1', '0176', '64881370', '', '', '1234567', 3, 'keine1', 'alle1'),
(15, 'Weinhart', 'Martin', 'immerdieselbe Str.', '45', 45789, 'Moosburg', '', '', '', '', '', 3, '', ''),
(16, 'Schuster', 'Mareike', 'Auchdieselbewiemarti', '1', 80992, 'MÃ¼nchen', '', '', '', '', '', 1, '', ''),
(17, 'Schabe', 'Patrick', 'eineandereStr.', '8', 84568, 'MÃ¼nchen', '', '', '', '', '', 4, '', ''),
(18, 'bauer', 'Michi', 'aucheineandereStr.', '458', 81456, 'MÃ¼nchen', '', '', '', '', '', 2, '', ''),
(32, 'Wiener', 'Daniel', 'blastraÃŸe', '22', 89552, 'MÃ¼nchen', '', '', '', '', '', 1, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `torart`
--

CREATE TABLE IF NOT EXISTS `torart` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `torart`
--

INSERT INTO `torart` (`id`, `name`) VALUES
(1, 'Elfmeter'),
(2, 'Freisto&szlig;'),
(3, 'Kombination'),
(4, 'Ecke'),
(5, 'Schu&szlig;'),
(6, 'Kopfball'),
(7, 'Eigentor'),
(8, 'Konter'),
(9, 'Gegentor');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tore`
--

CREATE TABLE IF NOT EXISTS `tore` (
  `TID` int(255) NOT NULL AUTO_INCREMENT,
  `torschuetze` int(3) NOT NULL,
  `minute` int(10) NOT NULL,
  `torart` int(11) NOT NULL,
  `spiele_id` int(3) NOT NULL,
  PRIMARY KEY (`TID`),
  KEY `torschuetze` (`torschuetze`,`torart`,`spiele_id`),
  KEY `torart` (`torart`),
  KEY `spiele_id` (`spiele_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Daten für Tabelle `tore`
--

INSERT INTO `tore` (`TID`, `torschuetze`, `minute`, `torart`, `spiele_id`) VALUES
(1, 3, 10, 2, 1),
(2, 3, 48, 4, 1),
(3, 6, 9, 5, 2),
(4, 6, 19, 5, 2),
(5, 6, 32, 5, 2),
(6, 6, 54, 5, 2),
(7, 3, 66, 9, 2),
(8, 3, 70, 9, 2),
(9, 3, 70, 9, 2),
(10, 3, 70, 9, 2),
(11, 2, 10, 8, 5),
(12, 2, 19, 1, 5),
(13, 7, 6, 7, 5),
(17, 10, 22, 1, 27),
(18, 9, 1, 6, 29),
(19, 9, 1, 1, 29),
(20, 9, 1, 9, 29),
(25, 7, 17, 4, 33),
(26, 2, 72, 8, 33),
(29, 7, 13, 4, 4),
(30, 8, 15, 3, 4),
(31, 6, 65, 9, 4),
(42, 3, 57, 3, 26),
(43, 10, 67, 1, 26);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `datum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `training`
--

INSERT INTO `training` (`id`, `datum`) VALUES
(1, 1379973600),
(2, 1379541600),
(3, 1380319200),
(4, 1365544800),
(5, 1397080800);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `uebungen`
--

CREATE TABLE IF NOT EXISTS `uebungen` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `titel` varchar(100) NOT NULL,
  `datum` int(11) NOT NULL,
  `organisation` text NOT NULL,
  `durchfuehrung` text NOT NULL,
  `hinweise` text NOT NULL,
  `dauer` varchar(10) NOT NULL,
  `author` varchar(30) NOT NULL,
  `gruppierung` int(2) NOT NULL,
  `uebungsart` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `dauer` (`dauer`),
  KEY `gruppierung` (`gruppierung`),
  KEY `uebungsart` (`uebungsart`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

--
-- Daten für Tabelle `uebungen`
--

INSERT INTO `uebungen` (`ID`, `titel`, `datum`, `organisation`, `durchfuehrung`, `hinweise`, `dauer`, `author`, `gruppierung`, `uebungsart`) VALUES
(153, 'Spieler1', 1375308000, '', '', '', '1', 'Bernhard Walther', 3, 1),
(151, 'Ãœbung4', 1380492000, 'organisieren', 'blip', 'hinweisen', '15', 'Nicolas Renard', 3, 8),
(138, 'Spieler123456', 1375308000, '', '', '', '10', 'Bernhard Walther', 3, 1),
(137, 'nach den ball suchen', 1375653600, '', '', '', '14', 'Bernhard Walther', 3, 1),
(9, 'Rennen laufen springen', 1385852400, 'aufwÃ¤rmen, laufen, rennen und springen und sterben', 'einmal laufen, dreimal rennen und fÃ¼nfmal springen', 'sehr schwer und dann leicht', '1', 'Nicolas Renard', 3, 5),
(8, 'Uebung 3', 1356994800, '', 'Ball', '', '1', 'Bernhard Walther', 1, 2),
(7, 'Schweinchen in der Mitte', 1339365600, 'rumpelpumple', 'hops hops', 'nase bohren', '1', 'Fabian Schneider', 2, 3),
(3, 'Dribbling mit dem Ball', 1333274400, 'HÃ¼tchen, BÃ¤lle', 'HÃ¼tchen in gleichen abstand aufstellen. die spieler mÃ¼ssen zwischen desn hÃ¼tchen mit dem ball durchlaufen', 'Immer schneller', '19', 'Bernhard Walther', 3, 16),
(5, 'TestÃ¼bung', 1376431200, '-BÃ¤lle\r\n-Spieler\r\n-Trainer\r\n', 'Trainer + Spieler + BÃ¤lle = Wahloses durcheinander!', '42', '1', 'icke', 2, 4),
(4, 'Dribbling mit dem Ball ohne bild1', 1360710000, 'hÃ¼tchen1', 'ohne bild1', 'ohne bild laufen1', '1', 'Bernhard Walther1', 1, 1),
(154, 'Rumtulpen', 1381442400, '', '', '', '1', 'Bernhard Walther', 1, 1),
(155, 'Ubung', 1381442400, '', '', '', '1', 'Bernhard Walther', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `uebungsart`
--

CREATE TABLE IF NOT EXISTS `uebungsart` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `art` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `uebungsart`
--

INSERT INTO `uebungsart` (`ID`, `art`) VALUES
(1, 'Kraft'),
(2, 'Schnelligkeit'),
(3, 'Ausdauer'),
(4, 'Koordination'),
(5, 'Athletik'),
(6, 'IT'),
(7, 'GT - Offensiv'),
(8, 'GT - Defensiv'),
(9, 'MT - Offensiv'),
(10, 'MT - Defensiv'),
(11, 'Passspiel'),
(12, 'Kopfball'),
(13, 'Torschuss'),
(14, 'Spielformen'),
(15, 'Finten'),
(16, 'Balltechnik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(0) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `vorname` varchar(0) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `passwort` varchar(0) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `id_training_id_spieler`
--
ALTER TABLE `id_training_id_spieler`
  ADD CONSTRAINT `id_training_id_spieler_ibfk_1` FOREIGN KEY (`id_training`) REFERENCES `training` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `id_training_id_uebungen`
--
ALTER TABLE `id_training_id_uebungen`
  ADD CONSTRAINT `id_training_id_uebungen_ibfk_1` FOREIGN KEY (`id_training`) REFERENCES `training` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `ktab_aufstellung_position_sp`
--
ALTER TABLE `ktab_aufstellung_position_sp`
  ADD CONSTRAINT `ktab_aufstellung_position_sp_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ktab_aufstellung_position_sp_ibfk_2` FOREIGN KEY (`id_position`) REFERENCES `aufstellung_position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ktab_aufstellung_position_sp_ibfk_3` FOREIGN KEY (`id_aufstellung`) REFERENCES `aufstellung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `ktab_id_spiel_id_spieler_position`
--
ALTER TABLE `ktab_id_spiel_id_spieler_position`
  ADD CONSTRAINT `ktab_id_spiel_id_spieler_position_ibfk_1` FOREIGN KEY (`id_spiel`) REFERENCES `spiele` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD CONSTRAINT `spiele_ibfk_1` FOREIGN KEY (`spielart`) REFERENCES `spielart` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tore`
--
ALTER TABLE `tore`
  ADD CONSTRAINT `tore_ibfk_1` FOREIGN KEY (`torart`) REFERENCES `torart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
