<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180426082552 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acl DROP INDEX IDX_BC806D12A76ED395, ADD UNIQUE INDEX UNIQ_BC806D12A76ED395 (user_id)');
        $this->addSql('ALTER TABLE acl CHANGE addressbook address_book TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_address ADD zips VARCHAR(255) DEFAULT NULL, CHANGE streetnumber streetnumber VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acl DROP INDEX UNIQ_BC806D12A76ED395, ADD INDEX IDX_BC806D12A76ED395 (user_id)');
        $this->addSql('ALTER TABLE acl CHANGE address_book addressbook TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_address DROP zips, CHANGE streetnumber streetnumber INT DEFAULT NULL');
    }
}
