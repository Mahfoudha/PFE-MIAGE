<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511222806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_projet (employe_id INT NOT NULL, projet_id INT NOT NULL, PRIMARY KEY(employe_id, projet_id))');
        $this->addSql('CREATE INDEX IDX_3E3387501B65292 ON employe_projet (employe_id)');
        $this->addSql('CREATE INDEX IDX_3E338750C18272 ON employe_projet (projet_id)');
        $this->addSql('ALTER TABLE employe_projet ADD CONSTRAINT FK_3E3387501B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employe_projet ADD CONSTRAINT FK_3E338750C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE employe_projet');
    }
}
