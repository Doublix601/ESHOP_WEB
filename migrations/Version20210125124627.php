<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125124627 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, siren INT NOT NULL, num_tva INT NOT NULL, adress VARCHAR(100) NOT NULL, cp INT NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, date DATE NOT NULL, client INT NOT NULL, products INT NOT NULL, ht INT NOT NULL, tva INT NOT NULL, ecotax INT NOT NULL, delivery_price INT NOT NULL, ttc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, date DATE NOT NULL, client INT NOT NULL, products INT NOT NULL, ht INT NOT NULL, tva INT NOT NULL, ecotax INT NOT NULL, delivery_price INT NOT NULL, ttc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(30) NOT NULL, brand VARCHAR(25) NOT NULL, ht_price INT NOT NULL, description VARCHAR(10000) NOT NULL, tva INT NOT NULL, ecotax INT NOT NULL, delivery_option VARCHAR(50) NOT NULL, delivery_price INT NOT NULL, discount INT NOT NULL, stock INT NOT NULL, star_rate INT NOT NULL, comment VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(80) NOT NULL, password VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(100) NOT NULL, adress VARCHAR(100) NOT NULL, cp INT NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(35) NOT NULL, rights VARCHAR(50) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
