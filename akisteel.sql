-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 13 Octobre 2016 à 09:34
-- Version du serveur :  5.5.50-0+deb8u1
-- Version de PHP :  5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `akisteel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` tinyint(3) unsigned NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`, `name`) VALUES
(1, 'akisteel', 'akisteel33', 'administrateur'),
(2, 'admin', 'admin335', 'ico');

-- --------------------------------------------------------

--
-- Structure de la table `catproduct`
--

CREATE TABLE IF NOT EXISTS `catproduct` (
`id` int(10) unsigned NOT NULL,
  `id_parent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ordre_affichage` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `catproduct`
--

INSERT INTO `catproduct` (`id`, `id_parent`, `nom`, `image`, `ordre_affichage`) VALUES
(41, 41, 'Protection bois  ', '/_MG_5081-41.jpg', 1),
(43, 43, ' ', '/_MG_5255-43.jpg', 2),
(54, 0, 'Aménagement modulaire  ', '', 2),
(57, 56, 'amenagements', '', 1),
(58, 54, 'System Edstrom  ', '', 4),
(60, 60, 'Protection bois  ', '', 1),
(65, 65, 'Protection bois  ', '', 1),
(66, 66, 'Protection aluminium  ', '', 2),
(68, 81, 'Balisage ', '', 2),
(69, 65, 'Protection bois ', '', 1),
(73, 71, 'Protection en Contre Plaqué   ', '', 1),
(75, 75, 'Protection aluminium  ', '', 6),
(77, 75, 'Habillage bois  ', '', 1),
(79, 79, 'Protection bois ', '', 5),
(80, 0, 'habillage du véhicule ', '', 1),
(81, 81, 'Gyrophare et rampe  ', '', 5),
(82, 82, 'Marchepied ', '', 4),
(83, 83, 'Plastification et résine étanche ', '', 5),
(84, 84, 'Transformation VP/VU', '', 8),
(85, 0, 'Hayon élévateur', '', 9),
(86, 0, 'Aménagement TPMR', '', 6),
(87, 0, 'Aménagement spécifique', '', 7),
(94, 94, 'Produits', '', 13),
(96, 80, 'Habillage et protection', '', 1),
(97, 97, 'Balisage ', '', 3),
(98, 87, 'Protection aluminium', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(10) unsigned NOT NULL,
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
  `fromcontact` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact_categorie`
--

