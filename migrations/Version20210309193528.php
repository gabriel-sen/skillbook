<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309193528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role ADD role_name VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496C1197C9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D02544B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D22B7537');
        $this->addSql('DROP INDEX IDX_8D93D649D22B7537 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6496C1197C9 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64988987678 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649D02544B ON user');
        $this->addSql('ALTER TABLE user ADD role_id INT DEFAULT NULL, ADD skills_id INT DEFAULT NULL, ADD bu_id INT DEFAULT NULL, ADD project_id INT DEFAULT NULL, DROP role_id_id, DROP skills_id_id, DROP bu_id_id, DROP project_id_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E0319FBC FOREIGN KEY (bu_id) REFERENCES business_unit (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D60322AC ON user (role_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6497FF61858 ON user (skills_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649E0319FBC ON user (bu_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649166D1F9C ON user (project_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role DROP role_name');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6497FF61858');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649E0319FBC');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649166D1F9C');
        $this->addSql('DROP INDEX UNIQ_8D93D649D60322AC ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D6497FF61858 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D649E0319FBC ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D649166D1F9C ON `user`');
        $this->addSql('ALTER TABLE `user` ADD role_id_id INT NOT NULL, ADD skills_id_id INT NOT NULL, ADD bu_id_id INT NOT NULL, ADD project_id_id INT NOT NULL, DROP role_id, DROP skills_id, DROP bu_id, DROP project_id');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6496C1197C9 FOREIGN KEY (project_id_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D02544B FOREIGN KEY (bu_id_id) REFERENCES business_unit (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D22B7537 FOREIGN KEY (skills_id_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D22B7537 ON `user` (skills_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6496C1197C9 ON `user` (project_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64988987678 ON `user` (role_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D02544B ON `user` (bu_id_id)');
    }
}
