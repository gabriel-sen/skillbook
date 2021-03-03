<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303073555 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_unit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, role_id_id INT NOT NULL, skills_id_id INT NOT NULL, bu_id_id INT NOT NULL, project_id_id INT NOT NULL, avatar VARCHAR(2083) NOT NULL, firstname VARCHAR(180) NOT NULL, lastname VARCHAR(180) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64988987678 (role_id_id), INDEX IDX_8D93D649D22B7537 (skills_id_id), INDEX IDX_8D93D649D02544B (bu_id_id), INDEX IDX_8D93D6496C1197C9 (project_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D22B7537 FOREIGN KEY (skills_id_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D02544B FOREIGN KEY (bu_id_id) REFERENCES business_unit (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6496C1197C9 FOREIGN KEY (project_id_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D02544B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6496C1197C9');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D22B7537');
        $this->addSql('DROP TABLE business_unit');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE `user`');
    }
}
