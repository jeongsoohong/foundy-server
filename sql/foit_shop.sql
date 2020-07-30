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
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activate` tinyint(4) NOT NULL DEFAULT '0',
  `shop_name` varchar(16) NOT NULL,
  `shop_phone` varchar(32) NOT NULL DEFAULT '' COMMENT '연락처',
  `shop_items` varchar(128) NOT NULL DEFAULT '' COMMENT '입점품목',
  `shop_homepage_url` varchar(256) NOT NULL DEFAULT '' COMMENT '홈페이지 URL',
  `email` varchar(128) NOT NULL DEFAULT '',
  `representative_name` varchar(128) NOT NULL DEFAULT '' COMMENT '대표자 성함',
  `business_license_num` varchar(32) NOT NULL DEFAULT '' COMMENT '사업자 등록 번호',
  `business_license_url` varchar(256) NOT NULL DEFAULT '' COMMENT '사업자 등록증 URL',
  `business_conditions` varchar(128) DEFAULT NULL COMMENT '업종',
  `business_type` varchar(128) DEFAULT NULL COMMENT '업태',
  `commission_rate` varchar(16) DEFAULT NULL,
  `sns_url` varchar(256) DEFAULT NULL COMMENT '인스타그램 / 페이스북 URL',
  `register_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '신청일자',
  `contract_at` date DEFAULT NULL COMMENT '계약체결일',
  `bank_name` varchar(64) DEFAULT '',
  `bank_account_num` varchar(32) DEFAULT '',
  `bank_depositor` varchar(64) DEFAULT '',
  `address_1` varchar(128) NOT NULL DEFAULT '',
  `address_2` varchar(128) NOT NULL DEFAULT '',
  `postcode` varchar(8) NOT NULL DEFAULT '',
  `set_ship_info` tinyint(4) NOT NULL DEFAULT '0',
  `set_return_info` tinyint(4) NOT NULL DEFAULT '0',
  `set_brand_info` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30 16:04:49
