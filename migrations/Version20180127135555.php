<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

class Version20180127135555 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skill_item ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE project ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE skill_group ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE content ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content DROP updated_at');
        $this->addSql('ALTER TABLE project DROP updated_at');
        $this->addSql('ALTER TABLE skill_group DROP updated_at');
        $this->addSql('ALTER TABLE skill_item DROP updated_at');
    }
}
