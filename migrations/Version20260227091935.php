<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260227091935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partner ADD description LONGTEXT DEFAULT NULL, ADD link VARCHAR(255) DEFAULT NULL, ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_312B3E16ED5CA9E6 ON partner (service_id)');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY `FK_E19D9AD29393F8FE`');
        $this->addSql('DROP INDEX IDX_E19D9AD29393F8FE ON service');
        $this->addSql('ALTER TABLE service DROP category, DROP address, DROP link, DROP partner_id, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16ED5CA9E6');
        $this->addSql('DROP INDEX IDX_312B3E16ED5CA9E6 ON partner');
        $this->addSql('ALTER TABLE partner DROP description, DROP link, DROP service_id');
        $this->addSql('ALTER TABLE service ADD category VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD link VARCHAR(255) DEFAULT NULL, ADD partner_id INT DEFAULT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT `FK_E19D9AD29393F8FE` FOREIGN KEY (partner_id) REFERENCES partner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E19D9AD29393F8FE ON service (partner_id)');
    }
}
