CREATE DATABASE  IF NOT EXISTS `accounting_insurance_contracts` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `accounting_insurance_contracts`;
-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: accounting_insurance_contracts
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
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `remuneration` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,'Тапочкин','Виктор','Александрович',0.3),(2,'Гроздин','Пётр','Валентинович',0.3),(3,'Шапито','Дмитрий','Георгевич',0.2),(4,'Шелуха','Пьеро','Михайлович',0.2),(5,'Сепалян','Рамира','Игоревна',0.1),(6,'Туранков','Алексей','Викторовичу ',0.1),(7,'Стул','Галина','Михайловны ',0.15);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
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
  `passport` varchar(12) NOT NULL,
  `discount_percent` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Полено','Нурлан','Викторович','РН848755',0.2),(2,'Прирост','Анатолий','Владленович','ЕН654123',0.15),(3,'Гребень','Виталий','Юревич ','ПР876234',0.1),(4,'Сутков','Геннадий','Фёдорович','ЕН875123',0.22),(5,'Прудков','Павел','Владимирович','НГ948234',0.15),(6,'Вирана','Товара ','Игоревна','ГШ874321',0.1),(7,'Сурима','Галина','Павловна','ЩД985123',0.22),(8,'Ванадзе','Голем','Ашотович','948345123',0.3),(9,'Пушков','Валентин','Михайлович','203949855',0.2),(10,'Трушкин','Модест','Петрович','129039844',0.1);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `id_agent` int NOT NULL,
  `id_client` int NOT NULL,
  `id_type_insurance` int NOT NULL,
  `insurance_amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contracts_clients_idx` (`id_client`),
  KEY `FK_contracts_agents_idx` (`id_agent`),
  KEY `FK_contracts_types_insurance_idx` (`id_type_insurance`),
  CONSTRAINT `FK_contracts_agents` FOREIGN KEY (`id_agent`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_contracts_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_contracts_types_insurance` FOREIGN KEY (`id_type_insurance`) REFERENCES `types_insurance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (1,'2020-12-21',1,1,1,200000),(2,'2020-12-21',1,2,1,220000),(3,'2020-12-22',2,3,2,550000),(4,'2020-12-28',2,3,6,12000),(5,'2021-01-05',3,4,3,300000),(6,'2021-01-10',3,5,4,1000000),(7,'2021-01-12',4,6,4,900000),(8,'2021-01-14',4,1,5,150000),(9,'2021-02-03',5,1,7,55000),(10,'2021-02-10',5,8,5,2000000),(11,'2021-03-15',6,10,1,65000),(12,'2021-03-20',7,10,4,80000);
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types_insurance`
--

DROP TABLE IF EXISTS `types_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types_insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `tariff` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types_insurance`
--

LOCK TABLES `types_insurance` WRITE;
/*!40000 ALTER TABLE `types_insurance` DISABLE KEYS */;
INSERT INTO `types_insurance` VALUES (1,'Машина',50000),(2,'Дом',500000),(3,'Яхта',200000),(4,'Жизнь',100000),(5,'Вилла',1000000),(6,'Животное',10000),(7,'Велосипед',10000);
/*!40000 ALTER TABLE `types_insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'accounting_insurance_contracts'
--
/*!50003 DROP PROCEDURE IF EXISTS `CountRewardAgents` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CountRewardAgents`()
begin
     select  
           contracts.date_start,
           CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
		   contracts.insurance_amount,
           agents.remuneration*contracts.insurance_amount as Reward
           
	 from contracts

           JOIN agents ON agents.Id = contracts.id_agent
		   JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
           
     order by
             contracts.date_start;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GroupAgents` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GroupAgents`()
begin
     select
            contracts.id,
             CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
            Max(contracts.insurance_amount) as Max_Insurance,
			Min(contracts.insurance_amount) as Min_nsurance
            -- contracts.id_agent
     from contracts
          
           JOIN agents ON agents.Id = contracts.id_agent
           
     group by
              agents.id;
              
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GroupDateContracts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GroupDateContracts`()
begin
	 select
           contracts.date_start,
           avg(contracts.insurance_amount) as Avg_Insurance
     from
          contracts 
                   join types_insurance ON types_insurance.id = contracts.id_type_insurance
      where
            types_insurance.`type` like "Машина"
      group by 
              contracts.date_start;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoClientsByInsurance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoClientsByInsurance`(in amount double)
begin
     select
             CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
             clients.passport,
             contracts.insurance_amount
      
     from
             contracts
                      JOIN clients ON clients.Id = contracts.id_client
                      JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
     where
             contracts.insurance_amount >= amount;


end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoClientsByPercent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoClientsByPercent`(in persent double)
begin

select
		 surname,
         `name`,
         patronymic,
         passport,
         discount_percent
from 
		clients		
where
		discount_percent = persent;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoContractsByCar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoContractsByCar`()
begin
     select
            CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
            clients.passport,
            clients.discount_percent,
			CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
            agents.remuneration,
            types_insurance.`type`,
            types_insurance.tariff
            
	 from  contracts
                    JOIN agents ON agents.Id = contracts.id_agent
					JOIN clients ON clients.Id = contracts.id_client
                    JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
    where
          types_insurance.`type` like "Машина";

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoContractsByDate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoContractsByDate`(in fromDate date, toDate date)
begin
     select
            CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
            types_insurance.`type`,
            contracts.insurance_amount,
            contracts.date_start,
            CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP

	from contracts
                  JOIN agents ON agents.Id = contracts.id_agent
                  JOIN clients ON clients.Id = contracts.id_client
				  JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
	where
           contracts.date_start between fromDate and toDate;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-30 14:54:02
