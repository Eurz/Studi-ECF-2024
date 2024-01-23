<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240122174103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(160) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_option TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_published TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimonials (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, is_published TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', score INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thumbnails (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, mime_type VARCHAR(20) NOT NULL, dimensions VARCHAR(160) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, brand_name VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, model VARCHAR(50) NOT NULL, title VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', release_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', price NUMERIC(8, 2) DEFAULT NULL, featured_image VARCHAR(255) NOT NULL, mileage INT DEFAULT NULL, fiscal_power INT NOT NULL, power INT DEFAULT NULL, motorization VARCHAR(50) DEFAULT NULL, consumption NUMERIC(4, 1) DEFAULT NULL, emission_rate INT DEFAULT NULL, energy_class VARCHAR(1) DEFAULT NULL, color VARCHAR(20) DEFAULT NULL, length INT DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, unloaded_weight INT DEFAULT NULL, total_weight INT DEFAULT NULL, max_speed INT DEFAULT NULL, number_of_doors INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipments');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE testimonials');
        $this->addSql('DROP TABLE thumbnails');
        $this->addSql('DROP TABLE vehicles');
    }
}
