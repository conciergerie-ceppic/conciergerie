<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260303131149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `FK_BF5476CA9D86650F`');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY `FK_42C849559D86650F`');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY `FK_42C84955D63673B0`');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY `FK_B6BD307F6061F7CF`');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY `FK_B6BD307FBE20CAB0`');
        $this->addSql('DROP INDEX IDX_B6BD307F6061F7CF ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FBE20CAB0 ON message');
        $this->addSql('ALTER TABLE message ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD subject VARCHAR(255) NOT NULL, DROP sender_id_id, DROP receiver_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, created_at DATETIME NOT NULL, user_id_id INT NOT NULL, INDEX IDX_BF5476CA9D86650F (user_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, service_id_id INT NOT NULL, INDEX IDX_42C849559D86650F (user_id_id), INDEX IDX_42C84955D63673B0 (service_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `FK_BF5476CA9D86650F` FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT `FK_42C849559D86650F` FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT `FK_42C84955D63673B0` FOREIGN KEY (service_id_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE message ADD sender_id_id INT NOT NULL, ADD receiver_id_id INT NOT NULL, DROP first_name, DROP last_name, DROP email, DROP phone, DROP subject');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT `FK_B6BD307F6061F7CF` FOREIGN KEY (sender_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT `FK_B6BD307FBE20CAB0` FOREIGN KEY (receiver_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B6BD307F6061F7CF ON message (sender_id_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FBE20CAB0 ON message (receiver_id_id)');
    }
}
