-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 11, 2021 kell 01:11 PL
-- Serveri versioon: 10.4.18-MariaDB
-- PHP versioon: 7.4.16

SET
FOREIGN_KEY_CHECKS=0;
SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";

--
-- Andmebaas: `kpr`
--
CREATE
DATABASE IF NOT EXISTS `kpr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE
`kpr`;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `activity`
--
-- Loodud: Mai 10, 2021 kell 07:00 EL
-- Viimati uuendatud: Mai 10, 2021 kell 07:00 EL
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- TABELI SEOSED `activity`:
--

--
-- Andmete tõmmistamine tabelile `activity`
--

INSERT INTO `activity` (`id`, `name`)
VALUES (1, ''Seinad''),
       (2, ''Aknad'');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `activity_details`
--
-- Loodud: Mai 10, 2021 kell 07:26 EL
-- Viimati uuendatud: Mai 10, 2021 kell 07:27 EL
--

DROP TABLE IF EXISTS `activity_details`;
CREATE TABLE IF NOT EXISTS `activity_details`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- TABELI SEOSED `activity_details`:
--

--
-- Andmete tõmmistamine tabelile `activity_details`
--

INSERT INTO `activity_details` (`id`, `name`)
VALUES (1, ''Kipsseinad''),
       (2, ''Puitseinad''),
       (3, ''Plastaknad''),
       (4, ''Puitaknad'');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `partners`
--
-- Loodud: Mai 11, 2021 kell 10:36 EL
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    50
) NOT NULL,
    `reg_nr` int
(
    11
) NOT NULL,
    `email` varchar
(
    50
) NOT NULL,
    `phone` int
(
    11
) NOT NULL,
    `activity` int
(
    11
) NOT NULL,
    `location` varchar
(
    50
) NOT NULL,
    PRIMARY KEY
(
    `id`
),
    KEY `activity`
(
    `activity`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- TABELI SEOSED `partners`:
--   `activity`
--       `activity` -> `id`
--

--
-- Andmete tõmmistamine tabelile `partners`
--

INSERT INTO `partners` (`id`, `name`, `reg_nr`, `email`, `phone`, `activity`, `location`)
VALUES (9, ''Mark Otto'', 12345, ''mark@otto.com'', 1234567, 1, ''Üle Eesti''),
       (10, ''Margaret Hamilton'', 12345, ''info@hamilton.com'', 1234567, 2, ''Tartumaa''),
       (11, ''John Klark'', 12345, ''john@klark.com'', 1234567, 2, ''Võrumaa'');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `partner_activity`
--
-- Loodud: Mai 11, 2021 kell 10:38 EL
-- Viimati uuendatud: Mai 11, 2021 kell 10:41 EL
--

DROP TABLE IF EXISTS `partner_activity`;
CREATE TABLE IF NOT EXISTS `partner_activity`
(
    `partner_id` int
(
    11
) NOT NULL,
    `activity_id` int
(
    11
) NOT NULL,
    `activity_details_id` int
(
    11
) NOT NULL,
    KEY `activity_id`
(
    `activity_id`
),
    KEY `activity_details_id`
(
    `activity_details_id`
),
    KEY `partner_id`
(
    `partner_id`
)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- TABELI SEOSED `partner_activity`:
--   `activity_id`
--       `activity` -> `id`
--   `activity_details_id`
--       `activity_details` -> `id`
--   `partner_id`
--       `partners` -> `id`
--

--
-- Andmete tõmmistamine tabelile `partner_activity`
--

INSERT INTO `partner_activity` (`partner_id`, `activity_id`, `activity_details_id`)
VALUES (10, 2, 3),
       (10, 2, 4);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--
-- Loodud: Mai 11, 2021 kell 09:46 EL
-- Viimati uuendatud: Mai 11, 2021 kell 09:46 EL
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `id` int
(
    11
) NOT NULL AUTO_INCREMENT,
    `name` varchar
(
    255
) NOT NULL,
    `email` varchar
(
    255
) NOT NULL,
    `password` varchar
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `id`
)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- TABELI SEOSED `users`:
--

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`)
VALUES (1, ''test'', ''test@host.loc'', ''qwerty'');

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `partners`
--
ALTER TABLE `partners`
    ADD CONSTRAINT `partners_ibfk_1` FOREIGN KEY (`activity`) REFERENCES `activity` (`id`);

--
-- Piirangud tabelile `partner_activity`
--
ALTER TABLE `partner_activity`
    ADD CONSTRAINT `partner_activity_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `partner_activity_ibfk_2` FOREIGN KEY (`activity_details_id`) REFERENCES `activity_details` (`id`),
  ADD CONSTRAINT `partner_activity_ibfk_3` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`);
SET
FOREIGN_KEY_CHECKS=1;
COMMIT;
