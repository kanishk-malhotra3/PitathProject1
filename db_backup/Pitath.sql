-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: patath_db
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `passwd` blob NOT NULL,
  `email` varchar(40) NOT NULL,
  `mob_no` varchar(20) NOT NULL,
  `cust_id` varchar(320) NOT NULL,
  `token` varchar(320) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`email`,`mob_no`,`cust_id`,`token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (3,'harish123',_binary '3a89dcabf2328cd52b9a15c73871169eceb7ba8bd2d1ad7a768ea06027254888','saknozolti@nedoz.com','7789822296','C20210','452b3e17c4a6e7ca16082d49a6aef3','active');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ec_edu_details`
--

DROP TABLE IF EXISTS `ec_edu_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ec_edu_details` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `10th_sc_name` varchar(320) DEFAULT NULL,
  `10th_board_name` varchar(320) DEFAULT NULL,
  `10th_passout_year` varchar(320) DEFAULT NULL,
  `10th_total_percent` varchar(40) DEFAULT NULL,
  `12th_sc_name` varchar(320) DEFAULT NULL,
  `12th_board_name` varchar(320) DEFAULT NULL,
  `12th_passout_year` varchar(320) DEFAULT NULL,
  `12th_total_percent` varchar(40) DEFAULT NULL,
  `grad_univ_name` varchar(320) DEFAULT NULL,
  `grad_course_name` varchar(320) DEFAULT NULL,
  `grad_course_type` varchar(320) DEFAULT NULL,
  `grad_passout_year` varchar(320) DEFAULT NULL,
  `grad_total_percent` varchar(40) DEFAULT NULL,
  `postgrad_univ_name` varchar(320) DEFAULT NULL,
  `postgrad_course_name` varchar(320) DEFAULT NULL,
  `postgrad_course_type` varchar(320) DEFAULT NULL,
  `postgrad_passout_year` varchar(320) DEFAULT NULL,
  `postgrad_total_percent` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `ec_edu_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `engg_consultant` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ec_edu_details`
--

LOCK TABLES `ec_edu_details` WRITE;
/*!40000 ALTER TABLE `ec_edu_details` DISABLE KEYS */;
INSERT INTO `ec_edu_details` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ec_edu_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ec_emp_details`
--

DROP TABLE IF EXISTS `ec_emp_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ec_emp_details` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `designation` varchar(320) DEFAULT NULL,
  `organization` varchar(320) DEFAULT NULL,
  `current_company` varchar(20) DEFAULT NULL,
  `working_from` date DEFAULT NULL,
  `worked_till` date DEFAULT NULL,
  `current_sal_lacs` varchar(40) DEFAULT NULL,
  `current_sal_thousands` varchar(40) DEFAULT NULL,
  `top_5_skills` varchar(320) DEFAULT NULL,
  `job_profile` varchar(320) DEFAULT NULL,
  `notice_period` varchar(60) DEFAULT NULL,
  `worked_till_present` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `ec_emp_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `engg_consultant` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ec_emp_details`
--

LOCK TABLES `ec_emp_details` WRITE;
/*!40000 ALTER TABLE `ec_emp_details` DISABLE KEYS */;
INSERT INTO `ec_emp_details` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Software Developer','ABC PVT LTD.','Yes','2021-02-10',NULL,'5 Lacs','20 Thousands',NULL,'Developing backend and frontend.','2 Months','Present');
/*!40000 ALTER TABLE `ec_emp_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ec_personal_details`
--

DROP TABLE IF EXISTS `ec_personal_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ec_personal_details` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(240) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `permanent_addr` varchar(320) DEFAULT NULL,
  `home_town` varchar(320) DEFAULT NULL,
  `pin_code` int(20) DEFAULT NULL,
  `marital_status` varchar(240) DEFAULT NULL,
  `category` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `ec_personal_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `engg_consultant` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ec_personal_details`
--

LOCK TABLES `ec_personal_details` WRITE;
/*!40000 ALTER TABLE `ec_personal_details` DISABLE KEYS */;
INSERT INTO `ec_personal_details` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ec_personal_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engg_consultant`
--

DROP TABLE IF EXISTS `engg_consultant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `engg_consultant` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `passwd` blob NOT NULL,
  `email` varchar(40) NOT NULL,
  `mob_no` varchar(20) NOT NULL,
  `engg_id` varchar(320) NOT NULL,
  `token` varchar(320) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`email`,`mob_no`,`engg_id`,`token`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engg_consultant`
