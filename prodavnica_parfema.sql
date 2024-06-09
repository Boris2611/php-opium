-- Kreiranje baze podataka prodavnica_parfema
CREATE DATABASE IF NOT EXISTS `prodavnica_parfema` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `prodavnica_parfema`;

-- Kreiranje tabele user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Kreiranje tabele item
CREATE TABLE IF NOT EXISTS `item` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Slika1` varchar(50) NOT NULL,
  `Slika2` varchar(50) NOT NULL,
  `Pol` varchar(10) NOT NULL,
  `brend` varchar(50) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `cena` decimal(12,2) NOT NULL DEFAULT 0.00,
  `sifra_proizvoda` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Kreiranje tabele cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user_id` (`user_id`),
  KEY `fk_cart_item_id` (`item_id`),
  CONSTRAINT `fk_cart_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`ID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `item` (`Slika1`, `Slika2`, `Pol`, `brend`, `Ime`, `note`, `cena`, `sifra_proizvoda`, `description`) VALUES
    ('assets/parfem1.png', 'assets/parfem1_bg.png', 'Unisex', 'Dolce & Gabbana', 'The One for Men', 'Citrus, Drveno, Začinsko', 8500.00, '12346', 'The One for Men je klasičan i elegantan muški parfem koji kombinuje citrusne, drvene i začinske note. Ovaj parfem odiše sofisticiranošću i luksuzom, idealan je za posebne prilike, ali i za svakodnevno nošenje. Njegova kompleksna kompozicija stvara nezaboravan miris koji ostavlja trajni utisak.'),
    ('assets/parfem2.png', 'assets/parfem2_bg.png', 'Ženski', 'Gucci', 'Bloom', 'Cvetno, Zeleno', 9900.00, '23457', 'Gucci Bloom je cvetni ženski parfem sa zelenim akordima koji asocira na procvetale bašte i bujnu vegetaciju. Ovaj parfem je savršen izbor za žene koje vole prirodne, sveže mirise koji podsećaju na proleće. Njegova bogata cvetna kompozicija obavija vaša čula, pružajući osećaj svežine i vitalnosti.'),
    ('assets/parfem3.png', 'assets/parfem3_bg.png', 'Unisex', 'Jo Malone', 'Wood Sage & Sea Salt', 'Drveno, Aromatično', 12000.00, '34568', 'Wood Sage & Sea Salt je osvežavajući uniseks parfem sa drvenastim i morskim notama, idealan za svakodnevno nošenje. Ovaj parfem donosi osećaj slobode i avanture, podsećajući na šetnje obalom mora i šumskih staza. Njegova jedinstvena kombinacija mirisa čini ga savršenim izborom za sve prilike.'),
    ('assets/parfem4.png', 'assets/parfem4_bg.png', 'Ženski', 'Yves Saint Laurent', 'Black Opium', 'Slatko, Vanila', 13500.00, '45679', 'Black Opium je slatki ženski parfem sa dominantnom notom vanile, pogodan za večernje izlaske i posebne prilike. Ovaj parfem odiše senzualnošću i samopouzdanjem, idealan je za žene koje vole intenzivne i dugotrajne mirise. Njegova slatka, ali sofisticirana kompozicija osvojiće vaša čula na prvi miris.'),
    ('assets/parfem5.png', 'assets/parfem5_bg.png', 'Muški', 'Calvin Klein', 'Eternity for Men', 'Sveže, Akvatično', 7500.00, '56780', 'Eternity for Men je osvežavajući muški parfem sa akordima svežine i vode, savršen za svakodnevno nošenje. Ovaj parfem kombinuje note koje podsećaju na čistu vodu i sveže povetarc, stvarajući osećaj čistoće i energije. Idealan je za aktivne muškarce koji vole sveže i čiste mirise.'),
    ('assets/parfem6.png', 'assets/parfem6_bg.png', 'Unisex', 'Byredo', 'Gypsy Water', 'Citrus, Drveno', 16000.00, '67891', 'Gypsy Water je uniseks parfem sa osvežavajućim citrusnim notama i drvenastim akordima koji podsećaju na šetnju kroz šumu. Ovaj parfem donosi osećaj slobode i avanturizma, sa mirisom koji evocira slike putovanja i otkrivanja novih svetova. Njegova jedinstvena kombinacija mirisa čini ga savršenim izborom za sve prilike.'),
    ('assets/parfem7.png', 'assets/parfem7_bg.png', 'Muški', 'Tom Ford', 'Tobacco Vanille', 'Duvan, Vanila', 19500.00, '78902', 'Tobacco Vanille je luksuzni muški parfem sa dominantnim notama duvana i vanile, idealan za hladne zimske dane. Ovaj parfem odiše toplinom i elegancijom, stvarajući bogat i zavodljiv miris koji traje satima. Savršen je izbor za muškarce koji vole intenzivne i dugotrajne mirise sa notama luksuza.'),
    ('assets/parfem8.png', 'assets/parfem8_bg.png', 'Ženski', 'Marc Jacobs', 'Daisy', 'Cvetno, Voćno', 8900.00, '89013', 'Daisy je osvežavajući ženski parfem sa cvetnim i voćnim notama koji asocira na proleće i prirodu u punom cvatu. Ovaj parfem odiše mladalačkim duhom i radošću, savršen je za žene koje vole lagane i sveže mirise. Njegova svetla i vesela kompozicija čini ga idealnim za svakodnevno nošenje.'),
    ('assets/parfem9.png', 'assets/parfem9_bg.png', 'Unisex', 'Maison Francis Kurkdjian', 'Baccarat Rouge 540', 'Amber, Cvetno', 25000.00, '90124', 'Baccarat Rouge 540 je uniseks parfem sa bogatim notama ambera i cvetova, koji odiše luksuzom i elegancijom. Ovaj parfem donosi sofisticiranu i zavodljivu kompoziciju mirisa, idealan je za posebne prilike i večernje izlaske. Njegova intenzivna i dugotrajna aroma osvojiće vaša čula i ostaviti trajni utisak.'),
    ('assets/parfem10.png', 'assets/parfem10_bg.png', 'Muški', 'Versace', 'Eros', 'Menta, Vanila', 9800.00, '01235', 'Eros je muški parfem sa osvežavajućim notama mente i dominantnom notom vanile, koji simbolizuje snagu i strast. Ovaj parfem odiše energijom i samopouzdanjem, savršen je za muškarce koji vole sveže i intenzivne mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem11.png', 'assets/parfem11_bg.png', 'Ženski', 'Chloé', 'Chloé', 'Ruža, Cvetno', 12500.00, '12345', 'Chloé je ženski parfem sa dominantnom notom ruže i cvetnim akordima koji osvajaju svojom svežinom i elegancijom. Ovaj parfem je savršen izbor za žene koje vole sofisticirane i klasične mirise. Njegova bogata cvetna kompozicija stvara nezaboravan miris koji traje satima, pružajući osećaj luksuza i rafiniranosti.'),
    ('assets/parfem12.png', 'assets/parfem12_bg.png', 'Muški', 'Paco Rabanne', '1 Million', 'Začinsko, Kožno', 14500.00, '23456', '1 Million je muški parfem sa začinskim i kožnim notama koji odiše luksuzom i sofisticiranošću. Ovaj parfem je savršen izbor za muškarce koji vole intenzivne i bogate mirise. Njegova kompleksna kompozicija stvara nezaboravan miris koji traje satima, pružajući osećaj elegancije i moći.'),
    ('assets/parfem13.png', 'assets/parfem13_bg.png', 'Unisex', 'Le Labo', 'Santal 33', 'Drveno, Začinsko', 18500.00, '34567', 'Santal 33 je uniseks parfem sa drvenastim i začinskim notama koji stvara nezaboravan i karakterističan miris. Ovaj parfem je savršen izbor za one koji vole jedinstvene i intenzivne mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem14.png', 'assets/parfem14_bg.png', 'Ženski', 'Burberry', 'My Burberry', 'Cvetno, Sveže', 10500.00, '45678', 'My Burberry je ženski parfem sa cvetnim i svežim notama koji podsećaju na proleće i sveže ubrane cvetove. Ovaj parfem odiše elegancijom i ženstvenošću, savršen je za žene koje vole lagane i osvežavajuće mirise. Njegova svetla i vesela kompozicija čini ga idealnim za svakodnevno nošenje.'),
    ('assets/parfem15.png', 'assets/parfem15_bg.png', 'Muški', 'Hugo Boss', 'Boss Bottled', 'Začinsko, Jabuka', 9500.00, '56789', 'Boss Bottled je muški parfem sa začinskim notama i dominantnom notom jabuke, koji pruža osećaj svežine i energije. Ovaj parfem je savršen izbor za aktivne muškarce koji vole sveže i dinamične mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem16.png', 'assets/parfem16_bg.png', 'Ženski', 'Estée Lauder', 'Beautiful', 'Cvetno, Mošus', 11500.00, '67890', 'Beautiful je ženski parfem sa cvetnim notama i notama mošusa koji asocira na romantične trenutke i nežnost. Ovaj parfem odiše elegancijom i sofisticiranošću, savršen je za posebne prilike i večernje izlaske. Njegova bogata i zavodljiva kompozicija stvara dugotrajan miris koji obavija vaša čula i ostavlja trajni utisak.'),
    ('assets/parfem17.png', 'assets/parfem17_bg.png', 'Unisex', 'Comme des Garçons', 'Blackpepper', 'Biber, Drveno', 17000.00, '78901', 'Blackpepper je uniseks parfem sa dominantnim notama bibera i drvenastim akordima koji mu daju karakterističan i jak miris. Ovaj parfem je savršen izbor za one koji vole jedinstvene i intenzivne mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem18.png', 'assets/parfem18_bg.png', 'Muški', 'Ralph Lauren', 'Polo Red', 'Citrus, Amber', 12500.00, '89012', 'Polo Red je muški parfem sa citrusnim notama i dominantnom notom ambera, koji podseća na dinamičan i energičan životni stil. Ovaj parfem je savršen izbor za muškarce koji vole sveže i intenzivne mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem19.png', 'assets/parfem19_bg.png', 'Ženski', 'Jimmy Choo', 'Illicit', 'Cvetno, Med', 13500.00, '90123', 'Illicit je ženski parfem sa cvetnim notama i dominantnom notom meda, koji izražava smelost i samopouzdanje. Ovaj parfem je savršen izbor za žene koje vole intenzivne i zavodljive mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem20.png', 'assets/parfem20_bg.png', 'Muški', 'Dolce & Gabbana', 'The One for Men', 'Duvan, Začinsko', 15500.00, '20211', 'The One for Men je muški parfem sa dominantnim notama duvana i začina, koji odiše sofisticiranošću i privlačnošću. Ovaj parfem je savršen izbor za muškarce koji vole intenzivne i dugotrajne mirise. Njegova bogata kompozicija stvara nezaboravan miris koji traje satima, pružajući osećaj luksuza i rafiniranosti.'),
    ('assets/parfem21.png', 'assets/parfem21_bg.png', 'Ženski', 'Gucci', 'Bloom', 'Cvetno, Tuberose', 14500.00, '21322', 'Bloom je ženski parfem sa cvetnim notama i dominantnom notom tuberoze, koji predstavlja simbol slobode i lepote prirode. Ovaj parfem je savršen izbor za žene koje vole intenzivne i dugotrajne mirise. Njegova bogata kompozicija stvara nezaboravan miris koji traje satima, pružajući osećaj luksuza i rafiniranosti.'),
    ('assets/parfem22.png', 'assets/parfem22_bg.png', 'Unisex', 'Tom Ford', 'Oud Wood', 'Oud, Drveno', 21000.00, '22433', 'Oud Wood je uniseks parfem sa dominantnim notama ouda i drvenastim akordima, koji stvara mirisnu harmoniju i luksuznu atmosferu. Ovaj parfem je savršen izbor za one koji vole jedinstvene i intenzivne mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem23.png', 'assets/parfem23_bg.png', 'Muški', 'Calvin Klein', 'Eternity for Men', 'Citrus, Žalfija', 17500.00, '23544', 'Eternity for Men je muški parfem sa citrusnim notama i dominantnom notom žalfije, koji asocira na mirisnu svežinu i eleganciju. Ovaj parfem je savršen izbor za aktivne muškarce koji vole sveže i dinamične mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem24.png', 'assets/parfem24_bg.png', 'Ženski', 'Yves Saint Laurent', 'Black Opium', 'Kafa, Cvetno', 19500.00, '24655', 'Black Opium je ženski parfem sa dominantnim notama kafe i cvetnim akordima, koji odiše senzualnošću i toplinom. Ovaj parfem je savršen izbor za žene koje vole intenzivne i zavodljive mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem25.png', 'assets/parfem25_bg.png', 'Unisex', 'Jo Malone', 'English Pear & Freesia', 'Voćno, Cvetno', 18500.00, '25766', 'English Pear & Freesia je uniseks parfem sa voćnim i cvetnim notama koji pruža osećaj svežine i elegancije. Ovaj parfem je savršen izbor za one koji vole lagane i osvežavajuće mirise. Njegova svetla i vesela kompozicija čini ga idealnim za svakodnevno nošenje, pružajući osećaj čistoće i vitalnosti.'),
    ('assets/parfem26.png', 'assets/parfem26_bg.png', 'Muški', 'Issey Miyake', 'L\'Eau d\'Issey Pour Homme', 'Akvatično, Citrus', 16500.00, '26877', 'L\'Eau d\'Issey Pour Homme je muški parfem sa akvatičnim i citrusnim notama, koji osvežava i budi osećaj slobode. Ovaj parfem je savršen izbor za aktivne muškarce koji vole sveže i dinamične mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem27.png', 'assets/parfem27_bg.png', 'Ženski', 'Marc Jacobs', 'Daisy', 'Cvetno, Jagoda', 13500.00, '27988', 'Daisy je ženski parfem sa cvetnim notama i dominantnom notom jagode, koji donosi radost i optimizam svojom svežinom. Ovaj parfem je savršen izbor za žene koje vole lagane i osvežavajuće mirise. Njegova svetla i vesela kompozicija čini ga idealnim za svakodnevno nošenje, pružajući osećaj čistoće i vitalnosti.'),
    ('assets/parfem28.png', 'assets/parfem28_bg.png', 'Unisex', 'Byredo', 'Gypsy Water', 'Drveno, Vanila', 20500.00, '28099', 'Gypsy Water je uniseks parfem sa drvenastim i vanilinim notama, koji stvara mirisnu priču o slobodi i avanturizmu. Ovaj parfem je savršen izbor za one koji vole jedinstvene i intenzivne mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.'),
    ('assets/parfem29.png', 'assets/parfem29_bg.png', 'Muški', 'Versace', 'Eros', 'Menta, Tonka', 17500.00, '29210', 'Eros je muški parfem sa notama mente i tonke, koji odiše svežinom i muževnošću, pružajući osećaj samopouzdanja. Ovaj parfem je savršen izbor za aktivne muškarce koji vole sveže i dinamične mirise. Njegova jedinstvena kombinacija mirisa čini ga idealnim za sve prilike, od svakodnevnog nošenja do večernjih izlazaka.'),
    ('assets/parfem30.png', 'assets/parfem30_bg.png', 'Ženski', 'Prada', 'Candy', 'Karamela, Mošus', 15500.00, '30321', 'Candy je ženski parfem sa notama karamele i mošusa, koji odiše slatkoćom i senzualnošću, pružajući osećaj topline i privlačnosti. Ovaj parfem je savršen izbor za žene koje vole intenzivne i zavodljive mirise. Njegova bogata kompozicija obavija vaša čula, stvarajući dugotrajan i sofisticiran miris koji ostavlja trajni utisak.');



  



-- Kreiranje tabele user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Ubacivanje podataka u tabelu user
INSERT INTO `user` (`username`, `password`, `email`, `is_admin`) VALUES
    ('admin', 'admin', 'admin@gunshop.com', 1),
    ('kupac', '123', 'kupac@singi.com', 0),
    ('marko', '123', 'marko@singi.com', 0);
