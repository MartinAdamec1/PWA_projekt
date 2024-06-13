-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 09:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `administratorska_prava` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `administratorska_prava`) VALUES
(8, 'Martin', '$2y$10$UMs1cdGHYyJAGu55LmkZDufe2ZQ8FO7Nml3KRCuknMf9tvdQ4jxqq', 'Martin', 'Martin', 'Martin@Martin.Martin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `category`, `title`, `content`, `image`, `archive`, `about`) VALUES
(8, 'sport', 'Slavljenje Nakon Gola', 'Postizanje gola u nogometu jedan je od najuzbudljivijih trenutaka u sportu, trenutak koji može preokrenuti utakmicu i raspiriti emocije igrača i navijača. Slavljenje nakon gola postalo je integralni dio igre, ritual koji odražava individualnost igrača, povezanost s navijačima i kulturu kluba. Iako se čini kao spontana radost, slavljenje gola ima duboke korijene u povijesti nogometa i nosi sa sobom značajno značenje.\r\n\r\nPovijest slavljenja golova\r\n\r\nPrva dokumentirana slavljenja golova bila su skromna i suzdržana. U ranim danima nogometa, igrači su često samo kratko podizali ruke ili kimali glavom prema navijačima. Međutim, s vremenom je slavljenje postalo sve ekspresivnije i kreativnije. U 1960-ima i 1970-ima, s porastom medijske pokrivenosti i televizijskih prijenosa, igrači su počeli koristiti slavljenja kao način izražavanja osobnog stila i komuniciranja s navijačima.\r\n\r\nKreativnost i individualnost\r\n\r\nJedan od najpoznatijih primjera kreativnog slavljenja je Roger Milla, kamerunski napadač koji je na Svjetskom prvenstvu 1990. godine proslavio svoje golove plesom pored korner zastavice. Njegova radost i plesni pokreti postali su simbol radosti nogometa i inspirirali mnoge igrače da razviju vlastite stilove slavljenja. Milla je pokazao kako slavljenje može biti umjetnost, izraz kulturne identiteta i način povezivanja s navijačima.\r\n\r\nSlavljenje kao simbol povezanosti\r\n\r\nSlavljenje gola također je način na koji igrači pokazuju solidarnost i timski duh. Kada igrač postigne gol, često mu se pridružuju suigrači u zajedničkom slavlju. Ovaj trenutak zajedništva jača timski moral i pokazuje navijačima jedinstvo ekipe. Posebno emotivna slavljenja mogu se vidjeti u trenucima kada gol odlučuje utakmicu ili turnir. U takvim trenucima, slavljenje postaje simbol zajedničkog napora, žrtve i postignuća cijelog tima.\r\n\r\nKontroverze i pravila\r\n\r\nUnatoč radosti koju donosi, slavljenje golova ponekad može biti izvor kontroverze. Primjerice, pretjerano provokativna slavljenja mogu izazvati tenzije među igračima i navijačima. Zbog toga, nogometne organizacije kao što su FIFA i UEFA uvele su pravila koja reguliraju ponašanje igrača nakon postizanja gola. Igrači mogu biti kažnjeni žutim kartonom za nesportsko ponašanje, kao što su skidanje majice ili provokativni gestovi prema protivničkim navijačima.\r\n\r\nNajpoznatija slavljenja kroz povijest\r\n\r\nMnoge ikoničke proslave ostale su u sjećanju ljubitelja nogometa. Primjerice, slavni \"Siu\" Cristiana Ronalda, skok i vrtnja u zraku s karakterističnim uzvikom, postao je njegov zaštitni znak i prepoznatljiv širom svijeta. Lionel Messi, s druge strane, često podiže ruke prema nebu, posvećujući svoje golove baki koja je imala ključnu ulogu u njegovom nogometnom razvoju.\r\n\r\nZaključak\r\n\r\nSlavljenje nakon gola mnogo je više od pukog izraza radosti. To je trenutak koji odražava individualnost igrača, povezanost s timom i navijačima te bogatu povijest i kulturu nogometa. Od skromnih početaka do spektakularnih proslava današnjice, slavljenje golova evoluiralo je u simbol strasti, kreativnosti i zajedništva koje čini nogomet najljepšom sporednom stvari na svijetu.', 'iStock-954142740.jpg', 0, 'Slavljenje nakon gola u nogometu nije samo trenutak radosti za igrače i navijače'),
(9, 'Sport', 'Dječji Nogomet: Temelj Strasti', 'Nogomet je najpopularniji sport na svijetu, a ljubav prema igri često počinje još u ranom djetinjstvu. Dječji nogomet igra ključnu ulogu u razvoju budućih nogometnih zvijezda, ali još važnije, pomaže djeci u razvoju fizičkih, socijalnih i emocionalnih vještina. Kroz igru, djeca uče vrijedne lekcije koje će im služiti tijekom cijelog života.\r\n\r\nRazvoj fizičkih vještina\r\n\r\nDječji nogomet potiče razvoj osnovnih motoričkih vještina kao što su trčanje, koordinacija, ravnoteža i agilnost. Redovito treniranje i igra na terenu pomažu djeci da razviju snagu, izdržljivost i brzinu. Ovi fizički atributi ne samo da poboljšavaju njihove sportske performanse, već i promiču zdrav način života. Fizička aktivnost u ranoj dobi smanjuje rizik od pretilosti i drugih zdravstvenih problema.\r\n\r\nTimski duh i društvene vještine\r\n\r\nJedna od najvažnijih lekcija koju djeca uče kroz nogomet je važnost timskog rada. Igra u timu uči djecu kako surađivati, komunicirati i razvijati osjećaj odgovornosti prema suigračima. Razumijevanje i poštivanje uloga unutar tima ključni su elementi uspjeha, a djeca kroz igru uče kako prepoznati i cijeniti doprinos svakog člana ekipe.\r\n\r\nSamopouzdanje i emocionalni razvoj\r\n\r\nPostizanje ciljeva i uspjeha na nogometnom terenu pomaže djeci u izgradnji samopouzdanja. Bilo da se radi o uspješnom driblingu, dobrom dodavanju ili postizanju gola, svaki pozitivan trenutak jača njihovu vjeru u vlastite sposobnosti. Osim toga, nogomet uči djecu kako se nositi s uspjehom i neuspjehom. Pobjede donose radost, ali porazi pružaju priliku za učenje i osobni rast.\r\n\r\nDječji nogomet kao temelj strasti\r\n\r\nMnogi vrhunski nogometaši počeli su svoju karijeru igrajući nogomet kao djeca u lokalnim klubovima ili na ulici. Strast prema nogometu često se rađa u tim ranima godinama kada je igra najčistija i najspontanija. Bez pritiska profesionalnog sporta, djeca igraju iz čiste ljubavi prema igri. Ova strast često ostaje s njima kroz cijeli život, bilo da postanu profesionalni sportaši ili jednostavno uživaju u nogometu kao rekreativci.\r\n\r\nUloga trenera i roditelja\r\n\r\nTreneri i roditelji imaju ključnu ulogu u razvoju dječjeg nogometa. Dobri treneri ne samo da podučavaju tehničke i taktičke aspekte igre, već i inspiriraju djecu, motiviraju ih i pružaju podršku. Roditelji, s druge strane, trebaju biti pozitivni uzori, potičući sportsku etiku, fair play i ljubav prema igri bez prevelikog pritiska na rezultate.\r\n\r\nOrganizirani dječji nogomet\r\n\r\nOrganizirani dječji nogomet pruža strukturu i prilike za natjecanje koje pomažu djeci da razviju svoje vještine na višoj razini. Klubovi, lige i turniri omogućuju djeci da iskuse različite aspekte igre, od natjecateljskog duha do strategije i taktičkog razmišljanja. Uz to, natjecanja pružaju priliku za stvaranje prijateljstava i zajedništva među mladim sportašima.\r\n\r\nZaključak\r\n\r\nDječji nogomet je mnogo više od same igre. To je platforma za razvoj fizičkih, socijalnih i emocionalnih vještina koje će djeci služiti tijekom cijelog života. Kroz igru, djeca uče važnost timskog rada, grade samopouzdanje i razvijaju strast prema sportu. Dječji nogomet postavlja temelje za zdrav i aktivan život, dok istovremeno njeguje ljubav prema najpopularnijoj igri na svijetu.', 'Youth-soccer-indiana.jpg', 0, 'Dječji nogomet razvija vještine, timski duh i ljubav prema igri od najranijih dana.'),
(10, 'kultura', 'Kultura Grafita', 'Grafiti, kao oblik izražavanja na javnim površinama, postali su globalni fenomen koji izaziva različite reakcije – od divljenja do osude. Kao sastavni dio urbane kulture, grafiti predstavljaju jedinstven spoj umjetnosti, aktivizma i subkulturnog identiteta. Ovaj članak istražuje povijest, značaj i utjecaj grafita na suvremeno društvo.\r\n\r\nPovijest grafita\r\n\r\nPovijest grafita može se pratiti unatrag tisućama godina, sve do antičkih civilizacija koje su na zidovima svojih građevina ostavljale crteže i natpise. Međutim, moderni grafiti, kakve danas poznajemo, svoje korijene vuku iz New Yorka 1970-ih godina. U to vrijeme, mladi iz siromašnih četvrti počeli su koristiti sprejeve za ispisivanje svojih imena, poznatih kao \"tagovi\", na zidovima i vagonima podzemne željeznice. Ovi tagovi brzo su se proširili i evoluirali u složenije oblike umjetničkog izražavanja.\r\n\r\nKreativnost i individualnost\r\n\r\nGrafiti su postali platno za kreativnost i individualnost umjetnika. Umjetnici, poznati kao grafiteri ili writteri, razvijaju jedinstvene stilove i tehnike, od jednostavnih tagova do složenih murala. Svaki grafiter donosi svoj osobni pečat, koristeći boje, oblike i simbole koji odražavaju njihovu viziju i identitet. Grafiti su često smješteni na teško dostupnim mjestima, što dodatno naglašava vještinu i hrabrost umjetnika.\r\n\r\nDruštvene poruke i aktivizam\r\n\r\nGrafiti su također snažan alat za društveni aktivizam i izražavanje političkih stavova. Mnogi grafiteri koriste svoje radove kako bi skrenuli pozornost na društvene probleme, nepravde i nejednakosti. Poruke protiv rata, rasizma, kapitalizma i drugih oblika opresije često se mogu naći na zidovima gradova diljem svijeta. Grafiti pružaju glas marginaliziranim grupama i pojedincima, omogućujući im da prenesu svoje poruke širokoj publici.\r\n\r\nKontroverze i percepcija\r\n\r\nUnatoč svojoj umjetničkoj vrijednosti, grafiti su često predmet kontroverzi. Mnogi ih smatraju vandalizmom i ilegalnom aktivnosti, posebno kada su naslikani bez dozvole na privatnim ili javnim površinama. Gradovi i vlasnici nekretnina troše značajna sredstva na uklanjanje grafita, smatrajući ih prijetnjom javnom redu i čistoći. S druge strane, postoji rastući pokret koji prepoznaje grafite kao legitimnu formu umjetnosti i kulturnog izraza, što dovodi do legalizacije i institucionalizacije grafita u nekim gradovima.', 'images (2).jpg', 0, 'Grafiti su oblik urbane umjetnosti koji izražava kreativnost i identitet subkulture');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
