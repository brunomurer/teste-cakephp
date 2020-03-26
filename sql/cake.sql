# Host: cloud.wmsinfo.com.br  (Version 5.6.47)
# Date: 2020-03-26 11:23:55
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "contacts"
#

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# Data for table "contacts"
#

INSERT INTO `contacts` VALUES (1,NULL,'nome','email','0000-00-00 00:00:00'),(2,NULL,'nome','email','0000-00-00 00:00:00'),(3,NULL,'nome','email','0000-00-00 00:00:00'),(4,NULL,'nome','email','0000-00-00 00:00:00'),(5,NULL,'nome','email','0000-00-00 00:00:00'),(6,NULL,'nome','email','0000-00-00 00:00:00'),(7,NULL,'nome','email','0000-00-00 00:00:00'),(8,NULL,NULL,NULL,NULL);

#
# Structure for table "peoples"
#

DROP TABLE IF EXISTS `peoples`;
CREATE TABLE `peoples` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

#
# Data for table "peoples"
#

INSERT INTO `peoples` VALUES (1,'nome','email','0000-00-00 00:00:00'),(2,'nome','email','0000-00-00 00:00:00'),(3,'nome','email','0000-00-00 00:00:00'),(4,'nome','email','0000-00-00 00:00:00'),(5,'nome','email','0000-00-00 00:00:00'),(6,'nome','email','0000-00-00 00:00:00'),(7,'nome','email','0000-00-00 00:00:00'),(8,'nome','email','0000-00-00 00:00:00'),(9,NULL,'b25896451@gmail.com','2020-03-26 03:03:22');
