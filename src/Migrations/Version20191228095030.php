<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191228095030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, semester INTEGER NOT NULL, location CLOB NOT NULL COLLATE BINARY, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, budget INTEGER NOT NULL, need_financial_support BOOLEAN NOT NULL, organisation_id INTEGER DEFAULT NULL, name_de CLOB DEFAULT NULL, name_en CLOB DEFAULT NULL, description_de CLOB DEFAULT NULL, description_en CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO event (id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id) SELECT id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, semester INTEGER NOT NULL, location CLOB NOT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, budget INTEGER NOT NULL, need_financial_support BOOLEAN NOT NULL, organisation_id INTEGER DEFAULT NULL, name_de CLOB NOT NULL COLLATE BINARY, name_en CLOB NOT NULL COLLATE BINARY, description_de CLOB NOT NULL COLLATE BINARY, description_en CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO event (id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id) SELECT id, semester, name_de, name_en, description_de, description_en, location, start_date, end_date, budget, need_financial_support, organisation_id FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
    }
}