-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 juin 2023 à 09:30
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taskwizard`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `ranking` int NOT NULL,
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id_task`, `title`, `description`, `date_creation`, `is_completed`, `ranking`) VALUES
(1, 'Promener le chien', 'Faire faire caca au iench', '2023-06-28 08:11:13', 0, 1),
(2, 'Laver la vaisselle', 'Lecher les assiettes', '2023-06-27 07:15:18', 0, 2),
(3, 'Faire les courses', 'Acheter des légumes et du lait', '2023-06-27 07:21:14', 0, 1),
(4, 'Préparer la réunion', 'Créer l\'ordre du jour et les documents', '2023-06-27 05:20:22', 0, 3),
(5, 'Faire de l\'exercice', 'Faire 30 minutes de jogging', '2023-06-27 11:21:18', 1, 1),
(6, 'Répondre aux e-mails', 'Vérifier et répondre aux e-mails importants', '2023-06-27 06:18:21', 0, 5),
(7, 'Nettoyer la maison', 'Aspirer et dépoussiérer toutes les pièces', '2023-06-27 06:36:20', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