--

LOCK TABLES `engg_consultant` WRITE;
/*!40000 ALTER TABLE `engg_consultant` DISABLE KEYS */;
INSERT INTO `engg_consultant` VALUES (1,'shivamd999',_binary '4d81c3a1bd667bd294fba15b93d784ef5562cbd69342621f930299227cb7a4da','shivamdhar0598@gmail.com','7789826539','EC20210','267ead75242d74fd4698b17a2451b4','active'),(4,'akhil123',_binary '7b23eeafb272d00359dbc28e6883afa7ee6268d4399d378d8627f373fb22b93c','dadronapse@nedoz.com','6652399878','EC20213','2c3f99cf1d64d700573c5e947e30b5','active'),(5,'kadam123',_binary 'aa39309c625b3e0c5311b9f60d2fe0824d1e0037f6cadaa697ae502904301ba6','girtevatri@nedoz.com','6689291008','EC20214','a48a7f18eaa4ddae1b84e14d065399','active'),(6,'aman123',_binary '45f30b0da9ce2af048bea1987ecc2abd35fbee2c972f696c65e04e648239c0d8','vopsijurka@biyac.com','6679892340','EC20215','3081d439dde0ff8b844be806a2a754','active'),(7,'abhin123',_binary '7e801f254ac1136d902ccee0db3158e281472614afe7434913693293a013e888','ritreridre@biyac.com','8892866532','EC20216','6b1cba2018d3976306c826ad2bb8a1','active');
/*!40000 ALTER TABLE `engg_consultant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `uid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `passwd` blob,
  `user_type` varchar(40) DEFAULT NULL,
  `mob_no` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'',NULL,_binary '$2y$10$vJxvgnc2sUh6m93yDNPNUe4NgXt6VHPUfzabocgR4CghIRgNrAyUi','choose_one',''),(2,'',NULL,_binary '$2y$10$1auSZReqb1HEP6aSCnXJoeQyhnjDLnA8LOr9McjYWcRgVQPHQDrLO','choose_one',''),(3,'',NULL,_binary '$2y$10$Eo.nOH/ROcdGJ1yXe3dJ0uI6OcGmo1WFYHuds1MsatoraZxd9uThC','choose_one',''),(4,'shivamd999',NULL,_binary '$2y$10$WVlld05Hx1vEbRJXpm/2iOxfYuCApSs72Se8am3JpvXajUZWb2NmW','engg_consult','88956728900'),(5,'shivamd999',NULL,_binary '$2y$10$ZlB3AKgeCqGvQ1aQzbi.U.VmZthZ2qAh9cIJZNIaj3LP1rN3HjPUu','customer','8875643218'),(6,'shivamd999','abc123@demomail.com',_binary '$2y$10$9zEthLJv/n7vA9DThGuzCOi/T7l/d23Yrh7lvVBrwFzW03irDAHQm','vendor','6789032567'),(7,'','',_binary '$2y$10$LG6letmIxs1HWjSrtO/sV.jMiHfSbidczJ6DZuQqtGc2.xwikew5K','choose_one',''),(8,'shivamd999','edf123@demomail.com',_binary '$2y$10$vqCFi8X5zi0.KX6EGYOrK.juMoSQk2d4.IXnHRXrssqI45JJYttcS','engg_consult','789343423113'),(9,'shivamd999','edf123@demomail.com',_binary '$2y$10$0Lm2gGytO9wEHKFhfIhxquPlwrsR2G53n4jnWacVpaayAMIEZq.3y','customer','4577687879'),(10,'edf123','edf123@demo.com',_binary '$2y$10$N0oFAxyrKaTrYfsq9Sdese1K1Uuzvh5tNDpBh6RAKH5RDDBmS/m2K','vendor','67764555546'),(11,'edf123','edf321@demo.com',_binary '$2y$10$0reki1VX.XFCvOwvbyHO5.Q6Lm3Ec8b9g.P8p1Ifyb7EgtgFUTLCy','vendor','8877564224'),(12,'vishal999','vish123@demo.com',_binary '3e1d3b090c62e8011f3178c9be2a3620cfbf03a68e5d7ec2a0496792ccb1828d','engg_consult','656575775'),(13,'shubham999','shubham123@demo.com',_binary '083cdc07bf550547ffe01b84bb222c7eb362efa5d005fffa44f89cb12582e7cd','engg_consult','998756432'),(14,'ssd123','ssd123@demomail.com',_binary '85c5a603ef43faeb7a4bf09138399cc19ed86c30c36d32848ebda004d798df1d','customer','463'),(15,'sdhar123','sdhar123@demo.com',_binary 'a58e6863258993648d335ba8e3674e9f4e3a6781337399acebf5db2128631bf8','engg_consult','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `passwd` blob NOT NULL,
  `email` varchar(40) NOT NULL,
  `mob_no` varchar(20) NOT NULL,
  `vendor_id` varchar(320) NOT NULL,
  `token` varchar(320) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`email`,`mob_no`,`vendor_id`,`token`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (5,'deepanshu123',_binary '1acb543bd330a6f2654b794d10dabb66be7e98dc33cce8de1317b40ea1f8aead','rurtucirza@nedoz.com','6689824563','V20210','2e5241988575205227a6aebd052a36','active'),(6,'abhi123',_binary 'f9a87a37970674a74265b45dea7ba40dad4038fd83768f349d698c7f15ccd917','narkiyusta@biyac.com','8892625598','V20211','9fc8333be1f78bf2955a4da0c0ade8','inactive'),(7,'avishu123',_binary 'f4d652b8ae1a4ef6d06fbc4901acda0e0a004ad69d1aca7f7d1abe583b36b183','lurkurokko@biyac.com','6688222998','V20212','3e1157d28a8681756b353f93048486','active'),(8,'shail123',_binary '224a4afb52d4ed970349fd1c673516e98f18818875126fc13c2e19ca3200ed18','zaltaberka@biyac.com','7722889968','V20213','5e447505e1df8c69a24efde7508119','active'),(9,'rahul123',_binary '687f6da20de59091e67f594827cdee268125feb3aed1c3bad77d0f6761eb198a','puydehupsi@biyac.com','9998822268','V20214','b80dddee8da2b94f309cb74736b87a','active');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_reg`
--

DROP TABLE IF EXISTS `vendor_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor_reg` (
  `uid` bigint(20) NOT NULL,
  `company_name` varchar(320) DEFAULT NULL,
  `company_email` varchar(320) DEFAULT NULL,
  `company_pan` varchar(320) DEFAULT NULL,
  `company_legal_name` varchar(320) DEFAULT 'N/A',
  `company_type` varchar(320) DEFAULT NULL,
  `vendor_constitution` varchar(320) DEFAULT NULL,
  `company_nature` varchar(320) DEFAULT NULL,
  `aadhar_no` varchar(420) DEFAULT 'N/A',
  `affir_act_categ` varchar(40) DEFAULT NULL,
  `tin` varchar(230) DEFAULT 'N/A',
  `annual_turnover` varchar(230) DEFAULT 'N/A',
  `reg_type` varchar(50) DEFAULT 'N/A',
  `vendor_categ` blob,
  `msmed_name` varchar(320) DEFAULT NULL,
  `msmed_reg_no` varchar(320) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `vendor_reg_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `vendor` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_reg`
--

LOCK TABLES `vendor_reg` WRITE;
/*!40000 ALTER TABLE `vendor_reg` DISABLE KEYS */;
INSERT INTO `vendor_reg` VALUES (5,'Pitath Electric Pvt. Ltd.','abc123@demo.com','APPK100789','ABC PRIVATE LIMITED','OTHER','Private Limited Cpmpany','Domestic','N/A','OPEN','N/A','N/A','Regular',_binary 'Contractor, Engineering Contractor ','ABC Enterprise','JK29004567896'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'XYZ PVT LTD','xyz123@demo.com','R123466QT','XYZ PVT LTD','OTHER','Private Limited Cpmpany','Domestic','','OPEN','','','Regular',_binary 'Contractor','XYZ Enterprise','JK29004567898'),(8,'XYZ PVT LTD','xyz@demo.com','B123R9LK','XYZ PVT LTD','OTHER','Private Limited Cpmpany','Domestic','','OPEN','','','Regular',_binary 'Contractor','XYZ Enterprise','JK29004567898'),(9,'AA PVT LTD','AA123@demo.com','B22R91K','AA PRIVATE LIMITED','OTHER','Private Limited Cpmpany','Domestic','N/A','OPEN','N/A','N/A','Regular',_binary 'Contractor, Engineering Contractor ','AAEnterprise','AA9236RZ');
/*!40000 ALTER TABLE `vendor_reg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-20 18:19:54
