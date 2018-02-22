<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180120155241 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE skill_item (id INT AUTO_INCREMENT NOT NULL, skill_group_id INT NOT NULL, title_en VARCHAR(255) NOT NULL, title_fr VARCHAR(255) NOT NULL, grade INT NOT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_585AB9AC46FF21AF (title_en), UNIQUE INDEX UNIQ_585AB9AC79D32E23 (title_fr), INDEX IDX_585AB9ACBCFCB4B5 (skill_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title_en VARCHAR(255) NOT NULL, title_fr VARCHAR(255) NOT NULL, type_en VARCHAR(255) NOT NULL, type_fr VARCHAR(255) NOT NULL, description_en LONGTEXT NOT NULL, description_fr LONGTEXT NOT NULL, technologies_en LONGTEXT NOT NULL, technologies_fr LONGTEXT NOT NULL, realisation_date DATE NOT NULL, url LONGTEXT NOT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_2FB3D0EE46FF21AF (title_en), UNIQUE INDEX UNIQ_2FB3D0EE79D32E23 (title_fr), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_group (id INT AUTO_INCREMENT NOT NULL, title_en VARCHAR(255) NOT NULL, title_fr VARCHAR(255) NOT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_48E8D7F946FF21AF (title_en), UNIQUE INDEX UNIQ_48E8D7F979D32E23 (title_fr), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, content_en LONGTEXT NOT NULL, content_fr LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_FEC530A9EA750E8 (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_item ADD CONSTRAINT FK_585AB9ACBCFCB4B5 FOREIGN KEY (skill_group_id) REFERENCES skill_group (id)');
    }

    public function down(Schema $schema)
    {
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skill_item DROP FOREIGN KEY FK_585AB9ACBCFCB4B5');
        $this->addSql('DROP TABLE skill_item');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE skill_group');
        $this->addSql('DROP TABLE content');
    }
}
