<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260303123717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, user_id_id INT NOT NULL, INDEX IDX_BF5476CA9D86650F (user_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, service_id INT DEFAULT NULL, INDEX IDX_312B3E16ED5CA9E6 (service_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, service_id_id INT NOT NULL, INDEX IDX_42C849559D86650F (user_id_id), INDEX IDX_42C84955D63673B0 (service_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_favorite_partner (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, partner_id_id INT NOT NULL, INDEX IDX_116AD2A59D86650F (user_id_id), INDEX IDX_116AD2A56C783232 (partner_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D63673B0 FOREIGN KEY (service_id_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A56C783232 FOREIGN KEY (partner_id_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA9D86650F');
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16ED5CA9E6');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559D86650F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D63673B0');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A59D86650F');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A56C783232');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_favorite_partner');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
