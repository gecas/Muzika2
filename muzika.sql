-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014 m. Grd 09 d. 22:55
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `muzika`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `album`
--

CREATE TABLE IF NOT EXISTS `album` (
`album_id` int(8) NOT NULL,
  `album_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `album_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Sukurta duomenų kopija lentelei `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_image`) VALUES
(3, 'Elektroninis dievas', 'image-20111102135336-181.jpg');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
`artist_id` int(8) NOT NULL,
  `artist_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artist_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Sukurta duomenų kopija lentelei `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_image`) VALUES
(6, 'Andrius Mamontovas', 'Andrius-Mamontovas.jpg'),
(7, 'Marijonas Mikutavičius', 'marijonas.jpg'),
(8, 'Linas Adomaitis', 'linas_adomaitis.jpg'),
(9, 'Leon Somov & Jazzu', 'leonjazzu.jpg'),
(10, 'Metallica', 'Metallica.png'),
(11, 'Freaks on Floor', 'Freaks_and_Floor_.jpg'),
(12, 'Sisters on Wire', 'sisters.jpg'),
(13, 'Noisestorm', 'noisestorm.jpg'),
(14, 'Eminem', 'eminem1.jpg'),
(15, 'Skrillex', 'Skrillex-hairlook.jpeg'),
(16, 'Nero', 'nero.jpg');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(8) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Kas naujo ? '),
(2, 'Žanrai'),
(3, 'Atlikėjai'),
(4, 'Albumai');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(8) NOT NULL,
  `news_id` int(8) NOT NULL,
  `comment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Sukurta duomenų kopija lentelei `comments`
--

