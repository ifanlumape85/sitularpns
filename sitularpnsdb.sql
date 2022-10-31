-- MySQL dump 10.13  Distrib 8.0.30, for macos12.4 (arm64)
--
-- Host: localhost    Database: sitularpnsdb
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_favorites` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_favorites`
--

LOCK TABLES `ch_favorites` WRITE;
/*!40000 ALTER TABLE `ch_favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `ch_favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_messages` (
  `id` bigint NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_messages`
--

LOCK TABLES `ch_messages` WRITE;
/*!40000 ALTER TABLE `ch_messages` DISABLE KEYS */;
INSERT INTO `ch_messages` VALUES (1764848330,'user',1,18,'kenapa bro',NULL,1,'2022-10-04 04:33:35','2022-10-04 04:33:36'),(1772307233,'user',1,1,'Hai',NULL,1,'2022-10-04 04:24:41','2022-10-04 04:24:42'),(2659934067,'user',18,1,'hai',NULL,1,'2022-10-04 04:32:38','2022-10-04 04:33:25');
/*!40000 ALTER TABLE `ch_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_user`
--

DROP TABLE IF EXISTS `detail_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_ujian` bigint unsigned NOT NULL,
  `id_user` bigint unsigned NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_golongan` bigint unsigned NOT NULL,
  `id_jenjang_pendidikan` bigint unsigned DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_skpd` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_user`
--

LOCK TABLES `detail_user` WRITE;
/*!40000 ALTER TABLE `detail_user` DISABLE KEYS */;
INSERT INTO `detail_user` VALUES (7,3,4,NULL,NULL,'7171020210850001',1,NULL,'Kepala Bidang e-government',1,'2021-05-04 14:12:28','2021-05-04 14:12:28',NULL),(8,3,9,NULL,NULL,'7171',1,NULL,'PROGRAMMER',1,'2022-09-25 01:09:20','2022-09-25 01:09:20',NULL),(9,3,9,NULL,NULL,'898767788',2,NULL,'PROGGRAMMER',1,'2022-09-25 01:12:35','2022-09-25 01:12:35',NULL),(10,3,9,NULL,NULL,'88888',2,NULL,'PROGRAMMER',1,'2022-09-25 01:14:17','2022-09-25 01:14:17',NULL),(11,3,9,NULL,NULL,'99999',4,NULL,'PROGRAMMER',1,'2022-09-25 01:16:40','2022-09-25 01:16:40',NULL),(12,3,9,NULL,NULL,'99999',4,NULL,'PROGRAMMER',1,'2022-09-25 01:16:44','2022-09-25 01:16:44',NULL),(13,3,1,NULL,NULL,'898765',2,NULL,'Programmer',1,'2022-09-26 16:14:14','2022-09-26 16:14:14',NULL),(14,3,1,NULL,NULL,'898765',2,NULL,'Programmer',1,'2022-09-26 16:14:21','2022-09-26 16:14:21',NULL),(15,3,1,NULL,NULL,'898765',2,NULL,'Programmer',1,'2022-09-26 16:14:22','2022-09-26 16:14:22',NULL),(16,3,1,NULL,NULL,'898765',2,NULL,'Programmer',1,'2022-09-26 16:14:23','2022-09-26 16:14:23',NULL),(17,3,16,NULL,NULL,'8888',5,NULL,'Programmer',2,'2022-09-29 14:40:30','2022-09-29 14:40:30',NULL),(18,1,1,NULL,NULL,'333',1,NULL,'sdfdf',1,'2022-10-04 18:15:59','2022-10-04 18:15:59',NULL),(19,1,19,'Manado','1985-10-02','7171020210850001',2,7,'PROGRAMMER',1,'2022-10-31 03:28:35','2022-10-31 03:28:35',NULL),(20,1,19,'MANADO','1985-10-02','7171020210850001',1,7,'PROGRAMMER',1,'2022-10-31 04:08:02','2022-10-31 04:08:02',NULL);
/*!40000 ALTER TABLE `detail_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `golongan`
--

DROP TABLE IF EXISTS `golongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `golongan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golongan`
--

LOCK TABLES `golongan` WRITE;
/*!40000 ALTER TABLE `golongan` DISABLE KEYS */;
INSERT INTO `golongan` VALUES (1,'Pembina Utama','IV','e','pembina-utama',NULL,'2021-05-04 01:37:56','2021-05-04 01:37:56'),(2,'Pembina Utama Madya','IV','d','pembina-utama-madya',NULL,'2021-05-04 01:38:10','2021-05-04 01:38:10'),(3,'Pembina Utama Muda','IV','c','pembina-utama-muda',NULL,'2021-05-04 01:38:25','2021-05-04 01:38:25'),(4,'Pembina Tingkat I','IV','b','pembina-tingkat-i',NULL,'2021-05-04 01:38:37','2021-05-04 01:38:37'),(5,'Pembina','IV','a','pembina',NULL,'2021-05-04 01:38:46','2021-05-04 01:38:46');
/*!40000 ALTER TABLE `golongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenjang_pendidikan`
--

DROP TABLE IF EXISTS `jenjang_pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenjang_pendidikan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenjang_pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenjang_pendidikan`
--

LOCK TABLES `jenjang_pendidikan` WRITE;
/*!40000 ALTER TABLE `jenjang_pendidikan` DISABLE KEYS */;
INSERT INTO `jenjang_pendidikan` VALUES (1,'SD','sd',NULL,'2021-05-04 01:16:15','2021-05-04 01:16:15'),(2,'SMP','smp',NULL,'2021-05-04 01:16:19','2021-05-04 01:16:19'),(3,'SMA','sma',NULL,'2021-05-04 01:16:23','2021-05-04 01:16:23'),(4,'DI','di',NULL,'2021-05-04 01:16:27','2021-05-04 01:16:27'),(5,'DII','dii',NULL,'2021-05-04 01:16:31','2021-05-04 01:16:31'),(6,'DIII','diii',NULL,'2021-05-04 01:16:35','2021-05-04 01:16:35'),(7,'S1','s1',NULL,'2021-05-04 01:16:40','2021-05-04 01:16:40'),(8,'S2','s2',NULL,'2021-05-04 01:16:44','2021-05-04 01:16:44'),(9,'S3','s3',NULL,'2021-05-04 01:16:49','2021-05-04 01:16:49');
/*!40000 ALTER TABLE `jenjang_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_03_18_083737_create_permission_tables',1),(5,'2021_04_14_230443_create_information_table',2),(6,'2021_04_22_020249_create_perizinans_table',3),(7,'2021_04_22_231432_create_perizinans_table',4),(8,'2021_05_04_070045_create_ujians_table',5),(9,'2021_05_04_070120_create_persyaratans_table',5),(10,'2021_05_04_070146_create_registrasis_table',5),(11,'2021_05_04_070451_create_persyaratan_users_table',5),(12,'2021_05_04_071511_create_golongans_table',6),(13,'2021_05_04_075013_create_detail_users_table',7),(14,'2021_05_04_080845_create_skpds_table',8),(15,'2021_05_04_080905_create_jenjang_pendidikans_table',8),(16,'2021_05_04_081044_add_more_field_to_detail_user',9),(17,'2021_05_04_112422_add_field_ujian_to_detail_user',10),(18,'2021_05_04_215007_add_field_to_registrasi',11),(19,'2021_05_05_011729_add_field_berkas_to_persyaratan_user',12),(20,'2022_10_04_999999_add_active_status_to_users',13),(21,'2022_10_04_999999_add_avatar_to_users',13),(22,'2022_10_04_999999_add_dark_mode_to_users',13),(23,'2022_10_04_999999_add_messenger_color_to_users',13),(24,'2022_10_04_999999_create_favorites_table',13),(25,'2022_10_04_999999_create_messages_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(3,'App\\Models\\User',2),(2,'App\\Models\\User',4),(2,'App\\Models\\User',5),(2,'App\\Models\\User',6),(2,'App\\Models\\User',7),(2,'App\\Models\\User',8),(2,'App\\Models\\User',16),(2,'App\\Models\\User',19);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (9,'banner-list','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(10,'banner-create','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(11,'banner-edit','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(12,'banner-delete','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(17,'category-list','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(18,'category-create','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(19,'category-edit','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(20,'category-delete','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(25,'contact-list','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(26,'contact-create','web','2021-03-18 01:03:36','2021-03-18 01:03:36'),(27,'contact-edit','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(28,'contact-delete','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(37,'event-list','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(38,'event-create','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(39,'event-edit','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(40,'event-delete','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(45,'gallery-list','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(46,'gallery-create','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(47,'gallery-edit','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(48,'gallery-delete','web','2021-03-18 01:03:37','2021-03-18 01:03:37'),(69,'menu-list','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(70,'menu-create','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(71,'menu-edit','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(72,'menu-delete','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(77,'news-list','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(78,'news-create','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(79,'news-edit','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(80,'news-delete','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(81,'news_tag-list','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(82,'news_tag-create','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(83,'news_tag-edit','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(84,'news_tag-delete','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(85,'page-list','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(86,'page-create','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(87,'page-edit','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(88,'page-delete','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(93,'role-list','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(94,'role-create','web','2021-03-18 01:03:38','2021-03-18 01:03:38'),(95,'role-edit','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(96,'role-delete','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(101,'slide-list','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(102,'slide-create','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(103,'slide-edit','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(104,'slide-delete','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(105,'tag-list','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(106,'tag-create','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(107,'tag-edit','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(108,'tag-delete','web','2021-03-18 01:03:39','2021-03-18 01:03:39'),(117,'user-list','web','2021-03-18 10:27:32','2021-03-18 10:27:32'),(118,'user-create','web','2021-03-18 10:27:32','2021-03-18 10:27:32'),(119,'user-edit','web','2021-03-18 10:28:18','2021-03-18 10:28:18'),(120,'user-delete','web','2021-03-18 10:28:18','2021-03-18 10:27:32'),(121,'profile-list','web','2021-04-13 03:02:05','2021-04-13 03:02:05'),(122,'profile-create','web','2021-04-13 03:02:05','2021-04-13 03:02:05'),(123,'profile-edit','web','2021-04-13 03:02:05','2021-04-13 03:02:05'),(124,'profile-delete','web','2021-04-13 03:02:05','2021-04-13 03:02:05'),(125,'perizinan-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(126,'perizinan-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(127,'perizinan-edit','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(128,'perizinan-delete','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(129,'skpd-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(130,'skpd-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(131,'skpd-edit','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(132,'skpd-delete','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(133,'detail_user-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(134,'detail_user-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(135,'detail_user-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(136,'detail_user-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(137,'golongan-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(138,'golongan-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(139,'golongan-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(140,'golongan-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(141,'jenjang_pendidikan-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(142,'jenjang_pendidikan-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(143,'jenjang_pendidikan-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(144,'jenjang_pendidikan-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(145,'persyaratan-list','web','2021-04-22 23:39:48','2021-05-03 07:35:44'),(146,'persyaratan-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(147,'persyaratan-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(148,'persyaratan-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(149,'persyaratan_user-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(150,'persyaratan_user-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(151,'persyaratan_user-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(152,'persyaratan_user-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(153,'registrasi-list','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(154,'registrasi-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(155,'registrasi-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(156,'registrasi-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02'),(161,'ujian-list','web','2021-04-22 23:39:48','2021-05-03 07:35:44'),(162,'ujian-create','web','2021-04-22 23:39:48','2021-04-22 23:39:48'),(163,'ujian-edit','web','2021-05-04 08:29:02','2021-05-04 08:52:02'),(164,'ujian-delete','web','2021-05-04 08:29:02','2021-05-04 04:52:02');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persyaratan`
--

DROP TABLE IF EXISTS `persyaratan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persyaratan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_ujian` bigint unsigned NOT NULL,
  `nama_persyaratan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persyaratan`
--

LOCK TABLES `persyaratan` WRITE;
/*!40000 ALTER TABLE `persyaratan` DISABLE KEYS */;
INSERT INTO `persyaratan` VALUES (1,1,'Surat Permohonan','surat-pengantar-dari-kepala-unit-kerja',NULL,'2021-05-04 01:32:19','2022-10-31 02:52:48'),(2,2,'Surat Pengantar dari Kepala Unit Kerja','surat-pengantar-dari-kepala-unit-kerja','2022-10-31 02:26:52','2021-05-04 01:32:32','2022-10-31 02:26:52'),(3,3,'Surat Pengantar dari Kepala Unit Kerja','surat-pengantar-dari-kepala-unit-kerja','2022-10-31 02:26:51','2021-05-04 01:32:41','2022-10-31 02:26:51'),(4,3,'1 (Satu) rangkap biodata calon peserta','1-satu-rangkap-biodata-calon-peserta','2022-10-31 02:26:50','2021-05-04 17:41:07','2022-10-31 02:26:50'),(5,3,'1 (satu) rangkap foto copy SK Pangkat terakhir yang telah dilegalisir','1-satu-rangkap-foto-copy-sk-pangkat-terakhir-yang-telah-dilegalisir','2022-10-31 02:26:49','2021-05-04 17:41:31','2022-10-31 02:26:49'),(6,3,'1 (satu) rangkap foto copy SKP (Sasaran Kinerja Pegawai) 2 Tahun terakhir yang telah dilegalisir','1-satu-rangkap-foto-copy-skp-sasaran-kinerja-pegawai-2-tahun-terakhir-yang-telah-dilegalisir','2022-10-31 02:26:48','2021-05-04 17:41:58','2022-10-31 02:26:48'),(7,3,'2 (dua) lembar pas photo ukuran 4 x 6 cm latar merah menggunakan PDH','2-dua-lembar-pas-photo-ukuran-4-x-6-cm-latar-merah-menggunakan-pdh','2022-10-31 02:26:47','2021-05-04 17:42:22','2022-10-31 02:26:47'),(8,3,'2 (dua) lembar pas photo 3x4 cm latar merah menggunakan PDH','2-dua-lembar-pas-photo-3x4-cm-latar-merah-menggunakan-pdh','2022-10-31 02:26:46','2021-05-04 17:42:45','2022-10-31 02:26:46'),(9,1,'Jadwal Kuliah','jadwal-kuliah',NULL,'2022-10-31 02:52:55','2022-10-31 02:52:55'),(10,1,'Akreditasi Prodi','akreditasi-prodi',NULL,'2022-10-31 02:53:06','2022-10-31 02:53:06'),(11,1,'Surat Diterima','surat-diterima',NULL,'2022-10-31 02:53:14','2022-10-31 02:53:14');
/*!40000 ALTER TABLE `persyaratan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persyaratan_user`
--

DROP TABLE IF EXISTS `persyaratan_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persyaratan_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persyaratan` bigint unsigned NOT NULL,
  `id_registrasi` bigint unsigned NOT NULL,
  `berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persyaratan_user`
--

LOCK TABLES `persyaratan_user` WRITE;
/*!40000 ALTER TABLE `persyaratan_user` DISABLE KEYS */;
INSERT INTO `persyaratan_user` VALUES (31,8,10,'assets/berkas/4YKFLNcelOyBTLny0N57oboLjfkIoUbHWszkniIRdvB0dgOLtfEKXopSaXLq.pdf',NULL,'2022-09-30 01:24:52','2022-09-30 01:24:52'),(32,7,10,'assets/berkas/k1ykRJvj7Cvvco3CmMOqIRIF5pqpsIJO3l8KyZRyHWmzp3xKjuZ9WBk9OCm2.pdf',NULL,'2022-09-30 01:25:11','2022-09-30 01:25:11'),(33,6,10,'assets/berkas/XPGAkxokNysmqyItb2yw5u6LCwdEEeeyQ5vEKFgIivLtyVGcjkXxySRu4SRb.pdf',NULL,'2022-09-30 01:25:14','2022-09-30 01:25:14'),(34,5,10,'assets/berkas/Dzk2ZgaHx3AjGm3cKtfrFfmFDFard5J2GsLYr4lKsX98MeTR4IgCZVL1iuv7.pdf',NULL,'2022-09-30 01:25:17','2022-09-30 01:25:17'),(35,4,10,'assets/berkas/yxwkN0CE1HBfy0h7OC8GMfUM3pwQl4Cf2wbLUcnvlLB986kHYBDQWqAs2fuV.pdf',NULL,'2022-09-30 01:25:20','2022-09-30 01:25:20'),(36,3,10,'assets/berkas/biCjm3q4srkgF5C0fOzyJB3a5IHvWs3YoLH9oyCKgXAwGmLCN3Gl2unJNF0U.pdf',NULL,'2022-09-30 01:25:23','2022-09-30 01:25:23'),(37,1,13,'assets/berkas/qUhzORzPvzL1ELh4IR6wzhIob5gXRf7BqkiTKJIV.pdf',NULL,'2022-10-31 04:10:25','2022-10-31 04:10:25');
/*!40000 ALTER TABLE `persyaratan_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrasi`
--

DROP TABLE IF EXISTS `registrasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_detail_user` bigint unsigned NOT NULL,
  `id_jenjang_pendidikan` bigint unsigned DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `biaya` int NOT NULL DEFAULT '1' COMMENT '1 biaya sendiri 2 pemda',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrasi`
--

LOCK TABLES `registrasi` WRITE;
/*!40000 ALTER TABLE `registrasi` DISABLE KEYS */;
INSERT INTO `registrasi` VALUES (1,7,NULL,NULL,NULL,NULL,NULL,1,NULL,'2021-05-04 14:12:28','2021-05-04 14:12:28','6091c6cc32bed'),(2,9,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-09-25 01:12:35','2022-09-25 01:12:35','mEt89O'),(3,10,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-09-25 01:14:17','2022-09-25 01:14:17','zNDZOXR5jnYd'),(4,11,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-09-25 01:16:40','2022-09-25 01:16:40','x6e3drEHrR54'),(5,12,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-09-25 01:16:44','2022-09-25 01:16:44','OoSkdFMxeSeU'),(6,13,NULL,NULL,NULL,NULL,NULL,1,'2022-10-03 23:34:14','2022-09-26 16:14:14','2022-10-03 23:34:14','uygYbqn28zNm'),(7,14,NULL,NULL,NULL,NULL,NULL,1,'2022-10-03 23:34:13','2022-09-26 16:14:21','2022-10-03 23:34:13','Qr9m8U6ulU58'),(8,15,NULL,NULL,NULL,NULL,NULL,1,'2022-10-03 23:34:12','2022-09-26 16:14:22','2022-10-03 23:34:12','y9hzMbXgtt1r'),(9,16,NULL,NULL,NULL,NULL,NULL,1,'2022-10-03 23:34:11','2022-09-26 16:14:23','2022-10-03 23:34:11','byWub1LeKEGJ'),(10,17,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-09-29 14:40:31','2022-09-29 14:40:31','5LeGAe8qy2P9'),(11,18,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-10-04 18:15:59','2022-10-04 18:15:59','633ce8dfeb0ff'),(12,19,NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-10-31 03:28:35','2022-10-31 03:28:35','20221031112835'),(13,20,8,'COMPUTER SCIENCE','ILMU KOMPUTER','UNIVERSITAS GADJA MADA','2022-10-31',1,NULL,'2022-10-31 04:08:02','2022-10-31 04:08:02','20221031120802');
/*!40000 ALTER TABLE `registrasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (9,1),(10,1),(11,1),(12,1),(17,1),(18,1),(19,1),(20,1),(25,1),(26,1),(27,1),(28,1),(37,1),(38,1),(39,1),(40,1),(45,1),(46,1),(47,1),(48,1),(69,1),(70,1),(71,1),(72,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(93,1),(94,1),(95,1),(96,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(161,1),(162,1),(163,1),(164,1),(119,2),(133,2),(134,2),(135,2),(136,2),(145,2),(149,2),(150,2),(151,2),(152,2),(153,2),(154,2),(161,2),(129,3),(130,3),(131,3),(132,3),(133,3),(134,3),(135,3),(136,3),(137,3),(138,3),(139,3),(140,3),(141,3),(142,3),(143,3),(144,3),(145,3),(146,3),(147,3),(148,3),(149,3),(150,3),(151,3),(152,3),(153,3),(154,3),(155,3),(156,3),(161,3),(162,3),(163,3),(164,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2021-03-18 01:05:27','2021-03-18 01:05:27'),(2,'User','web','2021-03-18 01:51:16','2021-03-18 01:51:16'),(3,'ADMIN SI TULAR PNS','web','2021-05-04 01:41:11','2022-10-31 05:12:45');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skpd`
--

DROP TABLE IF EXISTS `skpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skpd` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_skpd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skpd`
--

LOCK TABLES `skpd` WRITE;
/*!40000 ALTER TABLE `skpd` DISABLE KEYS */;
INSERT INTO `skpd` VALUES (1,'Dinas Komunikasi dan Informatika','dinas-komunikasi-dan-informatika',NULL,'2021-05-04 01:07:14','2021-05-04 01:07:14'),(2,'Badan Kepegawaian Pendidikan dan Pelatihan','badan-kepegawaian-pendidikan-dan-pelatihan',NULL,'2021-05-04 01:07:31','2021-05-04 01:07:31');
/*!40000 ALTER TABLE `skpd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ujian`
--

DROP TABLE IF EXISTS `ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ujian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_ujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian`
--

LOCK TABLES `ujian` WRITE;
/*!40000 ALTER TABLE `ujian` DISABLE KEYS */;
INSERT INTO `ujian` VALUES (1,'Tugas Belajar','Ujian yang wajib ditempuh oleh Pegawai Negeri Sipil yang akan naik pangkat setingkat lebih tinggi dari Pengatur Tingak I, II/d menjadi Penata Muda, III/a','ujian-dinas-tingkat-i',NULL,'2021-05-04 01:11:31','2022-10-31 02:23:33'),(2,'Ujian Dinas Tingkat II','Ujian yang wajib ditempuh oleh Pegawai Negeri Sipil yang akan naik pangkat setingkat lebih tinggi dari Pengatur Tingak I, III/d menjadi Pembina, IV/a','ujian-dinas-tingkat-ii','2022-10-31 02:23:23','2021-05-04 01:12:02','2022-10-31 02:23:23'),(3,'Ujian Kenaikan Pangkat Penyesuaian Ijazah','Ujian yang wajib ditempuh oleh Pegawai Negeri Sipil yang memperoleh surat tanda tamat belajar / Ijazah tertentu','penyesuaian-ijazah','2022-10-31 02:23:21','2021-05-04 01:12:40','2022-10-31 02:23:21');
/*!40000 ALTER TABLE `ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','bkpp@bolmongkab.go.id','2022-10-02 02:19:36','$2y$10$tn5vizLGCpe0Ln8JqZjG5OvuWX0b4vmk5NQLQstc/9lC2tK4WWcpa','Q7vOQqLU8Xxf22shtbaMmB60SORsRwzOC3nORIrnIjE0kJsaygJD2LqXN46D','Y','2021-03-18 01:05:27','2022-10-04 04:33:23',1,'avatar.png',0,'#2180f3'),(19,'Ifan Lumape','ifanlumape','ifanlumape85@gmail.com','2022-10-31 03:05:03','$2y$10$mzZ/gMbz4gIChwPDy1Uf.OF20M2/1iPwyfnufehZfjwYxWtg85Epm',NULL,'N','2022-10-31 02:55:42','2022-10-31 03:05:03',0,'avatar.png',0,'#2180f3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-31 21:17:12
