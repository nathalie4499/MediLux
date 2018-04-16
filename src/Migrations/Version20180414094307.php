<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180414094307 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE municipality DROP FOREIGN KEY fkcanton');
        $this->addSql('ALTER TABLE zip DROP FOREIGN KEY fklocality');
        $this->addSql('ALTER TABLE locality DROP FOREIGN KEY fkmunicipality');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE canton');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE locality');
        $this->addSql('DROP TABLE municipality');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE zip');
        $this->addSql('ALTER TABLE user ADD salt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT NOT NULL, type VARCHAR(20) DEFAULT NULL COLLATE utf8_bin, street VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, number VARCHAR(10) DEFAULT NULL COLLATE utf8_bin, zip VARCHAR(10) DEFAULT NULL COLLATE utf8_bin, pobox VARCHAR(10) DEFAULT NULL COLLATE utf8_bin, pozip VARCHAR(10) DEFAULT NULL COLLATE utf8_bin, locality VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, country VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canton (id INT NOT NULL, name VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, name_lu VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, code CHAR(2) DEFAULT NULL COLLATE utf8_bin, name LONGTEXT DEFAULT NULL COLLATE utf8_bin, postal_code LONGTEXT DEFAULT NULL COLLATE utf8_bin, iso3166_alpha3 CHAR(3) DEFAULT NULL COLLATE utf8_bin, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality (id INT NOT NULL, municipality_id INT DEFAULT NULL, name VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, name_lu VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, INDEX fkmunicipality (municipality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE municipality (id INT NOT NULL, canton_id INT DEFAULT NULL, name VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, name_lu VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, INDEX fkcanton (canton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, value VARCHAR(20) DEFAULT NULL COLLATE utf8_bin, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zip (id INT NOT NULL, locality_id INT DEFAULT NULL, zip INT DEFAULT NULL, street VARCHAR(128) DEFAULT NULL COLLATE utf8_bin, parity CHAR(1) DEFAULT NULL COLLATE utf8_bin, first INT DEFAULT NULL, last INT DEFAULT NULL, INDEX fklocality (locality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locality ADD CONSTRAINT fkmunicipality FOREIGN KEY (municipality_id) REFERENCES municipality (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE municipality ADD CONSTRAINT fkcanton FOREIGN KEY (canton_id) REFERENCES canton (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zip ADD CONSTRAINT fklocality FOREIGN KEY (locality_id) REFERENCES locality (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP salt');
    }
}
