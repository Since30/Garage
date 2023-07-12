<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230712143510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE buy_cars ADD image_car_id INT NOT NULL');
        $this->addSql('ALTER TABLE buy_cars ADD CONSTRAINT FK_6B5141386CDBA857 FOREIGN KEY (image_car_id) REFERENCES images (id)');
        $this->addSql('CREATE INDEX IDX_6B5141386CDBA857 ON buy_cars (image_car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE buy_cars DROP FOREIGN KEY FK_6B5141386CDBA857');
        $this->addSql('DROP INDEX IDX_6B5141386CDBA857 ON buy_cars');
        $this->addSql('ALTER TABLE buy_cars DROP image_car_id');
    }
}
