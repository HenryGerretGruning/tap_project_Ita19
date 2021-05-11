-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 10, 2021 kell 08:05 EL
-- Serveri versioon: 10.4.18-MariaDB
-- PHP versioon: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `kpr`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `partners`
--

CREATE TABLE `partners` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `reg_nr` int(11) NOT NULL,
                            `email` varchar(255) NOT NULL,
                            `phone` varchar(255) NOT NULL,
                            `activity` varchar(255) NOT NULL,
                            `activity_details` varchar(255) NOT NULL,
                            `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Andmete tÃµmmistamine tabelile `partners`
--

INSERT INTO `partners` (`id`, `name`, `reg_nr`, `email`, `phone`, `activity`, `activity_details`, `location`) VALUES
(1, 'Mark Otto', 12345, 'mark@otto.com', '12345678', 'seinad', 'kipsseinad', 'Ã¼le eesti'),
(2, 'Mark Otto', 12345, 'mark@otto.com', '12345678', 'seinad', 'Puitseinad', 'Ã¼le eesti'),
(3, 'Margaret Hamilton', 12345, 'info@hamilton.com', '12345678', 'Aknad', 'plastaknad', 'Tartumaa'),
(4, 'John Klark', 12345, 'john@klark.com', '12345678', 'Aknad', 'puitaknad', 'Virumaa');

--
-- Indeksid tÃµmmistatud tabelitele
--

--
-- Indeksid tabelile `partners`
--
ALTER TABLE `partners`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tÃµmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `partners`
--
ALTER TABLE `partners`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
