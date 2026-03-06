<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260306111222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, osm_key VARCHAR(50) DEFAULT NULL, osm_val VARCHAR(50) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A56C783232 FOREIGN KEY (partner_id_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE service');
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16ED5CA9E6');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A59D86650F');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A56C783232');
    }
}
