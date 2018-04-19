<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180417101419 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address_doctors (id INT AUTO_INCREMENT NOT NULL, zip INT NOT NULL, locality VARCHAR(255) DEFAULT NULL, municipality VARCHAR(255) DEFAULT NULL, canton VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telpriv VARCHAR(255) DEFAULT NULL, telwork VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, specialization VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctors_address_doctors (doctors_id INT NOT NULL, address_doctors_id INT NOT NULL, INDEX IDX_DDF2D9C16425CC19 (doctors_id), INDEX IDX_DDF2D9C11CB84487 (address_doctors_id), PRIMARY KEY(doctors_id, address_doctors_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C16425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C11CB84487 FOREIGN KEY (address_doctors_id) REFERENCES address_doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP roles');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C11CB84487');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C16425CC19');
        $this->addSql('DROP TABLE address_doctors');
        $this->addSql('DROP TABLE doctors');
        $this->addSql('DROP TABLE doctors_address_doctors');
        $this->addSql('ALTER TABLE user ADD roles VARCHAR(255) NOT NULL COLLATE utf8_bin');
    }
}
