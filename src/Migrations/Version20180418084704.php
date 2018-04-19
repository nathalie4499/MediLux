<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418084704 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE active_problems (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_74EA139A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality_municipality (locality_id INT NOT NULL, municipality_id INT NOT NULL, INDEX IDX_DFFA4FB888823A92 (locality_id), INDEX IDX_DFFA4FB8AE6F181C (municipality_id), PRIMARY KEY(locality_id, municipality_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE municipality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_address (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, patient_id INT NOT NULL, streetnumber INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, canton VARCHAR(255) DEFAULT NULL, zip INT DEFAULT NULL, INDEX IDX_502D3A6AF92F3E70 (country_id), INDEX IDX_502D3A6A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zip (id INT AUTO_INCREMENT NOT NULL, locality_id INT DEFAULT NULL, name INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, INDEX IDX_421D954688823A92 (locality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE active_problems ADD CONSTRAINT FK_74EA139A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB888823A92 FOREIGN KEY (locality_id) REFERENCES locality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB8AE6F181C FOREIGN KEY (municipality_id) REFERENCES municipality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_address ADD CONSTRAINT FK_502D3A6AF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE patient_address ADD CONSTRAINT FK_502D3A6A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE zip ADD CONSTRAINT FK_421D954688823A92 FOREIGN KEY (locality_id) REFERENCES locality (id)');
        $this->addSql('ALTER TABLE patient ADD age INT DEFAULT NULL, DROP birthdate, DROP birthplace, DROP gender, DROP title, DROP insurance, DROP complementaryinsurance, DROP maritalstatus, DROP numberchildren, DROP job, DROP picture, DROP notes1, DROP notes2, DROP record, DROP family, DROP otherphysicians, DROP creationdate, DROP modifieddate, DROP treatingphysician, DROP referringdoctorid, DROP risid, DROP luxembourgid, DROP otherid, DROP mediluxid, CHANGE givenname givenname VARCHAR(255) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE language language VARCHAR(255) DEFAULT NULL, CHANGE modifiedby telephone VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient_address DROP FOREIGN KEY FK_502D3A6AF92F3E70');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB888823A92');
        $this->addSql('ALTER TABLE zip DROP FOREIGN KEY FK_421D954688823A92');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB8AE6F181C');
        $this->addSql('DROP TABLE active_problems');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE locality');
        $this->addSql('DROP TABLE locality_municipality');
        $this->addSql('DROP TABLE municipality');
        $this->addSql('DROP TABLE patient_address');
        $this->addSql('DROP TABLE zip');
        $this->addSql('ALTER TABLE patient ADD birthdate DATE NOT NULL, ADD birthplace VARCHAR(255) NOT NULL COLLATE utf8_bin, ADD gender INT NOT NULL, ADD title INT NOT NULL, ADD complementaryinsurance LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD maritalstatus INT NOT NULL, ADD numberchildren INT NOT NULL, ADD job VARCHAR(255) NOT NULL COLLATE utf8_bin, ADD picture INT NOT NULL, ADD notes1 LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD notes2 LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD record INT NOT NULL, ADD family INT DEFAULT NULL, ADD otherphysicians INT NOT NULL, ADD creationdate DATE NOT NULL, ADD modifieddate DATE DEFAULT NULL, ADD treatingphysician INT NOT NULL, ADD referringdoctorid INT NOT NULL, ADD risid INT NOT NULL, ADD luxembourgid INT DEFAULT NULL, ADD otherid INT DEFAULT NULL, ADD mediluxid INT NOT NULL, CHANGE givenname givenname VARCHAR(255) NOT NULL COLLATE utf8_bin, CHANGE nationality nationality VARCHAR(255) NOT NULL COLLATE utf8_bin, CHANGE language language VARCHAR(255) NOT NULL COLLATE utf8_bin, CHANGE age insurance INT DEFAULT NULL, CHANGE telephone modifiedby VARCHAR(255) DEFAULT NULL COLLATE utf8_bin');
    }
}
