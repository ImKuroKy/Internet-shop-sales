-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: salesdb
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `доставка`
--

DROP TABLE IF EXISTS `доставка`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `доставка` (
  `Время доставки` time NOT NULL,
  `Ф.И.О. курьера` varchar(45) NOT NULL,
  `Код заказа` int NOT NULL,
  PRIMARY KEY (`Код заказа`),
  CONSTRAINT `fk_Доставка_Заказ1` FOREIGN KEY (`Код заказа`) REFERENCES `заказ` (`Код заказа`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `доставка`
--

LOCK TABLES `доставка` WRITE;
/*!40000 ALTER TABLE `доставка` DISABLE KEYS */;
INSERT INTO `доставка` VALUES ('14:00:00','Пахомов Алексей Кириллович',1),('12:00:00','Фёдоров Георгий Кириллович',2),('15:00:00','Ершов Иван Геннадьевич',3),('17:00:00','Лыткин Арсений Рубенович',4),('16:00:00','Зайцев Николай Геннадиевич',5),('15:30:00','Хохлов Владимир Артёмович',6),('14:45:00','Сафонов Роман Алексеевич',7),('11:30:00','Мельников Семён Ильич',8),('09:40:00','Тарасов Матвей Александрович',9),('04:25:00','Щербаков Александр Артёмович',10),('02:15:00','Калинин Георгий Михайлович',11),('08:00:00','Пименов Андрей Тимофеевич',12),('24:00:00','Павлова Анастасия Алексеевна',13),('05:40:00','Казаков Владислав Фёдорович',14),('00:01:00','Быстрый Гонсалес Безымянов',15);
/*!40000 ALTER TABLE `доставка` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `заказ`
--

DROP TABLE IF EXISTS `заказ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `заказ` (
  `Код заказа` int NOT NULL,
  `Дата заказа` date NOT NULL,
  `Время заказа` time NOT NULL,
  `Количество` int NOT NULL,
  `Подтверждение заказа` tinyint DEFAULT NULL,
  `Код товара` int NOT NULL,
  `Код магазина` int NOT NULL,
  `ФИО клиента_ID клиента` int NOT NULL,
  PRIMARY KEY (`Код заказа`),
  UNIQUE KEY `Код заказа_UNIQUE` (`Код заказа`),
  KEY `fk_Заказ_Товар_idx` (`Код товара`),
  KEY `fk_Заказ_Интернет-магазин1_idx` (`Код магазина`),
  KEY `fk_Заказ_ФИО клиента1_idx` (`ФИО клиента_ID клиента`),
  CONSTRAINT `fk_Заказ_Интернет-магазин1` FOREIGN KEY (`Код магазина`) REFERENCES `интернет-магазин` (`Код магазина`),
  CONSTRAINT `fk_Заказ_Товар` FOREIGN KEY (`Код товара`) REFERENCES `товар` (`Код товара`),
  CONSTRAINT `fk_Заказ_ФИО клиента1` FOREIGN KEY (`ФИО клиента_ID клиента`) REFERENCES `фио клиента` (`ID клиента`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `заказ`
--

LOCK TABLES `заказ` WRITE;
/*!40000 ALTER TABLE `заказ` DISABLE KEYS */;
INSERT INTO `заказ` VALUES (1,'2022-09-08','15:30:00',1,1,2,5,1),(2,'2023-05-12','17:00:00',1,1,3,4,2),(3,'2023-09-29','18:33:00',3,1,1,1,3),(4,'2023-10-05','21:10:00',2,0,4,1,4),(5,'2023-08-23','07:25:00',1,1,1,1,5),(6,'2023-10-14','11:40:43',2,1,13,9,15),(7,'2023-10-12','03:47:06',1,0,12,12,6),(8,'2023-10-14','15:49:54',1,1,12,13,9),(9,'2023-10-12','00:44:23',2,0,10,7,11),(10,'2023-10-13','02:02:43',4,1,14,8,14),(11,'2023-10-10','19:47:53',3,0,6,7,8),(12,'2023-10-12','15:30:06',1,0,9,14,7),(13,'2023-10-12','18:38:01',7,1,7,15,13),(14,'2023-10-14','14:59:46',1,1,15,11,10),(15,'2023-10-10','10:10:13',3,0,11,9,15);
/*!40000 ALTER TABLE `заказ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `интернет-магазин`
--

DROP TABLE IF EXISTS `интернет-магазин`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `интернет-магазин` (
  `Код магазина` int NOT NULL,
  `Электронный адрес` varchar(45) NOT NULL,
  `Оплата доставки` tinyint DEFAULT NULL,
  PRIMARY KEY (`Код магазина`),
  UNIQUE KEY `Код магазина_UNIQUE` (`Код магазина`),
  UNIQUE KEY `Электронный адрес_UNIQUE` (`Электронный адрес`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `интернет-магазин`
--

LOCK TABLES `интернет-магазин` WRITE;
/*!40000 ALTER TABLE `интернет-магазин` DISABLE KEYS */;
INSERT INTO `интернет-магазин` VALUES (1,'janessa76@yahoo.com',1),(2,'harber.aubree@harris.com',1),(3,'udietrich@gmail.com',0),(4,'lilliana.okuneva@yahoo.com',1),(5,'sierra.brakus@blick.com',0),(6,'kub.curt@gmail.com',0),(7,'cpfannerstill@gmail.com',1),(8,'langosh.aileen@gmail.com',1),(9,'crempel@yahoo.com',1),(10,'tjaskolski@yahoo.com',0),(11,'laury.lind@gmail.com',1),(12,'everette39@yahoo.com',1),(13,'eliza34@gmail.com',0),(14,'abashirian@hotmail.com',0),(15,'hbeer@yahoo.com',1);
/*!40000 ALTER TABLE `интернет-магазин` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `магазин-товар`
--

DROP TABLE IF EXISTS `магазин-товар`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `магазин-товар` (
  `Интернет-магазин_Код магазина` int NOT NULL,
  `Товар_Код товара` int NOT NULL,
  PRIMARY KEY (`Интернет-магазин_Код магазина`,`Товар_Код товара`),
  KEY `fk_магазин-товар_Товар1_idx` (`Товар_Код товара`),
  CONSTRAINT `fk_магазин-товар_Интернет-магазин1` FOREIGN KEY (`Интернет-магазин_Код магазина`) REFERENCES `интернет-магазин` (`Код магазина`),
  CONSTRAINT `fk_магазин-товар_Товар1` FOREIGN KEY (`Товар_Код товара`) REFERENCES `товар` (`Код товара`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `магазин-товар`
--

LOCK TABLES `магазин-товар` WRITE;
/*!40000 ALTER TABLE `магазин-товар` DISABLE KEYS */;
INSERT INTO `магазин-товар` VALUES (2,1),(3,2),(5,3),(1,4),(1,5),(6,6),(11,7),(15,8),(12,9),(8,10),(10,11),(7,12),(9,13),(13,14),(14,15);
/*!40000 ALTER TABLE `магазин-товар` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `товар`
--

DROP TABLE IF EXISTS `товар`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `товар` (
  `Код товара` int NOT NULL,
  `Название товара` varchar(45) NOT NULL,
  `Фирма` varchar(45) NOT NULL,
  `Модель` varchar(45) DEFAULT NULL,
  `Технические характеристики` varchar(45) NOT NULL,
  `Цена(руб.)` int NOT NULL,
  `Гарантийный срок` varchar(45) DEFAULT NULL,
  `Изображение` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Код товара`),
  UNIQUE KEY `Код товара_UNIQUE` (`Код товара`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `товар`
--

LOCK TABLES `товар` WRITE;
/*!40000 ALTER TABLE `товар` DISABLE KEYS */;
INSERT INTO `товар` VALUES (1,'Тостер','Philips','e3-A','Мощность: 100 Вт',2000,'1 год','images/image1'),(2,'Мультиварка','Bosh','bm-20','Мощность: 200 Вт',6000,'2 года','images/image2'),(3,'Электрический чайник','Mulinex','rh17','Мощность: 50 Вт',2000,'6 месяцев','images/image3'),(4,'Микроволновка','Mulinex','ap-7','Мощность 200 Вт',4000,'1 год','images/image4'),(5,'Тостер','Bosh','bt-19','Мощность: 100 Вт',3000,'1 год','images/image5'),(6,'Пылесос','Bosh','rr-18','Мощность: 240 Вт',14990,'3 года','images/image6'),(7,'Мультиварка','Samsung','lh-09','Мощность: 80 Вт',19600,'4 года','images/image7'),(8,'Мобильный Телефон','Phillips','ru-00','Мощность: 20 Вт',40000,'2 года','images/image8'),(9,'TESLA Motors Car','Tesla','AE-01','Мощность: 1000 Вт',2900000,'1 год','images/image9'),(10,'Сушилка для полотенец','Samsung','hh-88','Мощность: 75 Вт',5400,'2,5 года','images/image10'),(11,'Зубная электрическая щётка','Apple','ULTRA-01','Мощность: 100 Вт',20000,'1 год','images/image11'),(12,'Micro-UMP','Mulinex','mini-uzi','Мощность: 230 Вт',9000,'5 лет','images/image12'),(13,'Электробритва','Bosh','nagan','Мощность: 80 Вт',11000,'2 года','images/image13'),(14,'Робот-помощник','Apple','EXTRA-02','Мощность: 400 Вт',7999000,'90 лет','images/image14'),(15,'Кронштейн','Apple','SUPER-03','Мощность: 1 Вт',99000,'1 день','images/image15');
/*!40000 ALTER TABLE `товар` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `фио клиента`
--

DROP TABLE IF EXISTS `фио клиента`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `фио клиента` (
  `ID клиента` int NOT NULL,
  `Контактый номер` varchar(45) DEFAULT NULL,
  `ФИО клиента` varchar(45) DEFAULT NULL,
  `Адрес доставки` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID клиента`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `фио клиента`
--

LOCK TABLES `фио клиента` WRITE;
/*!40000 ALTER TABLE `фио клиента` DISABLE KEYS */;
INSERT INTO `фио клиента` VALUES (1,'+7(758)109-7484','Горюнов Даниил Егорович','628027, Смоленская область, город Волоколамск, наб. Косиора, 61'),(2,'+7(208)803-9139','Кудрявцева Елизавета Артемьевна','086491, Владимирская область, город Красногорск, пер. Гоголя, 19'),(3,'+7(165)936-4157','Воронин Даниил Савельевич','171774, Орловская область, город Солнечногорск, наб. Сталина, 76'),(4,'+7(679)117-8402','Григорьева Алина Станиславовна','567385, Саратовская область, город Волоколамск, пер. Балканская, 49'),(5,'+7(776)418-2849','Сальников Арсений Тимофеевич','957012, Ульяновская область, город Раменское, бульвар Косиора, 44'),(6,'+7(560)244-9004','Полякова Татьяна Михайловна','527149, Свердловская область, город Балашиха, бульвар Домодедовская, 80'),(7,'+7(917)849-4314','Чернышева Виктория Тимуровна','885099, Самарская область, город Щёлково, наб. Чехова, 51'),(8,'+7(315)555-9602','Егорова Мария Захаровна','103617, Тюменская область, город Озёры, пл. Ладыгина, 8'),(9,'+7(811)581-4489','Андреев Максим Степанович','661154, Свердловская область, город Москва, пер. Чехова, 44'),(10,'+7(621)596-0574','Гусев Владимир Арсентьевич','734617, Сахалинская область, город Одинцово, пр. 1905 года, 20'),(11,'+7(139)554-4653','Сидоров Матвей Ярославович','694839, Астраханская область, город Домодедово, проезд Ломоносова, 56'),(12,'+7(779)167-5810','Щербаков Макар Дмитриевич','870802, Воронежская область, город Пушкино, пер. Гоголя, 1'),(13,'+7(030)480-7266','Сухарев Юрий Львович','820297, Волгоградская область, город Озёры, спуск Гоголя, 38'),(14,'+7(622)046-7169','Морозов Ярослав Тимофеевич','789926, Тамбовская область, город Павловский Посад, шоссе 1905 года, 45'),(15,'+7(688)438-2518','Мартынов Георгий Миронович','514224, Свердловская область, город Балашиха, проезд Будапештсткая, 49');
/*!40000 ALTER TABLE `фио клиента` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-09 14:14:28
