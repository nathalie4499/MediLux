<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425151127 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acl ADD userid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE acl ADD CONSTRAINT FK_BC806D1258E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC806D1258E0A285 ON acl (userid_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acl DROP FOREIGN KEY FK_BC806D1258E0A285');
        $this->addSql('DROP INDEX UNIQ_BC806D1258E0A285 ON acl');
        $this->addSql('ALTER TABLE acl DROP userid_id');
    }
}
