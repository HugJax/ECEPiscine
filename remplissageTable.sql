-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 avr. 2020 à 19:12
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `IDadmin` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` text COLLATE utf8_unicode_ci NOT NULL,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `MotDePasse` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `IDadresse` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `Ligne1` text COLLATE utf8_unicode_ci NOT NULL,
  `Ligne2` text COLLATE utf8_unicode_ci NOT NULL,
  `Ville` text COLLATE utf8_unicode_ci NOT NULL,
  `Pays` text COLLATE utf8_unicode_ci NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `Telephone` int(11) NOT NULL,
  PRIMARY KEY (`IDadresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `IDenchere` int(11) NOT NULL AUTO_INCREMENT,
  `IDadmin` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `IDproduit` int(11) NOT NULL,
  `PrixCours` int(11) NOT NULL,
  `PrixMax` int(11) NOT NULL,
  PRIMARY KEY (`IDenchere`),
  KEY `IDadmin` (`IDadmin`),
  KEY `IDutilisateur` (`IDutilisateur`),
  KEY `IDproduit` (`IDproduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `IDphoto` int(11) NOT NULL AUTO_INCREMENT,
  `IDproduit` int(11) NOT NULL,
  `Lien` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDphoto`),
  KEY `IDproduit` (`IDproduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `negociation`
--

DROP TABLE IF EXISTS `negociation`;
CREATE TABLE IF NOT EXISTS `negociation` (
  `IDnegociation` int(11) NOT NULL AUTO_INCREMENT,
  `IDproduit` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `Commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `EtatVente` tinyint(1) NOT NULL,
  `Acceptation` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDnegociation`),
  KEY `IDproduit` (`IDproduit`),
  KEY `IDutilisateur` (`IDutilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `IDpaiement` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `Type` text COLLATE utf8_unicode_ci NOT NULL,
  `NumCarte` int(11) NOT NULL,
  `DateExp` date NOT NULL,
  `CodeSecu` int(11) NOT NULL,
  PRIMARY KEY (`IDpaiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IDpanier` int(11) NOT NULL AUTO_INCREMENT,
  `IDproduit` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IDpanier`),
  KEY `IDproduit` (`IDproduit`),
  KEY `IDutilisateur` (`IDutilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IDproduit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Prix` float NOT NULL,
  `Categorie` text COLLATE utf8_unicode_ci NOT NULL,
  `DateMiseEnLigne` date NOT NULL,
  `DateVente` date DEFAULT NULL,
  `Vendu` tinyint(1) NOT NULL,
  `Qualite` text COLLATE utf8_unicode_ci NOT NULL,
  `Defaut` text COLLATE utf8_unicode_ci NOT NULL,
  `OffreSpeciale` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IDproduit`),
  KEY `IDutilisateur` (`IDutilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `IDtransaction` int(11) NOT NULL AUTO_INCREMENT,
  `IDproduit` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`IDtransaction`),
  KEY `IDproduit` (`IDproduit`),
  KEY `IDutilisateur` (`IDutilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `IDachat` int(11) NOT NULL AUTO_INCREMENT,
  `IDproduit` int(11) NOT NULL,
  `Enchere` tinyint(1) NOT NULL,
  `Immediat` tinyint(1) NOT NULL,
  `Offre` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDachat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `achat` ADD FOREIGN KEY (IDproduit) REFERENCES `produit`(`IDproduit`);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `MotDePasse` text COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ImageFond` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` int(11) NOT NULL,
  `IDadresse` int(11) NOT NULL,
  `IDpaiement` int(11) NOT NULL,
  PRIMARY KEY (`IDutilisateur`),
  KEY `IDadresse` (`IDadresse`),
  KEY `IDpaiement` (`IDpaiement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `administrateur`(`IDadmin`, `Pseudo`, `Nom`, `Prenom`, `MotDePasse`) 
	VALUES (1,'admin','Bonisseur de La Bath','Hubert','admin');
INSERT INTO `administrateur`(`IDadmin`, `Pseudo`, `Nom`, `Prenom`, `MotDePasse`) 
	VALUES (2,'manolo.hina','Hina','Manolo','azerty');
INSERT INTO `administrateur`(`IDadmin`, `Pseudo`, `Nom`, `Prenom`, `MotDePasse`) 
	VALUES (3,'jean-pierre.segado','Segado','Lean-Pierre','azerty');
INSERT INTO `administrateur`(`IDadmin`, `Pseudo`, `Nom`, `Prenom`, `MotDePasse`) 
	VALUES (4,'elisabeth.rendler','Rendler','Elisabeth','azerty');
INSERT INTO `administrateur`(`IDadmin`, `Pseudo`, `Nom`, `Prenom`, `MotDePasse`) 
	VALUES (5,'amar.ramdane-cherif','Ramdan-Cherif','Amar','azerty');



INSERT INTO `adresse`(`IDadresse`, `Nom`, `Prenom`, `Ligne1`, `Ligne2`, `Ville`, `Pays`, `CodePostal`, `Telephone`) 
	VALUES (1,'Bonisseur de La Bath','Hubert','117 Rue du Caire','','Rio','Brésil','75117',0612345678);
INSERT INTO `adresse`(`IDadresse`, `Nom`, `Prenom`, `Ligne1`, `Ligne2`, `Ville`, `Pays`, `CodePostal`, `Telephone`) 
	VALUES (2,'Fiorenza','Rémi','3630 Rue du Commerce','3e étage','Paris','France','75015',0617192678);
INSERT INTO `adresse`(`IDadresse`, `Nom`, `Prenom`, `Ligne1`, `Ligne2`, `Ville`, `Pays`, `CodePostal`, `Telephone`) 
	VALUES (3,'Ramdane-Cherif','Amar','36 Rue Rivoli','5e étage','Paris','France','75011',0617190000);




INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`, `IDadresse`) 
	VALUES (1,'Bonisseur de La Bath','Hubert','test','test','images/user/test.png','images/user/fondtest.png',0612345678, (SELECT IDadresse FROM adresse WHERE IDadresse=1));
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`) 
	VALUES (2,'Jacquesy','Hugues','hugues.jacquesy@edu.ece.fr','azerty','images/user/hugues.png','images/user/fondhugues.png',0609988776);
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`) 
	VALUES (3,'Bastide','Thomas','thomas.bastide@edu.ece.fr','azerty','images/user/thomas.png','images/user/fondthomas.png',0618471678);
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`, `IDadresse`) 
	VALUES (4,'Fiorenza','Rémi','remi.fiorenza@edu.ece.fr','azerty','images/user/remi.png','images/user/fondremi.png',0617192678, (SELECT IDadresse FROM adresse WHERE IDadresse=2));
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`) 
	VALUES (5,'Hina','Manolo','manolo-dulva.hina@ece.fr','azerty','images/user/hina.png','images/user/fondhina.png',0612222278);
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`) 
	VALUES (6,'Segado','Jean-Pierre','jean-pierre.segado@ece.fr','azerty','images/user/jean-pierre.png','images/user/fondjean-pierre.png',0609989090);
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`) 
	VALUES (7,'Rendler','Elisabeth','elisabeth.rendler@ece.fr','azerty','images/user/elisabeth.png','images/user/fondelisabeth.png',0777771678);
