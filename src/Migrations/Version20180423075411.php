<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180423075411 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE drugs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, supplier VARCHAR(255) DEFAULT NULL, dosage VARCHAR(255) DEFAULT NULL, contraindications VARCHAR(255) DEFAULT NULL, sideeffects VARCHAR(255) DEFAULT NULL, incompatibilities VARCHAR(255) DEFAULT NULL, overdose VARCHAR(255) DEFAULT NULL, components VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE patient CHANGE ssn ssn VARCHAR(255) NOT NULL, CHANGE age age VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_address DROP street, DROP locality, DROP municipality, DROP canton, DROP zip');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON user (role_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE drugs');
        $this->addSql('ALTER TABLE patient CHANGE ssn ssn INT NOT NULL, CHANGE age age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_address ADD street VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, ADD locality VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, ADD municipality VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, ADD canton VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, ADD zip INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role CHANGE label label VARCHAR(255) NOT NULL COLLATE utf8_bin');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP INDEX IDX_8D93D649D60322AC ON user');
        $this->addSql('ALTER TABLE user DROP role_id');
    }
}
