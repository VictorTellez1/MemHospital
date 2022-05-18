-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (2,'Ginecologo','principales/MugL1XAybarIyZKzDVYsHGZylSMfvtgsf0yljskk.jpg','El ginecólogo es un especialista en enfermedades de la mujer, es decir, aquellas relacionadas con los genitales internos y externos, incluyendo mamas, y además desempeñan un rol fundamental en medicina preventiva, mediante la promoción de la salud en mujeres aparentemente sanas.','ginecologo','2022-04-20 06:21:47','2022-04-22 03:45:25'),(3,'Pediatra','principales/Bn9h1OmCnjOmCeejO9kyUdeYP9lOmqYo66fKYguj.jpg','El pediatra es un médico que se especializa en el cuidado de bebés, niños y adolescentes. Todo médico debe completar cuatro años de estudio en la facultad de medicina. Para especializarse en pediatría, debe completar tres años más de formación.','pediatra','2022-04-20 06:37:27','2022-04-20 06:37:27'),(4,'Urologo','principales/BD4jbawn4XV3He9Q58aCxXJL5IfMFPhPi05wiAA3.jpg	','La Urología es la especialidad médico quirúrgica que se encarga de la prevención, diagnóstico y tratamiento de enfermedades morfológicas renales, de las del aparato urinario y retro-peritoneo que afectan a ambos sexos, así como las enfermedades del aparato genital masculino, sin diferencia de edad','urologo','2022-04-20 06:38:52','2022-04-20 06:38:52'),(5,'Dermatologo','principales/gAgIl3CZyZ51zqvVXw6NYKdUV142XTkH8iUzxS0b.webp','El dermatólogo es el encargado de estudiar las enfermedades que afectan a la piel (el órgano más extenso del cuerpo humano), su tratamiento y prevención.','dermatologo','2022-04-20 06:40:46','2022-04-20 06:40:46'),(6,'Cirujano','principales/mWDmYNzchRZMCOKaJf45q4Uy49DbKqtrv50BJr21.webp','Operar pacientes para corregir deformidades, reparar lesiones, prevenir y tratar enfermedades, o mejorar o restaurar las funciones del paciente. Cumplir con las técnicas quirúrgicas establecidas durante la operación. Prescribir tratamientos y procedimientos preoperativos y postoperativos.','cirujano','2022-04-20 06:42:21','2022-04-20 06:42:21'),(7,'Cardiólogo','principales/Wu17WvqfKKHlMxH230vn63J9kFAQYo2vH6Awqwso.webp','Los cardiólogos son médicos que se especializan en el diagnóstico y tratamiento de las enfermedades del corazón y los vasos sanguíneos: el aparato cardiovascular.','cardiologo','2022-04-20 06:44:13','2022-04-20 06:44:13');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `doctors_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'Gloria','Pennyllardo','principales/0vybnSuvfXYDjC7NFv1js2t6sSpve1Ey4K7RVJn9.jpg','Penny-Amor1234',2,'2022-04-20 10:13:54','2022-05-17 05:19:20'),(2,'Victor','Tellez','principales/GiSYjAX0ikCC4h98rfDfuuqA7yg2DggE1vAj2Ffu.jpg	','123456789',2,'2022-04-20 10:16:02','2022-04-20 10:16:02'),(3,'Samantha','Ramirez','principales/PHaWflnWbhohvryqHfM1NH12EpOjAEKPX4FGBYad.jpg','123456789',3,'2022-04-20 10:16:50','2022-04-20 10:16:50'),(4,'Alfonso','Gimenez	','principales/5QjaxzX7CnzUatRLPibFKQxlOiQFxLFMAJTlqr3R.jpg','123456789',3,'2022-04-20 10:17:20','2022-04-20 10:17:20'),(5,'Pedrito','Sola','principales/xRVEduwZpPQPaByTtAeCRzP9qL1kCkGBwjYpN8GR.jpg','123456789',4,'2022-04-20 10:19:07','2022-04-20 10:18:07'),(6,'Juan','Lopez','principales/wDvS67MrY39Plg9DILwx8f1IU1dTrTJLb4mnYdnr.jpg	','123456789',4,'2022-04-20 10:19:07','2022-04-20 10:20:00'),(7,'Valentina','Fernandez','principales/abPtZIBfdDdFnJL8a10N1rD9IsVX6od2MzXl7EJN.jpg','123456789',5,'2022-04-20 10:20:00','2022-05-17 05:18:50'),(8,'Leonardo','Ximenez','principales/NrJDheQxj6jRJbAPW7MJvQ0c5egrdL3UAWzf77ZT.png','123456789',5,'2022-04-20 10:20:38','2022-04-20 10:20:38'),(9,'Memo','Lopez','principales/X7imxNNh7h0F40MWb3ZBV4DGpN9aw0MSOnpSTvWN.webp','123456789',6,'2022-04-20 10:21:17','2022-04-20 10:21:17'),(10,'Jaimito','Hernandez','principales/J6cMZkkn2SmuTPgxQE79YhEvH3U9uxRKiSMLEF8Q.jpg','123456789',6,'2022-04-20 10:21:44','2022-04-20 10:21:44'),(11,'Raul','Gongorra','principales/T8uowT2SvjkbZQBcjGRQKzyvTix2xOBTIBOU3q7a.jpg','123456789',7,'2022-04-20 10:22:24','2022-04-20 10:22:24'),(12,'Laura','Rodriguez','principales/xK7gRUsNasegArG5mtlePXAUVLKJIMLxELxXbO0E.jpg','123456789',7,'2022-04-20 10:22:53','2022-04-20 10:22:53');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospitals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospitals`
--

