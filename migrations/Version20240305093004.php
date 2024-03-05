<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305093004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, family_id INT DEFAULT NULL, name VARCHAR(75) NOT NULL, lifespan INT DEFAULT NULL, weight INT DEFAULT NULL, height INT DEFAULT NULL, lifestyle VARCHAR(50) DEFAULT NULL, diet VARCHAR(50) NOT NULL, gestation_period INT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_6AAB231FC35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origin_animal (origin_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_CD717FA256A273CC (origin_id), INDEX IDX_CD717FA28E962C16 (animal_id), PRIMARY KEY(origin_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE origin_animal ADD CONSTRAINT FK_CD717FA256A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_animal ADD CONSTRAINT FK_CD717FA28E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FC35E566A');
        $this->addSql('ALTER TABLE origin_animal DROP FOREIGN KEY FK_CD717FA256A273CC');
        $this->addSql('ALTER TABLE origin_animal DROP FOREIGN KEY FK_CD717FA28E962C16');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE origin');
        $this->addSql('DROP TABLE origin_animal');
    }
}
