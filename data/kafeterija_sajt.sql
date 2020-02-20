-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 05:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kafeterija_sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `idAnketa` int(20) NOT NULL,
  `odgovor` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`idAnketa`, `odgovor`) VALUES
(1, 'Nescaffe'),
(2, 'Macchiato'),
(3, 'Macchiato'),
(4, 'Macchiato'),
(5, 'Macchiato'),
(6, 'Macchiato'),
(7, 'Macchiato'),
(8, 'Macchiato'),
(9, 'Macchiato'),
(10, 'Macchiato'),
(11, 'Macchiato'),
(12, 'Domaca'),
(13, 'Cappuccino'),
(14, 'Espresso'),
(15, 'Espresso'),
(16, 'Cappuccino'),
(17, 'Cappuccino'),
(18, 'Cappuccino'),
(19, 'Cappuccino'),
(20, 'Cappuccino'),
(21, 'Domaca'),
(22, 'Nescaffe'),
(23, 'Domaca'),
(24, 'Macchiato'),
(25, 'Macchiato'),
(26, 'Macchiato'),
(27, 'Nescaffe'),
(28, 'Macchiato');

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(1) NOT NULL,
  `naziv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `idSlika` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`idAutor`, `naziv`, `ime`, `prezime`, `sadrzaj`, `idSlika`) VALUES
(1, 'Autor', 'Predrag', 'Vučetić', 'Rođen u Čačku 3. marta 1994. godine, student Visoke škole strukovnih studija za informacione i komunikacione tehnologije u Beogradu.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `idGalerija` int(255) NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanjaMala` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`idGalerija`, `alt`, `putanja`, `putanjaMala`) VALUES
(17, 'Coffee', 'img/gallery/15821644281.jpg', 'img/gallery/new_15821644281.jpg'),
(18, 'Coffee', 'img/gallery/15821644502.jpg', 'img/gallery/new_15821644502.jpg'),
(19, 'Coffee', 'img/gallery/15821644563.jpg', 'img/gallery/new_15821644563.jpg'),
(20, 'Coffee', 'img/gallery/15821644594.jpg', 'img/gallery/new_15821644594.jpg'),
(21, 'Coffee', 'img/gallery/15821644645.jpg', 'img/gallery/new_15821644645.jpg'),
(22, 'Coffee', 'img/gallery/15821644696.jpg', 'img/gallery/new_15821644696.jpg'),
(23, 'Coffee', 'img/gallery/15821644747.jpg', 'img/gallery/new_15821644747.jpg'),
(24, 'Coffee', 'img/gallery/15821644788.jpg', 'img/gallery/new_15821644788.jpg'),
(25, 'Coffee', 'img/gallery/15821645109.jpg', 'img/gallery/new_15821645109.jpg'),
(26, 'Coffee', 'img/gallery/158216452010.jpg', 'img/gallery/new_158216452010.jpg'),
(27, 'Coffee', 'img/gallery/158216452411.jpg', 'img/gallery/new_158216452411.jpg'),
(28, 'Coffee', 'img/gallery/158216452712.jpg', 'img/gallery/new_158216452712.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(255) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `korisnickoIme` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL,
  `idUloga` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `korisnickoIme`, `email`, `lozinka`, `aktivan`, `idUloga`) VALUES
