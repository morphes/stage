<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004201401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hall_seat (hall_id INT NOT NULL, seat_id INT NOT NULL, INDEX IDX_8888CFE752AFCFD6 (hall_id), INDEX IDX_8888CFE7C1DAFE35 (seat_id), PRIMARY KEY(hall_id, seat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hall_seat ADD CONSTRAINT FK_8888CFE752AFCFD6 FOREIGN KEY (hall_id) REFERENCES Hall (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hall_seat ADD CONSTRAINT FK_8888CFE7C1DAFE35 FOREIGN KEY (seat_id) REFERENCES Seat (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE hall_seat');
    }
}
