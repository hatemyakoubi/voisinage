<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607191550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_image ADD user_images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_image ADD CONSTRAINT FK_27FFFF07D4AF8801 FOREIGN KEY (user_images_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_27FFFF07D4AF8801 ON user_image (user_images_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_image DROP FOREIGN KEY FK_27FFFF07D4AF8801');
        $this->addSql('DROP INDEX UNIQ_27FFFF07D4AF8801 ON user_image');
        $this->addSql('ALTER TABLE user_image DROP user_images_id');
    }
}