(1, 'Predrag', 'Vucetic', 'pedja.admin1', 'pedja.vucetic1@gmail.com', 'c20ed2b867fb409663f2f51286c270f0', b'1', 1),
(23, 'Predrag', 'Vucetic', 'adminpedja', 'pedja.vucetic@gmail.com', '7d71593ff4013f527a14ad66f5358353', b'1', 1),
(26, 'Mika111', 'Mikic', 'mika123', 'mika@gmail.com', 'e471a891c22fb1b5b722f57bed71de32', b'1', 2),
(31, 'Pera', 'Peric', 'pera12345', 'pera@gmail.com', 'bf676ed1364b5857fba69b5623c81b64', b'1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(20) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `naziv`, `putanja`) VALUES
(1, 'Početna', 'index.php?page=home'),
(2, 'O nama', 'index.php?page=about'),
(3, 'Proizvodi', 'index.php?page=product'),
(4, 'Kontakt', 'index.php?page=contact'),
(7, 'Logovanje', 'index.php?page=login');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPost` int(255) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datumObjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSlika` int(255) NOT NULL,
  `idKorisnik` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPost`, `naslov`, `sadrzaj`, `datumObjave`, `idSlika`, `idKorisnik`) VALUES
(1, 'Brazil', 'Brazil Crni dijamant je kafa koja odgovara poznavaocima dobrog espresa. Ovu vrstu karakterišu čokoladne note, puno telo, slatkoća i duga prijatna završnica. Odličan kada želite da se zasladite prirodnim aromama.', '2018-05-31 22:00:00', 1, 1),
(2, 'Columbia', 'Tonovi zrelog voća, slatkog lešnika i borovnice, usaglašeno telo, ali izuzetno kiselog ukusa. Note oraha i bobice ove kafe sa latinoameričkih plantaža odlično se uklapaju uz mafin šumsko voće. Pravi izbor za uživanje u kratkoj pauzi od učenja ili posla.', '2018-05-31 22:00:00', 2, 1),
(3, 'Costa Rica', 'Dobro telo i slatka aroma, naglašene kiselosti, voćnog i cvetnog ukusa. Za potpuni užitak, uz ovu kafu preporučujemo neki od citrusnih ceđenih sokova. ', '2018-05-31 22:00:00', 3, 1),
(4, 'Cuba', 'Vrlo lako se razaznaje među drugim kafama. Punog tela, bogate arome i karakterističnog blagog ukusa. Kombinacija orašastih plodova i čokolade. Svoj potpuni ukus dobija uz lešnik ili čokolada kroasan.', '2018-05-31 22:00:00', 4, 1),
(5, 'Ethiopia', 'Sadrži kiselkastu notu, ovu kafu karakterišu kao meku, sa cvetnom aromom, začinska i delikatna. Ovaj blagi espresso je idealan za one kojima jedna kafa nije dovoljna.', '2018-05-31 22:00:00', 5, 1),
(6, 'Guatemala', 'Nežna, intezivne kiselosti, punog tela i prijatnih vinskih nota. Odlična je posle ručka.', '2018-05-31 22:00:00', 6, 1),
(7, 'India', 'Vrlo lako se razaznaje među drugim kafama, punog tela, bogate arome i karakterističnog blagog ukusa. Zemljani tonovi. Njena kiselost se retko poredi sa drugim kafama. Slatka je, fino izbalansirana i vrlo složena, pa je tako često dodaju kao bazu ostalim blendovima. Savršena je za jutarnje razbuđivanje u kombinaciji sa kroasanom sa nutelom ili bademom.', '2018-05-31 22:00:00', 7, 1),
(8, 'Indonesia', 'Vrlo lako se razaznaje među drugim kafama, punog tela, bogate arome i karakterističnog, blagog ukusa. Uz ovu kafu slatke kiselosti, najbolje je kombinovati kroasan sa limunom za savršenu fuziju ukusa.', '2018-05-31 22:00:00', 8, 1),
(9, 'Kenya', 'Jaka aroma sa oštrom kiselošću, citrusnim ukusom crne borovnice, srednjeg tela. Jako dobra kombinacija slatko kisele borovnice i afričke egzotike u šoljici kafe.', '2018-05-31 22:00:00', 9, 1),
(10, 'Nicaragua', 'Cenjena je zbog naglašene kiselosti, blagih ukusa i svoje slatkoće. Ova fino izbalansirana kafa je od izuzetnog kvaliteta. Espresso za brzo jutarnje razbuđivanje i idealna kafa za poneti tokom užurbanih dana.', '2018-05-31 22:00:00', 10, 1),
(12, 'Night Blend', 'Kombinacija tri južnoameričke kafe bez kofeina - Honduras, Brazil, Guatemala. Kafa sa smanjenim sadržajem kofeina i idealan način da završite naporan dan.', '2018-05-31 22:00:00', 12, 1),
(13, 'Joanna\'s Blend', 'Džoana Blend je prva premijum mešavina iz serije specijanih blendova koja je kreirana u saradnji sa prvom ženom sveta u prženju kafe. Ako ste za citrusni espresso ili možda sladak kapućino ova kafa je prava alhemija na delu.', '2018-05-31 22:00:00', 13, 1),
(27, 'aaaa', 'aaaa', '2020-02-13 13:23:10', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `idSlika` int(255) NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`idSlika`, `alt`, `putanja`) VALUES
(1, 'Brazil', 'img/brazil.jpg'),
(2, 'Columbia', 'img/columbia.jpg'),
(3, 'Costa Rica', 'img/costarica.jpg'),
(4, 'Cuba', 'img/cuba.jpg'),
(5, 'Ethiopia', 'img/ethiopia.jpg'),
(6, 'Guatemala', 'img/guatemala.jpg'),
(7, 'India', 'img/india.jpg'),
(8, 'Indonesia', 'img/indonesia.jpg'),
(9, 'Kenya', 'img/kenya.jpg'),
(10, 'Nicaragua', 'img/nicaragua.jpg'),
(11, 'Blend', 'img/blend.jpg'),
(12, 'Night Blend', 'img/nightblend.jpg'),
(13, 'Joanna\'s Blend', 'img/joannasblend.jpg'),
(14, 'Author', 'img/author.jpg'),
(15, 'Aaaaaa', 'img/15300173224.jpg'),
(16, 'Aaaaaa', 'img/15300173304.jpg'),
(17, 'Aaaaaa', 'img/15300173664.jpg'),
(18, 'Aaaaaa', 'img/15300175744.jpg'),
(19, 'Aaaaaa', 'img/15300176354.jpg'),
(20, 'Aaaaaa', 'img/15300176844.jpg'),
(21, 'Aaaaaa', 'img/15300177524.jpg'),
(22, 'Aaaaaa', 'img/15300189324.jpg'),
(23, 'Aaaa', 'img/1553181520joannasblend.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(2) NOT NULL,
  `naziv` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `naziv`) VALUES
(1, 'administrator'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`idAnketa`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`),
  ADD KEY `idSlika` (`idSlika`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`idGalerija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idSlika` (`idSlika`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `idAnketa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `idGalerija` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `idSlika` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
