-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 04 mars 2026 à 13:14
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conciergerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `created_at`, `first_name`, `last_name`, `email`, `phone`, `subject`, `content`) VALUES
(1, '2026-03-02 09:43:35', 'nom', 'prenom', 'email@email.fr', '0102030405', 'collaborateur', ''),
(2, '2026-03-02 10:12:39', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(3, '2026-03-02 10:13:24', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(4, '2026-03-02 10:13:26', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(5, '2026-03-02 10:15:48', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(6, '2026-03-02 10:16:08', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(7, '2026-03-02 10:16:54', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(8, '2026-03-02 10:19:34', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(9, '2026-03-02 10:28:15', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(10, '2026-03-02 10:31:23', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(11, '2026-03-02 10:31:25', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(12, '2026-03-02 10:31:31', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(13, '2026-03-02 10:31:47', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(14, '2026-03-02 10:32:15', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(15, '2026-03-02 10:32:58', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(16, '2026-03-02 10:33:01', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(17, '2026-03-02 10:33:38', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(18, '2026-03-02 10:34:00', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(19, '2026-03-02 10:34:09', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(20, '2026-03-02 10:34:17', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(21, '2026-03-02 10:34:42', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(22, '2026-03-02 10:34:50', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(23, '2026-03-02 10:35:04', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(24, '2026-03-02 10:35:24', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(25, '2026-03-02 10:35:35', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(26, '2026-03-02 10:35:50', 'gezyud', 'hjfjkeuf', 'jhdfjd@lkjsdfd.fr', '0102030405', '', 'sdfksdekfghkushdgfer'),
(27, '2026-03-02 10:37:40', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(28, '2026-03-02 10:38:16', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(29, '2026-03-02 10:38:25', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(30, '2026-03-02 10:38:39', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(31, '2026-03-02 10:38:39', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(32, '2026-03-02 10:38:39', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(33, '2026-03-02 10:38:39', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(34, '2026-03-02 10:38:39', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(35, '2026-03-02 10:38:40', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(36, '2026-03-02 11:08:44', 'jndfjnsdj', 'nfodfns', 'dsiond@kj.fr', '0', '', ''),
(37, '2026-03-02 13:29:43', '', '', '', '', '', ''),
(38, '2026-03-02 13:46:29', 'abc', '', '', '', '', ''),
(39, '2026-03-02 14:05:42', 'dfdf', '', '', '', '', ''),
(40, '2026-03-02 14:06:34', '', 'efef', '', '', '', ''),
(41, '2026-03-02 14:16:04', '', 'efef', '', '', '', ''),
(42, '2026-03-02 14:16:13', '', '', '', 'dff', '', ''),
(43, '2026-03-03 19:51:10', 'iejfio', 'indfif', 'fndnf@eifd.fr', 'ç\'ri\"\'ç', 'question', 'zr,grggr'),
(44, '2026-03-03 19:52:18', 'iejfio', 'indfif', 'fndnf@eifd.fr', 'ç\'ri\"\'ç', 'question', 'zr,grggr'),
(45, '2026-03-03 19:52:35', 'efezfezf', 'ezfezf', 'zefzefe@kfe.fr', 'ezfzefzef', 'retour', 'efefee'),
(46, '2026-03-03 20:41:36', 'kjvdvj', ',nfdnvd', 'e@live.fr', ',ddf,', 'remboursement', 'vfvfvfevefv');

-- --------------------------------------------------------

--
-- Structure de la table `partner`
--

CREATE TABLE `partner` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` longtext,
  `link` varchar(255) DEFAULT NULL,
  `service_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `partner`
--

INSERT INTO `partner` (`id`, `name`, `address`, `phone`, `description`, `link`, `service_id`) VALUES
(1, 'Le Grand Hôtel Paris', '2 Rue Scribe, 75009 Paris', '01 40 07 32 32', 'Hôtel 5 étoiles au cœur de Paris, face à l\'Opéra Garnier. Chambres somptueuses et service irréprochable.', 'https://www.legrandhotel.fr', 1),
(2, 'Hôtel de Crillon', '10 Place de la Concorde, 75008 Paris', '01 44 71 15 00', 'Palace parisien emblématique sur la Place de la Concorde. Luxe absolu et histoire au rendez-vous.', 'https://www.rosewoodhotels.com', 1),
(3, 'Hôtel Hermitage Monaco', 'Square Beaumarchais, 98000 Monaco', '+377 98 06 40 00', 'Hôtel de luxe dominant la Méditerranée à Monaco. Vue imprenable et prestations d\'exception.', 'https://www.hotelhermitagemontecarlo.com', 1),
(4, 'Le Jules Verne', 'Tour Eiffel, Av. Gustave Eiffel, 75007 Paris', '01 45 55 61 44', 'Restaurant gastronomique perché au 2e étage de la Tour Eiffel. Une expérience culinaire unique sur les toits de Paris.', 'https://www.lejulesverne-paris.com', 2),
(5, 'Guy Savoy', '11 Quai de Conti, 75006 Paris', '01 43 80 40 61', 'Table triplement étoilée au guide Michelin. Cuisine française inventive dans un cadre architectural remarquable.', 'https://www.guysavoy.com', 2),
(6, 'Le Louis XV - Alain Ducasse', 'Place du Casino, 98000 Monaco', '+377 98 06 88 64', 'Trois étoiles Michelin au cœur de Monaco. La quintessence de la cuisine méditerranéenne par Alain Ducasse.', 'https://www.ducasse-paris.com', 2),
(7, 'Cinq Mondes Spa Paris', '6 Square de l\'Opéra, 75009 Paris', '01 42 66 00 60', 'Spa urbain de luxe proposant des rituels bien-être inspirés des cinq continents au cœur de Paris.', 'https://www.cinqmondes.com', 3),
(8, 'Spa Nuxe', '32 Rue Montorgueil, 75001 Paris', '01 55 80 71 40', 'Spa parisien iconique installé dans de magnifiques caves voûtées du XVIIe siècle. Soins signature Nuxe.', 'https://www.nuxe.com', 3),
(9, 'Thermes Marins Monte-Carlo', '2 Avenue de Monte-Carlo, 98000 Monaco', '+377 98 06 69 00', 'Centre de thalassothérapie et spa face à la mer. Soins exclusifs avec eau de mer et produits marins.', 'https://www.thermesmarinsmontecarlo.com', 3),
(10, 'Chauffeur Privé Elite', '15 Avenue Montaigne, 75008 Paris', '01 80 20 20 20', 'Service de chauffeurs privés haut de gamme disponible 24h/24. Flotte de véhicules de prestige.', 'https://www.chauffeurelit.fr', 4),
(11, 'VIP Limousines', '8 Rue du Faubourg Saint-Honoré, 75008 Paris', '01 47 42 00 00', 'Location de limousines avec chauffeur pour tous vos déplacements. Discrétion et élégance garanties.', 'https://www.viplimousines.fr', 4),
(12, 'Monaco VTC', '1 Avenue des Spélugues, 98000 Monaco', '+377 93 50 56 28', 'Service de voitures avec chauffeur à Monaco et sur la Côte d\'Azur. Transferts aéroport et excursions privées.', 'https://www.monaco-vtc.com', 4),
(13, 'Agence Événements Prestige', '22 Rue du Colisée, 75008 Paris', '01 53 75 22 00', 'Organisation d\'événements privés et corporate sur mesure. Soirées de gala, cocktails et séminaires d\'exception.', 'https://www.evenements-prestige.fr', 5),
(14, 'Les Grandes Tablées', '5 Rue de Valois, 75001 Paris', '01 42 96 65 00', 'Spécialiste des dîners privés et réceptions dans des lieux d\'exception parisiens. Chef étoilé à domicile.', 'https://www.lesgrandestablees.fr', 5),
(15, 'Monaco Events', '10 Boulevard des Moulins, 98000 Monaco', '+377 97 98 10 00', 'Organisation d\'événements exclusifs à Monaco. Accès aux lieux les plus prestigieux de la principauté.', 'https://www.monaco-events.com', 5),
(16, 'Voyages Lumière', '36 Avenue de l\'Opéra, 75002 Paris', '01 42 61 50 00', 'Agence de voyages de luxe proposant des circuits sur mesure dans les destinations les plus exclusives du monde.', 'https://www.voyageslumiere.fr', 6),
(17, 'Jet Set Travel', '18 Avenue George V, 75008 Paris', '01 47 20 74 00', 'Spécialiste du voyage privé en jet, yacht et hélicoptère. Des itinéraires uniques pour une clientèle exigeante.', 'https://www.jetsettravel.fr', 6),
(18, 'Évasion Côte d\'Azur', '3 Promenade des Anglais, 06000 Nice', '04 93 16 00 00', 'Agence spécialisée dans les séjours haut de gamme sur la Côte d\'Azur. Villas privées et expériences exclusives.', 'https://www.evasioncotedazur.fr', 6),
(19, 'Hôtel Negresco', '37 Promenade des Anglais, 06000 Nice', '04 93 16 64 00', 'Institution de la Côte d\'Azur, ce palace niçois allie art, histoire et raffinement depuis 1913.', 'https://www.hotel-negresco-nice.com', 1),
(21, 'vrvr', 'rvrv', 'rvrevr', 'rvrv', 'rvfbv', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `name`, `description`) VALUES
(1, 'hotel', 'Découvrez notre sélection des meilleurs hôtels de luxe soigneusement choisis pour vous offrir une expérience d\'hébergement incomparable. Confort, élégance et service personnalisé sont au rendez-vous.'),
(2, 'restaurant', 'Laissez-vous guider vers les tables les plus raffinées. De la gastronomie française aux cuisines du monde, nous sélectionnons pour vous les restaurants d\'exception qui éveilleront vos papilles.'),
(3, 'spa', 'Offrez-vous une parenthèse de bien-être absolu. Nos partenaires spas et instituts de beauté vous proposent des soins exclusifs pour vous ressourcer corps et âme.'),
(4, 'driver', 'Voyagez en toute sérénité avec nos chauffeurs privés professionnels. Ponctualité, discrétion et confort sont les maîtres mots de notre service de transport haut de gamme.'),
(5, 'event', 'Faites de chaque moment une occasion inoubliable. Soirées privées, événements d\'entreprise, célébrations — nos partenaires organisent des événements sur mesure à la hauteur de vos exigences.'),
(6, 'travel', 'Partez à la découverte du monde avec nos agences de voyage partenaires. Circuits exclusifs, voyages sur mesure et destinations d\'exception pour des aventures hors du commun.'),
(7, 'vehicle', 'Soyez libre, louez un vehicule'),
(8, 'activity', 'Des activités à faire autour de vous');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `phone`, `address`, `avatar`) VALUES
(1, 'admin@admin.fr', '[\"ROLE_ADMIN\"]', '$2y$13$6WdKlSKiGQYtpLBBnIOLTuEVrqYka9G2ANsSJOREOTcA0x1N8pqiK', 'admin', 'admin', '0102030405', 'admin rue admin', 'clouds.webp'),
(2, 'user@user.fr', '[]', '$2y$13$bhrkgOKs0TxffYixmz86F.b2UX6NW.sVEebhMzgmw46zub4JzEfWm', 'user', 'user', '0102030405', 'user rue user', NULL),
(3, 'partner@partner.fr', '[]', '$2y$13$uCik4QxFv2qGcx85lnuakes4a8JnNulbTtyyszI7ZY18MVBy6GKoC', 'partner', 'partner', '0102030405', 'partner rue partner', NULL),
(8, 'yoconac852@medevsa.com', '[\"ROLE_USER\"]', '$2y$13$yjQ5zDS5SsuGTLF8cynsje8VcN/dlHoEb/dzGrNKcxDbIAT.lVMU6', 'dfvfnerli', 'infjefbe', 'sjdbsd', 'dnvisdvn', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_favorite_partner`
--

CREATE TABLE `user_favorite_partner` (
  `id` int NOT NULL,
  `user_id_id` int NOT NULL,
  `partner_id_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_312B3E16ED5CA9E6` (`service_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- Index pour la table `user_favorite_partner`
--
ALTER TABLE `user_favorite_partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_116AD2A59D86650F` (`user_id_id`),
  ADD KEY `IDX_116AD2A56C783232` (`partner_id_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user_favorite_partner`
--
ALTER TABLE `user_favorite_partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `FK_312B3E16ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `user_favorite_partner`
--
ALTER TABLE `user_favorite_partner`
  ADD CONSTRAINT `FK_116AD2A56C783232` FOREIGN KEY (`partner_id_id`) REFERENCES `partner` (`id`),
  ADD CONSTRAINT `FK_116AD2A59D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
