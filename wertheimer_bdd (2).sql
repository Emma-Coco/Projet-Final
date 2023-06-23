-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 23 juin 2023 à 05:27
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wertheimer_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `action_entretien`
--

CREATE TABLE `action_entretien` (
  `id` int(11) NOT NULL,
  `entretien_user_id` int(11) DEFAULT NULL,
  `desciption` varchar(200) DEFAULT NULL,
  `etat_dentretien` varchar(100) DEFAULT NULL,
  `id_booking` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `entretien_status` varchar(100) DEFAULT NULL,
  `date_execution` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `action_entretien`
--

INSERT INTO `action_entretien` (`id`, `entretien_user_id`, `desciption`, `etat_dentretien`, `id_booking`, `id_logement`, `entretien_status`, `date_execution`) VALUES
(5, 1, 'menage', 'menage', 15, 1, 'À faire', '2023-10-08 22:00:00'),
(6, 2, 'J\'ai terminé ', 'j\'ai pas réalise le menage toz je démissionne ', 15, 3, 'terminé', '2023-06-20 19:40:33'),
(7, 3, 'Vous devez faire le menage dans les chambres', 'Menage', 46, 4, NULL, '2023-06-20 20:28:14'),
(8, 2, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:28:14'),
(11, 1, 'menage', 'menage', 51, 1, 'À faire', '2023-09-10 22:00:00'),
(12, 1, 'menage', 'menage', 53, 1, 'À faire', '2023-10-11 22:00:00'),
(14, 1, 'Actions d\'entretien habituelles', 'Actions d\'entretien habituelles', 55, 1, 'À faire', '2023-08-06 22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `cancelled` int(11) DEFAULT '0',
  `id_logement` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `avis_client` varchar(200) DEFAULT NULL,
  `final_price` float NOT NULL,
  `service_fee` float NOT NULL,
  `taxes` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stars` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id`, `starting_date`, `ending_date`, `cancelled`, `id_logement`, `id_user`, `avis_client`, `final_price`, `service_fee`, `taxes`, `created_at`, `stars`) VALUES
(15, '2023-09-05', '2023-09-08', 0, 1, 1, 'Super logement', 1860, 0, 0, '2023-06-20 19:27:10', 0),
(46, '2023-06-28', '2023-06-29', 0, 1, NULL, NULL, 0, 0, 0, '2023-06-19 18:23:57', 0),
(47, '2023-06-30', '2023-07-02', 0, 2, NULL, NULL, 0, 0, 0, '2023-06-19 18:34:29', 0),
(48, '2023-06-30', '2023-07-01', 0, 1, NULL, NULL, 0, 0, 0, '2023-06-19 18:34:49', 0),
(51, '2023-09-09', '2023-09-11', 0, 1, 2, 'Excellent logement.', 1860, 0, 0, '2023-06-21 12:52:25', 0),
(52, '2023-05-05', '2023-05-07', 0, 1, 5, 'C\'est tres bien', 0, 0, 0, '2023-06-21 13:31:38', 0),
(53, '2023-10-10', '2023-10-12', 0, 1, NULL, NULL, 1860, 0, 0, '2023-06-21 13:38:24', 0),
(55, '2023-08-06', '2023-08-07', 0, 1, 1, NULL, 1240, 0, 0, '2023-06-22 08:22:34', 0),
(56, '2023-03-02', '2023-03-06', 0, 1, 1, '', 0, 0, 0, '2023-06-22 19:11:13', 3),
(57, '2023-06-22', '2023-06-28', 0, 3, 1, NULL, 0, 0, 0, '2023-06-22 19:35:25', 0);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `position_lat` double DEFAULT NULL,
  `position_long` double DEFAULT NULL,
  `adress` varchar(200) NOT NULL,
  `number_of_travelers` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_type_logement` int(11) DEFAULT NULL,
  `bedroom_number` int(11) NOT NULL,
  `kitchen` int(11) DEFAULT '0',
  `bathroom_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `name`, `description`, `position_lat`, `position_long`, `adress`, `number_of_travelers`, `price`, `id_type_logement`, `bedroom_number`, `kitchen`, `bathroom_number`, `created_at`) VALUES
(1, 'Sweet family', 'Cet appartement avec deux chambres, situé dans le 9e arrondissement, est parfait pour un séjour confortable en centre ville. Vous apprécierez la proximité avec diverses attractions, telles que le Mur des Je T\'aime, le Musée de Montmartre, de bons restaurants et magasins, et la station Blanche n\'est qu\'à 5 minutes à pied.\r\n', 48.8796, 2.32874, '9è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise : 3 Rue De Liège, 75009 Paris)\r\n', 4, 620, 2, 2, 1, 1, '2023-06-13 18:43:24'),
(2, 'Epuré is the new chic', 'Un appartement de luxe récemment rénové avec une vue sur la tour Eiffel, la Seine et toute la ville rêvée de Paris.\r\n', 48.8511, 2.28879, '15è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise : 11 rue Sextius Michel, 75015 Paris)\r\n', 4, 815, 2, 2, 1, 2, '2023-06-13 20:02:58'),
(3, 'Le moderne', 'Ce moderne appartement d\'une chambre dans le 14e arrondissement est idéal pour les couples souhaitant séjourner près du centre-ville. Il possède tout ce dont vous avez besoin pour un séjour agréable. La propriété est à proximité de diverses attractions comme la Tour Montparnasse et le Jardin du Luxembourg, de bons restaurants et de magasins.', 48.83344, 2.32858, '14è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise : 52 Rue Boulard 75014 Paris)\r\n', 2, 415, 2, 3, 1, 5, '2023-06-13 21:43:28'),
(4, 'Villa luxury', 'La Villa Luxury est un bijou de la ville lumière....C\'est LE SECRET QUE personne ne peut trouver, caché derrière une cour arrière privée. C\'est tout à fait inattendu...et totalement privé.\r\n', 48.82074, 2.3732, '14è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise : 146 Rue Delbet 75114 Paris)\r\n', 10, 500, 1, 6, 1, 8, '2023-06-13 21:52:18'),
(5, 'Le lord', 'Ce spectaculaire loft en duplex offre une grandeur parisienne, de l\'élégance et du confort pour les vacanciers exigeants. Tout l\'appartement a été superbement rénové et luxueusement décoré pour combiner le charme de l\'ancien monde avec des équipements modernes. La maison se compose de 2 chambres et 2 salles de bains complètes et offre une vue imprenable sur Montmartre et le Sacré-Cœur encadré de baies vitrées de 14 pieds (4,3 mètres).\r\n', 48.83399, 2.29475, '18è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  50 Pl. Saint-Pierre, 75018 Paris)\r\n', 4, 1100, 4, 4, 1, 2, '2023-06-13 21:58:03'),
(6, 'Golden safari', 'Au fond d’une ravissante impasse parisienne, profitez d’un véritable havre de paix où le chant des oiseaux remplace le bruit de la ville.\r\nCe pavillon de 100m2 vous enchantera par ses volumes. Il dispose d’un vaste espace de vie donnant sur une cour.\r\n', 48.83399, 2.29475, '12è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  Imp. Baronnet 75012 Paris)\r\n', 4, 470, 3, 2, 1, 2, '2023-06-13 22:01:27'),
(7, 'Paris romantique', 'Venez partager un moment de détente dans notre maison 2 personnes située au cœur du quartier historique du Marais, proche du Musée National Picasso. Vous apprécierez le logement pour le confort, la cuisine, la hauteur des plafonds, l\'emplacement et la vue.\r\nCette maison de 80m2 a été pensée et conçu par l\'architecte Lydia Hareb pour vous offrir tout le confort et la détente dont vous avez besoin. Vous aurez alors à votre entière disposition un bassin unique, une baignoire XXL ainsi qu’un minibar de luxe.\r\n', 48.83399, 2.29475, '3è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  17 Rue du Parc Royal 75003 Paris)\r\n', 2, 1100, 3, 3, 1, 1, '2023-06-13 22:12:22'),
(8, 'Little dinasty', 'L\'appartement est idéalement situé dans une rue calme à 2 minutes de la Tour Eiffel et du Champs de Mars. Un appartement moderne et agréable situé au 2e étage avec 2 chambres et 1 salle de bain, salon, cuisine.\r\n', 48.82074, 2.3732, '7è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise : 442 Av. Joseph Bouvard75007 Paris)\r\n', 4, 430, 2, 3, 1, 1, '2023-06-13 22:16:15'),
(9, 'Business class', 'Dans une rue tranquille et pittoresque au cœur de Paris, à Saint-Germain, à 4 mn à pied du Louvre, à 15 mn du musée d\'Orsay ou de Notre-Dame.\r\nHôtel Particulier de 1630. Salon de 50m2 avec poutres peintes originales uniques et vue sur l\'Institut de France.\r\nCuisine entièrement équipée. Salle à manger pouvant accueillir 10 personnes. Deux chambres de luxe avec dressing et salles de bains, vue sur l\'Institut, terrasse privée.\r\nEnchanteur Duplex ouvrant sur le même patio, avec cuisine entièrement équipée, pour 4 personnes supplémentaires.\r\n', 48.83399, 2.29475, '6è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  16 Quai Malaquais75006 Paris)\r\n', 6, 880, 2, 4, 1, 2, '2023-06-17 17:09:08'),
(10, 'Maison couture', 'Au coeur du triangle d\'or parisien, idéalement situé entre Luxembourg, Quartier Latin et Saint Germain, non loin des quais de Seine et du Musée du Louvre, cet appartement est idéal pour goûter aux charmes de la vie parisienne, ses terrasses, ses restaurants, ses cinémas, ses lieux de vie réputés dans le monde entier.\r\nElégant 4 pièces de 83 m2, situé au 2ème étage d\'un immeuble ancien, refait à neuf en juin 2022, il présente beaucoup de charme et d\'originalité.\r\n', 48.83399, 2.29475, '6è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  23 Rue D\'Assas 75006 Paris)\r\n', 6, 525, 2, 2, 1, 1, '2023-06-17 17:10:59'),
(11, 'Pure white', 'Appartement idéalement situé en plein centre de paris près de la rue Montorgueil. Quartier situé au coeur de nombreux restaurants, bars et supermarchés.', 48.86756, 2.35266, '2è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  14 Pass. Du Ponceau 75002 Paris)\r\n', 6, 786, 2, 2, 1, 2, '2023-06-17 17:13:41'),
(12, 'Nouveau manoir', 'Cet appartement, situé dans le 10ème arrondissement de Paris, est l\'endroit idéal pour les voyageurs solitaires ou les couples. Vous apprécierez sa proximité avec de nombreuses attractions de la ville. La station de métro Strasbourg Saint-Denis se trouve à seulement 2 minutes de marche, offrant ainsi une accessibilité optimale.', 48.83909, 2.35976, '2è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  15 Boulevard St Denis 75002 Paris)\r\n', 2, 4058, 2, 2, 1, 1, '2023-06-17 17:17:13'),
(13, 'Soothing wood', 'Somptueux et neuf : appartement de 3 chambres et 3 salles de bain entièrement climatisé. Elégant, spacieux, mobilier et literie de qualité, décoré par des professionnels, ce logement est situé au coeur de la capitale, à mi-chemin du Marais, de Beaubourg, de la rue Montorgueil et de la place des Victoire. Vous serez entouré de cafés et de restaurants branchés, c\'est le lieu idéal pour un séjour d’évasion en famille ou entre amis.', 48.86536, 2.35354, '3è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  290 Rue Saint-Martin 75003 Paris)\r\n', 4, 692, 2, 3, 1, 3, '2023-06-17 19:15:17'),
(14, 'Piece of art', 'Venez découvrir Paris en séjournant dans ce magnifique loft offrant une lumière extraordinaire ! Décoré avec gout et parsemé d’œuvres et de mobilier d’art, vous passerez un moment inoubliable.\r\n\r\nL\'appartement est sur deux étages et peut accueillir jusqu\'à 4 personnes. Il est situé près du quartier de Montmartre.\r\n\r\nIdéalement situé, vous trouverez tout le nécessaire aux alentours de l\'appartement. Il se trouve au 5ème étage (avec ascenseur) offrant une vue splendide. \r\n', 48.8854, 2.33053, '18è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  9 Rue Caulaincourt 75018 Paris)\r\n', 4, 1250, 3, 2, 0, 1, '2023-06-17 19:25:25'),
(15, 'La madeleine', 'Appartement de 85 m2 rénové entièrement en 2021, très luxueux avec moulures et 3m30 de hauteur sous plafond dans un immeuble Haussmannien, au cœur de Paris dans le quartier de la Madeleine.\r\nVous serez à quelques pas de la place de la Madeleine, de place de la Concorde, de l\'Opéra, des Champs Elysée, Tuileries ou encore du Louvre.\r\nPour les adeptes du shopping parisien vous serez dans votre élément avec la rue Saint Honoré, le Printemps Haussmann, les Galeries la Fayette, Opéra et de la Madeleine.\r\n', 48.8708518, 2.3241235, '8è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  3 Pass. de la Madeleine 75008 Paris)\r\n', 4, 975, 2, 2, 1, 2, '2023-06-17 19:54:13'),
(16, 'Le cœur de Paris', 'Appartement très luxueux, au cœur de Paris dans le quartier Madeleine.\r\n- 5 min à pieds de place de la Concorde, rue Saint Honoré,\r\n- 5 min de Opéra, des Tuileries et Saint Lazare.\r\nVous serez à quelques pas de la place de la place de la Concorde, de l\'Opéra, des Champs Elysée, Tuileries ou encore du Louvre.\r\nPour les adeptes du shopping parisien vous serez dans votre élément avec la rue Saint Honoré, le Printemps Haussmann, les Galeries la Fayette, Opéra et de la Madeleine.\r\n', 48.8752828, 2.3238493, '8è arrondissement, Paris, Ile-de-France, France\r\n(adresse précise :  45 Rue Pasquier, 75008 Paris, France)\r\n', 2, 687, 2, 1, 1, 1, '2023-06-17 20:09:17');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `id_booking` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `response_of_idMessage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `text`, `id_booking`, `user_id`, `created_at`, `response_of_idMessage`) VALUES
(8, 'Bonjour j\'ai une question', 1, 1, '2023-06-19 15:29:38', NULL),
(13, 'bonjour bonjour\r\n', 1, 1, '2023-06-20 08:03:10', NULL),
(16, 'bonjour ', 8, 1, '2023-06-20 15:44:21', NULL),
(17, 'dgdgggdgdg', 14, 1, '2023-06-20 18:05:02', NULL),
(22, 'HSHHSHSH', 15, 1, '2023-06-22 19:35:40', NULL),
(23, 'HHH', 15, 1, '2023-06-22 19:37:15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `url` varchar(70) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `url`, `id_logement`, `created_at`) VALUES
(1, 'L.1/principale.jpg', 1, '2023-06-13 14:58:24'),
(2, 'L.2/principale.jpg', 2, '2023-06-13 16:05:37'),
(4, 'L.3/principale.jpg', 3, '2023-06-13 17:46:08'),
(5, 'L.4/principale.jpg', 4, '2023-06-13 17:53:16'),
(6, 'L.5/principale.jpg', 5, '2023-06-13 17:58:26'),
(7, 'L.6/principale.jpg', 6, '2023-06-13 18:01:55'),
(8, 'L.7/principale.jpg', 7, '2023-06-13 18:12:47'),
(9, 'L.8/principale.jpg', 8, '2023-06-13 18:16:46'),
(10, 'L.9/principale.jpg', 9, '2023-06-17 17:28:06'),
(11, 'L.10/1.jpg', 10, '2023-06-17 17:30:08'),
(12, 'L.11/principale.jpg', 11, '2023-06-17 17:32:54'),
(13, 'L.12/principale.jpg', 12, '2023-06-17 17:33:38'),
(14, 'L.13/principale.jpg', 13, '2023-06-17 19:19:11'),
(15, 'L.14/principale.jpg', 14, '2023-06-17 19:25:59'),
(16, 'L.15/principale.jpg', 15, '2023-06-17 19:55:12'),
(17, 'L.16/principale.jpg', 16, '2023-06-17 20:09:41'),
(48, 'L.5/vv.jpg', 5, '2023-06-13 17:58:26'),
(49, 'L.1/1.jpg', 1, '2023-06-21 10:53:53');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `title`, `created_at`) VALUES
(1, 'client', '2023-06-10 19:34:34'),
(2, 'gestion', '2023-06-10 19:34:46'),
(3, 'logistique', '2023-06-10 19:34:58'),
(4, 'admin', '2023-06-10 19:35:08');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `title`, `created_at`) VALUES
(1, 'Parking gratuit sur place', '2023-06-14 10:32:16'),
(2, 'Wifi', '2023-06-14 10:33:12'),
(3, 'Détecteur de fumée', '2023-06-14 10:33:39');

-- --------------------------------------------------------

--
-- Structure de la table `service_logement`
--

CREATE TABLE `service_logement` (
  `id_logement` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service_logement`
--

INSERT INTO `service_logement` (`id_logement`, `id_service`, `created_at`) VALUES
(1, 1, '2023-06-14 10:33:57'),
(1, 2, '2023-06-14 10:34:10'),
(1, 3, '2023-06-14 10:34:22');

-- --------------------------------------------------------

--
-- Structure de la table `type_logement`
--

CREATE TABLE `type_logement` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_logement`
--

INSERT INTO `type_logement` (`id`, `type`, `created_at`) VALUES
(1, 'Villa', '2023-06-11 07:33:52'),
(2, 'Appartement', '2023-06-11 07:34:16'),
(3, 'Maison', '2023-06-13 18:37:40'),
(4, 'Loft', '2023-06-13 18:37:59'),
(5, 'Residence', '2023-06-13 18:38:14'),
(6, 'Chambre', '2023-06-13 18:38:24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `activated` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `mail`, `phone`, `created_at`, `deleted`, `activated`) VALUES
(1, 'ismail', 'Ismail', 'Aslan', '$2y$10$ozU.zUjLUGA1VTBOKy85Zu2bNjIpR0B8N3dSiHUZG/iUa7iXzCY.m', 'ismail@gmail.com', NULL, '2023-06-10 19:36:50', 0, 1),
(2, 'root', 'root', 'root', '$2y$10$jztF0NozVqlbzWGhO8xUvOIO7.bxIqaho5vh9gb4e7lLh4.dNfFHW', 'root@gmail.com', NULL, '2023-06-10 19:37:46', 0, 1),
(4, 'Emma0', 'Emma2', 'Emma3', 'Emma4', 'Emma@gmail.com', '1234', '2023-06-11 06:41:17', 0, 1),
(5, 'Alvin', 'Alvin2', 'Alvin3', '123', 'Alvin@gmail.com', '12345', '2023-06-11 08:03:17', 0, 1),
(6, 'Alvin2', 'Alvin2', 'Alvin3', '123', 'Alvin@gmail.com', '12345', '2023-06-11 08:03:58', 0, 1),
(7, 'Bertin', 'Bertin1', 'bertin2', '123', 'bertin@gmail.com', '0634', '2023-06-11 16:09:36', 0, 1),
(8, 'toz', 'toz', 'toz', '123', 'toz@gmail.com', '123', '2023-06-11 18:01:33', 0, 1),
(9, 'sedfasdf', 'asdfasef', 'asdfsad', 'asdfasdf', 'sdfsd@asddsa.cd', '234234213', '2023-06-15 11:19:17', 0, 1),
(10, 'sebastien', 'gestionnaire', 'sebastien', 'sebastien', 'sebastien@gmail.com', '123456', '2023-06-20 07:55:49', 0, 1),
(11, 'toto', 'toto', 'toto', '$2y$10$ZVb0EZiAC549lgG6zcx0fO0wntfNuIJJDmpA0KSN3arRzGBzmLQkq', 'toto@gmail.com', '123456', '2023-06-21 10:26:48', 0, 1),
(12, 'Haris', 'Jordan', 'Jordan', '123', 'jordan@gmail.com', '1234', '2023-06-22 06:35:26', 0, 1),
(13, 'chris', 'chris', 'chris', '$2y$10$rnXPnyyDn1aU7FKQSTUje.ik6JLjxaTHXPXNC4m4loj75d9/2Ati2', 'chris@gmail.com', '123', '2023-06-23 05:20:13', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_role`
--

CREATE TABLE `users_role` (
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_role`
--

INSERT INTO `users_role` (`user_id`, `role_id`, `created_at`) VALUES
(1, 1, '2023-06-10 19:38:25'),
(2, 4, '2023-06-10 19:38:40'),
(2, 1, '2023-06-10 19:38:50'),
(2, 2, '2023-06-10 19:39:02'),
(2, 3, '2023-06-10 19:39:12'),
(4, 1, '2023-06-11 06:41:17'),
(5, 1, '2023-06-11 08:03:17'),
(6, 1, '2023-06-11 08:03:58'),
(7, 1, '2023-06-11 16:09:36'),
(8, 1, '2023-06-11 18:01:33'),
(9, 1, '2023-06-15 11:19:17'),
(10, 2, '2023-06-20 07:56:17'),
(11, 1, '2023-06-21 10:26:48'),
(12, 1, '2023-06-22 06:35:26'),
(13, 1, '2023-06-23 05:20:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action_entretien`
--
ALTER TABLE `action_entretien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_logement` (`id_type_logement`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_logement`
--
ALTER TABLE `service_logement`
  ADD UNIQUE KEY `service_logement_index_1` (`id_logement`,`id_service`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `type_logement`
--
ALTER TABLE `type_logement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_role`
--
ALTER TABLE `users_role`
  ADD UNIQUE KEY `users_role_index_0` (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action_entretien`
--
ALTER TABLE `action_entretien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action_entretien`
--
ALTER TABLE `action_entretien`
  ADD CONSTRAINT `action_entretien_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`id_type_logement`) REFERENCES `type_logement` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`);

--
-- Contraintes pour la table `service_logement`
--
ALTER TABLE `service_logement`
  ADD CONSTRAINT `service_logement_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `service_logement_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `users_role`
--
ALTER TABLE `users_role`
  ADD CONSTRAINT `users_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
