<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210524210206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_sous_categorie');
        $this->addSql('ALTER TABLE demande ADD souscatgorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A554082E9B FOREIGN KEY (souscatgorie_id) REFERENCES sous_categorie (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A554082E9B ON demande (souscatgorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_sous_categorie (demande_id INT NOT NULL, sous_categorie_id INT NOT NULL, INDEX IDX_99A509A680E95E18 (demande_id), INDEX IDX_99A509A6365BF48 (sous_categorie_id), PRIMARY KEY(demande_id, sous_categorie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE demande_sous_categorie ADD CONSTRAINT FK_99A509A6365BF48 FOREIGN KEY (sous_categorie_id) REFERENCES sous_categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_sous_categorie ADD CONSTRAINT FK_99A509A680E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A554082E9B');
        $this->addSql('DROP INDEX IDX_2694D7A554082E9B ON demande');
        $this->addSql('ALTER TABLE demande DROP souscatgorie_id');
    }
}
