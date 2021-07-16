# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: mysql.ricardoalcocer.com (MySQL 5.7.28-log)
# Database: graphqldemo
# Generation Time: 2021-07-16 9:45:28 PM +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table artists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artists`;

CREATE TABLE `artists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bio` text,
  `email` varchar(50) DEFAULT NULL,
  `stagename` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `formatted_address` varchar(150) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `route` varchar(100) DEFAULT '',
  `sublocality_level_1` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `administrative_area_level_1` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;

INSERT INTO `artists` (`id`, `bio`, `email`, `stagename`, `fname`, `lname`, `phone`, `avatar`, `formatted_address`, `street_number`, `route`, `sublocality_level_1`, `locality`, `administrative_area_level_1`, `country`, `postal_code`, `lat`, `lon`, `timestamp`)
VALUES
	(182,'Foxfire is a rock-opera-classical fusion band from L.A.','foxfire@gmail.com','Foxfire','Fox','Fire','(408) 123-4567','https://rickandmortyapi.com/api/character/avatar/193.jpeg',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-01 07:34:07');

/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(40) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `format_id` int(11) DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `max_attendees` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `guid`, `host_id`, `artist_id`, `venue_id`, `name`, `description`, `format_id`, `start_at`, `end_at`, `max_attendees`, `timestamp`)
VALUES
	(6,'bef513f1-fc14-4522-8458-4b3d442a8191',5,182,1,'My Great Event','This will be the best event you\'ll ever attend',4,'2021-07-01 07:33:09','2021-07-01 07:33:09',40,'2021-07-01 07:33:09');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events_formats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_formats`;

CREATE TABLE `events_formats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `events_formats` WRITE;
/*!40000 ALTER TABLE `events_formats` DISABLE KEYS */;

INSERT INTO `events_formats` (`id`, `name`, `description`, `timestamp`)
VALUES
	(4,'IN-PERSON','This event is in person.','2021-07-01 07:34:23'),
	(5,'VIRTUAL','This is a virtual event.','2021-07-01 07:34:29'),
	(6,'HYBRID','This event is hybrid, so you could either attend in person or virtually.','2021-07-01 12:18:05');

/*!40000 ALTER TABLE `events_formats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hosts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hosts`;

CREATE TABLE `hosts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `administrative_area_level_1` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `sublocality_level_1` varchar(100) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `formatted_address` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `hosts` WRITE;
/*!40000 ALTER TABLE `hosts` DISABLE KEYS */;

INSERT INTO `hosts` (`id`, `name`, `bio`, `phone`, `website`, `avatar`, `postal_code`, `country`, `administrative_area_level_1`, `locality`, `sublocality_level_1`, `route`, `street_number`, `formatted_address`, `timestamp`)
VALUES
	(5,'Jack Host','I will be your host this evening.',NULL,NULL,'https://rickandmortyapi.com/api/character/avatar/359.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-01 07:34:49');

/*!40000 ALTER TABLE `hosts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `addr1` varchar(150) DEFAULT NULL,
  `addr2` varchar(150) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `administrative_area_level_1` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `sublocality_level_1` varchar(100) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `formatted_address` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;

INSERT INTO `venues` (`id`, `name`, `host_id`, `addr1`, `addr2`, `zipcode`, `phone`, `email`, `website`, `lon`, `lat`, `postal_code`, `country`, `administrative_area_level_1`, `locality`, `sublocality_level_1`, `route`, `street_number`, `formatted_address`, `timestamp`)
VALUES
	(4,'Burger King',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-16 14:37:36');

/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table venues_photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venues_photos`;

CREATE TABLE `venues_photos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `venues_photos` WRITE;
/*!40000 ALTER TABLE `venues_photos` DISABLE KEYS */;

INSERT INTO `venues_photos` (`id`, `venue_id`, `url`, `description`, `timestamp`)
VALUES
	(3,3,'https://image.shutterstock.com/image-photo/moscow-march-13-2016-inside-600w-409245415.jpg','Burger King Interior','2021-07-16 14:38:06');

/*!40000 ALTER TABLE `venues_photos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
