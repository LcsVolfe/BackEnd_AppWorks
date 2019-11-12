<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112030929 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users DROP FOREIGN KEY FK_93804FF829BE6F3D');
        $this->addSql('DROP INDEX IDX_93804FF829BE6F3D ON oauth_users');
        $this->addSql('ALTER TABLE oauth_users ADD descricao DATETIME NOT NULL, DROP descricao_id, DROP numero');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users ADD descricao_id INT DEFAULT NULL, ADD numero INT NOT NULL, DROP descricao');
        $this->addSql('ALTER TABLE oauth_users ADD CONSTRAINT FK_93804FF829BE6F3D FOREIGN KEY (descricao_id) REFERENCES oauth_roles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_93804FF829BE6F3D ON oauth_users (descricao_id)');
    }
}
