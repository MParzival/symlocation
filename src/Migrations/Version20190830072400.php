<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830072400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, conducteur_id INT DEFAULT NULL, vehicule_id INT DEFAULT NULL, INDEX IDX_1619C27DF16F4AC6 (conducteur_id), INDEX IDX_1619C27D4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DF16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES driver (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicle (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DF16F4AC6');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D4A4A3511');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE vehicle');
    }
}