LOCK TABLES `hospitals` WRITE;
/*!40000 ALTER TABLE `hospitals` DISABLE KEYS */;
INSERT INTO `hospitals` VALUES (1,'HospitalPenny','Calle Condominio 5 55','Unidad Habitacional Sitio 217','19.60652001183783','-99.26900998655195','123456789','6acec3d7-0bed-4a4c-a077-deef58f6c14d','2022-04-21 09:06:32','2022-04-21 09:06:32');
/*!40000 ALTER TABLE `hospitals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `establecimiento` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` VALUES (27,'6acec3d7-0bed-4a4c-a077-deef58f6c14d','hospital/vKOZLXoBX7ubJpMm7Q1FBcP6pcEWHeDzVan9AuT3.jpg','2022-04-21 09:01:19','2022-04-21 09:01:19'),(28,'6acec3d7-0bed-4a4c-a077-deef58f6c14d','hospital/J5j6hyX3GsyawWs3uVcO53nfbLVyqlLSApdKTly9.jpg','2022-04-21 09:01:20','2022-04-21 09:01:20'),(29,'6acec3d7-0bed-4a4c-a077-deef58f6c14d','hospital/OVNwUapdp2k5bVNjdHDcqqK9CsXySSeMAN1mt1A0.jpg','2022-04-21 09:01:21','2022-04-21 09:01:21'),(30,'6acec3d7-0bed-4a4c-a077-deef58f6c14d','hospital/foyTTuDgJK1k2fSqgNiOeyGkXEsmGHcNMrVJqXGs.jpg','2022-04-21 09:01:24','2022-04-21 09:01:24'),(31,'6acec3d7-0bed-4a4c-a077-deef58f6c14d','hospital/9Ep86icquLdvxR1wlRw2BgvZKAKD01St3Tz8GaC1.jpg','2022-04-21 09:01:27','2022-04-21 09:01:27');
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_04_19_231415_create_categorias_table',1),(6,'2022_04_21_020945_create_imagens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Victor','admin@admin.com','2022-04-21 07:15:12','$2y$10$EIu7gRYq24znGUh7ASxFE.WV8hfCCIlp3dFxw6erYEJHg5iH3ZA0u',NULL,'2022-04-21 07:15:12','2022-04-21 07:15:12'),(2,'iviggar','victor-pumas69@live.com.mx',NULL,'$2y$10$GdQ2Qj.gT.oSMruQg2X/TO1hxoLcL/FY9WsKl.GeAvusFNyjNaTOi',NULL,'2022-04-23 06:22:27','2022-04-23 06:22:27');
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

-- Dump completed on 2022-05-18 13:38:44