INSERT INTO `comments` (`comment_id`, `news_id`, `comment_name`, `comment_email`, `comment_text`) VALUES
(5, 2, 'testamonial', 'geciauskasmarius@gmail.com', 'testas2 '),
(6, 2, 'testamonial', 'geciauskasmarius@gmail.com', 'testas2 '),
(7, 2, ':DD', ':DD', 'd:::DDDd'),
(8, 2, ':DD', ':DD', 'd:::DDDd'),
(9, 2, ':DD', ':DD', 'd:::DDDd'),
(10, 2, ':DD', ':DD', 'd:::DDDd'),
(11, 2, ':DD', ':DD', 'd:::DDDd'),
(12, 0, ':DD', ':DD', 'd:::DDDd'),
(13, 2, 'test', 'testttt', 'tttest'),
(14, 2, 'test', 'testttt', 'tttest'),
(15, 2, 'nelabai ok :D', 'ko?', 'sdsddas'),
(16, 2, 'ble, nemaciau, ifb parase :DD', 'dfdf', 'efwefew'),
(17, 2, 'ttte', ':D', 'dabar taip ok :D\r\n:DDD'),
(18, 2, '', '', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
`genre_id` int(8) NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Sukurta duomenų kopija lentelei `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`, `genre_image`) VALUES
(1, 'Rock', 'Rock.jpg'),
(2, 'Pop', 'pop.jpg'),
(3, 'Metal', 'metal.jpg'),
(4, 'Hip-Hop', 'hip-hop.jpg'),
(5, 'House', 'house.jpg'),
(6, 'Drum and Bass', 'drumnbass.jpg'),
(7, 'Dubstep', 'Dubstep.jpg'),
(8, 'Electro', 'i_love_electro_music_v1_by_davidmilla54711-d37swgu.jpg');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`image_id` int(11) NOT NULL,
  `image_name` text COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Sukurta duomenų kopija lentelei `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `news_id`) VALUES
(1, '5470a16320054.jpg', 1),
(2, '5470a1632824b.jpg', 1),
(3, '5471f4a6a0fef.jpg', 2),
(4, '5471f4a6c973a.jpg', 2),
(5, '5471f4a6d9fec.jpg', 2),
(6, '5471f4a6ed020.jpg', 2),
(7, '5471f4a6a0fef.jpg', 3),
(8, '5480821181d5c.jpg', 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(8) NOT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_text`) VALUES
(1, 'Taylor Swift pašalino dainas iš Spotify', '<p>tekstas :D</p>'),
(2, '„Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ ', '<p>I&scaron;leidę energingą ir stiprų debiutinį albumą &bdquo;St. Jude&ldquo; (2008), &bdquo;The Courteeners&ldquo; kaip viesulas įsiveržė į apsnūdusią britų roko sceną. Mančesterio ketveriukė buvo i&scaron;liaupsinta kritikų ir melomanų už profesionalumą ir gitarinei muzikai sugrąžintą &scaron;viežumą. Buvo net kalbama, jog jie &ndash; britų rokenrolo i&scaron;gelbėtojai ir galbūt geriausia ateities britų grupė.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Muzikantai galėjo naudotis &scaron;ia palankia terpe ir toliau tęsti tame pačiame stiliuje, tačiau jie pasirodė esą chameleonais &ndash; antrasis jų albumas &bdquo;Falcon&ldquo; (2010) jau buvo melodingo indie rock ir pop mi&scaron;inys, paskanintas keliomis i&scaron;skirtinėmis baladėmis, kuriose atsiskleidžia solidus, malonaus tembro vokalisto Liam Fray vokalas.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Kritikai pasiskirstė į dvi stovyklas: vieni &bdquo;gedėjo&ldquo; &scaron;iurk&scaron;taus pirmojo albumo skambesio ir mai&scaron;tingumo, tuo tarpu kiti gyrė jo eleganciją ir stipriai i&scaron;reik&scaron;tą charakteringą skambesį, pagardintą įžvalgiais, istorijas pasakojančiais tekstais.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Tačiau &bdquo;The Courteeners&ldquo; neapsistojo ir ties &scaron;ia formule. Trečiajame albume &bdquo;ANNA&ldquo;, kuris buvo i&scaron;leistas &scaron;ių metų vasario mėnesį, grupė bendradarbiavo su prodiuseriu Joe Cross (prie&scaron; tai prodiusavusiam klausytojų pamėgtą debiutinį &bdquo;Hurts&ldquo; albumą &bdquo;Happiness&ldquo;). Pirmas singlas i&scaron; jo &bdquo;Lose Control&ldquo; &ndash; tai tiesiog stilingos elektroninės &scaron;okių muzikos pavyzdys. Ir nors visas diskas &bdquo;ANNA&ldquo; tikrai nėra &scaron;okių muzikos albumas ir vėl jame galima rasti keletą puikių baladžių, bet jis vėlgi žymi naują įvairiapusi&scaron;kųjų &bdquo;The Courteeners&ldquo;, &scaron;įkart pulsuojančių optimisti&scaron;ku ir dar melodingesniu nei prie&scaron; tai skambesiu, erą. Grupė darsyk įrodė, kad neprarado savo &scaron;armo ir gebėjimo kurti užkabinančius priedainius. &bdquo;Gigwise&ldquo; apibūdino albumą kaip &bdquo;Nuostabus &scaron;viežio oro gūsis britpop gerbėjams&ldquo; bei &bdquo;stadionams sukurti rokenrolo himnai.&ldquo;</p>\r\n<p>&nbsp;</p>\r\n<p>Kalbėdamas apie tai, kaip skiriasi visi trys jų albumai, grupės vokalistas, gitaristas ir dainų kūrėjas Liam Fray sutinka: &bdquo;ANNA&ldquo; &ndash; tai naujo grupės skambesio etapas. Mūsų muzika, kaip mintys, evoliucionavo ir i&scaron;siskleidė. Tekstai vis dar tokie pat atviri, bet dabar i&scaron;ties esu kur kas mažiau piktas. Pirmąjį albumą sukūrėme, kai mums buvo tik 20-21 metai. Kai esi tokio amžiaus &ndash; pyksti ant viso pasaulio, kad niekas nesiseka taip, kaip norėtum. O dabar... Nežinau. Gyvenimas visai neblogas!&ldquo;, juokiasi &bdquo;The Courteeners&ldquo; lyderis, gegužės mėnesį at&scaron;ventęs 28-ąjį gimtadienį. &bdquo;Jis per trumpas, kad &scaron;vaistytum jį negatyviems dalykams. Kuriant dainas, visada galvoju apie jų prasmę. Kai žinai, jog jas dainuosi dar mažiausiai de&scaron;imt metų, jos tiesiog privalo būti reik&scaron;mingos ir i&scaron;reik&scaron;ti kažkokį požiūrį.&ldquo;&nbsp;</p>\r\n<p>&nbsp;</p>'),
(3, '„Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ ', '„Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ „Geriausiai saugoma D. Britanijos paslaptimi“ vadinami „The Courteeners“: „Gyvenimas per trumpas, kad švaistytum jį negatyviems dalykams!“ '),
(4, 'Enrique Iglesias koncertas Kaune: efektingas ne dėl efektų', '<p><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Gruodžio 2-osios vakaras ne vienam tūkstančiui Lietuvos gyventojų buvo ypatingas - čia jau trečiąjį kartą sugrįžo ispanų dainininkas Enrique Iglesias, paskutinį kartą mūsų &scaron;alyje svečiavęsis 2007 metais. &Scaron;į kartą, naujausio albumo &bdquo;Sex And Love&ldquo; pristatymui skirtam turui, atlikėjas pasirinko Kauno &bdquo;Žalgirio&ldquo; areną, į kurią netilpo visi norintys &ndash; visi bilietai buvo i&scaron;parduoti, o jų ie&scaron;kančiųjų socialiniuose tinkluose vis atsirasdavo dar valandą prie&scaron; koncertą.</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Pilnai salei žmonių besibadant alkūnėmis, vakarą pradėjo lietuvis didžėjus Ignas. Lietuvoje koncertuojančių atlikėjų pasirodymus retai ap&scaron;ildo didžėjai, nors užsienyje tai anaiptol nėra retas rei&scaron;kinys. Vis dėlto, gal tai erdvės trūkumo padarinys, o gal kas kita, bet minia neatrodė susidomėjusi Igno ritmais. Suprantama &ndash; vyresniesiems žiūrovams tokia muzika dažniausiai ne prie &scaron;irdies, o jaunesniesiems tiesiog trūko oro ir vietos bent jau padėti koją į &scaron;oną.&nbsp;</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Vakaro žvaigždė į sceną užlipo likus keletai minučių iki pusės de&scaron;imtos. Nenuostabu, nes atlikėjas į Kauną atskrido likus vos valandai iki oficialios koncerto pradžios ir dar turėjo planų nusnūsti. Iki tol teko i&scaron;girsti ne vieną brandaus amžiaus moterų grasinimą arenos darbuotojams, dėl nepasirodančio atlikėjo. Sakė, esančios suvarytos į salę kaip gyvuliai, todėl apsauginiai turėtų kuo greičiau atvesti Enrique Iglesias ant scenos.&nbsp;</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">&Scaron;ou prasidėjo nuo dainos &bdquo;I&lsquo;m A Freak&ldquo;, kurios tekstas ir vaizdo klipas ne &scaron;iaip sau &scaron;velniai eroti&scaron;ki &ndash; jau tada buvo ai&scaron;ku, kad koncertas bus įspūdingas ir vertas salėje pralaukto laiko. Spėlionės pasitvirtino: čia vienas po kito sekė gerai žinomi nauji ir seni kūriniai ir nors nebuvo neįtikėtinų, nematytų bei negirdėtų efektų, niekas ne&scaron;audė i&scaron; patrankų ir Enrique Iglesias i&scaron; dangaus nenusileido, viskas atrodė efektingai. Tokį įspūdį darė ne vien pats atlikėjas, nuolat lakstęs po sceną ir flirtavęs su publika. Beje, į sceną dainininkas žengė taip, kaip ir įprasta jį matyti &ndash; apsirengęs džinsais, mar&scaron;kinėliais bei kepuraite su snapeliu. Lygiai taip pat efektingai atrodė ir visa grupė bei pritariamosios vokalistės, kurios, kaip įprastai dažnai vargiai pastebimos. Čia buvo prie&scaron;ingai &ndash; grupė ir pritariančiosios dainininkės buvo antrosios pasirodymo žvaigždės ir jas norėjosi stebėti.</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Koncertui įsibėgėjus Enrique Iglesias atidavė duoklę žiūrovams, sėdintiems gale, ir staiga atsidūrė kitoje arenos pusėje pastatytoje scenoje. Ten per visą areną nužygiavo ir likusi grupė, kurios vaikinus gerbėjos vis bandė paliesti, pabučiuoti ar užmegzti bet kokį kontaktą &ndash; &scaron;tai ką rei&scaron;kia būti muzikantu ir dar charizmati&scaron;ku.&nbsp;</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Ant nedidelio ploto pakylos atlikus keletą akustinių dainų, tarp kurių ir eroti&scaron;koji &bdquo;Ring My Bells&ldquo;, dainininkas mielai &scaron;nekėjosi su publika. Lietuvi&scaron;kai pasisveikinęs jis padėkojo visiems susirinkusiems ir atsipra&scaron;ė už vėlavimą: &bdquo; Žinau, kad rytoj visiems reikia į darbą, todėl esu dėkingas, kad atėjote į mano koncertą. Atleiskite, kad vėlavau, bet juk žinote, kad a&scaron; ispanas &ndash; mes visada vėluojame&ldquo;, - juokavo atlikėjas.&nbsp;</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Ant mažosios scenos žiūrovų laukė dar viena staigmena. Čia i&scaron;sikvietęs vieną faną, 22-iejų metų Tomą, kuris itin energingai vis apkabindavo atlikėją ir lakstė po sceną, jis pasiūlė gerbėjui i&scaron;gerti ir, sužinojęs, kaip lietuvi&scaron;kai pasakyti &bdquo;į sveikatą&ldquo;, sudaužė taurelėmis. I&scaron;gėrus Enrique Iglesias dar pasidomėjo, kiek Tomui metų, o sužinojęs vėl juokavo: &bdquo;Man 62, i&scaron; tikrųjų tai &ndash; botoksas.&rdquo; Vėliau dainininkas Tomui pasiūlė kartu sudainuoti B. E. King kūrinį &bdquo;Stand By Me&rdquo;: &bdquo;Kai man buvo devyneri, tai buvo mano mėgstamiausia daina. Tu tada dar nebuvai gimęs&rdquo;, - &scaron;ypsojosi atlikėjas. Laimingas vaikinas atsisveikinant apkabino ir i&scaron;kėlė dainininką, kuriam vėliau teko vaduotis i&scaron; laimingo glėbio. &bdquo;Kaip jam pasisekė&ldquo;, - aplinkui kalbėjo merginos, bet tonacija tikrai bylojo ne apie džiaugsmą jo sėkme.</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Vėliau atlikėjas vėl grįžo į pagrindinę sceną, kur atliko dar keletą savo puikiai žinomų dainų, i&scaron; dangaus krentant milžini&scaron;kiems balionams su užra&scaron;u &bdquo;SEX and Love&ldquo;, tarp kurių &ndash; &bdquo;Be With You&ldquo;, kurią visa salė skandavo drauge, &bdquo;Tonight&ldquo;, kurios metu gerbėjos kone mu&scaron;ėsi dėl ant apsauginės tvorelės užlipusio dainininko, ir kitos.&nbsp;</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Galiausiai dingęs atlikėjas buvo kviečiamas bisui, taigi, grįžęs į sceną Enrique Iglesias žiūrovams atliko dainas, be kurių jo koncertus sunku įsivaizduoti: jausmingąją &bdquo;Hero&ldquo;, per kurią merginos choru klykdamos braukė a&scaron;aras, temperamentingąją &bdquo;Bailando&ldquo;, dėl kurios prie&scaron; tai verkusios nusi&scaron;luostė drėgnus skruostus, o pabaigai klausytojai i&scaron;girdo kūrinį &bdquo;I Like It&ldquo;, po kurios dainininkas padėkojęs užvedė minią skanduoti &bdquo;Ol&eacute;, Ol&eacute;, Ol&eacute;&ldquo; ir pradingo. Žiūrovai dar tikėjosi sulaukti Enrique Iglesias scenoje, bet bergždžiai.</span><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><br style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;" /><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 12px; line-height: 18px;">Tai buvo koncertas, kurį pamatyti verta, nepriklausomai nuo to, kokią muziką mėgstate. Čia efektus kūrė ne i&scaron;skirtinės instaliacijos ar &scaron;viesos, dėl kurių priekai&scaron;tų taip pat nekyla, bet pats atlikėjas ir muzikantai. Patikėkite, labai gera ant lietuvi&scaron;kos scenos matyti tokį atlikėją, dėl kurio nereikia jaudintis, ar tik nereikės po pasirodymo jo i&scaron;vežti su greitąja. Greitosios prireikė nebent alpusioms žiūrovėms. Žinoma, galbūt jos alpo dėl oro trūkumo salėje, tačiau pabūkime romantikais ir sakykime, kad dėl charizmati&scaron;kojo Enrique Iglesias.</span></p>');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
`playlist_id` int(8) NOT NULL,
  `playlist_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Sukurta duomenų kopija lentelei `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `playlist_name`, `user_id`) VALUES
