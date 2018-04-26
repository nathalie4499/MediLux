<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425151631 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE acl');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE acl (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, userid_id INT DEFAULT NULL, search TINYINT(1) DEFAULT NULL, patient TINYINT(1) DEFAULT NULL, address_book TINYINT(1) DEFAULT NULL, drugs TINYINT(1) DEFAULT NULL, administration TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_BC806D12A76ED395 (user_id), UNIQUE INDEX UNIQ_BC806D1258E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acl ADD CONSTRAINT FK_BC806D1258E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE acl ADD CONSTRAINT FK_BC806D12A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }
}
