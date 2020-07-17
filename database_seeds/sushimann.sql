-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 juil. 2020 à 17:38
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sushimann`
--
CREATE DATABASE IF NOT EXISTS `sushimann` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sushimann`;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_admin_name_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `allergenes`
--

DROP TABLE IF EXISTS `allergenes`;
CREATE TABLE IF NOT EXISTS `allergenes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `allergenes`
--

INSERT INTO `allergenes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(9, 'soja', NULL, NULL),
(8, 'oeuf', NULL, NULL),
(6, 'lait', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Plateaux', NULL, NULL),
(2, 'Formules du midi', NULL, NULL),
(10, 'Carte', NULL, NULL),
(7, 'Les desserts', NULL, NULL),
(11, 'Boissons', NULL, NULL),
(9, 'Accompagnements', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `panier` longtext NOT NULL,
  `paiement_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `adresse`, `panier`, `paiement_id`, `date`) VALUES
(1, 'BARBIE', NULL, 'O:10:\"App\\Panier\":3:{s:5:\"items\";a:1:{i:34;a:6:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"34\";s:12:\"product_name\";s:7:\"Combo A\";s:13:\"product_price\";s:4:\"9.00\";s:13:\"product_image\";s:22:\"combo_a_1591712165.jpg\";s:4:\"item\";O:8:\"stdClass\":10:{s:2:\"id\";i:34;s:11:\"nom_produit\";s:7:\"Combo A\";s:4:\"prix\";s:4:\"9.00\";s:9:\"categorie\";s:8:\"Plateaux\";s:13:\"product_image\";s:22:\"combo_a_1591712165.jpg\";s:19:\"description_produit\";s:68:\"1 Témaki Saumon Avocat et \r\n\r\n1 Témaki Tartare Thon épicé Avocat\";s:10:\"allergenes\";s:1:\" \";s:6:\"status\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";N;}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:9;}', 'ch_1Gzi36G4vtl0CqE0eMat5ycC', '2020-06-30 12:03:38'),
(2, 'Guilgori', NULL, 'O:10:\"App\\Panier\":3:{s:5:\"items\";a:2:{i:45;a:6:{s:3:\"qty\";s:1:\"1\";s:10:\"product_id\";s:2:\"45\";s:12:\"product_name\";s:5:\"Tulip\";s:13:\"product_price\";s:4:\"3.00\";s:13:\"product_image\";s:20:\"tulip_1591781082.png\";s:4:\"item\";O:8:\"stdClass\":10:{s:2:\"id\";i:45;s:11:\"nom_produit\";s:5:\"Tulip\";s:4:\"prix\";s:4:\"3.00\";s:9:\"categorie\";s:5:\"Carte\";s:13:\"product_image\";s:20:\"tulip_1591781082.png\";s:19:\"description_produit\";s:44:\"Tulip concombre cheese ciboulette, 2 pièces\";s:10:\"allergenes\";s:1:\" \";s:6:\"status\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}}i:33;a:6:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"33\";s:12:\"product_name\";s:16:\"Plateau Harmonie\";s:13:\"product_price\";s:5:\"16.90\";s:13:\"product_image\";s:31:\"plateau harmonie_1591712113.jpg\";s:4:\"item\";O:8:\"stdClass\":10:{s:2:\"id\";i:33;s:11:\"nom_produit\";s:16:\"Plateau Harmonie\";s:4:\"prix\";s:5:\"16.90\";s:9:\"categorie\";s:8:\"Plateaux\";s:13:\"product_image\";s:31:\"plateau harmonie_1591712113.jpg\";s:19:\"description_produit\";s:32:\"5 Sushis Saumon\r\n\r\n5 Sushis Thon\";s:10:\"allergenes\";s:1:\" \";s:6:\"status\";i:1;s:10:\"created_at\";N;s:10:\"updated_at\";N;}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:19.9;}', 'ch_1H2wmKG4vtl0CqE0c9PapRTq', '2020-07-09 10:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_26_103413_create_categories_table', 1),
(4, '2020_05_26_105221_create_produits_table', 2),
(5, '2020_05_26_135054_create_allergenes_table', 3),
(6, '2020_06_08_150956_create_subcategories_table', 4),
(7, '2014_10_12_100000_create_password_resets_table', 5),
(8, '2020_06_10_143143_create_admins_table', 5),
(9, '2020_06_18_071238_create_permission_tables', 6),
(10, '2020_07_14_090244_create_rgpds_table', 7),
(11, '2020_07_14_092943_rename_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 19),
(2, 'App\\User', 18);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$OAej3GoGvKwmjn5juMBjqe.7b0GrQDIaksMDp/1Fzm5ZogdVKTijq', '2020-06-18 23:17:31'),
('dev4.ts4@gmail.com', '$2y$10$zPmnn0PBVwCrbJlyLsoF/eXi9BBZP3y4RDuz1YFhlGd8KAF1SMpN2', '2020-06-22 00:10:16'),
('dev5.ts5@gmail.com', '$2y$10$CqKxjVkRnqSlQgkokQGtGOg0CBrFrPVpPzkb34QlxIxzu7vhyCJhm', '2020-06-21 23:10:22');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Rôle-liste', 'web', '2020-06-19 01:35:58', '2020-06-19 01:35:58'),
(2, 'Rôle-créer', 'web', '2020-06-19 01:35:58', '2020-06-19 01:35:58'),
(3, 'Rôle-éditer', 'web', '2020-06-19 01:35:58', '2020-06-19 01:35:58'),
(4, 'Rôle-supprimer', 'web', '2020-06-19 01:35:58', '2020-06-19 01:35:58'),
(5, 'Produit-liste', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(6, 'Produit-créer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(7, 'Produit-éditer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(8, 'Produit-supprimer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(9, 'Catégorie-liste', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(10, 'Catégorie-créer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(11, 'Catégorie-éditer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(12, 'Catégorie-supprimer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(13, 'Slider-liste', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(14, 'Slider-créer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(15, 'Slider-éditer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(16, 'Slider-supprimer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(17, 'Allergène-liste', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(18, 'Allergène-créer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(19, 'Allergène-éditer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(20, 'Allergène-supprimer', 'web', '2020-06-19 01:40:28', '2020-06-19 01:40:28'),
(21, 'Slider-Statut', 'web', '2020-06-19 01:58:11', '2020-06-19 01:58:11'),
(22, 'Produit-Statut', 'web', '2020-06-19 04:25:59', '2020-06-19 04:25:59'),
(23, 'Utilisateurs-liste', 'web', '2020-06-19 04:40:46', '2020-06-19 04:40:46'),
(24, 'Utilisateurs-créer', 'web', '2020-06-19 04:40:46', '2020-06-19 04:40:46'),
(25, 'Utilisateurs-éditer', 'web', '2020-06-19 04:40:46', '2020-06-19 04:40:46'),
(26, 'Utilisateurs-supprimer', 'web', '2020-06-19 04:40:46', '2020-06-19 04:40:46');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_produit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergenes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `prix`, `categorie`, `product_image`, `description_produit`, `allergenes`, `status`, `created_at`, `updated_at`) VALUES
(32, 'Plateau Duo', '13.80', 'Plateaux', 'plateau duo_1591712063.jpg', '6 Sushis Saumon \r\n\r\n6 California Hot', ' soja', 0, NULL, NULL),
(33, 'Plateau Harmonie', '16.90', 'Plateaux', 'plateau harmonie_1591712113.jpg', '5 Sushis Saumon\r\n\r\n5 Sushis Thon', ' ', 1, NULL, NULL),
(34, 'Combo A', '9.00', 'Plateaux', 'combo_a_1591712165.jpg', '1 Témaki Saumon Avocat et \r\n\r\n1 Témaki Tartare Thon épicé Avocat', ' ', 1, NULL, NULL),
(35, 'ComboD +2 accompagnements', '11.90', 'Formules du midi', 'combo_d_1591712259.jpg', '6 Californias Apple\r\n\r\n6 Makis avocat\r\n\r\n6 Makis Chêvre frais Tomate séchée', ' ', 1, NULL, NULL),
(40, 'Salade de carotte au confit de mangue', '2.50', 'Accompagnements', 'carotte_1591712582.jpg', 'Carotte rapée, \r\n\r\nConfit de mangue maison, \r\n\r\nJus d\'orange', ' ', 1, NULL, NULL),
(41, 'Riz Vinaigré', '2.50', 'Accompagnements', 'algue_1591712619.png', 'Riz Bio Vinaigré, le plein de saveur.', ' ', 1, NULL, NULL),
(42, 'mangue fraiche', '3.50', 'Les desserts', 'mangue_1591712665.jpg', 'Savoureux dés de mangue fraiche', ' ', 1, NULL, NULL),
(43, '2 perles de Coco', '4.00', 'Les desserts', 'coco_1591712717.jpg', 'Perles de coco à la cacahuette, à tièdir légèrement.', 'oeuf,lait', 1, NULL, NULL),
(44, 'Nougat', '2.50', 'Les desserts', 'nougat_1591712772.jpg', 'Petite bouchée sucrée enrobée de grain de sésame', ' ', 1, NULL, NULL),
(45, 'Tulip', '3.00', 'Carte', 'tulip_1591781082.png', 'Tulip concombre cheese ciboulette, 2 pièces', ' ', 0, NULL, NULL),
(46, 'Tulip massago', '4.00', 'Carte', 'tulip-massago_1591782573.jpg', 'Tulip concombre massago 2 pièces', ' soja', 1, NULL, NULL),
(47, 'Combo B', '9.90', 'Plateaux', 'combo_b_1591783865.jpg', '4 Sushis Saumon, 6 Californias Saumon Avocat', ' ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rgpd`
--

DROP TABLE IF EXISTS `rgpd`;
CREATE TABLE IF NOT EXISTS `rgpd` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentMessage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rgpd`
--

INSERT INTO `rgpd` (`id`, `prenom`, `nom`, `email`, `consentMessage`, `created_at`, `updated_at`) VALUES
(1, 'Yulliha', 'Dudont', 'admin@msushi.com', 'on', NULL, NULL),
(2, 'Yulliha', 'Dudont', 'admin@msushi.com', 'Dans le cadre de la réglementation sur la protection des données, j\'accepte d\'être contacté(e) par email et téléphone.', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'manager', 'web', '2020-06-19 06:14:11', '2020-06-19 06:14:11');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(24, 1),
(25, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description1` varchar(191) DEFAULT NULL,
  `description2` varchar(191) DEFAULT NULL,
  `slider_image` varchar(191) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sliders`
--

INSERT INTO `sliders` (`id`, `description1`, `description2`, `slider_image`, `status`) VALUES
(5, 'Bienvenue sur notre nouveau site', NULL, 'cover-1_1591022592.jpg', 1),
(4, NULL, NULL, 'cover-2_1591022563.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `categorie`, `subcategoryname`, `created_at`, `updated_at`) VALUES
(3, 'Plateaux', 'Combos', NULL, NULL),
(4, 'Plateaux', 'Plateaux', NULL, NULL),
(5, 'Formules du midi', 'Plateaux Midi', NULL, NULL),
(6, 'Formules du midi', 'Combos Midi', NULL, NULL),
(7, 'Carte', 'Tulip', NULL, NULL),
(8, 'Carte', 'Maki', NULL, NULL),
(9, 'Accompagnements', 'Salade', NULL, NULL),
(12, 'Les desserts', 'Fruits', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'luc', 'luc@gmail.com', NULL, '$2y$10$G9j1bRZjiNfiERJ3.VoQdegw4NukrwiwRI3VaQN4c6F.ytbWc3pey', NULL, '2020-07-16 09:38:57', '2020-07-16 09:38:57'),
(18, 'manager', 'manager@gmail.com', NULL, '$2y$10$0LbhmCKZomZ4Ui3FFFh2ieLuqo4ZOGQlO9sqzT/v9Ys7ovJX9y5yy', NULL, '2020-06-22 00:30:37', '2020-06-22 00:30:37'),
(19, 'Admin', 'admin@msushi.com', NULL, '$2y$10$8ri3Z0R0CUqrZ18VcFNMUOob3aabDu62m9OkBG8iMABGtmuDJFgre', NULL, '2020-06-22 22:47:03', '2020-06-22 22:47:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
