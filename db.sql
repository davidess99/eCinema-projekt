-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 01, 2020 at 08:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `dabing`
--

CREATE TABLE `dabing` (
  `id_dabingu` int(11) NOT NULL,
  `oznacenie_dabingu` varchar(2) NOT NULL,
  `nazov_dabingu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dabing`
--

INSERT INTO `dabing` (`id_dabingu`, `oznacenie_dabingu`, `nazov_dabingu`) VALUES
(1, 'OR', 'Originálna verzia'),
(2, 'SD', 'Slovenský dabing');

-- --------------------------------------------------------

--
-- Table structure for table `filmy`
--

CREATE TABLE `filmy` (
  `id_filmu` int(11) NOT NULL,
  `nazov` varchar(100) NOT NULL,
  `plagat` text NOT NULL,
  `rozlisenie_id_rozlisenia` int(11) NOT NULL,
  `dabing_id_dabingu` int(11) NOT NULL,
  `titulky_id_titulky` int(11) DEFAULT NULL,
  `vhodne_od` int(11) NOT NULL,
  `premiera` datetime NOT NULL,
  `dlzka_filmu_min` float NOT NULL,
  `rok_vyroby` year(4) NOT NULL,
  `link_trailer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`id_filmu`, `nazov`, `plagat`, `rozlisenie_id_rozlisenia`, `dabing_id_dabingu`, `titulky_id_titulky`, `vhodne_od`, `premiera`, `dlzka_filmu_min`, `rok_vyroby`, `link_trailer`) VALUES
(1, 'Nie je čas zomrieť', 'james-bond-no-time-to-die-i86328.jpg', 10, 1, 2, 18, '2029-11-20 20:00:00', 140, 2019, 'https://www.youtube.com/watch?v=BIhNsAtPbPI&t'),
(2, 'To Kapitola 2', '51NB383CKkL._AC_SL1200_.jpg', 10, 1, 2, 12, '2026-08-20 19:00:00', 210, 2019, 'https://www.youtube.com/watch?v=zqUopiAYdRg'),
(4, 'Vtáky noci a fantastický prerod jednej Harley Quinn', 'bop-postersk23.jpg', 10, 1, 2, 15, '2020-11-05 14:23:00', 108, 2020, 'https://www.youtube.com/watch?v=rtIh5vCCoBE'),
(6, 'My', 'my.jpg', 10, 1, 2, 18, '2020-11-05 18:00:00', 129, 2019, 'https://www.youtube.com/watch?v=mPUnxTJxECM'),
(8, 'Doktor Spánok', 'dr_spanok1.jpg', 10, 1, 2, 12, '2020-11-05 16:03:00', 153, 2020, 'https://www.youtube.com/watch?v=8Nb8i4KJ0Qk');

-- --------------------------------------------------------

--
-- Table structure for table `filmy_herci`
--

CREATE TABLE `filmy_herci` (
  `id_film_herca` int(11) NOT NULL,
  `filmy_id_filmu` int(11) NOT NULL,
  `herci_id_herca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy_herci`
--

INSERT INTO `filmy_herci` (`id_film_herca`, `filmy_id_filmu`, `herci_id_herca`) VALUES
(1, 8, 1),
(3, 6, 14),
(4, 2, 4),
(5, 2, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 8, 9),
(10, 8, 10),
(11, 4, 11),
(12, 4, 12),
(13, 4, 13),
(14, 6, 15),
(15, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `filmy_krajiny`
--

CREATE TABLE `filmy_krajiny` (
  `id_film_krajiny` int(11) NOT NULL,
  `filmy_id_filmu` int(11) NOT NULL,
  `krajiny_povodu_id_krajiny` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy_krajiny`
--

INSERT INTO `filmy_krajiny` (`id_film_krajiny`, `filmy_id_filmu`, `krajiny_povodu_id_krajiny`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `filmy_reziseri`
--

CREATE TABLE `filmy_reziseri` (
  `id_film_rezisera` int(11) NOT NULL,
  `filmy_id_filmu` int(11) NOT NULL,
  `reziseri_id_rezisera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy_reziseri`
--

INSERT INTO `filmy_reziseri` (`id_film_rezisera`, `filmy_id_filmu`, `reziseri_id_rezisera`) VALUES
(1, 2, 2),
(3, 6, 6),
(4, 2, 1),
(5, 1, 3),
(6, 8, 4),
(7, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `filmy_zanre`
--

CREATE TABLE `filmy_zanre` (
  `id_film_zanru` int(11) NOT NULL,
  `filmy_id_filmu` int(11) NOT NULL,
  `zanre_filmu_id_zanru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmy_zanre`
--

INSERT INTO `filmy_zanre` (`id_film_zanru`, `filmy_id_filmu`, `zanre_filmu_id_zanru`) VALUES
(1, 1, 3),
(2, 4, 1),
(3, 1, 5),
(4, 8, 6),
(5, 2, 6),
(6, 2, 5),
(7, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `herci`
--

CREATE TABLE `herci` (
  `id_herca` int(11) NOT NULL,
  `meno` varchar(60) NOT NULL,
  `priezvisko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herci`
--

INSERT INTO `herci` (`id_herca`, `meno`, `priezvisko`) VALUES
(1, 'Tom', 'Holland'),
(3, 'Haley', 'Bennett'),
(4, 'Jessica', 'Chastainová'),
(5, 'Bill', 'Hader'),
(6, 'Daniel', 'Craig'),
(7, 'Rami', 'Malek'),
(8, 'Léa', 'Seydouxová'),
(9, 'Ewan', 'McGregor'),
(10, 'Rebecca', 'Ferguson'),
(11, 'Margot', 'Robbie'),
(12, 'Mary', 'Elizabeth Winstead'),
(13, 'Jurnee', 'Smollett-Bell'),
(14, 'Lupita', 'Nyong\'o'),
(15, 'Winston', 'Duke'),
(16, 'Shahadi', 'Wright Joseph');

-- --------------------------------------------------------

--
-- Table structure for table `krajiny`
--

CREATE TABLE `krajiny` (
  `id_krajiny` int(11) NOT NULL,
  `krajina` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `krajiny`
--

INSERT INTO `krajiny` (`id_krajiny`, `krajina`) VALUES
(1, 'USA'),
(3, 'Slovensko');

-- --------------------------------------------------------

--
-- Table structure for table `platobne_udaje`
--

CREATE TABLE `platobne_udaje` (
  `id_plat_udaja` int(11) NOT NULL,
  `zakaznici_id_zakaznika` int(11) NOT NULL,
  `cislo_karty` varchar(16) NOT NULL,
  `platnost_karty` varchar(5) NOT NULL,
  `cvv_kod` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platobne_udaje`
--

INSERT INTO `platobne_udaje` (`id_plat_udaja`, `zakaznici_id_zakaznika`, `cislo_karty`, `platnost_karty`, `cvv_kod`) VALUES
(2, 2, 'SK09299299192727', '04/25', '152'),
(3, 1, 'SK03215432222222', '12/21', '333');

-- --------------------------------------------------------

--
-- Table structure for table `premietanie`
--

CREATE TABLE `premietanie` (
  `id_premietania` int(11) NOT NULL,
  `filmy_id_filmu` int(11) NOT NULL,
  `saly_id_saly` int(11) NOT NULL,
  `datum_cas` datetime NOT NULL,
  `cena` float NOT NULL,
  `cena_zlava` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `premietanie`
--

INSERT INTO `premietanie` (`id_premietania`, `filmy_id_filmu`, `saly_id_saly`, `datum_cas`, `cena`, `cena_zlava`) VALUES
(1, 2, 14, '2020-11-19 18:00:00', 5.5, 3.2),
(2, 4, 3, '2020-11-11 14:47:00', 199.99, 59.99);

-- --------------------------------------------------------

--
-- Table structure for table `reziseri`
--

CREATE TABLE `reziseri` (
  `id_rezisera` int(11) NOT NULL,
  `meno` varchar(60) NOT NULL,
  `priezvisko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reziseri`
--

INSERT INTO `reziseri` (`id_rezisera`, `meno`, `priezvisko`) VALUES
(1, 'Antonio', 'Campos'),
(2, 'Stephen', 'King'),
(3, 'Cary', 'Fukunaga'),
(4, 'Mike', 'Flanagan'),
(5, 'Cathy', 'Yan'),
(6, 'Jordan', 'Peele');

-- --------------------------------------------------------

--
-- Table structure for table `roly_zamestnancov`
--

CREATE TABLE `roly_zamestnancov` (
  `id_roly` int(11) NOT NULL,
  `rola` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roly_zamestnancov`
--

INSERT INTO `roly_zamestnancov` (`id_roly`, `rola`) VALUES
(1, 'admin'),
(2, 'programový riaditeľ'),
(4, 'účtovník/a');

-- --------------------------------------------------------

--
-- Table structure for table `rozlisenie`
--

CREATE TABLE `rozlisenie` (
  `id_rozlisenia` int(11) NOT NULL,
  `rozlisenie` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rozlisenie`
--

INSERT INTO `rozlisenie` (`id_rozlisenia`, `rozlisenie`) VALUES
(1, '2D'),
(2, '3D'),
(9, 'HD'),
(10, '4K');

-- --------------------------------------------------------

--
-- Table structure for table `saly`
--

CREATE TABLE `saly` (
  `id_saly` int(11) NOT NULL,
  `oznacenie` varchar(3) NOT NULL,
  `pct_miest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saly`
--

INSERT INTO `saly` (`id_saly`, `oznacenie`, `pct_miest`) VALUES
(1, 'A01', 1),
(3, 'C28', 23),
(13, 'DSD', 222),
(14, 'ALZ', 21),
(15, 'MAL', 99);

-- --------------------------------------------------------

--
-- Table structure for table `titulky`
--

CREATE TABLE `titulky` (
  `id_titulky` int(11) NOT NULL,
  `oznacenie_titulky` varchar(2) NOT NULL,
  `nazov_titulky` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titulky`
--

INSERT INTO `titulky` (`id_titulky`, `oznacenie_titulky`, `nazov_titulky`) VALUES
(1, 'ČT', 'České titulky'),
(2, 'ST', 'Slovenské titulky');

-- --------------------------------------------------------

--
-- Table structure for table `zakaznici`
--

CREATE TABLE `zakaznici` (
  `id_zakaznika` int(11) NOT NULL,
  `meno` varchar(50) NOT NULL,
  `priezvisko` varchar(60) NOT NULL,
  `datum_narodenia` date NOT NULL,
  `pohlavie` varchar(4) NOT NULL,
  `email` varchar(60) NOT NULL,
  `heslo` varchar(60) DEFAULT NULL,
  `tel_cislo` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zakaznici`
--

INSERT INTO `zakaznici` (`id_zakaznika`, `meno`, `priezvisko`, `datum_narodenia`, `pohlavie`, `email`, `heslo`, `tel_cislo`) VALUES
(1, 'Kristián', 'Valčo', '2003-09-15', 'muž', 'kristianvalco@centrum.com', '6cc3b03f7e6dacdc3217a000aa812964', '0914 980 998'),
(2, 'Alexandra', 'Sabolová', '2004-08-01', 'žena', 'alexsabol@gmail.com', 'c9bc92ee726484b017784e2f8944f3ad', '0914 985 944');

-- --------------------------------------------------------

--
-- Table structure for table `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `id_zamestnanca` int(11) NOT NULL,
  `meno` varchar(40) NOT NULL,
  `priezvisko` varchar(60) NOT NULL,
  `datum_narodenia` date NOT NULL,
  `pohlavie` varchar(4) NOT NULL,
  `email` varchar(60) NOT NULL,
  `heslo` varchar(60) NOT NULL,
  `tel_cislo` varchar(12) NOT NULL,
  `roly_zamestnancov_id_roly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zamestnanci`
--

INSERT INTO `zamestnanci` (`id_zamestnanca`, `meno`, `priezvisko`, `datum_narodenia`, `pohlavie`, `email`, `heslo`, `tel_cislo`, `roly_zamestnancov_id_roly`) VALUES
(2, 'Dávid', 'Sabol', '1999-07-29', 'muž', 'david.sabolcak@gmail.com', '01f0ea193539c18d3c0f0b088a31fb94', '0915 499 943', 1),
(4, 'Kiko', 'Bennett', '2020-11-21', 'muž', 'kiko@centrum.sk', '955db0b81ef1989b4a4dfeae8061a9a6', '0914 980 998', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zanre`
--

CREATE TABLE `zanre` (
  `id_zanru` int(11) NOT NULL,
  `zaner` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanre`
--

INSERT INTO `zanre` (`id_zanru`, `zaner`) VALUES
(1, 'Komédia'),
(3, 'Triler'),
(4, 'Rodinný'),
(5, 'Akčný'),
(6, 'Horor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dabing`
--
ALTER TABLE `dabing`
  ADD PRIMARY KEY (`id_dabingu`);

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`),
  ADD KEY `dabing_id_dabingu` (`dabing_id_dabingu`),
  ADD KEY `rozlisenie_id_rozlisenia` (`rozlisenie_id_rozlisenia`),
  ADD KEY `titulky_id_titulky` (`titulky_id_titulky`);

--
-- Indexes for table `filmy_herci`
--
ALTER TABLE `filmy_herci`
  ADD PRIMARY KEY (`id_film_herca`),
  ADD KEY `filmy_id_filmu` (`filmy_id_filmu`),
  ADD KEY `herci_id_herca` (`herci_id_herca`);

--
-- Indexes for table `filmy_krajiny`
--
ALTER TABLE `filmy_krajiny`
  ADD PRIMARY KEY (`id_film_krajiny`),
  ADD KEY `filmy_id_filmu` (`filmy_id_filmu`),
  ADD KEY `krajiny_povodu_id_krajiny` (`krajiny_povodu_id_krajiny`);

--
-- Indexes for table `filmy_reziseri`
--
ALTER TABLE `filmy_reziseri`
  ADD PRIMARY KEY (`id_film_rezisera`),
  ADD KEY `filmy_id_filmu` (`filmy_id_filmu`),
  ADD KEY `reziseri_id_rezisera` (`reziseri_id_rezisera`);

--
-- Indexes for table `filmy_zanre`
--
ALTER TABLE `filmy_zanre`
  ADD PRIMARY KEY (`id_film_zanru`),
  ADD KEY `filmy_id_filmu` (`filmy_id_filmu`),
  ADD KEY `zanre_filmu_id_zanru` (`zanre_filmu_id_zanru`);

--
-- Indexes for table `herci`
--
ALTER TABLE `herci`
  ADD PRIMARY KEY (`id_herca`);

--
-- Indexes for table `krajiny`
--
ALTER TABLE `krajiny`
  ADD PRIMARY KEY (`id_krajiny`);

--
-- Indexes for table `platobne_udaje`
--
ALTER TABLE `platobne_udaje`
  ADD PRIMARY KEY (`id_plat_udaja`),
  ADD KEY `zakaznici_id_zakaznika` (`zakaznici_id_zakaznika`);

--
-- Indexes for table `premietanie`
--
ALTER TABLE `premietanie`
  ADD PRIMARY KEY (`id_premietania`),
  ADD KEY `filmy_id_filmu` (`filmy_id_filmu`),
  ADD KEY `saly_id_saly` (`saly_id_saly`);

--
-- Indexes for table `reziseri`
--
ALTER TABLE `reziseri`
  ADD PRIMARY KEY (`id_rezisera`);

--
-- Indexes for table `roly_zamestnancov`
--
ALTER TABLE `roly_zamestnancov`
  ADD PRIMARY KEY (`id_roly`);

--
-- Indexes for table `rozlisenie`
--
ALTER TABLE `rozlisenie`
  ADD PRIMARY KEY (`id_rozlisenia`);

--
-- Indexes for table `saly`
--
ALTER TABLE `saly`
  ADD PRIMARY KEY (`id_saly`);

--
-- Indexes for table `titulky`
--
ALTER TABLE `titulky`
  ADD PRIMARY KEY (`id_titulky`);

--
-- Indexes for table `zakaznici`
--
ALTER TABLE `zakaznici`
  ADD PRIMARY KEY (`id_zakaznika`);

--
-- Indexes for table `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id_zamestnanca`),
  ADD KEY `roly_zamestnancov_id_roly` (`roly_zamestnancov_id_roly`);

--
-- Indexes for table `zanre`
--
ALTER TABLE `zanre`
  ADD PRIMARY KEY (`id_zanru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dabing`
--
ALTER TABLE `dabing`
  MODIFY `id_dabingu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_filmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `filmy_herci`
--
ALTER TABLE `filmy_herci`
  MODIFY `id_film_herca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `filmy_krajiny`
--
ALTER TABLE `filmy_krajiny`
  MODIFY `id_film_krajiny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filmy_reziseri`
--
ALTER TABLE `filmy_reziseri`
  MODIFY `id_film_rezisera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `filmy_zanre`
--
ALTER TABLE `filmy_zanre`
  MODIFY `id_film_zanru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `herci`
--
ALTER TABLE `herci`
  MODIFY `id_herca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `krajiny`
--
ALTER TABLE `krajiny`
  MODIFY `id_krajiny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `platobne_udaje`
--
ALTER TABLE `platobne_udaje`
  MODIFY `id_plat_udaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `premietanie`
--
ALTER TABLE `premietanie`
  MODIFY `id_premietania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reziseri`
--
ALTER TABLE `reziseri`
  MODIFY `id_rezisera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roly_zamestnancov`
--
ALTER TABLE `roly_zamestnancov`
  MODIFY `id_roly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rozlisenie`
--
ALTER TABLE `rozlisenie`
  MODIFY `id_rozlisenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saly`
--
ALTER TABLE `saly`
  MODIFY `id_saly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `titulky`
--
ALTER TABLE `titulky`
  MODIFY `id_titulky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zakaznici`
--
ALTER TABLE `zakaznici`
  MODIFY `id_zakaznika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id_zamestnanca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zanre`
--
ALTER TABLE `zanre`
  MODIFY `id_zanru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmy`
--
ALTER TABLE `filmy`
  ADD CONSTRAINT `filmy_ibfk_1` FOREIGN KEY (`dabing_id_dabingu`) REFERENCES `dabing` (`id_dabingu`),
  ADD CONSTRAINT `filmy_ibfk_2` FOREIGN KEY (`rozlisenie_id_rozlisenia`) REFERENCES `rozlisenie` (`id_rozlisenia`),
  ADD CONSTRAINT `filmy_ibfk_3` FOREIGN KEY (`titulky_id_titulky`) REFERENCES `titulky` (`id_titulky`);

--
-- Constraints for table `filmy_herci`
--
ALTER TABLE `filmy_herci`
  ADD CONSTRAINT `filmy_herci_ibfk_1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `filmy_herci_ibfk_2` FOREIGN KEY (`herci_id_herca`) REFERENCES `herci` (`id_herca`);

--
-- Constraints for table `filmy_krajiny`
--
ALTER TABLE `filmy_krajiny`
  ADD CONSTRAINT `filmy_krajiny_ibfk_1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `filmy_krajiny_ibfk_2` FOREIGN KEY (`krajiny_povodu_id_krajiny`) REFERENCES `krajiny` (`id_krajiny`);

--
-- Constraints for table `filmy_reziseri`
--
ALTER TABLE `filmy_reziseri`
  ADD CONSTRAINT `filmy_reziseri_ibfk_1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `filmy_reziseri_ibfk_2` FOREIGN KEY (`reziseri_id_rezisera`) REFERENCES `reziseri` (`id_rezisera`);

--
-- Constraints for table `filmy_zanre`
--
ALTER TABLE `filmy_zanre`
  ADD CONSTRAINT `filmy_zanre_ibfk_1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `filmy_zanre_ibfk_2` FOREIGN KEY (`zanre_filmu_id_zanru`) REFERENCES `zanre` (`id_zanru`);

--
-- Constraints for table `platobne_udaje`
--
ALTER TABLE `platobne_udaje`
  ADD CONSTRAINT `platobne_udaje_ibfk_1` FOREIGN KEY (`zakaznici_id_zakaznika`) REFERENCES `zakaznici` (`id_zakaznika`);

--
-- Constraints for table `premietanie`
--
ALTER TABLE `premietanie`
  ADD CONSTRAINT `premietanie_ibfk_1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`),
  ADD CONSTRAINT `premietanie_ibfk_2` FOREIGN KEY (`saly_id_saly`) REFERENCES `saly` (`id_saly`);

--
-- Constraints for table `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD CONSTRAINT `zamestnanci_ibfk_1` FOREIGN KEY (`roly_zamestnancov_id_roly`) REFERENCES `roly_zamestnancov` (`id_roly`);
