-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: akisteel
-- ------------------------------------------------------
-- Server version	5.5.44-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'akisteel','akisteel33','administrateur'),(2,'admin','admin335','ico');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catproduct`
--

DROP TABLE IF EXISTS `catproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catproduct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catproduct`
--

LOCK TABLES `catproduct` WRITE;
/*!40000 ALTER TABLE `catproduct` DISABLE KEYS */;
INSERT INTO `catproduct` VALUES (41,41,'Protection bois  ','/_MG_5081-41.jpg',1),(43,43,' ','/_MG_5255-43.jpg',2),(54,54,'Terrasses','',2),(57,56,'amenagements','',1),(60,60,'Protection bois  ','',1),(65,65,'Protection bois  ','',1),(66,66,'Protection aluminium  ','',2),(68,81,'Balisage ','',2),(69,65,'Protection bois ','',1),(73,71,'Protection en Contre Plaqué   ','',1),(75,75,'Protection aluminium  ','',6),(77,75,'Habillage bois  ','',1),(79,79,'Protection bois ','',5),(80,0,'Escaliers','',1),(81,81,'Gyrophare et rampe  ','',5),(82,82,'Marchepied ','',4),(83,83,'Plastification et résine étanche ','',5),(84,84,'Transformation VP/VU','',8),(94,94,'Produits','',13),(97,97,'Balisage ','',3),(98,87,'Protection aluminium','',1),(99,80,'Escaliers droits','',1),(100,80,'Escaliers en colimaçon','',2),(101,101,'Portails','',3),(102,80,'Escaliers tournants','',3),(108,0,'Garde-corps','',4),(111,111,'Portes Industrielles','',6),(112,112,'Sectionnelles','',7),(113,0,'Portes industrielles','',6),(118,111,'Issue de secours','',1),(119,111,'Vitrées','',2),(121,0,'Portails et Portillons','',5),(122,0,'Portes de garages','',7),(123,0,'Portes d\'issues de secours','',8),(124,0,'Accès Parking','',9),(125,0,'Menuiseries décoratives','',10),(126,0,'Divers ouvrages métalliques','',11),(127,0,'Conception et réalisation','',12);
/*!40000 ALTER TABLE `catproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `adresse` varchar(250) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `message` text,
  `newsletter` tinyint(4) NOT NULL DEFAULT '0',
  `fromgoldbook` tinyint(4) NOT NULL DEFAULT '0',
  `fromcontact` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'fránck','l\'anglé','1, Rue du l\'oùp','33000','bdx','franck_langle@hotmail.fr','0650735822','c\'est mon test\r\nJ\'ai sauté une ligne...\r\n\r\nF.',1,0,1);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_categorie`
--

DROP TABLE IF EXISTS `contact_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_categorie` (
  `id_contact` int(11) unsigned NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_categorie`
--

