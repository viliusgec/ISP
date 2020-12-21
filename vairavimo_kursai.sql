-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 08:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vairavimo_kursai`
--

-- --------------------------------------------------------

--
-- Table structure for table `asmuo`
--

CREATE TABLE `asmuo` (
  `vardas` varchar(32) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `pavarde` varchar(32) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `el_pastas` varchar(32) DEFAULT NULL,
  `slaptazodis` varchar(50) NOT NULL,
  `asmens_kodas` varchar(50) NOT NULL,
  `role` varchar(60) NOT NULL,
  `tokenas` varchar(50) NOT NULL,
  `Ar_aktyvuotas` tinyint(1) NOT NULL DEFAULT 0,
  `Ar_aktyvuotas_nuot` tinyint(4) NOT NULL DEFAULT 0,
  `paskutinis_prisijungimas` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asmuo`
--

INSERT INTO `asmuo` (`vardas`, `pavarde`, `el_pastas`, `slaptazodis`, `asmens_kodas`, `role`, `tokenas`, `Ar_aktyvuotas`, `Ar_aktyvuotas_nuot`, `paskutinis_prisijungimas`) VALUES
('Tomas', 'Turkas', 'tautis63@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '399878787', 'administratorius', '1141938ba2c2b13f5505d7c424ebae5f', 0, 0, '2020-12-21 00:00:00'),
('Timas', 'Umpis', 'umpis@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '44884545', 'darbuotojas', '36660e59856b4de58a219bcf4e27eba3', 0, 0, '2020-12-21 00:00:00'),
('Klientas', 'Pirmas', 'klientas@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '45454521', 'klientas', 'd2ddea18f00665ce8623e36bd4e3c7c5', 1, 1, '2020-12-21 00:00:00'),
('Rimas', 'Rokas', 'rokas@gmail.com', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '5474512', 'darbuotojas', '6081594975a764c8e3a691fa2b3a321d', 0, 0, '2020-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojas`
--

CREATE TABLE `darbuotojas` (
  `tabelio_nr` int(11) NOT NULL,
  `dirba_nuo` datetime NOT NULL,
  `pareigos` varchar(50) NOT NULL,
  `fk_asmuo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `darbuotojas`
--

INSERT INTO `darbuotojas` (`tabelio_nr`, `dirba_nuo`, `pareigos`, `fk_asmuo`) VALUES
(32, '2020-12-21 20:10:38', 'teorijos', '44884545'),
(33, '2020-12-21 20:10:44', 'praktikos', '5474512');

-- --------------------------------------------------------

--
-- Table structure for table `egzaminas`
--

CREATE TABLE `egzaminas` (
  `id` int(20) NOT NULL,
  `laikas` datetime NOT NULL,
  `vietu_kiekis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `egzaminas`
--

INSERT INTO `egzaminas` (`id`, `laikas`, `vietu_kiekis`) VALUES
(3, '2020-12-29 20:42:50', 14),
(4, '2020-12-29 20:42:50', 15),
(5, '2020-12-26 21:13:22', 15),
(6, '2020-12-24 21:13:22', 15);

-- --------------------------------------------------------

--
-- Table structure for table `egzamino_nariai`
--

CREATE TABLE `egzamino_nariai` (
  `fk_klientas` varchar(50) DEFAULT NULL,
  `fk_egzamino_id` int(11) NOT NULL,
  `busena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='0 - laukiama , 1 patvirtinta, 2 - neišlaikė';

--
-- Dumping data for table `egzamino_nariai`
--

INSERT INTO `egzamino_nariai` (`fk_klientas`, `fk_egzamino_id`, `busena`) VALUES
(NULL, 4, 0),
('45454521', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

CREATE TABLE `grupe` (
  `pavadinimas` varchar(50) NOT NULL,
  `fk_kursai_id` int(30) NOT NULL,
  `fk_darbuotojo_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `numatyta_data` date NOT NULL,
  `vietu_kiekis` int(11) NOT NULL,
  `numatyta_data_iki` date NOT NULL,
  `grupe_sukurta` datetime DEFAULT NULL,
  `busena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`pavadinimas`, `fk_kursai_id`, `fk_darbuotojo_id`, `id`, `numatyta_data`, `vietu_kiekis`, `numatyta_data_iki`, `grupe_sukurta`, `busena`) VALUES
('A kategorija - vakarinis', 2, 32, 63, '2020-12-31', 29, '2021-03-01', '2020-12-21 20:11:12', 'registracija');

-- --------------------------------------------------------

--
-- Table structure for table `grupes_nariai`
--

CREATE TABLE `grupes_nariai` (
  `fk_klientas` varchar(50) DEFAULT NULL,
  `fk_grupes_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupes_nariai`
--

INSERT INTO `grupes_nariai` (`fk_klientas`, `fk_grupes_id`) VALUES
('45454521', 63);

-- --------------------------------------------------------

--
-- Table structure for table `kursai`
--

CREATE TABLE `kursai` (
  `id` int(30) NOT NULL,
  `pavadinimas` varchar(50) NOT NULL,
  `tipas` varchar(20) NOT NULL,
  `kaina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursai`
--

INSERT INTO `kursai` (`id`, `pavadinimas`, `tipas`, `kaina`) VALUES
(1, 'A kategorija', 'rytinis', 300),
(2, 'A kategorija', 'vakarinis', 300),
(5, 'B Kategorija', 'rytinis', 300),
(6, 'B kategorija', 'vakarinis', 300);

-- --------------------------------------------------------

--
-- Table structure for table `nuotraukos`
--

CREATE TABLE `nuotraukos` (
  `location` varchar(100) NOT NULL,
  `vartotojo_id` varchar(50) NOT NULL,
  `busena` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='0 - laukiama , 1 patvirtinta, 2 - atmesta';

-- --------------------------------------------------------

--
-- Table structure for table `pamoka`
--

CREATE TABLE `pamoka` (
  `id` int(20) NOT NULL,
  `laikas` varchar(20) NOT NULL,
  `trukme` varchar(20) DEFAULT NULL,
  `fk_grupes_id` int(20) DEFAULT NULL,
  `diena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pamoka`
--

INSERT INTO `pamoka` (`id`, `laikas`, `trukme`, `fk_grupes_id`, `diena`) VALUES
(19, '18:00', '2 Valandas', 63, 'Pirmadienis'),
(20, '18:00', '2 Valandas', 63, 'Treciadienis');

-- --------------------------------------------------------

--
-- Table structure for table `paslaugos`
--

CREATE TABLE `paslaugos` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) NOT NULL,
  `kaina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paslaugos`
--

INSERT INTO `paslaugos` (`id`, `pavadinimas`, `kaina`) VALUES
(1, 'Papildoma praktinė pamoka', 15.99),
(2, 'KET bilietai', 4.99),
(3, 'KET knygelės pardavimas', 10.99);

-- --------------------------------------------------------

--
-- Table structure for table `praktiniu_tvarkarastis`
--

CREATE TABLE `praktiniu_tvarkarastis` (
  `data` date NOT NULL,
  `laikas` time NOT NULL,
  `fk_darbuotojas_tabelio_nr` int(11) DEFAULT NULL,
  `ar_uzimta` int(11) NOT NULL,
  `fk_asmuo_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ar_egzaminas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `praktiniu_tvarkarastis`
--

INSERT INTO `praktiniu_tvarkarastis` (`data`, `laikas`, `fk_darbuotojas_tabelio_nr`, `ar_uzimta`, `fk_asmuo_id`, `id`, `ar_egzaminas`) VALUES
('2020-12-24', '09:00:00', 33, 1, '45454521', 5, 1),
('2020-12-25', '10:00:00', 33, 0, NULL, 6, 0),
('2020-12-24', '12:00:00', 33, 0, NULL, 7, 0),
('2020-12-25', '08:00:00', 33, 0, NULL, 8, 0),
('2020-12-30', '11:00:00', 33, 1, '45454521', 9, 0),
('2020-12-27', '08:00:00', 33, 0, NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sutartis`
--

CREATE TABLE `sutartis` (
  `nr` int(11) NOT NULL,
  `sudaryta` datetime NOT NULL,
  `fk_klientas` varchar(50) DEFAULT NULL,
  `fk_kursai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sutartis`
--

INSERT INTO `sutartis` (`nr`, `sudaryta`, `fk_klientas`, `fk_kursai`) VALUES
(5, '2020-12-21 00:00:00', '45454521', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asmuo`
--
ALTER TABLE `asmuo`
  ADD PRIMARY KEY (`asmens_kodas`),
  ADD UNIQUE KEY `el_pastas` (`el_pastas`);

--
-- Indexes for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD PRIMARY KEY (`tabelio_nr`),
  ADD KEY `fk_pareigos` (`pareigos`),
  ADD KEY `fk_asmuo` (`fk_asmuo`);

--
-- Indexes for table `egzaminas`
--
ALTER TABLE `egzaminas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egzamino_nariai`
--
ALTER TABLE `egzamino_nariai`
  ADD KEY `fk_klientas` (`fk_klientas`,`fk_egzamino_id`),
  ADD KEY `fk_egzamino_id` (`fk_egzamino_id`);

--
-- Indexes for table `grupe`
--
ALTER TABLE `grupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kursai_id` (`fk_kursai_id`),
  ADD KEY `fk_darbuotojo_id` (`fk_darbuotojo_id`);

--
-- Indexes for table `grupes_nariai`
--
ALTER TABLE `grupes_nariai`
  ADD KEY `fk_klientas` (`fk_klientas`,`fk_grupes_id`),
  ADD KEY `fk_grupes_id` (`fk_grupes_id`);

--
-- Indexes for table `kursai`
--
ALTER TABLE `kursai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pamoka`
--
ALTER TABLE `pamoka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupes_id` (`fk_grupes_id`);

--
-- Indexes for table `paslaugos`
--
ALTER TABLE `paslaugos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktiniu_tvarkarastis`
--
ALTER TABLE `praktiniu_tvarkarastis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_darbuotojas_tabelio_nr` (`fk_darbuotojas_tabelio_nr`,`fk_asmuo_id`),
  ADD KEY `fk_asmuo_id` (`fk_asmuo_id`);

--
-- Indexes for table `sutartis`
--
ALTER TABLE `sutartis`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `fk_klientas` (`fk_klientas`),
  ADD KEY `fk_kursai` (`fk_kursai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  MODIFY `tabelio_nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `egzaminas`
--
ALTER TABLE `egzaminas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kursai`
--
ALTER TABLE `kursai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pamoka`
--
ALTER TABLE `pamoka`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `paslaugos`
--
ALTER TABLE `paslaugos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `praktiniu_tvarkarastis`
--
ALTER TABLE `praktiniu_tvarkarastis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sutartis`
--
ALTER TABLE `sutartis`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `darbuotojas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL;

--
-- Constraints for table `egzamino_nariai`
--
ALTER TABLE `egzamino_nariai`
  ADD CONSTRAINT `egzamino_nariai_ibfk_2` FOREIGN KEY (`fk_egzamino_id`) REFERENCES `egzaminas` (`id`),
  ADD CONSTRAINT `egzamino_nariai_ibfk_3` FOREIGN KEY (`fk_klientas`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL;

--
-- Constraints for table `grupe`
--
ALTER TABLE `grupe`
  ADD CONSTRAINT `grupe_ibfk_1` FOREIGN KEY (`fk_kursai_id`) REFERENCES `kursai` (`id`),
  ADD CONSTRAINT `grupe_ibfk_2` FOREIGN KEY (`fk_darbuotojo_id`) REFERENCES `darbuotojas` (`tabelio_nr`) ON DELETE SET NULL;

--
-- Constraints for table `grupes_nariai`
--
ALTER TABLE `grupes_nariai`
  ADD CONSTRAINT `grupes_nariai_ibfk_1` FOREIGN KEY (`fk_klientas`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupes_nariai_ibfk_2` FOREIGN KEY (`fk_grupes_id`) REFERENCES `grupe` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pamoka`
--
ALTER TABLE `pamoka`
  ADD CONSTRAINT `pamoka_ibfk_1` FOREIGN KEY (`fk_grupes_id`) REFERENCES `grupe` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `praktiniu_tvarkarastis`
--
ALTER TABLE `praktiniu_tvarkarastis`
  ADD CONSTRAINT `praktiniu_tvarkarastis_ibfk_3` FOREIGN KEY (`fk_darbuotojas_tabelio_nr`) REFERENCES `darbuotojas` (`tabelio_nr`) ON DELETE SET NULL,
  ADD CONSTRAINT `praktiniu_tvarkarastis_ibfk_4` FOREIGN KEY (`fk_asmuo_id`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL;

--
-- Constraints for table `sutartis`
--
ALTER TABLE `sutartis`
  ADD CONSTRAINT `sutartis_ibfk_1` FOREIGN KEY (`fk_klientas`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `sutartis_ibfk_2` FOREIGN KEY (`fk_kursai`) REFERENCES `kursai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
