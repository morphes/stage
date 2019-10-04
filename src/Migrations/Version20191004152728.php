<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004152728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Seat ADD hall_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Seat ADD CONSTRAINT FK_9D6E995852AFCFD6 FOREIGN KEY (hall_id) REFERENCES Hall (id)');
        $this->addSql('CREATE INDEX IDX_9D6E995852AFCFD6 ON Seat (hall_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Seat DROP FOREIGN KEY FK_9D6E995852AFCFD6');
        $this->addSql('DROP INDEX IDX_9D6E995852AFCFD6 ON Seat');
        $this->addSql('ALTER TABLE Seat DROP hall_id');
    }
}
