<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511223847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE division ADD service_id INT NOT NULL');
        $this->addSql('ALTER TABLE division ADD CONSTRAINT FK_10174714ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_10174714ED5CA9E6 ON division (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE division DROP CONSTRAINT FK_10174714ED5CA9E6');
        $this->addSql('DROP INDEX IDX_10174714ED5CA9E6');
        $this->addSql('ALTER TABLE division DROP service_id');
    }
}
