<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180421152723 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acl (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, search TINYINT(1) DEFAULT NULL, addressbook TINYINT(1) DEFAULT NULL, drugs TINYINT(1) DEFAULT NULL, patient TINYINT(1) DEFAULT NULL, admin TINYINT(1) DEFAULT NULL, INDEX IDX_BC806D12A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, ssn INT NOT NULL, givenname VARCHAR(255) DEFAULT NULL, birthname VARCHAR(255) NOT NULL, maritalname VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, age INT DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE active_problems (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_74EA139A6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_doctors (id INT AUTO_INCREMENT NOT NULL, zip INT NOT NULL, locality VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, canton VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telpriv VARCHAR(255) DEFAULT NULL, telwork VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, specialization VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors_address_doctors (doctors_id INT NOT NULL, address_doctors_id INT NOT NULL, INDEX IDX_DDF2D9C16425CC19 (doctors_id), INDEX IDX_DDF2D9C11CB84487 (address_doctors_id), PRIMARY KEY(doctors_id, address_doctors_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locality_municipality (locality_id INT NOT NULL, municipality_id INT NOT NULL, INDEX IDX_DFFA4FB888823A92 (locality_id), INDEX IDX_DFFA4FB8AE6F181C (municipality_id), PRIMARY KEY(locality_id, municipality_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE municipality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_address (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, streetnumber INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, canton VARCHAR(255) DEFAULT NULL, zip INT DEFAULT NULL, INDEX IDX_502D3A6AF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zip (id INT AUTO_INCREMENT NOT NULL, locality_id INT DEFAULT NULL, name INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, INDEX IDX_421D954688823A92 (locality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drugs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, supplier VARCHAR(255) DEFAULT NULL, dosage VARCHAR(255) DEFAULT NULL, contraindications VARCHAR(255) DEFAULT NULL, sideeffects VARCHAR(255) DEFAULT NULL, incompatibilities VARCHAR(255) DEFAULT NULL, overdose VARCHAR(255) DEFAULT NULL, components VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_332CA4DDD60322AC (role_id), INDEX IDX_332CA4DDA76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acl ADD CONSTRAINT FK_BC806D12A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE active_problems ADD CONSTRAINT FK_74EA139A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C16425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C11CB84487 FOREIGN KEY (address_doctors_id) REFERENCES address_doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB888823A92 FOREIGN KEY (locality_id) REFERENCES locality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locality_municipality ADD CONSTRAINT FK_DFFA4FB8AE6F181C FOREIGN KEY (municipality_id) REFERENCES municipality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_address ADD CONSTRAINT FK_502D3A6AF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE zip ADD CONSTRAINT FK_421D954688823A92 FOREIGN KEY (locality_id) REFERENCES locality (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE active_problems DROP FOREIGN KEY FK_74EA139A6B899279');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C11CB84487');
        $this->addSql('ALTER TABLE patient_address DROP FOREIGN KEY FK_502D3A6AF92F3E70');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C16425CC19');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB888823A92');
        $this->addSql('ALTER TABLE zip DROP FOREIGN KEY FK_421D954688823A92');
        $this->addSql('ALTER TABLE locality_municipality DROP FOREIGN KEY FK_DFFA4FB8AE6F181C');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDD60322AC');
        $this->addSql('DROP TABLE acl');
        $this->addSql('DROP TABLE patient');
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
        $this->addSql('DROP TABLE drugs');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_user');
    }
}
