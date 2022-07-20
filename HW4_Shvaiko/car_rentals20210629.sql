CREATE DATABASE  IF NOT EXISTS `car_rental` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `car_rental`;
-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: car_rental
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `number` varchar(45) NOT NULL,
  `insurable_value` int NOT NULL,
  `cost_day_rental` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_UNIQUE` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Жигули','Красный',1975,'ЕН876Ш',10000,100),(2,'Лада Приора','Серый',2005,'АВ654Ц',30000,250),(3,'Запорожец','Белый',1965,'ЦУ543Р',5000,20),(4,'Мерседес С300','Красный',1985,'ДЛ321Н',50000,300),(5,'БМВ Х5','Чёрный',2010,'ТО873О',200000,500),(6,'Опель Астра','Зелёный',2005,'ТИ873Н',150000,400),(7,'Тойота Камри','Жёлтый',2011,'ГО847Е',80000,150),(8,'Жигули','Белый',1980,'ГО765К',5000,50),(9,'Майбах','Розовый',2000,'ГО768Е',100000,3000);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `passport` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passport_UNIQUE` (`passport`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Серпухов','Михаил','Иванович','ЕК456890'),(2,'Туров','Валентин','Игоревич','ЕН456889'),(3,'Лагунов','Дмитрий','Михайлович','ЕП847890'),(4,'Трук','Виктор','Павлович','ЛШ84747'),(5,'Жгут','Анатолий','Евгеньевич','ТЬ874632'),(6,'Мряк','Владимир','Серпухович','МИ875405'),(7,'Жиря','Эльвира','Генреевна','ГР984220'),(8,'Вор','Эрик','Робертович','РП762354'),(9,'Вирапал','Фудук','Эллович','23890409'),(10,'Пулат','Михаил','Карлович','ГШ873102');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copy_cars`
--

DROP TABLE IF EXISTS `copy_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copy_cars` (
  `id` int NOT NULL DEFAULT '0',
  `model` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `number` varchar(45) NOT NULL,
  `insurable_value` int NOT NULL,
  `cost_day_rental` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copy_cars`
--

LOCK TABLES `copy_cars` WRITE;
/*!40000 ALTER TABLE `copy_cars` DISABLE KEYS */;
INSERT INTO `copy_cars` VALUES (5,'БМВ Х5','Чёрный',2010,'ТО873О',180000,500),(9,'Майбах','Розовый',2000,'ГО768Е',90000,3000);
/*!40000 ALTER TABLE `copy_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expensive_cars`
--

DROP TABLE IF EXISTS `expensive_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expensive_cars` (
  `id` int NOT NULL DEFAULT '0',
  `model` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `number` varchar(45) NOT NULL,
  `insurable_value` int NOT NULL,
  `cost_day_rental` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expensive_cars`
--

LOCK TABLES `expensive_cars` WRITE;
/*!40000 ALTER TABLE `expensive_cars` DISABLE KEYS */;
INSERT INTO `expensive_cars` VALUES (9,'Майбах','Розовый',2000,'ГО768Е',100000,3000);
/*!40000 ALTER TABLE `expensive_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rentals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `rental_days` int NOT NULL,
  `id_car` int NOT NULL,
  `id_client` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rentals_cars_idx` (`id_car`),
  KEY `FK_rentals_clients_idx` (`id_client`),
  CONSTRAINT `FK_rentals_cars` FOREIGN KEY (`id_car`) REFERENCES `cars` (`id`),
  CONSTRAINT `FK_rentals_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT INTO `rentals` VALUES (1,'2020-12-25',10,4,1),(2,'2020-12-04',5,1,5),(3,'2020-12-05',15,2,4),(4,'2021-01-10',30,5,2),(5,'2021-01-12',18,3,3),(6,'2021-01-20',45,6,6),(7,'2021-02-06',12,7,8),(8,'2021-02-13',32,5,9),(9,'2021-02-15',5,2,10),(10,'2021-02-20',2,4,10);
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-29 21:10:50
