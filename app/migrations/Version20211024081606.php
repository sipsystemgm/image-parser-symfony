<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211024081606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX url (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_item (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, url_hash VARCHAR(32) NOT NULL, url VARCHAR(255) NOT NULL, execution_time NUMERIC(5, 4) NOT NULL, deep SMALLINT NOT NULL, images_length INT NOT NULL, INDEX IDX_248198E7F6BD1646 (site_id), UNIQUE INDEX url_hash (url_hash), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site_item ADD CONSTRAINT FK_248198E7F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site_item DROP FOREIGN KEY FK_248198E7F6BD1646');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE site_item');
    }
}
