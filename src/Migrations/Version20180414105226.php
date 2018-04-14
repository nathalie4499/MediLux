<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180414105226 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, ssn INT NOT NULL, birthdate DATE NOT NULL, birthplace VARCHAR(255) NOT NULL, gender INT NOT NULL, birthname VARCHAR(255) NOT NULL, givenname VARCHAR(255) NOT NULL, maritalname VARCHAR(255) DEFAULT NULL, title INT NOT NULL, insurance INT DEFAULT NULL, complementaryinsurance LONGTEXT DEFAULT NULL, maritalstatus INT NOT NULL, numberchildren INT NOT NULL, job VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, picture INT NOT NULL, notes1 LONGTEXT DEFAULT NULL, notes2 LONGTEXT DEFAULT NULL, record INT NOT NULL, family INT DEFAULT NULL, otherphysicians INT NOT NULL, creationdate DATE NOT NULL, modifieddate DATE DEFAULT NULL, modifiedby VARCHAR(255) DEFAULT NULL, treatingphysician INT NOT NULL, referringdoctorid INT NOT NULL, risid INT NOT NULL, luxembourgid INT DEFAULT NULL, otherid INT DEFAULT NULL, mediluxid INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD roles VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE user DROP roles');
    }
}
