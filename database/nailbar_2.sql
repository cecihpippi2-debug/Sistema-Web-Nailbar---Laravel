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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.agendamentos: ~20 rows (aproximadamente)
INSERT INTO `agendamentos` (`id`, `cliente_id`, `servico_id`, `data`, `hora`, `created_at`, `updated_at`) VALUES
	(1, 17, 7, '2026-02-22', '03:28:18', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(2, 1, 5, '2026-03-17', '21:26:16', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(3, 1, 4, '2026-09-04', '16:08:07', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(4, 3, 10, '2026-07-28', '10:10:54', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(5, 8, 8, '2026-09-11', '05:17:32', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(6, 2, 4, '2026-05-16', '23:21:50', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(7, 3, 5, '2026-07-03', '00:53:26', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(8, 2, 5, '2026-03-28', '02:15:43', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(9, 1, 2, '2026-04-15', '07:37:33', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(10, 4, 7, '2026-03-30', '19:20:56', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(11, 16, 1, '2026-05-09', '06:58:56', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(12, 18, 9, '2026-01-03', '10:06:31', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(13, 6, 9, '2026-08-07', '12:20:40', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(14, 6, 8, '2026-08-21', '20:56:51', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(15, 4, 10, '2026-05-25', '19:38:54', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(16, 1, 6, '2026-02-06', '03:09:16', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(17, 15, 2, '2026-10-29', '03:07:24', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(18, 9, 5, '2026-06-28', '06:20:29', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(19, 5, 5, '2026-11-05', '04:07:54', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(20, 1, 6, '2026-08-08', '18:12:52', '2026-05-06 21:50:47', '2026-05-06 21:50:47');

-- Copiando estrutura para tabela laravel.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.categorias: ~5 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nome`, `descricao`, `premium`, `created_at`, `updated_at`) VALUES
	(1, 'Decorações 4d', 'Odit corrupti esse est quia.', 1, '2026-05-06 21:50:47', '2026-05-06 21:58:24'),
	(2, 'Acessórios', 'Placeat est exercitationem dignissimos et totam necessitatibus.', 0, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(3, 'Esmaltes', 'Porro perspiciatis doloremque quo nobis repudiandae autem.', 0, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(5, 'Alicates', 'Alicates de metal', 0, '2026-05-08 19:02:33', '2026-05-08 19:02:56'),
	(6, 'Decoração', 'hgj', 0, '2026-05-08 22:16:43', '2026-05-08 22:16:43');

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
	(1, 'Leanne Satterfield', 'Cliente', '1996-11-11', '228-484-4515', 'qpadberg@schuster.biz', '880 Runolfsdottir IsleLake Daxton, OH 62459-0279', 'images/imagem_clientes/20260508101910.png', 'Maxime fuga dolor fugit et non.', '2026-05-06 21:50:47', '2026-05-08 22:10:10'),
	(2, 'Holly Beier PhD', 'Cliente', '2021-12-27', '1-215-343-1753', 'charlotte01@wisozk.com', '60266 Laney River\nJorgefurt, IA 95264-1528', NULL, 'Cupiditate eius asperiores error et facere delectus.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(3, 'Estefania Mills', 'Cliente', '2020-12-17', '+1 (920) 816-4250', 'adonis91@hotmail.com', '1844 Josiane Brook Suite 459\nNorth Nolanhaven, NV 94336-6740', NULL, 'Nihil alias cumque quo consequatur modi.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(4, 'Laurine McLaughlin', 'Cliente', '1999-04-04', '520.939.3510', 'garland.gaylord@schimmel.com', '748 Windler Extensions\nCassidyshire, FL 98142', NULL, 'Voluptatem facilis delectus similique temporibus ut harum.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(5, 'Mrs. Annalise Collier II', 'Cliente', '2003-12-29', '1-810-763-8420', 'edison.hill@berge.biz', '36247 Etha Plaza Suite 966\nNew Laurine, OR 87821-0137', NULL, 'Enim dignissimos et quidem nisi velit aliquam vitae.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(6, 'Muriel Herzog II', 'Cliente', '1983-09-05', '1-541-900-1464', 'elnora29@jenkins.biz', '801 Pouros Mountain Suite 913\nBraedenshire, MT 26098', NULL, 'Sed temporibus odit vel deserunt corporis.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(7, 'Athena Kemmer', 'Cliente', '2008-12-01', '(240) 649-0340', 'katrine39@hotmail.com', '649 Okuneva Via\nBrianneside, LA 14232-6325', NULL, 'Quas quos est fuga voluptatem suscipit voluptatem dolores et.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(8, 'Hoyt Gibson', 'Cliente', '2025-01-28', '(930) 985-6693', 'antonietta00@koelpin.com', '72235 Champlin Mountains\nPadbergport, WA 68004', NULL, 'Saepe non et incidunt sit vel.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(9, 'Ms. Ona Oberbrunner', 'Cliente', '1989-05-06', '(551) 656-5874', 'adeline35@yahoo.com', '9347 Lia Skyway\nLloydchester, NJ 98296-8278', NULL, 'Expedita iure deserunt earum cum nostrum.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(10, 'Giovanny Corwin', 'Cliente', '2023-04-15', '708-518-3377', 'llewellyn27@welch.com', '232 Runolfsson Springs Apt. 620\nSouth Jodiemouth, MT 27200-4667', NULL, 'Fuga modi voluptatem enim adipisci et tenetur.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(11, 'Katelin Howell Sr.', 'Cliente', '2005-06-04', '339.758.2777', 'mann.chris@hotmail.com', '30671 Crooks Ports\nPort Hobart, MO 67673', NULL, 'Occaecati sapiente quo dignissimos.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(12, 'Judah King', 'Cliente', '2019-09-26', '+1-260-253-0017', 'noemie.waters@hotmail.com', '588 Lakin Gateway\nTanyamouth, NH 44023', NULL, 'Quis qui et praesentium.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(13, 'Tianna Schmeler', 'Cliente', '1970-07-26', '+1-720-267-4776', 'npouros@gmail.com', '55117 Grimes Lights Suite 924\nCassinchester, MS 93232-4457', NULL, 'Rerum laborum quia animi.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(14, 'Prof. Marian Casper IV', 'Cliente', '2002-06-11', '(323) 537-5799', 'shawna45@paucek.com', '4634 Erich Wells Apt. 634\nNorth Taya, NH 68391-8284', NULL, 'Omnis possimus recusandae vitae sint non dolorum.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(15, 'Malika Stokes', 'Cliente', '1997-05-14', '352.537.3914', 'rhartmann@hotmail.com', '11197 Wilkinson Heights Apt. 737\nNorth Jeffereyfort, GA 18661', NULL, 'Corporis distinctio qui vitae nam aut doloremque.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(16, 'Mrs. Maurine Marks', 'Cliente', '2024-03-18', '+1.743.584.2442', 'kailyn76@dicki.com', '2055 Delta Parks\nMarquiseside, ME 49381-5002', NULL, 'Omnis et officia est enim.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(17, 'Dominique Brekke', 'Cliente', '1985-07-11', '769.901.6545', 'stephen.connelly@gmail.com', '690 Palma Extension Suite 100\nGermanshire, NE 82830-8705', NULL, 'Et earum fugiat molestias ea tenetur ipsam quis.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(18, 'Izaiah Crooks', 'Cliente', '2016-02-16', '1-743-769-0158', 'effertz.gardner@yahoo.com', '43577 Baumbach Passage Apt. 226\nEast Perry, MT 54146', NULL, 'Maiores quis officia ab laboriosam perspiciatis fugiat.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(19, 'Foster Keeling', 'Cliente', '1989-12-23', '918-960-5748', 'gust75@kunde.org', '161 Sporer Ville\nWest Brice, MN 79736-0997', NULL, 'Et consequuntur deserunt eos maiores est.', '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(20, 'Prof. Matilde Hand IV', 'Cliente', '2019-10-24', '1-252-862-0424', 'hlemke@wolff.org', '182 Brekke Dale Suite 501\nNew Marleyport, MT 24281-1756', NULL, 'Quia exercitationem molestiae sed autem aut beatae.', '2026-05-06 21:50:47', '2026-05-06 21:50:47');

-- Copiando estrutura para tabela laravel.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` int NOT NULL,
  `preco` double(8,2) DEFAULT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estoque_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `estoque_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.estoque: ~21 rows (aproximadamente)
INSERT INTO `estoque` (`id`, `nome`, `descricao`, `quantidade`, `preco`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'quia', 'Culpa sunt pariatur perspiciatis at dolores quibusdam.', 91, 19.06, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(2, 'officiis', 'Commodi harum necessitatibus incidunt qui cum.', 83, 25.77, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(3, 'magnam', 'Quod reprehenderit iste tempore explicabo.', 40, 32.75, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(4, 'quam', 'Et cum id sit ducimus rerum.', 1, 28.98, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(5, 'qui', 'Neque odit quaerat magni rerum placeat dolorem illum.', 90, 15.81, 1, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(6, 'qui', 'Sunt molestias natus iusto omnis dolorum.', 14, 11.17, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(7, 'facere', 'Tempore vero magni voluptas accusamus rerum iusto.', 18, 7.80, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(8, 'sapiente', 'Et dolore rem quia consequatur ducimus amet itaque reprehenderit.', 10, 17.18, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(9, 'minima', 'Quia rerum molestias quisquam harum ex ad.', 15, 34.04, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(10, 'porro', 'Nihil error animi nobis ex dolorum amet et.', 71, 5.15, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(11, 'cum', 'Labore minima assumenda ad porro in et.', 36, 30.55, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(12, 'consequatur', 'Blanditiis officia et minima ut iste.', 91, 37.38, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(13, 'et', 'Quidem suscipit veniam sit a provident.', 35, 49.89, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(15, 'occaecati', 'Rem molestiae dolor at error et veritatis soluta.', 100, 29.58, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(16, 'minus', 'Quae eius soluta hic aut debitis et quam.', 32, 35.68, 1, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(17, 'aut', 'Vel magnam neque et necessitatibus ipsa dolores.', 69, 38.69, 3, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(18, 'perferendis', 'Eos impedit velit ut.', 45, 2.03, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(20, 'debitis', 'Rerum dicta doloremque minima qui.', 32, 48.76, 2, '2026-05-06 21:50:47', '2026-05-06 21:50:47'),
	(21, 'Esmalte magnético Vermelho vinho', 'Esmalte magnético Vermelho vinho', 20, 30.00, 3, '2026-05-06 21:54:04', '2026-05-06 21:54:04'),
	(24, 'Alicate Ricca', 'Alicate de precisão Ricca', 10, 60.00, 5, '2026-05-08 19:03:38', '2026-05-08 19:03:38'),
	(25, 'Hello Kitty', NULL, 60, 20.00, 1, '2026-05-08 21:59:30', '2026-05-08 21:59:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2026_03_08_162939_clientes', 1),
	(6, '2026_03_11_105105_categoria_img_clientes_table', 1),
	(7, '2026_03_11_191349_servicos', 1),
	(8, '2026_03_11_191356_agendamentos', 1),
	(9, '2026_03_26_223622_add_cliente_id_to_servicos_table', 1),
	(10, '2026_04_29_185748_create_categoria_estoques_table', 1),
	(11, '2026_04_29_185748_create_estoques_table', 1);

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
	(1, 'Alongamento em Gel', 'Quia fugiat quia molestiae ad.', 117.73, 'images/imagem_servicos/20260508181158.jpg', 1, 0, '2026-05-06 21:50:47', '2026-05-08 14:18:58', 11),
	(2, 'Nail Art 3D', 'Et ut ratione perspiciatis quaerat eveniet.', 79.80, 'images/imagem_servicos/20260508201112.jpg', 1, 0, '2026-05-06 21:50:47', '2026-05-08 14:20:12', 12),
	(3, 'Alongamento em Gel', 'Voluptas assumenda sunt nihil voluptate consequuntur.', 36.89, 'images/imagem_servicos/20260508191109.jpg', 1, 0, '2026-05-06 21:50:47', '2026-05-08 14:19:09', 13),
	(4, 'Nail Art 3D', 'Quis odio esse et occaecati.', 101.50, 'images/imagem_servicos/20260508201127.jpg', 1, 0, '2026-05-06 21:50:47', '2026-05-08 14:20:27', 14),
	(5, 'Manutenção de Gel', 'Ut voluptatem vel recusandae ullam deleniti et cupiditate nemo.', 44.44, 'images/imagem_servicos/20260508191119.jpg', 1, 1, '2026-05-06 21:50:47', '2026-05-08 14:19:19', 15),
	(6, 'Nail Art 3D', 'Molestiae voluptate aut at facilis.', 46.55, 'images/imagem_servicos/20260508201142.jpg', 1, 1, '2026-05-06 21:50:47', '2026-05-08 14:20:42', 16),
	(7, 'Nail Art 3D', 'Tempore aut nobis excepturi ea corrupti.', 84.10, 'images/imagem_servicos/20260508191131.png', 0, 0, '2026-05-06 21:50:47', '2026-05-08 14:19:31', 17),
	(8, 'Pedicure', 'Earum numquam quam velit odio nobis.', 51.88, 'images/imagem_servicos/20260508201154.jpg', 1, 0, '2026-05-06 21:50:47', '2026-05-08 14:20:54', 18),
	(9, 'Pedicure', 'Assumenda voluptatem illo dicta laudantium in explicabo neque.', 138.43, 'images/imagem_servicos/20260508191159.jpg', 1, 1, '2026-05-06 21:50:47', '2026-05-08 14:19:59', 19),
	(10, 'Pedicure', 'Debitis ea quia ut ut iure est hic.', 145.90, 'images/imagem_servicos/20260508211108.png', 0, 0, '2026-05-06 21:50:47', '2026-05-08 14:21:08', 20);

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
