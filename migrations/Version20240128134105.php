<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240128134105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', brand_name VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, model VARCHAR(50) NOT NULL, title VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', release_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', price NUMERIC(8, 2) DEFAULT NULL, featured_image VARCHAR(255) NOT NULL, mileage INT DEFAULT NULL, fiscal_power INT NOT NULL, power INT DEFAULT NULL, motorization VARCHAR(50) DEFAULT NULL, consumption NUMERIC(4, 1) DEFAULT NULL, emission_rate INT DEFAULT NULL, energy_class VARCHAR(1) DEFAULT NULL, color VARCHAR(20) DEFAULT NULL, length INT DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, unloaded_weight INT DEFAULT NULL, total_weight INT DEFAULT NULL, max_speed INT DEFAULT NULL, number_of_doors INT DEFAULT NULL, engine_displacement NUMERIC(3, 1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE vehicles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicles (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', brand_name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, model VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', release_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', price NUMERIC(8, 2) DEFAULT NULL, featured_image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mileage INT DEFAULT NULL, fiscal_power INT NOT NULL, power INT DEFAULT NULL, motorization VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, consumption NUMERIC(4, 1) DEFAULT NULL, emission_rate INT DEFAULT NULL, energy_class VARCHAR(1) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, color VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, length INT DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, unloaded_weight INT DEFAULT NULL, total_weight INT DEFAULT NULL, max_speed INT DEFAULT NULL, number_of_doors INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE vehicle');
    }
}
