-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: 52.78.120.161    Database: foit
-- ------------------------------------------------------
-- Server version	5.6.47

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `shop_purchase_product`
--

DROP TABLE IF EXISTS `shop_purchase_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_purchase_product` (
  `purchase_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `purchase_code` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_tax` tinyint(4) NOT NULL DEFAULT '1',
  `item_general_price` int(11) NOT NULL,
  `item_discount_rate` tinyint(4) NOT NULL,
  `item_sell_price` int(11) NOT NULL,
  `item_margin` tinyint(4) NOT NULL DEFAULT '20',
  `item_supply_price` int(11) NOT NULL DEFAULT '0',
  `free_shipping` tinyint(4) NOT NULL,
  `free_shipping_total_price` int(11) NOT NULL,
  `free_shipping_cond_price` int(11) NOT NULL,
  `bundle_shipping_cnt` int(11) NOT NULL,
  `total_purchase_cnt` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_shipping_fee` int(11) NOT NULL,
  `total_additional_price` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `item_option_requires_cnt` int(11) NOT NULL,
  `item_option_requires` text NOT NULL,
  `item_option_others_cnt` int(11) NOT NULL,
  `item_option_others` text NOT NULL,
  `purchase_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_status` tinyint(4) NOT NULL,
  `shipping_status_code` varchar(16) NOT NULL,
  `shipping_data` varchar(256) NOT NULL DEFAULT '',
  `reviewed` tinyint(4) NOT NULL DEFAULT '0',
  `canceled` tinyint(4) NOT NULL DEFAULT '0',
  `canceled_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchase_product_id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `purchase_code` (`purchase_code`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `shop_id` (`shop_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30 16:05:40
