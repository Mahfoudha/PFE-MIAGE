<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511222448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_competence_linguistique (employe_id INT NOT NULL, competence_linguistique_id INT NOT NULL, PRIMARY KEY(employe_id, competence_linguistique_id))');
        $this->addSql('CREATE INDEX IDX_FD835C391B65292 ON employe_competence_linguistique (employe_id)');
        $this->addSql('CREATE INDEX IDX_FD835C39AB8526FB ON employe_competence_linguistique (competence_linguistique_id)');
        $this->addSql('ALTER TABLE employe_competence_linguistique ADD CONSTRAINT FK_FD835C391B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employe_competence_linguistique ADD CONSTRAINT FK_FD835C39AB8526FB FOREIGN KEY (competence_linguistique_id) REFERENCES competence_linguistique (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE employe_competence_linguistique');
    }
}
