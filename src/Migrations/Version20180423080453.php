<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180423080453 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE active_problems (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_74EA139A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_doctors (id INT AUTO_INCREMENT NOT NULL, zip INT NOT NULL, locality VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, canton VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telpriv VARCHAR(255) DEFAULT NULL, telwork VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, specialization VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors_address_doctors (doctors_id INT NOT NULL, address_doctors_id INT NOT NULL, INDEX IDX_DDF2D9C16425CC19 (doctors_id), INDEX IDX_DDF2D9C11CB84487 (address_doctors_id), PRIMARY KEY(doctors_id, address_doctors_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality_municipality (locality_id INT NOT NULL, municipality_id INT NOT NULL, INDEX IDX_DFFA4FB888823A92 (locality_id), INDEX IDX_DFFA4FB8AE6F181C (municipality_id), PRIMARY KEY(locality_id, municipality_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE municipality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_address (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, patient_id INT NOT NULL, streetnumber INT DEFAULT NULL, INDEX IDX_502D3A6AF92F3E70 (country_id), INDEX IDX_502D3A6A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zip (id INT AUTO_INCREMENT NOT NULL, locality_id INT DEFAULT NULL, name INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, INDEX IDX_421D954688823A92 (locality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE active_problems ADD CONSTRAINT FK_74EA139A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C16425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C11CB84487 FOREIGN KEY (address_doctors_id) REFERENCES address_doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB888823A92 FOREIGN KEY (locality_id) REFERENCES locality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB8AE6F181C FOREIGN KEY (municipality_id) REFERENCES municipality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_address ADD CONSTRAINT FK_502D3A6AF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE patient_address ADD CONSTRAINT FK_502D3A6A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE zip ADD CONSTRAINT FK_421D954688823A92 FOREIGN KEY (locality_id) REFERENCES locality (id)');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE acl ADD addressbook TINYINT(1) DEFAULT NULL, ADD drugs TINYINT(1) DEFAULT NULL, ADD patient TINYINT(1) DEFAULT NULL, ADD admin TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD telephone VARCHAR(255) DEFAULT NULL, DROP birthdate, DROP birthplace, DROP gender, DROP title, DROP insurance, DROP complementaryinsurance, DROP maritalstatus, DROP numberchildren, DROP job, DROP picture, DROP notes1, DROP notes2, DROP record, DROP family, DROP otherphysicians, DROP creationdate, DROP modifieddate, DROP treatingphysician, DROP referringdoctorid, DROP risid, DROP luxembourgid, DROP otherid, DROP mediluxid, CHANGE ssn ssn VARCHAR(255) NOT NULL, CHANGE givenname givenname VARCHAR(255) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE language language VARCHAR(255) DEFAULT NULL, CHANGE modifiedby age VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C11CB84487');
        $this->addSql('ALTER TABLE patient_address DROP FOREIGN KEY FK_502D3A6AF92F3E70');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C16425CC19');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB888823A92');
        $this->addSql('ALTER TABLE zip DROP FOREIGN KEY FK_421D954688823A92');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB8AE6F181C');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE active_problems');
        $this->addSql('DROP TABLE address_doctors');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE doctors');
        $this->addSql('DROP TABLE doctors_address_doctors');
        $this->addSql('DROP TABLE locality');
        $this->addSql('DROP TABLE locality_municipality');
        $this->addSql('DROP TABLE municipality');
        $this->addSql('DROP TABLE patient_address');
        $this->addSql('DROP TABLE zip');
        $this->addSql('ALTER TABLE acl DROP addressbook, DROP drugs, DROP patient, DROP admin');
        $this->addSql('ALTER TABLE patient ADD birthdate DATE NOT NULL, ADD birthplace VARCHAR(255) NOT NULL COLLATE utf8_bin, ADD gender INT NOT NULL, ADD title INT NOT NULL, ADD insurance INT DEFAULT NULL, ADD complementaryinsurance LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD maritalstatus INT NOT NULL, ADD numberchildren INT NOT NULL, ADD job VARCHAR(255) NOT NULL COLLATE utf8_bin, ADD picture INT NOT NULL, ADD notes1 LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD notes2 LONGTEXT DEFAULT NULL COLLATE utf8_bin, ADD record INT NOT NULL, ADD family INT DEFAULT NULL, ADD otherphysicians INT NOT NULL, ADD creationdate DATE NOT NULL, ADD modifieddate DATE DEFAULT NULL, ADD modifiedby VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, ADD treatingphysician INT NOT NULL, ADD referringdoctorid INT NOT NULL, ADD risid INT NOT NULL, ADD luxembourgid INT DEFAULT NULL, ADD otherid INT DEFAULT NULL, ADD mediluxid INT NOT NULL, DROP age, DROP telephone, CHANGE ssn ssn INT NOT NULL, CHANGE givenname givenname VARCHAR(255) NOT NULL COLLATE utf8_bin, CHANGE nationality nationality VARCHAR(255) NOT NULL COLLATE utf8_bin, CHANGE language language VARCHAR(255) NOT NULL COLLATE utf8_bin');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) NOT NULL COLLATE utf8_bin');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id');
    }
}
