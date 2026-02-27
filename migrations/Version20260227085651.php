<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260227085651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY `FK_B6BD307FCD53EDB6`');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY `FK_B6BD307FF624B39D`');
        $this->addSql('DROP INDEX IDX_B6BD307FCD53EDB6 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FF624B39D ON message');
        $this->addSql('ALTER TABLE message ADD sender_id_id INT NOT NULL, ADD receiver_id_id INT NOT NULL, DROP sender_id, DROP receiver_id');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F6061F7CF FOREIGN KEY (sender_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FBE20CAB0 FOREIGN KEY (receiver_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F6061F7CF ON message (sender_id_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FBE20CAB0 ON message (receiver_id_id)');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `FK_BF5476CAA76ED395`');
        $this->addSql('DROP INDEX IDX_BF5476CAA76ED395 ON notification');
        $this->addSql('ALTER TABLE notification CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CA9D86650F ON notification (user_id_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY `FK_42C84955A76ED395`');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY `FK_42C84955ED5CA9E6`');
        $this->addSql('DROP INDEX IDX_42C84955A76ED395 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955ED5CA9E6 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD user_id_id INT NOT NULL, ADD service_id_id INT NOT NULL, DROP user_id, DROP service_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D63673B0 FOREIGN KEY (service_id_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_42C849559D86650F ON reservation (user_id_id)');
        $this->addSql('CREATE INDEX IDX_42C84955D63673B0 ON reservation (service_id_id)');
        $this->addSql('ALTER TABLE service DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY `FK_116AD2A59393F8FE`');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY `FK_116AD2A5A76ED395`');
        $this->addSql('DROP INDEX IDX_116AD2A59393F8FE ON user_favorite_partner');
        $this->addSql('DROP INDEX IDX_116AD2A5A76ED395 ON user_favorite_partner');
        $this->addSql('ALTER TABLE user_favorite_partner ADD user_id_id INT NOT NULL, ADD partner_id_id INT NOT NULL, DROP user_id, DROP partner_id');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT FK_116AD2A56C783232 FOREIGN KEY (partner_id_id) REFERENCES partner (id)');
        $this->addSql('CREATE INDEX IDX_116AD2A59D86650F ON user_favorite_partner (user_id_id)');
        $this->addSql('CREATE INDEX IDX_116AD2A56C783232 ON user_favorite_partner (partner_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F6061F7CF');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FBE20CAB0');
        $this->addSql('DROP INDEX IDX_B6BD307F6061F7CF ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FBE20CAB0 ON message');
        $this->addSql('ALTER TABLE message ADD sender_id INT NOT NULL, ADD receiver_id INT NOT NULL, DROP sender_id_id, DROP receiver_id_id');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT `FK_B6BD307FCD53EDB6` FOREIGN KEY (receiver_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT `FK_B6BD307FF624B39D` FOREIGN KEY (sender_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B6BD307FCD53EDB6 ON message (receiver_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA9D86650F');
        $this->addSql('DROP INDEX IDX_BF5476CA9D86650F ON notification');
        $this->addSql('ALTER TABLE notification CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `FK_BF5476CAA76ED395` FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BF5476CAA76ED395 ON notification (user_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559D86650F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D63673B0');
        $this->addSql('DROP INDEX IDX_42C849559D86650F ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955D63673B0 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD user_id INT NOT NULL, ADD service_id INT NOT NULL, DROP user_id_id, DROP service_id_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT `FK_42C84955ED5CA9E6` FOREIGN KEY (service_id) REFERENCES service (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C84955A76ED395 ON reservation (user_id)');
        $this->addSql('CREATE INDEX IDX_42C84955ED5CA9E6 ON reservation (service_id)');
        $this->addSql('ALTER TABLE service ADD latitude DOUBLE PRECISION DEFAULT NULL, ADD longitude DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A59D86650F');
        $this->addSql('ALTER TABLE user_favorite_partner DROP FOREIGN KEY FK_116AD2A56C783232');
        $this->addSql('DROP INDEX IDX_116AD2A59D86650F ON user_favorite_partner');
        $this->addSql('DROP INDEX IDX_116AD2A56C783232 ON user_favorite_partner');
        $this->addSql('ALTER TABLE user_favorite_partner ADD user_id INT NOT NULL, ADD partner_id INT NOT NULL, DROP user_id_id, DROP partner_id_id');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT `FK_116AD2A59393F8FE` FOREIGN KEY (partner_id) REFERENCES partner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user_favorite_partner ADD CONSTRAINT `FK_116AD2A5A76ED395` FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_116AD2A59393F8FE ON user_favorite_partner (partner_id)');
        $this->addSql('CREATE INDEX IDX_116AD2A5A76ED395 ON user_favorite_partner (user_id)');
    }
}
