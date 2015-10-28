-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: book_reviews
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Dr. Seuss','2015-10-20 11:01:06','2015-10-20 11:01:06'),(2,'PHP MVC Author','2015-10-20 11:49:37','2015-10-20 11:49:37'),(3,'CodeIgniter Author','2015-10-20 11:51:11','2015-10-20 11:51:11'),(4,'OOP Author','2015-10-20 11:52:08','2015-10-20 11:52:08'),(5,'Strategic Author','2015-10-20 13:58:28','2015-10-20 13:58:28'),(6,'Planning Author','2015-10-20 13:59:03','2015-10-20 13:59:03'),(7,'Get along author','2015-10-20 13:59:55','2015-10-20 13:59:55'),(8,'The Wall Author','2015-10-20 14:03:47','2015-10-20 14:03:47'),(9,'End Author','2015-10-20 14:05:38','2015-10-20 14:05:38'),(10,'','2015-10-20 14:08:09','2015-10-20 14:08:09');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_books_authors1_idx` (`author_id`),
  CONSTRAINT `fk_books_authors1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Green Eggs and Ham',1,'2015-10-20 11:01:06','2015-10-20 11:01:06'),(2,'PHP MVC',2,'2015-10-20 11:49:37','2015-10-20 11:49:37'),(3,'CodeIgniter',3,'2015-10-20 11:51:11','2015-10-20 11:51:11'),(4,'OOP',4,'2015-10-20 11:52:08','2015-10-20 11:52:08'),(5,'Strategies',5,'2015-10-20 13:58:28','2015-10-20 13:58:28'),(6,'Planning',6,'2015-10-20 13:59:03','2015-10-20 13:59:03'),(7,'Getting along',7,'2015-10-20 13:59:55','2015-10-20 13:59:55'),(8,'The Wall',8,'2015-10-20 14:03:47','2015-10-20 14:03:47'),(9,'Where the sidewalk ends',9,'2015-10-20 14:05:38','2015-10-20 14:05:38'),(10,'Dojo Rules',10,'2015-10-20 14:08:09','2015-10-20 14:08:09');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_books_idx` (`book_id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  CONSTRAINT `fk_reviews_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'This book is great for kids! It keeps them engaged throughout the reading.','5',1,1,'2015-10-20 11:01:06','2015-10-20 11:01:06'),(2,'This books is fun after you figure out how to pass data between your views and models!','4',2,2,'2015-10-20 11:49:37','2015-10-20 11:49:37'),(3,'Taught me how to keep my app organized!','4',3,2,'2015-10-20 11:51:11','2015-10-20 11:51:11'),(4,'Had to attend class to learn about classes!','3',4,1,'2015-10-20 11:52:08','2015-10-20 11:52:08'),(5,'Very creative.','3',9,1,'2015-10-20 14:05:38','2015-10-20 14:05:38'),(6,'The Dojo Rocks!','3',10,2,'2015-10-20 14:08:09','2015-10-20 14:08:09'),(7,'2nd review for Dojo Rules! This place is awesome.','4',10,2,'2015-10-20 14:19:17','2015-10-20 14:19:17');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Snoop','Dogg','Snoop','snoop@dogg.com','password','2015-10-20 10:58:05','2015-10-20 10:58:05'),(2,'Natalie','Portman','Nattie','natalie@portman.com','password','2015-10-20 11:48:49','2015-10-20 11:48:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-21 17:52:13
