<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230712165530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sale_cars (id INT AUTO_INCREMENT NOT NULL, images_id INT DEFAULT NULL, brand VARCHAR(55) NOT NULL, type VARCHAR(10) NOT NULL, gearboxtype VARCHAR(15) NOT NULL, door INT NOT NULL, place_number INT NOT NULL, km INT NOT NULL, year DATETIME NOT NULL, INDEX IDX_298969F1D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sale_cars ADD CONSTRAINT FK_298969F1D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale_cars DROP FOREIGN KEY FK_298969F1D44F05E5');
        $this->addSql('DROP TABLE sale_cars');
    }
}
