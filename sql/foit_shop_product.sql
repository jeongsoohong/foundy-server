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
-- Table structure for table `shop_product`
--

DROP TABLE IF EXISTS `shop_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(32) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_name` varchar(32) NOT NULL,
  `item_cat` varchar(16) NOT NULL,
  `item_type` tinyint(4) NOT NULL,
  `item_tax` tinyint(4) NOT NULL,
  `item_shipping_days` tinyint(4) NOT NULL,
  `item_shipping_free` tinyint(4) NOT NULL,
  `item_base_info` varchar(128) NOT NULL,
  `item_attention_point` varchar(64) NOT NULL,
  `order_attention_point` varchar(64) NOT NULL,
  `shipping_attention_point` varchar(64) NOT NULL,
  `item_noti_info_need` tinyint(4) NOT NULL,
  `item_noti_info` text NOT NULL,
  `item_cert_need` tinyint(4) NOT NULL,
  `item_kc_cert_number` varchar(64) NOT NULL,
  `item_cert_name` varchar(64) NOT NULL,
  `item_model_name` varchar(64) NOT NULL,
  `item_manufacturer_name` varchar(64) NOT NULL,
  `item_importer_name` varchar(64) NOT NULL,
  `item_general_price` int(11) NOT NULL,
  `item_sell_price` int(11) NOT NULL,
  `item_margin` tinyint(4) NOT NULL,
  `item_supply_price` int(11) NOT NULL,
  `item_option_requires_cnt` tinyint(4) NOT NULL,
  `item_option_requires` text NOT NULL,
  `item_option_others_cnt` tinyint(4) NOT NULL,
  `item_option_others` text NOT NULL,
  `item_desc` mediumtext NOT NULL,
  `item_image_url_0` varchar(256) NOT NULL,
  `item_image_url_1` varchar(256) NOT NULL,
  `item_image_url_2` varchar(256) NOT NULL,
  `item_image_url_3` varchar(256) NOT NULL,
  `item_image_url_4` varchar(256) NOT NULL,
  `item_image_url_5` varchar(256) NOT NULL,
  `item_image_count` tinyint(4) NOT NULL,
  `item_discount_rate` tinyint(4) NOT NULL,
  `purchase_max_cnt` int(11) NOT NULL DEFAULT '10',
  `bundle_shipping_cnt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`),
  KEY `shop_id` (`shop_id`),
  KEY `item_name` (`item_name`),
  KEY `item_cat` (`item_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30 16:04:53
