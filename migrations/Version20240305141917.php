<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305141917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_origin (animal_id INT NOT NULL, origin_id INT NOT NULL, INDEX IDX_640093C28E962C16 (animal_id), INDEX IDX_640093C256A273CC (origin_id), PRIMARY KEY(animal_id, origin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal_origin ADD CONSTRAINT FK_640093C28E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_origin ADD CONSTRAINT FK_640093C256A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_animal DROP FOREIGN KEY FK_CD717FA256A273CC');
        $this->addSql('ALTER TABLE origin_animal DROP FOREIGN KEY FK_CD717FA28E962C16');
        $this->addSql('DROP TABLE origin_animal');
        $this->addSql('ALTER TABLE origin DROP country_name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE origin_animal (origin_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_CD717FA256A273CC (origin_id), INDEX IDX_CD717FA28E962C16 (animal_id), PRIMARY KEY(origin_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE origin_animal ADD CONSTRAINT FK_CD717FA256A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_animal ADD CONSTRAINT FK_CD717FA28E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_origin DROP FOREIGN KEY FK_640093C28E962C16');
        $this->addSql('ALTER TABLE animal_origin DROP FOREIGN KEY FK_640093C256A273CC');
        $this->addSql('DROP TABLE animal_origin');
        $this->addSql('ALTER TABLE origin ADD country_name VARCHAR(255) DEFAULT NULL');
    }
}
