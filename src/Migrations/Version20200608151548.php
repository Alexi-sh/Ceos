<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608151548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours CHANGE lien_telechargement lien_telechargement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE devoir ADD id_matiere_id INT NOT NULL, CHANGE lien_telechargement lien_telechargement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE devoir ADD CONSTRAINT FK_749EA77151E6528F FOREIGN KEY (id_matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_749EA77151E6528F ON devoir (id_matiere_id)');
        $this->addSql('ALTER TABLE devoir_rendu CHANGE lien_telechargement lien_telechargement VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours CHANGE lien_telechargement lien_telechargement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devoir DROP FOREIGN KEY FK_749EA77151E6528F');
        $this->addSql('DROP INDEX IDX_749EA77151E6528F ON devoir');
        $this->addSql('ALTER TABLE devoir DROP id_matiere_id, CHANGE lien_telechargement lien_telechargement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devoir_rendu CHANGE lien_telechargement lien_telechargement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