LOCK TABLES `contact_categorie` WRITE;
/*!40000 ALTER TABLE `contact_categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goldbook`
--

DROP TABLE IF EXISTS `goldbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goldbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `online` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goldbook`
--

LOCK TABLES `goldbook` WRITE;
/*!40000 ALTER TABLE `goldbook` DISABLE KEYS */;
INSERT INTO `goldbook` VALUES (1,'2015-09-06 00:00:00','Franck Langleron','franck_langleron@hotmail.com','Très professionnel ! je recommande!!',1),(2,'2015-09-07 00:00:00','Xavier Gonzalez','xavier@gonzalez.pm','Prestation nickel, très pro, très satisfait',1);
/*!40000 ALTER TABLE `goldbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_news`
--

DROP TABLE IF EXISTS `media_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `url_media` varchar(250) NOT NULL,
  `url_apercu` varchar(250) NOT NULL,
  `type_media` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`id_news`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_news`
--

LOCK TABLES `media_news` WRITE;
/*!40000 ALTER TABLE `media_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `date_news` datetime NOT NULL,
  `titre` varchar(250) NOT NULL,
  `sous_titre` varchar(100) NOT NULL,
  `contenu` text,
  `image` varchar(250) DEFAULT NULL,
  `accueil` tinyint(4) NOT NULL DEFAULT '0',
  `online` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (3,'2016-10-27 00:00:00','Notre site est en ligne','Trouvez ici toutes nos réalisations et nos actus','Notre nouveau site internet afin que vous puissiez trouvez ici l\'ensemble de nos prestations et de nos actus.','/internet_company1-3.jpg',0,1),(4,'2016-10-20 00:00:00','Nouvelle réalisation','Immeuble 3 étages','Réalisation imposante','/IMG_8422-4.jpg',0,1),(6,'2017-01-22 00:00:00','Présentoir de carton de vin pour des salons','','','/P1020648-0.jpg',1,0);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `bas_page` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` VALUES (12,'2015-01-01 00:00:00','Ceci est la toute nouvelle actu',' ');
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_detail`
--

DROP TABLE IF EXISTS `newsletter_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_newsletter` int(10) unsigned NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `texte` text,
  PRIMARY KEY (`id`,`id_newsletter`)
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_detail`
--

LOCK TABLES `newsletter_detail` WRITE;
/*!40000 ALTER TABLE `newsletter_detail` DISABLE KEYS */;
INSERT INTO `newsletter_detail` VALUES (328,12,'Nouve équipement','/Avril_13_024-12.jpg','http://modulouest.iconeo.fr','');
/*!40000 ALTER TABLE `newsletter_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `fichier_pdf` varchar(100) NOT NULL,
  `online` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,85,'Support spécial',' ','','1'),(2,100,'Escaliers colimaçons / hélicoïdaux','La société AKISTEEL basée en Gironde avec son équipe forte de plus de 10 ans d’expérience et son atelier de fabrication, vous propose une large gamme de produits adaptés à votre environnement.\r\n\r\nL\'escalier colimaçon ou hélicoïdal est spécialement conçu pour des endroits confinés.\r\n\r\nPour toutes demandes de renseignements ou de devis gratuit, veuillez contacter la société AKISTEEL.\r\n','','1'),(4,54,'Balustre',' ','','1'),(5,108,'Garde-corps résidentiel','AKISTEEL entreprise œuvrant en Aquitaine, fabrique selon les plans de l\'architecte ou du maître d\'ouvrage, tous types de garde-corps pour balcons.\r\n\r\nGrâce au savoir faire et à l\'expérience des techniciens d\'AKISTEEL, nous vous proposons des réalisations de la plus simple à la plus élaborée (barreaudé, vitré...), un choix important de finitions (galvanisé à chaud, thermolaqué, divers coloris...)\r\n\r\nNos garde-corps sont aux normes Françaises et Européennes.\r\n\r\nPour plus d\'informations, veuillez contacter AKISTELL.\r\n\r\n\r\n','','1'),(6,99,'Escaliers droits intérieurs / extérieurs',' AKISTEEL implanté en Gironde avec un rayon d\'action régionale (Aquitaine), vous propose la fabrication, la réparation, la fourniture et la pose d\'escaliers droits.\r\n\r\nLa société AKISTEEL œuvre dans les domaines du particulier, du tertiaire, du collectif et de l\'industrie. Elle vous propose la réalisation de votre escalier sur mesure, de la conception jusqu’à l’installation dans votre résidence, votre habitation, votre magasin ou votre local industriel.\r\n\r\nLa société Akisteel s’adapte à votre environnement en proposant tous types de finitions (galvanisation, thermolaquage, anti-rouille ou brut).\r\n\r\nN’hésitez pas à nous contacter pour toutes demandes de devis gratuit.','','1'),(9,108,'Garde-corps industriels (usines, ateliers) pour intérieur et extérieur.','AKISTEEL entreprise évoluant en Gironde (Nouvelle Aquitaine), conçoit et fabrique des garde-corps industriels intérieurs et extérieurs sur mesure, pour vos ateliers, usines...\r\n\r\nNous vous proposons tous types de finitions (galvanisation à chaud, peinture anti-rouille...).\r\n\r\nNos réalisations répondent aux normes en vigueur (Françaises, Européennes), pour vos locaux.','','1'),(10,102,'Escaliers tournants d\'intérieurs / extérieurs','AKISTEEL, entreprise située près de Bordeaux (Aquitaine), réalise tous types d\'escaliers tournants : du traditionnel au design ou contemporain. Nos réalisations très esthétiques, s\'adaptent parfaitement à votre intérieur. \r\n\r\nNotre maîtrise de l\'acier nous permet de vous proposer différentes possibilités de structures d\'escalier.  Limon extérieur, marches et  limon central peuvent être réalisés  en fer plat, tubes carrés, rectangles ou ronds, ...\r\n\r\nEn terme de finition , AKISTEEL vous offre le choix : l\'acier brut, l\'antirouille classique, la galvanisation à chaud, le thermolaquage, ...\r\n','','1'),(11,108,'Garde-corps particulier pour intérieur et extérieur','AKISTEEL implanté en Gironde avec un rayon d\'action régionale (Aquitaine), vous propose la fabrication de garde-corps, aussi bien pour vos balcons, fenêtres, mezzanines, paliers, escaliers ou terrasses...\r\n\r\nLa société AKISTEEL réalise votre garde-corps sur mesure, de la conception, jusqu’à l’installation.\r\n\r\nVous avez à votre disposition un large choix de finitions (galvanisé, thermolaqué, brut...), de couleurs et de modèles (barraudés, vitrés, pleins...).\r\n\r\nNos réalisations répondent aux normes en vigueur.\r\n\r\n\r\n','','1'),(12,121,'Portails battants pour particuliers et colléctivités','L\'entreprise AKISTEEL réalisera dans son atelier à IZON (33), le portail battant que vous avez imaginé. Un portail unique que vous ne trouverez nulle part ailleurs.\r\n\r\nNos techniciens expérimentés, vous guideront dans votre choix de modèles (barreaudés, pleins, ajourés...), de finitions (brut, peinture anti-rouille, galvanisé à chaud, thermolaqué...) et de coloris.\r\n\r\nAKISTEEL réalise du sur-mesure afin de s\'adapter à votre entrée. \r\n\r\nAKIDOOR, autre branche d\'activité de notre entreprise, peut vous proposer toute une gamme de motorisations s\'adaptant sur nos portails.\r\n','','1'),(13,121,'Portails coulissants pour particuliers et colléctivités','AKISTEEL entreprise œuvrant en Nouvelle Aquitaine, fabrique sur mesure dans son atelier votre portail coulissant, qui contribuera à l\'esthétique de votre extérieur.\r\n\r\nNos commerciaux vous guideront afin de personnaliser votre portail. Vous pourrez choisir le design (contemporain ou traditionnel), la finition (brut, peinture anti-rouille, galvanisé à chaud, thermolaqué...), le modèle (barreaudé, plein, ajouré...).\r\n\r\nAKIDOOR, autre branche d\'activité de notre entreprise, peut vous proposer toute une gamme de motorisations s\'adaptant sur nos portails.','','1'),(15,125,'Marquises vitrées','L\'entreprise AKISTEEL en Gironde, réalisera en finition et protection de votre pas de porte, une marquise vitrée, afin de laisser passer la lumière.\r\n\r\nCelle-ci, sera unique et personnalisée selon vos désirs ou besoins, grâce aux commerciaux d\' AKISTEEL, qui pourront vous proposer de l\'ancien en fer forgé comme du contemporain. Mais aussi toutes finitions possibles (brut, peinture anti-rouille, galvanisées à chaud et thermolaquées ) et divers coloris.\r\n\r\nVeuillez nous contacter pour plus d\' informations.','','1'),(16,125,'Marquises pleines ou ajourées','AKISTEEL entreprise située près de Bordeaux (Aquitaine), créée des marquises traditionnelles ou contemporaines avec toit en tôle design, très esthétique, s\'adaptant parfaitement à votre pas de porte.\r\n\r\nGrâce à la grande expérience des techniciens d\'AKISTEEL, nous vous proposons des ouvrages du plus simple au plus élaboré avec plusieurs choix de finitions (galvanisé à chaud, thermolaqué, divers coloris...).\r\n\r\nN\' hésitez plus et faites confiance à AKISTEEL.\r\n\r\n','','1'),(17,113,'Portes sectionnelles','AKISTEEL implanté en Gironde avec un rayon d\'action régionale (Aquitaine), vous propose des portes sectionnelles, fabriquées sur mesure pour assurer la fermeture de vos bâtiments ou entrepôts.\r\n \r\nLa porte Sectionnelle est généralement conçue pour un usage industriel ou commercial et s\'adapte à toutes les configurations extérieures ou intérieures.\r\n \r\nCette porte est  la plus utilisée, elle est fiable et robuste et s\' adapte parfaitement à un usage intensif.\r\n\r\nDe plus, cette porte est étanche et isolante.\r\n \r\nPour son ouverture, la manœuvre s\'effectue de façon manuelle ou motorisée par moto-réducteur avec différents modes de fonctionnement (action maintenue, mouvements par impulsions, automatique)\r\n \r\nPour toutes informations,  contactez AKISTEEL à IZON (33). ','','1'),(18,113,'Rideaux métalliques','La société AKISTEEL œuvrant en Gironde vous propose une large gamme de rideaux métalliques (lames pleines, isolées ou grilles \"cobra ou dentelle\").\r\n\r\nEconomique et robuste le rideau métallique convient parfaitement pour une utilisation quotidienne,il est disponible avec des profils à simple ou double paroi, en aluminium ou acier.\r\n\r\nNous adapterons le produit,en tenant compte de votre exposition au vent, normalisé par un classement allant de 2 à 5.\r\n\r\nPour plus d\'informations, veuillez contacter la société AKISTEEL Métallerie située à IZON.','','1'),(20,124,'Portes Coulissantes','L\' entreprise AKISTEEL, située dans la région Bordelaise, vous propose des portes coulissantes, adaptées lors de configurations particulières (linteaux réduits avec refuite latérale).\r\n\r\nPour plus d\' information, contactez nous.','','1'),(21,124,'Portes basculantes','AKISTEEL implanté en Gironde avec un rayon d\'action régionale (Aquitaine), vous propose des portes basculantes automatiques adaptées aux passages intensifs.\r\n\r\nLes particularités de ces portes basculantes automatiques sont :\r\n- l\'ouverture rapide\r\n- le gain de place\r\n- l\'adaptabilité à tout local\r\n- un design correspondant à tout type d\'architecture avec la possibilité de personnaliser l\'esthétique.\r\n\r\nConçues sur mesure les portes basculantes répondent à vos besoins.\r\n\r\nVeuillez contacter la société AKISTEEL pour étudier votre projet.','','1'),(22,124,'Portes accordéons','L\'entreprise AKISTEEL située à IZON en Gironde, vous propose des portes accordéons, adaptées lors de configurations particulières ( défaut de linteau ou d\'écoinçon ).\r\n\r\nPour plus d\'informations, veuillez contacter AKISTEEL .','','1'),(23,122,'Portes basculantes, sectionnelles, enroulante, coulissantes, pliantes, battantes, accordéon.','AKISTEEL entreprise située sur Bordeaux vous propose une large gamme de portes de garage afin de répondre parfaitement à vos attentes.\r\n\r\nLes portes de garage peuvent être à ouverture basculante, sectionnelle, enroulable, coulissante, pliante, battante, pliante en accordéon.\r\n\r\nLe choix du type d\'ouverture de votre porte de garage dépend surtout de la situation de la porte et de la place disponible.\r\nDans certains cas, la porte de garage peut se fabriquer sur mesure. Nos technico-commerciaux seront vous aiguiller dans votre choix.\r\n\r\nLes matériaux utilisés pour les portes de garages sont l\'acier, l\'aluminium, le bois et le PVC.\r\n\r\nL\'ouverture de la porte de garage peut- être manuelle ou motorisée.\r\n\r\nN\'hésitez pas à vous renseigner auprès de la société AKISTEEL à IZON.','','1'),(26,126,'Réalisations Métalliques','Forte de plus de 10 ans d\'expérience, la société AKISTEEL, basée à IZON (33), est une équipe de passionnés. Celle-ci conçoit et fabrique tous vos ouvrages de métallerie.\r\n\r\nDans notre atelier, grâce à notre savoir-faire nous donnerons vie à vos idées et à vos projets.\r\n\r\nN\'hésitez plus et faites confiance à AKISTEEL.','','1'),(27,127,'Fabrication à l\'atelier','Notre entreprise AKISTEEL, située à IZON (33), conçoit et réalise dans son atelier différents ouvrages métalliques (portail, garde- corps, escalier, menuiserie décorative...).\r\n\r\nVoici quelques réalisations...','','1'),(28,127,'Mise en oeuvre sur le terrain','L\'entreprise AKISTEEL, située en Nouvelle Aquitaine, bénéficie d\'une équipe de professionnels qui assure la pose et la mise en oeuvre de toutes ses réalisations.\r\n\r\nVoici quelques exemples ...','','1');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `num_image` int(11) NOT NULL AUTO_INCREMENT,
  `num_produit` int(11) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  `defaut` enum('oui','non') NOT NULL DEFAULT 'non',
  PRIMARY KEY (`num_image`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (18,4,'/IMG_8421-4.jpg','oui'),(19,4,'/IMG_8422-4.jpg','non'),(27,7,'/ESCALIERS_104-7.jpg','oui'),(28,7,'/ESCALIERS_048-7.jpg','non'),(29,7,'/ESCALIERS_049-7.jpg','non'),(30,7,'/ESCALIERS_050-7.jpg','non'),(31,3,'/ESCALIERS_103-3.jpg','oui'),(32,8,'/be_ce_de_asques_003-8.jpg','oui'),(33,1,'/berdeaux_perigueux_lacanau_003-1.jpg','oui'),(34,1,'/berdeaux_perigueux_lacanau_002-1.jpg','non'),(35,1,'/berdeaux_perigueux_lacanau_004-1.jpg','non'),(40,6,'/ESCALIERS_007-6.jpg','non'),(44,6,'/ESCALIERS_073-6.jpg','oui'),(48,5,'/berdeaux_perigueux_lacanau_007-5.jpg','non'),(49,5,'/berdeaux_perigueux_lacanau_009-5.jpg','non'),(57,5,'/akisteel_photos-5.jpg','oui'),(58,5,'/portail_et_garde_corps_021-5.jpg','non'),(59,5,'/portail_et_garde_corps_038-5.jpg','non'),(60,5,'/portail_et_garde_corps_040-5.jpg','non'),(62,6,'/1-6.jpg','non'),(63,9,'/ESCALIERS_011-9.jpg','non'),(66,11,'/azema_005-11.jpg','oui'),(67,11,'/azema_004-11.jpg','non'),(68,16,'/IMG_2765_2_-16.jpg','non'),(69,16,'/photo_1_2_-16.jpg','non'),(70,16,'/photo_9_-16.jpg','oui'),(83,12,'/portail_003-12.jpg','non'),(84,12,'/portail_007-12.jpg','non'),(85,12,'/portail_et_garde_corps_060-12.jpg','oui'),(86,12,'/portail_et_garde_corps_061-12.jpg','non'),(87,12,'/portail_et_garde_corps_083-12.jpg','non'),(88,12,'/portail_et_garde_corps_088-12.jpg','non'),(89,12,'/portail_et_garde_corps_090-12.jpg','non'),(90,12,'/portails_003-12.jpg','non'),(91,13,'/IMG_0949-13.jpg','non'),(92,13,'/IMG_4008-13.jpg','non'),(93,13,'/photo_1_-13.jpg','non'),(94,13,'/photo_5_-13.jpg','non'),(95,13,'/portail_011-13.jpg','non'),(96,13,'/portail_012-13.jpg','non'),(97,13,'/portail_015-13.jpg','oui'),(98,13,'/portail_galvanis_et_thermolaqu_-13.jpg','non'),(99,13,'/portail_type-13.jpg','non'),(100,2,'/IMG_0196-2.jpg','oui'),(101,21,'/PBA_680_45_2-21.jpg','non'),(102,21,'/DSC_0345-21.jpg','non'),(103,21,'/DSC_0608-21.jpg','oui'),(104,21,'/PBA_680_26_0-21.jpg','non'),(105,10,'/IMG_7245-10.jpg','oui'),(106,10,'/photo_6_-10.jpg','non'),(107,10,'/IMG_7147 - Copy 1-10.jpg','non'),(108,9,'/escaliers_004-9.jpg','non'),(109,9,'/ESCALIERS_081-9.jpg','oui'),(110,2,'/Carvalho_sci_Madazo_016 - Copy 1-2.jpg','non'),(111,2,'/escalier_ext_rieur_galvanis_c - Copy 1-2.jpg','non');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 16:38:03