(1, 'test', 7),
(2, 'test2', 7),
(3, 'test3', 7),
(4, 'test4', 7),
(5, 'Naujas', 7),
(6, 'new', 7);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `playlist_songs`
--

CREATE TABLE IF NOT EXISTS `playlist_songs` (
  `song_id` int(8) NOT NULL,
`playlist_song_id` int(8) NOT NULL,
  `playlist_id` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `playlist_songs`
--

INSERT INTO `playlist_songs` (`song_id`, `playlist_song_id`, `playlist_id`) VALUES
(19, 1, 1),
(17, 2, 2),
(18, 3, 2),
(30, 4, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `song`
--

CREATE TABLE IF NOT EXISTS `song` (
`song_id` int(8) NOT NULL,
  `song_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `song_file` text COLLATE utf8_unicode_ci NOT NULL,
  `song_image` text COLLATE utf8_unicode_ci NOT NULL,
  `artist_id` int(8) NOT NULL,
  `album_id` int(8) NOT NULL,
  `genre_id` int(8) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Sukurta duomenų kopija lentelei `song`
--

INSERT INTO `song` (`song_id`, `song_name`, `song_file`, `song_image`, `artist_id`, `album_id`, `genre_id`, `like_id`) VALUES
(16, 'Tiktai tavyje', 'Andrius Mamontovas - Tiktai Tavyje.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 0),
(17, 'Tavo laikas baigsis', 'Andrius Mamontovas - Tavo Laikas Baigsis.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 3),
(18, 'Rudenio vėjas', 'Andrius Mamontovas - Rudenio Vejas.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 2),
(19, 'Elektroninis dievas', 'Andrius Mamontovas - Elektroninis Dievas.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 3),
(20, 'Pasitrauk', 'Andrius Mamontovas - Pasitrauk.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 2),
(21, 'Ratilai', 'Andrius Mamontovas - Ratilai.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 2),
(22, 'Tyloje', 'Andrius Mamontovas - Tyloje.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 1),
(23, 'Krentantys lėktuvai', 'Andrius Mamontovas - Krentantys Lektuvai.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 1),
(24, 'Kalėdos', 'Andrius Mamontovas - Kaledos.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 0),
(25, 'Nebelauk', 'Andrius Mamontovas - Nebelauk.mp3', 'Andrius-Mamontovas.jpg', 6, 3, 1, 1),
(26, 'Drąsių nieks nežudo', 'Marijonas - Drasiu Nieks Nezudo.mp3', 'marijonas.jpg', 7, 0, 2, 3),
(27, 'Aš pavydžiu sau', 'Linas Adomaitis - As pavydziu sau.mp3', 'As-pavydziu-sau.jpg', 8, 0, 2, 1),
(28, 'Noriu miegoti', 'LEON SOMOV &amp; JAZZU - Noriu Miegoti.mp3', 'leonjazzu.jpg', 9, 0, 2, 0),
(29, 'Feelings', 'FREAKS ON FLOOR - Feelings (Official Music Video).mp3', 'Freaks_and_Floor_.jpg', 11, 0, 8, 1),
(30, 'Parallel World', 'Sisters On Wire - Parallel World (Lyrics video).mp3', 'sisters.jpg', 12, 0, 5, 1),
(31, 'Nothing else matters', 'Metallica - Nothing Else Matters (official video clip).mp3', 'Metallica.png', 10, 0, 3, 0),
(32, 'Afterburner', 'Noisestorm - Afterburner.mp3', 'noisestorm.jpg', 13, 0, 6, 0),
(33, 'Eminem - Rap God', 'Eminem - Rap God (Explicit).mp3', 'eminem1.jpg', 14, 0, 4, 0),
(34, 'Guts Over Fear ft. Sia', 'Eminem - Guts Over Fear ft. Sia.mp3', 'eminem1.jpg', 14, 0, 4, 0),
(35, 'Skrillex- Fuck that', 'SKRILLEX - FUCK THAT [OFFICIAL VIDEO].mp3', 'Skrillex-hairlook.jpeg', 15, 0, 7, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(8) NOT NULL,
  `user_nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Sukurta duomenų kopija lentelei `user`
--

INSERT INTO `user` (`user_id`, `user_nick`, `user_name`, `user_email`, `user_password`, `user_image`) VALUES
(7, 'gecas', 'Marius', 'geciauskasmarius@gmail.com', 'ab123', '547f23b80fb30.jpg'),
(8, 'vova', 'tomas', 'vova@vova.lt', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
 ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
 ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
 ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
 ADD PRIMARY KEY (`playlist_song_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
 ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
MODIFY `album_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
MODIFY `artist_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
MODIFY `genre_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
MODIFY `playlist_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
MODIFY `playlist_song_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
MODIFY `song_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
