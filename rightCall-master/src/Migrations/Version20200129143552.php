<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129143552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recherche_categorie (recherche_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_9E59DC9E1E6A4A07 (recherche_id), INDEX IDX_9E59DC9EBCF5E72D (categorie_id), PRIMARY KEY(recherche_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recherche_categorie ADD CONSTRAINT FK_9E59DC9E1E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_categorie ADD CONSTRAINT FK_9E59DC9EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recherche_categorie DROP FOREIGN KEY FK_9E59DC9EBCF5E72D');
        $this->addSql('DROP TABLE recherche_categorie');
        $this->addSql('DROP TABLE categorie');
    }
}
