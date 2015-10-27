CREATE DATABASE  IF NOT EXISTS `red_belt_review` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `red_belt_review`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: red_belt_review
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (4,'HEYYO','LA','2015-06-27 21:49:30','2015-06-27 21:49:30'),(5,'A Life','Austin Chang','2015-06-27 21:57:16','2015-06-27 21:57:16'),(6,'Ably-Able','Lyanne Abe','2015-06-27 22:02:38','2015-06-27 22:02:38'),(7,'Boba','Austin','2015-06-27 22:30:18','2015-06-27 22:30:18'),(8,'Taiwan mission trip','Michael choi','2015-06-28 22:33:14','2015-06-28 22:33:14');
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
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users_idx` (`user_id`),
  KEY `fk_reviews_books1_idx` (`book_id`),
  CONSTRAINT `fk_reviews_books1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,3,4,4,'YOYOYOYO','2015-06-27 21:49:30','2015-06-27 21:49:30'),(2,3,5,5,'BEST BOOK EVER','2015-06-27 21:57:16','2015-06-27 21:57:16'),(3,3,6,5,'GREAT!','2015-06-27 22:02:38','2015-06-27 22:02:38'),(4,3,7,4,'YUMMMM','2015-06-27 22:30:18','2015-06-27 22:30:18'),(5,3,7,4,'DERICIOUS!','2015-06-28 11:40:40','2015-06-28 11:40:40'),(6,3,6,5,'Such cute story!','2015-06-28 11:42:04','2015-06-28 11:42:04'),(7,8,4,3,'GRRRRRRR','2015-06-28 22:29:36','2015-06-28 22:29:36'),(8,8,7,5,'I WANT SOME NOW','2015-06-28 22:29:56','2015-06-28 22:29:56'),(9,8,6,5,'spot on!','2015-06-28 22:30:36','2015-06-28 22:30:36'),(10,6,7,2,'dudee..','2015-06-28 22:31:03','2015-06-28 22:31:03'),(11,6,4,1,'yawsa','2015-06-28 22:31:21','2015-06-28 22:31:21'),(12,6,5,3,'its aight','2015-06-28 22:31:35','2015-06-28 22:31:35'),(13,6,6,2,'weird name','2015-06-28 22:31:51','2015-06-28 22:31:51'),(14,6,8,5,'Living faith','2015-06-28 22:33:14','2015-06-28 22:33:14'),(15,3,8,5,'I wish I can go!','2015-07-02 20:53:00','2015-07-02 20:53:00'),(16,3,7,4,'I want some now too!','2015-07-02 20:53:30','2015-07-02 20:53:30'),(17,3,6,5,'Re-reading it!','2015-07-02 20:53:50','2015-07-02 20:53:50');
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
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Austin Chang','AC','austin@gmail.com','l6//M4IfuWoX6Wlt0APGm+nVfYzGNRbr388hR5jwpTfjJKlRAj95e4Trxt87HXJLibfm8Trzw8OFs8Iu/Kq2hQ==','2015-06-27 20:57:42','2015-06-27 20:57:42'),(4,'Lyanne Abe','Ly','lyanne@gmail.com','WNa/F4G0JL4nx4P6o2NvixFReGq1xwWh59KGHeod4dmJzW12YkRwh176Kl8yDFmknA4oNnbMx0j1CnHZoJX9Ug==','2015-06-28 11:43:29','2015-06-28 11:43:29'),(5,'Denis Chang','Denis','denis@gmail.com','YIrqNn6sI4DYwhUfyCJV1WqVc5gBT9Rz513pU2BtmDOP1Zw+EVoWAxf8zVtQb2I6DSOnzCzO3vYHvynQpHbn9g==','2015-06-28 11:53:42','2015-06-28 11:53:42'),(6,'michael choi','Mchoi','michael@yahoo.com','GJ1fI8pqPs0yTD+eC3pYNc+ceW4jyGgvwOv0SUiQZJRp1oW6v3qUzP3P1WWy1dQWqUh+K3WjyPqOjVkwbGhIeg==','2015-06-28 22:28:17','2015-06-28 22:28:17'),(7,'michael choi','mchoi','michael@gmail.com','Bqqmslwqie8ogU8UJOPswc34UMzF2UQhxXCUj3JJie6XJr4tjR0aSmeE1CApFZYQ+TW76zpgxWIUBRTve/6s5g==','2015-06-28 22:28:47','2015-06-28 22:28:47'),(8,'lyanne abe','lyanne','lyanne@yahoo.com','0xbOoc5LtXL+FT/rHqxgq6u1CItGSv91q1QTNXxijKnAgmZCYRTldHo76CNAU87TUFJVpXH5mJS27LhZEtZK0g==','2015-06-28 22:29:18','2015-06-28 22:29:18'),(9,'jason','jason','jason@gmail.com','MS1I19vT1+p6gfV3c/JaivHLFJi9xlTdXFzek72etL6z5gvXjt1wl/uFAxr6Whmr+870NH6a6vMMmfXQRGgQRw==','2015-10-27 09:20:26','2015-10-27 09:20:26');
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

-- Dump completed on 2015-10-27 11:03:38
