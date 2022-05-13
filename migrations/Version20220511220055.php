<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511220055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employe ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B96BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F804D3B96BF700BD ON employe (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE employe DROP CONSTRAINT FK_F804D3B96BF700BD');
        $this->addSql('DROP INDEX IDX_F804D3B96BF700BD');
        $this->addSql('ALTER TABLE employe DROP status_id');
    }
}
