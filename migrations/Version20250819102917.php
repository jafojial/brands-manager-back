<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250819102917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE top_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE top_list (id INT NOT NULL, brand_id INT NOT NULL, country_code VARCHAR(2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E42B0ED044F5D008 ON top_list (brand_id)');
        $this->addSql('ALTER TABLE top_list ADD CONSTRAINT FK_E42B0ED044F5D008 FOREIGN KEY (brand_id) REFERENCES brand (brand_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE top_list_id_seq CASCADE');
        $this->addSql('ALTER TABLE top_list DROP CONSTRAINT FK_E42B0ED044F5D008');
        $this->addSql('DROP TABLE top_list');
    }
}
