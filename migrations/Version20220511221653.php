<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511221653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_competence (employe_id INT NOT NULL, competence_id INT NOT NULL, PRIMARY KEY(employe_id, competence_id))');
        $this->addSql('CREATE INDEX IDX_161DB2B81B65292 ON employe_competence (employe_id)');
        $this->addSql('CREATE INDEX IDX_161DB2B815761DAB ON employe_competence (competence_id)');
        $this->addSql('ALTER TABLE employe_competence ADD CONSTRAINT FK_161DB2B81B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employe_competence ADD CONSTRAINT FK_161DB2B815761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE employe_competence');
    }
}
