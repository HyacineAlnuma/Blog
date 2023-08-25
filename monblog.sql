-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: php_p5
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) DEFAULT NULL,
  `lastUpdateDate` datetime DEFAULT NULL,
  `content` text,
  `id_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id_post_idx` (`id_post`),
  KEY `comments_users_idx` (`id_user`),
  CONSTRAINT `comments_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `comments_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (53,'Hyacine Alnuma','2023-08-25 09:43:58','commentaire admin',55,10,1),(54,'Hyacine Alnuma','2023-08-25 09:44:11','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.',55,10,1),(55,'User1','2023-08-25 09:44:45','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.',54,8,1),(56,'User2','2023-08-25 09:46:06','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.',54,11,1),(57,'User2','2023-08-25 09:46:13','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.',53,11,1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `chapo` varchar(256) DEFAULT NULL,
  `content` text,
  `author` varchar(45) DEFAULT NULL,
  `lastUpdateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (53,'Premier post','Chapo du premier post','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.\r\n\r\nLeo integer malesuada nunc vel risus commodo viverra maecenas. Vel eros donec ac odio tempor orci dapibus. Neque sodales ut etiam sit amet nisl purus in mollis. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Justo nec ultrices dui sapien eget mi proin sed libero. Posuere lorem ipsum dolor sit amet consectetur adipiscing. At lectus urna duis convallis convallis tellus id interdum. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Commodo ullamcorper a lacus vestibulum sed arcu. Faucibus pulvinar elementum integer enim neque volutpat. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. Purus in mollis nunc sed id semper risus in hendrerit. Dictum sit amet justo donec enim diam vulputate ut. Commodo nulla facilisi nullam vehicula. Nunc sed id semper risus in. Faucibus in ornare quam viverra orci. Eget sit amet tellus cras adipiscing enim eu. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Eu turpis egestas pretium aenean pharetra magna.\r\n\r\nViverra mauris in aliquam sem fringilla ut morbi. Id velit ut tortor pretium viverra suspendisse. Aliquam eleifend mi in nulla posuere. Pellentesque elit eget gravida cum. Enim sit amet venenatis urna cursus eget nunc scelerisque viverra. Non nisi est sit amet. Volutpat diam ut venenatis tellus in. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Aliquam ultrices sagittis orci a scelerisque purus semper eget. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Placerat vestibulum lectus mauris ultrices. Ut morbi tincidunt augue interdum velit euismod.\r\n\r\nEt molestie ac feugiat sed lectus vestibulum. Nibh sed pulvinar proin gravida hendrerit. Augue interdum velit euismod in. Sapien eget mi proin sed libero. Duis convallis convallis tellus id interdum velit laoreet. Commodo sed egestas egestas fringilla. Adipiscing tristique risus nec feugiat in fermentum posuere. Magnis dis parturient montes nascetur ridiculus mus. Ut sem nulla pharetra diam sit. Convallis posuere morbi leo urna molestie at elementum eu facilisis. A lacus vestibulum sed arcu non odio euismod. Sed cras ornare arcu dui vivamus. Convallis convallis tellus id interdum velit. A iaculis at erat pellentesque adipiscing commodo elit at. In arcu cursus euismod quis viverra nibh cras pulvinar mattis.\r\n\r\nVolutpat lacus laoreet non curabitur gravida arcu ac tortor. Nisi quis eleifend quam adipiscing. Nec feugiat in fermentum posuere urna nec tincidunt praesent. Auctor augue mauris augue neque gravida. Arcu dictum varius duis at consectetur lorem donec massa sapien. Interdum varius sit amet mattis vulputate enim nulla aliquet. Semper feugiat nibh sed pulvinar. Velit laoreet id donec ultrices tincidunt. Est placerat in egestas erat. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Diam maecenas sed enim ut sem viverra aliquet eget. Aliquet bibendum enim facilisis gravida neque convallis a cras. Metus aliquam eleifend mi in nulla posuere sollicitudin. Volutpat lacus laoreet non curabitur gravida arcu ac tortor. Sed adipiscing diam donec adipiscing tristique risus nec feugiat in.','Hyacine Alnuma','2023-08-25 09:38:18'),(54,'Deuxième post modifié','Chapo du deuxième post modifié','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.\r\n\r\nLeo integer malesuada nunc vel risus commodo viverra maecenas. Vel eros donec ac odio tempor orci dapibus. Neque sodales ut etiam sit amet nisl purus in mollis. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Justo nec ultrices dui sapien eget mi proin sed libero. Posuere lorem ipsum dolor sit amet consectetur adipiscing. At lectus urna duis convallis convallis tellus id interdum. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Commodo ullamcorper a lacus vestibulum sed arcu. Faucibus pulvinar elementum integer enim neque volutpat. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. Purus in mollis nunc sed id semper risus in hendrerit. Dictum sit amet justo donec enim diam vulputate ut. Commodo nulla facilisi nullam vehicula. Nunc sed id semper risus in. Faucibus in ornare quam viverra orci. Eget sit amet tellus cras adipiscing enim eu. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Eu turpis egestas pretium aenean pharetra magna.\r\n\r\nViverra mauris in aliquam sem fringilla ut morbi. Id velit ut tortor pretium viverra suspendisse. Aliquam eleifend mi in nulla posuere. Pellentesque elit eget gravida cum. Enim sit amet venenatis urna cursus eget nunc scelerisque viverra. Non nisi est sit amet. Volutpat diam ut venenatis tellus in. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Aliquam ultrices sagittis orci a scelerisque purus semper eget. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Placerat vestibulum lectus mauris ultrices. Ut morbi tincidunt augue interdum velit euismod.\r\n\r\nEt molestie ac feugiat sed lectus vestibulum. Nibh sed pulvinar proin gravida hendrerit. Augue interdum velit euismod in. Sapien eget mi proin sed libero. Duis convallis convallis tellus id interdum velit laoreet. Commodo sed egestas egestas fringilla. Adipiscing tristique risus nec feugiat in fermentum posuere. Magnis dis parturient montes nascetur ridiculus mus. Ut sem nulla pharetra diam sit. Convallis posuere morbi leo urna molestie at elementum eu facilisis. A lacus vestibulum sed arcu non odio euismod. Sed cras ornare arcu dui vivamus. Convallis convallis tellus id interdum velit. A iaculis at erat pellentesque adipiscing commodo elit at. In arcu cursus euismod quis viverra nibh cras pulvinar mattis.\r\n\r\nVolutpat lacus laoreet non curabitur gravida arcu ac tortor. Nisi quis eleifend quam adipiscing. Nec feugiat in fermentum posuere urna nec tincidunt praesent. Auctor augue mauris augue neque gravida. Arcu dictum varius duis at consectetur lorem donec massa sapien. Interdum varius sit amet mattis vulputate enim nulla aliquet. Semper feugiat nibh sed pulvinar. Velit laoreet id donec ultrices tincidunt. Est placerat in egestas erat. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Diam maecenas sed enim ut sem viverra aliquet eget. Aliquet bibendum enim facilisis gravida neque convallis a cras. Metus aliquam eleifend mi in nulla posuere sollicitudin. Volutpat lacus laoreet non curabitur gravida arcu ac tortor. Sed adipiscing diam donec adipiscing tristique risus nec feugiat in.','Hyacine Alnuma','2023-08-25 09:43:29'),(55,'Troisième post','Chapo du troisième post','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Nunc id cursus metus aliquam eleifend. Sed libero enim sed faucibus turpis in eu mi. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Non nisi est sit amet. Cursus risus at ultrices mi tempus imperdiet nulla. Vulputate sapien nec sagittis aliquam. Sit amet cursus sit amet dictum sit. Sed adipiscing diam donec adipiscing. Ultrices dui sapien eget mi proin sed libero enim sed. Amet consectetur adipiscing elit duis tristique sollicitudin nibh.\r\n\r\nLeo integer malesuada nunc vel risus commodo viverra maecenas. Vel eros donec ac odio tempor orci dapibus. Neque sodales ut etiam sit amet nisl purus in mollis. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Justo nec ultrices dui sapien eget mi proin sed libero. Posuere lorem ipsum dolor sit amet consectetur adipiscing. At lectus urna duis convallis convallis tellus id interdum. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Commodo ullamcorper a lacus vestibulum sed arcu. Faucibus pulvinar elementum integer enim neque volutpat. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. Purus in mollis nunc sed id semper risus in hendrerit. Dictum sit amet justo donec enim diam vulputate ut. Commodo nulla facilisi nullam vehicula. Nunc sed id semper risus in. Faucibus in ornare quam viverra orci. Eget sit amet tellus cras adipiscing enim eu. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Eu turpis egestas pretium aenean pharetra magna.\r\n\r\nViverra mauris in aliquam sem fringilla ut morbi. Id velit ut tortor pretium viverra suspendisse. Aliquam eleifend mi in nulla posuere. Pellentesque elit eget gravida cum. Enim sit amet venenatis urna cursus eget nunc scelerisque viverra. Non nisi est sit amet. Volutpat diam ut venenatis tellus in. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Aliquam ultrices sagittis orci a scelerisque purus semper eget. Semper feugiat nibh sed pulvinar proin gravida hendrerit. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Placerat vestibulum lectus mauris ultrices. Ut morbi tincidunt augue interdum velit euismod.\r\n\r\nEt molestie ac feugiat sed lectus vestibulum. Nibh sed pulvinar proin gravida hendrerit. Augue interdum velit euismod in. Sapien eget mi proin sed libero. Duis convallis convallis tellus id interdum velit laoreet. Commodo sed egestas egestas fringilla. Adipiscing tristique risus nec feugiat in fermentum posuere. Magnis dis parturient montes nascetur ridiculus mus. Ut sem nulla pharetra diam sit. Convallis posuere morbi leo urna molestie at elementum eu facilisis. A lacus vestibulum sed arcu non odio euismod. Sed cras ornare arcu dui vivamus. Convallis convallis tellus id interdum velit. A iaculis at erat pellentesque adipiscing commodo elit at. In arcu cursus euismod quis viverra nibh cras pulvinar mattis.\r\n\r\nVolutpat lacus laoreet non curabitur gravida arcu ac tortor. Nisi quis eleifend quam adipiscing. Nec feugiat in fermentum posuere urna nec tincidunt praesent. Auctor augue mauris augue neque gravida. Arcu dictum varius duis at consectetur lorem donec massa sapien. Interdum varius sit amet mattis vulputate enim nulla aliquet. Semper feugiat nibh sed pulvinar. Velit laoreet id donec ultrices tincidunt. Est placerat in egestas erat. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Diam maecenas sed enim ut sem viverra aliquet eget. Aliquet bibendum enim facilisis gravida neque convallis a cras. Metus aliquam eleifend mi in nulla posuere sollicitudin. Volutpat lacus laoreet non curabitur gravida arcu ac tortor. Sed adipiscing diam donec adipiscing tristique risus nec feugiat in.','Hyacine Alnuma','2023-08-25 09:39:09');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `passwordHash` varchar(64) DEFAULT NULL,
  `userRole` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'User1','user@gmail.com','$2y$10$vlILEASuGJA1vU6CUB/FAOXkl0ialDkw7dLaXmeURBTzn9pN70Ccm','user'),(10,'Hyacine Alnuma','hyacinealnuma@hotmail.fr','$2y$10$SbDMrZda2fyPhoVknxUF0ucPOal0dpoDnq93cLS1aRNHw1rv1hLDi','admin'),(11,'User2','zaefr@azef.com','$2y$10$hcNgbxrDfzA694SRkUQXyuyeCH9TvOyBox66XSLAP3LPOrOKN33P.','user'),(12,'User3','qf@qg.com','$2y$10$uqzCfwFWhBJW5VhATC7ZFu9LX8CL.hbt7mh6ErX2NkttnkZ29426S','user'),(13,'User4','aqze@aze.com','$2y$10$bXhgGU/p5QUVyeOLJ5EI0.GNvUR4lH7OAdWhIlRofSuByYGQNYKMm','user'),(16,'User5','qzref@aqzerf','$2y$10$2RWGoJ8QNX37avJOH2agvuuMrSmSMOyD1IMpZ9wqBJm2n.G23kD2S','user'),(17,'User6','azer@azef','$2y$10$hrWJi2bYLoLYdxPBJGz3leVVqBWLnVsNeIdYueUnhnBbkfyuHUm/e','user'),(18,'azer','azf@azef','$2y$10$vpkiqMZUAG3.wr4Cb9VFpuM11KLxhWOOx4JYS0GvNo./M6.xxI/MW','user'),(19,'haha','hah@sdaz','$2y$10$GEOpi3E8lhO4Fr4R7q4Hp.i7PxMtuZspU1E8zMHc6SxN9WXBboxvG','user'),(20,'nicu','nicu@jk','$2y$10$VLGX2F80Cy7j.L5Ae9Qc4etgmS3louLZXalLIHrh6wvh3e0OV3TTa','user'),(21,'yay','yay@yay','$2y$10$U7WjzNdIlY9BUxjxkj22L.kp.4PSfBKnCwwEgoYSMc/983VRDNoHW','user'),(22,'usertest','aa@a','$2y$10$rW6yM.obVL9WUTikrUoKquFwupm3CMuplS8BTwYYK2Yr9HyMC1NZK','user');
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

-- Dump completed on 2023-08-25 10:55:12
