<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210134341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, date DATE NOT NULL, client INT NOT NULL, products INT NOT NULL, ht INT NOT NULL, tva INT NOT NULL, ecotax INT NOT NULL, delivery_price INT NOT NULL, ttc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company CHANGE siren siren VARCHAR(15) NOT NULL, CHANGE num_tva num_tva VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE user ADD mail_confirmation VARCHAR(15) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `order`');
        $this->addSql('ALTER TABLE company CHANGE siren siren INT NOT NULL, CHANGE num_tva num_tva INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP mail_confirmation');
    }
}
