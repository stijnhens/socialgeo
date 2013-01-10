-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 08 jan 2013 om 01:13
-- Serverversie: 5.5.25
-- PHP-versie: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `db_socialgeo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event`
--

CREATE TABLE `Event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `Event`
--

INSERT INTO `Event` (`id`, `name`, `imagename`, `time`, `location`, `details`) VALUES
(11, 'Laurijn', 'foo.jpg', '2013-01-08 12:00:00', 'Ghent', 'awesome'),
(12, 'Stijn', 'foo.jpg', '2013-01-08 12:00:00', 'Lommel', 'awesome'),
(13, 'Laurijn', 'foo.jpg', '2013-01-08 12:00:00', 'Ghent', 'awesome'),
(14, 'Stijn', 'foo.jpg', '2013-01-08 12:00:00', 'Lommel', 'awesome');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `name`) VALUES
(1, 'laurijn', 'laurijn', 'ldeschep@gmail.com', 'ldeschep@gmail.com', 1, 'exgarntdf484scwosgkkwkcoswwgs8w', 'OHdE8P1vOdidz8tgLMR67ywy4SABlPCuSBfgJkuqnWej/6I1v7BKHv8VAhmHTudoEgdIZQZGxbHQtk60KKaMrg==', '2013-01-08 01:09:58', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_MASTER";}', 0, NULL, 'Laurijn'),
(2, 'Peter', 'peter', 'peter@awesome.com', 'peter@awesome.com', 1, 'lj38j0fl7oggkck448ws8oks08kscww', 'YZIDKeWCRUF08WmthPs9LYBofxXv4HAbdaoJaNf59b5HiusYpUavU4ePZBMn2iIxzy9R0MQGMWnSOBJVaPMN0g==', '2013-01-07 23:42:42', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Petje');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
