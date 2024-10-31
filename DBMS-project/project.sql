-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	8.0.38

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('abc@gmail.com','1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookingtbl`
--

DROP TABLE IF EXISTS `bookingtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookingtbl` (
  `bookingId` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `packageId` int DEFAULT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingtbl`
--

LOCK TABLES `bookingtbl` WRITE;
/*!40000 ALTER TABLE `bookingtbl` DISABLE KEYS */;
INSERT INTO `bookingtbl` VALUES (1,'pratiksha@gmail.com','2024-10-03','2024-10-07','2024-10-19',NULL),(2,'pratiksha@gmail.com','2024-10-03','2024-10-17','2024-10-19',NULL),(3,'pratiksha@gmail.com','2024-10-03','2024-10-17','2024-10-19',NULL),(4,'pratiksha@gmail.com','2024-10-04','2024-10-02','2024-10-19',NULL),(5,'pratiksha@gmail.com','2024-10-03','2024-10-17','2024-10-19',NULL),(6,'mrunal123@gmail.com',NULL,NULL,'2024-10-19',NULL),(7,'mrunal123@gmail.com',NULL,NULL,'2024-10-19',NULL),(8,'mrunal123@gmail.com',NULL,NULL,'2024-10-19',NULL),(9,'mrunal123@gmail.com',NULL,NULL,'2024-10-19',NULL),(10,'mrunal123@gmail.com','2024-10-11','2024-10-03','2024-10-19',NULL),(11,'mrunal123@gmail.com','2024-10-09','2024-10-23','2024-10-20',NULL),(12,'mrunal123@gmail.com','2024-10-24','2024-10-30','2024-10-20',5),(13,'mrunal123@gmail.com','2024-10-24','2024-10-30','2024-10-20',5),(14,'mrunal123@gmail.com','2024-10-09','2024-10-22','2024-10-20',5),(15,'mrunal123@gmail.com','2024-10-10','2024-10-17','2024-10-20',2),(16,'pratiksha@gmail.com','2024-10-10','2024-10-15','2024-10-20',2),(17,'mrunal123@gmail.com','2024-10-02','2024-10-22','2024-10-20',3),(18,'mrunal123@gmail.com','2024-10-02','2024-10-22','2024-10-20',3),(19,'mrunal123@gmail.com','2024-10-10','2024-10-15','2024-10-20',2);
/*!40000 ALTER TABLE `bookingtbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enquiry` (
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiry`
--

LOCK TABLES `enquiry` WRITE;
/*!40000 ALTER TABLE `enquiry` DISABLE KEYS */;
INSERT INTO `enquiry` VALUES ('Mrunal Tambe','mrunaltambe845@gmail.com','9623998347','no subject','njm'),('Mrunal Tambe','mrunaltambe845@gmail.com','9623998347','no subject','njm'),('Mrunal Tambe','mrunaltambe845@gmail.com','9623998347','no subject','njm'),('sabale sakshi','sabale3@gmail.com','142533698','jnhm','frgyb'),('Mrunal Tambe','mrunaltambe845@gmail.com','623998347','jnhm','bhnj'),('Mrunal Tambe','mrunaltambe845@gmail.com','623998347','jnhm','bhnj'),('Mrunal Tambe','mrunaltambe845@gmail.com','623998347','jnhm','bhnj');
/*!40000 ALTER TABLE `enquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `PackageId` int NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext,
  `PackageImage` varchar(255) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`PackageId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'Swiss Paris Delight Premium 2020 (Group Package)','Group Package','Paris and Switzerland',6000,' Round trip Economy class airfare valid for the duration of the holiday - Airport taxes - Accommodation for 3 nights in Paris and 3 nights in scenic Switzerland - Enjoy continental breakfasts every morning - Enjoy 5 Indian dinners in Mainland Europe - Exp','Pick this holiday for a relaxing vacation in Paris and Switzerland. Your tour embarks from Paris. Enjoy an excursion to popular attractions like the iconic Eiffel Tower. After experiencing the beautiful city, you will drive past mustard fields through Burgundy to reach Switzerland. While there, you can opt for a tour to Interlaken and then to the Trummelbach Falls. Photostop at Zurich Lake and a cable car ride to Mt. Titlis are the main highlights of the holiday.','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRB8a0XAGKxk4U8Cfk2j9xWNFBBfWhcxng3qwKwti-HD-uCPepdluEkfuaSBjdMyvGgUao&usqp=CAU','2024-07-15 05:21:58','2024-10-19 05:08:38'),(2,'Bhutan Holidays - Thimphu and Paro Special','Family Package','Bhutan',3000,'Free Wi-fi, Free Breakfast, Free Pickup and drop facility ','Visit to Tiger\'s Nest Monastery | Complimentary services of a Professional Guide','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFdlYkZVhPjTp-3av4JPFukygpgvA0SLOzlg&s','2024-07-15 05:21:58','2024-10-19 05:09:16'),(3,'Soulmate Special Bali - 7 Nights','Couple Package','Indonesia(Bali)',5000,'Free Pickup and drop facility, Free Wi-fi , Free professional guide','Airport transfers by private car | Popular Sightseeing included | Suitable for Couple and budget travelers','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThyXCVhTxw3FGd6A-di8cAmac5U4x5EPgw8w&s','2024-07-15 05:21:58','2024-10-19 05:10:04'),(4,'Kerala - A Lovers Paradise - Value Added','Family Package','Kerala',1000,'Free Wi-fi, Free pick up and drop facility,','Visit Matupetty Dam, tea plantation and a spice garden | View sunset in Kanyakumari | AC Car at disposal for 2hrs extra (once per city)','https://www.indiautentica.com/wp-content/uploads/2022/10/29ezcwtmtnm.jpg','2024-07-15 05:21:58','2024-10-19 05:10:39'),(5,'Short Trip To Dubai','Family','Dubai',4500,'Free pick up and drop facility, Free Wi-fi, Free breakfast','A Holiday Package for the entire family.','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbRDe-PgQQu3b0QKl3kd5FDbvmB7oXUrw80Q&s','2024-07-15 05:21:58','2024-10-19 05:11:51'),(6,'Sikkim Delight with Darjeeling (customizable)','Group','Sikkim',3500,'Free Breakfast, Free Pick up drop facility','Changu Lake and New Baba Mandir excursion | View the sunrise from Tiger Hill | Get Blessed at the famous Rumtek Monastery','https://3.imimg.com/data3/SF/IX/MY-9745158/sikkim-darjeeling-delight.jpg','2024-07-15 05:21:58','2024-10-19 05:12:55'),(7,'6 Days in Guwahati and Shillong With Cherrapunji Excursion','Family Package','Guwahati(Sikkim)',4500,'Breakfast,  Accommodation » Pick-up » Drop » Sightseeing','After arrival at Guwahati airport meet our representative & proceed for Shillong. Shillong is the capital and hill station of Meghalaya, also known as Abode of Cloud, one of the smallest states in India. En route visit Barapani lake. By afternoon reach at Shillong. Check in to the hotel. Evening is leisure. Spent time as you want. Visit Police bazar. Overnight stay at Shillong.','https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/09/93/36/6e.jpg','2024-07-15 05:21:58','2024-10-19 05:13:35'),(8,'Grand Week in North East - Lachung, Lachen and Gangtok','Domestic Packages','Sikkim',4500,'Free Breakfast, Free Wi-fi','Changu Lakeand New Baba Mandir excursion | Yumthang Valley tour | Gurudongmar Lake excursion | Night stay in Lachen','https://www.thesevensister.com/assets_tss/img/innerpage/gangtok-lachen-lachung-tour1.jpg','2024-07-15 05:21:58','2024-10-19 05:14:21'),(9,'Gangtok & Darjeeling Holiday (Without Flights)','Family Package','Sikkim',1000,'Free Wi-fi, Free pickup and drop facility','Ideal tour for Family | Sightseeing in Gangtok and Darjeeling | Full day excursion to idyllic Changu Lake | Visit to Ghoom Monastery','https://www.esikkimtourism.in/wp-content/uploads/2018/10/ravangla-bnnnr.jpg','2024-07-15 05:21:58','2024-10-19 05:15:06');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertbl`
--

LOCK TABLES `usertbl` WRITE;
/*!40000 ALTER TABLE `usertbl` DISABLE KEYS */;
INSERT INTO `usertbl` VALUES (1,'Mrunal Tambe','ashu@2004gmail.com','623998347','ashu@2004'),(2,'Mrunal Tambe','ashu@2004gmail.com','096998347','ashu@2004'),(3,'sakshi','sabale3@gmail.com','1234567','1234'),(4,'mrunal','mrunal123@gmail.com','242416','mrunal'),(5,'kaveri','kaveri123@gmail.com','23998347','1234'),(6,'pratiksha','pratiksha@gmail.com','9623998347','abcd'),(7,'abc@1234','abc@1234gmail.com','1478523695','abc');
/*!40000 ALTER TABLE `usertbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-20 16:16:35
