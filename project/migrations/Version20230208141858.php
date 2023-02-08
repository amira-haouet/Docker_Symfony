<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208141858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patrimony_service (patrimony_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_223DD1DA9A60D1F0 (patrimony_id), INDEX IDX_223DD1DAED5CA9E6 (service_id), PRIMARY KEY(patrimony_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patrimony_service ADD CONSTRAINT FK_223DD1DA9A60D1F0 FOREIGN KEY (patrimony_id) REFERENCES patrimony (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patrimony_service ADD CONSTRAINT FK_223DD1DAED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD patrimony_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499A60D1F0 FOREIGN KEY (patrimony_id) REFERENCES patrimony (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499A60D1F0 ON user (patrimony_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patrimony_service DROP FOREIGN KEY FK_223DD1DA9A60D1F0');
        $this->addSql('ALTER TABLE patrimony_service DROP FOREIGN KEY FK_223DD1DAED5CA9E6');
        $this->addSql('DROP TABLE patrimony_service');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499A60D1F0');
        $this->addSql('DROP INDEX IDX_8D93D6499A60D1F0 ON user');
        $this->addSql('ALTER TABLE user DROP patrimony_id');
    }
}
