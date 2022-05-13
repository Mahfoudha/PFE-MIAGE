<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511221026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience ADD employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1031B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_590C1031B65292 ON experience (employe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE experience DROP CONSTRAINT FK_590C1031B65292');
        $this->addSql('DROP INDEX IDX_590C1031B65292');
        $this->addSql('ALTER TABLE experience DROP employe_id');
    }
}
