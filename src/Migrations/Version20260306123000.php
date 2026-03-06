<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260306123000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insère les services de base et quelques partenaires de test';
    }

    public function up(Schema $schema): void
    {
        // Insert services
        $this->addSql("
            INSERT INTO service (name, description, osm_key, osm_val) VALUES
            ('hotel', 'Hôtels et hébergements', 'tourism', 'hotel'),
            ('restaurant', 'Restaurants et gastronomie', 'amenity', 'restaurant'),
            ('spa', 'Spa et bien-être', 'tourism', 'spa'),
            ('driver', 'Chauffeur privé', NULL, NULL),
            ('event', 'Événements', NULL, NULL),
            ('travel', 'Voyages', NULL, NULL),
            ('vehicle', 'Location de véhicule', NULL, NULL),
            ('activity', 'Activités', NULL, NULL),
            ('allservices', 'Tous les services', NULL, NULL);
        ");

        // Exemple : Insert partenaires de test
        $this->addSql("
            INSERT INTO partner (name, service_id, address, lat, lon) VALUES
            ('Hôtel du Centre', (SELECT id FROM service WHERE name='hotel'), '1 rue du Centre, Paris', 48.8566, 2.3522),
            ('Restaurant Le Gourmet', (SELECT id FROM service WHERE name='restaurant'), '10 avenue de la République, Paris', 48.8570, 2.3530),
            ('Spa Zen', (SELECT id FROM service WHERE name='spa'), '5 rue des Lilas, Paris', 48.8580, 2.3540);
        ");
    }

    public function down(Schema $schema): void
    {
        // Supprime les partenaires et services créés
        $this->addSql("DELETE FROM partner WHERE name IN ('Hôtel du Centre','Restaurant Le Gourmet','Spa Zen');");
        $this->addSql("DELETE FROM service WHERE name IN ('hotel','restaurant','spa','driver','event','travel','vehicle','activity','allservices');");
    }
}