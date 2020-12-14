-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 07:59 PM
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
  `Ar_aktyvuotas_nuot` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asmuo`
--

INSERT INTO `asmuo` (`vardas`, `pavarde`, `el_pastas`, `slaptazodis`, `asmens_kodas`, `role`, `tokenas`, `Ar_aktyvuotas`, `Ar_aktyvuotas_nuot`) VALUES
('Testas1', 'Test1', 'test@t.t', '123', '123', 'klientas', '', 0, 0),
('vvv', 'vvvvvv', 'vv@v.v', '123', '1234', 'klientas', '', 0, 0),
('qwe', 'qwe', 'p@p.t', '123', '1234123', 'klientas', '', 0, 0),
('qwe', 'qwe', 'p@ap.t', '123', '12341232', 'klientas', '', 0, 0),
('tt', 'rr', 't@t.t', '123', '12345', 'klientas', '', 0, 0),
('erikas', 'mldc', 'zaidimamms@gmail.com', 'ą23', '32323', 'klientas', '67d96d458abdef21792e6d8e590244e7', 1, 1),
('Vilius', 'gec', 'gecas97@gmail.com', '123', '5002', 'klientas', '8c7bbbba95c1025975e548cee86dfadc', 1, 0),
('Mantas', 'Mantas', 'Mantas@mantas.mantas', '123', '777777', 'klientas', '', 0, 0);

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
  `numatyta_data` int(11) NOT NULL,
  `vietu_kiekis` int(11) NOT NULL,
  `numatyta_data_iki` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `nuotraukos`
--

CREATE TABLE `nuotraukos` (
  `location` varchar(50) NOT NULL,
  `vartotojo_id` varchar(50) NOT NULL,
  `busena` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='0 - laukiama , 1 patvirtinta, 2 - atmesta';

--
-- Dumping data for table `nuotraukos`
--

INSERT INTO `nuotraukos` (`location`, `vartotojo_id`, `busena`) VALUES
('./uploads/32323nuostabus-pauksciai-foto-2493.jpg', '32323', 0),
('./uploads/32323nuostabus-pauksciai-foto-2493.jpg', '32323', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asmuo` (`fk_asmuo`);

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
  MODIFY `tabelio_nr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klientas`
--
ALTER TABLE `klientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `darbuotojas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`);

--
-- Constraints for table `klientas`
--
ALTER TABLE `klientas`
  ADD CONSTRAINT `klientas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`);

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
  ADD CONSTRAINT `sutartis_ibfk_1` FOREIGN KEY (`fk_darbuotojas`) REFERENCES `darbuotojas` (`tabelio_nr`),
  ADD CONSTRAINT `sutartis_ibfk_2` FOREIGN KEY (`busena`) REFERENCES `sutarties_busenos` (`id`),
  ADD CONSTRAINT `sutartis_ibfk_3` FOREIGN KEY (`fk_klientas`) REFERENCES `klientas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
