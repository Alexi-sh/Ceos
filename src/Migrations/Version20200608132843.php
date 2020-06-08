<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608132843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, id_classe INT NOT NULL, section VARCHAR(5) NOT NULL, niveau VARCHAR(5) NOT NULL, id_prof_principal INT NOT NULL, id_enseignant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, id_cours INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, lien_telechargement VARCHAR(255) DEFAULT NULL, id_matiere INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devoir (id INT AUTO_INCREMENT NOT NULL, id_devoir INT NOT NULL, titre VARCHAR(40) NOT NULL, description LONGTEXT DEFAULT NULL, lien_telechargement VARCHAR(255) DEFAULT NULL, id_matiere INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devoir_rendu (id INT AUTO_INCREMENT NOT NULL, id_devoir_rendu INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, lien_telechargement VARCHAR(255) DEFAULT NULL, id_devoir INT NOT NULL, id_eleve INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleves (id INT AUTO_INCREMENT NOT NULL, id_eleve INT NOT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(40) NOT NULL, adresse LONGTEXT NOT NULL, complement_adresse LONGTEXT DEFAULT NULL, code_postal INT NOT NULL, ville VARCHAR(40) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(40) NOT NULL, mdp VARCHAR(20) NOT NULL, id_classe INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE join_etud_matiere (id INT AUTO_INCREMENT NOT NULL, id_eleve INT NOT NULL, id_matiere INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, id_matiere INT NOT NULL, nom_matiere VARCHAR(40) NOT NULL, id_enseignant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, id_note INT NOT NULL, note INT NOT NULL, id_eleve INT NOT NULL, id_matiere INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur_principal (id INT AUTO_INCREMENT NOT NULL, id_prof_principal INT NOT NULL, id_enseignant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE devoir');
        $this->addSql('DROP TABLE devoir_rendu');
        $this->addSql('DROP TABLE eleves');
        $this->addSql('DROP TABLE join_etud_matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE professeur_principal');
    }
}
