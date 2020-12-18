-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 11:21 PM
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
('vvv', 'vvvvvv', 'vv@v.v', '123', '1234', 'klientas', '', 0, 0, NULL),
('qwe', 'qwe', 'p@p.t', '123', '1234123', 'klientas', '', 0, 0, NULL),
('qwe', 'qwe', 'p@ap.t', '123', '12341232', 'klientas', '', 0, 0, NULL),
('tt', 'rr', 't@t.t', '123', '12345', 'klientas', '', 0, 0, NULL),
('Tautvydas', 'Rušas', 'tadas@gmail.com', '123', '144', 'klientas', 'ea5d2f1c4608232e07d3aa3d998e5135', 0, 1, NULL),
('Vilius', 'gec', 'gecas97@gmail.com', '123', '5002', 'klientas', '8c7bbbba95c1025975e548cee86dfadc', 1, 0, NULL),
('Mantas', 'Mantas', 'Mantas@mantas.mantas', '123', '777777', 'klientas', '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojas`
--

CREATE TABLE `darbuotojas` (
  `tabelio_nr` int(11) NOT NULL,
  `dirba_nuo` datetime NOT NULL,
  `pareigos` varchar(50) NOT NULL,
  `fk_asmuo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `darbuotojas`
--

INSERT INTO `darbuotojas` (`tabelio_nr`, `dirba_nuo`, `pareigos`, `fk_asmuo`) VALUES
(3, '2020-12-08 19:42:45', 'teorijos', '777777');

-- --------------------------------------------------------

--
-- Table structure for table `egzaminas`
--

CREATE TABLE `egzaminas` (
  `id` int(20) NOT NULL,
  `tipas` varchar(20) NOT NULL,
  `laikas` datetime NOT NULL,
  `fk_kursai_id` int(20) NOT NULL,
  `fk_darbuotojas_tabelio_nr` int(20) NOT NULL,
  `fk_rezervacija_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

CREATE TABLE `grupe` (
  `pavadinimas` varchar(50) NOT NULL,
  `fk_kursai_id` int(30) NOT NULL,
  `fk_darbuotojo_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `numatyta_data` date NOT NULL,
  `vietu_kiekis` int(11) NOT NULL,
  `numatyta_data_iki` date NOT NULL,
  `grupe_sukurta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`pavadinimas`, `fk_kursai_id`, `fk_darbuotojo_id`, `id`, `numatyta_data`, `vietu_kiekis`, `numatyta_data_iki`, `grupe_sukurta`) VALUES
('Mano draugai', 1, 3, 47, '2020-12-31', 44, '2021-03-01', '2020-12-17 22:32:38'),
('Mano draugai 2', 2, 1, 48, '2020-12-31', 44, '2021-03-01', '2020-12-17 22:33:24'),
('Ernesta Daraškien?', 1, 1, 49, '2020-12-16', 44, '2021-02-14', '2020-12-17 22:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `grupes_nariai`
--

CREATE TABLE `grupes_nariai` (
  `fk_klientas` int(11) NOT NULL,
  `fk_grupes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ivertinimas`
--

CREATE TABLE `ivertinimas` (
  `id` int(20) NOT NULL,
  `balas` int(20) NOT NULL,
  `fk_egzaminas_id` int(20) NOT NULL,
  `fk_klientas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klientas`
--

CREATE TABLE `klientas` (
  `AD_nuotrauka` varchar(50) NOT NULL,
  `paskutinis_apsilankymas` datetime NOT NULL,
  `registracijos_data` datetime NOT NULL,
  `patvirtinta` tinyint(1) NOT NULL,
  `fk_asmuo` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'A kategorija', 'vakarinis', 300);

-- --------------------------------------------------------

--
-- Table structure for table `nuotraukos`
--

CREATE TABLE `nuotraukos` (
  `location` varchar(100) NOT NULL,
  `vartotojo_id` varchar(50) NOT NULL,
  `busena` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='0 - laukiama , 1 patvirtinta, 2 - atmesta';

--
-- Dumping data for table `nuotraukos`
--

INSERT INTO `nuotraukos` (`location`, `vartotojo_id`, `busena`) VALUES
('./uploads/12322538805-2624-4DFD-B3E3-4AA1DF293AD8.jpg', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pamoka`
--

CREATE TABLE `pamoka` (
  `id` int(20) NOT NULL,
  `laikas` varchar(20) NOT NULL,
  `trukme` varchar(20) DEFAULT NULL,
  `fk_grupes_id` int(20) NOT NULL,
  `diena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pamoka`
--

INSERT INTO `pamoka` (`id`, `laikas`, `trukme`, `fk_grupes_id`, `diena`) VALUES
(3, '09:00', '2 Valandas', 47, 'Pirmadienis'),
(4, '09:00', '2 Valandas', 47, 'Tre?iadienis'),
(5, '18:00', '2 Valandas', 48, 'Pirmadienis'),
(6, '18:00', '2 Valandas', 48, 'Treciadienis'),
(7, '09:00', '2 Valandas', 49, 'Pirmadienis'),
(8, '09:00', '2 Valandas', 49, 'Treciadienis');

-- --------------------------------------------------------

--
-- Table structure for table `pareigos`
--

CREATE TABLE `pareigos` (
  `id` int(11) NOT NULL,
  `pareiga` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paslaugos`
--

CREATE TABLE `paslaugos` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) NOT NULL,
  `kaina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `pradzia` datetime NOT NULL,
  `pabaiga` datetime NOT NULL,
  `fk_paslauga` int(11) NOT NULL,
  `fk_sutartis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sutarties_busenos`
--

CREATE TABLE `sutarties_busenos` (
  `id` int(11) NOT NULL,
  `busena` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sutartis`
--

CREATE TABLE `sutartis` (
  `nr` int(11) NOT NULL,
  `sudaryta` datetime NOT NULL,
  `busena` int(11) NOT NULL,
  `fk_klientas` int(11) NOT NULL,
  `fk_darbuotojas` int(11) NOT NULL,
  `fk_kursai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `grupe`
--
ALTER TABLE `grupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kursai_id` (`fk_kursai_id`),
  ADD KEY `fk_darbuotojo_id` (`fk_darbuotojo_id`);

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asmuo` (`fk_asmuo`);

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
-- Indexes for table `pareigos`
--
ALTER TABLE `pareigos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paslaugos`
--
ALTER TABLE `paslaugos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paslauga` (`fk_paslauga`),
  ADD KEY `fk_sutartis` (`fk_sutartis`);

--
-- Indexes for table `sutarties_busenos`
--
ALTER TABLE `sutarties_busenos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sutartis`
--
ALTER TABLE `sutartis`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `fk_busena` (`busena`),
  ADD KEY `fk_klientas` (`fk_klientas`),
  ADD KEY `fk_darbuotojas` (`fk_darbuotojas`),
  ADD KEY `fk_kursai` (`fk_kursai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  MODIFY `tabelio_nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `klientas`
--
ALTER TABLE `klientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursai`
--
ALTER TABLE `kursai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pamoka`
--
ALTER TABLE `pamoka`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pareigos`
--
ALTER TABLE `pareigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslaugos`
--
ALTER TABLE `paslaugos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sutarties_busenos`
--
ALTER TABLE `sutarties_busenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sutartis`
--
ALTER TABLE `sutartis`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `darbuotojas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE CASCADE,
  ADD CONSTRAINT `darbuotojas_ibfk_2` FOREIGN KEY (`tabelio_nr`) REFERENCES `grupe` (`fk_darbuotojo_id`) ON DELETE CASCADE;

--
-- Constraints for table `grupe`
--
ALTER TABLE `grupe`
  ADD CONSTRAINT `grupe_ibfk_1` FOREIGN KEY (`fk_kursai_id`) REFERENCES `kursai` (`id`);

--
-- Constraints for table `klientas`
--
ALTER TABLE `klientas`
  ADD CONSTRAINT `klientas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`);

--
-- Constraints for table `pamoka`
--
ALTER TABLE `pamoka`
  ADD CONSTRAINT `pamoka_ibfk_1` FOREIGN KEY (`fk_grupes_id`) REFERENCES `grupe` (`id`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`fk_paslauga`) REFERENCES `paslaugos` (`id`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`fk_sutartis`) REFERENCES `sutartis` (`nr`);

--
-- Constraints for table `sutartis`
--
ALTER TABLE `sutartis`
  ADD CONSTRAINT `sutartis_ibfk_2` FOREIGN KEY (`busena`) REFERENCES `sutarties_busenos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