CREATE TABLE IF NOT EXISTS `contact_categorie` (
  `id_contact` int(11) unsigned NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `goldbook`
--

CREATE TABLE IF NOT EXISTS `goldbook` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `online` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `goldbook`
--

INSERT INTO `goldbook` (`id`, `date`, `nom`, `email`, `message`, `online`) VALUES
(1, '2015-09-06 00:00:00', 'Franck Langleron', 'franck_langleron@hotmail.com', 'Très professionnel ! je recommande!!', 1),
(2, '2015-09-07 00:00:00', 'Xavier Gonzalez', 'xavier@gonzalez.pm', 'Prestation nickel, très pro, très satisfait', 1);

-- --------------------------------------------------------

--
-- Structure de la table `media_news`
--

CREATE TABLE IF NOT EXISTS `media_news` (
`id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `url_media` varchar(250) NOT NULL,
  `url_apercu` varchar(250) NOT NULL,
  `type_media` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id_news` int(11) NOT NULL,
  `date_news` datetime NOT NULL,
  `titre` varchar(250) NOT NULL,
  `sous_titre` varchar(100) NOT NULL,
  `contenu` text,
  `image` varchar(250) DEFAULT NULL,
  `accueil` tinyint(4) NOT NULL DEFAULT '0',
  `online` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id_news`, `date_news`, `titre`, `sous_titre`, `contenu`, `image`, `accueil`, `online`) VALUES
(3, '2016-10-12 00:00:00', 'l''été', 'c''est super!', 'Lorem ipsum dolor sit amet, \r\n\r\nconsectetur adipiscing elit. Maecenas viverra eleifend lacus eu porttitor. \r\nCurabitur tempus libero eget tortor scelerisque, nec accumsan sem consequat. \r\nIn tristique quis risus ac maximus. In posuere nunc ut diam sollicitudin commodo. Nullam laoreet nisl a elementum placerat. Pellentesque iaculis rutrum ipsum ac vestibulum. Fusce at neque vel justo semper auctor. Vestibulum porta mi vel lacus tristique porta. Integer gravida bibendum ante, vitae scelerisque massa elementum at. Nullam eget risus ac lorem luctus auctor. ', '/20140813_162241-3.jpg', 1, 1),
(4, '2016-10-20 00:00:00', 'l''autre actu', 'blabla', 'Mauris at lacus mi. Etiam pretium commodo diam, faucibus congue nibh aliquet et. Cras ullamcorper ullamcorper elit, in convallis nulla pretium id. Nam lectus mi, gravida eu vehicula congue, accumsan vitae ex. Aenean aliquam at urna at convallis. Donec libero felis, condimentum non mi sit amet, bibendum molestie ante. Nunc blandit ac magna vel mattis. Ut eget mi odio. Vestibulum ultricies odio ut rhoncus mollis. Morbi sit amet porta diam. Sed non leo aliquet ex rutrum vulputate. ', '/20140815_120419-0.jpg', 0, 1),
(5, '2016-10-02 00:00:00', 'l''actu', 'qui tue!', 'blabla actu', '/DSC07462-0.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
`id` int(10) unsigned NOT NULL,
  `date` datetime DEFAULT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `bas_page` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `date`, `titre`, `bas_page`) VALUES
(12, '2015-01-01 00:00:00', 'Ceci est la toute nouvelle actu', ' ');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_detail`
--

CREATE TABLE IF NOT EXISTS `newsletter_detail` (
`id` int(10) unsigned NOT NULL,
  `id_newsletter` int(10) unsigned NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `texte` text
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter_detail`
--

INSERT INTO `newsletter_detail` (`id`, `id_newsletter`, `titre`, `url`, `link`, `texte`) VALUES
(328, 12, 'Nouve équipement', '/Avril_13_024-12.jpg', 'http://modulouest.iconeo.fr', '');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) unsigned NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `fichier_pdf` varchar(100) NOT NULL,
  `accueil` enum('0','1') NOT NULL DEFAULT '0',
  `online` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `id_categorie`, `nom`, `description`, `fichier_pdf`, `accueil`, `online`) VALUES
(1, 96, 'Aménagement bois ', 'L''aménagement ou l''équipement d''un véhicule utilitaire est souvent considéré comme une charge supplémentaire, alors qu''au contraire un véhicule correctement aménagé est un gain de productif direct.   \r\nGain de temps: Plusieurs études menées faisant apparaitre qu''un véhicule correctement aménagé permettait de gagner en moyenne une heure par jour. L''investissement de départ est alors rapidement amorti. \r\nImage de votre entreprise : Un véhicule mal améngé donne une image négative de votre entreprise , comment faire confiance à un professionnel dont le véhicule est un amoncellement d''outils, de matériaux .... un client se demande rapidement dans quel état il retrouvera son chantier. \r\nSécurité : Moins de risques d''avoir des objets mobiles à l''intérieur de votre véhicule , moins de riques de tranferts de charges inopinées risquant de déstabiliser votre véhicule.  \r\n\r\nTous nos aménagements bois sont réalisés sur-mesure en fonction de vos besoins et votre souhait. \r\nRéalisation en contreplaqué brut ou filmé, selon votre choix ?  \r\n \r\n\r\n   ', '/0115_002-1.jpg', '0', '1'),
(3, 87, 'Aménagement spécifique', 'Depuis plus de 20 ans. MODUL-OUEST répond à la demande de ses clients, nous sommes en mesure d''apporter une solution à vos contraintes : \r\nAluminium, Résine, Kit Cover ... du plus simple au plus complexe.    ', '', '0', '1'),
(6, 87, 'Signalisation lumineuse et balisage  ', 'Nous équipons tous types de véhicules de POLICE , GENDARMERIE  et BTP . \r\nBalisage classe A et B , Gyrophare à leds , Triangle a relevage manuel ou électrique .....\r\nNous commercialisons les produits: SIRAC. MERCURA. AXIMUM. T2S . SARR ....    ', '', '0', '1'),
(7, 80, 'Habillage du véhicule', 'L''habillage d''un véhicule , consiste à protéger l''intérieur de chargement de votre véhicule utilitaire des chocs liés à son utilisation.\r\nNos protections sont réalisées en contre plaqué de qualité oukoumé en 5 ou 8 mm d''épaisseur suivant le type de véhicule .\r\nLes planchers sont réalisés en contre plaqué brut de 15mm ou antidérapant 12 mm suivant la demande et l''utilisation. \r\nFinition: Joints silicone et barre de seuil aluminium.     ', '', '0', '0'),
(8, 87, 'Signalisation lumineuse ', 'Partenaire de la marque SIRAC , nous équipons les véhicules de POLICE, GENDARMERIE et POMPIERS ', '', '0', '1'),
(9, 58, ' Aménagement modulaire ', 'System Edstrom fondée en 1958 , est l''une des plus ancienne société en EUROPE fabriquant et commercialisant des aménagements pour les véhicules utilitaires. Plus de 50 ans d''expérience dans le développement de nos produits , plus de 50 ans d''écoute attentive des souhaits de nos clients pour trouver des solutions pour les utilisateurs. \r\nNotre priorité la sécurité, nos aménagements ont obtenus la certification française INRS NS286     ', '', '1', '1'),
(10, 98, 'Protection aluminium', 'Une protection aluminium vous permet un lavage ou une désinfection de votre véhicule  ', '', '0', '1'),
(11, 96, 'Habillage bois ', 'Nos habillage sont réalisés en contreplaqué de qualité supérieur, nous protégeons les parois , les portes et le plancher, ce dernier peut être en contreplaqué antidérapant .\r\nNous pouvons vous proposer du CP filmé ou du Poly pro.    ', '', '0', '0'),
(12, 58, 'Aménagement modulaire System Edstrom ', 'Véhicule atelier ', '', '0', '1');

-- --------------------------------------------------------

--
-- Structure de la table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
`num_image` int(11) NOT NULL,
  `num_produit` int(11) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  `defaut` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product_image`
--

INSERT INTO `product_image` (`num_image`, `num_produit`, `fichier`, `defaut`) VALUES
(20, 4, '/IMG_6130-4.jpg', 'non'),
(25, 4, '/IMG_6686-4.jpg', 'oui'),
(30, 9, '/Fevrier_14_001-9.jpg', 'oui'),
(31, 9, '/Fevrier_14_004-9.jpg', 'non'),
(32, 9, '/Samsung_1115_004-9.jpg', 'non'),
(33, 10, '/003-10.jpg', 'oui'),
(34, 11, '/0115_003-11.jpg', 'oui'),
(35, 6, '/Oct_15_Tel_037-6.jpg', 'oui'),
(36, 3, '/Oct_15_042-3.jpg', 'oui'),
(37, 12, '/Samsung_1115_004-12.jpg', 'oui'),
(38, 1, '/0115_002-1.jpg', 'oui');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `catproduct`
--
ALTER TABLE `catproduct`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `goldbook`
--
ALTER TABLE `goldbook`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_news`
--
ALTER TABLE `media_news`
 ADD PRIMARY KEY (`id`,`id_news`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id_news`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter_detail`
--
ALTER TABLE `newsletter_detail`
 ADD PRIMARY KEY (`id`,`id_newsletter`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_image`
--
ALTER TABLE `product_image`
 ADD PRIMARY KEY (`num_image`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `catproduct`
--
ALTER TABLE `catproduct`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `goldbook`
--
ALTER TABLE `goldbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `media_news`
--
ALTER TABLE `media_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `newsletter_detail`
--
ALTER TABLE `newsletter_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `product_image`
--
ALTER TABLE `product_image`
MODIFY `num_image` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
