<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511212834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE employe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE employe (id INT NOT NULL, nni INT NOT NULL, date_de_naissance DATE NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(60) NOT NULL, matricule INT NOT NULL, email VARCHAR(70) NOT NULL, adresse VARCHAR(70) NOT NULL, telephone INT NOT NULL, sexe VARCHAR(40) NOT NULL, date_recrutement DATE NOT NULL, fonction VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE employe_id_seq CASCADE');
        $this->addSql('DROP TABLE employe');
    }
}
