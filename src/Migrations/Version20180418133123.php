<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418133123 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE drugs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, supplier VARCHAR(255) DEFAULT NULL, dosage VARCHAR(255) DEFAULT NULL, contraindications VARCHAR(255) DEFAULT NULL, sideeffects VARCHAR(255) DEFAULT NULL, incompatibilities VARCHAR(255) DEFAULT NULL, overdose VARCHAR(255) DEFAULT NULL, components VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user DROP roles');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE drugs');
        $this->addSql('ALTER TABLE user ADD roles VARCHAR(255) NOT NULL COLLATE utf8_bin');
    }
}
