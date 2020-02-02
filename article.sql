DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(17) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'タイトル1','内容1がここに入ります。'),(2,'タイトル2','内容2がここに入ります。');

UNLOCK TABLES;