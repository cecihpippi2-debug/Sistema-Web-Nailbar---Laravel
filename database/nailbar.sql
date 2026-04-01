-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Copiando estrutura para tabela laravel.agendamentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint unsigned NOT NULL,
  `servico_id` bigint unsigned NOT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamentos_cliente_id_foreign` (`cliente_id`),
  KEY `agendamentos_servico_id_foreign` (`servico_id`),
  CONSTRAINT `agendamentos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `agendamentos_servico_id_foreign` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.agendamentos: ~3 rows (aproximadamente)
INSERT INTO `agendamentos` (`id`, `cliente_id`, `servico_id`, `data`, `hora`, `created_at`, `updated_at`) VALUES
	(1, 14, 4, '1981-12-05', '03:46:55', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(2, 6, 6, '2007-08-31', '17:48:16', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(3, 18, 4, '1989-04-14', '09:12:16', '2026-04-01 23:58:30', '2026-04-01 23:58:30');

-- Copiando estrutura para tabela laravel.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.clientes: ~20 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `nome`, `categoria`, `data_nascimento`, `telefone`, `email`, `endereco`, `imagem`, `observacoes`, `created_at`, `updated_at`) VALUES
	(1, 'Dr. Mack Fritsch PhD', 'Cliente', '1979-09-06', '+1.830.981.6217', 'aurelie88@senger.com', '987 Murphy Road\nIsabellchester, RI 44433-5657', NULL, 'Voluptatum repellat natus et ut et ad.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(2, 'Selina Doyle II', 'Cliente', '1990-04-12', '360-906-3172', 'buck.torp@considine.com', '98036 Grant Greens\nLebsackside, LA 49961', NULL, 'Sint neque maxime dolores nostrum voluptas corporis.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(3, 'Dr. Maureen Kozey', 'Cliente', '1989-05-14', '669-827-8155', 'marks.benjamin@braun.com', '7182 Orval Junction\nAdamsborough, WV 66234', NULL, 'Quibusdam eaque nihil occaecati.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(4, 'Eliseo Crist', 'Cliente', '1978-12-17', '430.962.1100', 'talon84@hotmail.com', '96928 Rutherford Cape Suite 070\nBrownbury, OK 17908', NULL, 'Dolorum et eius consequatur.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(5, 'Madisyn Crona', 'Cliente', '1984-01-13', '+1.469.909.8630', 'turner.henderson@murphy.org', '9260 Scotty Mill\nKevenside, GA 16242-5983', NULL, 'Adipisci autem autem delectus ad doloribus.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(6, 'Mr. Malcolm Emmerich', 'Cliente', '1978-10-14', '+1-820-942-3015', 'rosalia.greenholt@crona.com', '7847 Reichel Summit\nNorth Monatown, UT 83378-0857', NULL, 'Commodi et molestiae omnis ut dolores.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(7, 'Burley Sipes', 'Cliente', '1999-02-17', '539-469-1860', 'padberg.concepcion@hill.com', '1844 Shanon Mill\nFeeneyside, OR 28935-5305', NULL, 'Veritatis quia consequuntur expedita eius.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(8, 'Dr. Faustino Klein III', 'Cliente', '2005-05-03', '+17137834298', 'bhalvorson@yahoo.com', '937 Weber Lakes\nJohnpaulshire, ME 49822-3857', NULL, 'Labore voluptates debitis dolor neque nam.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(9, 'Noemi Heaney', 'Cliente', '2009-03-16', '1-651-442-0397', 'mose79@hotmail.com', '580 Jovani Coves Suite 962\nPort Esther, VA 85265-1021', NULL, 'Est voluptas dolor repellat quaerat id dolore explicabo.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(10, 'Colin Christiansen', 'Cliente', '1975-11-25', '+1-979-252-4031', 'jkautzer@jones.biz', '5300 Herman Valleys Apt. 178\nTyshawnmouth, NV 75612', NULL, 'Rerum omnis optio et.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(11, 'Carlie Gulgowski', 'Cliente', '1993-11-15', '(279) 804-2562', 'xheathcote@koch.com', '858 Rickey Tunnel Apt. 863\nGrahamside, NC 85737', NULL, 'Deserunt suscipit consequatur voluptatem et consequatur sit magnam.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(12, 'Hazel Koelpin', 'Cliente', '1986-03-30', '+1.223.904.7088', 'liam.herman@schneider.com', '89661 Krystina Ways Suite 837\nWest Enos, AR 49613', NULL, 'At vitae repellat tempore sunt dolor facere.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(13, 'Karson Schowalter', 'Cliente', '2011-04-25', '(601) 467-4698', 'dthiel@white.org', '3894 McCullough Center\nNew Ewell, VT 18705-9057', NULL, 'Earum sed est vitae.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(14, 'Araceli Cassin V', 'Cliente', '2013-02-22', '+1-612-822-4450', 'hand.luciano@hotmail.com', '94152 Quigley Estate Suite 220\nWest Marcelina, OH 62575-5652', NULL, 'Nobis qui eum distinctio aut.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(15, 'Mr. Benny Collier III', 'Cliente', '2015-11-02', '1-252-730-3312', 'lconsidine@yahoo.com', '83382 Kihn Ranch\nSouth Elda, NH 93495-8794', NULL, 'Eum reiciendis rerum iure cum.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(16, 'Fabian Marquardt III', 'Cliente', '1970-03-31', '838-401-5630', 'whane@pfannerstill.com', '444 Conn Extensions Apt. 272\nSchroederland, ME 40416', NULL, 'Optio perferendis eum voluptatibus aut dicta occaecati ut.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(17, 'Alison Daugherty', 'Cliente', '2017-10-11', '1-325-743-0824', 'preston50@kemmer.com', '19975 Hilpert Lodge\nFranceschester, SD 61782', NULL, 'Consequatur quis non qui voluptas.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(18, 'Edgardo Murazik III', 'Cliente', '2010-01-10', '+1-434-444-5812', 'cswift@yahoo.com', '33517 Doug Orchard Suite 331\nCharleyside, TN 15351', NULL, 'Quo quia accusamus consequatur sed est.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(19, 'Marcelina Mohr DVM', 'Cliente', '1996-09-23', '+19896376349', 'friedrich.rutherford@grady.com', '52445 Rogahn Point Apt. 601\nLake Carissa, RI 32458', NULL, 'Explicabo corrupti culpa velit.', '2026-04-01 23:58:30', '2026-04-01 23:58:30'),
	(20, 'Jewell Batz', 'Cliente', '1971-04-25', '1-484-890-2067', 'xbernhard@hintz.com', '541 Pfeffer Falls Suite 034\nWest Darwinville, CT 73169-1091', NULL, 'Rerum accusamus recusandae aliquid.', '2026-04-01 23:58:30', '2026-04-01 23:58:30');

-- Copiando estrutura para tabela laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2026_03_08_162939_clientes', 1),
	(6, '2026_03_11_105105_categoria_img_clientes_table', 1),
	(7, '2026_03_11_191349_servicos', 1),
	(8, '2026_03_11_191356_agendamentos', 1),
	(9, '2026_03_26_223622_add_cliente_id_to_servicos_table', 1);

-- Copiando estrutura para tabela laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `preco` double(8,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decoracao_3d` tinyint(1) NOT NULL DEFAULT '0',
  `esmalte_especial` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cliente_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servicos_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `servicos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.servicos: ~10 rows (aproximadamente)
INSERT INTO `servicos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `decoracao_3d`, `esmalte_especial`, `created_at`, `updated_at`, `cliente_id`) VALUES
	(1, 'Manicure Tradicional', 'Reprehenderit tempore possimus quia optio velit.', 88.05, NULL, 0, 1, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 11),
	(2, 'Alongamento em Gel', 'Sit animi omnis quidem nesciunt dolor.', 81.50, NULL, 0, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 12),
	(3, 'Manicure Tradicional', 'Eos odit praesentium aut voluptas ullam provident ex.', 86.46, NULL, 0, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 13),
	(4, 'Spa dos Pés', 'Ab et et sed eum molestias non.', 59.62, NULL, 1, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 14),
	(5, 'Manutenção de Gel', 'Quis ipsum nesciunt tenetur neque.', 32.71, NULL, 1, 1, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 15),
	(6, 'Alongamento em Gel', 'Iste quo minus quos saepe.', 117.43, NULL, 0, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 16),
	(7, 'Manutenção de Gel', 'Consequatur possimus sapiente laudantium non voluptatem quam tenetur sapiente.', 143.96, NULL, 0, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 17),
	(8, 'Nail Art 3D', 'Facere labore corrupti quas praesentium.', 41.02, NULL, 1, 0, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 18),
	(9, 'Nail Art 3D', 'Qui voluptatem doloremque earum commodi.', 107.88, NULL, 1, 1, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 19),
	(10, 'Alongamento em Gel', 'Voluptatem rerum numquam et amet.', 35.73, NULL, 1, 1, '2026-04-01 23:58:30', '2026-04-01 23:58:30', 20);

-- Copiando estrutura para tabela laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
