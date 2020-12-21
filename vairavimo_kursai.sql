-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 02:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('vvv', 'vvvvvv', 'vv@v.v', '123', '1234', 'darbuotojas', '', 0, 0, NULL),
('qwe', 'qwe', 'p@p.t', '123', '1234123', 'darbuotojas', '', 0, 0, '2020-12-19 00:00:00'),
('qwe', 'qwe', 'p@ap.t', '123', '12341232', 'klientas', '', 0, 0, NULL),
('tautvis', 'bestas', 't@t.t', '123', '12345', 'klientas', '', 0, 0, NULL),
('Tautvydas', 'Rušas', 'tadas@gmail.com', '123', '144', 'administratorius', 'ea5d2f1c4608232e07d3aa3d998e5135', 0, 1, '2020-12-19 00:00:00'),
('Matas', 'Darbuotojas', 'darb@gmail.com', 'f34df71f04037b27cfd7bf13958970adf876d5b9', '163', 'darbuotojas', 'f61d6947467ccd3aa5af24db320235dd', 1, 1, '2020-12-20 00:00:00'),
('er', 'asd', 'zaidimamms@gmail.com', 'ąčę', '323232', 'klientas', 'e57c6b956a6521b28495f2886ca0977a', 1, 1, '2020-12-19 00:00:00'),
('erikas', 'masiris', 'zaidi@gmail.com', '869bb05863f7b336ce65ab981433d38d4e9d97dd', '33331111', 'klientas', 'e2c0be24560d78c5e599c2a9c9d0bbd2', 1, 1, '2020-12-20 00:00:00'),
('Mantas', 'Matijosaitis', 'mantik78@gmail.com', 'b5410e807b7b2073446788ce8f3e48f019fae20c', '369020472', 'klientas', '31839b036f63806cba3f47b93af8ccb5', 1, 1, '2020-12-20 00:00:00'),
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
  `fk_asmuo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `darbuotojas`
--

INSERT INTO `darbuotojas` (`tabelio_nr`, `dirba_nuo`, `pareigos`, `fk_asmuo`) VALUES
(21, '2020-12-14 16:31:13', 'teorijos', '144'),
(22, '2020-12-06 16:42:05', 'praktikos', '12345');

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
(1, '2020-12-08 09:00:00', 27);

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
('33331111', 1, 0);

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
  `grupe_sukurta` datetime DEFAULT NULL,
  `busena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`pavadinimas`, `fk_kursai_id`, `fk_darbuotojo_id`, `id`, `numatyta_data`, `vietu_kiekis`, `numatyta_data_iki`, `grupe_sukurta`, `busena`) VALUES
('Grup?1', 1, 21, 51, '2020-12-16', 29, '2021-02-14', '2020-12-19 21:45:49', 'registracija'),
('Grup?2', 1, 22, 52, '2020-12-24', 30, '2020-12-30', NULL, 'registracija'),
('Grupe2', 2, 22, 53, '2020-12-24', 30, '2020-12-30', '0000-00-00 00:00:00', 'registracija');

-- --------------------------------------------------------

--
-- Table structure for table `grupes_nariai`
--

CREATE TABLE `grupes_nariai` (
  `fk_klientas` varchar(50) DEFAULT NULL,
  `fk_grupes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupes_nariai`
--

INSERT INTO `grupes_nariai` (`fk_klientas`, `fk_grupes_id`) VALUES
('33331111', 51);

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
(5, 'B Kategorija', 'rytinis', 300);

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
(1, '09:00', '2 Valandas', 51, 'Pirmadienis'),
(2, '09:00', '2 Valandas', 51, 'Treciadienis');

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
  `fk_darbuotojas_tabelio_nr` int(11) NOT NULL,
  `ar_uzimta` int(11) NOT NULL,
  `fk_asmuo_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ar_egzaminas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, '2020-12-19 00:00:00', '323232', 1),
(9, '2020-12-20 00:00:00', '33331111', 1);

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
  MODIFY `tabelio_nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `egzaminas`
--
ALTER TABLE `egzaminas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kursai`
--
ALTER TABLE `kursai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pamoka`
--
ALTER TABLE `pamoka`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paslaugos`
--
ALTER TABLE `paslaugos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `praktiniu_tvarkarastis`
--
ALTER TABLE `praktiniu_tvarkarastis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sutartis`
--
ALTER TABLE `sutartis`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `darbuotojas_ibfk_1` FOREIGN KEY (`fk_asmuo`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE CASCADE;

--
-- Constraints for table `egzamino_nariai`
--
ALTER TABLE `egzamino_nariai`
  ADD CONSTRAINT `egzamino_nariai_ibfk_1` FOREIGN KEY (`fk_klientas`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `egzamino_nariai_ibfk_2` FOREIGN KEY (`fk_egzamino_id`) REFERENCES `egzaminas` (`id`);

--
-- Constraints for table `grupe`
--
ALTER TABLE `grupe`
  ADD CONSTRAINT `grupe_ibfk_1` FOREIGN KEY (`fk_kursai_id`) REFERENCES `kursai` (`id`),
  ADD CONSTRAINT `grupe_ibfk_2` FOREIGN KEY (`fk_darbuotojo_id`) REFERENCES `darbuotojas` (`tabelio_nr`);

--
-- Constraints for table `grupes_nariai`
--
ALTER TABLE `grupes_nariai`
  ADD CONSTRAINT `grupes_nariai_ibfk_1` FOREIGN KEY (`fk_klientas`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupes_nariai_ibfk_2` FOREIGN KEY (`fk_grupes_id`) REFERENCES `grupe` (`id`);

--
-- Constraints for table `pamoka`
--
ALTER TABLE `pamoka`
  ADD CONSTRAINT `pamoka_ibfk_1` FOREIGN KEY (`fk_grupes_id`) REFERENCES `grupe` (`id`);

--
-- Constraints for table `praktiniu_tvarkarastis`
--
ALTER TABLE `praktiniu_tvarkarastis`
  ADD CONSTRAINT `praktiniu_tvarkarastis_ibfk_1` FOREIGN KEY (`fk_darbuotojas_tabelio_nr`) REFERENCES `darbuotojas` (`tabelio_nr`),
  ADD CONSTRAINT `praktiniu_tvarkarastis_ibfk_2` FOREIGN KEY (`fk_asmuo_id`) REFERENCES `asmuo` (`asmens_kodas`) ON DELETE SET NULL ON UPDATE NO ACTION;

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
