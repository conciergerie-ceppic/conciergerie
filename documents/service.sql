-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 fév. 2026 à 13:37
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.6

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
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `address` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `partner_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E19D9AD29393F8FE` (`partner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `name`, `category`, `description`, `address`, `link`, `partner_id`) VALUES
(1, 'Hôtel Belle Vue', 'hotel', 'Hôtel 4 étoiles avec vue panoramique sur la mer.', '12 Rue des Palmiers, Nice', 'https://bellevue-hotel.fr', 1),
(2, 'Restaurant Le Gourmet', 'restaurant', 'Cuisine gastronomique française moderne.', '8 Avenue Victor Hugo, Lyon', 'https://legourmet-lyon.fr', 2),
(3, 'Spa Zen & Relax', 'spa', 'Centre de bien-être avec massages et sauna.', '25 Boulevard Haussmann, Paris', NULL, 1),
(4, 'Excursion Mont Blanc', 'activity', 'Randonnée guidée dans le massif du Mont Blanc.', 'Chamonix Centre, Chamonix', 'https://montblanc-aventure.fr', 3),
(5, 'Hôtel Riviera Palace', 'hotel', 'Hôtel de luxe avec piscine et spa intégré.', '45 Promenade des Anglais, Nice', 'https://rivierapalace.fr', 2),
(6, 'Bistro du Port', 'restaurant', 'Restaurant convivial spécialisé en fruits de mer.', '3 Quai du Port, Marseille', NULL, 3),
(7, 'Spa Évasion', 'spa', 'Massages relaxants et soins du visage bio.', '10 Rue de la Liberté, Bordeaux', 'https://spaevasion.fr', 1),
(8, 'Balade en Kayak', 'activity', 'Découverte des calanques en kayak accompagné.', 'Port de Cassis, Cassis', NULL, 2),
(9, 'Hôtel Belle Vue', 'hotel', 'Hôtel 4 étoiles avec vue panoramique sur la mer.', '12 Rue des Palmiers, Nice', 'https://bellevue-hotel.fr', 1),
(10, 'Hôtel Riviera Palace', 'hotel', 'Hôtel de luxe avec piscine et spa intégré.', '45 Promenade des Anglais, Nice', 'https://rivierapalace.fr', 2),
(11, 'Hôtel Montagne', 'hotel', 'Hôtel confortable au pied des pistes de ski.', '10 Rue du Sommet, Chamonix', NULL, 3),
(12, 'Hôtel Central', 'hotel', 'Hôtel économique situé en centre-ville.', '5 Avenue de la République, Lyon', 'https://hotelcentral.fr', 1),
(13, 'Hôtel Jardin', 'hotel', 'Petit hôtel charmant avec jardin et terrasse.', '8 Rue des Fleurs, Bordeaux', NULL, 2),
(14, 'Chauffeur Privé Côte d\'Azur', 'driver', 'Service de chauffeur privé haut de gamme sur la Côte d\'Azur.', '15 Avenue de la Victoire, Nice', 'https://chauffeur-cotedazur.fr', NULL),
(15, 'Transfer Aéroport Lyon', 'driver', 'Transfert VTC entre Lyon et l\'aéroport Saint-Exupéry.', '2 Place Bellecour, Lyon', 'https://transfer-lyon.fr', NULL),
(16, 'Chauffeur Prestige Paris', 'driver', 'Location de chauffeur avec véhicule de luxe pour vos déplacements parisiens.', '10 Rue du Faubourg Saint-Honoré, Paris', 'https://chauffeur-prestige-paris.fr', NULL),
(17, 'Soirée Privée Marseille', 'event', 'Organisation de soirées privées et cocktails dinatoires en bord de mer.', '5 Quai des Belges, Marseille', 'https://soiree-marseille.fr', NULL),
(18, 'Séminaire d\'Entreprise Bordeaux', 'event', 'Planification et gestion complète de séminaires professionnels.', '1 Place de la Bourse, Bordeaux', 'https://seminaire-bordeaux.fr', NULL),
(19, 'Gala & Réceptions Nice', 'event', 'Service premium pour l\'organisation de galas et réceptions haut de gamme.', '30 Promenade des Anglais, Nice', NULL, NULL),
(20, 'Voyage Sur Mesure Méditerranée', 'travel', 'Création d\'itinéraires personnalisés sur le bassin méditerranéen.', '8 Rue de la Paix, Paris', 'https://voyage-mediterranee.fr', NULL),
(21, 'Escapade Alpes & Montagne', 'travel', 'Séjours tout compris au cœur des Alpes françaises.', '3 Avenue du Mont Blanc, Chamonix', 'https://escapade-alpes.fr', NULL),
(22, 'Croisière Côte Atlantique', 'travel', 'Croisières privées le long de la côte atlantique française.', '12 Quai Louis XVIII, Bordeaux', 'https://croisiere-atlantique.fr', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
