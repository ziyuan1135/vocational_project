-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: 四技二專
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
-- Table structure for table `分校`
--

DROP TABLE IF EXISTS `分校`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `分校` (
  `分校ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `校區` varchar(6) NOT NULL,
  `地址` varchar(35) NOT NULL,
  `學校ID` char(3) DEFAULT NULL,
  `地區ID` tinyint(4) DEFAULT NULL,
  `縣市ID` tinyint(4) DEFAULT NULL,
  `行政區ID` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`分校ID`),
  KEY `學校ID` (`學校ID`),
  KEY `地區ID` (`地區ID`),
  KEY `縣市ID` (`縣市ID`),
  KEY `行政區ID` (`行政區ID`),
  CONSTRAINT `分校_ibfk_1` FOREIGN KEY (`學校ID`) REFERENCES `學校` (`學校ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `分校_ibfk_2` FOREIGN KEY (`地區ID`) REFERENCES `地區` (`地區ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `分校_ibfk_3` FOREIGN KEY (`縣市ID`) REFERENCES `縣市` (`縣市ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `分校_ibfk_4` FOREIGN KEY (`行政區ID`) REFERENCES `鄉鎮市區` (`行政區ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `分校`
--

LOCK TABLES `分校` WRITE;
/*!40000 ALTER TABLE `分校` DISABLE KEYS */;
INSERT INTO `分校` VALUES (1,'0','106台北市大安區基隆路四段43號','101',1,1,5),(2,'0','64002雲林縣斗六市大學路三段123號','102',2,12,185),(3,'0','912屏東縣內埔鄉學府路1號','103',3,17,302),(4,'0','10608台北市大安區忠孝東路三段1號','104',1,1,5),(5,'0','632雲林縣虎尾鎮文化路64號','107',2,12,178),(6,'0','880澎湖縣馬公市六合路300號','109',3,18,324),(7,'0','411030台中市太平區中山路二段57號','110',2,9,116),(8,'0','812高雄市小港區松和路1號','112',3,16,262),(9,'0','404台中市北區三民路三段129號','113',2,9,112),(10,'桃園校區','324桃園市平鎮區福龍路一段100號','114',1,1,1),(11,'臺北校區','100台北市中正區濟南路一段321號','114',1,1,1),(12,'0','413台中市霧峰區吉峰東路168號','201',2,9,118),(13,'0','71005台南市永康區南台街1號','202',3,15,222),(14,'0','710台南市永康區崑大路195號','203',3,15,222),(15,'0','71710 臺南市仁德區二仁路一段60號','204',3,15,229),(16,'0','824高雄市燕巢區橫山路59號','205',3,16,270),(17,'0','333桃園市龜山區萬壽路一段300號','206',1,4,56),(18,'0','831高雄市大寮區進學路151號','207',3,16,277),(19,'0','304新竹縣新豐鄉新興路1號','208',1,6,67),(20,'0','433台中市沙鹿區台灣大道六段1018號','209',2,9,130),(21,'0','320桃園市中壢區健行路229號','210',1,4,49),(22,'0','833高雄市鳥松區澄清路840號','211',3,16,279),(23,'0','320676 桃園市中壢區萬能路1號','212',1,4,49),(24,'0','500020彰化縣彰化市介壽北路1號','213',2,10,137),(25,'0','243新北市泰山區工專路84號','214',1,2,34),(26,'0','907屏東縣鹽埔鄉維新路20號','216',3,17,298),(27,'0','251309 新北市淡水區淡金路四段499號','217',1,2,39),(28,'0','408213台中市南屯區嶺東路1號','218',2,9,115),(29,'新竹校區','303新竹縣湖口鄉中山路三段530號','219',1,6,66),(30,'臺北校區','116台北市文山區興隆路三段56號','219',1,1,12),(31,'0','40601台中市北屯區廍子路666號','220',2,9,113),(32,'0','710台南市永康區中正路529號','221',3,15,222),(33,'0','744台南市新市區中華路49號','222',3,15,251),(34,'0','300新竹市香山區元培街306號','223',1,5,64),(35,'0','231新北市新店區安忠路99號','224',1,2,23),(36,'0','717台南市仁德區文華一街89號','225',3,15,229),(37,'0','222新北市深坑區北深路三段152號','226',1,2,17),(38,'0','114台北市內湖區環山路一段56號','227',1,1,10),(39,'0','542南投縣草屯鎮中正路568號','228',2,11,165),(40,'台北校區','115台北市南港區研究院路三段245號','229',1,1,11),(41,'新竹校區','312新竹縣橫山鄉中華街200號','229',1,6,74),(42,'0','407台中市西屯區僑光路100號','230',2,9,114),(43,'0','361苗栗縣造橋鄉學府路168號','231',2,8,99),(44,'0','912屏東縣內埔鄉屏光路23號','232',3,17,302),(45,'0','621嘉義縣民雄鄉建國路二段117號','233',3,14,211),(46,'0','412台中市大里區工業路11號','236',2,9,117),(47,'嘉義校區','613016 嘉義縣朴子市嘉朴路西段2號','237',3,14,207),(48,'林口校區','333桃園市龜山區文化一路261號','237',1,4,56),(49,'0','307新竹縣芎林鄉大華路1號','238',1,6,70),(50,'0','112台北市北投區學園路2號','239',1,1,9),(51,'0','244新北市林口區粉寮路一段101號','240',1,2,35),(52,'0','80793高雄市三民區民族一路900號','241',3,16,260),(53,'0','970花蓮縣花蓮市建國路二段880號','244',4,19,330),(54,'0','220新北市板橋區文化路一段313號','245',1,2,15),(55,'0','236新北市土城區青雲路380巷1號','246',1,2,28),(56,'士林校區','11174台北市士林區延平北路九段212號','249',1,1,8),(57,'淡水校區','251新北市淡水區濱海路三段150號','249',1,2,39),(58,'0','220新北市板橋區四川路二段58號','250',1,2,15),(59,'0','971花蓮縣新城鄉樹人街1號','403',4,19,331),(60,'0','320桃園市中壢區中山東路三段414號','411',1,4,49),(61,'0','243新北市泰山區泰林路三段22號','415',1,2,34),(62,'0','203基隆市中山區復興路336號','417',1,3,45),(63,'0','700台南市中西區民族路二段78號','502',3,15,216),(64,'0','116台北市文山區指南路二段64號','701',1,1,12),(65,'0','300新竹市東區光復路二段101號','702',1,5,63),(66,'0','10617台北市大安區羅斯福路四段1號','703',1,1,5),(67,'0','106台北市大安區和平東路一段162號','704',1,1,5),(68,'0','701台南市東區大學路1號','705',3,15,217),(69,'0','402台中市南區興大路145號','706',2,9,110),(70,'0','320桃園市中壢區中大路300號','708',1,4,49),(71,'0','804高雄市鼓山區蓮海路70號','709',3,16,257),(72,'0','202基隆市中正區北寧路2號','710',1,3,44),(73,'0','62102嘉義縣民雄鄉大學路一段168號','711',3,14,211),(74,'0','237新北市三峽區大學路151號','715',1,2,29),(75,'0','600嘉義市東區學府路300號','716',3,13,196),(76,'0','811高雄市楠梓區高雄大學路700號','717',3,16,261),(77,'0','974花蓮縣壽豐鄉大學路二段1號','718',4,19,334),(78,'0','545301南投縣埔里鎮大學路1號','719',2,11,167),(79,'0','112台北市北投區學園路1號','720',1,1,9),(80,'0','220新北市板橋區大觀路一段59號','721',1,2,15),(81,'0','950309 臺東市大學路二段369號','722',4,20,343),(82,'0','260宜蘭縣宜蘭市神農路一段1號','723',1,7,78),(83,'0','36003苗栗縣苗栗市聯大1號','724',2,8,98),(84,'0','72045台南市官田區大崎66號','725',3,15,232),(85,'0','70005台南市中西區樹林街二段33號','726',3,15,216),(86,'0','10671台北市大安區和平東路二段134號','727',1,1,5),(87,'0','333桃園市龜山區文化一路250號','731',1,4,56),(88,'0','892金門縣金寧鄉大學路1號綜合大樓','732',4,21,361),(89,'0','404台中市北區雙十路一段16號','733',2,9,112),(90,'0','100台北市中正區愛國西路1號','734',1,1,1),(91,'0','407224台中市西屯區台灣大道四段1727號','801',2,9,114),(92,'0','242新北市新莊區中正路510號','802',1,2,33),(93,'0','111台北市士林區臨溪路70號','803',1,1,8),(94,'0','320桃園市中壢區中北路200號','804',1,4,49),(95,'0','251301新北市淡水區英專路151號','805',1,2,39),(96,'0','111台北市士林區華岡路55號','806',1,1,8),(97,'0','407台中市西屯區文華路100號','807',2,9,114),(98,'0','433台中市沙鹿區台灣大道七段200號','808',2,9,130),(99,'0','33302桃園市龜山區文化一路259號','809',1,4,56),(100,'0','320桃園市中壢區遠東路135號','810',1,4,49),(101,'0','300新竹市香山區五福路二段707號','811',1,5,64),(102,'0','515006彰化縣大村鄉學府路168號','812',2,10,151),(103,'0','84001高雄市大樹區學城路一段1號','814',3,16,280),(104,'0','116台北市文山區木柵路一段17巷1號','815',1,1,12),(105,'台北校區','111005台北市士林區中山北路五段250號','816',1,1,8),(106,'桃園校區','333桃園市龜山區德明路5號','816',1,4,56),(107,'臺北校區','104台北市中山區大直街70號','817',1,1,3),(108,'高雄校區','84550高雄市內門區大學路200號','817',3,16,284),(109,'0','807高雄市三民區十全一路100號','818',3,16,260),(110,'0','622嘉義縣大林鎮南華路一段55號','819',3,14,212),(111,'0','251新北市淡水區真理街32號','820',1,2,39),(112,'0','104台北市中山區中山北路三段40號1樓','821',1,1,3),(113,'0','970花蓮縣花蓮市中央路三段701號970','822',4,19,330),(114,'0','711台南市歸仁區長大路1號','825',3,15,223),(115,'0','30092新竹市香山區玄奘路48號','827',1,5,64),(116,'0','413台中市霧峰區柳豐路500號','828',2,9,118),(117,'0','338桃園市蘆竹區開南路1號','829',1,4,61),(118,'0','262307宜蘭縣礁溪鄉林尾路160號','830',1,7,80),(119,'0','523彰化縣埤頭鄉文化路369號','831',2,10,156),(120,'0','106台北市大安區基隆路四段43號','101',1,1,5),(121,'0','64002雲林縣斗六市大學路三段123號','102',2,12,185),(122,'0','912屏東縣內埔鄉學府路1號','103',3,17,302),(123,'0','10608台北市大安區忠孝東路三段1號','104',1,1,5),(124,'0','632雲林縣虎尾鎮文化路64號','107',2,12,178),(125,'0','880澎湖縣馬公市六合路300號','109',3,18,324),(126,'0','411030台中市太平區中山路二段57號','110',2,9,116),(127,'0','812高雄市小港區松和路1號','112',3,16,262),(128,'0','404台中市北區三民路三段129號','113',2,9,112),(129,'桃園校區','324桃園市平鎮區福龍路一段100號','114',1,1,1),(130,'臺北校區','100台北市中正區濟南路一段321號','114',1,1,1),(131,'0','413台中市霧峰區吉峰東路168號','201',2,9,118),(132,'0','71005台南市永康區南台街1號','202',3,15,222),(133,'0','710台南市永康區崑大路195號','203',3,15,222),(134,'0','71710 臺南市仁德區二仁路一段60號','204',3,15,229),(135,'0','824高雄市燕巢區橫山路59號','205',3,16,270),(136,'0','333桃園市龜山區萬壽路一段300號','206',1,4,56),(137,'0','831高雄市大寮區進學路151號','207',3,16,277),(138,'0','304新竹縣新豐鄉新興路1號','208',1,6,67),(139,'0','433台中市沙鹿區台灣大道六段1018號','209',2,9,130),(140,'0','320桃園市中壢區健行路229號','210',1,4,49),(141,'0','833高雄市鳥松區澄清路840號','211',3,16,279),(142,'0','320676 桃園市中壢區萬能路1號','212',1,4,49),(143,'0','500020彰化縣彰化市介壽北路1號','213',2,10,137),(144,'0','243新北市泰山區工專路84號','214',1,2,34),(145,'0','907屏東縣鹽埔鄉維新路20號','216',3,17,298),(146,'0','251309 新北市淡水區淡金路四段499號','217',1,2,39),(147,'0','408213台中市南屯區嶺東路1號','218',2,9,115),(148,'新竹校區','303新竹縣湖口鄉中山路三段530號','219',1,6,66),(149,'臺北校區','116台北市文山區興隆路三段56號','219',1,1,12),(150,'0','40601台中市北屯區廍子路666號','220',2,9,113),(151,'0','710台南市永康區中正路529號','221',3,15,222),(152,'0','744台南市新市區中華路49號','222',3,15,251),(153,'0','300新竹市香山區元培街306號','223',1,5,64),(154,'0','231新北市新店區安忠路99號','224',1,2,23),(155,'0','717台南市仁德區文華一街89號','225',3,15,229),(156,'0','222新北市深坑區北深路三段152號','226',1,2,17),(157,'0','114台北市內湖區環山路一段56號','227',1,1,10),(158,'0','542南投縣草屯鎮中正路568號','228',2,11,165),(159,'台北校區','115台北市南港區研究院路三段245號','229',1,1,11),(160,'新竹校區','312新竹縣橫山鄉中華街200號','229',1,6,74),(161,'0','407台中市西屯區僑光路100號','230',2,9,114),(162,'0','361苗栗縣造橋鄉學府路168號','231',2,8,99),(163,'0','912屏東縣內埔鄉屏光路23號','232',3,17,302),(164,'0','621嘉義縣民雄鄉建國路二段117號','233',3,14,211),(165,'0','412台中市大里區工業路11號','236',2,9,117),(166,'嘉義校區','613016 嘉義縣朴子市嘉朴路西段2號','237',3,14,207),(167,'林口校區','333桃園市龜山區文化一路261號','237',1,4,56),(168,'0','307新竹縣芎林鄉大華路1號','238',1,6,70),(169,'0','112台北市北投區學園路2號','239',1,1,9),(170,'0','244新北市林口區粉寮路一段101號','240',1,2,35),(171,'0','80793高雄市三民區民族一路900號','241',3,16,260),(172,'0','970花蓮縣花蓮市建國路二段880號','244',4,19,330),(173,'0','220新北市板橋區文化路一段313號','245',1,2,15),(174,'0','236新北市土城區青雲路380巷1號','246',1,2,28),(175,'士林校區','11174台北市士林區延平北路九段212號','249',1,1,8),(176,'淡水校區','251新北市淡水區濱海路三段150號','249',1,2,39),(177,'0','220新北市板橋區四川路二段58號','250',1,2,15),(178,'0','971花蓮縣新城鄉樹人街1號','403',4,19,331),(179,'0','320桃園市中壢區中山東路三段414號','411',1,4,49),(180,'0','243新北市泰山區泰林路三段22號','415',1,2,34),(181,'0','203基隆市中山區復興路336號','417',1,3,45),(182,'0','700台南市中西區民族路二段78號','502',3,15,216),(183,'0','116台北市文山區指南路二段64號','701',1,1,12),(184,'0','300新竹市東區光復路二段101號','702',1,5,63),(185,'0','10617台北市大安區羅斯福路四段1號','703',1,1,5),(186,'0','106台北市大安區和平東路一段162號','704',1,1,5),(187,'0','701台南市東區大學路1號','705',3,15,217),(188,'0','402台中市南區興大路145號','706',2,9,110),(189,'0','320桃園市中壢區中大路300號','708',1,4,49),(190,'0','804高雄市鼓山區蓮海路70號','709',3,16,257),(191,'0','202基隆市中正區北寧路2號','710',1,3,44),(192,'0','62102嘉義縣民雄鄉大學路一段168號','711',3,14,211),(193,'0','237新北市三峽區大學路151號','715',1,2,29),(194,'0','600嘉義市東區學府路300號','716',3,13,196),(195,'0','811高雄市楠梓區高雄大學路700號','717',3,16,261),(196,'0','974花蓮縣壽豐鄉大學路二段1號','718',4,19,334),(197,'0','545301南投縣埔里鎮大學路1號','719',2,11,167),(198,'0','112台北市北投區學園路1號','720',1,1,9),(199,'0','220新北市板橋區大觀路一段59號','721',1,2,15),(200,'0','950309 臺東市大學路二段369號','722',4,20,343),(201,'0','260宜蘭縣宜蘭市神農路一段1號','723',1,7,78),(202,'0','36003苗栗縣苗栗市聯大1號','724',2,8,98),(203,'0','72045台南市官田區大崎66號','725',3,15,232),(204,'0','70005台南市中西區樹林街二段33號','726',3,15,216),(205,'0','10671台北市大安區和平東路二段134號','727',1,1,5),(206,'0','333桃園市龜山區文化一路250號','731',1,4,56),(207,'0','892金門縣金寧鄉大學路1號綜合大樓','732',4,21,361),(208,'0','404台中市北區雙十路一段16號','733',2,9,112),(209,'0','100台北市中正區愛國西路1號','734',1,1,1),(210,'0','407224台中市西屯區台灣大道四段1727號','801',2,9,114),(211,'0','242新北市新莊區中正路510號','802',1,2,33),(212,'0','111台北市士林區臨溪路70號','803',1,1,8),(213,'0','320桃園市中壢區中北路200號','804',1,4,49),(214,'0','251301新北市淡水區英專路151號','805',1,2,39),(215,'0','111台北市士林區華岡路55號','806',1,1,8),(216,'0','407台中市西屯區文華路100號','807',2,9,114),(217,'0','433台中市沙鹿區台灣大道七段200號','808',2,9,130),(218,'0','33302桃園市龜山區文化一路259號','809',1,4,56),(219,'0','320桃園市中壢區遠東路135號','810',1,4,49),(220,'0','300新竹市香山區五福路二段707號','811',1,5,64),(221,'0','515006彰化縣大村鄉學府路168號','812',2,10,151),(222,'0','84001高雄市大樹區學城路一段1號','814',3,16,280),(223,'0','116台北市文山區木柵路一段17巷1號','815',1,1,12),(224,'台北校區','111005台北市士林區中山北路五段250號','816',1,1,8),(225,'桃園校區','333桃園市龜山區德明路5號','816',1,4,56),(226,'臺北校區','104台北市中山區大直街70號','817',1,1,3),(227,'高雄校區','84550高雄市內門區大學路200號','817',3,16,284),(228,'0','807高雄市三民區十全一路100號','818',3,16,260),(229,'0','622嘉義縣大林鎮南華路一段55號','819',3,14,212),(230,'0','251新北市淡水區真理街32號','820',1,2,39),(231,'0','104台北市中山區中山北路三段40號1樓','821',1,1,3),(232,'0','970花蓮縣花蓮市中央路三段701號970','822',4,19,330),(233,'0','711台南市歸仁區長大路1號','825',3,15,223),(234,'0','30092新竹市香山區玄奘路48號','827',1,5,64),(235,'0','413台中市霧峰區柳豐路500號','828',2,9,118),(236,'0','338桃園市蘆竹區開南路1號','829',1,4,61),(237,'0','262307宜蘭縣礁溪鄉林尾路160號','830',1,7,80),(238,'0','523彰化縣埤頭鄉文化路369號','831',2,10,156);
/*!40000 ALTER TABLE `分校` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `地區`
--

DROP TABLE IF EXISTS `地區`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `地區` (
  `地區ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `地區類型` varchar(7) NOT NULL,
  PRIMARY KEY (`地區ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `地區`
--

LOCK TABLES `地區` WRITE;
/*!40000 ALTER TABLE `地區` DISABLE KEYS */;
INSERT INTO `地區` VALUES (1,'北部'),(2,'中部'),(3,'南部'),(4,'東部與其他');
/*!40000 ALTER TABLE `地區` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `學校`
--

DROP TABLE IF EXISTS `學校`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `學校` (
  `學校ID` char(3) NOT NULL,
  `校名` varchar(20) NOT NULL,
  `網址` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`學校ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `學校`
--

LOCK TABLES `學校` WRITE;
/*!40000 ALTER TABLE `學校` DISABLE KEYS */;
INSERT INTO `學校` VALUES ('101','國立臺灣科技大學','https://www.ntust.edu.tw/home.php'),('102','國立雲林科技大學','http://www.yuntech.edu.tw/'),('103','國立屏東科技大學','https://www.npust.edu.tw'),('104','國立臺北科技大學','https://www.ntut.edu.tw/'),('105','國立高雄科技大學','https://www.nkust.edu.tw/'),('107','國立虎尾科技大學','http://www.nfu.edu.tw/'),('109','國立澎湖科技大學','http://www.npu.edu.tw'),('110','國立勤益科技大學','https://www.ncut.edu.tw/'),('111','國立臺北護理健康大學','https://www.ntunhs.edu.tw/'),('112','國立高雄餐旅大學','https://www.nkuht.edu.tw/app/home.php'),('113','國立臺中科技大學','http://www.nutc.edu.tw/'),('114','國立臺北商業大學','https://www.ntub.edu.tw'),('201','朝陽科技大學','http://www.cyut.edu.tw/'),('202','南臺科技大學','http://www.stust.edu.tw'),('203','崑山科技大學','https://www.ksu.edu.tw/'),('204','嘉藥學校財團法人嘉南藥理大學','https://www.cnu.edu.tw/'),('205','樹德科技大學','http://www.stu.edu.tw/'),('206','龍華科技大學','http://www.lhu.edu.tw'),('207','輔英科技大學','https://www.fy.edu.tw/'),('208','明新科技大學','http://www.must.edu.tw'),('209','弘光科技大學','http://www.hk.edu.tw/'),('210','健行科技大學','https://www.uch.edu.tw/index.htm'),('211','正修科技大學','https://www.csu.edu.tw'),('212','萬能科技大學','https://www.vnu.edu.tw/'),('213','建國科技大學','https://www.ctu.edu.tw/'),('214','明志科技大學','http://www.mcut.edu.tw'),('216','大仁科技大學','http://www.tajen.edu.tw/'),('217','聖約翰科技大學','http://www.sju.edu.tw'),('218','嶺東科技大學','http://www.ltu.edu.tw/'),('219','中國科技大學','https://www.cute.edu.tw/'),('220','中臺科技大學','https://www.ctust.edu.tw/'),('221','台南應用科技大學','http://www.tut.edu.tw'),('222','遠東科技大學','http://www.feu.edu.tw/web/'),('223','元培醫事科技大學','https://www.ypu.edu.tw/index.php'),('224','景文科技大學','https://www.just.edu.tw'),('225','中華醫事科技大學','https://www.hwai.edu.tw/index.php'),('226','東南科技大學','https://www.tnu.edu.tw/'),('227','德明財經科技大學','http://www.takming.edu.tw/'),('228','南開科技大學','https://www.nkut.edu.tw/index.php'),('229','中華科技大學','http://www.cust.edu.tw'),('230','僑光科技大學','https://www.ocu.edu.tw/index.php'),('231','育達科技大學','https://www.ydu.edu.tw/'),('232','美和科技大學','https://www.meiho.edu.tw/'),('233','吳鳳科技大學','http://www.wfu.edu.tw'),('236','修平科技大學','http://www.hust.edu.tw/'),('237','長庚學校財團法人長庚科技大學','https://www.cgust.edu.tw'),('238','敏實科技大學','http://www.mitust.edu.tw/'),('239','臺北城市科技大學','https://www.tpcu.edu.tw/bin/home.php '),('240','醒吾科技大學','https://www.hwu.edu.tw/'),('241','文藻外語大學','http://www.wzu.edu.tw/'),('244','慈濟學校財團法人慈濟科技大學','http://www.tcust.edu.tw/'),('245','致理科技大學','https://www.chihlee.edu.tw/'),('246','宏國德霖科技大學','https://w5.hdut.edu.tw/app/home.php'),('248','崇右影藝科技大學','http://www.cufa.edu.tw'),('249','台北海洋科技大學','https://www.tumt.edu.tw/'),('250','亞東科技大學','https://www.aeust.edu.tw/'),('403','大漢技術學院','https://rpage.dahan.edu.tw/'),('411','南亞技術學院','http://www.nanya.edu.tw'),('415','黎明技術學院','https://www.lit.edu.tw/'),('417','經國管理暨健康學院','https://www.cku.edu.tw'),('502','國立臺南護理專科學校','http://www.ntin.edu.tw/'),('503','國立臺東專科學校','http://www.ntc.edu.tw/'),('701','國立政治大學','http://www.nccu.edu.tw'),('702','國立清華大學','http://www.nthu.edu.tw'),('703','國立臺灣大學','http://www.ntu.edu.tw'),('704','國立臺灣師範大學','http://www.ntnu.edu.tw'),('705','國立成功大學','https://www.ncku.edu.tw/'),('706','國立中興大學','http://www.nchu.edu.tw/index1.php'),('707','國立陽明交通大學','https://www.nycu.edu.tw/'),('708','國立中央大學','http://www.ncu.edu.tw'),('709','國立中山大學','http://www.nsysu.edu.tw'),('710','國立臺灣海洋大學','http://www.ntou.edu.tw'),('711','國立中正大學','http://www.ccu.edu.tw'),('712','國立高雄師範大學','http://www.nknu.edu.tw'),('713','國立彰化師範大學','http://www.ncue.edu.tw'),('715','國立臺北大學','http://www.ntpu.edu.tw/'),('716','國立嘉義大學','https://www.ncyu.edu.tw'),('717','國立高雄大學','http://www.nuk.edu.tw'),('718','國立東華大學','https://www.ndhu.edu.tw'),('719','國立暨南國際大學','http://www.ncnu.edu.tw'),('720','國立臺北藝術大學','https://w3.tnua.edu.tw/'),('721','國立臺灣藝術大學','http://www.ntua.edu.tw'),('722','國立臺東大學','http://www.nttu.edu.tw'),('723','國立宜蘭大學','http://www.niu.edu.tw'),('724','國立聯合大學','http://www.nuu.edu.tw'),('725','國立臺南藝術大學','http://www.tnnua.edu.tw'),('726','國立臺南大學','https://www.nutn.edu.tw'),('727','國立臺北教育大學','http://www.ntue.edu.tw'),('729','國立臺中教育大學','http://www.ntcu.edu.tw'),('731','國立體育大學','http://www.ntsu.edu.tw'),('732','國立金門大學','http://www.nqu.edu.tw'),('733','國立臺灣體育運動大學','https://www.ntus.edu.tw'),('734','臺北市立大學','http://www.utaipei.edu.tw/'),('738','國立屏東大學','https://www.nptu.edu.tw'),('801','東海大學','http://www.thu.edu.tw'),('802','輔仁大學','http://www.fju.edu.tw'),('803','東吳大學','http://www.scu.edu.tw'),('804','中原大學','http://www.cycu.edu.tw'),('805','淡江大學','http://www.tku.edu.tw'),('806','中國文化大學','http://www.pccu.edu.tw'),('807','逢甲大學','https://www.fcu.edu.tw/'),('808','靜宜大學','https://www.pu.edu.tw'),('809','長庚大學','http://www.cgu.edu.tw'),('810','元智大學','http://www.yzu.edu.tw'),('811','中華大學','https://www1.chu.edu.tw/'),('812','大葉大學','https://www.dyu.edu.tw/'),('814','義守大學','http://www.isu.edu.tw'),('815','世新大學','https://www.shu.edu.tw'),('816','銘傳大學','http://www.mcu.edu.tw'),('817','實踐大學','http://www.usc.edu.tw'),('818','高雄醫學大學','https://www.kmu.edu.tw/'),('819','南華大學','http://www.nhu.edu.tw'),('820','真理大學','http://www.au.edu.tw'),('821','大同大學','http://www.ttu.edu.tw'),('822','慈濟學校財團法人慈濟大學','http://www.tcu.edu.tw'),('823','臺北醫學大學','http://www.tmu.edu.tw'),('825','長榮大學','http://www.cjcu.edu.tw'),('826','中國醫藥大學','http://www.cmu.edu.tw'),('827','玄奘大學','http://www.hcu.edu.tw'),('828','亞洲大學','http://www.asia.edu.tw'),('829','開南大學','http://www.knu.edu.tw'),('830','佛光大學','http://www.fgu.edu.tw'),('831','明道學校財團法人明道大學','http://www.mdu.edu.tw');
/*!40000 ALTER TABLE `學校` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `縣市`
--

DROP TABLE IF EXISTS `縣市`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `縣市` (
  `縣市ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `縣市名稱` varchar(6) NOT NULL,
  `地區ID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`縣市ID`),
  KEY `地區ID` (`地區ID`),
  CONSTRAINT `縣市_ibfk_1` FOREIGN KEY (`地區ID`) REFERENCES `地區` (`地區ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `縣市`
--

LOCK TABLES `縣市` WRITE;
/*!40000 ALTER TABLE `縣市` DISABLE KEYS */;
INSERT INTO `縣市` VALUES (1,'台北市',1),(2,'新北市',1),(3,'基隆市',1),(4,'桃園市',1),(5,'新竹市',1),(6,'新竹縣',1),(7,'宜蘭縣',1),(8,'苗栗縣',2),(9,'台中市',2),(10,'彰化縣',2),(11,'南投縣',2),(12,'雲林縣',2),(13,'嘉義市',3),(14,'嘉義縣',3),(15,'台南市',3),(16,'高雄市',3),(17,'屏東縣',3),(18,'澎湖縣',3),(19,'花蓮縣',4),(20,'台東縣',4),(21,'金門縣',4),(22,'連江縣',4),(23,'南海諸島',4);
/*!40000 ALTER TABLE `縣市` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `鄉鎮市區`
--

DROP TABLE IF EXISTS `鄉鎮市區`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `鄉鎮市區` (
  `行政區ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `區號` char(3) NOT NULL,
  `行政區名稱` varchar(8) NOT NULL,
  `縣市ID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`行政區ID`),
  KEY `縣市ID` (`縣市ID`),
  CONSTRAINT `鄉鎮市區_ibfk_1` FOREIGN KEY (`縣市ID`) REFERENCES `縣市` (`縣市ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `鄉鎮市區`
--

LOCK TABLES `鄉鎮市區` WRITE;
/*!40000 ALTER TABLE `鄉鎮市區` DISABLE KEYS */;
INSERT INTO `鄉鎮市區` VALUES (1,'100','中正區',1),(2,'103','大同區',1),(3,'104','中山區',1),(4,'105','松山區',1),(5,'106','大安區',1),(6,'108','萬華區',1),(7,'110','信義區',1),(8,'111','士林區',1),(9,'112','北投區',1),(10,'114','內湖區',1),(11,'115','南港區',1),(12,'116','文山區',1),(13,'207','萬里區',2),(14,'208','金山區',2),(15,'220','板橋區',2),(16,'221','汐止區',2),(17,'222','深坑區',2),(18,'223','石碇區',2),(19,'224','瑞芳區',2),(20,'226','平溪區',2),(21,'227','雙溪區',2),(22,'228','貢寮區',2),(23,'231','新店區',2),(24,'232','坪林區',2),(25,'233','烏來區',2),(26,'234','永和區',2),(27,'235','中區和',2),(28,'236','土城區',2),(29,'237','三峽區',2),(30,'238','樹林區',2),(31,'239','鶯歌區',2),(32,'241','三重區',2),(33,'242','新莊區',2),(34,'243','泰山區',2),(35,'244','林口區',2),(36,'247','蘆洲區',2),(37,'248','五股區',2),(38,'249','八里區',2),(39,'251','淡水區',2),(40,'252','三芝區',2),(41,'253','石門區',2),(42,'200','仁愛區',3),(43,'201','信義區',3),(44,'202','中正區',3),(45,'203','中山區',3),(46,'204','安樂區',3),(47,'205','暖暖區',3),(48,'206','七堵區',3),(49,'320','中壢區',4),(50,'324','平鎮區',4),(51,'325','龍潭區',4),(52,'326','楊梅區',4),(53,'327','新屋區',4),(54,'328','觀音區',4),(55,'330','桃園區',4),(56,'333','龜山區',4),(57,'334','八德區',4),(58,'335','大溪區',4),(59,'336','復興區',4),(60,'337','大園區',4),(61,'338','蘆竹區',4),(62,'300','北區',5),(63,'300','東區',5),(64,'300','香山區',5),(65,'302','竹北市',6),(66,'303','湖口鄉',6),(67,'304','新豐鄉',6),(68,'305','新埔鎮',6),(69,'306','關西鎮',6),(70,'307','芎林鄉',6),(71,'308','寶山鄉',6),(72,'310','竹東鎮',6),(73,'311','五峰鄉',6),(74,'312','橫山鄉',6),(75,'313','尖石鄉',6),(76,'314','北埔鄉',6),(77,'315','峨眉鄉',6),(78,'260','宜蘭市',7),(79,'261','頭城鎮',7),(80,'262','礁溪鄉',7),(81,'263','壯圍鄉',7),(82,'264','員山鄉',7),(83,'265','羅東鎮',7),(84,'266','三星鄉',7),(85,'267','大同鄉',7),(86,'268','五結鄉',7),(87,'269','冬山鄉',7),(88,'270','蘇澳鎮',7),(89,'272','南澳鄉',7),(90,'350','竹南鎮',8),(91,'351','頭份鎮',8),(92,'352','三灣鄉',8),(93,'353','南庄鄉',8),(94,'354','獅潭鄉',8),(95,'356','後龍鎮',8),(96,'357','通霄鎮',8),(97,'358','苑裡鎮',8),(98,'360','苗栗市',8),(99,'361','造橋鄉',8),(100,'362','頭屋鄉',8),(101,'363','公館鄉',8),(102,'364','大湖鄉',8),(103,'365','泰安鄉',8),(104,'366','銅鑼鄉',8),(105,'367','三義鄉',8),(106,'368','西湖鄉',8),(107,'369','卓蘭鎮',8),(108,'400','中區',9),(109,'401','東區',9),(110,'402','南區',9),(111,'403','西區',9),(112,'404','北區',9),(113,'406','北屯區',9),(114,'407','西屯區',9),(115,'408','南屯區',9),(116,'411','太平區',9),(117,'412','大里區',9),(118,'413','霧峰區',9),(119,'414','烏日區',9),(120,'420','豐原區',9),(121,'421','后里區',9),(122,'422','石岡區',9),(123,'423','東勢區',9),(124,'424','和平區',9),(125,'426','新社區',9),(126,'427','潭子區',9),(127,'428','大雅區',9),(128,'429','神岡區',9),(129,'432','大肚區',9),(130,'433','沙鹿區',9),(131,'434','龍井區',9),(132,'435','梧棲區',9),(133,'436','清水區',9),(134,'437','大甲區',9),(135,'438','外埔區',9),(136,'439','大安區',9),(137,'500','彰化市',10),(138,'502','芬園鄉',10),(139,'503','花壇鄉',10),(140,'504','秀水鄉',10),(141,'505','鹿港鎮',10),(142,'506','福興鄉',10),(143,'507','線西鄉',10),(144,'508','和美鎮',10),(145,'509','伸港鄉',10),(146,'510','員林鎮',10),(147,'511','社頭鄉',10),(148,'512','永靖鄉',10),(149,'513','埔心鄉',10),(150,'514','溪湖鎮',10),(151,'515','大村鄉',10),(152,'516','埔鹽鄉',10),(153,'520','田中鎮',10),(154,'521','北斗鎮',10),(155,'522','田尾鄉',10),(156,'523','埤頭鄉',10),(157,'524','溪州鄉',10),(158,'525','竹塘鄉',10),(159,'526','二林鎮',10),(160,'527','大城鄉',10),(161,'528','芳苑鄉',10),(162,'530','二水鄉',10),(163,'540','南投市',11),(164,'541','中寮鄉',11),(165,'542','草屯鎮',11),(166,'544','國姓鄉',11),(167,'545','埔里鎮',11),(168,'546','仁愛鄉',11),(169,'551','名間鄉',11),(170,'552','集集鎮',11),(171,'553','水里鄉',11),(172,'555','魚池鄉',11),(173,'556','信義鄉',11),(174,'557','竹山鎮',11),(175,'558','鹿谷鄉',11),(176,'630','斗南鎮',12),(177,'631','大埤鄉',12),(178,'632','虎尾鎮',12),(179,'633','土庫鎮',12),(180,'634','褒忠鄉',12),(181,'635','東勢鄉',12),(182,'636','臺西鄉',12),(183,'637','崙背鄉',12),(184,'638','麥寮鄉',12),(185,'640','斗六市',12),(186,'643','林內鄉',12),(187,'646','古坑鄉',12),(188,'647','莿桐鄉',12),(189,'648','西螺鎮',12),(190,'649','二崙鄉',12),(191,'651','北港鎮',12),(192,'652','水林鄉',12),(193,'653','口湖鄉',12),(194,'654','四湖鄉',12),(195,'655','元長鄉',12),(196,'600','東區',13),(197,'600','西區',13),(198,'602','番路鄉',14),(199,'603','梅山鄉',14),(200,'604','竹崎鄉',14),(201,'605','阿里山鄉',14),(202,'606','中埔鄉',14),(203,'607','大埔鄉',14),(204,'608','水上鄉',14),(205,'611','鹿草鄉',14),(206,'612','太保市',14),(207,'613','朴子市',14),(208,'614','東石鄉',14),(209,'615','六腳鄉',14),(210,'616','新港鄉',14),(211,'621','民雄鄉',14),(212,'622','大林鎮',14),(213,'623','溪口鄉',14),(214,'624','義竹鄉',14),(215,'625','布袋鎮',14),(216,'700','中西區',15),(217,'701','東區',15),(218,'702','南區',15),(219,'704','北區',15),(220,'708','安平區',15),(221,'709','安南區',15),(222,'710','永康區',15),(223,'711','歸仁區',15),(224,'712','新化區',15),(225,'713','左鎮區',15),(226,'714','玉井區',15),(227,'715','楠西區',15),(228,'716','南化區',15),(229,'717','仁德區',15),(230,'718','關廟區',15),(231,'719','龍崎區',15),(232,'720','官田區',15),(233,'721','麻豆區',15),(234,'722','佳里區',15),(235,'723','西港區',15),(236,'724','七股區',15),(237,'725','將軍區',15),(238,'726','學甲區',15),(239,'727','北門區',15),(240,'730','新營區',15),(241,'731','後壁區',15),(242,'732','白河區',15),(243,'733','東山區',15),(244,'734','六甲區',15),(245,'735','下營區',15),(246,'736','柳營區',15),(247,'737','鹽水區',15),(248,'741','善化區',15),(249,'742','大內區',15),(250,'743','山上區',15),(251,'744','新市區',15),(252,'745','安定區',15),(253,'800','新興區',16),(254,'801','前金區',16),(255,'802','苓雅區',16),(256,'803','鹽埕區',16),(257,'804','鼓山區',16),(258,'805','旗津區',16),(259,'806','前鎮區',16),(260,'807','三民區',16),(261,'811','楠梓區',16),(262,'812','小港區',16),(263,'813','左營區',16),(264,'814','仁武區',16),(265,'815','大社區',16),(266,'820','岡區山',16),(267,'821','路竹區',16),(268,'822','阿蓮區',16),(269,'823','田寮區',16),(270,'824','燕巢區',16),(271,'825','橋頭區',16),(272,'826','梓官區',16),(273,'827','彌陀區',16),(274,'828','永安區',16),(275,'829','湖內區',16),(276,'830','鳳山區',16),(277,'831','大寮區',16),(278,'832','林園區',16),(279,'833','鳥松區',16),(280,'840','大樹區',16),(281,'842','旗山區',16),(282,'843','美濃區',16),(283,'844','六龜區',16),(284,'845','內門區',16),(285,'846','杉林區',16),(286,'847','甲仙區',16),(287,'848','桃源區',16),(288,'849','那瑪夏區',16),(289,'851','茂林區',16),(290,'852','茄萣區',16),(291,'900','屏東市',17),(292,'901','三地門鄉',17),(293,'902','霧臺鄉',17),(294,'903','瑪家鄉',17),(295,'904','九如鄉',17),(296,'905','里港鄉',17),(297,'906','高樹鄉',17),(298,'907','鹽埔鄉',17),(299,'908','長治鄉',17),(300,'909','麟洛鄉',17),(301,'911','竹田鄉',17),(302,'912','內埔鄉',17),(303,'913','萬丹鄉',17),(304,'920','潮州鄉',17),(305,'921','泰武鄉',17),(306,'922','來義鄉',17),(307,'923','萬巒鄉',17),(308,'924','崁頂鄉',17),(309,'925','新埤鄉',17),(310,'926','南州鄉',17),(311,'927','林邊鄉',17),(312,'928','東港鎮',17),(313,'929','琉球鄉',17),(314,'931','佳冬鄉',17),(315,'932','新園鄉',17),(316,'940','枋寮鄉',17),(317,'941','枋山鄉',17),(318,'942','春日鄉',17),(319,'943','獅子鄉',17),(320,'944','車城鄉',17),(321,'945','牡丹鄉',17),(322,'946','恆春鎮',17),(323,'947','滿州鄉',17),(324,'880','馬公市',18),(325,'881','西嶼鄉',18),(326,'882','望安鄉',18),(327,'883','七美鄉',18),(328,'884','白沙鄉',18),(329,'885','湖西鄉',18),(330,'970','花蓮市',19),(331,'971','新城鄉',19),(332,'972','秀林鄉',19),(333,'973','吉安鄉',19),(334,'974','壽豐鄉',19),(335,'975','鳳林鎮',19),(336,'976','光復鄉',19),(337,'977','豐濱鄉',19),(338,'978','瑞穗鄉',19),(339,'979','萬榮鄉',19),(340,'981','玉里鎮',19),(341,'982','卓溪鄉',19),(342,'983','富里鄉',19),(343,'950','台東市',20),(344,'951','綠島鄉',20),(345,'952','蘭嶼鄉',20),(346,'953','延平鄉',20),(347,'954','卑南鄉',20),(348,'955','鹿野鄉',20),(349,'956','關山鎮',20),(350,'957','海端鄉',20),(351,'958','池上鄉',20),(352,'959','東河鄉',20),(353,'961','成功鎮',20),(354,'962','長濱鄉',20),(355,'963','太麻里鄉',20),(356,'964','金峰鄉',20),(357,'965','大武鄉',20),(358,'966','達仁鄉',20),(359,'890','金沙鎮',21),(360,'891','金湖鎮',21),(361,'892','金寧鄉',21),(362,'893','金城鎮',21),(363,'894','烈嶼鄉',21),(364,'896','烏坵鄉',21),(365,'209','南竿鄉',22),(366,'210','北竿鄉',22),(367,'211','莒光鄉',22),(368,'212','東引鄉',22),(369,'817','東沙群島',23),(370,'819','南沙群島',23),(371,'290','釣魚台列嶼',23);
/*!40000 ALTER TABLE `鄉鎮市區` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-17 21:54:30
