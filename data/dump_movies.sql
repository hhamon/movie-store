-- MySQL dump 10.13  Distrib 5.1.61, for apple-darwin11.2.0 (i386)
--
-- Host: localhost    Database: sl_movie_store
-- ------------------------------------------------------
-- Server version	5.1.61

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
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `shot_year` int(10) unsigned NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `support` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dvd',
  `type` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `price` float(18,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movie_sluggable_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,'Titanic','Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde, réputé pour son insubmersibilité, le \"Titanic\", appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. A son bord, un artiste pauvre et une grande bourgeoise tombent amoureux. ','James Cameron',1997,194,'dvd','romance','645783e10f4dfbea1705f75557774a341ddaf0a4.jpg',15.00,'2012-05-02 16:23:18','2012-05-02 16:23:18','titanic'),(2,'Seven','Pour conclure sa carrière, l\'inspecteur Somerset, vieux flic blasé, tombe à sept jours de la retraite sur un criminel peu ordinaire. John Doe, c\'est ainsi que se fait appeler l\'assassin, a decidé de nettoyer la societé des maux qui la rongent en commettant sept meurtres basés sur les sept pechés capitaux: la gourmandise, l\'avarice, la paresse, l\'orgueil, la luxure, l\'envie et la colère. ','David Fincher',1995,140,'blueray','thriller','1760011b9162258eb106aacbad4d49c48b3d6cfa.jpg',20.00,'2012-05-02 16:25:34','2012-05-02 16:25:34','seven'),(3,'Qui veut la peau de Roger Rabbit ?','Roger Rabbit est au trente-sixième dessous. Autrefois sacré star du cinéma d\'animation, le lapin blanc est fortement préoccupé pendant les tournages depuis qu\'il soupçonne sa femme, la sublime Jessica Rabbit, de le tromper. Le studio qui emploie Roger décide d\'engager un privé, Eddie Valliant, pour découvrir ce qui se cache derrière cette histoire bien plus complexe qu\'il n\'y parait ! ','Robert Zemeckis',1988,123,'vhs','cartoon','9f18a505f0c0cb6ce2f6f6ec836b0f33479191e7.jpg',7.00,'2012-05-02 16:27:28','2012-05-02 16:27:28','qui-veut-la-peau-de-roger-rabbit'),(4,'Alien, le huitième passager ','Le vaisseau commercial Nostromo et son équipage, sept hommes et femmes, rentrent sur Terre avec une importante cargaison de minerai. Mais lors d\'un arrêt forcé sur une planète déserte, l\'officier Kane se fait agresser par une forme de vie inconnue, une arachnide qui étouffe son visage.\r\nAprès que le docteur de bord lui retire le spécimen, l\'équipage retrouve le sourire et dîne ensemble. Jusqu\'à ce que Kane, pris de convulsions, voit son abdomen perforé par un corps étranger vivant, qui s\'échappe dans les couloirs du vaisseau... ','Ridley Scott',1979,116,'dvd','scifi','9fa569ec22497d76752706f939173986093a000c.jpg',13.90,'2012-05-02 16:29:59','2012-05-02 16:29:59','alien-le-huitieme-passager'),(5,'Aliens le retour','Après 57 ans de dérive dans l\'espace, Ellen Ripley est secourue par la corporation Weyland-Yutani. Malgré son rapport concernant l’incident survenu sur le Nostromo, elle n’est pas prise au sérieux par les militaires quant à la présence de xénomorphes sur la planète LV-426 où se posa son équipage… planète où plusieurs familles de colons ont été envoyées en mission de \"terraformage\". Après la disparition de ces derniers, Ripley décide d\'accompagner une escouade de marines dans leur mission de sauvetage... et d’affronter à nouveau la Bête. ','James Cameron',1985,137,'dvd','scifi','9f1df0034eff233fa7042b72d592562a2b22ae89.jpg',13.90,'2012-05-02 16:31:13','2012-05-02 16:31:13','aliens-le-retour');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-05-02 16:33:45
