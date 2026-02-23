<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260223131632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service ADD partner_id INT DEFAULT NULL, DROP availability');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD29393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD29393F8FE ON service (partner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD29393F8FE');
        $this->addSql('DROP INDEX IDX_E19D9AD29393F8FE ON service');
        $this->addSql('ALTER TABLE service ADD availability VARCHAR(255) DEFAULT NULL, DROP partner_id');
    }
}
