<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180426124151 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C11CB84487');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C16425CC19');
        $this->addSql('DROP INDEX IDX_DDF2D9C11CB84487 ON doctors_address_doctors');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE doctors_address_doctors CHANGE address_doctors_id address_doctor_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C11DB5C75F FOREIGN KEY (address_doctor_id) REFERENCES address_doctors (id)');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C16425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id)');
        $this->addSql('CREATE INDEX IDX_DDF2D9C11DB5C75F ON doctors_address_doctors (address_doctor_id)');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD PRIMARY KEY (doctors_id, address_doctor_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C11DB5C75F');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP FOREIGN KEY FK_DDF2D9C16425CC19');
        $this->addSql('DROP INDEX IDX_DDF2D9C11DB5C75F ON doctors_address_doctors');
        $this->addSql('ALTER TABLE doctors_address_doctors DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE doctors_address_doctors CHANGE address_doctor_id address_doctors_id INT NOT NULL');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C11CB84487 FOREIGN KEY (address_doctors_id) REFERENCES address_doctors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD CONSTRAINT FK_DDF2D9C16425CC19 FOREIGN KEY (doctors_id) REFERENCES doctors (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_DDF2D9C11CB84487 ON doctors_address_doctors (address_doctors_id)');
        $this->addSql('ALTER TABLE doctors_address_doctors ADD PRIMARY KEY (doctors_id, address_doctors_id)');
    }
}