INSERT INTO `utilisateur`(`IDutilisateur`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Photo`, `ImageFond`, `Telephone`, `IDadresse`) 
	VALUES (8,'Ramdane-Cherif','Amar','amar.ramdane-cherif@uvsq.fr','azerty','images/user/amar.png','images/user/fondamar.png',0617190000, (SELECT IDadresse FROM adresse WHERE IDadresse=3));




INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (1,"Pièce d'or Napoléon","Une pièce d'or authentique datant de 1808. Une perle rare en excellent état",'358','Accessoire VIP','2020-04-13',0,'Incroyable état','Ne possède plus de protection','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (2,"Chevalière or et saphir François 1er","Chevalière du XVIe siècle offerte par le roi François 1er au commandant Bartolomeo de Trivulce pour son héroisme",'5408','Accessoire VIP','2020-04-02',0,'Parfait état','Plus trop à la mode','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=2));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (3,"La Sainte Lance Longin","La Sainte Lance (ou « lance de Longin (Longinus) ») est l’une des reliques de la Passion du Christ. Elle est considérée comme étant l’arme qui aurait percé le flanc droit de Jésus lors de sa crucifixion.",'12000000','Accessoire VIP','2020-04-20',0,"Permet d'attraper la télécommande de plus loin",'Pas très pratique comme cure-dent','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (4,"Marteau de Sucellos","Sucellos est le seul dieu gaulois qui ait un caractère tant soit peu infernal. Comme le Dagda irlandais, Sucellos tue et ressuscite avec son marteau, qu’il tient dans la main gauche. Il se tient droit, le pied reposé sur un tonneau, symbole de la survie. ",'48000000','Accessoire VIP','2020-02-02',0,"C'est comme pour redémarrer un ordinateur",'Une raillure sur le manche','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=4));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (6,"La chape de Saint-Martin","La chape est portée par l’officiant lors des processions, bénédictions solennelles, laudes ou vêpres solennelles. Dans les fonctions les plus solennelles, il peut être accompagné d’assistants-chapiers et de chantres-chapiers. Il peut également la porter pour des rites qui ouvrent certaines solennités et incluent une procession, comme par exemple la procession à la crèche de la Messe de la nuit de Noël.",'3400000','Accessoire VIP','2020-04-03',0,'Protège de la pluie','Rétrécie au lavage','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=2));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (7,"Le choixpeau magique de Poudlard","Initialement, l’objet était un chapeau de sorcier normal, possédé par Godric Gryffondor, le fondateur de la maison éponyme. Il décide d’ensorceler le couvre-chef en intégrant une partie des esprits des fondateurs de l’école au Choixpeau. C’est grâce à ce procédé que l’objet magique est en capacité de choisir la maison qui correspond à chaque nouvel apprenti sorcier qui intègre l’école de magie.",'36','Accessoire VIP','2018-04-05',0,"Plus bavard qu'une boule de cristal","Y'a plein de poux",'0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=3));

INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (8,"Briquet seconde guerre mondiale","Un vrai briquet qui fonctionne en plus d'être stylé.",'38','Ferraille ou trésor','2000-04-23',0,'Fonctionnel',"Plus d'alcool dans le réservoir",'0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (9,"Lingot argent","1 kilogrammes d'argent pur",'68','Ferraille ou trésor','2017-04-19',0,'Sert également de mirroir',"C'est petit mirroir",'0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (10,"Porte clef métal","Pour vous éviter de perdre vos clefs",'8','Ferraille ou trésor','2006-07-19',0,'Super rapport qualité/prix','Sur le site depuis trop longtemps','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=3));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (11,"Pièce d'or pure","Une pièce d'or pur 24 caras",'268','Ferraille ou trésor','2020-01-02',0,'Encore sous blister',"N'est pas accepté comme monnaie au supermarché",'0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=3));

INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (15,"Sculpture 'Maman' par Louise Bourgeois","La sculpture représente une araignée monumentale, d'environ 10 m de hauteur pour autant de large. Son abdomen et son thorax sont, dans la plupart des versions, en bronze. Sous son corps, elle comporte un sac contenant 26 œufs en marbre. Les extrémités des huit pattes de l'araignée sont les seuls points de contact de la sculpture avec le sol, et les pattes s'élancent ensuite presque à la verticale, avant d'obliquer sous l'horizontale pour rejoindre le reste du corps de l'animal.",'320000','Bon pour le musée','2020-02-03',0,'Belle oeuvre pour le jardin','Effraie les voleurs','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=3));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (16,"Triptyque de Guerre d'Otto Dix","La Guerre est un triptyque à prédelle réalisé entre 1929 et 1932 par le peintre et graveur allemand Otto Dix. Ce tableau appartient au mouvement de la Nouvelle Objectivité. Sur le modelé d'un retable, ce tableau est inspiré des triptyques de la Renaissance qui représentaient dans les deux planches supérieures la vie sur Terre et sur la prédelle la mort, l'enfer et le chaos. Ainsi sur le tableau de Dix on observe ce contraste qui dépeint l'enfer sur la partie liée à la vie et sur la prédelle le repos et la paix.",'3400000','Bon pour le musée','2020-04-15',0,'Aussi belle que la réalité','A monter soi même','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=2));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (17,"Balloon Girl de Banksy","La Petite Fille au ballon (en anglais : Girl with Balloon) est une œuvre de street art de Banksy réalisée en 2002 à Londres, plus précisément sur le pont de Waterloo à South Bank. Cette œuvre a été mise aux enchères en octobre 2018 et s'est, à la fin de la vente, autodétruite sous les yeux des acheteurs et des spectateurs, mortifiés de voir l'œuvre partir en morceaux. Il semblerait que ce soit Banksy lui même qui aurait dissimulé une déchiqueteuse dans le cadre, dans le cas où elle serait mise aux enchères.",'35000000','Bon pour le musée','2020-01-13',0,'En plusieurs morceaux','En plusieurs morceaux','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (18,"Panthère rose rubis","Le rubis est la variété rouge de la famille minérale du corindon. Sa couleur est causée principalement par la présence d'atomes de chrome (les corindons sans la présence de chrome sont les saphirs), à hauteur d'environ 2% au maximum. La panthère rose est le plus gros rubis existant.",'14500000','Bon pour le musée','2019-12-03',0,"Pas besoin de la nourrir","Livrée avec l'inspecteur Clouseau",'0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=1));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (19,"Guernica de Pablo Picasso","Guernica est une des œuvres les plus célèbres du peintre espagnol Pablo Picasso, et un des tableaux les plus connus au monde. Picasso réalisa cette huile sur toile de style cubiste entre le 1er mai et le 4 juin 1937, à Paris, en réponse à une commande du gouvernement républicain de Francisco Largo Caballero pour le pavillon espagnol de l'Exposition universelle de Paris de 1937. Cette toile monumentale est une dénonciation engagée du bombardement de la ville de Guernica, qui venait de se produire le 26 avril 1937, lors de la guerre d'Espagne, ordonné par les nationalistes espagnols et exécuté par des troupes allemandes nazies et fascistes italiennes. Le tableau de Picasso, qui fut exposé dans de nombreux pays entre 1937 et 1939, a joué un rôle important dans l'intense propagande suscitée par ce bombardement et par la guerre d'Espagne ; il a acquis ainsi rapidement une grande renommée et une portée politique internationale, devenant un symbole de la dénonciation de la violence franquiste et fasciste, puis de l'horreur de la guerre en général.",'18700000','Bon pour le musée','2020-04-13',0,'Coloriage pour les débutants','Utilisable une seule fois','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=4));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (20,"Saint-Georges-Majeur au crépuscule par Claude Monet","Saint-Georges-Majeur au crépuscule est un tableau peint par Claude Monet entre 1908 et 1912. Il mesure 65,2 cm de haut sur 92,4 cm de large. Il est conservé au National Museum Wales, Cardiff. Les tons sont chauds. Cette peinture a été faite pendant la visite de Claude Monet à Venise en automne 1908.",'3800000','Bon pour le musée','2020-04-03',0,"Mieux qu'un tapis de souris Razer",'Ne passe pas à la machine','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=2));
INSERT INTO `produit`(`IDproduit`, `Nom`, `Description`, `Prix`, `Categorie`, `DateMiseEnLigne`, `Vendu`, `Qualite`, `Defaut`, `OffreSpeciale`, `IDutilisateur`) 
	VALUES (5,"La Venus de Milo","La Vénus de Milo est une statue en marbre représentant, selon certaines hypothèses, la déesse Aphrodite, retrouvée sans ses bras dans l'île grecque de Milos en 1820. C'est une œuvre de l'époque hellénistique, créée vers 150-130 av. J.-C.",'35800000','Bon pour le musée','2020-04-16',0,"Magnifique les bras m'en tombent",'Ca lui fait le même effet','0',(SELECT IDutilisateur FROM utilisateur WHERE IDutilisateur=2));



INSERT INTO `paiement`(`IDpaiement`, `Nom`, `Prenom`, `Type`, `NumCarte`, `DateExp`, `CodeSecu`) 
	VALUES (1,'Bonisseur de La Bath','Hubert','MasterCard',1234123412341234,'2023-05-00','999');
INSERT INTO `paiement`(`IDpaiement`, `Nom`, `Prenom`, `Type`, `NumCarte`, `DateExp`, `CodeSecu`) 
	VALUES (2,'Leurre','Benoit','MasterCard',1234999912341234,'2022-05-00','111');



INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=1),"images/produit/11.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=1),"images/produit/12.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=2),"images/produit/21.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=2),"images/produit/22.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=3),"images/produit/31.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=4),"images/produit/41.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=5),"images/produit/51.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=6),"images/produit/61.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=6),"images/produit/62.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=7),"images/produit/71.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=8),"images/produit/81.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=8),"images/produit/82.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=9),"images/produit/91.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=10),"images/produit/101.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=11),"images/produit/111.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=11),"images/produit/112.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=16),"images/produit/151.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=16),"images/produit/152.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=16),"images/produit/153.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=16),"images/produit/154.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=16),"images/produit/155.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=15),"images/produit/161.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=15),"images/produit/162.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=17),"images/produit/171.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=17),"images/produit/172.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=18),"images/produit/181.jpg");
INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=18),"images/produit/182.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=19),"images/produit/191.jpg");

INSERT INTO `image`(`IDproduit`, `Lien`) VALUES ((SELECT IDproduit FROM produit WHERE IDproduit=20),"images/produit/201.jpg");


