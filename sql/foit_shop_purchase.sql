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
-- Table structure for table `shop_purchase`
--

DROP TABLE IF EXISTS `shop_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_code` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_code` varchar(16) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `session_id` varchar(40) NOT NULL,
  `cart_ids` varchar(128) NOT NULL,
  `purchase_product_ids` varchar(128) NOT NULL,
  `total_purchase_cnt` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `total_shipping_fee` int(11) NOT NULL,
  `total_additional_price` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `receipt_id` varchar(128) NOT NULL DEFAULT '',
  `receipt_url` varchar(512) NOT NULL DEFAULT '',
  `register_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `done_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bootpay_confirmed_data` text NOT NULL,
  `bootpay_done_data` text NOT NULL,
  `fail_reason` varchar(256) NOT NULL DEFAULT '',
  `canceled_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiver_name` varchar(64) NOT NULL DEFAULT '',
  `receiver_phone_1` varchar(32) NOT NULL DEFAULT '',
  `receiver_phone_2` varchar(32) NOT NULL DEFAULT '',
  `receiver_postcode` varchar(16) NOT NULL DEFAULT '',
  `receiver_address_1` varchar(128) NOT NULL DEFAULT '',
  `receiver_address_2` varchar(128) NOT NULL DEFAULT '',
  `receiver_req` varchar(64) NOT NULL DEFAULT '',
  `sender_name` varchar(64) NOT NULL DEFAULT '',
  `sender_email` varchar(128) NOT NULL DEFAULT '',
  `sender_phone` varchar(32) NOT NULL DEFAULT '',
  `sender_postcode` varchar(16) NOT NULL DEFAULT '',
  `sender_address_1` varchar(128) NOT NULL DEFAULT '',
  `sender_address_2` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`purchase_id`),
  UNIQUE KEY `purchase_code` (`purchase_code`),
  KEY `user_id` (`user_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30 16:05:50
